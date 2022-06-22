@extends('layouts.main-admin')

@section('title', 'Customers')

@section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Your Customers Listed </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="employees" class="table table-bordered table-hover">
                <thead>
                <tr>
					<th> # </th>
					<th> Name </th>
					<th> Phone Number </th>
					<th> Actions </th>
                </tr>
                </thead>
                <tbody>
					@php $i = 0; @endphp
         
					@foreach($customers as $key => $customer)
					<tr>
						<td> {{ ++$i }} </td>
						<td> {{ $customer->username }} </td>
						<td> {{ $customer->phone_number }} </td>
						<th></td>
					</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th> # </th>
					<th> Name </th>
					<th> Phone Number </th>
					<th> Actions </th>
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

    $('#employees').DataTable({
      "paging": true,
       "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
		"columns": [
			{ "width": "5%" },
			{ "width": "20%" },
			{ "width": "20%" },
			{ "width": "40%" },
			null
		]
    });
  });
</script>
	
