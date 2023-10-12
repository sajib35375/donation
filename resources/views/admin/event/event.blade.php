@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="wrap" style="margin: 10px;">

            <div class="card">
                <div class="card-header">
                    <h2>Add New Event</h2>
                </div>
                <div class="card-body">


                    <form action="{{ route('store.event') }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                                <label for="">Quote</label>
                                <input name="quote" class="form-control" type="text">
                        </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Email</label>
                                <input name="email" class="form-control" type="text">
                            </div>
                        <div class="form-group">
                                <label for="">Phone</label>
                                <input name="phone" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="editor1" name="description" rows="10" cols="80">
												This is my textarea to be replaced with CKEditor.
						</textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input name="photo" class="form-control-file" type="file">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Poster</label>
                                <input name="poster" class="form-control-file" type="file">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="img" src="" alt="">
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="pos" src="" alt="">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input name="Address" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Timing</label>
                                <input name="timing" class="form-control" type="text">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Countdown</label>
                                <input name="countdown" class="form-control" type="date">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Google Map Embed Link</label>
                                <input name="google_map" class="form-control" type="text">
                            </div>

                        </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit">
                        </div>
                    </div>
                    </div>




                    </form>
                </div>
            </div>


</div>




    <script>
        $(document).ready(function (){
            $(document).on('change','input[name="photo"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);

                $('img#img').attr('src',url).width('400px').height('250px');
            })

            $(document).on('change','input[name="poster"]',function (e){
                let url_poster = URL.createObjectURL(e.target.files[0]);

                $('img#pos').attr('src',url_poster).width('400px').height('250px');
            })
        })

    </script>


@endsection