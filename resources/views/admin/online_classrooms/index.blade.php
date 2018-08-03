@extends('admin.admin_layouts.master')

@section('title')
    {{ __('all online classrooms') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin-custom.css') }}">
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
                        <a href="{{ route('adminDashboard') }}" class="breadcrumb-item">
                            <i class="ti-home p-r-5"></i>{{ __('admin dashboard') }}
                        </a>
                        <a class="breadcrumb-item active">{{ __('online classrooms') }}</a>
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
                                    <th>{{ __('classroom rate') }}</th>
                                    <th>{{ __('created person') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th>{{ __('accept') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($onlineClassrooms as $onlineClassroom)
                                    <tr id="specialize{{ $onlineClassroom->id }}">
                                        <td>{{ $onlineClassroom->id }}</td>
                                        <td>{{ $onlineClassroom->name }}</td>
                                        <td><span class="stars" title="{{ $onlineClassroom->classroom_rate }}">
                                            {{ $onlineClassroom->classroom_rate }}</span>
                                        </td>
                                        @if ($onlineClassroom->getTeacher($onlineClassroom->id) != null) 
                                            <td>{{ $onlineClassroom->getTeacher($onlineClassroom->id)->name }}</td>
                                        @else 
                                            <td>{{ __('no person') }}</td>
                                        @endif
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

@include('admin.specializes.delete_modal')
@include('admin.specializes.create_special_modal')

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
