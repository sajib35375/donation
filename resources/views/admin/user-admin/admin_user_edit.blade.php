@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="wrap" style="margin: 10px;padding: 15px;">
        <div class="card">
            <div class="card-header">
                <h2>Add Admin User</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.user.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input value="{{ $edit_data->name }}" name="name" class="form-control" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="">Email</label>
                            <input value="{{ $edit_data->email }}" name="email" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-6">
                            <label for="">Photo</label>
                            <img id="img" src="" alt="">
                            <input name="old_photo" value="{{ $edit_data->photo }}" type="hidden">
                            <input name="photo" class="form-control-file" type="file">
                        </div>

                    </div>



                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->slider == 1 ? 'checked' : '' }} name="slider" type="checkbox" id="md_checkbox_1" class="chk-col-success" value="1">
                                <label for="md_checkbox_1">Slider</label>

                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="demo-checkbox">

                                <input {{ $edit_data->about == 1 ? 'checked' : '' }} name="about" type="checkbox" id="md_checkbox_2" class="chk-col-success" value="1">
                                <label for="md_checkbox_2">About</label>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="demo-checkbox">

                                <input {{ $edit_data->couses == 1 ? 'checked' : '' }} name="courses" type="checkbox" id="md_checkbox_3" class="chk-col-success" value="1">
                                <label for="md_checkbox_3">Courses</label>

                            </div>

                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">

                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->gallery == 1 ? 'checked' : '' }} name="gallery" type="checkbox" id="md_checkbox_4" class="chk-col-success" value="1">
                                <label for="md_checkbox_4">Gallery</label>

                            </div>

                        </div>

                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->team == 1 ? 'checked' : '' }} name="team" type="checkbox" id="md_checkbox_5" class="chk-col-success" value="1">
                                <label for="md_checkbox_5">Team</label>

                            </div>

                        </div>

                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->testimonial == 1 ? 'checked' : '' }} name="testimonial" type="checkbox" id="md_checkbox_6" class="chk-col-success" value="1">
                                <label for="md_checkbox_6">Testimonial</label>

                            </div>

                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->blog == 1 ? 'checked' : '' }} name="blog" type="checkbox" id="md_checkbox_7" class="chk-col-success" value="1">
                                <label for="md_checkbox_7">Blog</label>

                            </div>

                        </div>
                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->contact == 1 ? 'checked' : '' }} name="contact" type="checkbox" id="md_checkbox_8" class="chk-col-success" value="1">
                                <label for="md_checkbox_8">Contact</label>

                            </div>

                        </div>

                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->count_banner == 1 ? 'checked' : '' }} name="count_banner" type="checkbox" id="md_checkbox_9" class="chk-col-success" value="1">
                                <label for="md_checkbox_9">Count_Banner</label>

                            </div>

                        </div>
                    </div>



                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->sponsor == 1 ? 'checked' : '' }} name="sponsor" type="checkbox" id="md_checkbox_10" class="chk-col-success" value="1">
                                <label for="md_checkbox_10">Sponsor</label>

                            </div>

                        </div>

                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->comments == 1 ? 'checked' : '' }} name="comments" type="checkbox" id="md_checkbox_11" class="chk-col-success" value="1">
                                <label for="md_checkbox_11">Comments</label>

                            </div>

                        </div>
                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->events == 1 ? 'checked' : '' }} name="events" type="checkbox" id="md_checkbox_12" class="chk-col-success" value="1">
                                <label for="md_checkbox_12">Events</label>

                            </div>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->donation == 1 ? 'checked' : '' }} name="donation" type="checkbox" id="md_checkbox_13" class="chk-col-success" value="1">
                                <label for="md_checkbox_13">Donation</label>

                            </div>

                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4" >
                            <div class="demo-checkbox">

                                <input {{ $edit_data->admin_user == 1 ? 'checked' : '' }} name="admin_user" type="checkbox" id="md_checkbox_14" class="chk-col-success" value="1">
                                <label for="md_checkbox_14">admin user</label>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <input class="btn btn-success btn-block" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>





    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);

                $('img#img').attr('src',url).width('400px').height('300px');
            })
        })

    </script>

@endsection