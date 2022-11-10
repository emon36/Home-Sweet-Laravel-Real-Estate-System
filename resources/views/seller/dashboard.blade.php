@extends('seller.layouts.master')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 mt-3">

            <div class="row">
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
                            <h3 class="mt-3 mb-3">{{$customers}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-box widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Sellers">Sellers</h5>
                            <h3 class="mt-3 mb-3">{{$sellers}}</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Orders</h5>
                            <h3 class="mt-3 mb-3">{{$orders}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="uil-home widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Properties</h5>
                            <h3 class="mt-3 mb-3">{{$properties}}</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end col-->
            </div> <!-- end row -->
        </div>


@endsection
