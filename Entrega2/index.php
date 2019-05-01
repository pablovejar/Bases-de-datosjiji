<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Entrega 2 - Grupo 47 | IIC2413-1</title>
</head>

<body>

  <h1 style="background-color: PaleVioletRed; font-family: Verdana, sans-serif; font-size: 25pt;">Vacaciones y datos</h1>
  <p style="color:black; font-size: 20pt;">En esta página web, podrás realizar las consultas que
      quieras acerca de los hoteles y sus habitaciones en las distintas regiones, y también acerca de los restaurantes
      y sus platos. Podrás consultar por usuario, ver reservas y entre muchas consultas más.</p>

  <br>

  <h3 style="color:black; font-size: 24pt;">Consultas:</h3>
  <br>
  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 1: </h1>
  <p>Mostrar platos en la región "x". </p>

    <form action="Entrega2/app/consultas/consulta_platos_region.php" method="post">
    Región:
    <input type="text" name="region_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
    <br>
  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 2: </h1>
    <p>
        Habitaciones de hotel con más de "n" estrellas.</p>
  <form action="Entrega2/app/consultas/consulta_hotel_estrellas.php" method="post">
      Cantidad de estrellas:
      <input type="text" name="estrellas">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>
  <br>
    <br>
  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 3: </h1>
  <p> Reservas realizadas por usuario "i" entre dos fechas a y b. </p>

  <form action="Entrega2/app/consultas/consulta_usuario_fecha.php" method="post">
      ID Usuario:
      <input type="text" name="usuario">
      <br/>
      Fecha inicio:
      <input type="date" name="inicio">
      <br/>
      Fecha fin:
      <input type="date" name="fin">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>
  <br>
    <br>
  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 4: </h1>
  <p> Tour de las agencias que sólo están en la región "x". </p>
  <form action="Entrega2/app/consultas/consulta_tour_region.php" method="post">
      Región:
      <input type="text" name="region_tour">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>
  <br>

  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 5: </h1>
  <p> Habitación más reservada por región.</p> <br>
  <form action="Entrega2/app/consultas/consulta_habitacion_max_region.php" method="post">
      Región:
      <input type="text" name="region_hab">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>
  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 6: </h1>
  <p> Usuarios que han reservado la habitación más barata de la región "x". </p>
  <form action="Entrega2/app/consultas/consulta_usuario_barata.php" method="post">
      Región:
      <input type="text" name="region">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>
  <br>
  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 7: </h1>
  <p> Mostrar usuario y monto de la reserva "i". </p> <br>
  <form action="Entrega2/app/consultas/consulta_precio_reserva.php" method="post">
      ID reserva:
      <input type="text" name="reserva">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>
  <br>
  <h1 style="color:black; font-family: Verdana; font-size: 16pt;">Consulta 8: </h1>
  <p>Mostrar la i-ésima habitación más cara. </p>
  <form action="Entrega2/app/consultas/consulta_habitacion_cara.php" method="post">
      I-ésima habitación:
      <input type="number" name="ihabitacion">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>

  <br><br><br><br>
</body>
</html>
