@extends('website.layouts.master')
@section('content')
    @include('website.layouts.header')


    <div class="full-row pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 order-xl-1 sm-mb-30">
                    <div class="single-post border summary bg-white p-30 mb-30">
                        <div class="single-post-title">
                            <h4 class="mb-3 text-secondary">{{$news->title}}</h4>
                            <div class="post-meta list-color-general mb-4">
                                <a href="#"><i class="flaticon-user-silhouette flat-mini"></i> <span>By Admin</span></a>
                                <a href="#"><i class="flaticon-calendar flat-mini"></i> <span>{{htmlspecialchars($news->created_at)}}</span></a>
                            </div>
                        </div>
                        <div class="post-image">
                            <img src="{{asset('uploads/newsImages/'.$news->image)}}" alt="Image not found!">
                        </div>
                        <div class="post-content pt-4 mb-5">
                           <p>{!! $news->long_description !!}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @include('website.layouts.footer')

    @endsection


