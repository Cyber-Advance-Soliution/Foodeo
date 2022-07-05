@extends('layouts.main-admin')

@section('title', 'Store')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"> Add Store </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update-store') }}" method="post" id="update-store-form" role="form"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="store_id" value="{{ $model->id }}">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Store Name </label>
                            <input type="text" class="form-control" id="store_name" name="store_name"
                                   value="{{ $model->store_name }}" placeholder="Enter Store Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Store Email </label>
                            <input type="text" class="form-control" id="store_email" name="store_email"
                                   placeholder="Enter Store Email" value="{{ $model->store_email }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Store Contact </label>
                            <input type="text" class="form-control" id="store_contact" name="store_contact"
                                   placeholder="Enter Store Contact" value="{{ $model->store_contact }}">
                        </div>

                        <div class="form-group">
                            <label>Store Category</label>
                            <select class="form-control select2" name="store_category_id" style="width: 100%;">
                                <option selected="selected"> -- Select Store Category --</option>
                                @foreach($storeCategories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ ($model->store_category_id == $category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Store Type</label>
                            <select class="form-control select2" name="store_type_id" style="width: 100%;">
                                <option value="" selected="selected"> -- Select Store Type --</option>
                                @foreach($storeTypes as $storeType)
                                    <option
                                        value="{{ $storeType->id }}" {{ ($model->store_type_id == $storeType->id) ? 'selected' : '' }}>{{ $storeType->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Short Description</label>
                            <input type="text" class="form-control" id="short_description" name="short_description"
                                   value="{{ $model->short_description }}" placeholder="Enter Short Description...">
                        </div>

                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea class="form-control" id="long_description" name="long_description" rows="2"
                                      placeholder="Enter Long Description..."> {{ $model->long_description }} </textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       onclick="valueCheck(this.id, this.value)" id="cash_on_delivery"
                                       name="cash_on_delivery"
                                       value="{{ $model->cash_on_delivery }}" {{ ($model->cash_on_delivery == 1) ? 'checked' : '' }}>
                                <label class="form-check-label"> Cash On Delivery </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       onclick="valueCheck(this.id, this.value)" id="customer_pickup"
                                       name="customer_pickup"
                                       value="{{ $model->customer_pickup }}" {{ ($model->customer_pickup == 1) ? 'checked' : '' }}>
                                <label class="form-check-label"> Customer Pickup </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       onclick="valueCheck(this.id, this.value)" id="delivery_to_customer"
                                       name="delivery_to_customer"
                                       value="{{ $model->delivery_to_customer }}" {{ ($model->delivery_to_customer == 1) ? 'checked' : '' }}>
                                <label class="form-check-label"> Delivery To Customer</label>
                            </div>
                        </div>

                        <div class="form-group"
                             id="delivery_charges" {{ ($model->delivery_to_customer == 0) ? 'hidden' : '' }}>
                            <label for="exampleInputPassword1"> Delivery Charges </label>
                            <input type="text" class="form-control" id="delivery_charges" name="delivery_charges"
                                   value="{{ $model->delivery_charges }}" placeholder="Enter Delivery Charges">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile"> Location </label>
                            <input id="locations_filter" name="location" type="text" value="{{ $storeAddress }}"
                                   class="form-control" placeholder="Location"/>
                            <input type="hidden" name="latitude" id="latitude" value="{{ $model->latitude }}">
                            <input type="hidden" name="longitude" id="longitude" value="{{ $model->longitude }}">
                            <input type="hidden" name="location_search_filter" id="location_search_filter" value="0">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Store Thumbnail </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="store_thumbnail"
                                           name="store_thumbnail">
                                    <label class="custom-file-label" id="store_thumbnail_label"
                                           for="store_thumbnail_label">Choose Thumbnail</label>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-image-thumb"><img id="image-view"
                                                                      src="/{{ $model->store_thumbnail }}"
                                                                      class="product-image" alt="Product Image"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Store Banners </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="store_banners"
                                           name="store_banners[]" multiple>
                                    <label class="custom-file-label" id="store_banners_labels" for="exampleInputFile">Choose
                                        Banners</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 product-image-thumbs">
                                @foreach($model->storeBanners as $store)
                                    <div class="product-image-thumb"><img onclick="replaceImage(this.src)"
                                                                          src="/{{ $store->banner }}"
                                                                          alt="Product Image"></div>
                                @endforeach
                            </div>
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
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&amp;libraries=places"></script>
<!-- Bootstrap 4 -->

<!-- Page script -->
<script>

    $(document).ready(function () {
        $('#update-store-form').submit(function (e) {
            var loading = $('#loader');

            if ($(this).valid()) {
                loading.show();
            } else {
                loading.hide();
            }
        });

        $("#store_thumbnail").change(function (e) {
            var fileName = e.target.files[0].name;
            $('#store_thumbnail_label').html(fileName);
        });

        $("#store_banners").change(function (e) {
            $('#store_banners_labels').text(this.files.length + " files selected");
        });

        if ($('#delivery_charges')[0].checked) {
            console.log(1234);
        }

        var storeLatitude = $('#latitude').val();
        var storeLongitude = $('#longitude').val();

        // var latlng = new google.maps.LatLng(storeLatitude, storeLongitude);
        // var geocoder = geocoder = new google.maps.Geocoder();
        // geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        // if (status == google.maps.GeocoderStatus.OK) {
        // console.log(results);
        // if (results[1]) {
        // alert("Location: " + results[1].formatted_address);
        // }
        // }
        // });

        initialize();
        var cdn_css_file = "https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css";
        var toggle_script_url = "https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js";
        $.getScript(toggle_script_url);

    });

    function initialize() {
        var input = document.getElementById('locations_filter');
        var options = {
            //types: ['(cities)'],
            componentRestrictions: {country: "pk"}
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();

            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
            $('#location').val(place.name);
            $('#location_search_filter').val(1);
        });
    }

    function valueCheck(id, value) {
        if (value == 0) {
            $('#' + id).val(1);
            $('#delivery_charges').removeAttr('hidden');
        }
        if (value == 1) {
            $('#' + id).val(0);
            $('#delivery_charges').attr('hidden', true);
        }
    }


</script>
