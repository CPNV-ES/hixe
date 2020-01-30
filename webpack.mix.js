const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/lib/jquery')
    .copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/lib/bootstrap')
    .copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/lib/bootstrap');
