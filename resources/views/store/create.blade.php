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
                <form action="{{ route('create-store') }}" id="create-store-form" method="post" role="form"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Store Name </label>
                            <input type="text" class="form-control" id="store_name" name="store_name"
                                   placeholder="Enter Store Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Store Email </label>
                            <input type="email" class="form-control" id="store_email" name="store_email"
                                   placeholder="Enter Store Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Store Contact </label>
                            <input type="text" class="form-control" id="store_contact" name="store_contact"
                                   placeholder="Enter Store Contact">
                        </div>

                        <div class="form-group">
                            <label>Store Category</label>
                            <select class="form-control select2" name="store_category_id" style="width: 100%;">
                                <option value="" selected="selected"> -- Select Store Category --</option>
                                @foreach($storeCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Store Type</label>
                            <select class="form-control select2" name="store_type_id" style="width: 100%;">
                                <option value="" selected="selected"> -- Select Store Type --</option>
                                @foreach($storeTypes as $storeType)
                                    <option value="{{ $storeType->id }}">{{ $storeType->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">

                            <label>Short Description</label>
                            <input class="form-control" id="short_description" name="short_description"
                                   placeholder="Enter Short Description...">
                        </div>

                        <div class="form-group">
                            <label for="comment">Long Description</label>
                            <input type="text" class="form-control" id="long_description" name="long_description"
                                   placeholder="Enter Long Description...">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       onclick="valueCheck(this.id, this.value)" id="customer_pickup"
                                       name="customer_pickup" value="0">
                                <label class="form-check-label"> Customer Pickup </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       onclick="valueCheck(this.id, this.value)" id="delivery_to_customer"
                                       name="delivery_to_customer" value="0">
                                <label class="form-check-label"> Delivery To Customer</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       onclick="valueCheck1(this.id, this.value)" id="cash_on_delivery"
                                       name="cash_on_delivery" value="0">
                                <label class="form-check-label">Cash On Delivery</label>
                            </div>
                        </div>

                        <div class="form-group" id="deliveryCharges" hidden>
                            <label for="exampleInputPassword1"> Delivery Charges </label>
                            <input type="text" class="form-control" id="delivery_charges" name="delivery_charges"
                                   placeholder="Enter Delivery Charges">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile"> Location </label>
                            <input id="locations_filter" name="location" type="text" class="form-control"
                                   placeholder="Location"/>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <input type="hidden" name="location_search_filter" id="location_search_filter" value="0">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Store Thumbnail </label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="store_thumbnail"
                                       name="store_thumbnail">
                                <label class="custom-file-label" id="store_thumbnail_label" for="store_thumbnail_label">Choose
                                    Thumbnail</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile"> Store Banners </label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="store_banners" name="store_banners[]"
                                       multiple>
                                <label class="custom-file-label" id="store_banners_labels" for="store_banners_labels">Choose
                                    Banners</label>
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
<script src="http://code.jquery.com/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\StoreRequest') !!}

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz1jMjJPw1KIAoGbsESx0-4iMTDmLf7nw&amp;libraries=places"></script>
<!-- Bootstrap 4 -->

<!-- Page script -->
<script>

    $(document).ready(function (e) {
        $('#create-store-form').submit(function (e) {
            var loading = $('#loader');
            loading.show();
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

        initialize();

    });

    function initialize() {

        var options = {
            //types: ['(cities)'],
            componentRestrictions: {country: "pk"}
        };

        var input = document.getElementById('locations_filter');
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
        }
        if (value == 1) {
            $('#' + id).val(0);
        }
    }

    function valueCheck1(id, value) {
        if (value == 0) {
            $('#' + id).val(1);
            $('#deliveryCharges').removeAttr('hidden');
        }
        if (value == 1) {
            $('#' + id).val(0);
            $('#deliveryCharges').attr('hidden', true);
        }
    }


</script>
