@extends('admin.dashboard.body.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2>Slider Edit</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('slider.update',$slider_edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input value="{{ $slider_edit->title }}" name="title" class="form-control" type="text">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Short Title</label>
                        <input value="{{ $slider_edit->short_title }}" name="short_title" class="form-control" type="text">
                        @error('short_title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input name="old_photo" value="{{ $slider_edit->photo }}" type="hidden">
                        <img id="image" style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/image/slider/{{ $slider_edit->photo }}" alt="">
                        <input name="photo" class="form-control-file" type="file">
                        @error('photo')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#image').attr('src',url).width('100px').height('100px');
            })
        })
    </script>
@endsection