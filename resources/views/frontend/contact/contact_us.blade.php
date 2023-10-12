@extends('frontend.body.app')
@section('content')
@section('title')
    Contact Us
@endsection
    <style>
        .full-pattren {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background: url({{ URL::to('') }}/admin/image/contact/{{ $contact->banner_image }});

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
                            <h1>Contact Us</h1>
                            <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="as-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Main Content //-->
    <div class="as-main-content">

        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 0px 0px 0px 0px; ">
            <div class="container">
                <div class="row">

                    <div class="col-md-7">
                        <div class="as-map">
                            <iframe src="{{ $contact->google_map_link }}" height="322"></iframe>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <ul class="as-contact-info">
                            <li>
                                <i class="fa fa-phone as-bgcolor"></i>
                                <span>+000 123 456789</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o as-bgcolor"></i>
                                <a href="#">info@company.com</a>
                            </li>
                            <li>
                                <i class="fa fa-globe as-bgcolor"></i>
                                <a href="#">www.company.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="as-strip-title"> <h2>HOW TO <span class="as-color">REACH US</span></h2> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                        <div class="as-strip-title"> <h2>OUR <span class="as-color">ADDRESS</span></h2> </div>
                        <p>123 Eccles Old Road <br> New Salford Road, East <br>London, United Kingdom <br> M6 7AF</p>
                        <ul class="as-team-network">
                            <li><a class="as-bgcolorhover fa fa-facebook" href="#"></a></li>
                            <li><a class="as-bgcolorhover fa fa-twitter" href="#"></a></li>
                            <li><a class="as-bgcolorhover fa fa-linkedin" href="#"></a></li>
                            <li><a class="as-bgcolorhover fa fa-skype" href="#"></a></li>
                            <li><a class="as-bgcolorhover fa fa-pinterest-p" href="#"></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="as-strip-title"> <h2>HAVE <span class="as-color">A QUESTIONS?</span></h2> </div>
                        <!--// Comment Form //-->



                        <div class="as-form">
                            @if(Session::has('success'))
                                <p class="alert alert-success">{{ Session::get('success') }}</p>
                                @endif

                            <form method="POST" action="{{ route('send.email') }}">
                                @csrf
                                <p> <input type="text" placeholder="Your Name" name="name" required> </p>
                                <p> <input type="text" placeholder="Email" name="email" required> </p>
                                <p> <input type="text" placeholder="Phone" name="phone" required> </p>
                                <p class="as-comment"> <textarea name="msg" placeholder="Message"></textarea> </p>
                                <p class="as-submit"> <input type="submit" value="Submit" class="as-bgcolor"> </p>
                                <span class="output_message"></span>
                            </form>
                        </div>




                        <!--// Comment Form //-->
                    </div>

                </div>
            </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 20px 0px 50px 0px; ">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="as-strip-title"> <h2>OUR <span class="as-color">SPONSORS</span></h2> </div>
                        <div class="as-sponsored">
                            <ul class="row">
                                @foreach($sponsor as $img)
                                <li class="col-md-3"><a href="#"><img src="{{ URL::to('') }}/admin/image/sponsor/{{ $img->photo }}" alt=""></a></li>
                                @endforeach
                                <!-- <li class="col-md-3"><a href="#"><img src="{{ URL::to('') }}/frontend/extra-images/partner-2.png" alt=""></a></li>
                                <li class="col-md-3"><a href="#"><img src="{{ URL::to('') }}/frontend/extra-images/partner-3.png" alt=""></a></li>
                                <li class="col-md-3"><a href="#"><img src="{{ URL::to('') }}/frontend/extra-images/partner-4.png" alt=""></a></li>
                                <li class="col-md-3 as-noborder"><a href="#"><img src="{{ URL::to('') }}/frontend/extra-images/partner-5.png" alt=""></a></li>
                                <li class="col-md-3 as-noborder"><a href="#"><img src="{{ URL::to('') }}/frontend/extra-images/partner-6.png" alt=""></a></li>
                                <li class="col-md-3 as-noborder"><a href="#"><img src="{{ URL::to('') }}/frontend/extra-images/partner-7.png" alt=""></a></li>
                                <li class="col-md-3 as-noborder"><a href="#"><img src="{{ URL::to('') }}/frontend/extra-images/partner-8.png" alt=""></a></li> -->
                            </ul>
                        </div>
                    </div>

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













@endsection