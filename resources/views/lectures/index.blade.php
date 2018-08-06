@extends('layouts.default')

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/lectures_index.css') }}">
@endsection

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
                                    <tr id="lecture-{{ $lecture->id }}">
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
                                            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{ $lecture->id }}" data-title="{{ $lecture->uploaded_file_title }}" data-description="{{ $lecture->uploaded_file_description }}" data-link="{{ $lecture->uploaded_file_link }}">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{ $lecture->id }}">
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
                                {{ Form::text('uploaded_file_title', null, ['class' => 'form-control', 'id' => 'uploaded-file-title']) }}
                                <p style="color: red" id="error-uploaded-file-title" hidden=""></p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('uploaded_file_description', __('description'), ['class' => 'control-label']) }}
                                {{ Form::text('uploaded_file_description', null, ['class' => 'form-control', 'id' => 'uploaded-file-description']) }}
                                <p style="color: red" id="error-uploaded-file-description" hidden=""></p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('uploaded_file_link', __('link_video'), ['class' => 'control-label']) }}
                                {{ Form::text('uploaded_file_link', null, ['class' => 'form-control', 'id' => 'uploaded-file-link']) }}
                                <p style="color: red" id="error-uploaded-file-link" hidden=""></p>
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
    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal"class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    {{ Form::open() }}
                        <div class="form-group">
                            {{ Form::label('id', null, ['class' => 'control-label hidden']) }}
                            {{ Form::text('id', null, ['class' => 'form-control hidden', 'id' => 'fid']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('uploaded_file_title', __('title'), ['class' => 'control-label']) }}
                            {{ Form::text('uploaded_file_title', null, ['class' => 'form-control', 'id' => 'update-uploaded-file-title']) }}
                            <p style="color: red" id="error-update-uploaded-file-title" hidden=""></p>
                        </div>
                        <div class="form-group">
                            {{ Form::label('uploaded_file_description', __('description'), ['class' => 'control-label']) }}
                            {{ Form::text('uploaded_file_description', null, ['class' => 'form-control', 'id' => 'update-uploaded-file-description']) }}
                            <p style="color: red" id="error-update-uploaded-file-description" hidden=""></p>
                        </div>
                        <div class="form-group">
                            {{ Form::label('uploaded_file_link', __('link_video'), ['class' => 'control-label']) }}
                            {{ Form::text('uploaded_file_link', null, ['class' => 'form-control', 'id' => 'update-uploaded-file-link']) }}
                            <p style="color: red" id="error-update-uploaded-file-link" hidden=""></p>
                        </div>
                    {{ Form::close() }}
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        Are You sure want to delete <span class="title"></span>?
                        <span class="hidden id"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>close
                    </button>
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

        $(document).on('click','.edit-modal', function() {
            $('#footer_action_button').text('{{ __('update_lecture') }}');
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-warning');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Post Edit');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            $('#fid').val($(this).data('id'));
            $('#update-uploaded-file-title').val($(this).data('title'));
            $('#update-uploaded-file-description').val($(this).data('description'));
            $('#update-uploaded-file-link').val($(this).data('link'));
            $('#myModal').modal('show');
        });

        $(document).on('click', '.delete-modal', function() {
            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.form-horizontal').hide();
            $('#fid').val($(this).data('id'));
            $('.title').html($(this).data('title'));
            $('#myModal').modal('show');
            $('form').hide();
        });

        $(document).ready(function() {
            $('#add').click(function() {
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: "POST",
                    url: $('#current-route').val() + '/store',
                    data: {
                        uploaded_file_title : $('#uploaded-file-title').val(),
                        uploaded_file_description : $('#uploaded-file-description').val(),
                        uploaded_file_link : $('#uploaded-file-link').val(),
                    },
                    success: function (data) {
                        $.notify({
                            // options
                            message: ' {{ __('create_lecture_success') }} '
                        },{
                            // settings
                            type: 'success'
                        });

                        $('#create').modal('hide');
                    },
                    error: function (response) {
                        errors = response.responseJSON.errors;

                        if (errors.uploaded_file_title != null) {
                            $('#error-uploaded-file-title').removeAttr('hidden');
                            $('#error-uploaded-file-title').text(errors.uploaded_file_title);
                            $('#uploaded-file-title').addClass('error-input');
                        } else {
                            $('#error-uploaded-file-title').attr('hidden', '');
                            $('#uploaded-file-title').removeClass('error-input');
                        }

                        if (errors.uploaded_file_description != null) {
                            $('#error-uploaded-file-description').removeAttr('hidden');
                            $('#error-uploaded-file-description').text(errors.uploaded_file_description);
                            $('#uploaded-file-description').addClass('error-input');
                        } else {
                            $('#error-uploaded-file-description').attr('hidden', '');
                            $('#uploaded-file-description').removeClass('error-input');
                        }

                        if (errors.uploaded_file_link != null) {
                            $('#error-uploaded-file-link').removeAttr('hidden');
                            $('#error-uploaded-file-link').text(errors.uploaded_file_link);
                            $('#uploaded-file-link').addClass('error-input');
                        } else {
                            $('#error-uploaded-file-link').attr('hidden', '');
                            $('#uploaded-file-link').removeClass('error-input');
                        }
                    }
                }, "json")
            });

            $('.modal-footer').on('click', '.edit', function() {
                var id = $('#fid').val();

                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: $('#current-route').val() + '/' + id + '/update',
                    data: {
                        uploaded_file_id : id,
                        uploaded_file_title : $('#update-uploaded-file-title').val(),
                        uploaded_file_description : $('#update-uploaded-file-description').val(),
                        uploaded_file_link : $('#update-uploaded-file-link').val(),
                    },
                    success: function (data) {
                        $.notify({
                            // options
                            message: ' {{ __('update_lecture_success') }} '
                        },{
                            // settings
                            type: 'success'
                        });

                        $('#myModal').modal('hide');
                        $('#lecture-' + id).remove();
                    },
                    error: function (response) {
                        errors = response.responseJSON.errors;

                        if (errors.uploaded_file_title != null) {
                            $('#error-update-uploaded-file-title').removeAttr('hidden');
                            $('#error-update-uploaded-file-title').text(errors.uploaded_file_title);
                            $('#update-update-uploaded-file-title').addClass('error-input');
                        } else {
                            $('#error-update-uploaded-file-title').attr('hidden', '');
                            $('#update-uploaded-file-title').removeClass('error-input');
                        }

                        if (errors.uploaded_file_description != null) {
                            $('#error-update-uploaded-file-description').removeAttr('hidden');
                            $('#error-update-uploaded-file-description').text(errors.uploaded_file_description);
                            $('#update-uploaded-file-description').addClass('error-input');
                        } else {
                            $('#error-update-uploaded-file-description').attr('hidden', '');
                            $('#update-uploaded-file-description').removeClass('error-input');
                        }

                        if (errors.uploaded_file_link != null) {
                            $('#error-update-uploaded-file-link').removeAttr('hidden');
                            $('#error-update-uploaded-file-link').text(errors.uploaded_file_link);
                            $('#update-uploaded-file-link').addClass('error-input');
                        } else {
                            $('#error-update-uploaded-file-link').attr('hidden', '');
                            $('#update-uploaded-file-link').removeClass('error-input');
                        }
                    }
                }, "json")
            });

            $('.modal-footer').on('click', '.delete', function(){
                var id = $('#fid').val();

                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: $('#current-route').val() + '/' + id + '/delete',
                    data: {
                        uploaded_file_id : id
                    },
                    success: function(){
                        $.notify({
                            // options
                            message: ' {{ __('delete_lecture_success') }} '
                        },{
                            // settings
                            type: 'success'
                        });

                        $('#myModal').modal('hide');
                        $('#lecture-' + id).remove();
                    }
                }, "json")
            });
        });
    </script>
@endsection
