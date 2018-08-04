@extends('layouts.default')

@section('title')
    {{ __('profile_info') }}
@endsection

@section('inline_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/notifications_index.css') }}">  
@endsection

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 page-sideabr">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">
                                <div class="collapse-box">
                                    <h5 class="collapset-title no-border"> {{ __('profile_info') }} <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
                                    <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li class="active">
                                                <a href="{{ route('home') }}"><i class="fa fa-home"></i> {{ __('home') }} </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="collapse-box">
                                    <h5 class="collapset-title"> {{ __('course') }} <a aria-expanded="true" class="pull-right" data-toggle="collapse" href=""><i class="fa fa-angle-down"></i> </a></h5>
                                    <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li>
                                                <a href="account-myads.html"><i class="fa fa-credit-card"></i>&ensp;&ensp; {{ __('my_course') }} <span class="badge"></span></a>
                                            </li>
                                            <li>
                                                <a href="account-favourite-ads.html"><i class="fa fa-heart-o"></i>&ensp;&ensp; {{ __('favourite_course') }} <span class="badge"></span></a>
                                            </li>
                                            <li>
                                                <a href="account-saved-search.html"><i class="fa fa-star-o"></i>&ensp;&ensp; {{ __('saved_course') }} <span class="badge"></span></a>
                                            </li>
                                            <li>
                                                <a href="account-archived-ads.html"><i class="fa fa-folder-o"></i>&ensp;&ensp; {{ __('uploaded_file') }} <span class="badge"></span></a>
                                            </li>
                                            <li class="active">
                                                <a href="account-pending-approval-ads.html"><i class="fa fa-hourglass-o"></i>&ensp;&ensp; {{ __('notification') }} <span class="badge"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="collapse-box">
                                    <h5 class="collapset-title"> {{ __('terminate_account') }} <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#close"><i class="fa fa-angle-down"></i></a></h5>
                                    <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li>
                                                <a href="account-close.html"><i class="fa fa-close"></i> {{ __('close_account') }} </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inner-box">
                            <div class="widget-title">
                                <h4>Advertisement</h4>
                            </div>
                            <img src="" alt="">
                        </div>
                    </aside>
                </div>
                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="fa fa-bullhorn"></i> &ensp; {{ __('notifications') }} </h2>
                        <div class="table-responsive">
                            <div class="table-action">
                                <div class="checkbox">
                                    <label for="checkAll">
                                        <input id="checkAll" type="checkbox">
                                        {{ __('select_all') }} &ensp;&ensp;|&ensp;&ensp; <a href="#" class="btn btn-xs btn-danger"> {{ __('delete') }} <i class="fa fa-close"></i></a>
                                    </label>
                                </div>
                            </div>
                            <table class="table table-bordered add-manage-table">
                                <thead>
                                    <tr>
                                        <th data-type="numeric"></th>
                                        <th class="text-center"> {{ __('index') }} </th>
                                        <th> {{ __('content') }} </th>
                                        <th> {{ __('option') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $key=>$notification)
                                        <tr class="{{ ($notification->seen) ? '' : 'unread-notify' }}" id="notification-{{ $notification->id }}">
                                            <td class="col-sm-1 text-center">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 text-center">
                                                <h4> {{ $key + 1 }} </h4>
                                            </td>
                                            <td class="col-sm-6">
                                                <h4> {{ $notification->content }} </h4>
                                                <p><strong> {{ __('post_on') }} </strong>:
                                                {{ $notification->created_at }} </p>
                                            </td>
                                            <td class="col-sm-1 text-center">
                                                @can('active-available', $notification->code)
                                                    <p><a class="btn btn-primary btn-xs" id="accept-{{ $notification->id }}"> <i class="fa fa-check-circle"></i> {{ __('accept') }} </a></p>
                                                @endcan
                                                <p><a class="btn btn-danger btn-xs" id="delete-{{ $notification->id }}"> <i class=" fa fa-trash"></i> {{ __('delete') }} </a></p>
                                            </td>
                                            </strong>
                                            {{ Form::text('notification_id', $notification->id, ['class' => 'form-control hidden', 'id' => 'notification-id', 'data-id' => $notification->id, 'data-code' => $notification->code ]) }}
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
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $('tbody tr').on('click', function() {
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
              
            $.post (
                '/notifications/changeReadStatus',
                { id : $('#notification-id').attr('data-id') },
                function ($data) {
                    var id = $('#notification-id').attr('data-id');
                    $('#notification-' + id).removeClass('unread-notify')
                },
                'json'
            );
        });

        var id = $('#notification-id').attr('data-id');
        $('#accept-' + id).on('click', function() {
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post (
                '/notifications/acceptCourseRequest',
                {
                    code : $('#notification-id').attr('data-code'),
                },
                function(data) {
                    $('#accept-' + id).fadeOut(800);
                    $.notify({
                        // options
                        message: ' {{ __('course_request_accept_p1') }} ' + data.user_name + ' {{ __('course_request_accept_p2') }} ' + data.course_name + ' {{ __('course_request_accept_p3')}} '
                    },{
                        // settings
                        type: 'success'
                    });
                },
                'json'
            );
        });

        $('#delete-' + id).on('click', function() {
            if (confirm('{{ __('sure_delete') }}')) {
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post (
                    '/notifications/deleteNotification',
                    { id : $('#notification-id').attr('data-id') },
                    function(data) {
                        $('#notification-' + id).fadeOut(800);
                        $.notify({
                            // options
                            message: ' {{ __('delete_success') }} '
                        },{
                            // settings
                            type: 'danger'
                        });
                    },
                    'json'
                );              
            }
        });
    </script>
@endsection
