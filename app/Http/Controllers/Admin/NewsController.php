<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index',['news'=>$news]);
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'image' => ['required','image','mimes:jpeg,png,jpg']

        ]);

        $imageFileName = 'newsImage.png';
        if ($request->hasFile('image')) {
            $newsImageFile = $request->file('image');
            $imageFileName = 'news_' . time() . '.' . $newsImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/newsImages')) {
                mkdir('newsImages', 0777, true);
            }
            $newsImageFile->move('uploads/newsImages', $imageFileName);
        }

        $news = new News();
        $news->title = $request->title;
        $news->short_description = $request->short_description;
        $news->long_description = $request->long_description;
        $news->image = $imageFileName;
        $news->save();
        return redirect()->back()->with('success','News has been added');

    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit',['news'=>$news]);

    }


    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'title' => 'required',
            'short_description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'image' => ['image','mimes:jpeg,png,jpg']

        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->short_description = $request->short_description;
        $news->long_description = $request->long_description;

        if ($request->file('image')) {
            $destination = 'uploads/newsImages/' . $news->image;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $newsImageFile = $request->file('image');
            $imageFileName = 'news_' . time() . '.' . $newsImageFile->getClientOriginalExtension();
            $newsImageFile->move('uploads/newsImages', $imageFileName);
            $news->image = $imageFileName;
        }
        $news->update();

        return redirect()->back()->with('success','News has been updated');

    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $news = News::find($id);
        $imagePath = public_path("/uploads/newsImages/".$news->image);
        if (file_exists($imagePath))
        {
            @unlink($imagePath);
            $news->delete();
        }else{
            $news->delete();
        }
        return response()->json([
            'status'=>200,
            'message'=>'News Deleted Successfully.'
        ]);
    }
}
