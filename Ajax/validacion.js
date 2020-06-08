function insertarU() {
    let params = new URLSearchParams(location.search);
    var cedula = params.get('usu_cedula');
    var placa = params.get('vei_placa');
    var marca = params.get('vei_marca');
    var modelo = params.get('vei_modelo');
    var numero = params.get('tik_numero');
    var fecha = params.get('tik_fecha');
    var hora = params.get('tik_hora');

    if (cedula != ""){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue cedula");
                //document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../admin/controlador/datosUsuario.php?usu_cedula="+cedula+"&vei_placa="+placa+"&vei_marca="+marca+"&vei_modelo="+modelo+"&tik_numero="+numero+"&tik_fecha="+fecha+"&tik_hora="+hora,true);
        xmlhttp.send();

    }
    return false;
}
