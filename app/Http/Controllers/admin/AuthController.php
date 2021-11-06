<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($data)){
            return redirect()->intended('admin/home');
        }else{
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu không chính xác!!!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('admin/login');
    }
}
