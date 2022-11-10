@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-xl-4 mt-5">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0 ">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="{{asset('uploads/profileImages/'.$user->image)}}" height="200" alt="">
                    <!-- Profile picture help block-->

                    <!-- Profile picture upload button-->
                </div>
            </div>
        </div>
        <div class="col-xl-8 mt-5">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form  action="{{route('admin.profile.update',auth()->id())}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="inputUsername" type="text" name="name" value="{{$user->name}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" name="email" placeholder="Enter your email address" value="{{$user->email}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">

                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control @error('phone') is-invalid @enderror" id="inputPhone" type="number" name="phone" placeholder="Enter your phone number" value="{{$user->phone}}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPhone">User Name</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="inputUserName" placeholder="Enter a unique user name" name="username" value="{{ $user->username }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputPhone">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="inputUserAdress" placeholder="Enter Address" name="address" value="{{ $user->address }}">
                            @error('address')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputPhone">NID</label>
                            <input type="text" class="form-control @error('nid') is-invalid @enderror" id="inputUserNid" placeholder="Enter NID Number" name="nid" value="{{ $user->nid }}">
                            @error('nid')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputPhone">TIN Number</label>
                            <input type="text" class="form-control @error('tin') is-invalid @enderror" id="inputUserName" placeholder="Enter TIN Number" name="tin" value="{{ $user->tin }}">
                            @error('tin')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputPhone">Change Password</label>
                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Enter your new password" value="">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPhone">Upload Profile Image</label>
                            <input class="form-control" id="inputImage" name="image" type="file">
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit" >Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
