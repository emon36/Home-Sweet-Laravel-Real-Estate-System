@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " aria-current="page"> <a href="{{route('admin.transactions')}}">Manage Transactions</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Transaction</li>
        </ol>
    </nav>

    <div class="container-fluid mt-5">


        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Customer Information</h4>

                        <h5>Customer Name: {{$transaction->users->name}}</h5>

                        <abbr title="email">Email</abbr> {{$transaction->users->email}} <br>
                        <abbr title="email">Address</abbr> {{$transaction->customer_address}} <br>
                        <abbr title="Phone">Phone </abbr> {{$transaction->users->phone}} <br>


                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Transaction Details</h4>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <p class="mb-2"><span class="fw-bold me-2">Details :</span> {{$transaction->description}}</p>
                                <p class="mb-2"><span class="fw-bold me-2">Transaction ID:</span> # {{$transaction->transaction_code}}</p>
                                <p class="mb-2"><span class="fw-bold me-2">Payment Amount :</span> {{$transaction->pay_amount}}</p>
                                <p class="mb-2"><span class="fw-bold me-2">Payment date:</span> {{$transaction->payment_date}}</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div><!-- end col -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Property Details</h4>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Property Name</th>
                                        <th>Property Location</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$transaction->properties->property_name}}</td>
                                        <td>{{$transaction->properties->location}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->

                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Order Summary</h4>

                            <div class="table-responsive">
                                <table class="table mb-0 w-100">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Property Price :</td>
                                        <td>{{$transaction->properties->price}} BDT</td>
                                    </tr>

                                    <tr>
                                        <td>Total Paid Amount :</td>
                                        <td>{{$transaction->orders->paid_amount}} BDT</td>
                                    </tr>
                                    <tr>
                                        <td> Total Due :</td>
                                        <td>{{$transaction->orders->due}} BDT</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->



@endsection
