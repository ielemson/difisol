<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = NewsCategory::where('name','uaes')->first();
        
        $news = News::where('status',1)->where('category_id',$category->id)->orderBy('id', 'DESC')->paginate(6);
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        // $features = Features::all();
        $sliders = Slider::where('status',1)->orderBy('id','ASC')->get();
        // dd($sliders);
        
        return view('frontend.main.master', compact('news','sliders','NewsFooter','services'));

        // return view('frontend.main.master',compact('seo_title'));
    }

    public function aboutUs(){
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.about',compact('NewsFooter','services'));
    }

    public function contactUs(){
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.contact',compact('NewsFooter','services'));
    }
    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('sites.clear-cache');
    }
   
    public function single_news($slug){
        $category = NewsCategory::where('status',1)->where('name','uaes')->first();
        $news = News::where('slug',$slug)->first();
        $news_latest = News::where('status',1)->where('category_id',$category->id)->orderBy('id', 'DESC')->paginate(6);
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.news',compact('news','services','NewsFooter','services','news_latest'));
    }


    public function all_news(){

        // UAES:::;
        $category_uaes = NewsCategory::where('status',1)->where('name','uaes')->first();
        $uaes_news = News::where('category_id',$category_uaes->id)->get();
        // UAES:::;

        // FUNAAB:::::
        $category_funnab = NewsCategory::where('status',1)->where('name','funnab')->first();
        $funnab_news = News::where('category_id',$category_funnab->id)->get();
        // FUNAAB:::::
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.allnews',compact('uaes_news','services','NewsFooter','services','funnab_news'));
    }
}
