<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Userc;

// Admin Route
Route::get('/dashboard',[Admin::class, "dashboard"])->middleware("admin");
Route::get('/add_cata',[Admin::class, "add_catagory"])->middleware("admin");
Route::post('/ins_cata',[Admin::class, "ins_add_catagory"]);
Route::get('/show_cata',[Admin::class, "show_catagory"])->middleware("admin");
Route::get('/add_product',[Admin::class, "add_product"])->middleware("admin");
Route::post('/ins_product',[Admin::class, "ins_add_product"]);
Route::get('/show_product',[Admin::class, "show_product"])->middleware("admin");
Route::get('/productdel/{id}',[Admin::class, "product_delete"]);
Route::get('/productedit/{id}',[Admin::class, "product_edit"]);
Route::post('/update_product',[Admin::class, "ins_update_product"]);
Route::get('/del_catagory/{id}',[Admin::class, "del_catagory"]);
Route::get('/update_catagory/{id}',[Admin::class, "update_catagory"]);
Route::post('/ins_update_catagory',[Admin::class, "ins_update_catagory"]);
Route::get('/admin_login',[Admin::class, "admin_login"]);
Route::post('/insadminlogin',[Admin::class, "insadmin_login"]);
Route::get('/admin_logout',[Admin::class, "admin_logout"]);



// User Route
Route::get('/',[Userc::class, "Home"]);
Route::get('/contact',[Userc::class, "Contact"]);
Route::get('/getid/{id}',[Userc::class, "Getid"]);
Route::get('/product',[Userc::class, "Product"])->middleware("auth");
Route::get('/products/{name}',[Userc::class, "Productlist"])->middleware("auth");
Route::get('/login',[Userc::class, "login"])->name('login');
Route::get('/register',[Userc::class, "register"]);
Route::post('/getregister',[Userc::class, "getregister"]);
Route::post('/getlogin',[Userc::class, "getlogin"]);
Route::get('/cart',[Userc::class, "cart"])->middleware("auth");
Route::get('/logout',[Userc::class, "logout"]);
Route::post('/addtocart',[Userc::class, "Add_to_Cart"]);
Route::get('/deltocart/{id}',[Userc::class, "Del_to_Cart"]);
Route::get('/profile',[Userc::class, "Profile"]);
Route::post('/incprofile',[Userc::class, "incProfile"]);
Route::get('/offer',[Userc::class, "offer"]);
Route::get('/getsearch/{press}',[Userc::class, "search"]);
Route::post('/payment',[Userc::class, "payment"]);
Route::post('/incaddar',[Userc::class, "getaddress"]);
Route::post('/pay',[Userc::class, "pay"]);