@extends('seller.layouts.master')
@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Transactions</div>

                    <div class="table-responsive">
                        <table class="table table-centered text-center table-borderless table-hover w-100 dt-responsive nowrap" id="transaction-table">
                            <thead class="table-light">
                            <tr>
                                <th>Transaction ID</th>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Property Name</th>
                                <th>Payment Date</th>
                                <th class="action">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#transaction-table').DataTable({
                autoWidth: true,
                processing: true,
                serverSide: true,
                ajax: "{{route('seller.transaction.get_transactions')}}",
                columns: [
                    {data: 'transaction_code',name: 'transaction_code'},
                    {data: 'order_code',name: 'orders.order_code'},
                    {data: 'name', name: 'users.name'},
                    {data: 'property_name', name: 'properties.property_name'},
                    {data: 'payment_date', name: 'payment_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, button: false},
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5]
                        }

                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2,3,4,]
                        }

                    },
                ],

            });

            $('body').on('click', '.deleteTransaction', function () {

                var id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/seller/delete/transaction/'+id,
                            method: 'delete',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Payment has been deleted.',
                                    'success'
                                )
                                table.draw();

                            }
                        });
                    }
                });

            });

        });
    </script>


@endsection



