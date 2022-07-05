@extends('layouts.main-employee')

@section('title', 'Orders')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> @yield('title') </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="recieved-orders" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th> Reference No.</th>
                            <th> Sub Total</th>
                            <th> Grand Total</th>
                            <th> Status</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0; @endphp
                        @foreach($model as $key => $order)
                            <tr id="{{ $key }}">
                                <td> {{ ++$i }} </td>
                                <td>
                                    <a href="{{ route('view-order', ['id' => $order->id]) }}"> {{ $order->order_reference }} </a>
                                </td>
                                <td> {{ $order->sub_total }} </td>
                                <td> {{ $order->grand_total }} </td>
                                <td> {{ $order->order_status }} </td>
                                <td>
                                    <a href="javascript://" onclick="statusList({{ $order->id }})" id="{{ $key }}"
                                       class="btn btn-block btn-success btn-flat"> <i class="fa fa-check"></i> Accept
                                    </a>
                                    <a href="javascript://" onclick="updateOrder({{ $order->id }}, 10, this.id)"
                                       id="{{ $key }}" class="btn btn-block btn-danger btn-flat"> <i
                                            class="fa fa-times"></i> Reject </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th> #</th>
                            <th> Reference No.</th>
                            <th> Sub Total</th>
                            <th> Grand Total</th>
                            <th> Status</th>
                            <th> Actions</th>
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
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        $("#recieved-orders").DataTable();
    });

    function updateOrder(order_id, status, id) {
        var rowId = id;
        var orderStatus = status;
        var orderId = order_id;
        $.ajax({
            type: 'post',
            url: "{{ route('update-status') }}",
            data: {'order_id': orderId, 'order_status': orderStatus},
            success: function (res) {
                var response = $.parseJSON(res);
                if (response.status == 1) {
                    $('#' + rowId).fadeOut(1000);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function statusList(order_id) {
        var orderId = order_id;
        $.ajax({
            type: 'post',
            url: "{{ route('status-list') }}",
            data: {'order_id': orderId},
            success: function (res) {
                $('#order-status').html(res);
                $('#order_id').val(orderId);

                $('#modal-default').modal('show');
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

</script>
