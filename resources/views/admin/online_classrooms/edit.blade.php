@extends('admin.admin_layouts.master')

@section('title')
    {{ __('information') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin-custom.css') }}">
@endsection

@section('content')
    <div class="message-display">
        @include('flash::message')
    </div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('online classrooms') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('admins.adminDashboard') }}" class="breadcrumb-item">
                            <i class="ti-home p-r-5"></i>{{ __('admin dashboard') }}
                        </a>
                        <a href="{{ route('admins.online_classrooms.index') }}" class="breadcrumb-item">
                            {{ __('online classrooms') }}
                        </a>
                    <span class="breadcrumb-item active">{{ $onlineClassroom->name }}</span>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                        <div class="card">
                            <div class="card-header border bottom">
                                <h4 class="card-title">{{ __('update existed classroom') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ Form::model($onlineClassroom, ['route' => ['admins.online_classrooms.update', $onlineClassroom->id], 'method' => 'put', 'class' => 'm-t-15']) }}                                 
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <div class="p-h-10">
                                                <div class="form-group">
                                                    {{ Form::label('name', __('name'), ['class' => 'control-label']) }}
                                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                                    <p class="error">{{ $errors->first('name') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="p-h-10">
                                                <div class="form-group">
                                                    {{ Form::label('description', __('description'), ['class' => 'control-label']) }}
                                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
                                                    <p class="error">{{ $errors->first('description') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="p-h-10">
                                                <div class="form-group">
                                                    <label class="control-label">{{ __('rate') }}</label>
                                                    <td><span class="stars" title="{{ $onlineClassroom->classroom_rate }}">
                                                        {{ $onlineClassroom->classroom_rate }}</span>
                                                    </td>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 offset-sm-4">
                                            <div class="text-sm-right">
                                                {{ Form::submit(__('update'), ['class' => 'btn btn-gradient-success']) }}
                                            </div>
                                        </div> 
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('joined people list') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-overflow">
                                <table id="dt-opt" class="table table-hover table-xl">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('role') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($onlineClassroom->getJoinedPeopleList($onlineClassroom->id) as $person)
                                            <tr id="specialize{{ $person->id }}">
                                                <td>{{ $person->id }}</td>
                                                <td>{{ $person->name }}</td>
                                                <td>{{ \App\Models\User::$roles[$person->role] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script src="{{ asset('assets/admin/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tables/data-table.js') }}"></script>
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
