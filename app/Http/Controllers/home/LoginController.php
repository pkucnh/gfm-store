<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallrey;
use App\Models\Rating;
use App\Models\User;
use Toastr;
use Carbon\Carbon;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LoginUser(Request $request){    
   
        $category = Category::where('status','=',1)->get();
        $data = [
     
            'category' => $category,
           
        ];

        return view('home.page.login',$data);
    }

    public function CheckLoginUser(Request $request){

        $data = $request->all();     

        $arr = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($arr)) {
            Session::get('customer_id', Auth::user()->id);
            Session::get('customer_name', Auth::user()->fullname);
            Session::get('customer_image', Auth::user()->image);
            return redirect('/');
        }else{
            return redirect('/login');
        }  
    }

    public function LogoutUser()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        Session::forget('customer_image');
        Auth::logout();
        return redirect('/');

    }


    public function register(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->fullname = $data['fullname'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->level = 0;
        $user->save();


        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ForgotPassword(Request $request)
    {
        return view('home.page.forgot_password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
