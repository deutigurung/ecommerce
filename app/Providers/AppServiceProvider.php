<?php

namespace App\Providers;

use App\Models\Banner;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $banners = Banner::where('status',1)->get();
        $products = Product::orderBy('created_at','desc')->limit(20)->get();
        $categories = Category::where('is_parent',0)->get();
        $current_page = request()->path();
        // dd($current_page);
        view()->composer('*',function($view) use($banners,$products,$categories,$current_page){
            $view->with([
                'banners'=>$banners,
                'products'=>$products,
                'categories'=>$categories,
                'current_page'=>$current_page,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
