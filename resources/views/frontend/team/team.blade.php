@extends('frontend.body.app')
@section('content')
@section('title')
    Team
@endsection

    <style>
      .full-team {
          position: absolute;
          left: 0px;
          top: 0px;
          width: 100%;
          height: 100%;
          background-image: url({{ asset('/admin/image/team/'. $banner->banner) }});

      }

    </style>

<!--// Main Wrapper //-->
<div class="as-mainwrapper">

    <!--// Header //-->

    <!--// Header //-->

    <div class="as-minheader">
        <span class="full-team"></span>
        <div class="as-minheader-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="as-page-title">
                            <h1>Team List</h1>
                            <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="as-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Team</a></li>
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

                        <div class="as-volunteer as-teamlist-view">
                            <ul class="row">

                                @foreach($team as $data)

                                <li class="col-md-12">
                                    <div class="as-team-wrap">
                                        <figure><a href="{{ route('team.single',$data->id) }}"><img src="{{ URL::to('') }}/admin/image/team/{{ $data->photo }}" alt=""></a></figure>
                                        <div class="as-team-info">
                                            <h2><a href="{{ route('team.single',$data->id) }}">{{ $data->name }}</a></h2>
                                            <span>{{ $data->designation }}</span>
                                            <p>{{ Str::of($data->description)->words(50) }}</p>
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
