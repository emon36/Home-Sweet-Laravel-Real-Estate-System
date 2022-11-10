@extends('website.layouts.master')
@section('content')
    @include('website.layouts.header')

    <div class="full-row p-0">
        <div class="container">
            <div class="row">
                <div id="carouselExampleControls" class="carousel slide  " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $images = explode (",", $project->images);

                        @endphp
                        @foreach($images as $key => $row)
                            <div class="carousel-item {{$key == 0 ? 'active' : '' }} ">
                                <img src="{{asset('uploads/projectImages/'.$row)}}"  height="600" class="d-block w-100" alt="...">
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
                        <!-- Property Search -->
                        <!--============== Recent Property Widget Start ==============-->
                        <div class="widget widget_recent_property">
                            <h5 class="text-secondary mb-4">Recent Property</h5>
                            <ul>
                                <li>
                                    <img src="./property_view_files/01.jpg" alt="">
                                    <div class="thumb-body">
                                        <h6 class="listing-title"><a href="http://unicoderbd.com/theme/html/uniland/fullwidth/property-single-1.html">Nirala Appartment</a></h6>
                                        <span class="listing-price">$3200<small>( Monthly )</small></span>
                                        <ul class="d-flex quantity font-fifteen">
                                            <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>6500 Sqft</li>

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <img src="./property_view_files/02.jpg" alt="">
                                    <div class="thumb-body">
                                        <h6 class="listing-title"><a href="http://unicoderbd.com/theme/html/uniland/fullwidth/property-single-1.html">Condo House</a></h6>
                                        <span class="listing-price">$11500<small>( Monthly )</small></span>
                                        <ul class="d-flex quantity font-fifteen">
                                            <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>2200 Sqft</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <img src="./property_view_files/03.jpg" alt="">
                                    <div class="thumb-body">
                                        <h6 class="listing-title"><a href="http://unicoderbd.com/theme/html/uniland/fullwidth/property-single-1.html">Luxury Condos</a></h6>
                                        <span class="listing-price">$17000<small>( Monthly )</small></span>
                                        <ul class="d-flex quantity font-fifteen">
                                            <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>3500 Sqft</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <img src="./property_view_files/04.jpg" alt="">
                                    <div class="thumb-body">
                                        <h6 class="listing-title"><a href="http://unicoderbd.com/theme/html/uniland/fullwidth/property-single-1.html">Small Appartment</a></h6>
                                        <span class="listing-price">$5200<small>( Monthly )</small></span>
                                        <ul class="d-flex quantity font-fifteen">
                                            <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>1200 Sqft</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--============== Recent Property Widget End ==============-->
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="property-overview border summary rounded bg-white p-30 mb-30">
                            <div class="row mb-4">
                                <div class="col-auto">
                                    <div class="post-meta font-small text-uppercase list-color-primary">
                                        <p class="listing-ctg"><i class="fa-solid fa-building"></i><span>Appartment</span></p>
                                    </div>
                                    <h4 class="listing-title">{{$project->project_name}}</h4>
                                    <span class="listing-location"><i class="fas fa-map-marker-alt text-primary"></i> {{$project->location}} </span>
                                </div>

                                <div class="col-12">

                                    <div class="mt-2">
                                        <ul class=" d-table">
                                            <li><span class="font-500">Number of Flats:</span> {{$project->number_of_flats}}</li>
                                            <li><span class="font-500">Number of Floors:</span> {{$project->number_of_floors}}</li>
                                            <li><span class="font-500">Number Of Blocks:</span> {{$project->number_of_blocks}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1">
                                <div class="col">
                                    <h5 class="mb-3">Description</h5>
                                    <p> {!! $project->long_description !!}</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @include('website.layouts.footer')



@endsection
