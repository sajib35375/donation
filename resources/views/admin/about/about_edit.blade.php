@extends('admin.dashboard.body.app')

@section('content')



    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit how to Help</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('about.update',$edit->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input value="{{ $edit->title }}" name="title" class="form-control" type="text">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <input value="{{ $edit->short_des }}" name="short_des" class="form-control" type="text">
                                @error('short_des')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Icon Class Name</label>
                                <input value="{{ $edit->icon }}" name="icon" class="form-control" type="text">
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





@endsection