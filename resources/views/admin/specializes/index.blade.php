@extends('admin.admin_layouts.master')

@section('title')
    {{ __('all specializes') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin-custom.css') }}">
@endsection

@section('content')
    <div class="message-display">
        @include('flash::message')
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ __('all specializes') }}</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <div class="table-action">
                                <div class="fix-btn-add">
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#create-specialize-modal">
                                        {{ __('add new') }} <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="table-search pull-right col-xs-7">
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label text-right fix-search-btn">{{ __('search') }}<br>
                                        </label>
                                        <div class="col-xs-7 searchpan">
                                            <input class="form-control" id="filter" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('teaching grade') }}</th>
                                    <th>{{ __('option') }}</th>
                                </thead>
                                <tbody>
                                    @foreach ($specializes as $specialize)
                                    <tr id="specialize{{ $specialize->id }}">
                                        <td>{{ $specialize->id }}</p></td>
                                        <td>{{ $specialize->name }}</td>
                                        <td>{{ $specialize->teaching_grade }}</td>
                                        <td>
                                            <p> 
                                                <a class="btn btn-info btn-xs" 
                                                href="{{ action('Admin\SpecializeController@edit', $specialize->id) }}">
                                                <i class="fa fa-recycle"></i>{{ __('update') }}</a>

                                                <a class="btn btn-danger btn-xs" data-toggle="modal" 
                                                data-target="#delete-modal"
                                                data-url="{{ action('Admin\SpecializeController@destroy', $specialize->id) }}"
                                                data-id="{{ $specialize->id }}">
                                                <i class=" fa fa-trash"></i>{{ __('delete') }}</a>
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="text-center">
                                {{ $specializes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.specializes.delete_modal')
@include('admin.specializes.create_special_modal')

@section('inline_scripts')
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
