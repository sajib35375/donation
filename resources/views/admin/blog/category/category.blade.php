@extends('admin.dashboard.body.app')
@section('content')



    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>All Categories</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        @if($item->status==true )
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if($item->status==true )
                                            <a class="btn btn-primary" href="{{ route('inactive.category',$item->id) }}"><i class="fa fa-thumbs-o-up"></i></a>
                                        @else
                                            <a class="btn btn-danger" href="{{ route('active.category',$item->id) }}"><i class="fa fa-thumbs-o-down"></i></a>
                                        @endif


                                        <a class="btn btn-info" href="{{ route('edit.category',$item->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" href="{{ route('delete.category',$item->id) }}"><i class="fa fa-trash"></i></a>
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
                        <h2>Add New Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input name="category" class="form-control" type="text">
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