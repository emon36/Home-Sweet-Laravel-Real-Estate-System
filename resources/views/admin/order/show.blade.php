@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " aria-current="page"> <a href="{{route('admin.orders')}}">Manage Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Order</li>
        </ol>
    </nav>

    <div class="container-fluid mt-5">

        <!-- start page title -->
        <div class="row">
                <div class="col-sm-4 col-md-4">
                    <form method="POST" action="{{route('admin.order.status',$order->id)}}">
                        @csrf
                        <label for="status-select" class="col-form-label">Order Status</label>
                        <div class="input-group">
                            <select class="form-select" id="inputGroupSelect04" name="order_status" aria-label="Example select with button addon">
                                @if ($order->order_status == 1) {
                                    <option value="1" selected>Running</option>
                                     <option value="2" >Completed</option>
                                    <option value="3">Cancel</option>
                                @elseif($order->order_status == 2)
                                    <option value="1" >Running</option>
                                    <option value="2" selected>Completed</option>
                                    <option value="3" >Cancel</option>
                                @else
                                    <option value="1" >Running</option>
                                    <option value="2">Completed</option>
                                    <option value="3" selected>Cancel</option>
                                @endif
                            </select>
                            <button class="btn btn-outline-secondary" type="sumbit">Sumbit</button>
                        </div>
                    </form>
                </div>

                <div class="col-sm-4 ">
                    <form method="POST" action="{{route('admin.order.payment_status',$order->id)}}">
                        @csrf
                        <label for="status-select" class="col-form-label">Payment Status</label>
                        <div class="input-group">
                            <select class="form-select" id="inputGroupSelect04" name="payment_status" aria-label="Example select with button addon">
                                @if($order->payment_status == 1)
                                    <option value="1"selected>Paid</option>
                                    <option value="0">Due</option>
                                @else
                                    <option value="1">Paid</option>
                                    <option value="0" selected >Due</option>
                                @endif
                            </select>
                            <button class="btn btn-outline-secondary" type="sumbit">Sumbit</button>
                        </div>
                    </form>
                </div>
        </div>

        <div class="row mt-3">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Customer Information</h4>

                        <h5>Customer Name: {{$order->users->name}}</h5>

                        <abbr title="email">Email</abbr> {{$order->users->email}} <br>
                        <abbr title="email">Address</abbr> {{$order->customer_address}} <br>
                        <abbr title="Phone">Phone </abbr> {{$order->users->phone}} <br>


                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Order Information</h4>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <p class="mb-2"><span class="fw-bold me-2">Order ID:</span> # {{$order->order_code}}</p>
                                <p class="mb-2"><span class="fw-bold me-2">Order date:</span> {{$order->order_date}}</p>
                                <p class="mb-2"> <span class="fw-bold me-2">Payment Status:</span>
                                    @if ($order->payment_status == 1)
                                        <span class="badge badge-success-lighten"> Paid </span>
                                    @else
                                        <span class="badge badge-danger-lighten">Due</span>
                                    @endif
                                </p>
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
                        <h4 class="header-title mb-3">Order Details</h4>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Project Name</th>
                                    <th>Property Name</th>
                                    <th>Property Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$order->projects->project_name}}</td>
                                    <td>{{$order->properties->property_name}}</td>
                                    <td>{{$order->properties->location}}</td>
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
                                    <td>{{$order->properties->price}} BDT</td>
                                </tr>

                                <tr>
                                    <td>Booking Amount :</td>
                                    <td>{{$order->booking_amount}} BDT</td>
                                </tr>

                                <tr>
                                    <td>Total Paid Amount :</td>
                                    <td>{{$order->paid_amount}} BDT</td>
                                </tr>
                                <tr>
                                    <td> Total Due :</td>
                                    <td>{{$order->due}} BDT</td>
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
