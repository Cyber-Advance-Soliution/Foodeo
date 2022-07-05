@extends('layouts.main-admin')

@section('title', $model->product_name)

@section('content')
    <style>
        .product-image {
            max-width: 100%;
            height: 324px;
            width: 100%;
            object-fit: cover;
        }
    </style>
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"> Product Thumbnail </h3>
                    <div class="col-12">
                        <img id="image-view" src="/{{ $model->product_thumbnail }}" class="product-image"
                             alt="Product Image">
                    </div>
                    <hr>
                    <div class="col-12 product-image-thumbs">
                        @foreach($model->productBanners as $product)
                            <div class="product-image-thumb active"><img onclick="replaceImage(this.src)"
                                                                         src="/{{ $product->banner }}"
                                                                         alt="Product Image"></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $model->product_name }}</h3>

                    <strong> Store </strong>
                    <p> {{ $model->store->store_name }} </p>

                    <strong> Short Description </strong>
                    <p> {{ $model->short_description }} </p>

                    <strong> Long Description </strong>
                    <p> {{ $model->long_description }} </p>

                    <hr>

                    <strong> Product Attribute </strong>

                    <br>
                    <br>
                    <div class="row">
                        @foreach($model->productAttributes as $attribute)
                            <div class="col-md-6">
                                <strong> {{ $attribute['attribute_name'] }} </strong>

                                @foreach($attribute->options as $key => $option )
                                    <div class="row">
                                        <div class="col-md-9"> {{ $option['option'] }}  </div>
                                        <div class="col-md-3"> {{ $option['value'] }} </div>
                                    </div>
                                @endforeach
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        <!--<div class="row mt-4">
				<nav class="w-100">
				  <div class="nav nav-tabs" id="product-tab" role="tablist">
					<a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Description</a>
					<a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
					<a class="nav-item nav-link active" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="true">Rating</a>
				  </div>
				</nav>
				<div class="tab-content p-3" id="nav-tabContent">
					<div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
						{{ $model->long_description }}
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
{{ $model->long_description }}
            </div>
            <div class="tab-pane fade active show" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
{{ $model->long_description }}
            </div>
        </div>
    </div>->
</div>
<!-- /.card-body -->
        </div>
    @stop
    <!-- jQuery -->
        <script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
        <script>
            function replaceImage(src) {
                document.getElementById('image-view').src = src;
            }
        </script>
