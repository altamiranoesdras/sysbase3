import iziToast from "izitoast/dist/js/iziToast.min"

window.iziTi = (tile,message) => {
    iziToast.info({
        title: tile,
        message: message || " ",
    });
}

window.iziTs = (tile,message) => {
    iziToast.success({
        title: tile,
        message: message || " ",
    });
}

window.iziTw = (tile,message) => {
    iziToast.warning({
        title: tile,
        message: message || " ",
    });
}

window.iziTe = (tile,message) => {
    iziToast.error({
        title: tile,
        message: message || " ",
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

window.alertInfo = (title,text,html,time) => {

    html = html || false;

    var options = {
        icon: "info",
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
window.alertError = (title,text,html,time) => {

    html = html || false;

    var options = {
        icon: "error",
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



// oculta los alertas de request error
// $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

window.errorToList = (errors) => {
    var res ="<ul style='list-style-type: none; padding:0px;'>";


    if (Array.isArray(errors)){
        errors.forEach(function (value) {
            res = res+'<li style="margin-bottom: .5rem">'+value+'</li>';

        })
    }else {


        const entries = Object.entries(errors);

        for (const [field, fieldErrors] of entries) {

            fieldErrors.forEach(function (value) {
                res = res+'<li style="margin-bottom: .5rem">'+value+'</li>';

            })
        }
    }

    res= res+'<ul/>';

    return res;
}


window.notifyErrorApi = (e) =>{


    if (typeof e.response !== 'undefined'){


        var errors = e.response.data.errors;

        if(typeof errors !== 'undefined'){

            iziTe(errorToList(errors));

        }else if(e.response.data.message){

            iziTe(e.response.data.message)
        }
    }

    logW(e);

}

// Global event bus
Vue.prototype.$eventBus = new Vue();


$(".wait-on-submit").submit(function( event ) {

    Swal.fire({
        title: 'Espera por favor...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        timerProgressBar: true,
    });

    Swal.showLoading();
});
