@extends('admin.dashboard.body.app')
@section('content')


    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.category',$edit->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Tag Name</label>
                                <input name="category" value="{{ $edit->category_name }}" class="form-control" type="text">
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