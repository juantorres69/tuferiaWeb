function eliminarDeseo(id, url) {
    $.ajax({
        url: `${url}ajax/deseos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { 'accion': 'eliminarDeseo', id },
        success: function(res) {
            location.href = `${url}deseos`;
        }
    });
}