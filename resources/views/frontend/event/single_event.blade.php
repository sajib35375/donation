@extends('frontend.body.app')
@section('content')
@section('title')
    Single Event
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">



        <div class="as-minheader">
            <span style="background-image: url('{{ URL::to('') }}/admin/image/event/{{ $banner->banner }}')" class="full-pattren"></span>
            <div class="as-minheader-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="as-page-title">
                                <h1>Event Detail</h1>
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

                        <div class="col-md-9 event-detail">
                            <div class="as-event-contdown">
                                <span class="full-pattren"></span>
                                <img src="{{ URL::to('') }}/admin/image/event/{{ $single->photo }}" alt="">
                                <div class="as-event-caption" >
                                    <h2 style="margin-top: 60px;">upcoming event</h2>
                                    <p style="color: white;font-weight: bold;margin-top: 60px;" id="demo"></p>
{{--                                    <div id="eventCountdown"></div>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="as-event-contact as-bgcolor">
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>
                                                <h2>TIMING</h2>
                                                <span>{{ $single->timing }}</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i>
                                                <h2>VOICE</h2>
                                                <span>+{{ $single->phone }}</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope-o"></i>
                                                <h2>EMAIL</h2>
                                                <span>{{ $single->email }}</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-map-marker"></i>
                                                <h2>address</h2>
                                                <span>{{ $single->Address }}</span>
                                            </li>
                                        </ul>
                                        @if(!empty($single->poster))
                                            <div class="as-linkbtn"><a href="{{ route('download.poster',$single->poster) }}" class="as-download-btn">Download Poster</a></div>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="as-detail-editor">
                                        <h2>{{ $single->title }} </h2>
                                        <p>{!! $single->description !!}</p>
                                    </div>
                                </div>
                            </div>
                            <blockquote>{{ $single->quote }}</blockquote>
                            <div class="as-event-gallery">
                                <h2>event <span class="as-color">gallery</span></h2>
                                <ul class="gallery">
                                    @foreach($all as $data)
                                    <li>
                                        <div class="as-event-gallery-wrap">
                                            <img src="{{ URL::to('') }}/admin/image/event/{{ $data->photo }}" alt="">
                                            <a href="{{ URL::to('') }}/admin/image/event/{{ $data->photo }}" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                                        </div>
                                    </li>

                                    @endforeach



                                </ul>
                            </div>
                            <!--// Tags //-->
                            <div class="as-tags">
                                <span>Tags:</span>
                                <a href="#">Charity</a>
                                <a href="#">NGO</a>
                                <a href="#">PSD</a>
                            </div>
                            <!--// Tags //-->
                            <!--// ShareNav //-->
                            <ul class="as-share-nav">
                                <li><span>Share Via:</span></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                                <li><a href="#" class="fa fa-pinterest-p"></a></li>
                                <li><a href="#" class="fa fa-google-plus"></a></li>
                            </ul>
                            <!--// ShareNav //-->



                            <!--// NextPrev Post //-->
                            <div class="as-nextprev-post">
                                <ul class="row">


                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($next_prev as $post)


                                        <li class="col-md-6 {{ $i % 2 != 0 ? 'as-next': 'as-prev'}} ">
                                            <div class="as-post-wrap">
                                                <figure><a href="#"><img style="height: 100px;" src="{{ URL::to('') }}/admin/image/blog/{{ $post->photo }}" alt=""></a></figure>
                                                <div class="as-post-info">
                                                    <i class="{{ $i % 2 != 0 ? 'fa fa-angle-left': 'fa fa-angle-right'}}"></i>
                                                    <time datetime="2008-02-14 20:00">{{ date('d, M Y',strtotime($post->created_at)) }}</time>
                                                    <h4><a href="#">{{ $post->title }}</a></h4>

                                                </div>
                                            </div>
                                        </li>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach

                                </ul>
                            </div>
                            <!--// NextPrev Post //-->




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

                                    @foreach($recent as $data)

                                    <li>
                                        <figure><a href="#" class="as-thumb"><img style="height: 100px;" src="{{ URL::to('') }}/admin/image/blog/{{ $data->photo }}" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                                            <figcaption>
                                                <h4><a href="#">{{ Str::of($data->title)->words(3) }}</a></h4>
                                                <p>{{ Str::of($data->description)->words(3) }}</p>
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
    <style>
        p#demo {

            text-align: center;
            font-size: 60px;
            margin-top: 0px;

        }
    </style>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{ date('M d, Y',strtotime($single->countdown)) }}").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>







@endsection
