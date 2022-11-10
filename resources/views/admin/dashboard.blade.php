@extends('admin.layouts.master')

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
                            <h3 class="mt-3 mb-3">{{count($orders)}}</h3>
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

            <div class="row">

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-2 mb-3">Project Wise Revenue</h4>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <thead>
                                    <th>Index</th>
                                    <th>Project Name</th>
                                    <th>Revenue</th>
                                    </thead>
                                    <tbody>
                                    @foreach($revenue as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->project_name}}</td>
                                        <td>{{number_format($row->orders->sum('paid_amount'))}} Tk</td>
                                    </tr>

                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td>Subtotal:</td>
                                        <td>{{number_format($orders->sum('paid_amount'))}} TK</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div>
                </div>


                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-2 mb-3">Project Wise Expense</h4>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <thead>
                                    <th>Index</th>
                                    <th>Project Name</th>
                                    <th>Expense</th>
                                    </thead>
                                    <tbody>
                                    @foreach($expenses as $row)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->project_name}}</td>
                                            <td>{{number_format($row->projectWiseExpense->sum('amount'))}} Tk</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td>Subtotal:</td>
                                        <td>{{number_format($expense->sum('amount'))}}TK</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div>
                </div>

        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-2 mb-3">Employee</h4>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <thead>
                                    <th>Total Employee</th>
                                    <th>Total Payable Salary </th>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>{{count($employee)}}</td>

                                            <td>{{number_format($employee->sum('salary'))}} Tk</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div>
                </div>
            </div>
    </div>


@endsection
