@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <div class="wrap" style="margin: 10px;padding: 15px;">
      <div class="card">
             <div class="card-header">
                 <h2>Add Admin User</h2>
             </div>
             <div class="card-body">

                 <form action="{{ route('add.admin.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf


                     <div class="row" style="margin-top: 20px;">
                         <div class="col-md-6">
                             <label for="">Name</label>
                             <input name="name" class="form-control" type="text">
                         </div>
                         <div class="col-md-6">
                             <label for="">Email</label>
                             <input name="email" class="form-control" type="text">
                         </div>
                     </div>
                     <div class="row" style="margin-top: 20px;">
                         <div class="col-md-6">
                             <label for="">Photo</label>
                             <img id="img" src="" alt="">
                             <input name="photo" class="form-control-file" type="file">
                         </div>
                         <div class="col-md-6">
                             <label for="">Password</label>
                             <input name="password" class="form-control" type="password">
                         </div>
                     </div>



                   <div class="row" style="margin-top: 20px;">
                       <div class="col-md-4" >
                           <div class="demo-checkbox">

                               <input name="slider" type="checkbox" id="md_checkbox_1" class="chk-col-success" value="1">
                               <label for="md_checkbox_1">Slider</label>

                           </div>

                       </div>

                       <div class="col-md-4">
                           <div class="demo-checkbox">

                               <input name="about" type="checkbox" id="md_checkbox_2" class="chk-col-success" value="1">
                               <label for="md_checkbox_2">About</label>

                           </div>

                       </div>
                       <div class="col-md-4">
                           <div class="demo-checkbox">

                               <input name="courses" type="checkbox" id="md_checkbox_3" class="chk-col-success" value="1">
                               <label for="md_checkbox_3">Courses</label>

                           </div>

                       </div>
                   </div>

              <div class="row" style="margin-top: 20px;">

                  <div class="col-md-4" >
                      <div class="demo-checkbox">

                          <input name="gallery" type="checkbox" id="md_checkbox_4" class="chk-col-success" value="1">
                          <label for="md_checkbox_4">Gallery</label>

                      </div>

                  </div>

                  <div class="col-md-4" >
                      <div class="demo-checkbox">

                          <input name="team" type="checkbox" id="md_checkbox_5" class="chk-col-success" value="1">
                          <label for="md_checkbox_5">Team</label>

                      </div>

                  </div>

                  <div class="col-md-4" >
                      <div class="demo-checkbox">

                          <input name="testimonial" type="checkbox" id="md_checkbox_6" class="chk-col-success" value="1">
                          <label for="md_checkbox_6">Testimonial</label>

                      </div>

                  </div>
              </div>

                 <div class="row" style="margin-top: 20px;">
                     <div class="col-md-4" >
                         <div class="demo-checkbox">

                             <input name="blog" type="checkbox" id="md_checkbox_7" class="chk-col-success" value="1">
                             <label for="md_checkbox_7">Blog</label>

                         </div>

                     </div>
                     <div class="col-md-4" >
                         <div class="demo-checkbox">

                             <input name="contact" type="checkbox" id="md_checkbox_8" class="chk-col-success" value="1">
                             <label for="md_checkbox_8">Contact</label>

                         </div>

                     </div>

                     <div class="col-md-4" >
                         <div class="demo-checkbox">

                             <input name="count_banner" type="checkbox" id="md_checkbox_9" class="chk-col-success" value="1">
                             <label for="md_checkbox_9">Count_Banner</label>

                         </div>

                     </div>
                 </div>



                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-4" >
                        <div class="demo-checkbox">

                            <input name="sponsor" type="checkbox" id="md_checkbox_10" class="chk-col-success" value="1">
                            <label for="md_checkbox_10">Sponsor</label>

                        </div>

                    </div>

                    <div class="col-md-4" >
                        <div class="demo-checkbox">

                            <input name="comments" type="checkbox" id="md_checkbox_11" class="chk-col-success" value="1">
                            <label for="md_checkbox_11">Comments</label>

                        </div>

                    </div>
                    <div class="col-md-4" >
                        <div class="demo-checkbox">

                            <input name="events" type="checkbox" id="md_checkbox_12" class="chk-col-success" value="1">
                            <label for="md_checkbox_12">Events</label>

                        </div>

                    </div>
                </div>
                 <div class="row" style="margin-top: 20px;">
                     <div class="col-md-4" >
                         <div class="demo-checkbox">

                             <input name="donation" type="checkbox" id="md_checkbox_13" class="chk-col-success" value="1">
                             <label for="md_checkbox_13">Donation</label>

                         </div>

                     </div>
                     <div class="col-md-4" >
                         <div class="demo-checkbox">

                             <input name="admin_user" type="checkbox" id="md_checkbox_14" class="chk-col-success" value="1">
                             <label for="md_checkbox_14">Admin User</label>

                         </div>

                     </div>
                 </div>

                     <div class="col-md-12">
                         <input class="btn btn-success btn-block" type="submit">
                     </div>
                 </form>
             </div>
         </div>
  </div>





    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);

                $('img#img').attr('src',url).width('400px').height('300px');
            })
        })

    </script>

@endsection