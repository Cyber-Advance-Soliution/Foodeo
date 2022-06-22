@extends('layouts.main-admin')

@section('title', 'Product')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"> Add Product </h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{ route('create-product') }}" method="post" role="form" id="create-product-form" enctype="multipart/form-data">
					@csrf 
					<div class="card-body">
						<div class="form-group">
							<label> Store </label>
							<select class="form-control select2" onchange="store_product_categories(this.value)" name="store_id" style="width: 100%;">
								<option value="" selected="selected"> -- Select Store -- </option>
								@foreach($stores as $store)
									<option value="{{ $store->id }}">{{ $store->store_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Product Category</label>
							<select class="form-control select2" id="product_category_id" name="product_category_id" style="width: 100%;">
								<option value="" selected="selected"> -- Select Product Category -- </option>
								@foreach($productCategories as $category)
									<option value="{{ $category->id }}">{{ $category->category_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1"> Product Name </label>
							<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Product Price </label>
							<input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price">
						</div>
						<div class="form-group">
							<label>Short Description</label>
							<input class="form-control" id="short_description" name="short_description" placeholder="Enter Short Description">
						</div>
						<div class="form-group">
							<label>Long Description</label>
							<input class="form-control" id="long_description" name="long_description" placeholder="Enter Long Description">
						</div>
						
						<div class="form-group">
							<label for="ProductThumbnail"> Product Thumbnail </label>
							<div class="custom-file mb-2">
								<input type="file" class="custom-file-input" id="product_thumbnail" name="product_thumbnail">
								<label class="custom-file-label" id="product_thumbnail_label" for="exampleInputFile">Choose Thumbnail</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="ProductBanner"> Product Banner </label>
							<div class="custom-file mb-2">
								<input type="file" class="custom-file-input" id="product_banners" name="product_banners[]" multiple>
								<label class="custom-file-label" id="product_banners_labels" for="exampleInputFile">Choose Banners</label>
							</div>
						 </div>
					</div>
					
					<div class="form-group" style="padding: 20px 20px">
						<div class="product-attribute" >
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title"> Add Attribute </h3>

									<div class="card-tools">
									  <button type="button" class="btn btn-tool"> &nbsp; </button>
									  <button type="button" class="btn btn-tool" onclick="addCard()" id="add"><i class="fas fa-plus"></i></button>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body attribute-option-0">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="exampleInputPassword1"> Name </label>
												<input type="text" class="form-control" id="attribute_name" name="attribute_name[]" placeholder="Enter Name">
											</div>											
										</div>
										<hr>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1"> Option </label>
												<input type="text" class="form-control" id="option" name="option[0][]" placeholder="Enter Option">
											</div>											
										</div>		
										<div class="col-md-5">
											<div class="form-group">
												<label for="exampleInputPassword1"> Value </label>
												<input type="text" class="form-control" id="option_value" name="option_value[0][]" placeholder="Enter Option Value">
											</div>	 
											<!-- /.col -->
										</div>
										<div class="col-md-1">
											<label for="exampleInputPassword1">  &nbsp; </label>
											<button type="button" onclick="addOption(this.id)" id="0" class="btn btn-success btn-md"><i class="fas fa-plus"></i></button>
										</div>
									<!-- /.row -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card-body -->

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

{!! JsValidator::formRequest('App\Http\Requests\ProductRequest') !!}
<script type="text/javascript">
	$(document).ready(function(){
		$('#create-product-form').submit(function(e) {
			var loading = $('#loader');
			
			if($(this).valid()) {
				loading.show();
			} else {
				loading.hide();
			}
		});
		
		$("#product_thumbnail").change(function(e) {
			var fileName = e.target.files[0].name;
			$('#product_thumbnail_label').html(fileName);
		});
		
		$("#product_banners").change(function(e) {
			$('#product_banners_labels').text(this.files.length + " files selected");
		});
		
	});
	
	var i=0;
	var j=0;

	function addCard() {
	   i++;  
	   $('.product-attribute').append('<div class="card card-success" id="card' + i +'"> \
			<div class="card-header"> \
				<h3 class="card-title"> Add Attribute </h3> \
				<div class="card-tools"> \
				  <button type="button" class="btn btn-tool btn_remove" id="'+ i + '"><i class="fas fa-minus"></i></button> \
				  <button type="button" class="btn btn-tool" onclick="addCard()"><i class="fas fa-plus"></i></button> \
				</div> \
			</div> \
			<div class="card-body attribute-option-'+ i +'"> \
				<div class="row"> \
					<div class="col-md-12"> \
						<div class="form-group"> \
							<label for="exampleInputPassword1"> Name </label> \
								<input type="text" class="form-control" id="attribute_name" name="attribute_name[]" placeholder="Enter Name"> \
						</div> \
					</div> 	\
					<hr> 	\
					<div class="col-md-6"> \
						<div class="form-group"> \
							<label for="exampleInputPassword1"> Type </label> \
							<input type="text" class="form-control" id="option" name="option['+i+'][]" placeholder="Enter Option"> \
						</div> \
					</div> 	\
					<div class="col-md-5"> \
						<div class="form-group"> \
							<label for="exampleInputPassword1"> Value </label> \
							<input type="text" class="form-control" id="option_value" name="option_value['+i+'][]" placeholder="Enter Option Value"> \
						</div>	 \
					</div> \
					<div class="col-md-1"> \
						<label for="exampleInputPassword1">  &nbsp; </label> \
						<button type="button" onclick="addOption(this.id)" id="'+ i +'" class="btn btn-success btn-md"><i class="fas fa-plus"></i></button> \
					</div> \
				</div> \
			</div> \
		</div>');  
	}

	function addOption(attributeId) {
		j++;

		$('.attribute-option-' + attributeId).append('<div class="row" id="row'+ j + '"> \
			<div class="col-md-6"> \
				<div class="form-group"> \
					<label for="exampleInputPassword1"> Type </label> \
					<input type="text" class="form-control" id="option" name="option['+i+'][]" placeholder="Enter Type"> \
				</div> \
			</div> \
			<div class="col-md-5"> \
				<div class="form-group"> \
					<label for="exampleInputPassword1"> Value </label> \
					<input type="text" class="form-control" id="option_value" name="option_value['+i+'][]" placeholder="Enter Value"> \
				</div>	\
			</div> \
			<div class="col-md-1"> \
				<label for="exampleInputPassword1">  &nbsp; </label> \
				<button type="button" id="'+ j +'" class="btn btn-success btn-md btn_remove_one"><i class="fas fa-minus"></i></button> \
			</div> \
		</div>');
	}

	$(document).on('click', '.btn_remove', function(){  
	    var button_id = $(this).attr("id");   
		$('#card'+button_id+'').remove();  
	});

	$(document).on('click', '.btn_remove_one', function(){ 
	    var button_id = $(this).attr("id");   
	    $('#row'+button_id+'').remove();  
	}); 
	
	function store_product_categories(storeId)
	{
		$.ajax({
			type : 'get',
			url: "{{ route('store-categories') }}",
			data : {'store_id' : storeId},
			success : function(response) {
				$('#product_category_id').html(response);
			},
			error : function(error) {
				console.log(error);
			}
		});
	}

</script>
