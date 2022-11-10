@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Projects</div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="project-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>Index</th>
                                <th>Project Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$project->project_name}}</td>
                                    <td>{{htmlspecialchars($project->created_at)}}</td>
                                    <td>
                                        <a href="{{route('admin.project.edit',$project->id)}}"  class="btn btn-primary btn-sm editProject"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0)"   data-id="{{$project->id}}"class="btn btn-danger btn-sm deleteProject"> <i class="mdi mdi-delete"></i></a>
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
            var table = $('#project-datatable').DataTable({
                'columnDefs': [ {
                    'targets': [3],
                    'orderable': false,

                }]
            });

            $('body').on('click', '.deleteProject', function () {

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
                            url: '{{route('admin.project.delete')}}',
                            method: 'delete',
                            data: {
                                id : id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Project has been deleted.',
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

