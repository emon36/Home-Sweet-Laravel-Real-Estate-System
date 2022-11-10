<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }

    public function getContacts(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select('*')->orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    if ($data->is_viewed == 0) {
                        return '<span class="p-2 badge badge-danger-lighten ">Unread</span>';
                    } else {
                        return '<span class="p-2 badge badge-success-lighten ">Read</span>';
                    }
                })
                ->addColumn('action', function($row){

                    $btn = '<a href="'.route('admin.contact.view',$row->id).'"  title="view"  data-toggle="tooltip" class="edit btn btn-primary btn-sm editUser"><i class="mdi mdi-eye"></i></a>';

                    $btn = $btn.' <a href="javascript:void(0)"  title="delete" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteContact"><i class="mdi mdi-delete"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->toJson();

        }
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show',['contact'=>$contact]);
    }

    public function status(Request $request,$id)
    {
        DB::table('contacts')->where('id',$id)->update(['is_viewed'=> $request->status]);
        return redirect()->back()->with('success', 'Status has been Updated');
    }

    public function delete($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Contact Deleted Successfully.'
        ]);
    }



}
