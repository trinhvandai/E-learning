<!DOCTYPE html>
<html lang="en">
    @include('admin.admin_layouts.head')
    @yield('inline_styles')
    <body>
        <div class="wrapper">
            @include('admin.admin_layouts.side_menu')
            <div class="main-panel">
                @include('admin.admin_layouts.navbar')
                <!--Content-->
                @yield('content')
                <!--./Content -->
            </div>
        </div>
    </body>
    @include('admin.admin_layouts.script')
    @yield('inline_scripts')
</html>
