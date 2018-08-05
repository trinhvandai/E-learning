@extends('admin.admin_layouts.master')

@section('title')
    {{ __('all specializes') }}
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
                <h2 class="header-title">{{ __('specializes') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('admins.adminDashboard') }}" class="breadcrumb-item">
                            <i class="ti-home p-r-5"></i>{{ __('admin dashboard') }}
                        </a>
                        <a class="breadcrumb-item active">{{ __('specializes') }}</a>
                    </nav>
                </div>
            </div>  
            <div class="create-btn">
                <a class="btn btn-gradient-success btn-rounded" data-toggle="modal" data-target="#create-specialize-modal">
                    {{ __('add new') }} <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('teaching_grade') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specializes as $specialize)
                                    <tr id="specialize{{ $specialize->id }}">
                                        <td>{{ $specialize->id }}</td>
                                        <td>{{ $specialize->name }}</td>
                                        <td>{{ $specialize->teaching_grade }}</td>
                                        <td class="text-center font-size-18">
                                            <a href="{{ route('admins.specializes.edit', $specialize->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                            <a class="text-gray" data-toggle="modal" 
                                                data-target="#delete-modal"
                                                data-url="{{ route('admins.specializes.destroy', $specialize->id) }}"
                                                data-id="{{ $specialize->id }}">
                                                <i class="ti-trash"></i>
                                            </a>
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

@include('admin.admin_layouts.delete_modal')
@include('admin.specializes.create_special_modal')

@section('inline_scripts')
    <script src="{{ asset('assets/admin/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tables/data-table.js') }}"></script>
    <script>    
        $(document).ready(function(){
            @if (count($errors) > 0)
                $('#create-specialize-modal').modal('show');
            @endif

            $('#delete-modal').on('show.bs.modal', function(e){
                var url = $(e.relatedTarget).data('url');
                $('#form-delete').attr('action', url);
            });

            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        })
    </script>
@endsection
