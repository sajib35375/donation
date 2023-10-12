@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Testimonial</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.testimonial',$edit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Quote</label>
                                <input name="quote" value="{{ $edit->Quote }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">UserName</label>
                                <input name="username" value="{{ $edit->username }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input name="designation" value="{{ $edit->designation }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">User Photo</label>
                                <img style="width: 200px;height: 200px;" id="photo" src="{{ URL::to('') }}/admin/image/testimonial/{{ $edit->user_photo }}" alt="">
                                <input name="old_photo" value="{{ $edit->user_photo }}" type="hidden">
                                <input name="photo"  class="form-control-file" type="file">
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

                $('img#photo').attr('src',url).width('200px').height('200px');
            });


        })
    </script>











@endsection