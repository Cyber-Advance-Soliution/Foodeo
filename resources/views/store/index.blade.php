@extends('layouts.main-admin')

@section('title', 'Stores')

@section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Your Store Listed </h3>
				<div class="card-tools">
                	<a href="{{ route('new-store') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add Store </a>
				</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="stores" class="table table-bordered table-hover table-responsive">
                <thead>
                <tr>
					<th> # </th>
					<th>Store Name</th>
					<th>Status</th>
					<th>Store Thumbnail</th>
					<th>Visible Status </th>
					<th class="action-width">Actions</th>
                </tr>
                </thead>
                <tbody>
					@php $i = 0; @endphp
					@foreach($model as $key => $store)
					<tr>
						<td> {{ ++$i }} </td>
						<td> <a href="{{ route('store-view', ['id' => $store->id]) }}"> {{ $store->store_name }} </a></td>
						<td> {{ $store->status }} </td>
				
						<td> <img src="{{asset($store->store_thumbnail)}}" class="tbl-product-img"> </td>
						<td> {{ $store->visibility_status }} </td>
						<td class="action-width"> 
							<a href="{{ route('update-status', ['id' => $store->id]) }}" class="btn btn-block btn-{{ ($store->visible_status == 1) ? 'danger' : 'success' }} btn-flat"> <i class="fa {{ ($store->visible_status == 1) ? 'fa-eye-slash' : 'fa-eye' }}"></i> {{ ($store->visible_status == 1) ? 'Hide' : 'Visible' }} </a> 
							<a href="{{ route('store-edit', ['id' => $store->id]) }}" class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i> Edit </a> 
						</td>
					</tr>
					@endforeach
                </tbody>
                <tfoot>
					<tr>
						<th> # </th>
						<th>Store Name</th>
						<th>Status</th>
						<th>Store Thumbnail</th>
						<th>Visible Status </th>
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

<!-- page script -->
<script>
	$(function () {

		$(function () {
			$("#stores").DataTable();
		});
	
	});
</script>
 