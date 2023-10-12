@extends('admin.dashboard.body.app')
@section('content')


<div class="wrap" style="margin: 15px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Admin Change Password</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('change.password') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input name="old_password" class="form-control" type="password">
                            @error('old_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input name="password" class="form-control" type="password">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password Confirmation</label>
                            <input name="password_confirmation" class="form-control" type="password">

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