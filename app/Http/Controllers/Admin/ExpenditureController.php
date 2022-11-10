<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenditure;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExpenditureController extends Controller
{

    public function index()
    {
        $expenses = Expenditure::with('projects')->latest()->get();
        return view('admin.expenditure.index',['expenses'=>$expenses]);
    }

    public function create()
    {
        $projects = Project::all();
        return view('admin.expenditure.create',['projects'=>$projects]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'project' => 'required',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|string',
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg',
        ]);
        $expense = new Expenditure();

        $expense->project_id = $request->project;
        $expense->submitted_by = auth()->user()->name;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->date = date("d-m-Y",strtotime($request->date));

         if($request->hasFile('image')){
            $destination_path = 'public/expense';
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs($destination_path,$filename);
            $expense->image = $filename;
        }

        $expense->save();
        return redirect()->back()->with('success','Expenses Added  Successfully');

    }

    public function show($id)
    {
        $expense = Expenditure::with('projects')->find($id);
        return view('admin.expenditure.show',['expense'=>$expense]);
    }

    public function edit($id)
    {
        $projects = Project::all();
        $expense = Expenditure::find($id);
        return view('admin.expenditure.edit',['projects'=>$projects,'expense'=>$expense]);
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'project' => 'required',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|string',
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg',
        ]);

        $expense = Expenditure::find($id);
        $expense->project_id = $request->project;
        $expense->submitted_by = auth()->user()->name;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->date = date("d-m-Y",strtotime($request->date));

        if($request->hasFile('image')){

            $old_destination = storage_path('app/public/expense/'.$expense->image);
            if(file_exists($old_destination))
            {
                @unlink($old_destination);
            }
            $destination_path = 'public/expense';
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs($destination_path,$filename);
            $expense->image = $filename;
        }

        $expense->update();
        return redirect()->back()->with('success','Expenses Updated Successfully');

    }

    public function delete($id)
    {
        $expense = Expenditure::find($id);
        $file_path = storage_path('app/public/expense/'.$expense->image);
        if (file_exists($file_path))
        {
            @unlink($file_path);
            $expense->delete();
        }else{
            $expense->delete();
        }
        return response()->json([
            'status'=>200,
            'message'=>'Expense Deleted Successfully.'
        ]);

    }

    public function disapprove($id)
    {
        DB::table('expenditures')->where('id',$id)->update(['status'=>1]);
        return redirect()->back()->with('success', 'Expense has been approved');

    }

    public function approve($id)
    {
        DB::table('expenditures')->where('id',$id)->update(['status'=>0]);
        return redirect()->back()->with('success', 'Expense has been disapproved');
    }



}
