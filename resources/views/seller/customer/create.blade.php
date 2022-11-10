@extends('seller.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Customer</div>
                    <form class="form-horizontal" action="{{route('seller.customer.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Full Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="inputName"  placeholder="Enter Full Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Enter a Valid Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Phone</label>
                            <div class="col-9">
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="Enter Phone Number" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">User Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="inputUserName" placeholder="Enter a unique user name" name="username" value="{{ old('username') }}">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Address</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="inputUserAddress" placeholder="Enter User Address" name="address" value="{{ old('address') }}">
                                @error('address')
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
                            <label for="inputPassword3" class="col-3 col-form-label">Password</label>
                            <div class="col-9">
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" name="password" value="{{ old('password') }}">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputFile" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" id="example-fileinput" class="form-control" name="image">
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 2 MB</div>
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
