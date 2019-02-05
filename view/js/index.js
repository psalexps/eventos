$(document).ready(function () {

    $('#actualizarPagina').click(function () {
        setTimeout(function () {
            location.reload();
        }, 500);
    });

    $('.borrar').click(function () {
        $("#eliminarEvento").modal('show');
    });
    $('.borrarLocal').click(function () {
        $("#eliminarLocal").modal('show');
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

$(document).ready(function () {
    $("#busqueda").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tablaEventosBusqueda tr").filter(function () {
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

$('#modalModificarLocal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    var idLocal = button.data('idlocal');
    var nombreLocal = button.data('nombre');
    var categoria = button.data('categoria');
    var direccion = button.data('direccion');
    var telefono = button.data('telefono');
    var email = button.data('email');

    var modal = $(this);

    modal.find('.modal-body #idLocal').val(idLocal);
    modal.find('.modal-body #nombre').val(nombreLocal);
    modal.find('.modal-body #categoria').val(categoria);
    modal.find('.modal-body #direccion').val(direccion);
    modal.find('.modal-body #telefono').val(telefono);
    modal.find('.modal-body #email').val(email);

});


function modificar() {

    var datos = $('#formModificar').serialize();

    $.ajax({
        data: datos,
        url: 'index.php?controller=evento&action=modoficarEvento',
        type: 'post',
        success: function (data) {
            $('#modalModificar').modal('hide');
            $("#centralModalSuccess").modal('show');
        },
        error: function (data) {
            alert("Error " + data);
        }
    });

    return false;
}

function eliminar(id) {

    $('#confirmarBorrado').click(function () {

        $.ajax({
            data: {
                id: id
            },
            url: 'index.php?controller=evento&action=eliminarEvento',
            type: 'post',
            success: function (data) {
                $("#eliminarEvento").modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function (data) {
                alert("Error " + data);
            }
        });

    });

    return false;
}

function modificarL() {

    var datos = $('#formModificarLocal').serialize();
    
    $.ajax({
        data: datos,
        url: 'index.php?controller=local&action=modificarLocal',
        type: 'post',
        success: function (data) {
            $('#modalModificarLocal').modal('hide');
            $("#centralModalSuccess").modal('show');
        },
        error: function (data) {
            alert("Error " + data);
        }
    });

    return false;
}

function eliminarLocal(idLocal) {

    $('#confirmarBorrado').click(function () {
        $.ajax({
            data: {
                idLocal: idLocal
            },
            url: 'index.php?controller=local&action=eliminarLocal',
            type: 'post',
            success: function (data) {
                $("#eliminarLocal").modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 500);
            },
            error: function (data) {
                alert("Error " + data);
            }
        });

    });

    return false;

}