
@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Subscribers</div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="subscriber-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>Index</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->email}}</td>
                                    <td><a href="javascript:void(0)"   data-id="{{$row->id}}" data-original-title="delete" class="edit btn btn-danger btn-sm deleteSubscriber"> <i class="mdi mdi-delete"></i></a>
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
            var table = $('#subscriber-datatable').DataTable({
                'columnDefs': [ {
                    'targets': [2],
                    'orderable': false,

                }],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1]
                        }

                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1]
                        }

                    },
                ],

            });

            $('body').on('click', '.deleteSubscriber', function () {

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
                            url: '{{route('admin.subscriber.delete')}}',
                            method: 'delete',
                            data: {
                                id : id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Admin has been deleted.',
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

