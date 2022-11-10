<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;

    }

    public function getCustomer(Request $request){
        if ($request->ajax()) {
            $data = User::select('*')->where('role_id',2)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="'.route('seller.customer.edit',$row->id).'"  data-original-title="Edit" class="edit btn btn-primary btn-sm editUser"><i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('seller.customer.index');
    }

    public function create()
    {
        return view('seller.customer.create');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required','min:13','numeric','unique:users'],
            'username' => ['required','string','unique:users'],
            'nid' => ['nullable','string','unique:users'],
            'tin' => ['nullable','string','unique:users'],
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']
        ]);

        $imageFileName = 'profileImage.png';
        if ($request->hasFile('image')) {
            $profileImageFile = $request->file('image');
            $imageFileName = 'profile_' . time() . '.' . $profileImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/profileImages')) {
                mkdir('uploads/productFiles', 0777, true);
            }
            $profileImageFile->move('uploads/profileImages', $imageFileName);
        }


        $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'nid' =>   $request->nid,
            'tin' =>   $request->tin,
            'role_id' => 2,
            'image' => $imageFileName
        ]);

        return redirect()->back()->with('success', 'Customer has been added');

    }

    public function edit($id)
    {
        $customer = User::find($id);
        return view('seller.customer.edit',['customer'=>$customer]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'nullable|string|email|max:255|unique:users,email,'.$id,
            'password' => ['nullable','string', 'min:8'],
            'phone' => 'required|numeric|min:13|unique:users,phone,' .$id,
            'address' => 'nullable|string',
            'nid' => 'nullable|string|unique:users,username,'.$id,
            'tin' => 'nullable|string|unique:users,username,'.$id,
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']
        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
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

        return redirect()->back()->with('success', 'Customer info has been updated');

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $imagePath = public_path("/uploads/profileImages/".$user->image);
        if (file_exists($imagePath))
        {
            @unlink($imagePath);
            $user->delete();
        }else{
            $user->delete();
        }
        return response()->json([
            'status'=>200,
            'message'=>'Customer Deleted Successfully.'
        ]);
    }


}
