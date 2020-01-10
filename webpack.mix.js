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
    .copy('node_modules/admin-lte/dist/js/demo.js','public/js');

