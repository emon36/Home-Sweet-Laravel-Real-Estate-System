<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'required',
            'image' => ['required','image','mimes:jpeg,png,jpg']
        ]);
        $imageFileName = 'galleryImage.png';
        if ($request->hasFile('image')) {
            $galleryImageFile = $request->file('image');
            $imageFileName = 'gallery_' . time() . '.' . $galleryImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/galleryImages')) {
                mkdir('uploads/galleryImages', 0777, true);
            }
            $galleryImageFile->move('uploads/galleryImages', $imageFileName);
        }

        $gallery =  new Gallery();
        $gallery->caption = $request->caption;
        $gallery->image = $imageFileName;
        $gallery->save();

        return redirect()->back()->with('success', 'Image has been added');

    }

    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index',['gallery'=>$gallery]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $gallery = Gallery::find($id);
        $gallery->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Gallery Image Deleted Successfully.'
        ]);
    }



}
