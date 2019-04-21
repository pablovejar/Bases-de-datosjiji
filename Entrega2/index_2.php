<?php include('templates/header.html');   ?>

<body>

  <h1 style="background-color: PaleVioletRed; font-family: Verdana, sans-serif; font-size: 25pt;">Vacaciones y datos</h1>
  <p style="color:white; font-family: Verdana; font-size: 20pt;">En esta página web, podrás realizar las consultas que quieras acerca de los hoteles y sus habitaciones en las distintas regiones, y también acerca de los restaurantes y sus platos. Podrás consultar por usuario, ver reservas y entre muchas consultas más.</p>

  <br>

  <h3 style="color:black; font-size: 24pt;">Consultas:</h3>
  <br>
  <p style="color:white; font-family: Verdana; font-size: 18pt;">Consulta 1: Mostrar platos en la región "x". <br>
    <br>
    <form action="consultas/consulta_platos_region.php" method="post">
    Región:
    <input type="text" name="region_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
    <br>
    Consulta 2: Habitaciones de hotel con más de "n" estrellas.<br>
    <br>
    Consulta 3: Reservas realizadas por usuario "i" entre dos fechas.<br>
    <br>

    Consulta 4: Tour de las agencias que sólo están en una región.<br>
    Consuta 5: Habitación más reservada por región. <br>
    Consulta 6: Usuarios que han reservado la habitación más barata de la región "x".<br>
    Consulta 7: Mostrar usuario y monto de la reserva "i".<br>
    Consulta 8: Mostrar la i-ésima habitación más cara.
  </p>

  
  <br><br><br><br>
</body>
</html>
