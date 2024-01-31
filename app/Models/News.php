<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'details', 'image', 'category_id', 'status', 'featured', 'view_count','published_at','meta_title','meta_description','meta_keywords','type'];

    
    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
