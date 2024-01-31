<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.main.partners.list',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('assets/images/partners'), $imageName);

            $service = Service::create([
                'header' => $request->header,
                'content' => $request->content,
                'status' => $request->status,
                'image' => $imageName,
               ]);

            
            if ($service) {
                // assign new role to the user
                // $user->syncRoles($request->role);
                return redirect('partner/create')->with('success', 'New partner created!');
            }

            return redirect('partner/create')->with('error', 'Failed to create new partner! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
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
    $service = Service::where('id',$id)->first();
    return view('admin.main.partners.edit',compact('service'));
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
        $service = Service::where('id',$id)->first();

        try {
            if ($request->has('image')) {
           
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('assets/images/partners'), $imageName);

            $service->header = $request->header;
            $service->content = $request->content;
            $service->status = $request->status;
            $service->image = $imageName;
            $service->save();

            }
            
            $service->header = $request->header;
            $service->content = $request->content;
            $service->status = $request->status;
            // $service->image = $imageName;
            $service->save();
            
            if ($service) {
                // assign new role to the user
                // $user->syncRoles($request->role);
                return redirect('/partner/list')->with('success', 'Service updated!');
            }

            return redirect('/partner/list')->with('error', 'Failed to update service! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
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
