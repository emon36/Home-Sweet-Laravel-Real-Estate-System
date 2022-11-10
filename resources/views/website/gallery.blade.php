@extends('website.layouts.master')


@section('content')
    @include('website.layouts.header')

    <div class="full-row bg-light">
        <div class="container">
            <div class="col">
                <h3>Our Gallery</h3>
            </div>
            <div class="row mt-5 ">
                @foreach($gallery as $row)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <img class="card-img" src="{{asset('uploads/galleryImages/'.$row->image)}}" height="250" alt="news image">

                            <div class="card-body">

                                <p class="card-text">{{$row->caption}}</p>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <div class="d-flex">
                {!! $gallery->links() !!}
            </div>

        </div>

    @include('website.layouts.footer')


@endsection
