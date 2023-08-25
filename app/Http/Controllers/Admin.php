<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// add models
use App\Models\Catagory;
use App\Models\Product;
use App\Models\User;

class Admin extends Controller
{
    public function dashboard(){
        return view("dashboard");
    }

    public function add_catagory(){
        $obj = Catagory::where("pid","=",0)->get();
        return view("add_catagory")->with(['Parent'=>$obj]);
    }

    public function ins_add_catagory(Request $r){
        $pc = $r->pcata;
        $c = $r->cata;

        $obj = new Catagory();
        $obj->cname = $c;
        $obj->pid = $pc;
        $obj->save();
        return redirect(url('/show_cata'));
    }
    public function show_catagory(){
        $obj = Catagory::leftJoin('catagoris as p', 'catagoris.pid', '=', 'p.cat_id')
            ->get(['catagoris.*', 'p.cname as parent']);
        return view("show_catagory")->with(['cata'=>$obj]);
    }
    public function del_catagory(Request $r){
        $id = $r->id;
        $obj = Catagory::find($id);
        $obj->delete();
        return redirect(url('/show_cata'));
    }
    public function update_catagory(Request $r){
        $id = $r->id;
        $obj = Catagory::find($id);
        $obj2 = Catagory::where("pid","=",0)->get();
        return view("update_catagory")->with(['cata'=>$obj, 'Parent'=>$obj2]);
    }
    public function ins_update_catagory(Request $r){
        $id = $r->id;
        $pc = $r->pcata;
        $c = $r->cata;

        $obj = Catagory::find($id);
        $obj->cname = $c;
        $obj->pid = $pc;
        $obj->update();
        return redirect(url('/show_cata'));
    }

    public function add_product(){
        $obj = Catagory::where("pid","!=",0)->get();
        return view("add_product")->with(['pname'=>$obj]);
    }
    public function ins_add_product(Request $r){
        $pcid = $r->pcid;
        $n = $r->pname;
        $pprice = $r->pprice;
        $poffer = $r->poffer;
        $des = $r->des;
        $rate = $r->rate;
        $img = $r->file("img");
        if(isset($img)){
            $img_name = $img->getClientOriginalName();
            $img->move("product_images",$img_name);
        }else{
            $img_name = "Not provided";
        }
        
        $obj = new Product();
        $obj->p_catagory_id = $pcid;
        $obj->p_name = $n;
        $obj->p_price = $pprice;
        $obj->p_deacription = $des;
        $obj->p_rating = $rate;
        $obj->p_offer_price = $poffer;
        $obj->p_image = $img_name;
        $obj->save();
        return redirect(url('/show_product'));
    }
    public function show_product(){
        $obj = Product::leftJoin('catagoris','products.p_catagory_id','=','catagoris.cat_id')
            ->get(['products.*','catagoris.cname as name']);
        return view("show_product")->with(['product'=>$obj]);
    }

    public function product_edit(Request $r){
        $id = $r->id;
        $obj = Product::find($id);
        $obj2 = Catagory::where("pid","!=",0)->get();
        return view("product_update")->with(["data"=>$obj,'pname'=>$obj2]);
    }

    public function ins_update_product(Request $r){
        $id = $r->id;
        $pcid = $r->pcid;
        $n = $r->pname;
        $pprice = $r->pprice;
        $poffer = $r->poffer;
        $des = $r->des;
        $rate = $r->rate;
        $img = $r->file("img");
        
        $obj = Product::find($id);

        if(isset($img)){
            unlink("product_images/".$obj->p_image);
            $img_name = $img->getClientOriginalName();
            $img->move("product_images",$img_name);
        }else{
            $img_name = $obj->p_image;
        }
        $obj->p_catagory_id = $pcid;
        $obj->p_name = $n;
        $obj->p_price = $pprice;
        $obj->p_deacription = $des;
        $obj->p_rating = $rate;
        $obj->p_offer_price = $poffer;
        $obj->p_image = $img_name;
        $obj->update();
        return redirect(url('/show_product'));
    }

    public function product_delete(Request $r){
        $id = $r->id;
        $obj = Product::find($id);
        if(isset($obj->p_image)){
            unlink("product_images/".$obj->p_image);
        }
        $obj->delete();
        return redirect(url('/show_product'));
    }

    public function admin_login(){
        return view("admin_login");
    }
    public function insadmin_login(Request $r){
        if(Auth::attempt(["email"=>$r->email,"password"=>$r->pass])){
            return redirect(url('/dashboard'));
        }else{
            return redirect(url('/admin_login'))->with(['msg'=>"Invalid Login"]);
        }
    }
    public function admin_logout(){
        Auth::logout();
        return redirect(url('/admin_login'));
    }
}
