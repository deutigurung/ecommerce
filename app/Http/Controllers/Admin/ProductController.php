<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.products.index',['products'=>$products]);
    }

    public function create()
    {
        $categories = Category::where('is_parent',0)->get();
        return view('admin.products.create',['categories' => $categories]);
    }

    public function getChildCategry($category_id){
        $categories = Category::where('is_parent',$category_id)->get();
        return response()->json(['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'summary' => 'required|max:100',
            'description' => 'required|max:300',
            'cate_id' => 'required',
            'child_cate_id' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'status' => 'required|in:1,0',
            'images' => 'required|mimes:jpeg,jpg,png,svg,gif,bmp'
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->summary = $request->input('summary');
        $product->description = ($request->input('description'));
        $product->cate_id = $request->input('cate_id');
        $product->child_cate_id = $request->input('child_cate_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->status = $request->input('status');

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/product';
            $photo_name = $destination.'/'.md5(time()).'.'.$extension;
            $photo->move($destination,$photo_name);
            $product->image = $photo_name;
        }
        $product->save();
        return redirect()->route('admin.product.index')->with('success','Product added successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $product = Product::find($id);
        $categories = Category::where('is_parent',0)->get();
       return view('admin.products.edit',['product'=>$product,'categories'=>$categories]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'nullable|max:100',
            'summary' => 'nullable|max:100',
            'description' => 'nullable|max:300',
            'cate_id' => 'nullable',
            'child_cate_id' => 'nullable',
            'price' => 'nullable',
            'discount' => 'nullable',
            'status' => 'nullable|in:1,0',
            'images' => 'nullable|images|mimes:jpeg,jpg,png,svg,gif,bmp'
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = ($request->input('description'));
        $product->summary = $request->input('summary');
        $product->cate_id = $request->input('cate_id');
        $product->child_cate_id = $request->input('child_cate_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->status = $request->input('status');

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/product';
            $photo_name = $destination.'/'.md5(time()).'.'.$extension;
            if(isset($product->image) && app('files')->exists($product->image)){
                app('files')->delete($product->image);
            }
            $photo->move($destination,$photo_name);
            $product->image = $photo_name;
        }
        $product->save();
        return redirect()->route('admin.product.index')->with('success','Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if(isset($product->image) && app('files')->exists($product->image)){
            app('files')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted successfully!');

    }


}
