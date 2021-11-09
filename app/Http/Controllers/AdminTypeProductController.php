<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Products;
use App\Typeproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminTypeProductController extends Controller
{
    private $typeproducts;
    private $product;
    public function __construct(Typeproducts $category,Products $product)
    {
        $this->typeproducts = $category;
        $this->product = $product;
    }
    public function index()
    {
        $categories = $this->typeproducts->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentid = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        // dd(category::where('name',$request->name)->count(),$request->name);

        if($this->typeproducts::where('name',$request->name)->count()){
            return redirect()->back()->with('alert_category','Tên danh mục đã có rồi!!');
        }

        $this->typeproducts->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->name
        ]);
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->typeproducts->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }


    public function getCategory($parentId)
    {
        $data = $this->typeproducts->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }


    public function update($id, Request $request)
    {
        $this->typeproducts->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->name
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id){

        // $n=$this->category->find($id)->products->count();
        /*$n=$this->typeproducts::find($id)->products->count();
        if (0){
            Log::error('Lỗi không thể xoá vì đã có sản phẩm  ' );
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail'
            ],500);
        }
        else{
            $this->typeproducts::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success'
            ],200);
        }
        return redirect()->route('categories.index');*/
         try{
             $this->typeproducts->find($id)->delete();
            $this->product->where('category_id',$id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success'
            ],200);
        }catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '---line ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail'
            ],500);
         }

         return redirect()->route('categories.index');
    }
}
