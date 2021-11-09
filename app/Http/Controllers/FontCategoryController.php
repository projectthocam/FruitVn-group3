<?php

namespace App\Http\Controllers;

use App\Sliders;
use App\Typeproducts;
use App\Products;
use Illuminate\Http\Request;

class FontCategoryController extends Controller
{
    private $slider;
    private $typeproducts;
    private $product;
    public function __construct(Sliders $slider, Typeproducts $typeproducts, Products $product)
    {
        $this->slider = $slider;
        $this->typeproducts = $typeproducts;
        $this->product = $product;
    }
    public function index($slug,$categoryId){

        $categoryList = $this->typeproducts->where('parent_id',0)->take(2)->get();
        $category = $this->typeproducts->where('parent_id',0)->latest()->get();
        $products = $this->product->where('category_id',$categoryId)->paginate(6);
        return view('products.category.list',compact('categoryList','products','category'));
    }

    public function showProduct($slug,$productId){

        $categoryList = $this->typeproducts->where('parent_id',0)->take(2)->get();
        $category = $this->typeproducts->where('parent_id',0)->latest()->get();
        $products = $this->product->where('category_id',$productId)->paginate(6);
        return view('products.product_detail.list',compact('categoryList','products','category'));
    }
}
