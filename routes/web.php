<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/cache-clear' , [App\Http\Controllers\UserController::class , 'cache'])->name('cache');
Route::get('/cache-clear-event' , [App\Http\Controllers\EventController::class , 'cacheClear'])->name('cache.clear');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin login
Route::group(['middleware'=>'guest:admin'],function (){
    Route::post('admin/login',[App\Http\Controllers\AdminController::class,'login'])->name('admin.login');
    Route::get('admin/login',[App\Http\Controllers\AdminController::class,'showLoginForm'])->name('admin.login.page');
});




//admin group route
Route::group(['middleware'=>'auth:admin','prefix'=>'admin'],function (){


    Route::get('dashboard',[App\Http\Controllers\AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('logout',[App\Http\Controllers\AdminController::class,'adminLogout'])->name('admin.logout');
    //slider
    Route::get('slider/show',[App\Http\Controllers\SliderController::class,'sliderShow'])->name('slider.show');
    Route::post('slider/store',[App\Http\Controllers\SliderController::class,'sliderStore'])->name('slider.store');
    Route::get('slider/edit/{id}',[App\Http\Controllers\SliderController::class,'sliderEdit'])->name('slider.edit');
    Route::post('slider/update/{id}',[App\Http\Controllers\SliderController::class,'sliderUpdate'])->name('slider.update');
    Route::get('slider/delete/{id}',[App\Http\Controllers\SliderController::class,'sliderDelete'])->name('slider.delete');
    //About
    Route::get('about/crud',[App\Http\Controllers\AboutController::class,'aboutCrud'])->name('about');
    Route::post('about/store',[App\Http\Controllers\AboutController::class,'aboutStore'])->name('about.store');
    Route::get('about/edit/{id}',[App\Http\Controllers\AboutController::class,'aboutEdit'])->name('about.edit');
    Route::get('about/delete/{id}',[App\Http\Controllers\AboutController::class,'aboutDelete'])->name('about.delete');
    Route::post('about/update/{id}',[App\Http\Controllers\AboutController::class,'aboutUpdate'])->name('about.update');
    Route::post('header/update',[App\Http\Controllers\AboutController::class,'headerUpdate'])->name('header.update');
    Route::post('single/about/banner',[App\Http\Controllers\AboutController::class,'SingleAboutBanner'])->name('single.about.banner');
    //  causes
    Route::get('show/causes',[App\Http\Controllers\CausesController::class,'showCauses'])->name('show.causes');
    Route::post('store/causes',[App\Http\Controllers\CausesController::class,'storeCauses'])->name('store.causes');
    Route::get('edit/causes/{id}',[App\Http\Controllers\CausesController::class,'editCauses'])->name('edit.causes');
    Route::post('update/causes/{id}',[App\Http\Controllers\CausesController::class,'updateCauses'])->name('update.causes');
    Route::get('delete/causes/{id}',[App\Http\Controllers\CausesController::class,'deleteCauses'])->name('delete.causes');
    Route::post('cause/banner/update',[App\Http\Controllers\CausesController::class,'causeBannerUpdate'])->name('cause.banner.update');
    //  Gallery
    Route::get('show/gallery',[App\Http\Controllers\GalleryController::class,'showGallery'])->name('show.gallery');
    Route::post('store/gallery',[App\Http\Controllers\GalleryController::class,'storeGallery'])->name('store.gallery');
    Route::get('edit/gallery/{id}',[App\Http\Controllers\GalleryController::class,'editGallery'])->name('edit.gallery');
    Route::post('update/gallery/{id}',[App\Http\Controllers\GalleryController::class,'updateGallery'])->name('update.gallery');
    Route::get('delete/gallery/{id}',[App\Http\Controllers\GalleryController::class,'deleteGallery'])->name('delete.gallery');
    //  team
    Route::get('show/team',[App\Http\Controllers\TeamController::class,'showTeam'])->name('show.team');
    Route::post('store/team',[App\Http\Controllers\TeamController::class,'storeTeam'])->name('store.team');
    Route::get('edit/team/{id}',[App\Http\Controllers\TeamController::class,'editTeam'])->name('edit.team');
    Route::post('update/team/{id}',[App\Http\Controllers\TeamController::class,'updateTeam'])->name('update.team');
    Route::get('delete/team/{id}',[App\Http\Controllers\TeamController::class,'deleteTeam'])->name('delete.team');
    Route::post('banner/team',[App\Http\Controllers\TeamController::class,'bannerTeam'])->name('banner.team');
    //    testimonial
    Route::get('show/testimonial',[App\Http\Controllers\TestimonialController::class,'showTestimonial'])->name('show.testimonial');
    Route::post('store/testimonial',[App\Http\Controllers\TestimonialController::class,'storeTestimonial'])->name('store.testimonial');
    Route::get('edit/testimonial/{id}',[App\Http\Controllers\TestimonialController::class,'editTestimonial'])->name('edit.testimonial');
    Route::post('update/testimonial/{id}',[App\Http\Controllers\TestimonialController::class,'updateTestimonial'])->name('update.testimonial');
    Route::get('delete/testimonial/{id}',[App\Http\Controllers\TestimonialController::class,'deleteTestimonial'])->name('delete.testimonial');
    Route::post('store/testimonial/banner',[App\Http\Controllers\TestimonialController::class,'storeTestimonialBanner'])->name('store.testimonial.banner');
    //    blog
    Route::get('blog/tag',[App\Http\Controllers\BlogController::class,'tagShow'])->name('show.tag');
    Route::post('blog/tag/store',[App\Http\Controllers\BlogController::class,'tagStore'])->name('store.tag');
    Route::get('blog/tag/edit/{id}',[App\Http\Controllers\BlogController::class,'tagEdit'])->name('edit.tag');
    Route::post('blog/tag/update/{id}',[App\Http\Controllers\BlogController::class,'tagUpdate'])->name('update.tag');
    Route::get('blog/tag/delete/{id}',[App\Http\Controllers\BlogController::class,'tagDelete'])->name('delete.tag');
    Route::get('status/tag/active/{id}',[App\Http\Controllers\BlogController::class,'statusActive'])->name('status.active');
    Route::get('status/tag/inactive/{id}',[App\Http\Controllers\BlogController::class,'statusInactive'])->name('status.inactive');

    Route::get('category/show',[App\Http\Controllers\BlogController::class,'categoryShow'])->name('show.category');
    Route::post('category/store',[App\Http\Controllers\BlogController::class,'categoryStore'])->name('store.category');
    Route::get('category/edit/{id}',[App\Http\Controllers\BlogController::class,'categoryEdit'])->name('edit.category');
    Route::post('category/update/{id}',[App\Http\Controllers\BlogController::class,'categoryUpdate'])->name('update.category');
    Route::get('category/delete/{id}',[App\Http\Controllers\BlogController::class,'categoryDelete'])->name('delete.category');
    Route::get('status/category/active/{id}',[App\Http\Controllers\BlogController::class,'categoryActive'])->name('active.category');
    Route::get('status/category/inactive/{id}',[App\Http\Controllers\BlogController::class,'categoryInactive'])->name('inactive.category');

    Route::get('add/post',[App\Http\Controllers\BlogController::class,'addPost'])->name('add.post');
    Route::post('add/post/store',[App\Http\Controllers\BlogController::class,'addPostStore'])->name('store.post');
    Route::get('post/edit/{id}',[App\Http\Controllers\BlogController::class,'postEdit'])->name('edit.post');
    Route::post('post/update/{id}',[App\Http\Controllers\BlogController::class,'postUpdate'])->name('update.post');
    Route::get('post/delete/{id}',[App\Http\Controllers\BlogController::class,'postDelete'])->name('delete.post');
    Route::get('post/show',[App\Http\Controllers\BlogController::class,'PostShow'])->name('post.show');

    Route::get('blog/banner',[App\Http\Controllers\BlogController::class,'blogBannerLoad'])->name('blog.banner');
    Route::post('blog/banner',[App\Http\Controllers\BlogController::class,'blogBanner'])->name('blog.banner.store');

    //    contact
    Route::get('contact',[App\Http\Controllers\ContactController::class,'contact'])->name('contact');
    Route::post('contact/update',[App\Http\Controllers\ContactController::class,'contactUpdate'])->name('contact.update');

    //comment
    Route::get('post/comment',[App\Http\Controllers\CommentController::class,'postComment'])->name('post.comment');
    Route::get('comment/status/approve/{id}',[App\Http\Controllers\CommentController::class,'statusApprove'])->name('status.approve');
    Route::get('comment/delete/{id}',[App\Http\Controllers\CommentController::class,'commentDelete'])->name('comment.delete');
    //reply
    Route::get('post/reply',[App\Http\Controllers\CommentController::class,'postReply'])->name('post.reply');
    Route::get('reply/status/update/{id}',[App\Http\Controllers\CommentController::class,'replyStatusUpdate'])->name('status.update');
    Route::get('reply/delete/{id}',[App\Http\Controllers\CommentController::class,'replyDelete'])->name('reply.delete');
    //event
    Route::get('add/event',[App\Http\Controllers\EventController::class,'addEvent'])->name('add.event');
    Route::post('add/event/store',[App\Http\Controllers\EventController::class,'addEventStore'])->name('store.event');
    Route::get('show/event',[App\Http\Controllers\EventController::class,'showEvent'])->name('show.event');
    Route::get('event/edit/{id}',[App\Http\Controllers\EventController::class,'eventEdit'])->name('event.edit');
    Route::post('event/update/{id}',[App\Http\Controllers\EventController::class,'eventUpdate'])->name('event.update');
    Route::get('event/delete/{id}',[App\Http\Controllers\EventController::class,'eventDelete'])->name('event.delete');
    Route::get('event/banner/',[App\Http\Controllers\EventController::class,'eventBanner'])->name('event.banner');
    Route::post('event/banner/update',[App\Http\Controllers\EventController::class,'eventBannerUpdate'])->name('event.banner.update');


    //count and sponsor

    Route::get('banner/count/image',[App\Http\Controllers\CountSponsorController::class,'bannerCount'])->name('banner.count');
    Route::post('update/count/banner',[App\Http\Controllers\CountSponsorController::class,'bannerCountUpdate'])->name('update.count');
    Route::get('all/sponsor',[App\Http\Controllers\CountSponsorController::class,'allSponsor'])->name('all.sponsor');
    Route::post('sponsor/store',[App\Http\Controllers\CountSponsorController::class,'SponsorStore'])->name('store.sponsor');
    Route::get('sponsor/edit/{id}',[App\Http\Controllers\CountSponsorController::class,'SponsorEdit'])->name('edit.sponsor');
    Route::post('sponsor/update/{id}',[App\Http\Controllers\CountSponsorController::class,'SponsorUpdate'])->name('update.sponsor');
    Route::get('sponsor/delete/{id}',[App\Http\Controllers\CountSponsorController::class,'SponsorDelete'])->name('delete.sponsor');

    // donation view

    Route::get('view/donation',[App\Http\Controllers\AdminDonationController::class, 'viewDonation'])->name('view.donation');

    //Admin profile

    Route::get('profile/view',[App\Http\Controllers\AdminProfileController::class,'profileView'])->name('profile.show');
    Route::get('profile/edit',[App\Http\Controllers\AdminProfileController::class,'profileEdit'])->name('profile.edit');
    Route::post('profile/update',[App\Http\Controllers\AdminProfileController::class,'profileUpdate'])->name('profile.update');

    //gallery banner
    Route::get('gallery/banner',[App\Http\Controllers\GalleryController::class,'galleryBanner'])->name('gallery.banner');
    Route::post('gallery/banner/update',[App\Http\Controllers\GalleryController::class,'galleryBannerUpdate'])->name('gallery.banner.update');
    //add Admin user

    Route::get('add/admin',[App\Http\Controllers\AdminUserController::class, 'addAdmin'])->name('add.admin');
    Route::post('add/store',[App\Http\Controllers\AdminUserController::class, 'addAdminStore'])->name('add.admin.store');
    Route::get('user/show',[App\Http\Controllers\AdminUserController::class, 'AdminUser'])->name('admin.user');
    Route::get('user/edit/{id}',[App\Http\Controllers\AdminUserController::class, 'AdminUserEdit'])->name('admin.user.edit');
    Route::post('user/update/{id}',[App\Http\Controllers\AdminUserController::class, 'AdminUserUpdate'])->name('admin.user.update');
    Route::get('user/delete/{id}',[App\Http\Controllers\AdminUserController::class, 'AdminUserDelete'])->name('admin.user.delete');

    Route::get('view/change/pass',[App\Http\Controllers\ChangePasswordController::class, 'changeView'])->name('change.view');
    Route::post('change/password',[App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('change.password');

    //setting
    Route::get('site/setting',[App\Http\Controllers\SiteSettingController::class,'SiteSetting'])->name('site.setting');
    Route::post('site/setting/update',[App\Http\Controllers\SiteSettingController::class,'SiteSettingUpdate'])->name('site.setting.update');
    Route::get('seo/setting',[App\Http\Controllers\SiteSettingController::class,'SeoSetting'])->name('seo.setting');
    Route::post('seo/setting/update',[App\Http\Controllers\SiteSettingController::class,'SeoSettingUpdate'])->name('seo.setting.update');

});


Route::group(['middleware'=>'guest:web'],function (){
    //user login and registration
    Route::get('login',[App\Http\Controllers\Auth\LoginController::class,'loginShow'])->name('user.login');
    Route::post('login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
    Route::get('register',[App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('show.register');
    Route::post('register',[App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');
});



//main page view frontend
Route::get('/',[App\Http\Controllers\UserController::class,'index'])->name('frontend.index');

//donation
Route::group(['middleware'=>'auth'],function (){
    Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
    Route::get('donation/view',[App\Http\Controllers\DonationController::class,'donationView'])->name('donation.view');
    Route::post('donation/store',[App\Http\Controllers\DonationController::class,'donationStore'])->name('donation.store');
    Route::post('stripe/store',[App\Http\Controllers\DonationController::class,'stripeStore'])->name('stripe.store');
    //comments
    Route::post('comment/store',[App\Http\Controllers\CommentController::class,'commentStore'])->name('comment.store');
    Route::post('reply/store',[App\Http\Controllers\CommentController::class,'replyStore'])->name('reply.store');
});

//frontend slider
Route::get('frontend/slider',[App\Http\Controllers\SliderController::class,'setSlider'])->name('set.slider');
//frontend single about
Route::get('single/about',[App\Http\Controllers\UserController::class,'SingleAbout'])->name('single.about');
//cause list
Route::get('cause/list',[App\Http\Controllers\UserController::class,'causeList'])->name('cause.list');
//cause single
Route::get('cause/single/{id}',[App\Http\Controllers\UserController::class,'causeSingle'])->name('cause.single');
//team
Route::get('team/page',[App\Http\Controllers\UserController::class,'teamPage'])->name('team.page');
Route::get('team/single/{id}',[App\Http\Controllers\UserController::class,'teamSingle'])->name('team.single');
//search
Route::post('search',[App\Http\Controllers\SearchController::class,'searchIndex'])->name('search.index');
//blog
Route::get('blog/show',[App\Http\Controllers\UserController::class,'blogShow'])->name('blog.show');
//contact
Route::get('contact/us',[App\Http\Controllers\ContactController::class,'contactUs'])->name('contact.us');
Route::post('send/email',[App\Http\Controllers\ContactController::class,'sendEmail'])->name('send.email');
//blog single
Route::get('blog/single/{id}',[App\Http\Controllers\UserController::class,'blogSingle'])->name('blog.single');
//event
Route::get('event/show',[App\Http\Controllers\UserController::class,'eventShow'])->name('event.show');
//single event
Route::get('single/event/{id}',[App\Http\Controllers\UserController::class,'singleEvent'])->name('single.event');
//COUNTDOWN
Route::get('countdownUpdate/{id}',[App\Http\Controllers\EventController::class,'countDownUpdate'])->name('countdown.update');
//category search
Route::get('category/search/{id}',[App\Http\Controllers\UserController::class,'catSearch'])->name('cat.search');
// event
//Route::post('event/show',[App\Http\Controllers\UserController::class,'countUpdate'])->name('counter.update');
//download poster
Route::get('event/poster/{poster}',[App\Http\Controllers\UserController::class,'downloadPoster'])->name('download.poster');
//gallery page
Route::get('gallery/page',[App\Http\Controllers\UserController::class, 'galleryPage'])->name('gallery.page');




