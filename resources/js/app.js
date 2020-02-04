/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

require('admin-lte/plugins/jquery-ui/jquery-ui.min');

$.widget.bridge('uibutton', $.ui.button);

require('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js');

require ('admin-lte/plugins/chart.js/Chart.min.js');

require ('admin-lte/plugins/jqvmap/jquery.vmap.min.js');

require ('admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js');

require ('admin-lte/plugins/jquery-knob/jquery.knob.min.js');

require ('admin-lte/plugins/daterangepicker/daterangepicker.js');

require ('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min');

require('admin-lte/plugins/summernote/summernote-bs4.min.js');

require('admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');

require('admin-lte/dist/js/adminlte.min');


require('datatables.net-bs4');
require('datatables.net-buttons-bs4');
require('datatables.net-fixedheader-bs4');
require('datatables.net-responsive-bs4');
require('../../public/vendor/datatables/buttons.server-side');

require('./jquery.bootstrap-duallistbox.js');

window.Cropper  = require('cropperjs/dist/cropper.min');

/**
 * Funciones personalizadas
 */
require('./fn.js');


var { log, logI, logD, logW, logE, logConfig } = require("./override-console-log");

window.log = log;
window.logI = logI;
window.logD = logD;
window.logW = logW;
window.logE = logE;
window.logConfig = logConfig;

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
