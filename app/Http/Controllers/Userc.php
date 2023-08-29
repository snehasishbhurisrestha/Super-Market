<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Session;

// add models
use App\Models\Catagory;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Order;

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
        $obj = Product::where("product_quantity",">",0)->get();
      
        return view("product")->with(['product'=>$obj,'catagory'=>$obj2]);
    }
    public function Productlist(Request $r){
        $n = $r->name;
        $obj2 = Catagory::where("pid","=",0)->get();
        // $objid = Catagory::where("cname","=",$n)->get("cat_id");
        // $obj = Product::where("p_catagory_id","=",$objid->cat_id)->get();

        // SELECT * FROM products WHERE p_catagory_id = (SELECT cat_id FROM catagoris WHERE cname = "Cookware");
        
        $obj = Product::where("product_quantity",">",0)->get();
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
        // $obj->role = "Admin";
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
        $obj3 = Order::join("products","orders.product_id","=","products.p_id")->where("orders.user_id","=",Auth::user()->id)->get(['orders.*','products.p_name']);
        return view("profile")->with(['catagory'=>$obj,'user'=>$obj2,'order'=>$obj3]);
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

    // public function search(Request $r){
    //     $p = $r->press;
    //     // $obj = Product::where("p_name","like","%".$p."%")->get();
    //     $obj = Product::where("p_name","=","Madhur Sugar - Refined, 1 kg Pouch")->get();
    //     // return $obj->name;
    //     return $obj;
    // }


    public function payment(Request $r){
        $amount = $r->amount;
        $obj = Catagory::where("pid","=",0)->get();
        $uid = Auth::user()->id;
        $obj2 = Cart::join('products','cart.product_id','=','products.p_id')->where("cart.user_id","=",$uid)
            ->get(['products.*','cart.*']);
        $api = new Api('rzp_test_Hkd4fncpEeGIv1', 'JDJyVHwwmsAlgxJFJ4rcikmV');
        $order = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100, 'currency' => 'INR'));
        $orderid = $order['id'];
        if(Auth::user()->address != ""){
            $paym = new Payment();
            $paym->user_id = $uid;
            $paym->payment_id = $orderid;
            $paym->save();
        }

        Session::put('order_id', $orderid);
        Session::put('amount', $amount);
        return view("payment")->with(['catagory'=>$obj,'data'=>$obj2]);
    }
    public function pay(Request $r){
        $data = $r->all();
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done = true;
        $user->rezorpay_id = $data['razorpay_payment_id'];
        $user->save();


        $cart = Cart::where("user_id","=",Auth::user()->id)->get();
        foreach($cart as $c){
            $obj = new Order();
            $obj->user_id = $c->user_id;
            $obj->product_id = $c->product_id;
            $obj->product_price = $c->product_price;
            $obj->product_quantity = $c->product_quantity;
            $obj->save();

            $obje = Cart::find($c->crt_id);
            $obje->delete();

            $prod = Product::find($c->product_id);
            $prod->product_quantity -= $c->product_quantity;
            $prod->update();
        }
        return redirect(url('/'));
    }
    public function getaddress(Request $r){
        $id = $r->id;
        $obj = User::find($id);
        $obj->name = $r->name;
        $obj->email = $r->email;
        $obj->address = $r->address;
        $obj->phone = $r->pnum;
        $obj->update();
        return redirect(url('/cart'));
    }

}