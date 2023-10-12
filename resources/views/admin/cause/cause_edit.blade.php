@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="wrap" style="margin: 10px;">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Cause</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.causes',$edit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="title" value="{{ $edit->title }}" class="form-control" type="text">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $edit->Description }}</textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Raised</label>
                            <input name="raised" value="{{ $edit->raised }}" class="form-control" type="text">
                            @error('raised')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Goal</label>
                            <input name="goal" value="{{ $edit->goal }}" class="form-control" type="text">
                            @error('goal')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Photo</label>
                            <img id="img" style="width: 500px;height: 300px;" src="{{ URL::to('') }}/admin/image/causes/{{ $edit->photo }}" alt="">
                            <input name="old_photo" value="{{ $edit->photo }}" type="hidden">
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






    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);

                $('#img').attr('src',url).width('500px').height('300px');
            })
        })
    </script>











@endsection