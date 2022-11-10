@extends('customer.master')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3 class="my-3">Password Update</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="border rounded bg-white p-30 mb-30">
                    <div class="row">
                        <div class="col-xl-2">
                            <h4 class="mb-4 font-400">Change Password</h4>
                        </div>
                        <div class="col-xl-10">
                            <form method="POST" class="form-boder" action="{{route('user.password.update')}}" aria-label="{{ __('Reset Password') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <input id="oldpass" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="" required autofocus placeholder="Current password">

                                        @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required placeholder="New password">

                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <input id="password-confirm" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required placeholder="Confirm password">
                                        @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">

                                        <button type="submit" class="btn btn-success">
                                            {{ __('Reset Password') }}
                                        </button>
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
