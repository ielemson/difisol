<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Service;
use App\Models\Slider;
class AhikmahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = NewsCategory::where('name','alhikmah')->first();
        
        $news = News::where('status',1)->where('category_id',$category->id)->orderBy('id', 'DESC')->paginate(6);
        // dd($news);
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        // $features = Features::all();
        $sliders = Slider::where('status',1)->orderBy('id','ASC')->get();
        $galleries = Gallery::where('status',1)->get();
        // dd($sliders);
        
        return view('frontend.alhikmah.master', compact('news','sliders','NewsFooter','services','galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        // ALHIKMAH:::::
        $category_alhikmah = NewsCategory::where('status',1)->where('name','alhikmah')->first();
        $alhikmah_news = News::where('category_id',$category_alhikmah->id)->where('status',1)->where('type',"news")->get();
        // ALHIKMAH:::::
        
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        $services = Service::where('status',1)->get();
        return view('frontend.alhikmah.news',compact('services','NewsFooter','services','alhikmah_news'));
    }


    public function activities(){
        $category_id = NewsCategory::where('name','alhikmah')->first();
        $activities = News::where('status',1)->where('category_id',$category_id->id)->where('type','activity')->orderBy('id', 'DESC')->paginate(10);
        $services = Service::where('status',1)->get();
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        return view("frontend.alhikmah.activities",compact('activities','services','NewsFooter'));

        }

        public function gallery(){
            $NewsFooter = News::where('status',1)->where('type','news')->orderBy('id', 'DESC')->paginate(3);
            $services = Service::where('status',1)->get();
            $galleries = Gallery::where('status',1)->where("partner","alhikmah")->get();
            return view('frontend.alhikmah.gallery',compact('NewsFooter','services','galleries'));
        }

}
