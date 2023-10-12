@extends('frontend.body.app')
@section('content')
@section('title')
    Team Single
@endsection

    <style>
        .single-team {
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
        <span style="background-image: url('{{ URL::to('') }}/admin/image/team/{{ $banner->banner }}')" class="single-team"></span>
        <div class="as-minheader-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="as-page-title">
                            <h1>Team Detail</h1>
                            <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="as-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Team Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Main Content //-->
    <div class="as-main-content">

        <!--// MainSection //-->
        <div class="as-main-section" style=" padding-bottom: 20px; ">
            <div class="container">
                <div class="row">

                    <div class="col-md-9">

                        <figure class="as-team-thumb"><a href="#"><img src="{{ URL::to('') }}/admin/image/team/{{ $team->photo }}" alt=""></a></figure>
                        <div class="as-team-detail">
                            <h2>{{ $team->title }}</h2>
                            <p>{{ $team->description }}</p>
                            <ul class="as-team-network">
                                <li><a href="#" class="as-bgcolorhover fa fa-facebook"></a></li>
                                <li><a href="#" class="as-bgcolorhover fa fa-twitter"></a></li>
                                <li><a href="#" class="as-bgcolorhover fa fa-linkedin"></a></li>
                                <li><a href="#" class="as-bgcolorhover fa fa-pinterest-p"></a></li>
                                <li><a href="#" class="as-bgcolorhover fa fa-skype"></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12"><div class="as-team-designation"><h2>Volunteer <span class="as-color">Information</span></h2></div></div>
                            <div class="col-md-6">
                                <div class="as-team-designation">
                                    <div class="as-designation">
                                        <ul>
                                            <li>NAME:</li>
                                            <li>{{ strtoupper($team->name) }}</li>
                                        </ul>
                                    </div>
                                    <div class="as-designation">
                                        <ul>
                                            <li>DESIGNATION:</li>
                                            <li>{{ strtoupper($team->designation) }}</li>
                                        </ul>
                                    </div>
                                    <div class="as-designation">
                                        <ul>
                                            <li>DEGREE:</li>
                                            <li>{{ strtoupper($team->degree) }}</li>
                                        </ul>
                                    </div>
                                    <div class="as-designation">
                                        <ul>
                                            <li>LANGUAGES:</li>
                                            <li>{{ strtoupper($team->language) }}</li>
                                        </ul>
                                    </div>
                                    <div class="as-designation">
                                        <ul>
                                            <li>EXPERIENCE:</li>
                                            <li>{{ strtoupper($team->experience) }}</li>
                                        </ul>
                                    </div>
                                    <div class="as-designation">
                                        <ul>
                                            <li>MY HOBBIES:</li>
                                            <li>{{ strtoupper($team->hobbies) }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="as-team-location">
                                    <img style="width: 100%;width: 100%;" src="{{ URL::to('') }}/admin/image/team/{{ $team->location }}"></img>
                                    <div class="as-team-donate">
                                        <div class="as-team-donate-wrap">
                                            <i class="fa fa-map-marker as-bgcolor"></i>
                                            <a href="#">Get a <span>direction</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="as-form">
                            <h2>QUICK <span class="as-color">CONTACT</span></h2>
                            <form>
                                <p> <input type="text" required="" name="usrname" placeholder="Your Name"> </p>
                                <p> <input type="text" required="" name="usrname" placeholder="Email"> </p>
                                <p> <input type="text" required="" name="usrname" placeholder="Website"> </p>
                                <p class="as-comment"> <textarea placeholder="Comment"></textarea> </p>
                                <p class="as-submit"> <input type="submit" class="as-bgcolor" value="Submit"> </p>
                            </form>
                        </div>

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

                        <!--// Widget Search //-->
                        <div class="widget widget_search">
                            <div class="as-strip-title"> <h2>Search <span class="as-color">WIDGET</span></h2> </div>
                            <form>
                                <input type="text" placeholder="Search here..">
                                <label><input type="submit" value=""></label>
                            </form>
                        </div>
                        <!--// Widget Twitter //-->

                        <!--// Widget Gallery //-->
                        <div class="widget widget_gallery">
                            <div class="as-strip-title"> <h2>Photo <span class="as-color">Gallery</span></h2> </div>
                            <ul>

                                 @foreach($gallery as $img)
                                <li><a href="#"><img src="{{ URL::to('') }}/admin/image/gallery/{{ $img->photo }}" alt=""></a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <!--// Widget Gallery //-->

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