<!DOCTYPE html>
<html lang="en">
    @include('admin.admin_layouts.head')
    <body>
        <div class="app header-success-gradient">
            <div class="layout">
                @include('admin.admin_layouts.header')
                @include('admin.admin_layouts.side_menu')
                
                <div class="page-container">
                    <!--Content-->
                    @yield('content')
                    <!--./Content -->
                </div>
            </div>
        </div>
    </body>
    @include('admin.admin_layouts.script')
    @yield('inline_scripts')
</html>
