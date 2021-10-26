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

        // $messages = [
        //     'email.required' => 'Email không được rỗng!',
        //     'password.required' => 'Mật khẩu không được rỗng!'
        // ];
        // $validatedData = $request->validate([
        //     'email' => 'bail|required|email',
        //     'password' => 'bail|required|max:25|min:1'
        // ],$messages);       

            // $email = $request->input("email");
            // $password =  $request->input("password");
        $email = $data['email'];
        $password =  $data['password'];
        // $user_pass = md5($password);

        $arr = $request->only(["email", "password"]);
            //Check nếu có coupon trước khi đăng nhập
        if(Session::get('coupon')){
            Session::forget('coupon');
            Session::forget('cart');
        }
        $result = User::where('email',$email)->where('password',$password)->first();
        if($result){
            Session::put('customer_name',$result->name);
            Session::put('customer_id',$result->id);
            Session::put('customer_img',$result->img);
            return redirect("/");
        }
        return redirect('login')->withInput()->withErrors(['message'=>'Tài khoản không tồn tại!']);     
    }


    public function index()
    {
        //
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
