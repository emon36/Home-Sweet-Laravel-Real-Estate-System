@extends('website.layouts.master')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-2 px-0">
                    <div class="dashboard-nav-area bg-secondary pt-4">
                        <a class="navbar-brand d-table px-40 py-3 mb-3" href="{{route('user.dashboard')}}"><img src="{{asset('frontend/images/logo/logo.jpg')}}" alt="dashboard logo"></a>
                        <div class="collaps-dashboard m-3 px-3 rounded bg-white text-secondary clearfix d-md-none">
                            <span>Open Dashboard Navigation</span>
                            <span class="flaticon-menu text-secondary flat-mini float-end"></span>
                        </div>
                        <nav class="dashboard-nav nav-light pb-3" id="navbarSupportedContent">
                            <ul class="navbar-nav left-collaps-nav">
                                <li class="text-white pb-2 pt-4 px-20">Navigation</li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.dashboard')}}"><i class="flaticon-layers flat-mini pe-2"></i> Dashboard</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.booking')}}"><i class="flaticon-like-1 flat-mini pe-2"></i> My Bookings </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.transactions')}}"><i class="fas fa-money-bill"></i> My Transactions </a>
                                </li>
                                <li class="text-white pb-2 pt-4 px-20">Account Settings</li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.profile')}}"><i class="flaticon-user flat-mini pe-2"></i> Personal Profile</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.changePassword')}}"><i class="flaticon-locked flat-mini pe-2"></i> Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ><i class="flaticon-transfer flat-mini pe-2"></i> Logout
                                    </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9 col-xl-10 px-0 dashboard-body" style="height: 100vh; overflow-y: scroll;">
                    <!--============== Header Section Start ==============-->
                    <header class="header-unfix border-bottom bg-white">
                        <div class="main-nav xs-p-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <nav class="navbar navbar-expand-lg nav-secondary nav-primary-hover nav-line-active px-3">
                                            <div class="navbar-collapse justify-content-between sm-ml-0">
                                                <ul class="navbar-nav sm-mx-none">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('website.home')}}">Back to Website</a>
                                                    </li>

                                                </ul>
                                                <ul class="navbar-nav user-option">
                                                    <li class="nav-item">
                                                    Hello, {{auth()->user()->name}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!--============== Header Section End ==============-->

                    <!--============== Dashboard Start ==============-->
                    @yield('body')

                    <!--============== Dashboard End ==============-->

                    <!-- Footre -->

                </div>
            </div>
        </div>

@endsection

