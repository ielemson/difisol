<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class FunnabHomeController extends Controller
{
    //


    public function index(){
        $category = NewsCategory::where('name','funnab')->first();
        
        $news = News::where('status',1)->where('category_id',$category->id)->orderBy('id', 'DESC')->paginate(6);
        // dd($news);
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        // $features = Features::all();
        $sliders = Slider::where('status',1)->orderBy('id','ASC')->get();
        // dd($sliders);
        
        return view('frontend.funnab.master', compact('news','sliders','NewsFooter','services'));
        // return view('frontend.funnab.master');
    }


    public function single_news($slug){
        $category = NewsCategory::where('status',1)->where('name','funnab')->first();
        $news = News::where('slug',$slug)->first();
        $news_latest = News::where('status',1)->where('category_id',$category->id)->orderBy('id', 'DESC')->paginate(6);
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.news',compact('news','services','NewsFooter','services','news_latest'));
    }
}
