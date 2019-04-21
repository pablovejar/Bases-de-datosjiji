<?php include('../templates/header.html');   ?>

<body>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$reserva = $_POST["reserva"];
$query = "SELECT reserva.resvid, usuario.uid, usuario.nombre_usuario, usuario.correo_usuario,
       habitacion.precio_hab
FROM usuario, reserva, habitacion
WHERE usuario.uid = reserva.r_uid AND reserva.resvid = '$reserva' AND
      habitacion.habid = reserva.r_habid;";
$result = $db -> prepare($query);
$result -> execute();
$reservas = $result -> fetchAll();
?>

<table>
    <tr>
        <th>ID Reserva</th>
        <th>ID Usuario</th>
        <th>Nombre Usuario</th>
        <th>Correo Usuario</th>
        <th>Precio de reserva</th>
    </tr>
    <?php
    foreach ($reservas as $res) {
        echo "<tr> <td>$res[0]</td> <td>$res[1]</td> <td>$res[2]</td> <td>$res[3]</td> <td>$res[4]</td> </tr>";
    }
    ?>
</table>

<?php include('../templates/footer.html'); ?>
