@extends('admin.dashboard.body.app')
@section('content')


    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>All Tags</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tag Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $tag->tag_name }}</td>
                                <td>
                                    @if($tag->status==true )
                                    <span class="badge badge-success" >Active</span>
                                    @else
                                    <span class="badge badge-danger" >Inactive</span>
                                        @endif
                                </td>
                                <td>
                                    @if($tag->status==true)
                                        <a class="btn btn-primary" href="{{ route('status.inactive',$tag->id) }}"><i class="fa fa-thumbs-o-up"></i></a>
                                        @else
                                        <a class="btn btn-warning" href="{{ route('status.active',$tag->id) }}"><i class="fa fa-thumbs-o-down"></i></a>
                                        @endif
                                    <a class="btn btn-info" href="{{ route('edit.tag',$tag->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" href="{{ route('delete.tag',$tag->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New Tag</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.tag') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tag Name</label>
                                <input name="tag" class="form-control" type="text">
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