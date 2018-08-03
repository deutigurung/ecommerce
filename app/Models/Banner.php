<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = ['banner_name','description','status','banner_image'];

    public function status(){
        if($this->status == 1){
            return "Active";
        }else{
            return "Inactive";
        }
    }
}
