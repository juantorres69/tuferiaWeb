
alert("está conectado"); // por que no sale el alert

function comprobar(Obj){
    if (Obj.checked)
        document.getElementById('acepto').disabled = true;
    else
        document.getElementById('acepto').disabled = false;
}