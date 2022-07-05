@extends('layouts.main-admin')

@section('title', 'Home Delivery')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Home Delivery Orders </h3>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> Pending </span><br>
                                    <div id="pending"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> Accepted </span><br>
                                    <div id="accepted"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> Preparing </span><br>
                                    <div id="preparing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> R.T.D </span><br>
                                    <div id="ready-to-deliver"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> O.F.D </span><br>
                                    <div id="out-for-delivery"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted"> Delivered </span><br>
                                    <div id="delivered"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        setInterval(function () {
            $.ajax({
                type: 'get',
                url: "{{ route('get-orders') }}",
                data: {'store_id': 1},
                success: function (jsonResponse) {
                    var response = $.parseJSON(jsonResponse);
                    $("#pending").html(response.Pending);
                    $("#accepted").html(response.Accepted);
                    $("#preparing").html(response.Preparing);
                    $("#ready-to-deliver").html(response.ReadyToDeliver);
                    $("#out-for-delivery").html(response.OutForDelivery);
                    $("#delivered").html(response.Delivered);
                },
            });
        }, 2000);
    });


</script>

