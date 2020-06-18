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
    .js('resources/js/hixe-form.js', 'public/js')
    .js('resources/js/utils.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/lib/jquery')
    .copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/lib/bootstrap')
    .copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/lib/bootstrap')
    .copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/lib/fullcalendar')
    .copy('node_modules/fullcalendar/dist/fullcalendar.min.css', 'public/lib/fullcalendar')
    .copy('node_modules/moment/min/moment.min.js', 'public/lib/moment')

    .copy('node_modules/datatables.net/js/jquery.dataTables.min.js', 'public/lib/datatables/min')
    .copy('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'public/lib/datatables/js')
    .copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/lib/datatables/css')
    // .copy('node_modules/datatables.net-autofill/js/dataTables.autoFill.min.js', 'public/lib/autoFill/min')
    .copy('node_modules/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js', 'public/lib/datatables/autoFill/js')
    .copy('node_modules/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css', 'public/lib/datatables/autoFill/css')

    .copy('node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css', 'public/lib/datatables/buttons/css')
    .copy('node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js', 'public/lib/datatables/buttons/js')

    .copy('node_modules/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css', 'public/lib/datatables/fixedheader/css')
    .copy('node_modules/datatables.net-fixedheader-bs4/js/fixedHeader.bootstrap4.min.js', 'public/lib/datatables/fixedheader/js')

    .copy('node_modules/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css', 'public/lib/datatables/keyTable/css')
    .copy('node_modules/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js', 'public/lib/datatables/keyTable/js')

    .copy('node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css', 'public/lib/datatables/responsive/css')
    .copy('node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js', 'public/lib/datatables/responsive/js')

    .copy('node_modules/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css', 'public/lib/datatables/rowGroup/css')
    .copy('node_modules/datatables.net-rowgroup-bs4/js/rowGroup.bootstrap4.min.js', 'public/lib/datatables/rowGroup/js')

    .copy('node_modules/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css', 'public/lib/datatables/scroller/css')
    .copy('node_modules/datatables.net-scroller-bs4/js/scroller.bootstrap4.min.js', 'public/lib/datatables/scroller/js')

    .copy('node_modules/datatables.net-searchpanes-bs4/css/searchPanes.bootstrap4.min.css', 'public/lib/datatables/searchPanes/css')
    .copy('node_modules/datatables.net-searchpanes-bs4/js/searchPanes.bootstrap4.min.js', 'public/lib/datatables/searchPanes/js')
