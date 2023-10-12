@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="wrap" style="margin: 15px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Site Setting</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('site.setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input value="{{ $edit_data->phone }}" name="phone" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input value="{{ $edit_data->email }}" name="email" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Logo</label>
                                <input name="old_logo" value="{{ $edit_data->logo }}" type="hidden">
                                <input name="logo" class="form-control-file" type="file">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input value="{{ $edit_data->address }}" name="address" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Text</label>
                                <input value="{{ $edit_data->text }}" name="text" class="form-control" type="text">
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



@endsection