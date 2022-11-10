@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Sellers</div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="seller-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>Index</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sellers as $seller)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$seller->name}}</td>
                                    <td>{{$seller->email}}</td>
                                    <td>{{$seller->phone}}</td>
                                    <td>
                                        <a href="{{route('admin.user.edit.sellers',$seller->id)}}" data-original-title="edit" class="edit btn btn-info btn-sm"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0)"   data-id="{{$seller->id}}" data-original-title="delete" class="edit btn btn-danger btn-sm deleteSeller"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach

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

        $(document).ready( function () {
            var table = $('#seller-datatable').DataTable({
                'columnDefs': [ {
                    'targets': [4],
                    'orderable': false,

                }]
            });

            $('body').on('click', '.deleteSeller', function () {

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
                            url: '/admin/user/seller/delete/'+id,
                            method: 'delete',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Seller has been deleted.',
                                    'success'
                                )
                                setTimeout(() => {
                                    location.reload();
                                }, 2000)

                            }
                        });
                    }
                });

            });


        } );


    </script>


@endsection

