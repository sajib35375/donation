@extends('admin.dashboard.body.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="wrap" style="margin: 15px;">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Admin User Table</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $info)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $info->name }}</td>
                                <td>{{ $info->email }}</td>
                                <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/profile/{{ $info->photo }}" alt=""></td>
                                <td>
                                    @if($info->slider == 1)
                                        <span class="badge badge-primary">slider</span>
                                    @else
                                    @endif
                                        @if($info->about == 1)
                                            <span class="badge badge-info">about</span>
                                        @else
                                        @endif
                                        @if($info->couses == 1)
                                            <span class="badge badge-warning">courses</span>
                                        @else
                                        @endif
                                        @if($info->gallery == 1)
                                            <span class="badge badge-danger">gallery</span>
                                        @else
                                        @endif
                                        @if($info->team == 1)
                                            <span class="badge badge-dark">team</span>
                                        @else
                                        @endif
                                        @if($info->testimonial == 1)
                                            <span class="badge badge-light">testimonial</span>
                                        @else
                                        @endif
                                        @if($info->blog == 1)
                                            <span class="badge badge-secondary">blog</span>
                                        @else
                                        @endif
                                        @if($info->contact == 1)
                                            <span class="badge badge-success">contact</span>
                                        @else
                                        @endif
                                        @if($info->count_banner == 1)
                                            <span class="badge badge-primary">count banner</span>
                                        @else
                                        @endif
                                        @if($info->sponsor == 1)
                                            <span class="badge badge-success">sponsor</span>
                                        @else
                                        @endif
                                        @if($info->comments == 1)
                                            <span class="badge badge-primary">comments</span>
                                        @else
                                        @endif
                                        @if($info->events == 1)
                                            <span class="badge badge-primary">events</span>
                                        @else
                                        @endif
                                        @if($info->donation == 1)
                                            <span class="badge badge-primary">donation</span>
                                        @else
                                        @endif
                                        @if($info->admin_user == 1)
                                            <span class="badge badge-success">admin_user</span>
                                        @else
                                        @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.user.edit',$info->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('admin.user.delete',$info->id) }}">Delete</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>









@endsection