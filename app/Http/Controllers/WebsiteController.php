<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Review;

class WebsiteController extends Controller
{
    public function index()
    {
        $reviews = Review::with('users')->latest()->paginate(6);
        $properties = Property::latest()->where(['status'=> 1,'approved_status'=>1])->paginate(6);
        $projects = Project::latest()->get();
        $news = News::latest()->paginate(6);
        return view('website.home',['properties'=>$properties,'projects'=>$projects,'reviews'=>$reviews,'news'=>$news]);
    }
    public function contact()
    {
        return view('website.contact');
    }

    public function service()
    {
        return view('website.services');
    }

    public function gallery()
    {
        $gallery = Gallery::latest()->paginate(6);
        return view('website.gallery',['gallery'=>$gallery]);
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('website.projects',['projects'=>$projects]);
    }

    public function propertiesView($id)
    {
        $property = Property::find($id);
        return view('website.property_view',['property'=>$property]);
    }

    public function projectView($id)
    {
        $project = Project::find($id);
        return view('website.project_view',['project'=>$project]);
    }

    public function newsView($id)
    {
        $news = News::find($id);
        return view('website.news_view',['news'=>$news]);

    }
    public  function propertyList($id)
    {
        $matchThese = ['project_id' => $id, 'status' => 1,'approved_status'=> 1];
        $properties = Property::where($matchThese)->paginate(6);
        $project = Project::where('id',$id)->first();

        return view('website.property_listing',['properties'=>$properties,'project'=>$project]);
    }
}
