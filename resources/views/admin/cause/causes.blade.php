@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="wrap" style="margin: 10px;">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>All Causes</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Raised</th>
                            <th>Goal</th>
                            <th>Percentage</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cause as $data)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{Str::of($data->Description)->words(25)}}</td>
                            <td>{{ $data->raised }}</td>
                            <td>{{ $data->goal }}</td>
                            <td>{{ $data->percentage }}%</td>
                            <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/image/causes/{{ $data->photo }}" alt=""></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('edit.causes',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" href="{{ route('delete.causes',$data->id) }}"><i class="fa fa-trash"></i></a>
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
                   <h2>Add New Cause</h2>
               </div>
               <div class="card-body">
                   <form action="{{ route('store.causes') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                           <label for="">Title</label>
                           <input name="title" class="form-control" type="text">
                           @error('title')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="">Description</label>
                           <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                           @error('description')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="">Raised</label>
                           <input name="raised" class="form-control" type="text">
                           @error('raised')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="">Goal</label>
                           <input name="goal" class="form-control" type="text">
                           @error('goal')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="">Photo</label>
                           <img id="img" src="" alt="">
                           <input name="photo" class="form-control-file" type="file">
                           @error('photo')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                       </div>
                       <div class="form-group">
                           <input value="Submit" class="btn btn-success" type="submit">
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
                        <h2>Cause Banner</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('cause.banner.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Cause Banner</label>
                                        <input name="old_banner" type="hidden">
                                        <input name="banner_img" class="form-control-file" type="file">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-success" type="submit">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img id="banner" style="width: 400px;height: 250px;" src="{{ URL::to('') }}/admin/image/causes/banner/{{ $edit_banner->banner }}" alt="">
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

           $('#img').attr('src',url).width('100px').height('100px');
       });


        $(document).on('change','input[name="banner_img"]',function (e){
            let url = URL.createObjectURL(e.target.files[0]);

            $('#banner').attr('src',url).width('400px').height('250px');
        })
    })
</script>


@endsection