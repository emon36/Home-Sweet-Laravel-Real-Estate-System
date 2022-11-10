<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserDashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public  function profile()
    {
        $user = User::where('id',auth()->id())->first();
        return view('customer.profile',['user'=>$user]);
    }
    public function changePassword()
    {
        return view('customer.change_password');
    }

    public function bookings()
    {
        $order = Order::where('user_id',auth()->id())->with('properties')->get();
        return view('customer.booking',['order'=>$order]);
    }

    public function transactions()
    {
        $transaction = Transaction::where('user_id',auth()->id())->with('properties')->get();
        return view('customer.transaction',['transaction'=>$transaction]);
    }


    public function profileUpdate(Request $request,$id)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|string|unique:users,username,'.$id,
            'email' => 'nullable|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|numeric|min:13|unique:users,phone,' .$id,
            'address' => 'nullable|string',
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']

        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if($request->file('image'))
        {
            $destination = 'uploads/profileImages/'.$user->image;
            if(file_exists($destination))
            {
                @unlink($destination);
            }
            $profileImageFile = $request->file('image');
            $imageFileName = 'profile_' . time() . '.' . $profileImageFile->getClientOriginalExtension();
            $profileImageFile->move('uploads/profileImages/', $imageFileName);
            $user->image = $imageFileName;
        }

        $user->update();

        return redirect()->back()->with('success', 'Your profile has been updated');


    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with('error','Your Password can not reset submit correctly');
        }
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success','Your Password has been reset');

    }
}
