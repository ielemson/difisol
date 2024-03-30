<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
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
        $galleries = Gallery::where('status',1)->get();
        // dd($sliders);
        
        return view('frontend.funnab.master', compact('news','sliders','NewsFooter','services','galleries'));
        // return view('frontend.funnab.master');
    }

    public function news(){

       
        // // UAES:::;
        // $category_uaes = NewsCategory::where('status',1)->where('name','funnab')->first();
        // $uaes_news = News::where('category_id',$category_uaes->id)->get();
        // // UAES:::;

        // FUNAAB:::::
        $category_funnab = NewsCategory::where('status',1)->where('name','funnab')->first();
        $funnab_news = News::where('category_id',$category_funnab->id)->get();
        // FUNAAB:::::
        
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.funnab.news',compact('services','NewsFooter','services','funnab_news'));
    }

    public function single_news($slug){
        $category = NewsCategory::where('status',1)->where('name','funnab')->first();
        $news = News::where('slug',$slug)->first();
        $news_latest = News::where('status',1)->where('category_id',$category->id)->orderBy('id', 'DESC')->paginate(6);
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.news',compact('news','services','NewsFooter','services','news_latest'));
    }

    public function gallery(){
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        $galleries = Gallery::where('status',1)->where('partner','funnab')->get();
        return view('frontend.funnab.gallery',compact('NewsFooter','services','galleries'));
    }
}
