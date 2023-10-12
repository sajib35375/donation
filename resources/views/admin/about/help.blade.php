@extends('admin.dashboard.body.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Header</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('header.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Main Title</label>
                                <input value="{{ $header->main_title }}" name="main_title" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Main Short Description</label>
                                <input value="{{ $header->main_short_des }}" name="main_short_des" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <input value="Update" class="btn btn-success" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h2>About Content</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th width="30%">Short Description</th>
                                <th>Icon</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($all as $data)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->short_des }}</td>
                                    <td><i class="{{ $data->icon }}"></i></td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('about.edit',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" href="{{ route('about.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
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
                        <h2>Add how to Help</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('about.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" class="form-control" type="text">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <input name="short_des" class="form-control" type="text">
                                @error('short_des')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Icon Class Name</label>
                                <input name="icon" class="form-control" type="text">
                                @error('icon')
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

    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Banner Image</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('single.about.banner') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Banner Image</label>
                                    <input name="old_banner" value="{{ $banner->banner }}" type="hidden">
                                    <input name="banner" class="form-control-file" type="file">
                                </div>
                                <div class="form-group">
                                    <input value="Update" class="btn btn-success" type="submit">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img style="width: 250px;height: 250px;" id="banner" src="{{ URL::to('') }}/admin/image/about/{{ $banner->banner }}" alt="">

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="banner"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#banner').attr('src',url);
            })
        })
    </script>


@endsection