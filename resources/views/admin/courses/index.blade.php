@extends('admin.admin_layouts.master')

@section('title')
    {{ __('all courses') }}
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
                <h2 class="header-title">{{ __('course') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('admins.adminDashboard') }}" class="breadcrumb-item">
                            <i class="ti-home p-r-5"></i>{{ __('admin dashboard') }}
                        </a>
                        <a class="breadcrumb-item active">{{ __('course') }}</a>
                    </nav>
                </div>
            </div>  
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('lecture count') }}</th>
                                    <th>{{ __('level') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th>{{ __('accept') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr id="specialize{{ $course->id }}">
                                        <td>{{ $course->id }}</td>
                                        <td><a href="{{ route('admins.courses.edit', $course->id) }}">{{ $course->name }}</a></td>
                                        <td>{{ $course->lecture_count }}</td>
                                        <td>{{ $course->level }}</td>
                                        <td><span class="badge badge-pill badge-warning">{{ __('pending') }}</span></td>
                                        <td class="text-center font-size-18">
                                            <a href="#" class="text-gray m-r-15" placeholder="accept"><i class="ti-check-box"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        $(document).ready(function(){
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        })
    </script>
@endsection
