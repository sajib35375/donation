@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Gallery</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.gallery',$edit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" value="{{ $edit->title }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Short Text</label>
                                <input name="short_text" value="{{ $edit->short_text }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input name="old_photo" value="{{ $edit->photo }}" type="hidden">
                                <img id="img" src="{{ URL::to('') }}/admin/image/gallery/{{ $edit->photo }}" alt="">
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