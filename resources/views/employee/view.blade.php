@extends('layouts.main-admin')

@section('title', 'Staff')

@section('content')
	<div class="row">
		<div class="col-md-3">

		<!-- Profile Image -->
		<div class="card card-primary card-outline">
		  <div class="card-body box-profile">
			<div class="text-center">
			  <img class="profile-user-img img-fluid img-circle" src="{{ asset('admin') }}/assets/logo.png" alt="User profile picture">
			</div>

			<h3 class="profile-username text-center"> {{ $model->userDetail->name ? $model->userDetail->name : '' }} </h3>

			<p class="text-muted text-center"> {{ $model->userDetail->designation->designation_name ? $model->userDetail->designation->designation_name : '' }} </p>

		  </div>
		  <!-- /.card-body -->
		</div>
		<!-- /.card -->
	  </div>
	  <!-- /.col -->
	  <div class="col-md-9">
		<div class="card">
		  <div class="card-header p-2">
			<ul class="nav nav-pills">
			  <li class="nav-item"><a class="nav-link active" href="{{ route('edit-employee', ['id' => $model->id]) }}" > <i class="fa fa-edit"></i> Edit </a></li>
			</ul>
		  </div><!-- /.card-header -->
		  <div class="card-body">
			<div class="tab-content">
				<div class="tab-pane active" id="settings">
					<form class="form-horizontal">
						<div class="form-group row">
							<label for="inputName" class="col-sm-2 col-form-label"> Store </label>
							<div class="col-sm-10">
							  <input readonly type="email" class="form-control" value="{{ $model->userDetail->store->store_name }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputName" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-10">
							  <input readonly type="email" class="form-control" value="{{ $model->userDetail->name }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
							  <input readonly type="email" class="form-control" value="{{ $model->email }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputName2" class="col-sm-2 col-form-label"> Contact </label>
							<div class="col-sm-10">
							  <input readonly type="text" class="form-control" value="{{ $model->userDetail->phone_number }}">
							</div>
						</div>
					 
						<div class="form-group row">
							<label for="inputSkills" class="col-sm-2 col-form-label"> Address </label>
							<div class="col-sm-10">
							  <input readonly type="text" class="form-control" value="{{ $model->userDetail->address }}">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="permissions"> Permissions </label>
							</div>
							@foreach($assignedPermissions as $permission)
								
								<div class="col-md-4">
									<div class="form-group">
										<div class="form-check">
											<input onclick="return false;" class="form-check-input" type="checkbox" checked>
											<label class="form-check-label">  {{ ucwords($permission->name) }}</label>
										</div>
									</div>
								</div>
							
							@endforeach
						</div>
						
						<!--<div class="form-group row">
							<div class="offset-sm-2 col-sm-10">
							  <button type="submit" class="btn btn-danger">Submit</button>
							</div>
						</div>-->
					</form>
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
