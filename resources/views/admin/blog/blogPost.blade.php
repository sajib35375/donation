@extends('admin.dashboard.body.app')
@section('content')



    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Post</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Title</th>
                                    <th>Tag</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>


                                        <ul>
                                            @foreach($post->tags as $tag)
                                            <li>{{ $tag->tag_name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>


                                        <ul>
                                            @foreach($post->category as $cat)
                                                <li>{{ $cat->category_name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/image/blog/{{ $post->photo }}" alt=""></td>

                                    <td>
                                        <a class="btn btn-primary" href="{{ route('edit.post',$post->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" href="{{ route('delete.post',$post->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Tag</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>












@endsection