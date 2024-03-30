<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;
use PhpParser\Node\Expr\FuncCall;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::all();
        // dd($galleries);
        return view('admin.main.gallery.index',compact('galleries'));
    }

    public function create(){
        $partners = Service::where('status',1)->get();
        return view('admin.main.gallery.create',compact('partners'));
    }

    public function store(Request $request){
       // dd($request->all());
       $request->validate([
        'partner'         => 'required',
        'title'           => 'nullable',
        'status'          => 'required',
        'image'           => 'required|image|mimes:jpg,png,jpeg,webp'
    ]);

    if ($request->hasFile('image')) {

        $path = public_path('eup/images/gallery/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        // $name = time() . '.' . $request->image->extension();
        $imageName = 'gallery'.'_'.time().uniqid().'.'.$request->image->extension();
        ResizeImage::make($request->file('image'))
            ->resize(570,480)
            ->save($path . $imageName);
    }

    Gallery::create([
        'partner'           => $request->partner,
        'title'             => $request->title,
        'image'              => $imageName,
        'status'             => $request->status,
       
    ]);

    return redirect()->back()->with('success','Gallery created successfully!');
    }


    public function edit($id)
    {
        $gallery = Gallery::where('id',$id)->first();
        $partners = Service::where('status',1)->get();
        return view('admin.main.gallery.edit',compact('gallery','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $gallery = Gallery::where('id',$id)->first();
        // dd($gallery);
            // dd($request->all());
          
            $image_path = public_path('eup/images/gallery/'.$gallery->image);
            if(file_exists($image_path)){
              unlink($image_path);
            }
     
         if ($request->hasFile('image')) {
             $path = public_path('eup/images/gallery/');
             !is_dir($path) &&
                 mkdir($path, 0777, true);
     
             // $name = time() . '.' . $request->image->extension();
             $imageName = 'gallery'.'_'.time().uniqid().'.'.$request->image->extension();
             ResizeImage::make($request->file('image'))
             ->resize(570,480)
                 ->save($path . $imageName);


                    $gallery->title    = $request->title;
                    $gallery->partner   = $request->partner;
                    $gallery->image       = $imageName;
                    $gallery->status    = $request->status;
                    $gallery->save();
                
         }else{
            $gallery->title    = $request->title;
            $gallery->partner   = $request->partner;
            $gallery->status    = $request->status;
            $gallery->save();
         }
         
                   

         return redirect()->back()->with('success','Gallery updated successfully!');
    }

    // ::::::::::::::::::::::::::FUNNAB GALLERY ROUTE::::::::::::::::::::::::::::::::::::::
    public function funnab_index(){

        $galleries = Gallery::where("partner","funnab")->paginate(12);
        // dd($galleries);
        return view("admin.funnab.gallery.index",compact('galleries'));
    }

    public function funnab_create(){
        $partners = Service::where('status',1)->get();
        return view("admin.funnab.gallery.create",compact("partners"));
    }

    public function funnab_edit($id){
        $gallery = Gallery::where('id',$id)->first();
        $partners = Service::where('status',1)->get();
        return view('admin.funnab.gallery.edit',compact('gallery','partners'));
    }

    // ::::::::::::::::::::::::::FUNNAB GALLERY ROUTE::::::::::::::::::::::::::::::::::::::

        // ::::::::::::::::::::::::::ALHIKMAH GALLERY ROUTE::::::::::::::::::::::::::::::::::::::
    public function alhikmah_index(){

        $galleries = Gallery::where("partner","alhikmah")->paginate(12);
        // dd($galleries);
        return view("admin.alhikmah.gallery.index",compact('galleries'));
    }

    public function alhikmah_create(){
        $partners = Service::where('status',1)->get();
        return view("admin.alhikmah.gallery.create",compact("partners"));
    }

    public function alhikmah_edit($id){
        $gallery = Gallery::where('id',$id)->first();
        $partners = Service::where('status',1)->get();
        return view('admin.alhikmah.gallery.edit',compact('gallery','partners'));
    }
        // ::::::::::::::::::::::::::ALHIKMAH GALLERY ROUTE::::::::::::::::::::::::::::::::::::::
}
