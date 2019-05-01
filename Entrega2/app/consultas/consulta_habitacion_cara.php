<?php include('../templates/header.html');   ?>

<body>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$numhab = $_POST["ihabitacion"];
$query = "SELECT hab.habid, hab.h_hid, hab.nombre_hab, hot.nombre_hotel, hab.precio_hab
FROM habitacion AS hab, hotel AS hot
WHERE hab.h_hid = hot.hid AND ($numhab - 1) = (SELECT COUNT(*)
                                    FROM habitacion AS habita2
                                    WHERE habita2.precio_hab > hab.precio_hab);";
$result = $db -> prepare($query);
$result -> execute();
$habitaciones = $result -> fetchAll();
?>

<table>
    <tr>
        <th>ID Habitación</th>
        <th>ID Hotel</th>
        <th>Nombre Habitación</th>
        <th>Nombre Hotel</th>
        <th>Precio Habitación</th>
    </tr>
    <?php
    foreach ($habitaciones as $hab) {
        echo "<tr> <td>$hab[0]</td> <td>$hab[1]</td> <td>$hab[2]</td> <td>$hab[3]</td> <td>$hab[4]</td> </tr>";
    }
    ?>
</table>

<?php include('../templates/footer.html'); ?>
