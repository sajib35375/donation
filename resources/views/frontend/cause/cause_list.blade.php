@extends('frontend.body.app')
@section('content')
@section('title')
    Causes
@endsection
    <style>
       .full-cause {
           position: absolute;
           left: 0px;
           top: 0px;
           width: 100%;
           height: 100%;

       }


    </style>



    <div class="as-mainwrapper">

        <!--// Header //-->

        <!--// Header //-->

        <div class="as-minheader">
            <span style="background-image: url('{{ URL::to('') }}/admin/image/causes/banner/{{ $banner_img->banner }}')" class="full-cause"></span>
            <div class="as-minheader-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="as-page-title">
                                <h1>Causes Grid</h1>
                                <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="as-breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Causes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--// Main Content //-->
        <div class="as-main-content">

            <!--// MainSection //-->
            <div class="as-main-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-9">

                            <div class="as-causes as-causes-grid">
                                <ul class="row">
{{--                                    <li class="col-md-12 clearfix"></li>--}}


                                    @foreach($cause as $data)
                                    <li class="col-md-6">
                                        <figure><a href="{{ route('cause.single',$data->id) }}"><img src="{{ URL::to('') }}/admin/image/causes/{{ $data->photo }}" alt=""></a>
                                            <figcaption>
                                                <div class="as-donarhover">
                                                    <i class="flaticon-profile27 as-color"></i>
                                                    <a href="{{ route('cause.single',$data->id) }}">Donors: <span>25</span></a>
                                                </div>
                                            </figcaption>
                                        </figure>
                                        <div class="as-causes-text">
                                            <div class="as-causes-info">
                                                <h3><a href="{{ route('cause.single',$data->id) }}">{{ Str::of($data->title)->words(4) }}</a></h3>
                                                <p>{{ Str::of($data->Description)->words(20) }}</p>
                                            </div>
                                            <div class="as-causes-strip">
                                                <div data-percent="50%" class="causes-sec">
                                                    <div class="as-causebar">
                                                        <div style="background-color: #edb542; width:{{ $data->percentage }}%;" class="percent-bar"><small>{{ $data->percentage }}%</small></div>
                                                    </div>
                                                </div>
                                                <span class="as-raised">Raised: ${{ $data->raised }}</span>
                                                <span class="as-goal">Goal: ${{ $data->goal }}</span>
                                            </div>
                                            <a href="#" class="as-causes-btn">Donate Now</a>
                                        </div>
                                    </li>



                                    @endforeach










                                </ul>
                            </div>

                            <!--// Pagination //-->
                           {{ $cause->links('frontend.cause.cause_paginate') }}
                            <!--// Pagination //-->

                        </div>
                        <aside class="col-md-3">

                            <!--// Widget Categories //-->
                            <div class="widget widget_categories">
                                <div class="as-strip-title"> <h2>CATEGORY <span class="as-color">WIDGET</span></h2> </div>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                </ul>
                            </div>
                            <!--// Widget Categories //-->

                            <!--// Widget RecentPost //-->
                            <div class="widget widget_recent_post">
                                <div class="as-strip-title"> <h2>RECENT <span class="as-color">POST</span></h2> </div>
                                <ul>


                                   @foreach($recent as $post)
                                    <li>
                                        <figure><a href="#" class="as-thumb"><img style="height: 100px;" src="{{ URL::to('') }}/admin/image/blog/{{ $post->photo }}" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                                            <figcaption>
                                                <h4><a href="#">{{ Str::of($post->title)->words(3) }}</a></h4>
                                                <p>{!! Str::of($post->description)->words(10) !!}</p>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    @endforeach
                                   
                                    
                                </ul>
                            </div>
                            <!--// Widget RecentPost //-->

                            <!--// Widget Twitter //-->
                            <div class="widget widget_twitter">
                                <div class="as-strip-title"> <h2>twitter <span class="as-color">Feed</span></h2> </div>
                                <ul>
                                    <li>
                                        <span class="as-color">@Lorem Ipsum</span> Looking cautiously round, to ascerta in that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily. <a href="#">#Quote</a>
                                    </li>
                                    <li>
                                        <span class="as-color">@Lorem Ipsum</span> Looking cautiously round, to ascerta in that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily. <a href="#">#Quote</a>
                                    </li>
                                </ul>
                            </div>
                            <!--// Widget Twitter //-->

                            <!--// Widget Search //-->
                            <div class="widget widget_search">
                                <div class="as-strip-title"> <h2>Search <span class="as-color">WIDGET</span></h2> </div>
                                <form>
                                    <input type="text" placeholder="Search here..">
                                    <label><input type="submit" value=""></label>
                                </form>
                            </div>
                            <!--// Widget Twitter //-->

                        </aside>

                    </div>
                </div>
            </div>
            <!--// MainSection //-->

        </div>



    </div>
    <!--// Main Wrapper //-->

    <!-- Search Modal -->
    <div class="modal fade" id="searchmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header as-bgcolor">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4>Search</h4>
                </div>
                <div class="modal-body">
                    <form class="modal-search">
                        <input type="text" placeholder="Enter any keyword and press enter" name="usrname" required>
                        <label> <input type="submit" value=""> </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal -->

@endsection