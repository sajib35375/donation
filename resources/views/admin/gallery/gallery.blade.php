@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h2>All Gallery Photo</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Short Text</th>
                                <th>Photo</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($gallery as $data)

                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->short_text }}</td>
                                <td><img src="{{ URL::to('') }}/admin/image/gallery/{{ $data->photo }}" alt=""></td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('edit.gallery',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" href="{{ route('delete.gallery',$data->id) }}"><i class="fa fa-trash"></i></a>
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
                        <h2>Add New Gallery</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.gallery') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Short Text</label>
                                <input name="short_text" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <img id="img" src="" alt="">
                                <input name="photo" class="form-control-file" type="file">
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
                $('img#img').attr('src',url).width('300px').height('200px');
            })
        })


    </script>










@endsection