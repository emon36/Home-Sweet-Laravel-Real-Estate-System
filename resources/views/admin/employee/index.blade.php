@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Employees</div>

                    <div class="table-responsive">
                        <table class="table text-center table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="seller-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Salary</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $row)
                                <tr>
                                    <td>{{$row->employee_id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->salary}}</td>
                                    <td><img src="{{asset('uploads/employeeImages/'.$row->image)}}" height="100"/> </td>
                                    <td>
                                        <a href="{{route('admin.employee.edit',$row->id)}}" data-original-title="edit" class="edit btn btn-info btn-sm"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0)"   data-id="{{$row->id}}" data-original-title="delete" class="edit btn btn-danger btn-sm deleteEmployee"> <i class="mdi mdi-delete"></i></a>
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
                    'targets': [4,5],
                    'orderable': false,

                }]
            });

            $('body').on('click', '.deleteEmployee', function () {

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
                            url: '/admin/delete/employee/'+id,
                            method: 'delete',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Employee has been deleted.',
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


