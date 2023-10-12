@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="wrap" style="margin: 15px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Seo Setting</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('seo.setting.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Meta Title</label>
                                <input value="{{ $edit_data->meta_title }}" name="meta_title" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Meta Author</label>
                                <input value="{{ $edit_data->meta_author }}" name="meta_author" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <label for="">Meta Keyword</label>
                                <input value="{{ $edit_data->meta_keyword }}" name="meta_keyword" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Meta Description</label>
                                <input value="{{ $edit_data->meta_description }}" name="meta_description" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Google Analytics</label>
                                <input value="{{ $edit_data->google_analytics }}" name="google_analytics" class="form-control" type="text">
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