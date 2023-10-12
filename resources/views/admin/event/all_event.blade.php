@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>





    <div class="wrap" style="margin: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Event</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Quote</th>
                                    <th>CountDown</th>
                                    <th>Photo</th>
                                    <th width="20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($event as $data)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{!! Str::of($data->description)->words(20) !!}</td>
                                        <td>{{ $data->quote }}</td>
                                        <td>{{ $data->countdown }}</td>
                                        <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/image/event/{{ $data->photo }}" alt=""></td>

                                        <td>
                                            <a class="btn btn-primary" href="{{ route('event.edit',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" href="{{ route('event.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Quote</th>
                                    <th>CountDown</th>
                                    <th>Photo</th>
                                    <th width="20%">Action</th>
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