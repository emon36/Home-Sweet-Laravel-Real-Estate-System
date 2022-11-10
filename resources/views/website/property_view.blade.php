@extends('website.layouts.master')
@section('content')
    @include('website.layouts.header')

    <div class="full-row p-0">
        <div class="container">
            <div class="row">
                <div id="carouselExampleControls" class="carousel slide  " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $images = explode (",", $property->images);

                        @endphp
                        @foreach($images as $key => $row)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }} ">
                            <img src="{{asset('uploads/propertyImages/'.$row)}}"  class="d-block w-100" alt="...">
                        </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
        </div>
    </div>
    <!--============== Property Slider End ==============-->

    <!--============== Property Details Start ==============-->
    <div class="full-row pt-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <!-- Message Form -->
                    <div class="widget widget_contact bg-white border p-30 shadow-one rounded mb-30">
                        <h5 class="mb-4">Contact Us</h5>
                        <form class="quick-search form-icon-right" action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-12 mb-10">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" name="name" required placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-12 mb-10">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" name="phone" required placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-12 mb-10">
                                    <div class="form-group mb-0">
                                        <input type="email" class="form-control" name="email" required placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-12 mb-10">
                                    <div class="form-group mb-0">
                                        <textarea class="form-control" name="message" placeholder="Message" required rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary w-100" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="property-overview border summary rounded bg-white p-30 mb-30">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <div class="post-meta font-small text-uppercase list-color-primary">
                                    <p class="listing-ctg"><i class="fa-solid fa-building"></i><span>Appartment</span></p>
                                </div>
                                <h4 class="listing-title">{{$property->property_name}}</h4>
                                <span class="listing-location"><i class="fas fa-map-marker-alt text-primary"></i> {{$property->location}} </span>
                            </div>
                            <div class="col-auto ms-auto xs-m-0 text-end xs-text-start pb-4">
                                <span class="text-white font-mini px-2 rounded product-status ms-auto xs-m-0 py-1 bg-primary"><i class="fas fa-check"></i> Available</span>
                            </div>
                            <div class="col-12">

                                <div class="mt-2">
                                    <ul class="list-three-fold-width d-table">
                                        <li><span class="font-500">Beds:</span> {{$property->number_of_bedrooms}}</li>
                                        <li><span class="font-500">Area:</span> {{$property->size}} Sqft<sup>2</sup></li>
                                        <li><span class="font-500">Baths:</span> {{$property->number_of_bathrooms}}</li>
                                        <li><span class="font-500">Floor Number:</span> {{$property->floor_number}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1">
                            <div class="col">
                                <h5 class="mb-3">Description</h5>
                               <p> {!! $property->long_description !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="property-overview border rounded bg-white p-30 mb-30">
                        <div class="row row-cols-1">
                            <div class="col">
                                <h5 class="mb-3">Property Features</h5>
                                @php
                                    $feature = json_decode($property->features, true);

                                @endphp

                                <ul class="list-three-fold-width list-style-tick">
                                    @foreach( (array) $feature as $row)
                                    <li> {{$row['value']}} </li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('website.layouts.footer')
@endsection

