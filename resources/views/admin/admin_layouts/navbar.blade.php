<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>
                            {{ __('admin dashboard') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">{{ __('profile_info') }}</a></li>
                        <li class="divider"></li>
                        <li><a href="#">{{ __('log out') }}</a></li>
                    </ul>
                </li>
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>
