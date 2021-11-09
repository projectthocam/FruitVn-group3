<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Input;

class UserSignUpController extends Controller
{
    public function showSignUp()
    {
        return view('auth.signup');
    }

    public function signUp(Request $request)
    {
        $email = $request->email;
        $password = bcrypt($request->password);
        $name = $request->name;
        $phone = $request->phone;

        // $add_user = DB::table('users')->insert([
        //     'email'=>$email,
        //     'password'=>$password,
        //     'name'=>$name,
        //     'phone'=>$phone
        // ]);

        $email_check = DB::table('users')->where('email',$email)->get('email');
        // dd(count($email_check));

            if (count($email_check)!=0){
                // dd($email);
                return redirect()->back()->with('alert_email','Email đã được đăng ký!!!');
            }

            $add_user = User::create([
                'email'=>$email,
                'password'=>$password,
                'name'=>$name,
                'phone'=>$phone
            ]);

            if ($add_user){
                return redirect()->to('admin')->with('alert','Sign up success!');
            } else {
                return redirect()->back()->with('alert','Sorry! Have something wrong. Please try again later! :(');
            }

    }
}
