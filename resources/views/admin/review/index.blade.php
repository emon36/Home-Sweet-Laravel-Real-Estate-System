@extends('admin.layouts.master')


@section('content')

<div class="row">
    <div class="col-12 mx-auto mt-3">
        <div class="card mb-md-0">
            <div class="card-body">
                <div class="card-title">Customer Reviews</div>

                <div class="table-responsive">
                    <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="project-datatable">
                        <thead class="table-light">
                        <tr>
                            <th>Index</th>
                            <th>Customer Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$review->users->name}}</td>
                            <td>
                                <img src="{{asset('uploads/profileImages/'.$review->users->image)}}" height="100"  alt="" />
                            </td>

                            <td>
                                <a href="{{route('admin.review.edit',$review->id)}}"  class="btn btn-primary btn-sm editProject"> <i class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0)"   data-id="{{$review->id}}"class="btn btn-danger btn-sm deleteReview"> <i class="mdi mdi-delete"></i></a>
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

        $('body').on('click', '.deleteReview', function () {

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
                        url: '{{route('admin.review.delete')}}',
                        method: 'delete',
                        data: {
                            id : id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Deleted!',
                                'Review has been deleted.',
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


