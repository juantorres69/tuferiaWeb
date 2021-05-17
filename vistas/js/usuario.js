// CAPTURA DE RUTA
var rutaActual = location.href;

$(".btnIngreso").click(function(){
    localStorage.setItem("rutaActual", rutaActual)
})
