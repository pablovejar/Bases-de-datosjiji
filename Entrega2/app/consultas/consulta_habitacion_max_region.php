<?php include('../templates/header.html');   ?>

<body>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$region = $_POST["region_hab"];
$query = "SELECT hab.habid, hab.h_hid, hab.nombre_hab, hab.precio_hab, COUNT(hab.habid) AS countres
FROM reserva AS res, hotel AS hot, habitacion AS hab
WHERE res.r_habid = hab.habid AND hab.h_hid = hot.hid AND hot.h_rid = '$region'
GROUP BY hab.habid
HAVING COUNT(hab.habid) = (SELECT MAX(countres2) FROM ( SELECT COUNT(hab2.habid) AS countres2
  FROM reserva AS res2, hotel AS hot2, habitacion AS hab2
  WHERE res2.r_habid = hab2.habid AND hab2.h_hid = hot2.hid AND hot2.h_rid = '$region'
  GROUP BY hab2.habid) AS foo )
LIMIT 1;";
$result = $db -> prepare($query);
$result -> execute();
$habitaciones = $result -> fetchAll();
?>

<table>
    <tr>
        <th>ID Habitación</th>
        <th>ID Hotel</th>
        <th>Nombre Habitación</th>
        <th>Precio Habitación</th>
        <th>Número de Reservas</th>
    </tr>
    <?php
    foreach ($habitaciones as $hab) {
        echo "<tr> <td>$hab[0]</td> <td>$hab[1]</td> <td>$hab[2]</td>
        <td>$hab[3]</td> <td>$hab[4]</td></tr>";
    }
    ?>
</table>

<?php include('../templates/footer.html'); ?>
