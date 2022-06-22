@extends('layouts.main-admin')

@section('title', 'Riders')

@section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
			
              <h3 class="card-title"> Your Riders Listed </h3>
				<div class="card-tools">
					<a href="{{ route('new-rider') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add rider </a>
				</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="riders" class="table table-bordered table-hover table-responsive">
                <thead>
                <tr>
        					<th> # </th>
        					<th> Name </th>
                  <th> Username </th>
        					<th> Email</th>
        					<th> Contact </th>
        					
        					<th class="action-width"> Actions </th>
                </tr>
                </thead>
                <tbody>
          					@php $i = 0; @endphp
          					@foreach($model as $key => $rider)
          					<tr>
          						<td> {{ ++$i }} </td>
          						<td> <a href="{{ route('view-rider', ['id' => $rider->id]) }}">{{ $rider->riderDetail->name }} </a> </td>
          						<td> {{ $rider->username }} </td>
                      <td> {{ $rider->email }} </td>
          						<td> {{ $rider->riderDetail->phone_number }} </td>
          						<td class="action-width"> 
          							<a href="{{ route('edit-rider', ['id' => $rider->id]) }}" class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i> Edit </a> 
          						</td>
          					</tr>
          					@endforeach
                </tbody>
                <tfoot>
                <tr>
        					<th> # </th>
        					<th> Name </th>
                  <th> Username </th>
        					<th> Email</th>
        					<th> Contact </th>
        					
        					<th class="action-width"> Actions </th>
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
	
