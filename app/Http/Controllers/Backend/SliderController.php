<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Intervention\Image\Facades\Image as ResizeImage;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sliders = Slider::all();
        $sliders = Slider::orderBy('id','ASC')->get();
        return view('admin.main.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return "slier";
        return view('admin.main.slider.create');
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
        'header'         => 'required',
        'content'       => 'required',
        'status'   => 'required',
        'img'        => 'required|image|mimes:jpg,png,jpeg'
    ]);

   

    if ($request->hasFile('img')) {
        $path = public_path('assets/images/sliders/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        // $name = time() . '.' . $request->image->extension();
        $imageName = 'slider'.'-'.time().uniqid().'.'.$request->img->extension();
        ResizeImage::make($request->file('img'))
            // ->resize(1600, 595)
            ->save($path . $imageName);
    }

    Slider::create([
        'header'         => $request->header,
        'content'       => $request->content,
        'img'         => $imageName,
        'status'        => $request->status,
       
    ]);

    return redirect()->back()->with('success','Slider created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::where('id',$id)->first();
        return view('admin.main.slider.edit',compact('slider'));
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
        $slider = Slider::where('id',$id)->first();
        // dd($slider);
            // dd($request->all());
            $request->validate([
             'header'         => 'required',
             'content'       => 'required',
             'status'   => 'required',
             'img'        => 'image|mimes:jpg,png,jpeg'
         ]);
     
        
     
         if ($request->hasFile('img')) {
             $path = public_path('assets/images/sliders/');
             !is_dir($path) &&
                 mkdir($path, 0777, true);
     
             // $name = time() . '.' . $request->image->extension();
             $imageName = 'slider'.'-'.time().uniqid().'.'.$request->img->extension();
             ResizeImage::make($request->file('img'))
                //  ->resize(1600, 595)
                 ->save($path . $imageName);


                    $slider->header    = $request->header;
                    $slider->content   = $request->content;
                    $slider->img       = $imageName;
                    $slider->status    = $request->status;
                    $slider->save();
                
         }else{
                    $slider->header    = $request->header;
                    $slider->content   = $request->content;
                    $slider->status    = $request->status;
                    $slider->save();
         }
         
                   

         return redirect()->back()->with('success','Slider updated successfully!');
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
