@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    
    
    <div class="wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Profile Edit</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Name</label>
                                <input value="{{ $admin_edit->name }}" name="name" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input value="{{ $admin_edit->email }}" name="email" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <img id="img" src="{{ URL::to('') }}/admin/profile/{{ $admin_edit->photo }}" alt="">
                                <input name="old_photo" value="{{ $admin_edit->photo }}" type="hidden">
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

                $('img#img').attr('src',url);
            })
        })



    </script>
    
    
    
@endsection