@extends('website.layouts.master')

@section('content')

    @include('website.layouts.header')

    <div class="full-row py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-secondary">Contact</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{route('website.home')}}">Home</a></li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="full-row pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-5 order-md-2">
                    <h4 class="down-line mb-4">Get In Touch</h4>
                    <div class="mb-3">
                        <ul>
                            <li class="mb-3">
                                <h6 class="mb-0">Office Address Dhanmondi :</h6> Lake View Plaza (1st Floor),
                                Purbo Bazar, Joypurhat
                            </li>
                            <li class="mb-3">
                                <h6>Contact Number :</h6> +8801977451259
                            </li>
                            <li class="mb-3">
                                <h6>Email Address :</h6> info@homesweet.com
                            </li>
                        </ul>

                        <ul>
                            <li class="mb-3">
                                <h6 class="mb-0">Office Address Bogura :</h6> House No.209 (1st Floor)
                                Hatu Mia Len, College Road
                                Katnarpara Bogura
                            </li>
                            <li class="mb-3">
                                <h6>Contact Number :</h6> +8801977451259
                            </li>
                            <li class="mb-3">
                                <h6>Email Address :</h6> info@homesweet.com
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 order-md-1">
                    <h4 class="down-line mb-4">Send Message</h4>
                    <div class="form-simple">
                        <form id="contact-form" action="{{route('contact.store')}}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-20">
                                    <label class="mb-2">Full Name:</label>
                                    <input type="text" class="form-control bg-white" name="name" required="">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="mb-2">Your Phone:</label>
                                    <input type="number" class="form-control bg-white" name="phone" required="">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label class="mb-2">Your Email:</label>
                                    <input type="email" class="form-control bg-white" name="email" required="">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label class="mb-2">Subject:</label>
                                    <input type="text" class="form-control bg-white" name="subject" required="">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label class="mb-2">Message:</label>
                                    <textarea class="form-control bg-white" name="message" rows="8" required=""></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" name="submit" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('website.layouts.footer')
@endsection
