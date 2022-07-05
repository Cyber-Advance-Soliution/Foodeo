@extends('layouts.main-admin')

@section('title', ' Coupon')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title"> Coupon Listed </h3>
                    <div class="card-tools">
                        <a href="{{ route('create-coupon') }}" class="btn btn-success btn-sm"> <i
                                class="fa fa-plus"></i> Add Coupon</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="riders" class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Assign</th>
                            <th>Status</th>
                            <th class="action-width"> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0; @endphp
                        @foreach($model as $coupon)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{isset($coupon->code)? $coupon->code:''}}</td>
                                <td> {{isset($coupon->type)? $coupon->type:'' }} </td>
                                <td> {{ isset($coupon->value)?  $coupon->value:'' }} </td>
                                <td> {{($coupon->Assigned==0)? 'Not assign':'assinged'}} </td>
                                <td> {{($coupon->status==0)? 'Not use':'used'}} </td>

                                <td class="action-width">
                                    <a href="{{ route('edit-coupon', ['id' => $coupon->id]) }}"
                                       class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i> Edit </a>
                                    <a href="{{ route('delete-coupon', ['id' => $coupon->id]) }}"
                                       class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th> #</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Assign</th>
                            <th>Status</th>

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

        $('#riders').DataTable();
    });
</script>

