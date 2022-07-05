@extends('layouts.main-admin')

@section('title', 'Location')

@section('content')
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h3 class="d-inline-block"> Store Location </h3>
                    <div id="storeMap" style="height:400px;width:100%;"></div>
                    {{-- @dd( $model) --}}
                    <div class="mt-4 text-center">
                        <strong> {{ isset($model->store_name)? $model->store_name:$model->store_email }} </strong></div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
<!-- jQuery -->
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&amp;libraries=places"></script>

<script>
    $(document).ready(function () {
        var latitude = {{ $model->latitude }};
        var longitude = {{ $model->longitude }};

        InitializeMap(latitude, longitude);
    });

    function InitializeMap(Latitude, Longitude) {
        var uluru = {lat: Latitude, lng: Longitude};

        var map = new google.maps.Map(
            document.getElementById('storeMap'), {zoom: 15, center: uluru});

        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
