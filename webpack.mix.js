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
    .copy('node_modules/admin-lte/dist/img','public/dist/img')
    .copy('node_modules/admin-lte/plugins/sparklines/sparkline.js','public/js')
    .copy('node_modules/admin-lte/plugins/moment/moment.min.js','public/js')
    .copy('node_modules/admin-lte/dist/js/pages/dashboard.js','public/js')
    .copy('node_modules/admin-lte/dist/js/demo.js','public/js')

    .copy('node_modules/admin-lte/plugins/fullcalendar/main.min.css','public/plugins/fullcalendar')
    .copy('node_modules/admin-lte/plugins/fullcalendar-daygrid/main.min.css','public/plugins/fullcalendar-daygrid')
    .copy('node_modules/admin-lte/plugins/fullcalendar-timegrid/main.min.css','public/plugins/fullcalendar-timegrid')
    .copy('node_modules/admin-lte/plugins/fullcalendar-bootstrap/main.min.css','public/plugins/fullcalendar-bootstrap')

    .copy('node_modules/admin-lte/plugins/fullcalendar/main.min.js','public/plugins/fullcalendar')
    .copy('node_modules/admin-lte/plugins/fullcalendar-interaction/main.min.js','public/plugins/fullcalendar-interaction')
    .copy('node_modules/admin-lte/plugins/fullcalendar-daygrid/main.min.js','public/plugins/fullcalendar-daygrid')
    .copy('node_modules/admin-lte/plugins/fullcalendar-timegrid/main.min.js','public/plugins/fullcalendar-timegrid')
    .copy('node_modules/admin-lte/plugins/fullcalendar-bootstrap/main.min.js','public/plugins/fullcalendar-bootstrap')

    .copy('node_modules/gijgo/js/gijgo.min.js','public/js')
    .copy('node_modules/gijgo/js/messages/messages.es-es.min.js','public/js')
    .copy('node_modules/gijgo/css/gijgo.min.css','public/css')
    .copy('node_modules/gijgo/fonts','public/fonts');

