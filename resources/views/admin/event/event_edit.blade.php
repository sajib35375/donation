@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="wrap" style="margin: 10px;">

        <div class="card">
            <div class="card-header">
                <h2>Edit Event</h2>
            </div>
            <div class="card-body">


                <form action="{{ route('event.update',$edit->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input value="{{ $edit->title }}" name="title" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Quote</label>
                                <input value="{{ $edit->quote }}" name="quote" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input value="{{ $edit->email }}" name="email" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input value="{{ $edit->phone }}" name="phone" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="editor1" name="description" rows="10" cols="80">
												{!! $edit->description !!}
						</textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input name="old_photo" value="{{ $edit->photo }}" type="hidden">
                                <input name="photo" class="form-control-file" type="file">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Poster</label>
                                <input name="old_poster" value="{{ $edit->poster }}" type="hidden">
                                <input name="poster" class="form-control-file" type="file">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="img" src="{{ URL::to('') }}/admin/image/event/{{ $edit->photo }}" alt="">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="pos" src="{{ URL::to('') }}/admin/image/event/{{ $edit->poster }}" alt="">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input value="{{ $edit->Address }}" name="Address" class="form-control" type="text">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Timing</label>
                                <input value="{{ $edit->timing }}" name="timing" class="form-control" type="text">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Countdown</label>
                                <input value="{{ $edit->countdown }}" name="countdown" class="form-control" type="date">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Google Map Embed Link</label>
                                <input value="{{ $edit->google_map }}" name="google_map" class="form-control" type="text">
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

                $('#pos').attr('src',url_poster).width('400px').height('250px');
            })
        })

    </script>


@endsection