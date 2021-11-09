<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    public function userComment(Request $request)
    {
        session_start();
        $cmt = $request->cmts;
        $product_id = $request->product_id;
        $email_users = $request->email_users;
        
        $add_comment = DB::table('users_comment')->insert([
            // 'id_user'=>$_SESSION['email'],
            'comment'=>$cmt,
            'product_id'=>$product_id,
            'email_users'=>$email_users,

        ]);
        // dd($add_comment);
        if ($add_comment){
            return redirect()->back()->with('alert','Your feedback is good for us!');
        } else {
            return redirect()->back()->with('alert','Sorry! Have something wrong. Please try comment again later! :(');
        }

    }
}
