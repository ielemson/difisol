<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Service::where('status',1)->get();
        $medias = Media::paginate(9);
        return view("admin.main.media.index",compact('partners','medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Service::where('status',1)->get();
        return view("admin.main.media.create",compact('partners'));
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
        'partner'         => 'required',
        'title'       => 'required',
        'status'   => 'required',
        'description'   =>'required',
        'mediafile'  => 'nullable|mimes:zip,pdf,xlx,csv,doc,docx,xlsx,mp4,video',
        'cover_img'  => 'nullable|image|mimes:jpg,png,jpeg',
        'video_link'  => 'nullable'
    ]);

    if ($request->hasFile('mediafile') && $request->hasFile('cover_img')) {
        $mediaName = 'media'.'_'.time().uniqid().'.'.$request->mediafile->extension();
        $request->mediafile->move(public_path('eup/media/'), $mediaName);

        // IMAGE COVER
        $path = public_path('eup/media/');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        $coverImageName = 'cover_img_'.time().uniqid().'.'.$request->cover_img->getClientOriginalExtension();
        ResizeImage::make($request->file('cover_img'))
            ->resize(756, 537)
            ->save($path . $coverImageName);

            Media::create([
                'partner'     => $request->partner,
                'title'       => $request->title,
                'mediafile'   => $mediaName,
                'status'      => $request->status,
                'description'      => $request->description,
                'video_link'  => $request->video_link,
                'cover_img'   => $coverImageName,
                'media_type'  => $request->media_type,
               
            ]);
        
            return redirect()->back()->with('success','Media created successfully!');
    }

    if ($request->hasFile('mediafile')) {
        $mediaName = 'media'.'_'.time().uniqid().'.'.$request->mediafile->extension();
        $request->mediafile->move(public_path('eup/media/'), $mediaName);

            Media::create([
                'partner'      => $request->partner,
                'title'        => $request->title,
                'mediafile'    => $mediaName,
                'status'       => $request->status,
                'description'       => $request->description,
                'video_link'   => $request->video_link,
                'media_type'   => $request->media_type,
               
            ]);
        
    return redirect()->back()->with('success','Media created successfully!');
    }

    if ($request->hasFile('cover_img')) {
        // IMAGE COVER
        $path = public_path('eup/media/');
        !is_dir($path) &&
            mkdir($path, 0777, true);
        $coverImageName = 'cover_img_'.time().uniqid().'.'.$request->cover_img->getClientOriginalExtension();
        ResizeImage::make($request->file('cover_img'))
            ->resize(756, 537)
            ->save($path . $coverImageName);

            Media::create([
                'partner'     => $request->partner,
                'title'       => $request->title,
                'cover_img'   => $coverImageName,
                'status'      => $request->status,
                'description'      => $request->description,
                'video_link'  => $request->video_link,
                'media_type'  => $request->media_type,
               
            ]);
        
    return redirect()->back()->with('success','Media created successfully!');
    }

    Media::create([
        'partner'           => $request->partner,
        'title'             => $request->title,
        'status'            => $request->status,
        'description'            => $request->description,
        'video_link'        => $request->video_link,
        'media_type'        => $request->media_type,
       
    ]);

return redirect()->back()->with('success','Media created successfully!');
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
        $media = Media::where('id',$id)->first();
        $partners = Service::where('status',1)->get();
        return view('admin.main.media.edit',compact('media','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get media file for update
    $media = Media::where('id',$id)->first();
       $request->validate([
        'partner'         => 'required',
        'title'       => 'required',
        'status'   => 'required',
        'mediafile'  => 'nullable|mimes:zip,pdf,xlx,csv,doc,docx,xlsx,video,mp4'
    ]);


    if ($request->hasFile('cover_img') && $request->hasFile('mediafile')) {

        if($media->cover_img) {

            unlink(public_path('eup/media/') . $media->cover_img);
        }

        if($media->mediafile) {

            unlink(public_path('eup/media/') . $media->mediafile);
        }


        $path = public_path('eup/media/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $coverImageName = 'cover_img_'.time().uniqid().'.'.$request->cover_img->getClientOriginalExtension();
            ResizeImage::make($request->file('cover_img'))
                ->resize(756, 537)
                ->save($path . $coverImageName);


                $mediaName = 'media'.'_'.time().uniqid().'.'.$request->mediafile->extension();
                $request->mediafile->move(public_path('eup/media/'), $mediaName);

             $media->partner = $request->partner;
             $media->title = $request->title;
             $media->cover_img = $coverImageName;
             $media->mediafile = $mediaName;
             $media->status = $request->status;
             $media->video_link = $request->video_link;
             $media->media_type = $request->media_type;
             $media->save();

             return redirect()->back()->with('success','Media updated created successfully!');
    }


    if ($request->hasFile('cover_img')) {

        if($media->cover_img) {

            unlink(public_path('eup/media/') . $media->cover_img);
        }
        $path = public_path('eup/media/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $coverImageName = 'cover_img_'.time().uniqid().'.'.$request->cover_img->getClientOriginalExtension();
            ResizeImage::make($request->file('cover_img'))
                ->resize(756, 537)
                ->save($path . $coverImageName);

             $media->partner = $request->partner;
             $media->title = $request->title;
             $media->cover_img = $coverImageName;
             $media->status = $request->status;
             $media->video_link = $request->video_link;
             $media->media_type = $request->media_type;
             $media->save();
             return redirect()->back()->with('success','Media updated created successfully!');
    }

    
    if ($request->hasFile('mediafile')) {
    {
        if($media->mediafile) {

            unlink(public_path('eup/media/') . $media->mediafile);
        }

        $mediaName = 'media'.'_'.time().uniqid().'.'.$request->mediafile->extension();
        $request->mediafile->move(public_path('eup/media/'), $mediaName);

             $media->partner = $request->partner;
             $media->title = $request->title;
             $media->mediafile = $mediaName;
             $media->status = $request->status;
             $media->video_link = $request->video_link;
             $media->media_type = $request->media_type;
             $media->save();
             return redirect()->back()->with('success','Media updated successfully!');
      
    }
    

    }

    $media->partner = $request->partner;
    $media->title = $request->title;
    $media->status = $request->status;
    $media->video_link = $request->video_link;
    $media->media_type = $request->media_type;
    $media->save();

    return redirect()->back()->with('success','Media updated successfully!');
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
