

@php

    $data = \App\Models\SiteSetting::find(1);

@endphp


<div class="as-footer">
    <div class="container">
        <div class="row">

            <aside class="widget widget_info col-md-3">
                <a href="#" class="footer-logo"><img src="{{ URL::to('') }}/admin/image/logo/{{ $data->logo }}" alt=""></a>
                <p>{{ Str::of($data->text)->words(20) }}</p>
                <ul>
                    <li><i class="fa fa-home"></i> {{ $data->address }}</li>
                    <li><i class="fa fa-envelope-o"></i> <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">{{ $data->email }}</a></li>
                    <li><i class="fa fa-phone"></i> +88{{ $data->phone }}</li>
                </ul>
            </aside>
            <aside class="widget widget_categories col-md-3">
                <div class="as-strip-title"> <h3>Quick Links</h3> </div>
                <ul>
                    <li><a href="{{ route('single.about') }}">About Us</a></li>
                    <li><a href="{{ route('blog.show') }}">Blog</a></li>
                    <li><a href="{{ route('cause.list') }}">Causes</a></li>
                    <li><a href="{{ route('team.page') }}">Team</a></li>
                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                    <li><a href="{{ route('event.show') }}">Event</a></li>
                </ul>
            </aside>
            <aside class="widget widget_newslatter col-md-6">
                <div class="as-strip-title"> <h3>Newsletter</h3> </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <form>
                    <ul>
                        <li><input type="text" placeholder="Your Name" name="usrname" required></li>
                        <li><input type="text" placeholder="Email Address" name="email" required></li>
                        <li><input class="as-bgcolor" type="submit" value="Subscribe Now"></li>
                    </ul>
                </form>
            </aside>

        </div>
    </div>
    <footer class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6"><div class="copyright-text"><p>© 2015 Helping Hand, All Right Reserved EyeCix</p></div></div>
                <div class="col-md-6">
                    <a href="#" class="backtop-btn"><i class="fa fa-angle-double-up as-color"></i></a>
                    <ul class="as-media-network">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                        <li><a href="#" class="fa fa-youtube"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>