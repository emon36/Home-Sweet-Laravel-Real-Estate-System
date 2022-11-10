<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class PropertyController extends Controller
{

    public function index()
    {

        return view('admin.property.index');
    }

    public function getProperty(Request $request)
    {
        if ($request->ajax()) {
            $data = Property::with('projects')->latest();
            return DataTables::eloquent($data)
                ->addColumn('projects',function (Property $property){
                        return $property->projects->project_name;
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        return '<span class="p-2 badge badge-success-lighten">Selling</span>';
                    } else {
                        return '<span class="p-2 badge badge-danger-lighten">Sold</span>';
                    }
                })
                ->addColumn('approved_status', function ($data) {
                    if ($data->approved_status == 1) {
                        return '<span class="p-2 badge badge-success-lighten">Approved</span>';
                    } else {
                        return '<span class="p-2 badge badge-danger-lighten">Not Approved</span>';
                    }
                })
                ->addColumn('action', function($row){

                    if ($row->approved_status == 0)
                    {
                        $btn = '<a href ="'.route('admin.property.approve',$row->id).'" title="approve" data-toggle="tooltip" class="btn btn-danger btn-sm"><i class="mdi mdi-home-remove"></i> </a> ';
                        $btn .= '<a href="'.route('admin.property.edit',$row->id).'"  title="Edit" class="edit btn btn-primary btn-sm"><i class=" mdi mdi-square-edit-outline"></i></a> ';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProperty"><i class="mdi mdi-delete"></i></a>';
                        return $btn;
                    }
                    else{
                        $btn = '<a href ="'.route('admin.property.disapprove',$row->id).'" title="disapprove" data-toggle="tooltip" class="btn btn-success btn-sm"><i class="mdi mdi-check"></i> </a> ';
                        $btn .= '<a href="'.route('admin.property.edit',$row->id).'"  title="Edit" class="edit btn btn-primary btn-sm"><i class=" mdi mdi-square-edit-outline"></i></a> ';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" title="Delete" class="btn btn-danger btn-sm deleteProperty"><i class="mdi mdi-delete"></i></a>';
                        return $btn;
                    }

                })
                ->rawColumns(['projects','action','status','approved_status'])
                ->addIndexColumn()
                ->toJson();

        }

    }


    public function create()
    {
        $projects = Project::all();
        return view('admin.property.create',['projects'=>$projects]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'project' => 'required',
            'property_name' => 'required|string|max:255',
            'short_description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'images' => 'array|nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:4000',
            'city' => 'string|nullable',
            'location' => 'required|string',
            'number_of_bedrooms' => 'required|numeric',
            'number_of_bathrooms' => 'required|numeric',
            'floor_number' => 'required|numeric',
            'size' => 'required|numeric',
            'price' => 'required|numeric',
            'features' => 'string|nullable',


        ]);

        $images=array();
        $image = '';
        if($files= $request->file('images')){
            foreach($files as $file){
                $name= $file->getClientOriginalName();
                $file->move('uploads/propertyImages/',$name);
                $images[]= $name;
            }
            $image = implode(",", $images);
        }
        $property = new Property();
        $property->project_id = $request->project;
        $property->property_name = $request->property_name;
        $property->short_description = $request->short_description;
        $property->long_description = $request->long_description;
        $property->city = $request->city;
        $property->location = $request->location;
        $property->number_of_bedrooms = $request->number_of_bedrooms;
        $property->number_of_bathrooms = $request->number_of_bathrooms;
        $property->floor_number = $request->floor_number;
        $property->size = $request->size;
        $property->price = $request->price;
        $property->features = $request->features;
        $property->images = $image;
        $property->approved_status = 1;
        $property->save();
        return redirect()->back()->with('success', 'Property has been added');
    }

    public function edit($id)
    {
        $projects = Project::all();
        $property = Property::find($id);
        return view('admin.property.edit',['property'=>$property,'projects'=>$projects]);
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'status' => 'required',
            'project' => 'required',
            'property_name' => 'required|string|max:255',
            'short_description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'images' => 'array|nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:4000',
            'city' => 'string|nullable',
            'location' => 'required|string',
            'number_of_bedrooms' => 'required|numeric',
            'number_of_bathrooms' => 'required|numeric',
            'floor_number' => 'required|numeric',
            'size' => 'required|numeric',
            'price' => 'required|numeric',
            'features' => 'string|nullable',

        ]);

        $property = Property::find($id);
        $images = [];
        if($request->hasFile('images'))
        {
            $propertyImages = explode(",", $property->images);
            foreach ($propertyImages as $propertyImage) {
                $destination = 'uploads/propertyImages/'.$propertyImage;
                if (file_exists($destination)) {
                    @unlink($destination);
                }
            }

            $files= $request->file('images');
            foreach($files as $file){
                $name= $file->getClientOriginalName();
                $file->move('uploads/propertyImages/',$name);
                $images[]= $name;
            }
            $image = implode(",", $images);
            $property->images = $image;

        }
        $property->project_id = $request->project;
        $property->property_name = $request->property_name;
        $property->short_description = $request->short_description;
        $property->long_description = $request->long_description;
        $property->city = $request->city;
        $property->location = $request->location;
        $property->number_of_bedrooms = $request->number_of_bedrooms;
        $property->number_of_bathrooms = $request->number_of_bathrooms;
        $property->floor_number = $request->floor_number;
        $property->size = $request->size;
        $property->price = $request->price;
        $property->features = $request->features;
        $property->status = $request->status;
        $property->update();
        return redirect()->back()->with('success', 'Property has been Updated');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $property = Property::find($id);
        $propertyImages = explode(",", $property->images);
        foreach ($propertyImages as $propertyImage) {
            $destination = 'uploads/propertyImages/'.$propertyImage;
            if (file_exists($destination)) {
                @unlink($destination);
                $property->delete();
            }
            else{
                $property->delete();
            }
        }
        return response()->json([
            'status'=>200,
            'message'=>'Property Deleted Successfully.'
        ]);

    }

    public function approve($id)
    {
        DB::table('properties')->where('id',$id)->update(['approved_status'=>1]);
        return redirect()->back()->with('success', 'Property has been approved');

    }

    public function disapprove($id)
    {
        DB::table('properties')->where('id',$id)->update(['approved_status'=>0]);
        return redirect()->back()->with('success', 'Property has been Disapproved');
    }




}
