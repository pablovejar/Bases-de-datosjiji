<?php include('../templates/header.html');   ?>

<body>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$region = $_POST["region"];
$query = "SELECT usuario.uid, usuario.nombre_usuario, consulta1.habid, consulta1.nombre_hab, consulta1.precio_hab
FROM reserva, usuario, (SELECT H1.habid, H1.nombre_hab, H1.precio_hab, H2.hid, H2.nombre_hotel, H2.h_rid
                        FROM hotel H2, habitacion H1
                        WHERE H2.h_rid = '$region'
                          AND H1.h_hid = H2.hid
                          AND H1.precio_hab = (SELECT MIN(H1.precio_hab)
                           FROM habitacion H1, hotel H2 WHERE H2.h_rid = '$region' AND H1.h_hid = H2.hid)) AS consulta1
WHERE reserva.r_uid = usuario.uid AND reserva.r_habid = consulta1.habid ;";
$result = $db -> prepare($query);
$result -> execute();
$habitaciones = $result -> fetchAll();
?>

<table>
    <tr>
        <th>ID Usuario</th>
        <th>Nombre Usuario</th>
        <th>ID Habitación</th>
        <th>Nombre Habitación</th>
        <th>Precio habitación</th>
    </tr>
    <?php
    foreach ($habitaciones as $hab) {
        echo "<tr> <td>$hab[0]</td> <td>$hab[1]</td> <td>$hab[2]</td> <td>$hab[3]</td> <td>$hab[4]</td> </tr>";
    }
    ?>
</table>

<?php include('../templates/footer.html'); ?>
