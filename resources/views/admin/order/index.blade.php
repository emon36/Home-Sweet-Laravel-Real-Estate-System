@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Orders</div>

                    <div class="table-responsive">
                        <table class="table table-centered text-center table-borderless table-hover w-100  nowrap" id="order-table">
                            <thead class="table-light">
                            <tr>
                                <th>Order Code</th>
                                <th>Name</th>
                                <th>Project Name</th>
                                <th>Property Name</th>
                                <th>Submitted By</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Order Date</th>
                                <th>Action</th>
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

            var table = $('#order-table').DataTable({
                autoWidth: true,
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.order.get_orders')}}",
                columns: [
                    {data: 'order_code',name: 'order_code'},
                    {data: 'name', name: 'users.name'},
                    {data: 'project_name', name: 'projects.project_name'},
                    {data: 'property_name', name: 'properties.property_name'},
                    {data: 'submitted_by', name: 'submitted_by'},
                    {data: 'payment_status', name: 'payment_status'},
                    {data: 'order_status', name: 'order_status'},
                    {data: 'order_date', name: 'order_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

            });

            $('body').on('click', '.deleteOrder', function () {

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
                            url: '{{ route('admin.order.delete') }}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Order has been deleted.',
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



