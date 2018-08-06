<div class="header navbar">
    <div class="header-container">
        <div class="nav-logo">
            <a href="{{ route('admins.adminDashboard') }}">
                <div class="logo logo-white"></div>
            </a>
        </div>
        <ul class="nav-left">
            <li>
                <a class="sidenav-fold-toggler" href="javascript:void(0);">
                    <i class="mdi mdi-menu"></i>
                </a>
                <a class="sidenav-expand-toggler" href="javascript:void(0);">
                    <i class="mdi mdi-menu"></i>
                </a>
            </li>
            <li class="search-box">
                <a class="search-toggle" href="javascript:void(0);">
                    <i class="search-icon mdi mdi-magnify"></i>
                    <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                </a>
            </li>
            <li class="search-input">
                <input class="form-control" type="text" placeholder="{{ __('type to search') }}">
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi mdi-apps"></i>
                </a>
                <ul class="dropdown-menu dropdown-grid col-3 dropdown-lg">
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-email-outline font-size-30 icon-gradient-success"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-folder-outline font-size-30 icon-gradient-success"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi mdi-gauge font-size-30 icon-gradient-success"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-play-circle-outline font-size-30 icon-gradient-success"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-image-filter font-size-30 icon-gradient-success"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-center">
                                <i class="mdi mdi-image-filter-drama font-size-30 icon-gradient-success"></i>
                            </div>
                        </a>
                    </li>
                </ul>    
            </li>
            <li class="notifications dropdown dropdown-animated scale-left">
                <span class="counter">2</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="mdi mdi-bell-ring-outline"></i>
                </a>
                <ul class="dropdown-menu dropdown-lg p-v-0">
                    <li class="p-v-15 p-h-20 border bottom text-dark">
                        <h5 class="m-b-0">
                            <i class="mdi mdi-bell-ring-outline p-r-10"></i>
                            <span>{{ __('notification') }}</span>
                        </h5>
                    </li>
                    <li>
                        <ul class="list-media overflow-y-auto relative scrollable">
                            <li class="list-item border bottom">
                                <a href="javascript:void(0);" class="media-hover p-15">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-primary">
                                            <i class="ti-settings"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            {{ __('ready') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item border bottom">
                                <a href="javascript:void(0);" class="media-hover p-15">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-success">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            {{ __('ready') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item border bottom">
                                <a href="javascript:void(0);" class="media-hover p-15">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-warning">
                                            <i class="ti-file"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            {{ __('ready') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="user-profile dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src="{{ str_replace('public/', '', asset(Auth::user()->avatar)) }}" alt="avatar">
                </a>
                <ul class="dropdown-menu dropdown-md p-v-0">
                    <li>
                        <ul class="list-media">
                            <li class="list-item p-15">
                                <div class="media-img">
                                    <img src="{{ str_replace('public/', '', asset(Auth::user()->avatar)) }}" alt="">
                                </div>
                                <div class="info">
                                    <span class="title text-semibold">{{ Auth::user()->name }}</span>
                                    <span class="sub-title">{{ __('ready') }}</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="ti-settings p-r-10"></i>
                            <span>{{ __('setting') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admins.users.show', Auth::user()->id) }}">
                            <i class="ti-user p-r-10"></i>
                            <span>{{ __('profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
                            <i class="ti-power-off p-r-10"></i>
                            <span>{{ __('log out') }}</span>
                        </a>
                        {{ Form::open(['method' => 'post', 'url' => 'logout', 'id' => 'logout-form-admin']) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
