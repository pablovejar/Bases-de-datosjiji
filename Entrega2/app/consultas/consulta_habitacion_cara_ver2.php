<?php include('../templates/header.html');   ?>

<body>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$numhab = $_POST["ihabitacion"];
$query = "SELECT h.nombre_hab
  FROM habitacion AS h
  WHERE (SELECT COUNT(*)
        FROM habitacion AS h2
        WHERE h2.precio_hab > h.precio_hab) = ('$numhab' - 1);";
$result = $db -> prepare($query);
$result -> execute();
$habitaciones = $result -> fetchAll();
?>

<table>
    <tr>
        <th>Nombre I-ésima habitación</th>
    </tr>
    <?php
    foreach ($habitaciones as $habit) {
        echo "<tr> <td>$habit[0]</td> </tr>";
    }
    ?>
</table>

<?php include('../templates/footer.html'); ?>
