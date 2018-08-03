@extends('admin.admin_layouts.master')

@section('title')
    {{ __('admin dashboard') }}
@endsection

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('slogan_p1') }} {{ __('slogan_p2') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p>{{ __('slogan_p3') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    
@endsection
