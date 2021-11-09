<?php

namespace App\Http\Controllers;

use App\Typeproducts;
use App\Customers;
use App\Bills;
use App\Models\order_detail;
use App\Products;
use App\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Cart;

class HomeController extends Controller
{
    private $slider;
    private $typeproducts;
    private $product;
    private $customer;
    private $order;
    public function __construct(Sliders $slider, Typeproducts $typeproducts, Products $product, Customers $customer,Bills $order)
    {
        $this->slider = $slider;
        $this->typeproducts = $typeproducts;
        $this->product = $product;
        $this->customer = $customer;
        $this->order = $order;
    }
    public function index()
    {
        $sliders = $this->slider->latest()->get();
        $category = $this->typeproducts->where('parent_id', 0)->latest()->get();
        $products = $this->product->latest()->take(6)->get();
        $productRecommend = $this->product->latest('views_count', 'desc')->take(6)->get();
        $categoryList = $this->typeproducts->where('parent_id', 0)->take(2)->get();
        return view('fontend.index', compact('sliders', 'category', 'products', 'productRecommend', 'categoryList'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->product->find($request->id);
        //nếu trước đó đã có giỏ hàng thì cộng thêm vào
        $oldcart=Session('cart')?Session::get('cart'):null;
        //lấy giỏ hàng cũ
        $cart=new Cart($oldcart);
        //giỏ hàng cũ cộng thêm sp mới sẽ thành giỏ hàng mới
        $cart->add($product,$request->id,$request->qty);
        //put giỏ hàng lên session
        $request->Session()->put('cart',$cart);
        return response()->json(['errorCode'=> null, 'data'=>$cart], 200);
    }

    public function showCart()
    {
        // $categoryList = $this->typeproducts->where('parent_id', 0)->take(2)->get();
        // $carts = session()->get('cart');
        // if ($carts == null) {
        //     return redirect()->route('Homeindex');
        // } else {
        //     return view('products.cart.giohang', compact('categoryList', 'carts'));
        // }
        return view('products.cart.giohang');
    }

    public function updateCart(Request $request)
    {

        // if ($request->id && $request->quantity) {
        //     $carts = session()->get('cart');
        //     $carts[$request->id]['quantity'] = $request->quantity;
        //     session()->put('cart', $carts);
        //     $carts = session()->get('cart');
        //     return response()->json([
        //         'code' => 200,
        //         'message' => 'success'
        //     ], 200);
        // }


        //lấy giỏ hàng cũ
        $oldcart=session::has('cart')?Session::get('cart'):null;
        //giỏ hàng cũ
        $cart=new Cart($oldcart);
        //giỏ hàng cũ xóa đi 1 sp
        $cart->reduceByOne($request->id,$request->qty);
        //kiểm tra giỏ hàng
        $id=$request->id;
        if(count($cart->items)>0){
            //nếu còn thì put lên lại session
            Session::put('cart',$cart);
        }
        //nếu trống thì xóa luôn giỏ hàng
        else Session::forget('cart');
        //dd($cart);
        return response()->json(['errorCode'=> null,'total'=>$cart->totalPrice], 200);
    }

    public function deleteCart(Request $request)
    {
        // if ($request->id) {
        //     $carts = session()->get('cart');
        //     if (isset($carts[$request->id])) {

        //         unset($carts[$request->id]);

        //         session()->put('cart', $carts);
        //     }
        // }
        // return response()->json([
        //     'code' => 200,
        //     'message' => 'success'
        // ], 200);

        //lấy giỏ hàng 
        $oldcart=session::has('cart')?Session::get('cart'):null;
        //giỏ hàng bằng giỏ hàng cũ
        $cart=new Cart($oldcart);
        //bỏ sp ra khỏi giỏ hàng theo id sp
        $cart->removeItem($request->id);
        //kiểm tra nếu giỏ hàng rỗng thì xóa luôn session
        if(count($cart->items)>0){
            //giỏ hàng còn sp thì put lên lại session
            Session::put('cart',$cart);
        }
        //giỏ hàng trống thì xóa luôn giỏ hàng
        else Session::forget('cart');
        return response()->json(['errorCode'=> null,'total'=>$cart->totalPrice], 200);
        
    }


    public function thanhtoan()
    {
        
        $categoryList = $this->typeproducts->where('parent_id', 0)->take(2)->get();
        // dd(session()->get('cart'));
        return view('products.thanhtoan.thanhtoan', compact('categoryList'));
    }

    public function submitThanhtoan(Request $request)
    {
        // $carts = session()->get('cart');
        // $totalAmount = 0;
        // foreach ($carts as $item) {
        //     $totalAmount += $item['price'] * $item['quantity'];
        // }

        // $orders = new order();
        // $orders->customer_name = $request->name;
        // $orders->phone = $request->phone;
        // $orders->address = $request->address;
        // $orders->email = $request->email;
        // $orders->total = $totalAmount;
        // $orders->comments = $request->comments;

        // $orders->status = "Đang xử lý";
        // if($orders->save()){
        //     // $orders->id;
        //     foreach($carts as $key => $item){
        //         $orderDetail = new order_detail();
        //         $orderDetail->order_id = $orders->id;
        //         $orderDetail->product_id = $key;
        //         $orderDetail->price = $item['price'];
        //         $orderDetail->quantity = $item['quantity'];
        //         $orderDetail->amount = $item['price'] * $item['quantity'];
        //         $orderDetail->size=$item['size'];
        //         $orderDetail->save();
        //     }
        // }

        // $request->session()->flush();


        // return redirect()->route('Homeindex');



        $cart= session::get('cart');
        foreach($cart->items as $key=>$value){
            $bill=new Bills;
            $bill->name=$request->name;
            $bill->email=$request->email;
            $bill->phone=$request->phone;
            $bill->address=$request->address;

            
            $bill->product_id=$key;
            $bill->quantity=$value['qty'];
            
            $product=Products::find($key);
            $bill->price=$product->Unit_price;

            $bill->save();
            session::forget('cart');
            return redirect()->route('Homeindex')->with('message','Chúc mừng bạn đã đặt hàng thành công!');
        }
    }
}
