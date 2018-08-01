@extends('admin.admin_layouts.master')

@section('title')
    {{ __('information') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin-custom.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ __('information') }}</h4>
                        </div>
                        <div class="content">
                            {{ Form::model($specialize, ['action' => ['Admin\SpecializeController@update', $specialize->id], 'method' => 'put']) }}

                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger fix-alert">{{ $error }}</p>
                                @endforeach

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('name', __('name'), ['class' => 'control-label']) }}
                                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('teaching_grade', __('teaching_grade'), ['class' => 'control-label']) }}
                                            {{ Form::text('teaching_grade', null, ['class' => 'form-control', 'id' => 'teaching_grade']) }}
                                        </div>
                                    </div>
                                </div>
    
                                <div class="text-center">
                                    {{ Form::submit(__('update'), ['class' => 'btn btn-primary']) }}
                                </div>
                                <div class="clearfix"></div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
