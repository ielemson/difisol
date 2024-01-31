<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ResizeImage;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $news = News::all();
        // $news = News::orderBy('id', 'DESC')->get();
// dd($request->all())
        $news = News::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->where('category_id',$s)
                        ->orderBy('id', 'DESC')->get();
                }
            }]
        ])->orderBy('id', 'DESC')->paginate(18);

        // $shareComponent = \Share::page(
        //     'https://fmapmedia.com/',
        //     'Click here to share',
        // )
        // ->facebook()
        // ->twitter()
        // ->instagram();
        
        $shareButtons = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        // ->linkedin()
        // ->telegram()
        ->whatsapp();       
        // ->reddit();
        $categories = NewsCategory::all();
        return view('admin.main.news.index',compact('news','shareButtons','categories'));
    }

    public function category()
    {
        $categories = NewsCategory::all();
        // dd($categories);
        return view('admin.main.news.category.index',compact('categories'));
    }

    public function storeCategory(Request $request){
       
        // dd($request->all());
        // $request->validate([
        //     'name'         => 'required|unique:news_categories|max:255',
        //     'status'       => 'required',
        // ]);

        NewsCategory::create([
            'name'   => $request->cat_name,
            'slug'   => Str::slug($request->cat_name),
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'News category created successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::latest()->select('id','name')->where('status',1)->get();

        return view('admin.main.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title'         => 'required|unique:news|max:255',
            'details'       => 'required',
            'category_id'   => 'required',
            'status'        => 'required',
            'type'           => 'required',
            'published_at'   => 'required',
            'meta_title'   => 'nullable',
            'meta_description'   => 'nullable',
            'meta_keywords'   => 'nullable',
            'image'          => 'required|image|mimes:jpg,png,jpeg'
        ]);

        // if(isset($request->status)){
        //     $status = true;
        // }else{
        //     $status = false;
        // }

        // if(isset($request->featured)){
        //     $featured = true;
        // }else{
        //     $featured = false;
        // }

        if ($request->hasFile('image')) {
            // $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('assets/images/news'), $imageName);
            $path = public_path('assets/images/news/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $imageName = strtolower($request->type).'-'.time().uniqid().'.'.$request->image->extension();
            ResizeImage::make($request->file('image'))
                ->resize(373, 413)
                ->save($path . $imageName);
        }

        News::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'details'       => $request->details,
            'category_id'   => $request->category_id,
            'image'         => $imageName,
            'status'        => $request->status,
            'type'          => $request->type,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'meta_title'      => $request->meta_title,
            'published_at'      => $request->published_at
        ]);

        return redirect()->back()->with('success','News created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('id',$id)->first();
        return response()->json(['news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editNews($id)
    {
        $news = News::where('id',$id)->first();
        $categories = NewsCategory::latest()->select('id','name')->where('status',1)->get();
        return view('admin.main.news.edit',compact('news','categories'));
    }

    public function updateNews(Request $request,$id){
      
// dd($request->all());
        $request->validate([
            'title'         => 'required|max:255',
            'details'       => 'required',
            'category_id'   => 'required',
            'status'        => 'required',
            'type'           => 'required',
            'published_at'   => 'required',
            'meta_title'   => 'nullable',
            'meta_description'   => 'nullable',
            'meta_keywords'   => 'nullable',
            'image'          => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $news = News::where('id',$id)->first();
        // dd($news);
        // if(isset($request->status)){
        //     $status = true;
        // }else{
        //     $status = false;
        // }

        // if(isset($request->featured)){
        //     $featured = true;
        // }else{
        //     $featured = false;
        // }

        if ($request->hasFile('image')) {
            // $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('assets/images/news'), $imageName);
            $path = public_path('assets/images/news/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $imageName = 'news-'.time().uniqid().'.'.$request->image->extension();
            ResizeImage::make($request->file('image'))
                ->resize(373, 413)
                ->save($path . $imageName);

                $news->title =  $request->title;
                $news->slug =  Str::slug($request->title);
                $news->details =  $request->details;
                $news->category_id = $request->category_id;
                $news->image = $imageName;
                $news->status = $request->status;
                $news->type = $request->type;
                $news->meta_keywords = $request->meta_keywords;
                $news->meta_description = $request->meta_description;
                $news->meta_title = $request->meta_title;
                $news->published_at = $request->published_at;
                $news->save();
        }

                $news->title =  $request->title;
                $news->slug =  Str::slug($request->title);
                $news->details =  $request->details;
                $news->category_id = $request->category_id;
                // $news->image = $imageName;
                $news->status = $request->status;
                $news->type = $request->type;
                $news->meta_keywords = $request->meta_keywords;
                $news->meta_description = $request->meta_description;
                $news->meta_title = $request->meta_title;
                $news->published_at = $request->published_at;
                $news->save();

        // $news = News::where('id',$id)->first();
       
        return redirect()->route('news.list')->with('success','News updated successfully!');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request)
    {
        // if(isset($request->status)){
        //     $status = true;
        // }else{
        //     $status = false;
        // }
        
        $category = NewsCategory::where('id',$request->id)->first();
        // return $category;
        $category->name = $request->cat_name;
        $category->status = $request->status;
        if($category->save()){
            return response()->json(['status'=>200]);
        }
        return response()->json(['status'=>204]);
        
        
    }

    public function deleteNews($id){
    
        $news = News::where('id',$id)->first();
        $newsImg = $news->image;
        $image_path = public_path('assets/images/news/'.$newsImg);
        if(File::exists($image_path)) {
          File::delete($image_path);
        }
        if($news->delete()){
            
            return response()->json(['status'=>200]);
        }
      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
