<?php include('../templates/header.html');   ?>

<body>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$usuario = $_POST["usuario"];
$inicio = $_POST["inicio"];
$fin = $_POST["fin"];
$query = "SELECT reserva.resvid, reserva.fecha_inicio, reserva.fecha_fin, habitacion.habid,
       habitacion.nombre_hab
FROM reserva, habitacion
WHERE reserva.r_uid = '$usuario' AND reserva.r_habid = habitacion.habid
AND reserva.fecha_inicio > '$inicio' AND reserva.fecha_fin < '$fin' ; ";
$result = $db -> prepare($query);
$result -> execute();
$reservas = $result -> fetchAll();
?>

<table>
    <tr>
        <th>ID Reserva</th>
        <th>Inicio de reserva</th>
        <th>Fin de reserva</th>
        <th>ID Habitación</th>
        <th>Nombre habitación</th>
    </tr>
    <?php
    foreach ($reservas as $res) {
        echo "<tr> <td>$res[0]</td> <td>$res[1]</td> <td>$res[2]</td> <td>$res[3]</td> <td>$res[4]</td> </tr>";
    }
    ?>
</table>

<?php include('../templates/footer.html'); ?>
