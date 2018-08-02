@extends('layouts.default')

@section('title')
    {{ __('profile_info') }}
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
                                        <th> {{ __('index') }} </th>
                                        <th> {{ __('content') }} </th>
                                        <th> {{ __('option') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $key=>$notification)
                                        <tr>
                                            <td class="add-img-selector">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="add-img-td">
                                                <a href="ads-details.html">
                                                    <h4> {{ $key + 1 }} </h4>
                                                </a>
                                            </td>
                                            <td class="ads-details-td">
                                                <h4><a href="ads-details.html"> {{ $notification->content }} </a></h4>
                                                <p> <strong> Posted On </strong>:
                                                {{ $notification->created_at }} </p>
                                            </td>
                                            <td class="action-td">
                                                <p><a class="btn btn-primary btn-xs"> <i class="fa fa-check-circle"></i> {{ __('accept') }} </a></p>
                                                <p> <a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> {{ __('delete') }} </a></p>
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
    </div>
@endsection
