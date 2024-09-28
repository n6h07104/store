<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function regis(Request $request){
        $data=User::create($request->toArray());
        Auth::login($data);
        return redirect()->route("web/index");
    }

    public function dataCheck(Request $request){
        if(Auth::guard("web")->attempt($request->except("_token"))){
            return redirect()->route('web/index');
        }else{
            return redirect()->route("web/log");
     };
    }
}
