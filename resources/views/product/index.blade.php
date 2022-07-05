@extends('layouts.main-admin')

@section('title', 'Products')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> All Product Listed </h3>
                    <div class="card-tools">
                        <a href="{{ route('new-product') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i>
                            Add Product </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="products" class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Product Name</th>
                            <th> Price</th>
                            <th>Store</th>
                            <th>Stock</th>
                            <th> Thumbnail</th>
                            <th>Status</th>
                            <th class="action-width">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0; @endphp
                        @foreach($model as $key => $product)
                            <tr>

                                <td> {{ ++$i }} </td>
                                <td>
                                    <a href="{{ route('product-view', ['id' => $product->id]) }}"> {{ $product->product_name }} </a>
                                </td>
                                <td> {{ $product->product_price }} </td>
                                <td> {{ $product->store->store_name }} </td>
                                <td>{{($product->status == 1)? 'Available':'Out of Stock'}}</td>
                                <td><img src="{{ $product->product_thumbnail }}" class="tbl-product-img"></td>
                                <td><a href="{{ route('product-update-status',$product->id)}}"
                                       class="btn btn-block btn-{{ ($product->status == 0) ? 'danger' : 'success' }} btn-flat">
                                        <i class="fa {{ ($product->status == 0) ? 'fa-eye-slash' : 'fa-eye' }}"></i> {{ ($product->status == 0) ? 'Out' : 'Available' }}
                                    </a></td>
                                <td class="action-width"><a href="{{ route('product-edit', ['id' => $product->id]) }}"
                                                            class="btn btn-block btn-primary btn-flat"> <i
                                            class="fa fa-edit"></i> Edit </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th> #</th>
                            <th>Product Name</th>
                            <th> Price</th>
                            <th> Store</th>
                            <th> Thumbnail</th>
                            <th class="action-width">Actions</th>
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
<!-- Bootstrap 4 -->
<script src="{{asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{asset('admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(function () {
        $('#products').DataTable();
        // {
        // "paging": true,
        // "searching": false,
        // "ordering": true,
        // "info": true,
        // "autoWidth": false,
        // "columns": [
        // { "width": "5%" },
        // { "width": "20%" },
        // { "width": "20%" },
        // { "width": "40%" },
        // null
        // ]
        // }
    });
</script>
