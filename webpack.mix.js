const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/dashforge.js', 'public/assets/js')
    .js('resources/assets/js/dashforge.settings.js', 'public/assets/js')
    .js('resources/assets/lib/jquery/jquery.min.js', 'public/assets/js')
    .js('resources/assets/lib/js-cookie/js.cookie.js', 'public/assets/js')
     .js('resources/assets/lib/bootstrap/js/bootstrap.bundle.min.js', 'public/assets/js')
     .js('resources/assets/lib/feather-icons/feather.min.js', 'public/assets/js')
     .js('resources/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js', 'public/assets/js')
     .postCss('resources/assets/lib/@fortawesome/fontawesome-free/css/all.min.css', 'public/assets/lib/@fortawesome/fontawesome-free/css', [])
     .postCss('resources/assets/lib/ionicons/css/ionicons.min.css', 'public/assets/lib/ionicons/css/', [])
     .postCss('resources/assets/css/dashforge.css', 'public/assets/css/', [])
     .postCss('resources/assets/css/dashforge.auth.css', 'public/assets/css/', [])
     .postCss('resources/assets/css/dashforge.landing.css', 'public/assets/css/', [])
     .copyDirectory('resources/assets/img', 'public/assets/img');
