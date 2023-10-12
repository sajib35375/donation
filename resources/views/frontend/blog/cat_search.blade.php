@extends('frontend.body.app')
@section('content')
    <style>
        .full-banner{
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background: url({{ URL::to('') }}/admin/image/blog/banner/{{ $banner->photo }});
        }
    </style>
    <div class="as-mainwrapper">



        <div class="as-minheader">
            <span class="full-banner"></span>
            <div class="as-minheader-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="as-page-title">
                                <h1>BLOG</h1>
                                <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="as-breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
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

                            <div class="as-blogs as-large-view">
                                <ul class="row">


                                    @foreach($category_search->post as $data)

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

                            <!--// Pagination //-->

                        <!--// Pagination //-->

                        </div>
                        <aside class="col-md-3">

                            <!--// Widget Categories //-->
                            <div class="widget widget_categories">
                                <div class="as-strip-title"> <h2>CATEGORY <span class="as-color">WIDGET</span></h2> </div>
                                <ul>
                                    @foreach($category as $cat)
                                        <li><a href="{{ route('cat.search',$cat->id) }}">{{ $cat->category_name }}</a></li>
                                    @endforeach
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

                            <!--// Widget Gallery //-->
                            <div class="widget widget_gallery">
                                <div class="as-strip-title"> <h2>Photo <span class="as-color">Gallery</span></h2> </div>
                                <ul>
                                    @foreach($gallery as $item)
                                        <li><a href="#"><img src="{{ URL::to('') }}/admin/image/gallery/{{ $item->photo }}" alt=""></a></li>
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



    </div>
    <!--// Main Wrapper //-->




@endsection