@extends('admin.dashboard.body.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h2>All Slider</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th width="18%">Short Title</th>
                                <th>Image</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->short_title }}</td>
                                <td><img style="width: 60px;height: 60px;" src="{{ URL::to('') }}/admin/image/slider/{{ $slider->photo }}" alt=""></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('slider.edit',$slider->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" href="{{ route('slider.delete',$slider->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New Slider</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" class="form-control" type="text">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Short Title</label>
                                <input name="short_title" class="form-control" type="text">
                                @error('short_title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <img id="image" src="" alt="">
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