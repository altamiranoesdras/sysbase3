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

require('admin-lte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min');

import iziToast from "izitoast/dist/js/iziToast.min"

window.iziTi = (tile,message) => {
    iziToast.info({
        title: tile,
        message: message || null,
    });
}

window.iziTs = (tile,message) => {
    iziToast.success({
        title: tile,
        message: message || null,
    });
}

window.iziTw = (tile,message) => {
    iziToast.warning({
        title: tile,
        message: message || null,
    });
}

window.iziTe = (tile,message) => {
    iziToast.error({
        title: tile,
        message: message || null,
    });
}

$('.duallistbox').bootstrapDualListbox()


$('[data-toggle="tooltip"]').tooltip();

window.Swal = require('sweetalert2')

window.alertSucces = (title,text,html,time) => {

    html = html || false;

    var options = {
        icon: 'success',
        title: title,
        text: text || false,
        timer: time || 5000
    }

    if(html){
        delete options.text;
        options['html'] = html;
    }


    Swal.fire(options);

}

window.alertWarning = (title,text,html,time) => {

    html = html || false;

    var options = {
        icon: "warning",
        title: title,
        text: text || false,
        timer: time || false
    }

    if(html){
        delete options.text;
        options['html'] = html;
    }


    Swal.fire(options);

}

window.errors2List = (errors) => {

    var res ="<b><ul style='list-style-type: none; padding:0px;'>";

    $.each(errors,function (field,fieldErrors) {

        $.each(fieldErrors,function (index,error) {
            res = res+'<li>'+error+'</li>';
        })
    })

    res =res+'</ul></b>';

    return res;
}

window.$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

/**
 * Funcion para confirmar la eliminacion de los registros de cualquier datatable
 * @param data
 */
window.deleteItemDt = (data) =>{
    var id = $(data).data('id');

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, elimínalo\n!'
    }).then((result) => {
        if (result.value) {
            $("#delete-form"+id).submit();
        }
    });
}

$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
