<?php

namespace App\Http\Controllers;

use App\Typeproducts;
use App\Products;
use Illuminate\Http\Request;

class ProductDetail extends Controller
{
    private $typeproducts;
    private $product;
    public function __construct(Typeproducts $typeproducts,Products $product)
    {
        $this->typeproducts = $typeproducts;
        $this->product = $product;
    }

    public function index($id){
        $ProductDetail = $this->product->find($id);
        $category = $this->typeproducts->where('parent_id',0)->latest()->get();
        $products = $this->product->latest()->take(6)->get();
        $productRecommend = $this->product->latest('views_count','desc')->take(6)->get();
        $categoryList = $this->typeproducts->where('parent_id',0)->take(2)->get();
        $commentRoute = route('comments.userComment');
        // dd($commentRoute);
        return view('products.product_detail.list',compact('ProductDetail','category','products','productRecommend','categoryList','commentRoute','id'));
    }
}
