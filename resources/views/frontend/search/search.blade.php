@extends('frontend.body.app')
@section('content')
@section('title')
    Search
@endsection
    <style>
        .full-banner{
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;

        }

    </style>
{{--    <div class="as-minheader">--}}
{{--        <span style="background: url('http://localhost:8000/admin/image/about/1724742777659860.png');" class="full-banner"></span>--}}
{{--        <div class="as-minheader-wrap">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-9">--}}
{{--                        <div class="as-page-title">--}}
{{--                            <h1>About</h1>--}}
{{--                            <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <ul class="as-breadcrumb">--}}
{{--                            <li><a href="#">Home</a></li>--}}
{{--                            <li><a href="#">About</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="as-mainbanner">
        <div class="flexslider">
            <ul class="slides">

                @foreach( $images as $slider )

                    <li>
                        <img src="{{ URL::to('') }}/admin/image/slider/{{ $slider->photo }}" alt="" />
                        <div class="as-caption">
                            <div class="container">
                                <h1><span>{{Str::of($slider->title)->words(3)}}</span></h1>
                                <div class="clearfix"></div>
                                <div class="as-captiontitle"> <span>{{Str::of($slider->short_title)->words(2)}}</span>  </div>
                                <div class="clearfix"></div>
                                <a href="{{ route('donation.view') }}">Donate Now</a>
                            </div>
                        </div>
                    </li>

                @endforeach



            </ul>
        </div>
    </div>
    <!--// MainBanner //-->

    <!--// Main Content //-->
    <div class="as-main-content">

        <!--// MainSection //-->

    {{--        latest news--}}
    {{--comming soon latest news--}}
    {{--        <div class="as-main-section as-ticker" style=" padding: 25px 0px 15px 0px; margin-top: -50px; ">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}

    {{--                    <div class="col-md-12">--}}
    {{--                        <div class="as-newsticker">--}}
    {{--                            <h2 class="as-color">Latest News</h2>--}}
    {{--                            <span class="annouce-icon"><i class="fa fa-caret-right"></i></span>--}}
    {{--                            <ul id="as-news">--}}
    {{--                                <li><a href="#">Quisque eleifend auctor turpis mauris non convallis dui. - 12 August 2015</a></li>--}}
    {{--                                <li><a href="#"> Bibendum bibendumuris suscipit convallis ultrices. - 11 September 2015 </a></li>--}}
    {{--                                <li><a href="#">Quisque eleifend auctor turpis mauris non convallis dui. - 12 August 2015</a></li>--}}
    {{--                                <li><a href="#"> Bibendum bibendumuris suscipit convallis ultrices. - 11 September 2015 </a></li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    <!--// MainSection //-->

        <!--// MainSection //-->


        {{--        How you can help--}}

        <div class="as-main-section" style=" padding: 47px 0px 0px 0px; ">
            <div class="container">
                <div class="row">

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-fancytitle"> <h2>{{ $header->main_title }}</h2> </div>--}}
{{--                        <div class="as-fancy-divider-wrap">--}}
{{--                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>--}}
{{--                        </div>--}}
{{--                        <div class="as-title-text"><p>{{ Str::of($header->main_short_des)->words(20) }}</p></div>--}}
{{--                    </div>--}}



                    <div class="col-md-12 minus-element-margin">
                        <div class="as-services as-small-view">
                            <ul class="row">


                                @foreach($about as $data)
                                    <li class="col-md-4">
                                        <div class="as-service-wrap">
                                            <span class="as-icon"> <i class="{{ $data->icon }}"></i></span>
                                            <div class="as-infowrap">
                                                <h2>{{ $data->title }}</h2>
                                                <p>{{ Str::of($data->short_des)->words(12) }}</p>
                                                <a href="#">More <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </li>


                                @endforeach


                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->






        {{--        blog--}}
        <div class="as-main-section" style=" padding: 0px 0px 50px 0px; ">
            <div class="container">
                <div class="row">

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-fancytitle"> <h2>Our Causes</h2> </div>--}}
{{--                        <div class="as-fancy-divider-wrap">--}}
{{--                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="as-causes as-causes-grid">
                        <ul class="row">



                            @foreach($cause as $data)

                                <li class="col-md-3">
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
                                            <h3><a href="{{ route('cause.single',$data->id) }}">{{ Str::of($data->title)->words(2) }}</a></h3>
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

                </div>
            </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->




        {{--        gallery--}}


        <div class="as-main-section" style="  ">
            <div class="container-fluid">
                <div class="row">

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-fancytitle"> <h2>Our Gallery</h2> </div>--}}
{{--                        <div class="as-fancy-divider-wrap">--}}
{{--                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col-md-12">
                        <div class="as-gallery-style">
                            <ul class="row gallery">


                                @foreach($gallery as $data)
                                    <li class="col-md-3">
                                        <div class="gallery-wrap">
                                            <figure>
                                                <a href="#" class="as-gallery-thumb"> <img src="{{ URL::to('') }}/admin/image/gallery/{{ $data->photo }}" alt=""> </a>
                                                <figcaption>
                                                    <div class="caption-wrap">
                                                        <h2>{{ Str::of($data->title)->words(2) }}</h2>
                                                        <p>{{ Str::of($data->short_text)->words(12) }}</p>
                                                    </div>
                                                    <div class="caption-icon">
                                                        <a href="{{ URL::to('') }}/admin/image/gallery/{{ $data->photo }}" data-rel="prettyPhoto[gallery1]" title="" class="fa fa-search-plus as-bgcolor"></a>
                                                        <a href="{{ URL::to('') }}/admin/image/gallery/{{ $data->photo }}" target="_blank" class="fa fa-link as-bgcolor"></a>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </li>


                                @endforeach








                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->




        {{--        staff or team--}}


        <div class="as-main-section" style=" padding: 50px 0px 20px 0px; ">
            <div class="container">
                <div class="row">

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-fancytitle"> <h2>volunteers staff</h2> </div>--}}
{{--                        <div class="as-fancy-divider-wrap">--}}
{{--                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col-md-12">
                        <div class="as-volunteer as-teamlist-view">
                            <ul class="row">

                                @foreach($team as $data)
                                    <li class="col-md-6">
                                        <div class="as-team-wrap">
                                            <figure><a href="{{ route('team.single',$data->id) }}"><img src="{{ URL::to('') }}/admin/image/team/{{ $data->photo }}" alt=""></a></figure>
                                            <div class="as-team-info">
                                                <h2><a href="{{ route('team.single',$data->id) }}">{{ $data->name }}</a></h2>
                                                <span>{{ $data->designation }}</span>
                                                <p>{{ Str::of($data->description)->words(20) }}</p>
                                                <ul class="as-team-network">
                                                    <li><a href="#" class="as-bgcolorhover fa fa-facebook"></a></li>
                                                    <li><a href="#" class="as-bgcolorhover fa fa-twitter"></a></li>
                                                    <li><a href="#" class="as-bgcolorhover fa fa-linkedin"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->
        <!-- <div class="as-main-section not-fullscreen background parallax" style=" background: url(extra-images/parallex-bg1.jpg); padding: 50px 0px 75px 0px; " data-img-width="1920" data-img-height="1080" data-diff="100">
          <span class="full-pattren"></span>
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="as-fancytitle as-white"> <h2>Our Causes</h2> </div>
                <div class="as-fancy-divider-wrap as-white">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote"></span> <span class="as-third-dote"></span> </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="as-parallex-info">
                  <h2>HELP CHURCH, DONATE FOR A CUASE</h2>
                  <p>That sneered vivaciously that thus are they poroise uncritical gosh and be to the that</p>
                </div>
                <div class="as-progress-wrap">
                  <div id="as-goal" class="as-rised-progress"> <span>Goal: $ 20000</span> </div>
                  <div class="clearfix"></div>
                  <a href="#" class="as-bgcolor"><i class="fa fa-database"></i> Contribute Now</a>
                </div>
              </div>

            </div>
          </div>
        </div> -->
        <!--// MainSection //-->

        <!--// MainSection //-->


        {{--        parallax--}}


{{--        <div class="as-main-section not-fullscreen background parallax" style=" background: url({{ URL::to('') }}/admin/image/testimonial/{{ $testi_banner->testi_banner }}); padding: 55px 0px 80px 0px; " data-img-width="1920" data-img-height="1080" data-diff="100">--}}
{{--            <span class="full-pattren"></span>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-fancytitle as-white"> <h2>CLIENT TESTIMONIALS</h2> </div>--}}
{{--                        <div class="as-fancy-divider-wrap as-white">--}}
{{--                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote"></span> <span class="as-third-dote"></span> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-12">--}}
{{--                        <div class="flexslider as-slide-testimonial">--}}
{{--                            <ul class="slides">--}}

{{--                                @foreach($testimonial as $data)--}}
{{--                                    <li>--}}
{{--                                        <h2>“{{ $data->Quote }}”</h2>--}}
{{--                                        <div class="clearfix"></div>--}}
{{--                                        <figure><a href="#" class="as-testimonial-thumb"><img src="{{ URL::to('') }}/admin/image/testimonial/{{ $data->user_photo }}" alt=""></a>--}}
{{--                                            <figcaption>--}}
{{--                                                <h3>{{ $data->username }}</h3>--}}
{{--                                                <span>{{ $data->designation }}</span>--}}
{{--                                            </figcaption>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}

{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--// MainSection blog start //-->

<div class="container">
        <div class="row">
            <div class="col-md-9">
                <!-- <div class="as-content-title"> <h2>Blog <span class="as-color">Large</span></h2> </div> -->

                <div class="as-blogs as-large-view">
                    <ul class="row">


                        @foreach($post as $data)

                            <li class="col-md-12">
                                <div class="as-blog-wrap">
                                    <figure><a href="{{ route('blog.single',$data->id) }}"><img src="{{ URL::to('') }}/admin/image/blog/{{ $data->photo }}" alt=""></a>
                                        <figcaption class="as-bloghover">
                                            <ul>
                                                <li><a href="#" class="fa fa-share-alt"></a></li>
                                                <li><a href="#" class="fa fa-link"></a></li>
                                            </ul>
                                            <time datetime="2008-02-14 20:00">{{ date('d', strtotime($data->created_at)) }} <span>{{ date('F', strtotime($data->created_at)) }}</span></time>
                                        </figcaption>
                                    </figure>
                                    <div class="as-blog-info">
                                        <h2><a href="{{ route('blog.single',$data->id) }}">{{ Str::of($data->title)->words(8) }}</a></h2>
                                        <p>{!! Str::of($data->description)->words(50) !!}</p>
                                        <a href="#" class="as-readmore as-bgcolorhover">Read More</a>
                                        <ul class="as-blog-option">
                                            <li style="color: darkslategrey">{{ date('d,F Y', strtotime($data->created_at)) }}</li>
                                            <li><a href="#">06 Comments</a></li>
                                            <li><a href="#">37 Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                        @endforeach



                    </ul>
                </div>

            </div>
        </div>

</div>




        <!--// MainSection blog end //-->

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- <div class="as-content-title"> <h2>Blog <span class="as-color">Large</span></h2> </div> -->

                    <div class="as-events as-list-view">
                        <ul class="row">

                            @foreach($events as $event)

                                <li class="col-md-12">
                                    <div class="event-wrap">
                                        <div class="event-thumb-section">
                                            <figure>
                                                <img src="{{ URL::to('') }}/admin/image/event/{{ $event->photo }}" alt="">
                                                <figcaption>
                                                    <div class="map-btn"><a id="btn-{{ $event->id }}" class="view-map as-bgcolor">VIEW MAP</a></div>
                                                    <div class="as-event-map" id="map-{{ $event->id }}">
                                                        <iframe src="{{ $event->google_map }}"  height="247"></iframe>

                                                    </div>
                                                </figcaption>
                                            </figure>
                                            <div class="as-short-info">
                                                <time datetime="2008-02-14 20:00"><i class="fa fa-clock-o"></i> {{ $event->timing }}</time>
                                                <div class="ev-tag">
                                                    <i class="fa fa-align-left"></i>
                                                    <a href="#">CHARITY,</a>
                                                    <a href="#">POLITICAL</a>
                                                    <a href="#">EVENTS,</a>
                                                    <a href="#">PRAYERS</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="as-event-info">
                                            <div class="as-info-wrap">
                                                <time datetime="2008-02-14 20:00"><span>{{ date('D',strtotime($event->created_at)) }}</span>{{ date('d, M',strtotime($event->created_at)) }}<span>{{ date('F',strtotime($event->created_at)) }}</span></time>
                                                <h3><a href="{{ route('single.event',$event->id) }}">{{ Str::of($event->title)->words(3) }}</a></h3>
                                                <p>{!! Str::of($event->description)->words(17) !!}</p>
                                                <ul>
                                                    <li><i class="fa fa-map-marker"></i>{{ $event->Address }}</li>
                                                    <li><i class="fa fa-facebook-official"></i> Follow us on Facebook</li>
                                                </ul>
                                            </div>
                                            <a style="background-color: {{ $event->button_color }};" href="{{ route('single.event',$event->id) }}" class="as-event-btn">{{ $event->button_text }}</a>
                                        </div>
                                    </div>
                                </li>
                                <script>
                                    jQuery(document).ready(function() {

                                        jQuery('#btn-{{ $event->id }}').on("click", function() {
                                            jQuery("#map-{{ $event->id }}").slideToggle("slow");

                                        });

                                    });
                                </script>

                            @endforeach




                        </ul>
                    </div>


                </div>
            </div>
        </div>




        {{--        shop--}}


{{--        <div class="as-main-section" style=" padding: 50px 0px 20px 0px; ">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-fancytitle"> <h2>Our Shop</h2> </div>--}}
{{--                        <div class="as-fancy-divider-wrap">--}}
{{--                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="as-shop as-shop-list">--}}
{{--                        <ul class="row">--}}
{{--                            <li class="col-md-3">--}}
{{--                                <figure><a class="as-shop-thumb" href="#"><img src="frontend/extra-images/shop-list-1.jpg" alt=""></a>--}}
{{--                                    <span class="as-festured as-bgcolor">Slae</span>--}}
{{--                                    <figcaption>--}}
{{--                                        <div class="as-shophover">--}}
{{--                                            <span>Rating:</span>--}}
{{--                                            <div class="as-rating"><span style="width:82%" class="rating-box"></span></div>--}}
{{--                                        </div>--}}
{{--                                    </figcaption>--}}
{{--                                </figure>--}}
{{--                                <div class="as-shopinfo">--}}
{{--                                    <h3><a href="#">FLYING NINJA</a></h3>--}}
{{--                                    <span><small>$20.00</small>  -  $15.00</span>--}}
{{--                                    <a href="#" class="as-cartbtn">ADD TO CART</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-3">--}}
{{--                                <figure><a class="as-shop-thumb" href="#"><img src="frontend/extra-images/shop-list-2.jpg" alt=""></a>--}}
{{--                                    <figcaption>--}}
{{--                                        <div class="as-shophover">--}}
{{--                                            <span>Rating:</span>--}}
{{--                                            <div class="as-rating"><span style="width:82%" class="rating-box"></span></div>--}}
{{--                                        </div>--}}
{{--                                    </figcaption>--}}
{{--                                </figure>--}}
{{--                                <div class="as-shopinfo">--}}
{{--                                    <h3><a href="#">FLYING NINJA</a></h3>--}}
{{--                                    <span><small>$20.00</small>  -  $15.00</span>--}}
{{--                                    <a href="#" class="as-cartbtn">ADD TO CART</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-3">--}}
{{--                                <figure><a class="as-shop-thumb" href="#"><img src="frontend/extra-images/shop-list-3.jpg" alt=""></a>--}}
{{--                                    <figcaption>--}}
{{--                                        <div class="as-shophover">--}}
{{--                                            <span>Rating:</span>--}}
{{--                                            <div class="as-rating"><span style="width:82%" class="rating-box"></span></div>--}}
{{--                                        </div>--}}
{{--                                    </figcaption>--}}
{{--                                </figure>--}}
{{--                                <div class="as-shopinfo">--}}
{{--                                    <h3><a href="#">FLYING NINJA</a></h3>--}}
{{--                                    <span><small>$20.00</small>  -  $15.00</span>--}}
{{--                                    <a href="#" class="as-cartbtn">ADD TO CART</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-3">--}}
{{--                                <figure><a class="as-shop-thumb" href="#"><img src="frontend/extra-images/shop-list-4.jpg" alt=""></a>--}}
{{--                                    <figcaption>--}}
{{--                                        <div class="as-shophover">--}}
{{--                                            <span>Rating:</span>--}}
{{--                                            <div class="as-rating"><span style="width:82%" class="rating-box"></span></div>--}}
{{--                                        </div>--}}
{{--                                    </figcaption>--}}
{{--                                </figure>--}}
{{--                                <div class="as-shopinfo">--}}
{{--                                    <h3><a href="#">FLYING NINJA</a></h3>--}}
{{--                                    <span><small>$20.00</small>  -  $15.00</span>--}}
{{--                                    <a href="#" class="as-cartbtn">ADD TO CART</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--// MainSection //-->--}}

        <!--// MainSection //-->


        {{--        counter parallax--}}
{{--        <div class="as-main-section not-fullscreen background parallax" style=" background: url(frontend/extra-images/parallex-bg2.jpg); padding: 60px 0px 60px 0px; " data-img-width="1920" data-img-height="1080" data-diff="100">--}}
{{--            <span class="full-pattren"></span>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-counter">--}}
{{--                            <ul class="row">--}}
{{--                                <li class="col-md-3">--}}
{{--                                    <i class="flaticon-customer-service2"></i>--}}
{{--                                    <div class="counter-info">--}}
{{--                                        <span class="word-count">20</span>--}}
{{--                                        <small>Causes</small>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="col-md-3">--}}
{{--                                    <i class="flaticon-wheelchair10"></i>--}}
{{--                                    <div class="counter-info">--}}
{{--                                        <span class="word-count">120</span>--}}
{{--                                        <small>Places</small>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="col-md-3">--}}
{{--                                    <i class="flaticon-laptopcomputer14"></i>--}}
{{--                                    <div class="counter-info">--}}
{{--                                        <span class="word-count">75</span>--}}
{{--                                        <small>Volunteers</small>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="col-md-3">--}}
{{--                                    <i class="flaticon-almsgiving"></i>--}}
{{--                                    <div class="counter-info">--}}
{{--                                        <span class="word-count">75</span>--}}
{{--                                        <small>Volunteers</small>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--// MainSection //-->--}}

        <!--// MainSection //-->



        {{--        sponsors--}}
{{--        <div class="as-main-section" style=" padding: 38px 0px 50px 0px; ">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}

{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-fancytitle"> <h2>OUR SPONSORS</h2> </div>--}}
{{--                        <div class="as-fancy-divider-wrap">--}}
{{--                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="as-sponsored as-view-two">--}}
{{--                            <div id="sync1" class="owl-carousel">--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-1.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-2.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-3.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-4.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-5.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-6.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-1.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-2.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-3.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-4.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-5.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-6.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-2.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-3.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-4.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-5.jpg" alt=""></a></div>--}}
{{--                                <div class="item"><a href="#"><img src="frontend/extra-images/partner-6.jpg" alt=""></a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>







@endsection