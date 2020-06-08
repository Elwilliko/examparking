<?php
//incluir conexión a la base de datos
include '../../config/conexionBD.php';

session_start();

$cedula = $_GET['cedula'];

$sql = "SELECT u.usu_cedula, u.usu_nombres, u.usu_direccion, u.usu_telefono, v.vei_placa, v.vei_marca, v.vei_modelo, t.tik_numero, t.tik_fecha_ingreso, t.tik_hora_ing, t.tik_fecha_salida, t.tik_hora_sal
 FROM usuario u, vehiculo v, ticket t 
 WHERE u.usu_codigo = v.vei_usu_codigo
 AND v.vei_codigo = t.tik_vei_codigo AND usu_cedula = '$cedula'";

$result = $conn->query($sql);
echo "    <style>
                    table, th, td {
                        margin-top: 20px;
                        border: 1px solid brown;
                        color: darkgreen;
                        
                    }
                </style>

                <table>
                <tr>
                    <th>Cedula</th>
                    <th>Nombres</th>  
                    <th>Direccion</th>        
                    <th>Telefono</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Numero</th>
                    <th>Fecha Ingreso</th>
                    <th>Hora Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Hora Salida</th>    
                </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "   <td>" . $row['usu_cedula'] . "</td>";
        echo "   <td>" . $row['usu_nombres'] ."</td>";
        echo "   <td>" . $row['usu_direccion'] ."</td>";
        echo "   <td>" . $row['usu_telefono'] . "</td>";
        echo "   <td>" . $row['vei_placa'] . "</td>";
        echo "   <td>" . $row['vei_marca'] . "</td>";
        echo "   <td>" . $row['vei_modelo'] . "</td>";
        echo "   <td>" . $row['tik_numero'] . "</td>";
        echo "   <td>" . $row['tik_fecha_ingreso'] . "</td>";
        echo "   <td>" . $row['tik_hora_ing'] . "</td>";
        echo "   <td>" . $row['tik_fecha_salida'] . "</td>";
        echo "   <td>" . $row['tik_hora_sal'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "   <td colspan='7'> Datos no ingresados </td>";
    echo "</tr>";
}
echo "</table>";
$conn->close();

?>
