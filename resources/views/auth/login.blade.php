@extends('layouts.default')

@section('title')
    {{ __('login') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/login.css') }}">
@endsection

@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="page-title"> {{ __('login_to_account') }} </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
                    <div class="page-login-form box">
                        <h3>
                            {{ __('login') }}
                        </h3>
                        {{ Form::open(['method' => 'post', 'class' => 'login-form']) }}
                            @if(!$errors->isEmpty())
                                @foreach ($errors->all() as $error)
                                    <p id="error"> {{ __('error:') . ' ' . $error }} </p><br>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <div class="input-icon @if(!$errors->isEmpty()) error-input @endif">
                                    <i class="icon fa fa-envelope"></i>
                                    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'sender-email', 'placeholder' => __('email')]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon @if(!$errors->isEmpty()) error-input @endif">
                                    <i class="icon fa fa-unlock-alt"></i>
                                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => __('password')]) }}
                                </div>
                            </div>
                            <div class="checkbox">
                                {{ Form::checkbox('remember', null, false, ['id' => 'remember']) }}
                                {{ Form::label('remember', __('remember_me')) }}
                            </div>
                            {{ Form::submit(__('login'), ['class' => 'btn btn-common log-btn']) }}
                        {{ Form::close() }}
                        <ul class="form-links">
                            <li class="pull-left"><a href="{{ route('register') }}"> {{ __('dont_have_account') }} </a></li>
                            <li class="pull-right"><a href=""> {{ __('forgot_password') }} </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sender-email').focus(function() {
                $('#sender-email').parent().removeClass('error-input');
                $('#error').remove();
            })
            $('#password').focus(function() {
                $('#password').parent().removeClass('error-input');
                $('#error').remove();
            })
        })
    </script>
@endsection
