
$(document).ready(function () {

    $('#actualizarPagina').click(function () {
        location.reload();
    });

    $('#borrar').click(function () {
        $("#eliminarEvento").modal('show');
    });

});

$('#eventos').click(function () {

    $('#locales').removeClass("active");
    $('#eventos').addClass("active");

});

$('#locales').click(function () {

    $('#eventos').removeClass("active");
    $('#locales').addClass("active");

});

$(document).ready(function(){
    $("#busqueda").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tablaEventosBusqueda tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


$('#modalModificar').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    var idEvento = button.data('idevento');
    var nombreEvento = button.data('nombre');
    var tipoEvento = button.data('tipo');
    var fechaEvento = button.data('fecha');
    var descripcionEvento = button.data('descripcion');
    var localEvento = button.data('nombrelocal');
    var idLocal = button.data('idlocal');

    var modal = $(this);

    modal.find('.modal-body #idEvento').val(idEvento);
    modal.find('.modal-body .nombreEvento').val(nombreEvento);
    modal.find('.modal-body .tipoEvento').val(tipoEvento);
    modal.find('.modal-body .fechaEvento').val(fechaEvento);
    modal.find('.modal-body .descripcionEvento').val(descripcionEvento);
    modal.find('.modal-body #optionSelected').val(idLocal);
    modal.find('.modal-body #lugarSelec').html(localEvento);

});

function modificar() {

    var datos = $('#formModificar').serialize();

    $.ajax({
        data:  datos,
        url:   'index.php?controller=evento&action=modoficarEvento',
        type:  'post',
        success:  function (data) {
            $('#modalModificar').modal('hide');
            $("#centralModalSuccess").modal('show');
        },
        error: function (data) {
            alert("Error "+data);
        }
    });

    return false;
}

function eliminar(idEvento) {

    $('#confirmarBorrado').click(function () {

        $.ajax({
            data:  {idEvento: idEvento},
            url:   'index.php?controller=evento&action=eliminarEvento',
            type:  'post',
            success:  function (data) {
                $("#eliminarEvento").modal('hide');
                setTimeout (function () {
                    location.reload();
                },500);
            },
            error: function (data) {
                alert("Error "+data);
            }
        });

    });

    return false;
}