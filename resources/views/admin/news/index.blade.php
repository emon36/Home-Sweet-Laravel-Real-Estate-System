@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">News</div>

                    <div class="table-responsive">
                        <table class="table text-center table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="news-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>Index</th>
                                <th>Title</th>
                                <th>Feature Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>
                                        <img src="{{asset('uploads/newsImages/'.$row->image)}}" height="150">
                                    </td>
                                    <td>
                                        <a href="{{route('admin.news.edit',$row->id)}}"  title="edit" data-toggle="tooltip" class="edit btn btn-info btn-sm"> <i class="mdi mdi-content-save-edit "></i></a>
                                        <a href="javascript:void(0)"   data-id="{{$row->id}}" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm deleteNews"> <i class="mdi mdi-delete"></i></a>
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
            var table = $('#news-datatable').DataTable({
                'columnDefs': [ {
                    'targets': [3],
                    'orderable': false,

                }],

            });

            $('body').on('click', '.deleteNews', function () {

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
                            url: '{{route('admin.news.delete')}}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Expense has been deleted.',
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

