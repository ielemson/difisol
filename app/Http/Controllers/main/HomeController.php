<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use App\Models\ContactUs;
use App\Models\Gallery;
use App\Models\Media;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

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
        
        $news = News::where('status',1)->where('category_id',$category->id)->where('type','news')->orderBy('id', 'DESC')->paginate(6);
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        $services = Service::where('status',1)->get();
        // $features = Features::all();
        $sliders = Slider::where('status',1)->orderBy('id','ASC')->get();
        $galleries = Gallery::where('status',1)->get();
        // dd($sliders);
        
        return view('frontend.main.master', compact('news','sliders','NewsFooter','services','galleries'));

        // return view('frontend.main.master',compact('seo_title'));
    }

    public function aboutUs(){
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        $services = Service::where('status',1)->get();
        return view('frontend.about',compact('NewsFooter','services'));
    }

    public function our_gallery(){
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        $services = Service::where('status',1)->get();
        $galleries = Gallery::where('status',1)->where("partner","uaes")->get();
        return view('frontend.gallery',compact('NewsFooter','services','galleries'));
    }

    public function contactUs(){
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        $services = Service::where('status',1)->get();
        return view('frontend.contact',compact('NewsFooter','services'));
    }
    public function contactUsForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ]);
        
        // $user =  User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'password' => $request->password,
        // ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message
        ];

        ContactUs::create($details);
        // return back()->with('success','Great! We have received your message');
         // $userEmail = $request->email;
         Mail::to("info@eup-uaes.ng")->send(new ContactMessage($details));
 
         if (Mail::failures()) {
             //  return response()->Fail('Sorry! Please try again latter');
             return back()->with('error','Sorry! Please try again latter');
         }else{
             //  return response()->success('Great! Successfully send in your mail');
             return back()->with('success','Great! We have received your message');
            }
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function clearWebsiteCache()
    {
        Artisan::call('cache:clear');
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        $services = Service::where('status',1)->get();
        return view('frontend.clear-cache',compact("services","NewsFooter"));
    }
   
    public function single_news($slug){
        $category = NewsCategory::where('status',1)->where('name','uaes')->first();
        $news = News::where('slug',$slug)->first();
        $news_latest = News::where('status',1)->where('category_id',$category->id)->where('type','news')->orderBy('id', 'DESC')->paginate(6);
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
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

        // FUNAAB:::::
        $category_alhikmah = NewsCategory::where('status',1)->where('name','alhikmah')->first();
        $alhikmah_news = News::where('category_id',$category_alhikmah->id)->get();
        // FUNAAB:::::

        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        $services = Service::where('status',1)->orderBy('id', 'DESC')->paginate(8);
        return view('frontend.allnews',compact('uaes_news','services','NewsFooter','services','funnab_news','alhikmah_news'));
    }

    public function media(){
        $medias = Media::where("status",1)->paginate(12);
        $services = Service::where('status',1)->get();
        // $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        return view("frontend.media",compact('medias','services','NewsFooter'));
    }
    public function media_details($id){
        $media = Media::where("id",$id)->first();
        $services = Service::where('status',1)->get();
        // $NewsFooter = News::where('status',1)->where('type','news')->orderBy('id', 'DESC')->paginate(1);
        $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
        return view("frontend.media_detail",compact('media','services','NewsFooter'));
    }

        public function activities(){
        $activities = News::where('status',1)->where('type','activity')->orderBy('id', 'DESC')->paginate(10);
        $services = Service::where('status',1)->get();
        $NewsFooter = News::where('status',1)->orderBy('id', 'DESC')->paginate(3);
        return view("frontend.activities",compact('activities','services','NewsFooter'));

        }


        public function activity($slug){
            $category = NewsCategory::where('status',1)->where('name','uaes')->first();
            $activity = News::where('slug',$slug)->first();
            $activity_latest = News::where('status',1)->where('category_id',$category->id)->where('type','activity')->orderBy('id', 'DESC')->paginate(6);
            $NewsFooter = News::inRandomOrder()->where('status',1)->where('type','news')->limit(2)->get();
            $services = Service::where('status',1)->get();
            return view("frontend.activity",compact('activity','services','NewsFooter','activity_latest'));
        } 

    
  
}
