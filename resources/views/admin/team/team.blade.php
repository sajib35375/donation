@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="wrap">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Team Section</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Location</th>
                            <th>Degree</th>
                            <th>Language</th>
                            <th>Experience</th>
                            <th>Hobbies</th>
                            <th width="25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($team as $data)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/image/team/{{ $data->photo }}" alt=""></td>
                            <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/image/team/{{ $data->location }}" alt=""></td>
                            <td>{{ $data->degree }}</td>
                            <td>{{ $data->language }}</td>
                            <td>{{ $data->experience }}</td>
                            <td>{{ $data->hobbies }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('edit.team',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" href="{{ route('delete.team',$data->id) }}"><i class="fa fa-trash"></i></a>
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
                    <h2>Add New Team Member</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.team') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="title" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Photo</label>
                            <img id="photo" src="" alt="">
                            <input name="photo" class="form-control-file" type="file">
                        </div>
                        <div class="form-group">
                            <label for="">Location</label>
                            <img id="location" src="" alt="">
                            <input name="location" class="form-control-file" type="file">
                        </div>
                        <div class="form-group">
                            <label for="">Designation</label>
                            <img src="" alt="">
                            <input name="designation" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Degree</label>
                            <input name="degree" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Language</label>
                            <input name="language" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Experience</label>
                            <input name="experience" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Hobbies</label>
                            <input name="hobbies" class="form-control" type="text">
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
                    <h2>Team Banner Image</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('banner.team') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Banner Image</label>
                                    <input name="old_banner" value="{{ $edit->banner }}" type="hidden">
                                    <input name="banner" class="form-control-file" type="file">
                                </div>
                                <div class="form-group">
                                    <input value="Update" class="btn btn-success" type="submit">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ URL::to('') }}/admin/image/team/{{ $edit->banner }}" alt="">
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

                $('img#photo').attr('src',url).width('100px').height('100px');
            });

            $(document).on('change','input[name="location"]',function (e){

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#location').attr('src',url).width('100px').height('100px');
            })
        })
    </script>









@endsection