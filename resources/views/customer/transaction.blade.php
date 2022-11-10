@extends('customer.master')
@section('body')

    <div class="full-row px-40 py-30 xs-p-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">My Transactions</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="dashboard-panel border bg-white rounded overflow-hidden w-100">
                        <div class="overflow-x-scroll font-fifteen">
                            <table class="w-100 items-list bg-transparent">
                                <thead>
                                <tr class="bg-white">
                                    <th>Transaction ID</th>
                                    <th >Property Name</th>
                                    <th>Paid Amount</th>
                                    <th>Payment Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transaction as $row)
                                    <tr>
                                        <td>{{$row->transaction_code}}</td>
                                        <td>{{$row->properties->property_name}}</td>
                                        <td>{{$row->pay_amount}}</td>
                                        <td>{{$row->payment_date}}</td>
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
