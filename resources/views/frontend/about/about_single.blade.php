@extends('frontend.body.app')
@section('content')
    @section('title')
        About
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
    <div class="as-mainwrapper" >
    <div class="as-minheader">
        <span style="background: url('{{ URL::to('') }}/admin/image/about/{{ $banner->banner }}');" class="full-banner"></span>
        <div class="as-minheader-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="as-page-title">
                            <h1>About</h1>
                            <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="as-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Main Content //-->
    <div class="as-main-content">

        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 0px 0px 20px 0px; margin-top: -13px; ">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="as-fancytitle"> <h2>How you can help?</h2> </div>
                        <div class="as-fancy-divider-wrap">
                            <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="as-services as-small-view">
                            <ul class="row">


                                @foreach($about as $data)
                                <li class="col-md-4">
                                    <span class="as-icon"> <i class="{{ $data->icon }}"></i> </span>
                                    <div class="as-infowrap">
                                        <h2>{{ $data->title }}</h2>
                                        <p>{{ $data->short_des }}</p>
                                        <a href="#">More <i class="fa fa-angle-right"></i></a>
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
    </div>

    </div>
















@endsection