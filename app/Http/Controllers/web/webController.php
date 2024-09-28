<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class webController extends Controller
{
    public function index(){
       $data=product::with("images")->get();
        return view("web.index",compact("data"));
    }

    public function cart(){
        $id_login=Auth::guard('web')->user()->id??"";
        $cart=cart::where("user_id",$id_login)->with("products.images")->get();
        return view("web.cart",compact("cart"));
    }

    public function log(){
        return view("web.login");
    }

    public function regist(){
        return view('web.register');
    }
}
