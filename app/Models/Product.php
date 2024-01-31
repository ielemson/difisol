<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','image','price','desc','status','file','slug','competiton_status'];

    function categories(){

        return $this->belongsToMany(Category::class);
        }

        public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
