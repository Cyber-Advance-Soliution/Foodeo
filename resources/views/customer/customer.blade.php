@extends('layouts.main-admin')

@section('title', ' customer')

@section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
			
              <h3 class="card-title"> Customer Listed </h3>
				<div class="card-tools">
					{{-- <a  class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Add Coupon</a> --}}
				</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="walletTable" class="table table-bordered table-hover table-responsive">
                <thead>
                <tr>
        					<th> # </th>
        					<th>Name</th>
        					<th>Phone</th>
        					<th>Email</th>
                  <th>Blance</th>
        					<th class="action-width"> Actions </th>
                </tr>
                </thead>
                <tbody>
          					@php $i = 0; 
                    $plsdebit=0;
                    $subcredit=0;
                    $current_blance=0;
                    @endphp
          					@foreach($model as $models)
                    
          					<tr>
          						<td> {{ ++$i }} </td>
          						<td> {{isset($models->username)? $models->username:''}}</td>
          						<td> {{isset($models->phone_number)? $models->phone_number:'' }} </td>
                      <td> {{ isset($models->email)?  $models->email:'' }} </td>
                      @foreach ($models->wallet as $item)
                      @php
                      $plsdebit+=$item->debit;
                      $subcredit+=$item->credit;
                      $current_blance=$plsdebit-$subcredit;
                      @endphp
                      @endforeach
                      <td> {{ $current_blance==0 ?  0:$current_blance }} </td>
          						<td class="action-width"> 
          							<a href="{{ route('debit-wallet', ['id' => $models->id]) }}" class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i> Debit </a> 
                        <a href="{{ route('edit-wallet', ['id' => $models->id]) }}" class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i>Edit</a> 
          						</td>
          					</tr>@php
                        
                    $plsdebit=0;
                    $subcredit=0;
                    $current_blance=0;
                    @endphp

          					@endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th> # </th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Blance</th>
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

    $('#walletTable').DataTable();
  });
</script>
	
