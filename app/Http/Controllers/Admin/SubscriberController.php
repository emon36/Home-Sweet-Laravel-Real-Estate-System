<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->get();

        return view('admin.subscriber.index',['subscribers'=>$subscribers]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $subscriber = Subscriber::find($id);
        $subscriber->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Subscriber Deleted Successfully.'
        ]);
    }
}
