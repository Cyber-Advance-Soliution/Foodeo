@extends('layouts.main-admin')

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
                    <table id="history-orders" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th> Reference No.</th>
                            <th> Sub Total</th>
                            <th> Grand Total</th>
                            <th>Order Type</th>
                            <th> Status</th>

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
                                <th>{{ ($order->home_delivery==1)? 'home delivery':'pickup'}}</th>

                                <td> {{ $order->order_status }} </td>

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


<script>
    $(function () {
        $("#history-orders").DataTable();
    });
</script>
