@extends('seller.layouts.master')
@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Expenses</div>

                    <div class="table-responsive">
                        <table class="table text-center table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="expense-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>Index</th>
                                <th>Project Name</th>
                                <th>Submitted By</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expenses as $expense)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$expense->projects->project_name}}</td>
                                    <td>{{$expense->submitted_by}}</td>
                                    <td>{{$expense->amount}}</td>
                                    @if($expense->status == 0)
                                        <td> <span class="p-2 badge badge-success-lighten">Approved</span></td>
                                    @else
                                        <td> <span class="p-2 badge badge-danger-lighten"> Not Approved</span></td>
                                    @endif
                                    <td>{{$expense->date}}</td>
                                    <td>
                                        <a href="{{route('seller.expense.show',$expense->id)}}"  title="view" data-toggle="tooltip" class="edit btn btn-success btn-sm"> <i class="mdi mdi-eye "></i></a>
                                        <a href="{{route('seller.expense.edit',$expense->id)}}"  title="edit" data-toggle="tooltip" class="edit btn btn-info btn-sm {{$expense->status == 0 ? 'disabled' : '' }} "> <i class="mdi mdi-account-edit"></i></a>
                                        <a href="javascript:void(0)"   data-id="{{$expense->id}}" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm deleteExpense {{$expense->status == 0 ? 'disabled' : '' }} "> <i class="mdi mdi-delete"></i></a>
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
            var table = $('#expense-datatable').DataTable({
                'columnDefs': [ {
                    'targets': [6],
                    'orderable': false,

                }],
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
                            columns: [0,1,2,3,4,5]
                        }

                    },
                ],
            });

            $('body').on('click', '.deleteExpense', function () {

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
                            url: '/admin/expense/delete/' + id,
                            method: 'delete',
                            data: {
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

