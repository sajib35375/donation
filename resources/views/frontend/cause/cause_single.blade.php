@extends('frontend.body.app')
@section('content')
@section('title')
    Cause Single
@endsection
    <style>
        .single-cause {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;

        }


    </style>


<!--// Main Wrapper //-->
<div class="as-mainwrapper">

    <!--// Header //-->

    <!--// Header //-->

    <div class="as-minheader">
        <span class="single-cause" style="background-image: url('{{ URL::to('') }}/admin/image/causes/banner/{{ $banner->banner }}');"></span>
        <div class="as-minheader-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="as-page-title">
                            <h1>Causes Deatil</h1>
                            <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="as-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Causes Deatil</a></li>
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

                        <figure class="as-cause-thumb"><span class="full-pattren"></span><a href="#"><img src="{{ URL::to('') }}/admin/image/causes/{{ $cause_single->photo }}" alt=""></a></figure>
                        <div class="as-detail-strip">
                            <div class="as-causes-strip">
                                <div data-percent="90%" class="causes-sec">
                                    <div class="as-causebar">
                                        <div style="background-color: #edb542; width:{{ $cause_single->percentage }}%;" class="percent-bar"><small>{{ $cause_single->percentage }}%</small></div>
                                    </div>
                                </div>
                                <span class="as-raised">Raised: ${{ $cause_single->raised }}</span>
                                <span class="as-goal">Goal: ${{ $cause_single->goal }}</span>
                            </div>
                            <a href="#" class="as-causes-btn as-bgcolor">Donate Now</a>
                        </div>

                        <div class="as-detail-editor">
                            <h2>{{ $cause_single->title }}</h2>
                            <p>{{ $cause_single->Description }}</p>
                        </div>

                        <div class="as-event-gallery">
                            <h2>event <span class="as-color">gallery</span></h2>
                            <ul class="gallery">


                            @foreach($event_gall as $gall)
                                <li>
                                    <div class="as-event-gallery-wrap">
                                        <img src="{{ URL::to('') }}/admin/image/event/{{ $gall->photo }}" alt="">
                                        <a href="{{ URL::to('') }}/admin/image/event/{{ $gall->photo }}" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
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

                    </aside>

                </div>
            </div>
        </div>
        <!--// MainSection //-->

    </div>

    <!--// Footer //-->

    <!--// Footer //-->

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