!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agrgar</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: red;}
    </style>
</head>
<body>
<?php
include '../../config/conexionBD.php';
$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"])) : null;
$marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"])) : null;
$modelo = isset($_POST["modelo"]) ? mb_strtoupper(trim($_POST["modelo"])) : null;
$numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null;
$fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
$hora = isset($_POST["hora"]) ? trim($_POST["hora"]) : null;

$sql = "SELECT usu_codigo FROM usuario WHERE usu_cedula = '$cedula'";
$result = $conn->query($sql);

if (!$result) {
}else {
    while ($fila = $result->fetch_assoc()) {
        $id = $fila["usu_codigo"];
    }
}

$sql2 = "INSERT INTO `vehiculo`(`vei_codigo`, `vei_placa`, `vei_marca`, `vei_modelo`, `vei_usu_codigo`) VALUES (0, '$placa', '$marca', '$modelo', '$id')";
if ($conn->query($sql2) === TRUE) {
    $sql1 = "SELECT vei_codigo FROM vehiculo WHERE vei_codigo=(SELECT max(vei_codigo) FROM vehiculo)";
    $result1 = $conn->query($sql1);
    while ($fila1 = $result1->fetch_assoc()) {
        $id1 = $fila1["vei_codigo"];
    }
    $sql3 = "INSERT INTO `ticket`(`tik_codigo`, `tik_numero`, `tik_fecha_ingreso`, `tik_hora_ing` ,`tik_vei_codigo`) VALUES (0,'$numero','$fecha','$hora','$id1')";
    if ($conn->query($sql3) === TRUE) {
        echo('entro');
        header( "Location: ../vista/datosUsuario.html");
    }
}

$conn->close();

?>
</body>
</html>