<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function index()
    {
        $customers =  User::where('role_id',2)->count();
        $sellers =  User::where('role_id',3)->count();
        $orders = Order::where('order_status',1)->count();
        $properties = Property::count();
        return view('seller.dashboard',
            ['customers'=>$customers,
            'orders'=>$orders,
            'sellers'=>$sellers,
            'properties'=>$properties,]);
    }

    public function sellerProfile()
    {
        $user = User::find(Auth::id());
        return view('seller.profile.index',['user'=>$user]);
    }


    public function sellerProfileUpdate(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => ['nullable','string', 'min:8'],
            'phone' => 'required|numeric|min:13|unique:users,phone,' .$id,
            'username' => 'required|string|unique:users,username,'.$id,
            'nid' => 'nullable|string|unique:users,username,'.$id,
            'tin' => 'nullable|string|unique:users,username,'.$id,
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']
        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->nid = $request->nid;
        $user->tin = $request->tin;
        if ($request->password)
        {
            $user->password = bcrypt($request->password);
        }

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

        return redirect()->back()->with('success', 'Info is updated');


    }
}
