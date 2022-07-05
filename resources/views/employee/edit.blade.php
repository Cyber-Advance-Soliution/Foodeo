@extends('layouts.main-admin')

@section('title', 'Update Employee')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"> Update Employee </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update-employee') }}" method="post" role="form">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $model->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label> Store </label>
                            <select class="form-control select2" name="store_id" style="width: 100%;">
                                <option value="" selected="selected"> -- Select Store --</option>
                                @foreach($stores as $store)
                                    <option
                                        value="{{ $store->id }}" {{ ($store->id == $model->userDetail->store_id) ? 'selected' : '' }}>{{ $store->store_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Name </label>
                            <input type="text" class="form-control" id="name" value="{{ $model->userDetail->name}}"
                                   name="name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label>Designation </label>
                            <select class="form-control select2" name="designation_id" style="width: 100%;">
                                <option value="" selected="selected"> -- Select Designation --</option>
                                @foreach($designations as $designation)
                                    <option
                                        value="{{ $designation->id }}" {{ ($designation->id == $model->userDetail->designation_id) ? 'selected' : '' }}>{{ $designation->designation_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="text" class="form-control" id="email" value="{{ $model->email }}" name="email"
                                   placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber"> Phone Number </label>
                            <input type="text" class="form-control" id="phone_number"
                                   value="{{ $model->userDetail->phone_number }}" name="phone_number"
                                   placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber"> Address </label>
                            <input type="text" class="form-control" id="address"
                                   value="{{ $model->userDetail->address }}" name="address" placeholder="Enter Address">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="permissions"> Assign Permissions </label>
                            </div>

                            @foreach($permissions as $permission)

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="permissions"
                                                   name="permissions[]"
                                                   value="{{ $permission->name }}" <?= (in_array($permission->name, $userPermissions)) ? 'checked' : '' ?>>
                                            <label class="form-check-label">  {{ ucwords($permission->name) }}</label>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
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
