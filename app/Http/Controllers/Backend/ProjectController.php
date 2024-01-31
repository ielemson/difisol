<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //

    public function index()
    {
        $projects = Project::all();
        return view('project.list',compact('projects'));
    }

    public function create(){
        return view('project.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        try {
           
            if ($request->has('image')) {
                # code...
                $imageName = time().'.'.$request->image->extension();  
     
                $request->image->move(public_path('assets/images/projects'), $imageName);

                $project = Project::create([
                    'header' => $request->header,
                    'content' => $request->content,
                    'status' => $request->status,
                    'image' => $imageName,
                   ]);
            }

            
            $project = Project::create([
                'header' => $request->header,
                'content' => $request->content,
                'status' => $request->status,
                // 'image' => 'image',
               ]);
            
            if ($project) {
                // assign new role to the user
                // $user->syncRoles($request->role);
                return redirect('project/create')->with('success', 'New project created!');
            }

            return redirect('project/create')->with('error', 'Failed to create new service! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function edit($id)
    {
    $project = Project::where('id',$id)->first();
    return view('project.edit',compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::where('id',$id)->first();

        try {
            if ($request->has('image')) {
           
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('assets/images/projects'), $imageName);

            $project->header = $request->header;
            $project->content = $request->content;
            $project->status = $request->status;
            $project->image = $imageName;
            $project->save();

            }
            
            $project->header = $request->header;
            $project->content = $request->content;
            $project->status = $request->status;
            // $project->image = $imageName;
            $project->save();
            
            if ($project) {
                // assign new role to the user
                // $user->syncRoles($request->role);
                return redirect('project/list')->with('success', 'Service updated!');
            }

            return redirect('proejct/list')->with('error', 'Failed to update service! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

}
