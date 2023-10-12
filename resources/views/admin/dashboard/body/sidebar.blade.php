@php


    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();




                $slider = (auth()->guard('admin')->user()->slider==1);
                $about = (auth()->guard('admin')->user()->about==1);
                $couses = (auth()->guard('admin')->user()->couses==1);
                $gallery = (auth()->guard('admin')->user()->gallery==1);
                $team = (auth()->guard('admin')->user()->team==1);
                $testimonial = (auth()->guard('admin')->user()->testimonial==1);
                $blog = (auth()->guard('admin')->user()->blog==1);
                $contact = (auth()->guard('admin')->user()->contact==1);
                $count_banner = (auth()->guard('admin')->user()->count_banner==1);
                $sponsor = (auth()->guard('admin')->user()->sponsor==1);
                $comments = (auth()->guard('admin')->user()->comments==1);
                $events = (auth()->guard('admin')->user()->events==1);
                $donation = (auth()->guard('admin')->user()->donation==1);
                $admin_user = (auth()->guard('admin')->user()->admin_user==1);


@endphp



<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('admin.dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logo-dark.png') }}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>


        @if($slider)
            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='slider.show')?'active':'' }}"><a href="{{ route('slider.show') }}"><i class="ti-more"></i>All Slider</a></li>

                </ul>
            </li>

            @endif

            @if($about)
            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>About</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ ($route=='about')?'active':'' }}"><a href="{{ route('about') }}"><i class="ti-more"></i>How to Help</a></li>

                </ul>
            </li>
            @endif



            @if($couses)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Causes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='show.causes')?'active':'' }}"><a href="{{ route('show.causes') }}"><i class="ti-more"></i>Causes</a></li>


                </ul>
            </li>
            @endif

            @if($gallery)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Gallery</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='show.gallery')?'active':'' }}"><a href="{{ route('show.gallery') }}"><i class="ti-more"></i>All Gallery</a></li>
                    <li class="{{ ($route=='gallery.banner')?'active':'' }}"><a href="{{ route('gallery.banner') }}"><i class="ti-more"></i>Gallery Banner</a></li>


                </ul>
            </li>

            @endif

            @if($team)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Volunteers Staff</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='show.team')?'active':'' }}"><a href="{{ route('show.team') }}"><i class="ti-more"></i>Team</a></li>


                </ul>
            </li>

            @endif

            @if($testimonial)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Testimonials</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='show.testimonial')?'active':'' }}"><a href="{{ route('show.testimonial') }}"><i class="ti-more"></i>Client Testimonial</a></li>


                </ul>
            </li>
            @endif


            @if($blog)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='show.tag')?'active':'' }}"><a href="{{ route('show.tag') }}"><i class="ti-more"></i>Tag</a></li>
                    <li class="{{ ($route=='show.category')?'active':'' }}"><a href="{{ route('show.category') }}"><i class="ti-more"></i>Category</a></li>
                    <li class="{{ ($route=='blog.banner')?'active':'' }}"><a href="{{ route('blog.banner') }}"><i class="ti-more"></i>Banner Image</a></li>
                    <li class="{{ ($route=='add.post')?'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add New Post</a></li>
                    <li class="{{ ($route=='post.show')?'active':'' }}"><a href="{{ route('post.show') }}"><i class="ti-more"></i>Post Show</a></li>


                </ul>
            </li>
            @endif


            @if($contact)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Contact Us</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='contact')?'active':'' }}"><a href="{{ route('contact') }}"><i class="ti-more"></i>Contact Page</a></li>


                </ul>
            </li>
            @endif


            @if($count_banner)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Count Banner</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='banner.count')?'active':'' }}"><a href="{{ route('banner.count') }}"><i class="ti-more"></i>Count Background Banner</a></li>


                </ul>
            </li>
            @endif


            @if($sponsor)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Sponsor</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='all.sponsor')?'active':'' }}"><a href="{{ route('all.sponsor') }}"><i class="ti-more"></i>All Sponsor</a></li>


                </ul>
            </li>
            @endif

            @if($comments)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Comments</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='post.comment')?'active':'' }}"><a href="{{ route('post.comment') }}"><i class="ti-more"></i>All Comments</a></li>
                    <li class="{{ ($route=='post.reply')?'active':'' }}"><a href="{{ route('post.reply') }}"><i class="ti-more"></i>All Reply</a></li>


                </ul>
            </li>
            @endif

            @if($events)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Events</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='add.event')?'active':'' }}"><a href="{{ route('add.event') }}"><i class="ti-more"></i>Add New Event</a></li>
                    <li class="{{ ($route=='show.event')?'active':'' }}"><a href="{{ route('show.event') }}"><i class="ti-more"></i>All Event</a></li>
                    <li class="{{ ($route=='event.banner')?'active':'' }}"><a href="{{ route('event.banner') }}"><i class="ti-more"></i>Event Banner</a></li>


                </ul>
            </li>
            @endif

            @if($donation)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Donation Table</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='view.donation')?'active':'' }}"><a href="{{ route('view.donation') }}"><i class="ti-more"></i>All Donation</a></li>
                </ul>
            </li>
            @endif


            @if($admin_user)
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Admin User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='add.admin')?'active':'' }}"><a href="{{ route('add.admin') }}"><i class="ti-more"></i>Add New Admin</a></li>
                    <li class="{{ ($route=='admin.user')?'active':'' }}"><a href="{{ route('admin.user') }}"><i class="ti-more"></i>All Admin</a></li>
                </ul>
            </li>
            @endif

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Setting</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='site.setting')?'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>SiteSettings</a></li>
                    <li class="{{ ($route=='seo.setting')?'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>
                </ul>
            </li>



            <li>
                <a href="auth_login.html">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

{{--    <div class="sidebar-footer">--}}
{{--        <!-- item-->--}}
{{--        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>--}}
{{--        <!-- item-->--}}
{{--        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>--}}
{{--        <!-- item-->--}}
{{--        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>--}}
{{--    </div>--}}
</aside>