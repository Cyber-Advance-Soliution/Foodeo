@extends('layouts.main-admin')

@section('title', 'Category')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"> Add Category </h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{ route('create-category') }}" id="create-category-form" method="post" role="form" enctype="multipart/form-data">
					@csrf 
					<div class="card-body">
						<div class="form-group">
							<label> Store </label>
							<select class="form-control select2" name="store_id" style="width: 100%;">
								<option value="" selected="selected"> -- Select Store -- </option>
								@foreach($stores as $store)
									<option value="{{ $store->id }}">{{ $store->store_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1"> Category Name </label>
							<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name">
						</div>
						
						<div class="form-group">
							<label for="CategoryIcon"> Category Icon </label>
							
							<div class="custom-file mb-2">
								<input type="file" class="custom-file-input" id="category_icon" name="category_icon">
								<label class="custom-file-label" id="category_icon_label" for="category_icon_label">Choose Icon</label>
							</div>
						</div>
					</div>
					
					<div class="card-footer text-right">
						<button type="submit" class="btn btn-success btn-lg">Save</button>
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

{!! JsValidator::formRequest('App\Http\Requests\CategoryRequest') !!}
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#create-category-form').submit(function(e) {
			var loading = $('#loader');
			
			if($(this).valid()) {
				loading.show();
			} else {
				loading.hide();
			}
		});
		$("#category_icon").change(function(e) {
			var fileName = e.target.files[0].name;
			$('#category_icon_label').html(fileName);
		});
		
	});
	
</script>
