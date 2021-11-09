<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminFeedbackController extends Controller
{
    public function index(){
        // $roles = $this->feedback->paginate(10);
        return view('admin.feedback.index');
    }

    // public function edit($id){


    //     return view('admin.feedback.index');
    // }

    public function edit($id)
    {
        try {
            DB::table('users_comment')->where('id',$id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
