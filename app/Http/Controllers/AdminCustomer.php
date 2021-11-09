<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Bills;

use Illuminate\Http\Request;

class AdminCustomer extends Controller
{
    private $order;
    public function __construct(Bills $order)
    {
        $this->order = $order;
    }
    public function index(){
        $list = $this->order->latest()->paginate(10);
        return view('admin.customer.index',compact('list'));
    }

    public function viewDetail($id){
        $list = order::find($id)->orderDetails;
        $order = order::find($id);
        return view('admin.customer.detail',compact('list','order'));
    }

    public function edit($id){
       $list = $this->order->find($id);
        return view('admin.customer.edit',compact('list'));
    }

    public function update($id,Request $request){
             $this->order->find($id)->update([
            'customer_name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'total' => $request->total,
            'status' => $request->status
        ]);
         return redirect()->route('donhang.index');
     }
}
