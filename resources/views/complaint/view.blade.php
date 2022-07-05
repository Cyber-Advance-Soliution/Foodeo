@extends('layouts.main-admin')

@section('title', 'Complaint')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="" style="   border: 0.01px outset #F3DFDB ;height:320px; overflow-y:auto;">
                @foreach ($model as $item)
                    <p>&nbsp;&nbsp;
                        @php
                            echo wordwrap($item->message,100,"<br>\n");
                        @endphp
                    </p>
                @endforeach

            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-4">
            <div class="card">

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">


                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input readonly type="email" class="form-control"
                                           value="{{$Customer_info->username}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input readonly type="email" class="form-control"
                                           value="{{$Customer_info->phone_number}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Email </label>
                                <div class="col-sm-10">
                                    <input readonly type="email" class="form-control" value="{{$Customer_info->email}}">
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@stop
<!-- jQuery -->
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
