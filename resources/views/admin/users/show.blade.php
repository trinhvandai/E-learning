@extends('admin.admin_layouts.master')

@section('title')
    {{ __('information') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin-custom.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('information') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('admins.adminDashboard') }}" class="breadcrumb-item">
                            <i class="ti-home p-r-5"></i>{{ __('admin dashboard') }}
                        </a>
                        <a href="{{ route('admins.users.index') }}" class="breadcrumb-item">{{ __('users') }}</a>
                        <span class="breadcrumb-item active">{{ $user->name }}</span>
                    </nav>
                </div>
            </div>  
            <div class="card">
                <div class="card-header border bottom">
                    <h4 class="card-title">{{ __('personal information') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('name') }}</label>
                                    <p class="form-control" aria-readonly="true">{{ $user->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('email') }}</label>
                                    <p class="form-control" aria-readonly="true">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Avatar</label>
                                    <img class="form-control-plaintext fix-avatar" 
                                        src="{{ str_replace('public/', '', asset($user->avatar)) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('address') }}</label>
                                    <p class="form-control" aria-readonly="true">{{ $user->address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">{{ __('role') }}</label>
                                    @if ($user->role == 0)
                                        <p class="form-control" aria-readonly="true">{{ __('admin') }}</p>
                                    @else
                                        <p class="form-control" aria-readonly="true">{{ \App\Models\User::$roles[$user->role] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">{{ __('joined in') }}</label>
                                <p class="form-control-plaintext">{{ $user->created_at }}</p>
                                <small class="form-text" aria-readonly="true">{{ __('join in descript') }}</small>
                            </div>
                        </div>
                    </div>
                    @if ($user->role == 1)
                        <div class="row m-t-30">
                            <div class="col-md-4">
                                <div class="p-h-10">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('working_place') }}</label>
                                        <p class="form-control" aria-readonly="true">{{ $user->working_place }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($user->role == 2)
                        <div class="row m-t-30">
                            <div class="col-md-4">
                                <div class="p-h-10">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('learning_capacity') }}</label>
                                        <p class="form-control" aria-readonly="true">{{ $user->learning_capacity }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-h-10">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('conduct') }}</label>
                                        <p class="form-control" aria-readonly="true">{{ $user->conduct }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-h-10">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('grade') }}</label>
                                        <p class="form-control" aria-readonly="true">{{ $user->grade }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>   
        </div>
    </div>
@endsection
