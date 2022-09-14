@extends('layouts.main-admin')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> All Categories Listed </h3>
                    <div class="card-tools">
                        <a href="{{ route('new-category') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i>
                            Add Category </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table style="width:100%" id="categories" class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Category Name</th>
                            <th>Store Name</th>
                            <th> Created By</th>
                            <th>Category Icon</th>
                            <th class="action-width">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0; @endphp
                        @foreach($model as $key => $category)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $category->category_name }} </td>
                                <td> {{ $category->store->store_name??'' }} </td>
                                <td> {{ $category->user->username }} </td>


                                <td><img src="{{ asset($category->category_icon)}}" class="tbl-product-img"></td>
                                <td class="action-width"><a href="{{ route('category-edit', ['id' => $category->id]) }}"
                                                            class="btn btn-block btn-success" title="Edit Category"><i
                                            class="fa fa-edit"></i> Edit </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th> #</th>
                            <th>Category Name</th>
                            <th>Store Name</th>
                            <th> Created By</th>
                            <th>Category Icon</th>
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
<!-- DataTables -->
<script src="{{asset('admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(function () {

        $('#categories').DataTable();
    });
</script>
