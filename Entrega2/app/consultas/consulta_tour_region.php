<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $region = $_POST["region_tour"];
    $query = "SELECT tour.tid, tour.descripcion_tour, tour.precio_tour
FROM tour, (SELECT agencia1.aid, agencia.rid
            FROM (SELECT agencia.aid, COUNT(*) AS cantidad
                  FROM agencia
                  GROUP BY agencia.aid
                  HAVING COUNT(aid) = 1) AS agencia1, agencia
            WHERE agencia1.aid = agencia.aid) AS agencia_n
WHERE tour.aid = agencia_n.aid AND agencia_n.rid = $region
GROUP BY tour.tid;";
	$result = $db -> prepare($query);
	$result -> execute();
	$data = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>ID tour</th>
      <th>Descripción tour</th>
      <th>Precio tour</th>
    </tr>
  <?php
	foreach ($data as $d) {
  		echo "<tr><td>$d[0]</td> <td>$d[1]</td> <td>$d[2]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
