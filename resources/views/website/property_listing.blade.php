@extends('website.layouts.master')

@section('content')
    @include('website.layouts.header')


    <div class="full-row py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-secondary">{{$project->project_name}}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="full-row pt-0">
        <div class="container">
            <div class="row row-cols-1 g-4">
                @foreach($properties as $row)
                <div class="col">
                    <!-- Property Grid -->
                    <div class="property-list-2 p-2 bg-white property-block border transation-this hover-shadow rounded">
                        <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                            <div class="cata position-absolute"><span class="sale bg-secondary text-white">For Sale</span></div>
                            <div class="owl-carousel single-carusel dot-disable nav-between-in">
                                @php
                                    $images = explode (",", $row->images);

                                @endphp
                                @foreach($images as $key => $image)
                                <div class="item {{$key == 0 ? 'active' : '' }}">
                                    <a href="{{route('website.properties.show',$row->id)}}"><img src="{{asset('uploads/propertyImages/'.$image)}}"  alt="Image Not Found!"></a>
                                </div>
                                @endforeach
                            </div>
                            <a href="#" class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>Apartment</span></a>

                        </div>
                        <div class="property_text p-3">
                            <h5 class="listing-title"><a href="">{{$row->property_name}}</a></h5>
                            <span class="listing-location"><i class="fas fa-map-marker-alt"></i>{{$row->location}} </span>
                            <ul class="d-flex quantity font-fifteen">
                                <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>{{$row->number_of_bedrooms}}</li>
                                <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>{{$row->number_of_bathrooms}}</li>
                                <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>{{$row->size}} Sqft</li>
                            </ul>
                            <p>{!! $row->short_description !!}</p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="d-flex mt-5">
                {!! $properties->links() !!}
            </div>
        </div>

    </div>



    @include('website.layouts.footer')

@endsection
