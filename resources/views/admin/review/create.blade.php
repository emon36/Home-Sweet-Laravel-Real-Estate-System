@extends('admin.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Review</div>
                    <form class="form-horizontal" action="{{route('admin.review.store')}}"  method="POST">
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
                            <label for="inputRole" class="col-3 col-form-label">Customer Review</label>
                            <div class="col-9">
                                <textarea class=" form-control @error('review') is-invalid @enderror" rows="3" name="review"> </textarea>
                                @error('review')
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

            $('#customerSelect').select2();




        });


    </script>

@endsection
