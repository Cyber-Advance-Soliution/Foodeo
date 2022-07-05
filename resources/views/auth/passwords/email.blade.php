@extends('layouts.login')
@section('title', 'Recover Password')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('admin/assets/logo.png') }}"/>

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header">
                <p class="login-box-msg">{{ __('Recover Password') }}</p>
            </div>

            <div class="card-body login-card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Send Link</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
