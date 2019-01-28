
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