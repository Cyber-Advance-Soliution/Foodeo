@extends('layouts.main-admin')

@section('title', 'Employees')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Your Employees Listed </h3>
                    <div class="card-tools">
                        <a href="{{ route('new-employee') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i>
                            Add Employee </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="employees" class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Contact</th>
                            <th> Designation</th>
                            <th class="action-width"> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0; @endphp
                        @foreach($model as $key => $employee)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td>
                                    <a href="{{ route('view-employee', ['id' => $employee->id]) }}">{{ $employee->userDetail->name }} </a>
                                </td>
                                <td> {{ $employee->email }} </td>
                                <td> {{ $employee->userDetail->phone_number }} </td>
                                <td> {{ $employee->userDetail->designation ? $employee->userDetail->designation->designation_name : 'Not available yet' }} </td>
                                <td class="action-width">
                                    <a href="{{ route('edit-employee', ['id' => $employee->id]) }}"
                                       class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i> Edit </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th> #</th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Phone Number</th>
                            <th> Designation</th>
                            <th class="action-width"> Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@stop
<!-- jQuery -->
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="{{asset('admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- page script -->
<script>
    $(function () {

        $('#employees').DataTable();
    });
</script>

