@extends('layouts.main-admin')

@section('title', 'Update Rider')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"> Update Rider </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update-rider') }}" method="post" role="form">
                    @csrf
                    <input type="hidden" name="rider_id" value="{{ $model->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label> Store </label>
                            <select class="form-control select2" name="store_id" style="width: 100%;">
                                <option value="" selected="selected"> -- Select Store --</option>
                                @foreach($stores as $store)
                                    <option
                                        value="{{ $store->id }}" {{ ($store->id == $model->store_id) ? 'selected' : '' }}>{{ $store->store_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Full Name </label>
                            <input type="text" class="form-control" id="name" value="{{ $model->riderDetail->name}}"
                                   name="name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="text" class="form-control" id="email" value="{{ $model->email }}" name="email"
                                   placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber"> Phone Number </label>
                            <input type="text" class="form-control" id="phone_number"
                                   value="{{ $model->riderDetail->phone_number }}" name="phone_number"
                                   placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber"> Address </label>
                            <input type="text" class="form-control" id="address"
                                   value="{{ $model->riderDetail->address }}" name="address"
                                   placeholder="Enter Address">
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success btn-lg"> Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
    </div>
@stop
<!-- Javascript Requirements -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\EmployeeRequest') !!}
