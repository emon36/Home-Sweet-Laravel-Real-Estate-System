@extends('admin.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Employee</div>
                    <form class="form-horizontal" action="{{route('admin.employee.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Employee ID</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('employee_id') is-invalid @enderror" id="inputName"  placeholder="Enter Employee ID" name="employee_id" value="{{ old('employee_id') }}" >
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
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="inputName"  placeholder="Enter Full Name" name="name"  value="{{ old('name') }}">
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
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="Enter Phone Number" name="phone"value="{{ old('phone') }}">
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
                                <input type="text" class="form-control @error('present_address') is-invalid @enderror" id="inputPresentAddress" placeholder="Enter Present Address" name="present_address" value="{{ old('present_address') }}">
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
                                <input type="text" class="form-control @error('permanent_address') is-invalid @enderror" id="inputPermanentAddress" placeholder="Enter Permanent Address" name="permanent_address" value="{{ old('permanent_address') }}">
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
                                <input type="date" class="form-control @error('joining_date') is-invalid @enderror"  name="joining_date" value="{{ old('joining_date') }}">
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
                                <input type="text" class="form-control @error('nid') is-invalid @enderror" id="inputUserNid" placeholder="Enter NID Number" name="nid" value="{{ old('nid') }}">
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
                                <input type="text" class="form-control @error('tin') is-invalid @enderror" id="inputUsertin" placeholder="Enter TIN Number" name="tin" value="{{ old('tin') }}">
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
                                <input type="text" class="form-control @error('position') is-invalid @enderror" id="inputUsertin" placeholder="Enter Employee Job Position" name="position" value="{{ old('position') }}">
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
                                <input type="number" class="form-control @error('salary') is-invalid @enderror" id="inputPermanentAddress" placeholder="Enter Salary Amount" name="salary" value="{{ old('salary') }}">
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
                                <div class="small font-italic text-muted mb-4">JPG,JPEG or PNG no larger than 2 MB</div>
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
