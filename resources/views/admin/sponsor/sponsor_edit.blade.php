@extends('admin.dashboard.body.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="wrap">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Sponsor Edit</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.sponsor',$edit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Image</label>
                                <input value="{{ $edit->photo }}" name="old_img" type="hidden">
                                <input name="photo" class="form-control-file" type="file">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Sponsor Image</h2>
                    </div>
                    <div class="card-body">
                        <img style="width:300px;height:200px;" id=img src="{{ URL::to('') }}/admin/image/sponsor/{{ $edit->photo }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>

    $(document).ready(function(){
        $(document).on('change','input[name="photo"]',function(e){
            let url = URL.createObjectURL(e.target.files[0]);

            $('img#img').attr('src',url).width('300px').hieght('200px');
        })
    })


</script>







    @endsection