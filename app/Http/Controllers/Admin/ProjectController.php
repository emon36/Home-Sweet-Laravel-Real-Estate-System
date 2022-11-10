<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::latest()->get();
        return  view('admin.project.index',['projects'=>$projects]);
    }
    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'images' => 'array|nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:4000',
            'city' => 'string|nullable',
            'number_of_blocks' => 'numeric|nullable',
            'number_of_floors' => 'numeric|nullable',
            'number_of_flats' => 'required|numeric',
        ]);

        $images=array();
        $image = '';
        if($files= $request->file('images')){
            foreach($files as $file){
                $name= $file->getClientOriginalName();
                $file->move('uploads/projectImages/',$name);
                $images[]= $name;
            }
            $image = implode(",", $images);
        }
            $project = new Project();
            $project->project_name = $request->project_name;
            $project->short_description = $request->short_description;
            $project->long_description = $request->long_description;
            $project->city = $request->city;
            $project->location = $request->location;
            $project->number_of_blocks = $request->number_of_blocks;
            $project->number_of_floors = $request->number_of_floors;
            $project->number_of_flats = $request->number_of_flats;
            $project->images = $image;
            $project->save();
           return redirect()->back()->with('success', 'Project has been added');

    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.project.edit',['project'=>$project]);
    }

    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'project_name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'images' => 'array|nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:4000',
            'city' => 'string|nullable',
            'number_of_blocks' => 'numeric|nullable',
            'number_of_floors' => 'numeric|nullable',
            'number_of_flats' => 'numeric|nullable',
        ]);

        $project = Project::find($id);
        $images = [];
        if($request->hasFile('images'))
        {
            $projectImages = explode(",", $project->images);
            foreach ($projectImages as $projectImage) {
                $destination = 'uploads/projectImages/'.$projectImage;
                if (file_exists($destination)) {
                    @unlink($destination);
                }
            }

                $files= $request->file('images');
                    foreach($files as $file){
                        $name= $file->getClientOriginalName();
                        $file->move('uploads/projectImages/',$name);
                        $images[]= $name;
                    }
                    $image = implode(",", $images);
                    $project->images = $image;

        }

        $project->project_name = $request->project_name;
        $project->short_description = $request->short_description;
        $project->long_description = $request->long_description;
        $project->city = $request->city;
        $project->location = $request->location;
        $project->number_of_blocks = $request->number_of_blocks;
        $project->number_of_floors = $request->number_of_floors;
        $project->number_of_flats = $request->number_of_flats;
        $project->update();

        return redirect()->back()->with('success','Project Updated Successfully');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $project = Project::find($id);
        $projectImages = explode(",", $project->images);
        foreach ($projectImages as $projectImage) {
            $destination = 'uploads/propertyImages/'.$projectImage;
            if (file_exists($destination)) {
                @unlink($destination);
                $project->delete();
            }
            else{
                $project->delete();
            }
        }
        return response()->json([
            'status'=>200,
            'message'=>'Project Deleted Successfully.'
        ]);
    }


}
