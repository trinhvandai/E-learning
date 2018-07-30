<div class="sidebar" data-color="blue">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('adminDashboard') }}" class="simple-text">
                {{ __('admin') }} 
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{ route('adminDashboard') }}">
                    <i class="fa fa-clipboard"></i>
                    <p>{{ __('admin dashboard') }}</p>
                </a>
            </li>
            <li>
                <a href="/admin/users">
                    <i class="fa fa-user"></i>
                    <p>{{ __('users') }}</p>
                </a>
            </li>
            <li>
                <a href="/admin/specializes">
                    <i class="fa fa-archive"></i>
                    <p>{{ __('specializes') }}</p>
                </a>
            </li>
            <li>
                <a href="/admin/online_classrooms">
                    <i class="fa fa-group"></i>
                    <p>{{ __('online classrooms') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
