@extends('frontend.body.app')
@section('content')
@section('title')
    Gallery
@endsection

    <style>
       .full-gallery {
           position: absolute;
           left: 0px;
           top: 0px;
           width: 100%;
           height: 100%;
           background: url({{ URL::to('') }}/admin/image/gallery/{{ $gbanner->gallery_banner }});
       }



    </style>



    <div class="as-minheader">
        <span class="full-gallery"></span>
        <div class="as-minheader-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="as-page-title">
                            <h1>Gallery</h1>
                            <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="as-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="as-main-section" style="margin-top: 25px;">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <div class="as-gallery">
                        <ul class="row gallery">



                            @foreach($gallery as $photo)

                            <li class="col-md-6">
                                <figure><a href="#"><img src="{{ URL::to('') }}/admin/image/gallery/{{ $photo->photo }}" alt=""></a>
                                    <figcaption>
                                        <div class="as-galleryinfo">
                                            <h3>HELP CHURCH, DONATE FOR A CUASE CHURCH, DONATE FOR</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry printing and typesetting industry. Lorem Ipsum has been the . Lorem Ipsum has been the industry</p>
                                        </div>
                                        <div class="as-gallery-icon">
                                            <a href="{{ URL::to('') }}/admin/image/gallery/{{ $photo->photo }}" data-rel="prettyPhoto[gallery1]" title="" class="as-bgcolorhover"><i class="fa fa-search-plus"></i></a>
                                            <a href="#" class="as-bgcolorhover"><i class="fa fa-link"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>


                            @endforeach



                        </ul>
                    </div>
                    <!--// Pagination //-->
                {{ $gallery->links('frontend.gallery.gallery_pagination') }}
                    <!--// Pagination //-->

                </div>

            </div>
        </div>
    </div>




@endsection