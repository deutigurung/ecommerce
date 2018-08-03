<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id','DESC')->get();
        return view('admin.banners.banner-index',['banners'=>$banners]);
    }

    public function create()
    {
        return view('admin.banners.banner-create');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'banner_name' => 'required|max:100',
            'description' => 'required|max:200',
            'status' => 'required|in:1,0',
            'banner_image' => 'required|mimes:jpeg,jpg,png,gif,svg,bmp'
        ]);

        $banner = new Banner();
        $banner->banner_name = $request->input('banner_name');
        $banner->description = $request->input('description');
        $banner->status = $request->input('status');

        if($request->hasFile('banner_image')) {
            $photo = $request->file('banner_image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/banner';
            $photo_name = $destination . '/' . md5(time()) . '.' . $extension;
            $photo->move($destination, $photo_name);
            $banner->banner_image = $photo_name;
        }
        //dd($banner->banner_image);
       /* if($validator ->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }*/
        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Banner created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.banner-edit', ['banner' => $banner]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'banner_name' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable',
            'banner_image' => 'nullable'
        ]);

        $banner = Banner::find($id);
        $banner->banner_name = $request->input('banner_name');
        $banner->description = $request->input('description');
        $banner->status = $request->input('status');

        if($request->hasFile('banner_image')) {
            $photo = $request->file('banner_image');
            $extension = $photo->getClientOriginalExtension();
            $destination = 'uploads/banner';
            $photo_name = $destination . '/' . md5(time()) . '.' . $extension;
            if (isset($banner->banner_image) && app('files')->exists($banner->banner_image)) {
                app('files')->delete($banner->banner_image);
            }
            $photo->move($destination, $photo_name);
            $banner->banner_image = $photo_name;
        }
        if($validator ->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        if (isset($banner->banner_image) && app('files')->exists($banner->banner_image)) {
            app('files')->delete($banner->banner_image);
        }
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner deleted successfully.');
    }
}