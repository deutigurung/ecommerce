<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.categories.cate-index',['categories'=>$categories]);
    }

    public function create()
    {
        $parents = Category::where('is_parent',0)->get();
        return view('admin.categories.cate-create',['parents'=>$parents]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'cate_title' => 'required|max:100',
            'summary' => 'required|max:200',
            'is_parent' => 'nullable',
            'status' => 'required|in:1,0',
            'image' => 'required|mimes:jpeg,jpg,png,gif,svg,bmp'
        ]);

        $category = new Category();
        $category->cate_title = $request->input('cate_title');
        $category->cate_slug = str_slug($request->input('cate_title'));
        $category->summary = $request->input('summary');
        $category->is_parent = $request->input('is_parent');
        $category->status = $request->input('status');

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/category';
            $photo_name = $destination.'/'.md5(time()).'.'.$extension;
            $photo->move($destination,$photo_name);
            $category->image = $photo_name;
        }
       /* if($validator ->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }*/
        $category->save();
        return redirect()->route('admin.category.index')->with('success','Category added successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $parents = Category::where('is_parent',0)->get();
        return view('admin.categories.cate-edit',['category'=>$category,'parents'=>$parents]);
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'cate_title' => 'nullable|max:100',
            'slug' => 'nullable|max:100',
            'summary' => 'nullable|max:200',
            'is_parent' => 'nullable',
            'status' => 'nullable|in:1,0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg,bmp'
        ]);
        $category = Category::find($id);
        $category->cate_title = $request->input('cate_title');
        $category->cate_slug = str_slug($request->input('cate_title'));
        $category->summary = $request->input('summary');
        $category->is_parent = $request->input('is_parent');
        $category->status = $request->input('status');

        if($request->hasFile('image')) {
            $photo = $request->file('image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/category';
            $photo_name = $destination . '/' . md5(time()) . '.' . $extension;
            if(isset($category->image) && app('files')->exists($category->image)){
                app('files')->delete($category->image);
            }
            $photo->move($destination, $photo_name);
            $category->image = $photo_name;
        }
       /* if($validator ->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }*/
        $category->save();
        return redirect()->route('admin.category.index')->with('success','Category updated successfully!');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        if(isset($category->image) && app('files')->exists($category->image)){
            app('files')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('success','Category deleted successfully!');
    }

}
