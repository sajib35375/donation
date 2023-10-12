@extends('admin.dashboard.body.app')
@section('content')



    <div class="box box-widget widget-user" style="margin: 10px;">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url('{{ URL::to('') }}/images/gallery/full/10.jpg') center center;">
            <h3 style="color: grey;" class="widget-user-username">{{ $admin_data->name }}</h3>
            <a class="btn btn-secondary float-right" href="{{ route('profile.edit') }}">Edit</a>
            <h6 style="color: grey;" class="widget-user-desc">{{ $admin_data->email }}</h6>
        </div>
        <div class="widget-user-image">
            <img class="rounded-circle" src="{{ URL::to('') }}/admin/profile/{{ $admin_data->photo }}" alt="User Avatar">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">12K</h5>
                        <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 br-1 bl-1">
                    <div class="description-block">
                        <h5 class="description-header">550</h5>
                        <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">158</h5>
                        <span class="description-text">TWEETS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>



















@endsection