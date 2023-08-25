<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// add models
use App\Models\Catagory;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

class Userc extends Controller
{
    public function Home(){
        $obj = Catagory::where("pid","=",0)->get();
        $obj2 = Product::where("p_offer_price",">",0)->take(4)->get();
        $obj3 = Product::where("p_offer_price",">",0)->take(6)->get();
        return view("home")->with(['catagory'=>$obj, 'product'=>$obj2, 'products'=>$obj3]);
    }
    public function Contact(){
        $obj = Catagory::where("pid","=",0)->get();
        return view("contact")->with(['catagory'=>$obj]);
    }
    public function Getid(Request $r){
        $id = $r->id;
        $obj['obj'] = Catagory::where("pid","=",$id)->get("cname");
        return response()->json($obj);
    }
    public function Product(){
        $obj2 = Catagory::where("pid","=",0)->get();
        $obj = Product::all();
      
        return view("product")->with(['product'=>$obj,'catagory'=>$obj2]);
    }
    public function Productlist(Request $r){
        $n = $r->name;
        $obj2 = Catagory::where("pid","=",0)->get();
        // $objid = Catagory::where("cname","=",$n)->get("cat_id");
        // $obj = Product::where("p_catagory_id","=",$objid->cat_id)->get();

        // SELECT * FROM products WHERE p_catagory_id = (SELECT cat_id FROM catagoris WHERE cname = "Cookware");
        
        $obj = Product::all();
        return view("product")->with(['product'=>$obj,'catagory'=>$obj2]);
    }
    public function cart(){
        $obj = Catagory::where("pid","=",0)->get();
        // $obj2 = Cart::all();
        $uid = Auth::user()->id;
        $obj2 = Cart::join('products','cart.product_id','=','products.p_id')->where("cart.user_id","=",$uid)
            ->get(['products.*','cart.*']);
        return view("cart")->with(['catagory'=>$obj,'cart'=>$obj2]);
    }
    public function login(){
        $obj2 = Catagory::where("pid","=",0)->get();
        return view("login")->with(['catagory'=>$obj2]);;
    }
    public function register(){
        $obj = Catagory::where("pid","=",0)->get();
        return view("register")->with(['catagory'=>$obj]);
    }
    public function getregister(Request $r){
        $n = $r->name;
        $phone = $r->pnum;
        $email = $r->email;
        $pass = $r->pass;
        
        $obj = new User();
        $obj->name = $n;
        $obj->email = $email;
        $obj->role = "User";
        $obj->phone = $phone;
        $obj->password = bcrypt($pass);
        $obj->save();
        return redirect(url('/login'));
    }
    public function getlogin(Request $r){
        $email = $r->email;
        $pass = $r->pass;

        $w=array(
            'email'=>$email,
            'password'=>$pass
        );

        if(Auth::attempt($w)){
            return redirect(url('/product'));
        }else{
            return redirect(url('/login'))->with(['msg'=>'Invalid Login']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
    }

    public function Add_to_Cart(Request $r){
        $obj = new Cart();

        $obj->product_id = $r->pid;
        $obj->user_id = $r->uid;
        $obj->product_price = $r->amount;
        $obj->product_quantity = $r->quantity;
        $obj->save();
        return redirect(url('/cart'));
    }

    public function Del_to_Cart(Request $r){
        $id = $r->id;
        $obj = Cart::find($id);
        $obj->delete();
        return redirect(url('/cart'));
    }

    public function Profile(){
        $obj = Catagory::where("pid","=",0)->get();
        $obj2 = Auth::user();
        return view("profile")->with(['catagory'=>$obj,'user'=>$obj2]);
    }

    public function incProfile(Request $r){
        $id = $r->id;
        $obj = User::find($id);
        $obj->name = $r->name;
        $obj->email = $r->email;
        $obj->address = $r->location;
        $obj->phone = $r->phone;

        $img = $r->file("img");
        if(isset($img)){
            $imgname = $img->getClientOriginalName();
            $img->move("profile_images",$imgname);
        }else{
            $imgname = "";
        }

        $obj->image = $imgname;
        $obj->update();
        // return view("profile")->with(['catagory'=>$obj,'user'=>$obj2]);
        return redirect(url('/profile'));
    }

    public function offer(){
        $obj = Catagory::where("pid","=",0)->get();
        $obj2 = Product::where("p_offer_price",">",0)->get();
        return view("offer")->with(['catagory'=>$obj, 'product'=>$obj2]);
    }

}