@extends('customer.master')
@section('body')

    <div class="full-row px-40 py-30 xs-p-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">My Bookings</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="dashboard-panel border bg-white rounded overflow-hidden w-100">
                        <div class="overflow-x-scroll font-fifteen">
                            <table class="w-100 items-list bg-transparent">
                                <thead>
                                <tr class="bg-white">
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Property Name</th>
                                    <th scope="col">Property Price</th>
                                    <th scope="col">Booking Amount</th>
                                    <th scope="col">Total Paid Amount </th>
                                    <th scope="col">Due</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Payment Status</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order as $row)
                                    <tr>
                                        <td>{{$row->order_code}}</td>
                                        <td>{{$row->properties->property_name}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->booking_amount}}</td>
                                        <td>{{$row->paid_amount}}</td>
                                        <td>{{$row->due}}</td>
                                        @if($row->order_status == 1)
                                            <td class="bg-info text-dark">Running</td>
                                        @elseif($row->order_status == 1)
                                            <td class="bg-success text-dark">Completed</td>
                                        @else
                                            <td class="bg-danger text-white">Canceled</td>
                                        @endif
                                        @if ($row->payment_status == 1)
                                            <td class="bg-success text-dark">Paid</td>
                                        @else
                                            <td class="bg-danger text-white">Due</td>
                                        @endif
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
