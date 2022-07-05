@extends('layouts.main-admin')

@section('title', 'New Coupon')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"> Edit Coupon </h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('coupon-update') }}" method="post" role="form">
                    @csrf
                    <input type="hidden" name="coupon_id" value="{{$model->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="coupon-code">Coupon Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                   placeholder="Enter code like foodeo234"
                                   value="{{isset($model->code)? $model->code:''}}">
                        </div>

                        <div class="form-group">
                            <label> Coupon Type </label>
                            <select class="form-control select2" name="type" style="width: 100%;">
                                <option value="" selected="selected"> -- Select coupon type --</option>
                                <option value="{{$model->type}}" {{isset($model->type)? 'selected':''}}>percentage
                                </option>
                                <option value="{{$model->code}}" {{isset($model->type)? 'selected':''}}>value</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="coupon-value">Coupon Value </label>
                            <input type="number" class="form-control" id="value" name="value" placeholder="Enter value"
                                   value="{{isset($model->value)? $model->value:''}}">
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

{!! JsValidator::formRequest('App\Http\Requests\CouponRequest') !!}

<script>

    $(document).ready(function () {

    });

</script>
