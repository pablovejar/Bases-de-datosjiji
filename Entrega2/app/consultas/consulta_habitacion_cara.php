<?php include('../templates/header.html');   ?>

<body>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$indice = $_POST["estrellas"];
$query = "SELECT habitacion.nombre_hab, habitacion.habid, habitacion.precio_hab, hotel.nombre_hotel,
       hotel.estrellas
FROM habitacion, hotel
WHERE hotel.estrellas > '$stars' AND habitacion.h_hid = hotel.hid;";
$result = $db -> prepare($query);
$result -> execute();
$habitaciones = $result -> fetchAll();
?>

<table>
    <tr>
        <th>Nombre habitación</th>
        <th>ID habitación</th>
        <th>Precio habitación</th>
        <th>Nombre hotel</th>
        <th>Estrellas</th>
    </tr>
    <?php
    foreach ($habitaciones as $hab) {
        echo "<tr> <td>$hab[0]</td> <td>$hab[1]</td> <td>$hab[2]</td> <td>$hab[3]</td> <td>$hab[4]</td> </tr>";
    }
    ?>
</table>

<?php include('../templates/footer.html'); ?>
