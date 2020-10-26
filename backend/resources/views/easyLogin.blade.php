@extends('layouts.layout')
@section('title','Login')

@section('content')

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
                                簡易ログイン
                                </h5>
                                <p class="text-center text-danger">そのままLoginを押せばログインができます。</p>
                            </div>

                            <div class="">
                                <div class="form-group">
                                    <label for="email" class="">{{ __('messages.E-Mail Address') }}</label>
                                    <div class="">
                                        <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="test@gmail.com" required autocomplete="email" autofocus/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="">{{ __('messages.Password') }}</label>
                                    <div class="">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="testtest" required autocomplete="current-password"/>
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
    @endsection