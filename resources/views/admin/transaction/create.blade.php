@extends('admin.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Add Payment</div>
                    <form class="form-horizontal" action="{{route('admin.transaction.store')}}"  method="POST">
                        @csrf

                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <input type="hidden" name="user_id" value="{{$order->user_id}}">
                        <input type="hidden" name="property_id" value="{{$order->property_id}}">

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Description</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" />
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Pay Amount</label>
                            <div class="col-9">
                                <input type="number"  class="form-control @error('pay_amount') is-invalid @enderror" name="pay_amount"  />
                                @error('pay_amount')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Payment Date</label>
                            <div class="col-4">
                                <input type="date" id="example-date"  class="form-control @error('payment_date') is-invalid @enderror" name="payment_date" />
                                @error('payment_date')
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

                                $('select[name="property"]').append('<option value="">' +'Select Property '+ '</option>');

                                $('select[name="property"]').append('<option value="'+ value.id + '">' + value.property_name + '</option>');
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
            })




        });


    </script>

@endsection
