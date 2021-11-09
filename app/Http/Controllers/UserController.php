<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Typeproducts;
use App\Products;
use App\Sliders;
use App\Bills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// session_start();

ob_start();

class UserController extends Controller
{


    public function showLogin(){
        if( isset($_SESSION['isLoggedIn'])){
            return redirect()->to('/');
        } else {
        return view('auth.login');
        }
    }

    public function loginCus()
    {
        if(Auth::check()){
            return redirect()->to('homes');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if(auth()->user()){
            auth()->logout;
        }

        $remember = $request->has('remember_me') ? true : false;
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            $email = $request->email;
            $password = $request->password;
            $users_cus = DB::table('users')->where('email', $email)->first();
            if ($users_cus != null && $users_cus->password == $password) {

                $request->session()->push('users_cus', $users_cus);
                // return view('Homeindex')->with('alert','welcome cus');
                $name = DB::table('users_cus')->where('email', $email)->select('name');
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                setcookie("email",$_SESSION['email'],time()+3600);
                $_SESSION['isLoggedIn']=1;
                // dd(auth()->user());
                return redirect()->to('/')->with('alert','Hi there');

            } else {
                // return redirect('login')->with('message', 'Login Fail.');
                return redirect()->back()->with('alert','Wrong Login');
            }
            // return redirect()->to('Homeindex')->with('alert','welcome cus');
        // }
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     //remove ss
    //     session_unset();
    //     // destroy ss
    //     session_destroy();
    //     return redirect()->to('/');
    // }

}

