<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Toastr;
use Carbon\Carbon;
use Auth;
use Mail;
use Str;
use Socialite;
Use Alert;

class LoginController extends Controller
{
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
            'password' => $data['password'],
            'active' => 1
        ];

        if (Auth::guard('loyal_customer')->attempt($arr)) {
            toast('Chào mừng '. Auth::guard('loyal_customer')->user()->fullname.' đã đến với Green Farm Market','success');
            return redirect('/');
        }else{
            toast('Không tìm thấy thông tin tài khoản của bạn','info');
            return redirect('/login');
        }  
    }

    public function LogoutUser()
    {
        Auth::guard('loyal_customer')->logout();
        toast('Đăng xuất thành công','success');
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
        $user->active = 0;
        $code_veryfi_email = substr(md5(microtime()),rand(0,26),15);
        $user->veryfi_email =  $code_veryfi_email;
        $user->save();

        $data['code'] = $code_veryfi_email;
        $data['info'] = $request->all();
        Mail::send('sendmail.confirm-account',$data , function ($message) use ($data) {
            $message->from('duynv41201@gmail.com', 'Green Farm Market');          
            $message->to($data['email'], $data['fullname']); 
            $message->subject('Xác thực tài khoản người dùng của bạn');
        });

        toast('Một tin nhắn đã được gửi đến email của bạn. Kiểm tra để kích hoạt tài khoản','success');
        return redirect('/');
    }


    
    public function verify($code)
    {
        $user = User::where('veryfi_email', $code)->first();
        if($user->count()>0){
            $user->active = 1;
            $user->veryfi_email = 0;
            $user->save(); 
            toast('Tài khoản đã được kích hoạt. Đăng nhập để mua sắm thôi nào','success');
            return redirect('/login');
        }else{
            toast('Đã xảy ra lỗi kích hoạt. Vui lòng thử lại sao','info');
        }
	}

  
    public function ForgotPassword(Request $request)
    {
        return view('home.page.forgot_password');
    }

    
    public function sendMailForgot(Request $request)
    {
        $data = $request->all();

        $user = User::where('email', $data['email'])->first();

        if($user){
            $token_reset = Str::random(15);
            $insert_token = User::find($user['id']);
            $insert_token->token_reset = $token_reset;
            $insert_token->save();

            $data = [
                'user' => $user,
                'token'=>$token_reset
            ];

            Mail::send('sendmail.reset-password', $data, function ($message) use ($user) {
                $message->from('duynv41201@gmail.com', 'Green Farm Market');
                $message->to($user['email'], $user['fullname']);
                $message->subject('Khôi phục mật khẩu Green Farm Market');
            });
        }else{
            toast('Không tìm thấy email mà bạn đã đăng kí. Hãy thử lại','info');
            return redirect('forgot-password');
        }
        toast('Một tin nhắn đã được gửi đến email của bạn. Kiểm tra để đặt lại mật khẩu','success');
        return redirect('/login');
    }

   
    public function resetPass($token)
    {
        $user = User::where('token_reset', $token)->first();
        if($user){
            return view('home.page.reset-password');
        }else{
            toast('Đã xảy ra lỗi. Vui lòng thử lại sao','info');
        }
    }


    public function updatePassNew(Request $request)
    {
       $data= $request->all();

       $user = User::where('token_reset', $data['token'])->first();
       $user->password = bcrypt($data['password']);
       $user->token_reset = null;
       $user->save();
       toast('Mật khẩu của bạn đã được đặt lại','success');
       return redirect('/login');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function registerGoogle()
    {
        
        $user = Socialite::driver('google')->stateless()->user();
        
        try {
            $findUser = User::where('google_id', $user->id)->first();

            if($findUser){

                $arr = [
                    'google_id' => $findUser->google_id,
                    'password'=> 'google'
                ];
        
                if (Auth::guard('loyal_customer')->attempt($arr)) {
                    toast('Chào mừng '. Auth::guard('loyal_customer')->user()->fullname.' trở lại với Green Farm Market','success');
                    return redirect('/');
                }else{
                    toast('Đã xảy ra lỗi. Vui lòng thử lại sao','info');
                    return redirect('/login');
                }  
            }else{
                $newUser = new User();
                $newUser->fullname = $user['name'];
                $newUser->email = $user['email'];
                $newUser->google_id = $user['id'];
                $newUser->password = bcrypt('google');
                $newUser->save();

                $arr = [
                    'google_id' => $newUser->google_id,
                    'password'=> 'google'
                ];
        
                if (Auth::guard('loyal_customer')->attempt($arr)) {
                    toast('Chào mừng '. Auth::guard('loyal_customer')->user()->fullname.' đã đến với Green Farm Market','success');
                    return redirect('/');
                }else{

                    toast('Đã xảy ra lỗi. Vui lòng thử lại sao','info');
                    return redirect('/login');
                }  
            }

        } catch (Exception $e) {
            return redirect('/');
        }
    
    }

    public function  redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function registerFacebook()
    {
        
        $user = Socialite::driver('facebook')->stateless()->user();
        
        try {
            $findUser = User::where('facebook_id', $user->id)->first();

            if($findUser){


                $arr = [
                    'facebook_id' => $findUser->facebook_id,
                    'password'=> 'facebook'
                ];
        
                if (Auth::guard('loyal_customer')->attempt($arr)) {
                    toast('Chào mừng '. Auth::guard('loyal_customer')->user()->fullname.' đã trở lại với Green Farm Market','success');
                    return redirect('/');
                }else{
                    toast('Đã xảy ra lỗi. Vui lòng thử lại sao','info');
                    return redirect('/login');
                }  
            }else{
                $newUser = new User();
                $newUser->fullname = $user['name'];
                $newUser->email = $user['email'];
                $newUser->facebook_id = $user['id'];
                $newUser->password = bcrypt('facebook');
                $newUser->save();

                $arr = [
                    'facebook_id' => $newUser->facebook_id,
                    'password'=> 'facebook'
                ];
        
                if (Auth::guard('loyal_customer')->attempt($arr)) {
                    toast('Chào mừng '. Auth::guard('loyal_customer')->user()->fullname.' đã đến với Green Farm Market','success');
                    return redirect('/');
                }else{
                    toast('Đã xảy ra lỗi. Vui lòng thử lại sao','info');
                    return redirect('/login');
                }  
            }

        } catch (Exception $e) {
            toast('Đã xảy ra lỗi. Vui lòng thử lại sao','info');
            return redirect('/');
        }
    
    }

}