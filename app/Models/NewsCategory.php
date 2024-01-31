<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'slug', 'status'];

    public function newslist()
    {
        return $this->hasMany('App\News');
    }

}
