@extends('admin.admin_layouts.master')

@section('title')
    {{ __('admin dashboard') }}
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="intro-title"> {{ __('slogan_p1') }}  {{ __('slogan_p2') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('inline_scripts')
    <script>
        $(document).ready(function(){
            $.notify({
                icon: 'fa fa-gift',
                message: "{{ __('slogan_p1') }} <b>{{ __('admin dashboard') }}</b>"
            },{
                type: 'info',
                timer: 4000
            });
        });
    </script>
@endsection
