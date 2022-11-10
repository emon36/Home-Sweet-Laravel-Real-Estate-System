<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Yeasin City Seller Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{asset('backend/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

        <!-- LOGO -->
        <a href="{{route('seller.dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('frontend/images/logo/logo.jpg')}}" alt="" height="100">
                    </span>
            <span class="logo-sm">
                        <img src="{{asset('frontend/images/logo/logo.jpg')}}" alt="" height="16">
                    </span>
        </a>
        <br/>


        <div class="h-100" id="leftside-menu-container" data-simplebar="">

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>


                <li class="side-nav-item">
                    <a href="{{route('seller.dashboard')}}" class="side-nav-link">
                        <i class="uil-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>




                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarUsers" class="side-nav-link">
                        <i class="uil-user-circle"></i>
                        <span> User Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarUsers">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('seller.customer.create')}}">Create Customer</a>
                            </li>
                            <li>
                                <a href="{{route('seller.customers')}}">Customers</a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarProperty" aria-expanded="false" aria-controls="sidebarProperty" class="side-nav-link">
                        <i class="uil-home"></i>
                        <span> Property </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProperty">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('seller.property.create')}}">Create Property</a>
                            </li>
                            <li>
                                <a href="{{route('seller.properties')}}">Manage Property</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarOrder" aria-expanded="false" aria-controls="sidebarOrder" class="side-nav-link">
                        <i class="uil-bookmark"></i>
                        <span> Orders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarOrder">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('seller.order.create')}}">Create Order</a>
                            </li>
                            <li>
                                <a href="{{route('seller.orders')}}">Manage Orders</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarTransaction" aria-expanded="false" aria-controls="sidebarTransaction" class="side-nav-link">
                        <i class="uil-money-bill-stack"></i>
                        <span> Transactions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTransaction">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('seller.order.active')}}">Active Orders</a>
                            </li>
                            <li>
                                <a href="{{route('seller.transactions')}}">Manage Transactions</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarExpenses" aria-expanded="false" aria-controls="sidebarExpenses" class="side-nav-link">
                        <i class="uil-money-bill-stack"></i>
                        <span> Expenses </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpenses">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('seller.expense.create')}}">Create Expense</a>
                            </li>
                            <li>
                                <a href="{{route('seller.expense.index')}}">Manage Expense</a>
                            </li>
                        </ul>
                    </div>
                </li>

                @php
                    $contact = DB::table('contacts')->where('is_viewed',0)->count();
                @endphp


                <li class="side-nav-item">
                    <a href="{{route('seller.contacts')}}" class="side-nav-link">
                        <i class="uil uil-envelope-alt"></i>
                        Contacts
                        @if($contact != 0)
                            <span class="badge badge-info ">{{$contact}}</span>
                        @endif
                    </a>
                </li>




            </ul>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="dropdown notification-list d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src={{asset('uploads/profileImages/'.auth()->user()->image)}} alt="user-image" class="rounded-circle">
                                    </span>
                            <span>
                                        <span class="account-user-name">{{auth()->user()->name}}</span>
                                        <span class="account-user-position">Seller</span>
                                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{route('seller.profile')}}" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>Edit Profile</span>
                            </a>

                            <!-- item-->
                            <a href="" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                            <form action="{{route('logout')}}" method="POST" id="logoutForm">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>

            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

            @yield('content')

                <!-- start page title -->

                <!-- end page title -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> Developed By MS Emon
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->




<!-- bundle -->

<script src="{{asset('backend/js/vendor.min.js')}}"></script>
<script src="{{asset('backend/js/app.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>



@yield('scripts')

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
         $('#summernote').summernote();
         $('#summernote1').summernote();

        var input = document.querySelector('input[id=tags]');

       // initialize Tagify on the above input node reference
        new Tagify(input)
    });


</script>




</body>
</html>
