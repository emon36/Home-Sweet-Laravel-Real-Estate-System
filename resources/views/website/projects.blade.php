@extends('website.layouts.master')
@section('content')
    @include('website.layouts.header')

    <div class="full-row bg-light">
        <div class="container">
            <div class="row">
                <div class="col mb-4">
                    <div class="align-items-center d-flex">
                        <div class="me-auto">
                            <h2 class="d-table">Our Projects</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="3block-carusel nav-disable owl-carousel">
                        @foreach($projects as $project)
                            <div class="item">
                                <!-- Property Grid -->
                                @php
                                    $images = explode (",", $project->images);
                                    $image = $images[0];
                                @endphp
                                <div class="property-grid-1 property-block bg-white transation-this">
                                    <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                        <a href="{{route('website.project.show',$project->id)}}"><img src="{{asset('uploads/projectImages/'.$image)}}" height="250" width="100%" alt="Image Not Found!"></a>
                                        <p class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>Project</span></p>
                                    </div>
                                    <div class="property_text p-4">
                                        <h5 class="listing-title"><a href="{{route('website.project.show',$project->id)}}">{{$project->project_name}} </a></h5>
                                        <span class="listing-location"><i class="fas fa-map-marker-alt"></i>{{$project->location}} </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('website.layouts.footer')


@endsection
