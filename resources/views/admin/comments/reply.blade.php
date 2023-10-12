@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="box" style="margin: 10px;">
        <div class="box-header with-border">
            <h3 class="box-title">Reply Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>UserName</th>
                        <th>Post Title</th>
                        <th>Comment</th>
                        <th>Reply</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $replies as $reply )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $reply->user->name }}</td>
                            <td>{{ $reply->post->title }}</td>
                            <td>{{ $reply->comment->comment }}</td>
                            <td>{{ $reply->reply }}</td>
                            <td>
                                @if($reply->status==true)
                                    <span class="badge badge-success">Approve</span>
                                @else
                                    <span class="badge badge-danger">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if($reply->status==true)
                                    <a class="btn btn-success" href="{{ route('status.update',$reply->id) }}"><i class="fa fa-thumbs-o-up"></i></a>
                                @else
                                    <a class="btn btn-warning" href="{{ route('status.update',$reply->id) }}"><i class="fa fa-thumbs-o-down"></i></a>
                                @endif
                                <a class="btn btn-danger" href="{{ route('reply.delete',$reply->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>UserName</th>
                        <th>Post Title</th>
                        <th>Comment</th>
                        <th>Reply</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>


















@endsection