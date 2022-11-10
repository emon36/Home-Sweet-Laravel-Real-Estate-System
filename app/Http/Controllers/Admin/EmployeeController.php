<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('admin.employee.index',['employees'=>$employees]);
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => ['required', 'string','unique:employees'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required','min:13','numeric','unique:employees'],
            'present_address' => ['required','string'],
            'permanent_address' => ['required','string'],
            'joining_date' => ['required','string'],
            'nid' => ['nullable','string','unique:employees'],
            'tin' => ['nullable','string','unique:employees'],
            'position' => ['nullable','string'],
            'salary' => ['required','numeric'],
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']
        ]);



        $imageFileName = 'employeeImage.png';
        if ($request->hasFile('image')) {
            $employeeImageFile = $request->file('image');
            $imageFileName = 'employee_' . time() . '.' . $employeeImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/employeeImages')) {
                mkdir('uploads/employeeImages', 0777, true);
            }
            $employeeImageFile->move('uploads/employeeImages', $imageFileName);
        }
        $employee = new Employee();

        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->salary = $request->salary;
        $employee->nid = $request->nid;
        $employee->tin = $request->tin;
        $employee->position = $request->position;
        $employee->joining_date = date("d-m-Y", strtotime($request->joining_date));
        $employee->image = $imageFileName;

        $employee->save();

        return redirect()->back()->with('success','Employee Added Successfully');

    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('admin.employee.edit',['employee'=>$employee]);
    }

    public function update(Request $request,$id)
    {
        $employee = Employee::find($id);

        $validated = $request->validate([
            'employee_id' => 'required|string|unique:employees,employee_id,'.$id,
            'name' => ['required', 'string', 'max:255'],
            'phone' => 'required|min:13|numeric|unique:employees,phone,'.$id,
            'present_address' => ['required','string'],
            'permanent_address' => ['required','string'],
            'joining_date' => ['required','string'],
            'nid' => 'nullable|string|unique:employees,nid,'.$id,
            'tin' => 'nullable|string|unique:employees,tin,'.$id,
            'position' => ['nullable','string'],
            'salary' => ['required','numeric'],
            'image' => ['image','mimes:jpeg,png,jpg','max:2048']
        ]);


        if ($request->hasFile('image')) {

            $destination = 'uploads/employeeImages/'.$employee->image;
            if(file_exists($destination))
            {
                @unlink($destination);
            }
            $employeeImageFile = $request->file('image');
            $imageFileName = 'employee_' . time() . '.' . $employeeImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/employeeImages')) {
                mkdir('uploads/employeeImages', 0777, true);
            }
            $employeeImageFile->move('uploads/employeeImages', $imageFileName);
            $employee->image = $imageFileName;
        }

        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->nid = $request->nid;
        $employee->tin = $request->tin;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->joining_date = date("d-m-Y", strtotime($request->joining_date));
        $employee->update();

        return redirect()->back()->with('success','Employee information has been updated');

    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $imagePath = public_path("/uploads/employeeImages/".$employee->image);
        if (file_exists($imagePath))
        {
            @unlink($imagePath);
            $employee->delete();
        }else{
            $employee->delete();
        }
        return response()->json([
            'status'=>200,
            'message'=>'Employee Deleted Successfully.'
        ]);
    }

}


