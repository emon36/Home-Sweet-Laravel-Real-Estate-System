@extends('customer.master')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3 class="my-3">My Profile</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="border rounded bg-white p-30 mb-30">
                    <div class="row">
                        <div class="col-xl-2">
                            <h4 class="mb-4 font-400">Profile Information</h4>
                            <img src="{{asset('uploads/profileImages/'.$user->image)}}" height="150" alt="Customer Image">
                        </div>
                        <div class="col-xl-10">
                            <form action="{{route('user.profile.update',$user->id)}}" class="form-boder" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">


                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500">Username</label>
                                        <input class="form-control @error('username') is-invalid @enderror" name="username" placeholder="username" value="{{$user->username}}" type="text">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="admin@website.com" value="{{$user->email}}" type="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500"> Full Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Full Name" value="{{$user->name}}" type="text">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="" value="{{$user->phone}}" type="number">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500">Address</label>
                                        <input class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter Address" value="{{$user->address}}" type="text">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500"> Change Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" name="image"  type="file">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500">NID Number</label>
                                        <input class="form-control"   readonly value="{{$user->nid}}" type="text">
                                    </div>

                                    <div class="col-lg-6 mb-20">
                                        <label class="mb-2 font-fifteen font-500">TIN Number</label>
                                        <input class="form-control"  readonly  value="{{$user->tin}}" type="text">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
