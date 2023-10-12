@extends('frontend.body.app')
@section('content')
@section('title')
    Blog Single
@endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .full-banner {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
        }
    </style>
    <div class="as-mainwrapper">



        <div class="as-minheader">
            <span style="background-image: url('{{ URL::to('') }}/admin/image/blog/banner/{{ $banner->photo }}')" class="full-banner"></span>
            <div class="as-minheader-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="as-page-title">
                                <h1>BLOG Detail</h1>
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

                            <figure class="as-detail-thumb"><a href="#"><img src="{{ URL::to('') }}/admin/image/blog/{{ $single->photo }}" alt=""></a>
                                <figcaption>
                                    <time class="as-bgcolor" datetime="2008-02-14 20:00">{{ date('d',strtotime($single->created_at)) }} <span>{{ date('F',strtotime($single->created_at)) }}</span></time>
                                    <div class="as-detail-info">
                                        <h2>{{ $single->title }}</h2>
                                        <ul class="as-blog-option">
                                            <li>{{ date('d ,F Y',strtotime($single->created_at)) }}</li>
                                            <li><a href="#">06 Comments</a></li>
                                            <li><a href="#">37 Likes</a></li>
                                        </ul>
                                    </div>
                                </figcaption>
                            </figure>

                            <div class="as-detail-editor">
                                <p>{!! $single->description !!}</p>
                            </div>

                            <!--// Tags //-->
                            <div class="as-tags">
                                <span>Tags:</span>
                                @foreach($tag as $data)
                                <a href="#">{{ $data->tag_name }}</a>
                                @endforeach
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

