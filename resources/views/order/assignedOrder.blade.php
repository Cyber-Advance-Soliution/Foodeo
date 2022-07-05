@extends('layouts.main-admin')

@section('title', 'Assigned Orders')

@section('content')
    <!-- /.modal -->

    <!-- /.modal -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> @yield('title') </h3>
                    @can('recieve-orders')
                        <div class="card-tools">
                            <a href="{{ route('recieve-orders') }}" class="btn btn-success btn-sm"> <i
                                    class="far fa-circle nav-icon"></i> Assigned Orders </a>
                        </div>
                    @endcan
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="assign-orders" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th> Reference No.</th>
                            <th> Rider Name</th>
                            <th> Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;

                        @endphp
                        @foreach($model as $key => $order)
                            @php
                                $orderReference = SiteHelper::orderReference($order->order_id);
                            @endphp
                            <tr id="{{ $key }}">
                                <td> {{ ++$i }} </td>

                                <td><a href="{{ route('view-order', ['id' => $order->id]) }}">{{$orderReference  }} </a>
                                </td>
                                <td>{{$order->rider->name}}</td>
                                <td> {{ $order->order->order_status }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th> #</th>
                            <th> Reference No.</th>
                            <th> Rider Name</th>
                            <th> Status</th>
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
        $("#assign-orders").DataTable();
    });
</script>

