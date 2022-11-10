<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:subscribers'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->with('error','something went wrong try using another email');
        }else
        {
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
            return redirect()->back()->with('success','You have successfully subscribed');
        }


    }
}

