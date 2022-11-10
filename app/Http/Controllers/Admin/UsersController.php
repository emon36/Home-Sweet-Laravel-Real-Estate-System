<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use function Symfony\Component\String\bytesAt;


class UsersController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;

    }

    public function create()
    {
        $role = Role::all();
        return view('admin.users.create',['roles'=>$role]);
    }

    public function getCustomer(Request $request){
        if ($request->ajax()) {
            $data = User::select('*')->where('role_id',2)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="'.route('admin.user.edit_customer',$row->id).'"  data-original-title="Edit" class="edit btn btn-primary btn-sm editUser"><i class="mdi mdi-square-edit-outline"></i></a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser"><i class="mdi mdi-delete"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users.customer');
    }

    public function getAdmin(){
        $admins = User::select('*')->where('role_id',1)->get();
        return view('admin.users.admin',['admins'=>$admins]);
    }

    public function getSeller(){
        $sellers = User::select('*')->where('role_id',3)->get();
        return view('admin.users.seller',['sellers'=>$sellers]);
    }

    public function editSeller($id)
    {
        $seller = User::find($id);
        return view('admin.users.seller_edit',compact('seller'));
    }

    public function updateSeller(Request $request,$id)
    {
        $this->update($request,$id);
        return redirect()->back()->with('success','Seller has been updated');
    }
    public function deleteSeller($id)
    {
        $seller = User::find($id);
        $imagePath = public_path("/uploads/profileImages/".$seller->image);
        if (file_exists($imagePath))
        {
            @unlink($imagePath);
            $seller->delete();
        }else{
            $seller->delete();
        }
        return response()->json([
            'status'=>200,
            'message'=>'Seller Deleted Successfully.'
        ]);
    }

    public function deleteAdmin($id){

          $admin = User::find($id);
            $imagePath = public_path("/uploads/profileImages/".$admin->image);
            if (file_exists($imagePath))
            {
                @unlink($imagePath);
                $admin->delete();
            }else{
                $admin->delete();
            }

            return response()->json([
                'status'=>200,
                'message'=>'Admin Deleted Successfully.'
            ]);

    }

    public function adminProfile()
    {
        $user = User::find(Auth::id());
        return view('admin.users.admin_profile',['user'=>$user]);
    }


    public function adminProfileUpdate(Request $request,$id)
    {
        $this->update($request,$id);
        return redirect()->back()->with('success','Profile has been updated');
    }

    public function store(Request $request)
    {
            $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required','min:11','numeric','unique:users'],
            'username' => ['required','string','unique:users'],
            'address' => ['nullable','string'],
            'nid' => ['nullable','string','unique:users'],
            'tin' => ['nullable','string','unique:users'],
            'role_id' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']
            ]);




        $imageFileName = 'profileImage.png';
            if ($request->hasFile('image')) {
                $profileImageFile = $request->file('image');
                $imageFileName = 'profile_' . time() . '.' . $profileImageFile->getClientOriginalExtension();
                if (!file_exists('uploads/profileImages')) {
                mkdir('uploads/profileImages', 0777, true);
                }
            $profileImageFile->move('uploads/profileImages', $imageFileName);
        }

         $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'address' => $request->address,
            'nid' =>   $request->nid,
            'tin' =>   $request->tin,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'image' => $imageFileName
        ]);

        return redirect()->back()->with('success', 'User has been added');

    }


    public  function update(Request $request ,$id)
    {


        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => ['nullable','string', 'min:8'],
            'phone' => 'required|numeric|min:13|unique:users,phone,' .$id,
            'username' => 'required|string|unique:users,username,'.$id,
            'address' => 'nullable|string',
            'nid' => 'nullable|string|unique:users,nid,'.$id,
            'tin' => 'nullable|string|unique:users,tin,'.$id,
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']
        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
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

       return redirect()->back()->with('success', 'User info is updated');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.customer_edit',compact('user'));

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
