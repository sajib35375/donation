@extends('frontend.body.app')
@section('content')
@section('title')
    Event
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .as-info-wrap {
            float: left;
            width: 100%;
            padding: 32px 22px 25px 17px;

        }
        .full-pattren {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background: url('{{ URL::to('') }}/admin/image/event/{{ $banner->banner }}');
        }
    </style>


    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

        <!--// Header //-->

        <!--// Header //-->

        <div class="as-minheader">
            <span class="full-pattren"></span>
            <div class="as-minheader-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="as-page-title">
                                <h1>Event</h1>
                                <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="as-breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Event</a></li>
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
                            <!-- <div class="as-content-title"> <h2>Blog <span class="as-color">Large</span></h2> </div> -->

                            <div class="as-events as-list-view">
                                <ul class="row">
{{--                                    -@php--}}
{{--                                        use App\Models\Event;--}}
{{--                                    $event_update = Event::latest()->get();--}}
{{--                                    $arr = [];--}}
{{--                                    @endphp--}}

{{--                                    @foreach($event_update as $id)--}}
{{--                                        @php--}}
{{--                                            array_push($arr,$id->id)--}}
{{--                                        @endphp--}}

{{--                                    @endforeach-}}--}}



                                

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
                                                @if( \Carbon\Carbon::now()->diffInSeconds(\Carbon\Carbon::parse($event->countdown),false) > 0 )
                                                <a style="background-color: #edb542;" href="{{ route('single.event',$event->id) }}" class="as-event-btn">UPCOMMING</a>
                                                @else
                                                    <a style="background-color: #ed6642;" href="{{ route('single.event',$event->id) }}" class="as-event-btn">CANCEL</a>
                                                @endif
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

{{--                                    <form id="submit_id" action="{{ route('counter.update') }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input name="event_id" class="event" value="{{ implode(',',$arr) }}" type="hidden">--}}
{{--                                    </form>--}}


                                </ul>
                            </div>

                            <!--// Pagination //-->

                            {{ $events->links('frontend.event.event_paginate') }}

                            
                           
       
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
                                    <li>
                                        <figure><a href="#" class="as-thumb"><img src="extra-images/recent-post1.jpg" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                                            <figcaption>
                                                <h4><a href="#">Democratic Republic</a></h4>
                                                <p>This is Photoshop's version  of Lorem Ipsum. enim.</p>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure><a href="#" class="as-thumb"><img src="extra-images/recent-post2.jpg" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                                            <figcaption>
                                                <h4><a href="#">Democratic Republic</a></h4>
                                                <p>This is Photoshop's version  of Lorem Ipsum. enim.</p>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure><a href="#" class="as-thumb"><img src="extra-images/recent-post3.jpg" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                                            <figcaption>
                                                <h4><a href="#">Democratic Republic</a></h4>
                                                <p>This is Photoshop's version  of Lorem Ipsum. enim.</p>
                                            </figcaption>
                                        </figure>
                                    </li>
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
{{--<script>--}}
{{--    $(document).ready(function(){--}}

{{--        $(document).on('click','a#event_form_id',function(e){--}}
{{--            e.preventDefault();--}}



{{--            $('form#submit_id').submit();--}}



{{--            // window.location = window.href;--}}

{{--        })--}}



{{--    })--}}
{{--</script>--}}

    @endsection
   