@extends('layouts.main-admin')

@section('title', $model->store_name)

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
                    <h3 class="d-inline-block d-sm-none"> Store Thumbnail </h3>
                    <div class="col-12">
                        <img id="image-view" src="/{{ $model->store_thumbnail }}" class="product-image"
                             alt="Product Image">
                    </div>
                    <hr>
                    <div class="col-12 product-image-thumbs">
                        @foreach($model->storeBanners as $store)
                            <div class="product-image-thumb"><img onclick="replaceImage(this.src)"
                                                                  src="/{{ $store->banner }}" alt="Product Image"></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $model->store_name }}</h3>
                <!--<strong> Email </strong>
					<p> {{ $model->store_email }} </p>
					<strong> Contact </strong>
					<p> {{ $model->store_contact }} </p>-->
                    <strong> Location </strong>
                    <p><a target="_blank"
                          href="{{ url('view-location', ['id' => $model->id]) }}"> {{ $storeAddress ? $storeAddress : 'Click here to view your store location.' }} </a>
                    </p>
                    <strong> Short Description </strong>
                    <p> {{ $model->short_description }} </p>
                    <strong> Long Description </strong>
                    <p> {{ $model->long_description }} </p>
                    <hr>

                    <table id="stores" class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th> Email</th>
                            <th> Contact</th>
                            <th> Status</th>
                            <th> Category</th>
                            <th> Type</th>
                            <th> Visibility</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td> {{ $model->store_email }} </td>
                            <td> {{ $model->store_contact }} </td>
                            <td> {{ $model->status }} </td>
                            <td> {{ $model->store_category }} </td>
                            <td> {{ $model->storeType->type }} </td>
                            <td> {{ $model->visibility_status }} </td>
                        </tr>

                        </tbody>


                    </table>

                </div>
            </div>

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
