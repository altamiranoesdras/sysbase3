<!-- Modal form create permissions -->
<div class="modal fade" id="modal-form-permissions">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" role="form" id="form-modal-permissions">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Nuevo Permission
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        @include('admin.permissions.fields')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnSubmitFormPermissions" data-loading-text="Guardando..." class="btn btn-primary" autocomplete="off">
                        Guardar
                    </button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /. Modal form create permissions -->

@push('scripts')
<!--    Scripts modal form create permissions
------------------------------------------------->
<script>

    //Cuando el modal se abre
    $('#modal-form-permissions').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Boton que abrió el modal
        var select2target = button.closest('div').find('select');


        //Envío del formulario del modal
        $("#form-modal-permissions").submit(function (e) {
            e.preventDefault();

            var data= $(this).serializeObject();

            logD('enviar formulario select2target: '+select2target.attr('id'),data);

            $('#btnSubmitFormPermissions').button('loading');

            var url = "{{route("api.permissions.store")}}";

            axios.post(url,data).then(response => {
                var data = response.data.data;
                var msg = response.data.message;

                logD('respuesta ajax: ',data);

                var option = new Option(data.name, data.name);
                //option.selected = true;

                //quita la opción seleccionada del select objetivo
                select2target.find('option:selected').attr("selected", false);
                //Cambia la opción del select objetivo por la creada
                select2target.append(option).trigger("change");


                $('#modal-form-permissions').modal('hide');

                iziTs(msg);

                $('#btnSubmitFormPermissions').button('reset');

                $("#form-modal-permissions")[0].reset();
            })
            .catch(error => {

                logE('respuesta ajax: '+error);
                $("#form-modal-permissions")[0].reset();

                if(error.response.data.errors){

                    alertError(erroresToList(error.response.data.errors))
                    logE(error);

                }else if(error.response.data.message) {

                    alertError(error.response.data.message);
                    logE(error.response.data.message);
                }

                $('#btnSubmitFormPermissions').button('reset');
            });


        });
        //Envío del formulario del modal

    });

    //Cuando el modal se cierra
    $('#modal-form-permissions').on('hidden.bs.modal', function (event) {

        //Elimina los eventos del formulario
        $("#form-modal-permissions").unbind();
    });
</script>
@endpush
