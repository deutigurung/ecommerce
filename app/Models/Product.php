<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryProduct($cate_id)
    {
        $getCate = $this->cate_id;
        $search = Category::select('cate_title')->where('id',$getCate)->get();
        return ($search);
    }
}
