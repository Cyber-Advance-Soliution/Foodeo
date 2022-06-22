@extends('layouts.main-admin')

@section('title', 'Update Prodcut')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"> {{ $model->product_name }} </h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{ route('update-product') }}" method="post" role="form" id="create-product-form" enctype="multipart/form-data">
					@csrf 
					
					<input type="hidden" name="product_id" value="{{ $model->id }}">
					<div class="card-body">
						<div class="form-group">
							<label> Store </label>
							<select class="form-control select2" onchange="store_product_categories(this.value)" name="store_id" style="width: 100%;">
								<option value=""> -- Select Store -- </option>
								@foreach($stores as $store)
									<option value="{{ $store->id }}" {{ ($model->store_id == $store->id) ? 'selected' : '' }} >{{ $store->store_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Product Category</label>
							<select class="form-control select2" id="product_category_id" name="product_category_id" style="width: 100%;">
								<option value=""> -- Select Product Category -- </option>
								@foreach($productCategories as $category)
									<option value="{{ $category->id }}" {{ ($model->product_category_id == $category->id) ? 'selected' : '' }} >{{ $category->category_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1"> Product Name </label>
							<input type="text" class="form-control" id="product_name" value="{{ $model->product_name }}" name="product_name" placeholder="Enter Product Name">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Product Price </label>
							<input type="text" class="form-control" id="product_price" value="{{ $model->product_price }}" name="product_price" placeholder="Enter Product Price">
						</div>
						<div class="form-group">
							<label>Short Description</label>
							<input class="form-control" id="short_description" name="short_description" value="{{ $model->short_description }}" placeholder="Enter Short Description">
						</div>
						<div class="form-group">
							<label>Long Description</label>
							<input class="form-control" id="long_description" name="long_description" value="{{ $model->long_description }}" placeholder="Enter Long Description">
						</div>
						
						<div class="form-group">
							<label for="ProductThumbnail"> Product Thumbnail </label>
							<div class="custom-file mb-2">
								<input type="file" class="custom-file-input" id="product_thumbnail" name="product_thumbnail">
								<label class="custom-file-label" id="product_thumbnail_label" for="exampleInputFile">Choose Thumbnail</label>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="product-image-thumb"><img id="image-view" src="/{{ $model->product_thumbnail }}" class="product-image" alt="Product Image"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="ProductBanner"> Product Banner </label>
							<div class="custom-file mb-2">
								<input type="file" class="custom-file-input" id="product_banners" name="product_banners[]" multiple>
								<label class="custom-file-label" id="product_banners_labels" for="exampleInputFile">Choose Banners</label>
							</div>
						</div>
						<div class="row">
							<div class="col-12 product-image-thumbs">
								@foreach($model->productBanners as $product)
									<div class="product-image-thumb"><img src="/{{ $product->banner }}" alt="Product Image"></div>
								@endforeach
							</div>
						</div>
					</div>
					
					<div class="update-attribute">
					@foreach($model->productAttributes as $parentKey => $attribute)
					
						<div class="form-group" style="padding: 20px 20px" id="card{{ $parentKey }}">
							<div class="product-attribute" >
								<div class="card card-success">
									<div class="card-header">
										<h3 class="card-title"> Update Attribute </h3>

										<div class="card-tools">
										  <button type="button" class="btn btn-tool"> &nbsp; </button>
										  @if($parentKey > 0)
											<button type="button" class="btn btn-tool btn_remove" id="{{ $parentKey }}"><i class="fas fa-minus"></i></button>
										  @endif
										  <button type="button" class="btn btn-tool" onclick="addCard()" id="add"><i class="fas fa-plus"></i></button>
										</div>
									</div>
									<!-- /.card-header -->
									<div class="card-body attribute-option-{{ $parentKey }}">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="exampleInputPassword1"> Name </label>
													<input type="text" class="form-control" value="{{ $attribute->attribute_name }}" id="attribute_name" name="attribute_name[]" placeholder="Enter Name">
												</div>											
											</div>
										</div>
									
										@foreach($attribute->options as $key => $option )
											<div class="row" id="row{{ $key }}">
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputPassword1"> Option </label>
														<input type="text" class="form-control" id="option" value="{{ $option['option'] }}" name="option[{{ $parentKey }}][]" placeholder="Enter Type">
													</div>											
												</div>		
												<div class="col-md-5">
													<div class="form-group">
														<label for="exampleInputPassword1"> Value </label>
														<input type="text" class="form-control" id="option_value" value="{{ $option['value'] }}" name="option_value[{{ $parentKey }}][]" placeholder="Enter Value">
													</div>	 
													<!-- /.col -->
												</div>
												@if($key == 0)
													<div class="col-md-1">
														<label for="exampleInputPassword1">  &nbsp; </label>
														<button type="button" onclick="addOption(this.id)" id="{{ $parentKey }}" class="btn btn-success btn-md"><i class="fas fa-plus"></i></button>
													</div>
												@else
													<div class="col-md-1"> 
														<label for="exampleInputPassword1">  &nbsp; </label> 
														<button type="button" id="{{ $key }}" class="btn btn-success btn-md btn_remove_one"><i class="fas fa-minus"></i></button> 
													</div> 
												@endif
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					
					@endforeach
					</div>
					<!-- /.card-body -->

					<div class="card-footer text-right">
						<button type="submit" class="btn btn-success btn-lg"> Update </button>
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
	
	var i = {{ count($model->productAttributes) }};
	var j = {{ count($attribute->options) }};
	
	function addCard() {
	    
	   $('.update-attribute').append('<div class="form-group" style="padding: 20px 20px"><div class="card card-success" id="card' + i +'"> \
			<div class="card-header"> \
				<h3 class="card-title"> New Attribute </h3> \
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
							<label for="exampleInputPassword1"> Option </label> \
							<input type="text" class="form-control" id="option" name="option['+i+'][]" placeholder="Enter Option"> \
						</div> \
					</div> 	\
					<div class="col-md-5"> \
						<div class="form-group"> \
							<label for="exampleInputPassword1"> Value </label> \
							<input type="text" class="form-control" id="option_value" name="option_value['+i+'][]" placeholder="Enter Value"> \
						</div>	 \
					</div> \
					<div class="col-md-1"> \
						<label for="exampleInputPassword1">  &nbsp; </label> \
						<button type="button" onclick="addOption(this.id)" id="'+ i +'" class="btn btn-success btn-md"><i class="fas fa-plus"></i></button> \
					</div> \
				</div> \
			</div> \
		</div></div>'); 
		i++; 
	}
	
	function addOption(attributeId) {
		var k = i-1;
		$('.attribute-option-' + attributeId).append('<div class="row" id="row'+ j + '"> \
			<div class="col-md-6"> \
				<div class="form-group"> \
					<label for="exampleInputPassword1"> Option </label> \
					<input type="text" class="form-control" id="option" name="option['+k+'][]" placeholder="Enter Option"> \
				</div> \
			</div> \
			<div class="col-md-5"> \
				<div class="form-group"> \
					<label for="exampleInputPassword1"> Value </label> \
					<input type="text" class="form-control" id="option_value" name="option_value['+k+'][]" placeholder="Enter Value"> \
				</div>	\
			</div> \
			<div class="col-md-1"> \
				<label for="exampleInputPassword1">  &nbsp; </label> \
				<button type="button" id="'+ j +'" class="btn btn-success btn-md btn_remove_one"><i class="fas fa-minus"></i></button> \
			</div> \
		</div>');
		
		j++;
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
