<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@php

    $data = \App\Models\SiteSetting::find(1);

@endphp



<header id="as-header" class="as-absolute">

    <!--// TopStrip //-->
    <div class="container">
        <div class="as-topstrip as-bgcolor">
            <div class="row">
                <div class="col-md-6">
                    <ul class="as-stripinfo">
                        <li><i class="fa fa-phone"></i> +88{{ $data->phone }}</li>
                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">{{ $data->email }}</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="as-section-right">
                        <ul class="as-social-media">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                            <li><a href="#" class="fa fa-youtube"></a></li>
                        </ul>
                        <a href="donation.html" class="as-donate-btn"><i class="fa fa-dollar"></i> Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// TopStrip //-->

    <div class="container">
        <div class="as-header-bar">
            <div class="row">
                <div class="col-md-2"><a href="index.html" class="logo"><img src="{{ URL::to('') }}/admin/image/logo/{{ $data->logo }}" alt=""></a></div>
                <div class="col-md-10">

                    <div class="as-section-right">
                        <nav class="main-navigation">
                            <ul>
                                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li><a href="{{ route('single.about') }}">about</a></li>
                                <li><a href="{{ route('blog.show') }}">Blog</a>

                                </li>
                                <li><a href="{{ route('event.show') }}">Event</a>
{{--                                    <ul class="as-dropdown">--}}
{{--                                        <li><a href="event-list.html">event list</a></li>--}}
{{--                                        <li><a href="event-grid.html">event grid</a></li>--}}
{{--                                        <li><a href="event-detail.html">event detail</a></li>--}}
{{--                                    </ul>--}}
                                </li>
                                <li><a href="{{ route('cause.list') }}">cause</a>

                                </li>
                                <li><a href="{{ route('team.page') }}">Team</a>

                                </li>
                                <li><a href="#">shop</a>
                                    <ul class="as-dropdown">
                                        <li><a href="shop-list.html">Shop List</a></li>
                                        <li><a href="shop-detail.html">Shop Detail</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('donation.view') }}">Donation</a></li>
                                <li><a href="{{ route('gallery.page') }}">Gallery</a>
{{--                                    <ul class="as-dropdown">--}}

{{--                                        <li><a href="404.html">404 Page</a></li>--}}
{{--                                        <li><a href="underconstruction.html">UnderConstruction</a></li>--}}
{{--                                        <li><a href="#">Gallery</a>--}}
{{--                                            <ul class="as-dropdown">--}}
{{--                                                <li><a href="gallery3column.html">Gallery 3Column</a></li>--}}
{{--                                                <li><a href="gallery4column.html">Gallery 4Column</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                </li>
                                <li><a href="{{ route('contact.us') }}">contact us</a></li>
                                <li><a id="logout_btn" href="#">Logout</a>
                                <form id="logout_form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                </li>
                            </ul>
                        </nav>
                        <div class="as-circle-btn">
                            <a href="#" class="fa fa-search as-colorhover" data-toggle="modal" data-target="#searchmodal"></a>
                            <div class="as-cart-wrap">
                                <a href="#" class="fa fa-shopping-cart as-colorhover"></a>
                                <div class="as-cart-box">
                                    <h3 class="as-color">Recently added item(s)</h3>
                                    <ul>
                                        <li>
                                            <a href="#" class="as-cart-thumb"><img src="frontend/extra-images/cart-thumb1.jpg" alt=""></a>
                                            <div class="as-cart-info">
                                                <p>Neque porro quisquam est, qui dolorem ipsum</p>
                                                <span>1 x $124.99</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="as-cart-thumb"><img src="frontend/extra-images/cart-thumb2.jpg" alt=""></a>
                                            <div class="as-cart-info">
                                                <p>Neque porro quisquam est, qui dolorem ipsum</p>
                                                <span>1 x $124.99</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="cart-box-btn">
                                        <a href="#" class="as-bgcolorhover">View All</a>
                                        <a href="#" class="as-bgcolorhover">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--// Responsive Menu //-->
                    <div id="as-menu" class="as-menuwrapper">
                        <button class="as-trigger">Open Menu</button>
                        <ul class="as-menu">
                            <li> <a href="index.html">Home</a> </li>
                            <li> <a href="about.html">about</a> </li>
                            <li>
                                <a href="#">Blog</a>
                                <ul class="as-submenu">
                                    <li><a href="blog-large.html">blog large</a></li>
                                    <li><a href="blog-medium.html">blog medium</a></li>
                                    <li><a href="#">blog detail</a>
                                        <ul class="as-submenu">
                                            <li><a href="blog-detail.html">blog detail</a></li>
                                            <li><a href="blog-detail-vimeo.html">Single vimeo</a></li>
                                            <li><a href="blog-detail-soundcloud.html">Single soundcloud</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">event</a>
                                <ul class="as-submenu">
                                    <li><a href="event-list.html">event list</a></li>
                                    <li><a href="event-grid.html">event grid</a></li>
                                    <li><a href="event-detail.html">event detail</a></li>
                                </ul>
                            </li>
                            <li><a href="#">cause</a>
                                <ul class="as-submenu">
                                    <li><a href="cause-list.html">cause list</a></li>
                                    <li><a href="cause-grid.html">cause grid</a></li>
                                    <li><a href="cause-detail.html">cause detail</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Team</a>
                                <ul class="as-submenu">
                                    <li><a href="team-list.html">team list</a></li>
                                    <li><a href="team-grid.html">team grid</a></li>
                                    <li><a href="team-detail.html">team detail</a></li>
                                </ul>
                            </li>
                            <li><a href="#">shop</a>
                                <ul class="as-submenu">
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-detail.html">Shop Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="shortcode.html">shortcode</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="as-submenu">
                                    <li><a href="donation.html">Donation</a></li>
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="underconstruction.html">UnderConstruction</a></li>
                                    <li><a href="#">Gallery</a>
                                        <ul class="as-submenu">
                                            <li><a href="gallery3column.html">Gallery 3Column</a></li>
                                            <li><a href="gallery4column.html">Gallery 4Column</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact us</a></li>

                        </ul>
                    </div>
                    <!--// Responsive Menu //-->

                </div>
            </div>
        </div>
    </div>






</header>

<script>
    $(document).ready(function (){
        $(document).on('click','#logout_btn',function (){


            $('#logout_form').submit();
        });


    })
</script>


