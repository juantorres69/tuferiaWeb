function aceptar(){
    aceptar = document.getElementById("aceptar").value;

    if(aceptar == false){
        document.getElementById("aceptar").disable = false;
    }else{
        document.getElementById("aceptar").disable = true;
    }
}
document.getElementById("aceptar").addEventListener("nose", habilitar) 