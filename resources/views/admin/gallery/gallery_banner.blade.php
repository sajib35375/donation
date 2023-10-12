@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <div class="wrap" style="margin: 15px;">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Gallery Banner Image</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gallery.banner.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Banner</label>
                                <input name="old_banner" value="{{ $banner_img->gallery_banner }}" type="hidden">
                                <input name="banner" class="form-control-file" type="file">
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
                    <div class="card-body">
                        <img id="img" src="{{ URL::to('') }}/admin/image/gallery/{{ $banner_img->gallery_banner }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="banner"]',function(e){
                let url = URL.createObjectURL(e.target.files[0]);

                $('img#img').attr('src',url);
            })
        })
    </script>


@endsection