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
   
        
        return view('home.page.login');
    }

    public function CheckLoginUser(Request $request){

        $data = $request->all();     

        $arr = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($arr)) {
            Session::get('id_user', Auth::user()->id);
            Session::get('fullname', Auth::user()->fullname);
            Session::get('image', Auth::user()->fullname);
            return redirect('/');
        }else{
            return redirect('/login');
        }  
    }

    public function LogoutUser()
    {
        Session::forget('id_user');
        Session::forget('fullname');
        Session::forget('image');
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
