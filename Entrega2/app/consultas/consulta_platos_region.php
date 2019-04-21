<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $region = $_POST["region_elegida"];
  $query =
      <<<Consulta_1
SELECT plato.nombre_plato, plato.descripcion_plato, plato.precio_plato
FROM plato,
     restaurant,
     region
WHERE region.rid = '$region'
  AND restaurant.re_rid = region.rid
  AND plato.restid_p = restaurant.restid ;
Consulta_1;

  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Nombre del plato</th>
      <th>Descripción</th>
      <th>Precio del plato</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
