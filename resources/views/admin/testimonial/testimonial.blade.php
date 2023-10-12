@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="wrap" style="margin: 10px;">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Testimonial Table</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Quote</th>
                            <th>Username</th>
                            <th>Designation</th>
                            <th>User Photo</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($testimonial as $data)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $data->Quote }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->designation }}</td>
                            <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/image/testimonial/{{ $data->user_photo }}" alt=""></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('edit.testimonial',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" href="{{ route('delete.testimonial',$data->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Add Testimonial</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.testimonial') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Quote</label>
                            <input name="quote" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">UserName</label>
                            <input name="username" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Designation</label>
                            <input name="designation" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">User Photo</label>
                            <img id="photo" src="" alt="">
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



<div class="wrap" style="margin: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Testimonial Banner</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('store.testimonial.banner') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for=""><strong>Banner Photo</strong></label>
                                    <input name="old_banner" value="{{ $edit->testi_banner }}" type="hidden">
                                    <input name="banner" class="form-control-file" type="file">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img id="banner" style="width: 400px; height: 300px;" src="{{ URL::to('') }}/admin/image/testimonial/{{ $edit->testi_banner }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#photo').attr('src',url).width('200px').height('200px');
            });

            $(document).on('change','input[name="banner"]',function (e){

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#banner').attr('src',url).width('400px').height('300px');
            })
        })
    </script>







@endsection