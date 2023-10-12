@extends('admin.dashboard.body.app')
@section('content')




    <div class="box" style="margin: 15px;">
        <div class="box-header with-border">
            <h3 class="box-title">Donation Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Photo</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($donation as $data)
                    <tr>
                        <td>{{ $data->first_name }}</td>
                        <td>{{ $data->last_name }}</td>
                        <td>{{ $data->country }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->donate }}$</td>
                        <td>{{ $data->currency }}</td>
                        <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/user/images/{{ $data->user->photo }}" alt=""></td>
                    </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Photo</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>





















@endsection