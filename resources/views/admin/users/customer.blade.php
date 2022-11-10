@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Customers</div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="customer-table">
                            <thead class="table-light">
                            <tr>
                                <th>Index</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>NID</th>
                                <th>TIN</th>
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

    <div id="updateCustomer" class="modal fade" tabindex="-1"  role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="profileUpdateForm" action="{{route('admin.user.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf

                        @if(Session::has('success'))
                            <div class="alert alert-success text-center">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Full Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"  placeholder="Enter Full Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="email"  class="form-control" id="email" class="@error('email') is-invalid @enderror" placeholder="Enter a Valid Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Phone</label>
                            <div class="col-9">
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone Number" id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-3 col-form-label">Change Password</label>
                            <div class="col-9">
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" name="password" value="{{ old('password') }}">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputFile" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" id="example-fileinput" class="form-control" name="image">
                                <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
                            </div>
                        </div>

                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

@endsection



@section('scripts')
    <script type="text/javascript">
        var SITEURL = '{{asset('/')}}';
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#customer-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.user.get_customer') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'nid', name: 'nid'},
                    {data: 'tin', name: 'tin'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('body').on('click', '.deleteUser', function () {

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
                            url: '{{ route('admin.user.delete_customer') }}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Customer has been deleted.',
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
