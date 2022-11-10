@extends('admin.layouts.master')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " aria-current="page"> <a href="{{route('admin.employees')}}">Manage Employees</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Employee</div>
                    <form class="form-horizontal" action="{{route('admin.employee.update',$employee->id)}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Employee ID</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('employee_id') is-invalid @enderror" id="inputName"  placeholder="Enter Employee ID" required name="employee_id" value="{{ $employee->employee_id }}">
                                @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Full Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="inputName"  placeholder="Enter Full Name" name="name" value="{{ $employee->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Phone</label>
                            <div class="col-9">
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="Enter Phone Number" name="phone" value="{{ $employee->phone}}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Present Address</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('present_address') is-invalid @enderror" id="inputPresentAddress" placeholder="Enter Present Address" name="present_address" value="{{ $employee->present_address }}">
                                @error('present_address')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Permanent Address</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('permanent_address') is-invalid @enderror" id="inputPermanentAddress" placeholder="Enter Permanent Address" name="permanent_address" value="{{ $employee->permanent_address }}">
                                @error('permanent_address')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Joining Date</label>
                            <div class="col-6">
                                <input type="date" class="form-control @error('joining_date') is-invalid @enderror"  name="joining_date" value="{{date('Y-m-d',strtotime($employee->joining_date))}}">
                                @error('joining_date')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">NID</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('nid') is-invalid @enderror" id="inputUserNid" placeholder="Enter NID Number" name="nid" value="{{  $employee->nid }}">
                                @error('nid')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">TIN Number</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('tin') is-invalid @enderror" id="inputUsertin" placeholder="Enter TIN Number" name="tin" value="{{  $employee->tin }}">
                                @error('tin')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Position</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('position') is-invalid @enderror" id="inputUsertin" placeholder="Enter Employee Job Position" name="position" value="{{  $employee->position }}">
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Salary</label>
                            <div class="col-9">
                                <input type="number" class="form-control @error('salary') is-invalid @enderror" id="inputPermanentAddress" placeholder="Enter Salary Amount" name="salary" value="{{ $employee->salary }}">
                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputFile" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" id="example-fileinput" class="form-control" name="image">
                                <div class="small font-italic text-muted mb-1">JPG,JPEG or PNG no larger than 2 MB</div>

                                <img src="{{asset('/uploads/employeeImages/'.$employee->image)}}" width="150px">
                            </div>

                        </div>


                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
