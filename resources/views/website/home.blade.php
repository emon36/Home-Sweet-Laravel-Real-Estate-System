@extends('website.layouts.master')

@section('content')
    @include('website.layouts.home_header')
    <!--============== Slider Area Start ==============-->

    <div class="full-row p-0 overflow-hidden">

        <div id="slider" class="overflow-hidden" style="width:1200px; height:780px; margin:0 auto;margin-bottom: 0px;">

            <!-- Slide 1-->
            <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:12000; transition2d:104; kenburnsscale:1.00;">
                <img width="1920" height="960" src="{{asset('frontend/images/slider/banner1.jpg')}}" class="ls-bg" alt="" />
                <p style="font-size:20px; font-weight:400; top:320px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:500; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">Home Sweet Housing Limited</p>
                <p style="font-size:48px; font-weight:700; top:370px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:1000; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">FIND A HOME TO SUIT YOUR LIFESTYLE</p>
                <a style="" class="ls-l ls-hide-phone" href="{{route('website.projects')}}" target="_self" data-ls="offsetyin:40; delayin:2000; clipin:0 0 100% 0; durationout:400; hover:true; hoverdurationin:300; hoveropacity:1; hoverbgcolor:#222; hovercolor:#aa8453;">
                    <p style="font-weight:500; text-align:center; cursor:pointer; padding-right:35px; padding-left:35px; font-weight: 500; font-size:16px; font-family: 'Sen', sans-serif; line-height:40px; top:550px; left:50%; color:#fff; border-radius:30px; padding-top:10px; padding-bottom:10px; background:#FF9115; white-space:normal;"
                       class="">View More</p>
                </a>
            </div>

            <!-- Slide 2 -->
            <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:12000; transition2d:104; kenburnsscale:1.00;">
                <img width="1920" height="960" src="{{asset('frontend/images/slider/banner2.jpg')}}" class="ls-bg" alt="" />
                <p style="font-size:20px; font-weight:400; top:320px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:500; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">Home Sweet Housing Limited</p>
                <p style="font-size:48px; font-weight:700; top:370px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:1000; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">FIND A HOME TO SUIT YOUR LIFESTYLE</p>
                <a style="" class="ls-l ls-hide-phone" href="{{route('website.projects')}}" target="_self" data-ls="offsetyin:40; delayin:2000; clipin:0 0 100% 0; durationout:400; hover:true; hoverdurationin:300; hoveropacity:1; hoverbgcolor:#222; hovercolor:#aa8453;">
                    <p style="font-weight:500; text-align:center; cursor:pointer; padding-right:35px; padding-left:35px; font-weight: 500; font-size:16px; font-family: 'Sen', sans-serif; line-height:40px; top:550px; left:50%; color:#fff; border-radius:30px; padding-top:10px; padding-bottom:10px; background:#FF9115; white-space:normal;"
                       class="">View More</p>
                </a>
            </div>

            <!-- Slide 3 -->
            <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:12000; transition2d:104; kenburnsscale:1.00;">
                <img width="1920" height="960" src="{{asset('frontend/images/slider/14.png')}}" class="ls-bg" alt="" />
                <p style="font-size:20px; font-weight:400; top:320px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:500; clipin:0 0 100% 0; durationout:400; parallaxlevelHome Sweet City Housing Limited</p>
                <p style="font-size:48px; font-weight:700; top:370px; left:50%; font-family: 'Sen', sans-serif;" class="ls-l ls-hide-phone text-white" data-ls="offsetyin:100%; durationin:1500; delayin:1000; clipin:0 0 100% 0; durationout:400; parallaxlevel:0;">FIND A HOME TO SUIT YOUR LIFESTYLE</p>
                <a style="" class="ls-l ls-hide-phone" href="{{route('website.projects')}}" target="_self" data-ls="offsetyin:40; delayin:2000; clipin:0 0 100% 0; durationout:400; hover:true; hoverdurationin:300; hoveropacity:1; hoverbgcolor:#222; hovercolor:#aa8453;">
                    <p style="font-weight:500; text-align:center; cursor:pointer; padding-right:35px; padding-left:35px; font-weight: 500; font-size:16px; font-family: 'Sen', sans-serif; line-height:40px; top:550px; left:50%; color:#fff; border-radius:30px; padding-top:10px; padding-bottom:10px; background:#FF9115; white-space:normal;"
                       class="">View More</p>
                </a>
            </div>

        </div>
    </div>


    <!--============== Slider Area End ==============-->

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
                                        <a class="btn btn-primary btn-sm" href="{{route('website.property.list',$project->id)}}" role="button">View Properties </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--============== Recent Property Start ==============-->
    <div class="full-row bg-light">
        <div class="container">
            <div class="row">
                <div class="col mb-4">
                    <div class="align-items-center d-flex">
                        <div class="me-auto">
                            <h2 class="d-table">Recent Properties</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="3block-carusel nav-disable owl-carousel">
                        @foreach($properties as $row)
                        <div class="item">
                            <!-- Property Grid -->
                            @php
                                $images = explode (",", $row->images);
                                $image = $images[0];
                            @endphp
                            <div class="property-grid-1 property-block bg-white transation-this">
                                <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                    <div class="cata position-absolute"><span class="sale bg-secondary text-white">For Sale</span></div>
                                    <a href="{{route('website.properties.show',$row->id)}}"><img src="{{asset('uploads/propertyImages/'.$image)}}" height="250" width="100%" alt="Image Not Found!"></a>
                                    <p class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>Apartment</span></p>

                                </div>
                                <div class="property_text p-4">
                                    <h5 class="listing-title"><a href="{{route('website.properties.show',$row->id)}}">{{$row->property_name}} </a></h5>
                                    <span class="listing-location"><i class="fas fa-map-marker-alt"></i>{{$row->location}} </span>
                                    <ul class="d-flex quantity font-fifteen">
                                        <li title="Beds"><span><i class="fa-solid fa-bed"></i></span>{{$row->number_of_bedrooms}}</li>
                                        <li title="Baths"><span><i class="fa-solid fa-shower"></i></span>{{$row->number_of_bathrooms}}</li>
                                        <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>{{$row->size}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============== Recent Property End ==============-->


    <!--============== Testimonial Section Start ==============-->
    <div class="full-row bg-white ">
        <div class="container">
            <div class="row">
                <div class="col mb-5">
                    <span class="text-primary tagline pb-2 d-table m-auto">Testimonial</span>
                    <h2 class="down-line w-50 mx-auto mb-4 text-center w-sm-100">Whay Client Says About Us</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="testimonial-simple text-center px-5">
                        <div class="text-carusel owl-carousel">
                            @foreach($reviews as $row)
                            <div class="item">
                                <i class="flaticon-right-quote flat-large text-primary d-table mx-auto"></i>
                                <blockquote class="text-secondary fs-5 fst-italic">“ {{$row->review}} ”</blockquote>
                                <img src="{{asset('uploads/profileImages/'.$row->users->image)}}" class="rounded-circle mx-auto" style="width: 150px; height: 150px" >
                                <h4 class="mt-4 font-400">{{$row->users->name}}</h4>
                                <span class="text-primary font-fifteen">Client</span>

                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============== Testimonial Section End ==============-->

    <!--============== Blog Section Start ==============-->
    <div class="full-row bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <span class="pb-2 d-table w-50 w-sm-100 text-primary m-auto text-center tagline">Our Recent Post</span>
                    <h2 class="down-line w-50 w-sm-100 mx-auto text-center mb-5">Publish What We Think, About Our Company Activities</h2>
                </div>
            </div>
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                @foreach($news as $row)
                <div class="col">
                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                        <div class="post-image position-relative overlay-secondary">
                            <img src="{{asset('uploads/newsImages/'.$row->image)}}" height="250" width="100%" alt="Image not found!">

                        </div>
                        <div class="post-content p-35">
                            <h5 class="d-block font-400 mb-3"><a href="{{route('website.news.show',$row->id)}}" class="transation text-dark hover-text-primary">{{$row->title}}</a></h5>
                            <p>{!! $row->short_description !!}</p>
                            <a class="btn btn-primary btn-lg hvr-underline-from-left" href="{{route('website.news.show',$row->id)}}" role="button">Read More </a>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--============== Blog Section End ==============-->

    <!--============== Register Section Start ==============-->
    @include('website.layouts.footer')
@endsection
