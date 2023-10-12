@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <div class="wrap" style="margin: 10px;">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h2>Blog Banner Image</h2>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                             <form action="{{ route('blog.banner.store') }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group">
                                     <label for="">Banner</label>
                                     <input name="old_photo" value="{{ $edit->photo }}" type="hidden">
                                     <input name="banner" class="form-control-file" type="file">
                                 </div>
                                 <div class="form-group">
                                     <input value="Update" class="btn btn-success" type="submit">
                                 </div>
                             </form>
                         </div>
                         <div class="col-md-6">
                             <img id="img" src="{{ URL::to('') }}/admin/image/blog/banner/{{ $edit->photo }}" alt="">
                         </div>
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