<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Intervention\Image\Facades\Image as ResizeImage;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    
    public function edit(){
        $setting = Setting::find(1);
        // $currencies = Currency::where('status',1)->get();
		return view('admin.main.setting.edit',compact('setting'));
    }

    public function update(Request $request, $id=1)
	{
        // dd($request->all());
		// $rules = [
        //     'website_title' 			=> 'nullable|string',
        //     'website_logo_dark'         => 'nullable|string',
        //     // 'website_logo_light'        => 'nullable|string',
        //     // 'website_logo_small'        => 'nullable|string',
        //     'website_favicon'           => 'nullable|string',
        //     'meta_title'                => 'nullable|string',
        //     'meta_description'          => 'nullable|string',
        //     'meta_tag'                  => 'nullable|string',
        //     'address'                   => 'nullable|string',
        //     'phone'                     => 'nullable|string',
        //     'email'                     => 'nullable|string',
        // ];
        
        // $messages = [];

        // $this->validate($request, $rules, $messages);
		// $input = $request->all();

		// $setting = Setting::find($id);
        // if (empty($input['website_logo'])) {
        //     $input['website_logo'] = $setting->website_logo;
        // }
        // if (empty($input['website_logo_small'])) {
        //     $input['website_logo_small'] = $setting->website_logo_small;
        // }
        // if (empty($input['website_favicon'])) {
        //     $input['website_favicon'] = $setting->website_favicon;
        // }

        // try {
		// 	$setting->update($input);
        //     // Toastr::success(__('setting.message.update.success'));
		//     return redirect()->route('website-setting.edit');
		// } catch (Exception $e) {
        //     // Toastr::success(__('setting.message.update.error'));
		//     return redirect()->route('website-setting.edit');
		// }

         $setting = Setting::find($id);
        //  $website_logo = '';
        //  $website_favicon='';
        if ($request->hasFile('website_logo') && empty($request->website_favicon)) {
            // $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('assets/images/news'), $imageName);
            $path = public_path('assets/images/settings/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $website_logo = 'website_logo-'.time().uniqid().'.'.$request->website_logo->extension();
            ResizeImage::make($request->file('website_logo'))
                // ->resize(1120, 700)
                ->save($path . $website_logo);

                $setting->website_title =  $request->website_title;
                $setting->address =  $request->address;
                $setting->phone =  $request->phone;
                $setting->email =  $request->email;
                $setting->motto =  $request->motto;
                $setting->facebook =  $request->facebook;
                $setting->twitter =  $request->twitter;
                $setting->instagram =  $request->instagram;
                $setting->linkedin =  $request->linkedin;
                $setting->about =  $request->about;
                $setting->about_title =  $request->about_title;
                $setting->vision =  $request->vision;
                $setting->mission =  $request->mission;
                // $setting->website_favicon =  $website_favicon;
                $setting->website_logo =  $website_logo;
                $setting->meta_tag =  $request->meta_tag;
                $setting->meta_title =  $request->meta_title;
                $setting->meta_description =  $request->meta_description;
                $setting->website_description =  $request->website_description;
                $setting->save();

        }elseif ($request->hasFile('website_favicon') && empty($request->website_logo)) {
            // $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('assets/images/news'), $imageName);
            $path = public_path('assets/images/settings/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $website_favicon = 'website_favicon-'.time().uniqid().'.'.$request->website_favicon->extension();
            ResizeImage::make($request->file('website_favicon'))

                // ->resize(1120, 700)
                ->save($path . $website_favicon);
                $setting->website_title =  $request->website_title;
                $setting->address =  $request->address;
                $setting->phone =  $request->phone;
                $setting->email =  $request->email;
                $setting->motto =  $request->motto;
                $setting->facebook =  $request->facebook;
                $setting->twitter =  $request->twitter;
                $setting->instagram =  $request->instagram;
                $setting->linkedin =  $request->linkedin;
                $setting->vision =  $request->vision;
                $setting->mission =  $request->mission;
                $setting->website_favicon =  $website_favicon;
                $setting->about =  $request->about;
                $setting->about_title =  $request->about_title;
                $setting->meta_tag =  $request->meta_tag;
                $setting->meta_title =  $request->meta_title;
                $setting->website_description =  $request->website_description;
                $setting->meta_description =  $request->meta_description;
                $setting->save();
        }else{
            $setting->website_title =  $request->website_title;
            $setting->address =  $request->address;
            $setting->phone =  $request->phone;
            $setting->email =  $request->email;
            $setting->motto =  $request->motto;
            $setting->facebook =  $request->facebook;
            $setting->twitter =  $request->twitter;
            $setting->instagram =  $request->instagram;
            $setting->linkedin =  $request->linkedin;
            $setting->vision =  $request->vision;
            $setting->mission =  $request->mission;
            // $setting->website_favicon =  $website_favicon;
            // $setting->website_logo =  $website_logo;
            $setting->about =  $request->about;
            $setting->about_title =  $request->about_title;
            $setting->meta_tag =  $request->meta_tag;
            $setting->meta_title =  $request->meta_title;
            $setting->meta_description =  $request->meta_description;
            $setting->website_description  =  $request->website_description;
            $setting->save();
        }
        return redirect()->back()->with('success','Settings updated successfully!');
    }
}
