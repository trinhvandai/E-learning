@extends('layouts.default')

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="fa fa-folder-o"></i>&ensp;&ensp; {{ __('all_lectures_p1') . $courseName . __('all_lectures_p2') }} </h2>

                        <div class="table-responsive">
                            <div class="table-action">
                                <div class="table-search pull-right col-xs-7">
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label text-right"> {{ __('search') }} <br>
                                            <a title="clear filter" class="clear-filter" href="#clear"> {{ __('clear') }} </a>
                                        </label>
                                        <div class="col-xs-7 searchpan">
                                            <input class="form-control" id="search" name="search" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered add-manage-table" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center col-xs-1"> Index </th>
                                        <th class="text-center col-xs-6"> Title </th>
                                        <th class="text-center col-xs-2"> Time </th>                                     
                                        <th class="text-center col-xs-3">
                                            @can('is-teacher')
                                                <a href="#" class="create-modal btn btn-success btn-sm" id="add-lecture">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </a>
                                            @endcan
                                            @can('is-student')
                                            @endcan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lectures as $key => $lecture)
                                    <tr>
                                        <td class="col-xs-1 text-center">
                                            <p> {{ __('lecture_index') . ($key + 1) }} </p>
                                        </td>
                                        <td class="col-xs-7">
                                            <p> {{ $lecture->uploaded_file_title }} </p>
                                        </td>
                                        <td class="col-xs-2 text-center">
                                            <p> {{ $lecture->uploaded_file_time }} </p>
                                        </td>
                                        <td class="col-xs-2 text-center">
                                            @can('is-teacher')
                                            <a href="{{ url('/courses/' . $id . '/lectures/' . $lecture->id) }}" class="show-modal btn btn-info btn-sm" data-id="">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                            @endcan
                                            @can('is-student')
                                            <a href="{{ url('/courses/' . $id . '/lectures/' . $lecture->id) }}" class="show-modal btn btn-info btn-sm" data-id="">
                                                <i class="fa fa-eye"></i> {{ __('start_now') }}
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ Form::text('current_route', url()->current(), ['id' => 'current-route', 'hidden' => '']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Form Create Lecture --}}
    <div id="create" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        {{ Form::open() }}
                            <div class="form-group">
                                {{ Form::label('uploaded_file_title', __('title'), ['class' => 'control-label']) }}
                                <div @if ($errors->has('uploaded_file_title')) class="error-input" @endif>
                                    {{ Form::text('uploaded_file_title', null, ['class' => 'form-control', 'id' => 'uploaded-file-title']) }}
                                    <p style="color: red" id="error-uploaded-file-title" hidden=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('uploaded_file_description', __('description'), ['class' => 'control-label']) }}
                                <div @if ($errors->has('duploaded_file_escription')) class="error-input" @endif>
                                    {{ Form::text('uploaded_file_description', null, ['class' => 'form-control', 'id' => 'uploaded-file-description']) }}
                                    <p style="color: red" id="error-uploaded-file-description" hidden=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('uploaded_file_link', __('link_video'), ['class' => 'control-label']) }}
                                <div @if ($errors->has('uploaded_file_link')) class="error-input" @endif>
                                    {{ Form::text('uploaded_file_link', null, ['class' => 'form-control', 'id' => 'uploaded-file-link']) }}
                                    <p style="color: red" id="error-uploaded-file-link" hidden=""></p>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit" id="add">
                            <span class="glyphicon glyphicon-plus"></span> {{ __('create_lecture') }}
                        </button>
                        <button class="btn btn-warning" type="button" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remobe"></span> {{ __('close-modal') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $(document).on('click','.create-modal', function() {
            $('#create').modal('show');
            $('.form-horizontal').show();
            $('.modal-title').text('{{ __('add_lecture') }}');
        });

        $( document ).ready(function() {
            $('#add').click(function() {
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.post(
                    $('#current-route').val() + '/store',
                    {
                        uploaded_file_title : $('#uploaded-file-title').val(),
                        uploaded_file_description : $('#uploaded-file-description').val(),
                        uploaded_file_link : $('#uploaded-file-link').val(),
                    },
                    function($result) {

                    },
                    'json'
                );
            });
        });
    </script>
@endsection
