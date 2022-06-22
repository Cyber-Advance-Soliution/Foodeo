@extends('layouts.main-admin')

@section('title', 'Complaint')

@section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
				<h3 class="card-title"> Complaint Listed </h3>
				<div class="card-tools">
					
				</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="complaint" class="table table-bordered table-hover table-responsive">
                   <thead>
                     <tr>
                          <th> # </th>
                          {{-- <th>Order </th> --}}
                          <th>Complaint</th>
                          <th>Current Status</th>
                          <th>Status</th>
                          <th class="action-width"> Actions </th>
                     </tr>
                   </thead>
                  <tbody>
                        @php $i = 0; @endphp
                        @foreach($model as $key => $complaint)
                        <tr>
                          <td> {{ ++$i }} </td>
                          {{-- <td> {{ $complaint->order_id }} </td> --}}
                          <td>
                                @php
                                    if (strlen($complaint->message) > 20)
                                    echo substr($complaint->message, 0, 20) . '...';
                                    else {
                                      echo $complaint->message;
                                    }
                                @endphp
                          </td>
                          @php
                                $complaintarray=array('0'=>'On Hold','1'=>'In Process','2'=>'Solved');
                        @endphp
                          <td>
                              {{$complaintarray[$complaint->status]}}
                          </td>
                          <td> 
                            <div class="modal-body">
                              <div class="form-group">
                                <select class="form-control complaintStatus" data-id="{{$complaint->id}}" name="complaintStatus" style="width: 100%;">
                                  <option value="0" {{$complaint->status==0 ? 'selected':''}} > On Hold </option>
                                  <option value="1" {{$complaint->status==1 ? 'selected':''}} >In Process </option>
                                  <option value="2" {{$complaint->status==2 ? 'selected':''}} > Solved </option>
                                </select>
                              </div>
                             </div>
                         </td>
                         <td class="action-width"> 
                            <a href="{{route('complaintView',$complaint->id)}}" class="btn btn-block btn-primary btn-flat"> <i class="fa fa-edit"></i> View </a> 
                         </td>
                        </tr>
                        @endforeach
                    </tbody>
              <tfoot>
                <tr>
                  <th> # </th>
                  <th>Order </th>
                  <th>Complaint</th>
                  <th>Status</th>
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

    $('#complaint').DataTable();
  });
</script>
<script>
  $(document).ready(function(){
      $('.complaintStatus').change(function(){
          let statusid=$(this).val();
          let id = $(this).data('id');
          console.log(statusid);
          console.log(id);

       $.ajaxSetup({
               headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
              });
              //first ajax start
              $.ajax({
                type:'post',
                 url:"{{ route('complaintStatus') }}",
                 'data':{
                   'status':statusid,
                   'id':id,
                   'csrf-token':"{{csrf_token()}}"
                  
                 },
                 success:function(result){
                  location.reload();
                 }
               });
  
      });
    });
    </script>
	
