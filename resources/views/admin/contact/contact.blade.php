@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="wrap">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Contact Page Setup</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('contact.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Google Map Link</label>
                            <input name="map_link" value="{{ $edit->google_map_link }}"  class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Banner Image</label>
                            <input name="old_photo" value="{{ $edit->banner_image }}" type="hidden">
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
                   <div class="map">
                       <h4>Google Map</h4>
                       <iframe frameborder="0" src="{{ $edit->google_map_link }}" allowfullscreen></iframe>
                   </div>
                   <div class="banner">
                       <h4>Banner Image</h4>
                       <img id="img" src="{{ URL::to('') }}/admin/image/contact/{{ $edit->banner_image }}" alt="">
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>




    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="banner"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);

                $('img#img').attr('src',url);
            })
        })




    </script>













@endsection