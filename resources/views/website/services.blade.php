@extends('website.layouts.master')
@section('content')
    @include('website.layouts.header')

    <div class="full-row bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Our Services</h3>
                </div>
            </div>
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 mt-5">
                <div class="col">
                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                        <div class="post-image position-relative overlay-secondary">
                            <img src="{{asset('frontend/images/slider/banner2.jpg')}}" height="300" width="100%" alt="Image not found!">
                        </div>
                        <div class="post-content p-35">
                            <h5 class="d-block font-400 mb-3">Flat Sale</h5>
                            <p>Yeasin City Housing limited is constructed beautiful, Luxury ready flat-Apartment with sufficient car parking for sale.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                        <div class="post-image position-relative overlay-secondary">
                            <img src="{{asset('frontend/images/services/g7.jpg')}}"  height="300" width="100%" alt="Image not found!">

                        </div>
                        <div class="post-content p-35">
                            <h5 class="d-block font-400 mb-3">Drawing & Design</h5>
                         <p>Potential Civil, Architectural & Electrical Engineer will drawn Structural, Architectural, Electrical, Fire Safety & Plumbing drawing & design.
                         </p>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                        <div class="post-image position-relative overlay-secondary">
                            <img src="{{asset('frontend/images/services/g8.jpeg')}}" height="300" width="100%" alt="Image not found!">
                        </div>
                        <div class="post-content p-35">
                            <h5 class="d-block font-400 mb-3">Trading</h5>
                            <p>Yeasin City Housing limited Purchase or Sale old building & half broken building.
                            </p>

                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                        <div class="post-image position-relative overlay-secondary">
                            <img src="{{asset('frontend/images/services/g10.jpg')}}" height="300" width="100%" alt="Image not found!">

                        </div>
                        <div class="post-content p-35">
                            <h5 class="d-block font-400 mb-3">Develop
                            </h5>
                            <p> Yeasin City Housing limited will develop any kind of building by agreement with land owner.
                            </p>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                        <div class="post-image position-relative overlay-secondary">
                            <img src="{{asset('frontend/images/services/g11.jpg')}}" height="300" width="100%" alt="Image not found!">

                        </div>
                        <div class="post-content p-35">
                            <h5 class="d-block font-400 mb-3">Hollow Block Sale
                            </h5>
                            <p>We have large hollow block factory for internal use and sale as low price.
                            </p>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                        <div class="post-image position-relative overlay-secondary">
                            <img src="{{asset('frontend/images/services/g12.png')}}" height="300" width="100%"  alt="Image not found!">

                        </div>
                        <div class="post-content p-35">
                            <h5 class="d-block font-400 mb-3">Consultancy
                            </h5>
                           <p>Any kind of building construction, document, Drawing & Design, plan related consultancy.
                           </p>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    @include('website.layouts.footer')


@endsection
