@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Team</h2>
                    </div>
                    <div class="card-body">

                                    <form action="{{ route('update.team',$edit->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input value="{{ $edit->name }}" name="name" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input value="{{ $edit->title }}" name="title" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $edit->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Photo</label>
                                            <img id="photo" style="width: 300px;height: 200px;" src="{{ URL::to('') }}/admin/image/team/{{ $edit->photo }}" alt="">
                                            <input name="old_photo" value="{{ $edit->photo }}" type="hidden">
                                            <input  name="photo" class="form-control-file" type="file">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <img id="location" style="width: 300px;height: 200px;" src="{{ URL::to('') }}/admin/image/team/{{ $edit->location }}" alt="">
                                            <input name="old_location" value="{{ $edit->location }}" type="hidden">
                                            <input name="location" class="form-control-file" type="file">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Designation</label>
                                            <input value="{{ $edit->designation }}" name="designation" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Degree</label>
                                            <input value="{{ $edit->degree }}" name="degree" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Language</label>
                                            <input value="{{ $edit->language }}" name="language" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Experience</label>
                                            <input value="{{ $edit->experience }}" name="experience" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hobbies</label>
                                            <input value="{{ $edit->hobbies }}" name="hobbies" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-success" type="submit">
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#photo').attr('src',url).width('300px').height('200px');
            });

            $(document).on('change','input[name="location"]',function (e){

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#location').attr('src',url).width('300px').height('200px');
            })
        })
    </script>











@endsection