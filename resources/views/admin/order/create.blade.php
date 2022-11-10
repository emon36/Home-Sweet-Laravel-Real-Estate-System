@extends('admin.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Order</div>
                    <form class="form-horizontal" action="{{route('admin.order.store')}}"  method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Customer</label>
                            <div class="col-9">
                                <select id="customerSelect"  class="@error('customer') is-invalid @enderror" name="customer" >
                                    <option value="" >Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}} - {{$customer->phone}}</option>
                                    @endForeach
                                </select>
                                @error('customer')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Customer Address</label>
                            <div class="col-9">
                                <input type="text"  class="form-control @error('address') is-invalid @enderror" name="address"  />
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Project Name</label>
                            <div class="col-9">
                                <select id="projectSelect"  class="@error('project') is-invalid @enderror" name="project">
                                    <option value="" >Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->project_name}}</option>
                                    @endForeach
                                </select>
                                @error('project')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Property Name</label>
                            <div class="col-9">
                                <select id="propertySelect"  class=" propertySelect form-control @error('property') is-invalid @enderror" name="property">

                                </select>
                                @error('property')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Booking Amount</label>
                            <div class="col-9">
                               <input type="number"  class="form-control @error('booking_amount') is-invalid @enderror" name="booking_amount"  />
                                @error('booking_amount')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Order Date</label>
                            <div class="col-4">
                                <input type="date" id="example-date"  class="form-control @error('date') is-invalid @enderror" name="date" />
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')

    <script>



        $(document).ready(function(){
            $('select[name="project"]').on('change',function(){
                var project_id = $(this).val();
                if (project_id) {

                    $.ajax({
                        url: "{{ url('admin/order/get/property/') }}/"+project_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d = $('select[name="property"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="property"]').append('<option value="'+ value.id + '">' + value.property_name + '</option>');
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
            })

            $('#propertySelect').select2();
            $('#projectSelect').select2();
            $('#customerSelect').select2();




        });


    </script>

@endsection
