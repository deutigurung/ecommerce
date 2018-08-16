<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    public function getAll()
    {
        return view('fronts.home');
    }

    public function showProduct($id)
    {
        $product = Product::find($id);
        $other_products = Product::where('id','<>',$id)->get();
        return view('fronts.products.details',['product'=>$product,'other_products'=>$other_products]);
    }

    public function searchProduct(Request $request)
    {
        //dd($request->all());
        $keyword = $request->input('keyword');
        $cate_id = $request->input('cate_id');

        $searchData = Product::query();
        $searchData ->where('status',1);

        if($keyword){
            $searchData = $searchData->where('name','like','%'.$keyword.'%')
                ->orWhere('summary','like','%'.$keyword.'%')
                ->orWhere('description','like','%'.$keyword.'%');
        }

        if($cate_id){
            $searchData = $searchData->where('cate_id',$cate_id);
        }

        $searchData = $searchData->get();
        return view('fronts.search',['searchData' => $searchData ]);
    }

    public function getProductByCategory($id)
    {
        $product_category = Product::where('cate_id',$id)->orWhere('child_cate_id',$id)->get();
       // dd($product_category);
        return view('fronts.products.product',['product_category'=>$product_category]);
    }
}
