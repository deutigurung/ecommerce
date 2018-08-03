<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['cate_title'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function status(){
        if($this->status == 1){
            return "Active";
        }else{
            return "Inactive";
        }
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'is_parent');
    }

    public function getCategoryTitle($is_parent)
    {
        if($is_parent){
            $data = $this->where('id',$is_parent)->get();
            if($data){
                return $data[0]->cate_title;
            }
        }else{
            return '---';
        }

    }

    public function getChildCategory()
    {
        return $this->where('is_parent','<>',0)->get();
    }

}
