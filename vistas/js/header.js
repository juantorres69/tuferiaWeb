$(document).ready(function() {

    $('#cbCategorias').on('change', function() {
        location.href = $('#hdUrl').val() + $(this).val();
    });

    $('#frmBuscar').on('submit', function(e) {
        e.preventDefault();
        let categoria = $('#cbCategorias').val();
        if (categoria == '') {
            location.href = `${$('#hdUrl').val()}buscar/${$('#txtBuscar').val()}`;
        } else {
            location.href = `${$('#hdUrl').val()}buscar/${categoria}/${$('#txtBuscar').val()}`;
        }
    });

});