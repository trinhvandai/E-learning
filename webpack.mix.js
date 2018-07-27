let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copyDirectory('resources/assets/css-hungph', 'public/assets');

mix.copyDirectory('resources/assets/js-hungph', 'public/assets');

mix.styles([
    'resources/assets/LMS/css/light-bootstrap-dashboard.css',
    'resources/assets/LMS/css/animate.min.css'
], 'public/assets/css/admin.css');

mix.copy('resources/assets/LMS/js/jquery.3.2.1.min.js', 'public/assets/js');
mix.copy('resources/assets/LMS/js/bootstrap-notify.js', 'public/assets/js');

mix.js([  
    'resources/assets/LMS/js/bootstrap-select.js',
    'resources/assets/LMS/js/light-bootstrap-dashboard.js'
], 'public/assets/js/admin.js');
