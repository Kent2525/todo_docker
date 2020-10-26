@extends('layouts.layout')
@section('title','Login')

@section('content')

<!------ Include the above in your HEAD tag ---------->

 <div class="container login__container my-5">
        <div class="row login__row">
            <div class="col-md-6 d-flex">
                <img class="login__imagek align-self-center" src="https://www.freevector.com/uploads/vector/preview/20208/Free_Travel_Vector_3.jpg"
                    width="90%" alt="旅行イメージ" />
            </div>
            <div class="col-md-5 d-flex">
                <div class="align-self-center card login__card shadow-sm w-100">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- <h2 class="text-muted text-center">Login Page - Bootstrap 4</h2> -->

                            <div class="my-5">
                                <h5 class="text-center">
                                {{ __('messages.Login') }}
                                </h5>
                            </div>

                            <div class="">
                                <div class="form-group">
                                    <label for="email" class="">{{ __('messages.E-Mail Address') }}</label>
                                    <div class="">
                                        <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="">{{ __('messages.Password') }}</label>
                                    <div class="">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input custom-control"
                                        id="customCheckDisabled1" />
                                    <label class="custom-control-label" for="customCheckDisabled1">{{ __('messages.Remember Me') }}</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block my-3">
                                        Login
                                    </button>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('password.request') }}">{{ __('messages.Password forgotten?') }}</a>
                                        <span> <a href="{{ route('register') }}">{{ __('messages.Create account') }}</a></span>
                                    </div>
                                    <div class="dropdown-divider my-4"></div>
                                    <div class="text-center w-100">
                                        <!-- <small>Built by <a href="https://www.instagram.com/realjblaq/">@realjblaq</a> </small> -->
                                    </dvi>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('messages.Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('messages.Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


@endsection