{{--                                    <li class="col-md-6 as-prev">--}}
{{--                                        <div class="as-post-wrap">--}}
{{--                                            <figure><a href="#"><img src="extra-images/detail-post-2.jpg" alt=""></a></figure>--}}
{{--                                            <div class="as-post-info">--}}
{{--                                                <i class="fa fa-angle-right"></i>--}}
{{--                                                <time datetime="2008-02-14 20:00">27, June 2015</time>--}}
{{--                                                <h4><a href="#">Conflict in Democratic</a></h4>--}}
{{--                                                <span>By: <a href="#">Jhon Doe</a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                            $i++;--}}



                                </ul>
                            </div>
                            <!--// NextPrev Post //-->

                            <!--// Authore Post //-->
{{--                            <div class="as-authore-post">--}}
{{--                                <figure><a href="#"><img src="extra-images/admin-1.jpg" alt=""></a></figure>--}}
{{--                                <div class="as-authore-info">--}}
{{--                                    <h2><a href="#">Terrance Dunn</a></h2>--}}
{{--                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quiavoluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.</p>--}}
{{--                                    <ul class="as-authore-share">--}}
{{--                                        <li><a href="#" class="fa fa-facebook"></a></li>--}}
{{--                                        <li><a href="#" class="fa fa-twitter"></a></li>--}}
{{--                                        <li><a href="#" class="fa fa-linkedin"></a></li>--}}
{{--                                        <li><a href="#" class="fa fa-pinterest-p"></a></li>--}}
{{--                                        <li><a href="#" class="fa fa-google-plus"></a></li>--}}
{{--                                    </ul>--}}
{{--                                    <a href="#" class="view-all">View All Posts</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!--// Authore Post //-->

                            <!--// Comments //-->
                            <div id="as-comments">
                                <h2><span class="as-color">COMMENTS</span></h2>
                                <ul>

                                    @if(Session::has('success'))
                                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                                    @endif


                                    <li class="depth-1">
                                        @php
                                            $comments = \App\Models\Comment::where('post_id',$single->id)->first();
                                        @endphp

                                        @foreach($single->comments as $comment)
                                            @if($comment->status==true)
                                        <ul>
                                            <li>
                                                <div class="as-comment-wrap">
                                                    <figure><img src="{{ URL::to('') }}/user/images/{{ $comment->user->photo }}" alt=""></figure>
                                                    <div class="as-text">
                                                        <h4><a href="#">{{ $comment->user->name }}</a></h4>
                                                        <div class="as-right-info">
                                                            <span style="color: darkslategrey">{{ date('d/m/y',strtotime($comment->created_at)) }}</span>
                                                            <a style="color: darkslategrey" id="comment" comment_id="{{ $comment->id }}" href="#" class="comment-reply-link">Reply</a>
                                                        </div>
                                                        <br>
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>

                                        <ul class="children">

                                            @foreach($comment->replies as $reply)
                                            @if($reply->status==true)
                                            <li class="depth-1">
                                                <ul>
                                                    <li>
                                                        <div class="as-comment-wrap">
                                                            <figure><img src="{{ URL::to('') }}/user/images/{{ $reply->user->photo }}" alt=""></figure>
                                                            <div class="as-text">
                                                                <h4><a href="#">{{ $reply->user->name }}</a></h4>
                                                                <div class="as-right-info">
                                                                    <span style="color: darkslategrey">{{ date('d/m/y',strtotime($reply->created_at)) }}</span>
{{--                                                                    <a style="color: darkslategrey" id="reply" reply_id="{{ $reply->id }}" href="#" class="comment-reply-link">Reply</a>--}}
                                                                </div>
                                                                <br>
                                                                <p>{{ $reply->reply }}</p>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </li>
                                                @endif


                                            @endforeach
                                                @auth

                                                    <div class="comment{{ $comment->id }}"  style="display: none;">
                                                        <form action="{{ route('reply.store') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input name="comment_id" value="{{ $comment->id }}" type="hidden">
                                                                <input type="hidden" value="{{ $single->id }}" name="post_id">
                                                                <input name="reply" class="form-control" type="text">
                                                            </div>
                                                            <button class="btn btn-warning" type="submit">Reply</button>
                                                        </form>
                                                    </div>


                                                @else

                                                @endauth

                                        </ul>
                                            @endif
                                        @endforeach

                                    </li>
                                </ul>
                            </div>
                            <!--// Comments //-->

                            <!--// Comment Form //-->

                            <div class="as-form">
                                @auth

                                <h2>LEAVE <span class="as-color">A Comment</span></h2>
                                <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
{{--                                    <p> <input type="text" placeholder="Your Name" name="usrname" required> </p>--}}
{{--                                    <p> <input type="text" placeholder="Email" name="usrname" required> </p>--}}
                                     <input type="hidden" value="{{ $single->id }}" name="post_id">
                                    <p> <textarea name="comment"  placeholder="Comment"></textarea> </p>
                                    <p class="as-submit"> <input type="submit" value="Submit" class="as-bgcolor"> </p>
                                </form>
                                @else
                                    <p class="text-danger"><span style="color:green">For Comment and Reply</span>At first <a
                                                href="{{ route('user.login') }}">login</a> your Account</p>
                                @endauth
                            </div>
                            <!--// Comment Form //-->

                        </div>
                        <aside class="col-md-3">

                            <!--// Widget Categories //-->
                            <div class="widget widget_categories">
                                <div class="as-strip-title"> <h2>CATEGORY <span class="as-color">WIDGET</span></h2> </div>
                                <ul>
                                    @foreach($category as $cat)
                                    <li><a href="#">{{ $cat->category_name }}</a></li>
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

                            <!--// Widget Search //-->
                            <div class="widget widget_gallery">
                                <div class="as-strip-title"> <h2>Photo <span class="as-color">Gallery</span></h2> </div>
                                <ul>
                                    @foreach($gallery as $photo)
                                    <li><a href="#"><img src="{{ URL::to('') }}/admin/image/gallery/{{ $photo->photo }}" alt=""></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--// Widget Twitter //-->

                        </aside>

                    </div>
                </div>
            </div>
            <!--// MainSection //-->

        </div>



    </div>

    <script>
        $(document).ready(function (){
            $(document).on('click','a#comment',function (e){
                e.preventDefault();

                let comment_id = $(this).attr('comment_id');


                $('.comment'+comment_id).toggle();

            })




        })

    </script>


@endsection