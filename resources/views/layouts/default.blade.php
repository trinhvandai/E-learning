<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    @yield('inline_styles')
    <body>
        @include('layouts.header')
        <!--Content-->
        @yield('content')
        <!--./Content -->
        @include('layouts.footer')
        @yield('inline_scripts')
    </body>
</html>
