@extends('admin.admin_layouts.master')

@section('title')
    {{ __('information') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin-custom.css') }}">
@endsection

@section('content')
    <div class="message-display">
        @include('flash::message')
    </div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('information') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('admins.adminDashboard') }}" class="breadcrumb-item">
                            <i class="ti-home p-r-5"></i>{{ __('admin dashboard') }}
                        </a>
                        <a href="{{ route('admins.courses.index') }}" class="breadcrumb-item">{{ __('course') }}</a>
                        <span class="breadcrumb-item active">{{ $course->name }}</span>
                    </nav>
                </div>
            </div>  
            <div class="card">
                <div class="card-header border bottom">
                    <h4 class="card-title">{{ $course->name }}</h4>
                </div>
                <div class="card-body">
                    {{ Form::model($course, ['route' => ['admins.courses.update', $course->id], 'method' => 'put', 'class' => 'm-t-15']) }}
                    <div class="row m-t-30">
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    {{ Form::label('name', __('name'), ['class' => 'control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('slide') }}</label>
                                    <img class="d-block w-100" src="{{ str_replace('public/', '', asset($course->slide_image)) }}" alt="slide">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('avatar') }}</label>
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ str_replace('public/', '', asset($course->course_avatar)) }}" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ str_replace('public/', '', asset($course->course_avatar_2)) }}" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ str_replace('public/', '', asset($course->course_avatar_3)) }}" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="mdi mdi-chevron-left font-size-35" aria-hidden="true"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="mdi mdi-chevron-right font-size-35" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    {{ Form::label('lecture_count', __('lecture count'), ['class' => 'control-label']) }}
                                    {{ Form::text('lecture_count', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    {{ Form::label('time', __('duration'), ['class' => 'control-label']) }}
                                    {{ Form::text('time', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('level', __('level'), ['class' => 'control-label']) }}
                                {{ Form::text('level', null, ['class' => 'form-control']) }}
                                <small class="form-text" aria-readonly="true">{{ __('difficulty') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-8">
                            <div class="p-h-10">
                                <div class="form-group">
                                    {{ Form::label('description', __('description'), ['class' => 'control-label']) }}
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('course rate') }}</label>
                                    <td><span class="stars" title="{{ $course->course_rate }}">
                                        {{ $course->course_rate }}</span>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('category') }}</label>
                                    <p class="form-control" readonly>{{ $course->category->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('view') }}</label>
                                    <p class="form-control" readonly>{{ $course->view }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('created at') }}</label>
                                    <p class="form-control" readonly>{{ $course->created_at }}</p>
                                    <small class="form-text" aria-readonly="true">{{ __('create description') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 offset-sm-8">
                            <div class="text-sm-right">
                                {{ Form::submit(__('update'), ['class' => 'btn btn-gradient-success']) }}
                            </div>
                        </div> 
                    </div>
                    {{ Form::close() }}
                </div>
            </div>   
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script>
        $.fn.stars = function() {
            return $(this).each(function() {
                // Get the value
                var val = parseFloat($(this).html());
                // Make sure that the value is in 0 - 5 range, multiply to get width
                var size = Math.max(0, (Math.min(5, val))) * 16;
                // Create stars holder
                var $span = $('<span />').width(size);
                // Replace the numerical value with stars
                $(this).html($span);
            });
        }
        $(document).ready(function(){
            $('span.stars').stars();
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        })
    </script>
@endsection
