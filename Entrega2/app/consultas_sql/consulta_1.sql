SELECT plato.nombre_plato, plato.descripcion_plato, plato.precio_plato
FROM plato,
     restaurant,
     region
WHERE region.rid = '2'
  AND restaurant.re_rid = region.rid
  AND plato.restid_p = restaurant.restid ;
SELECT habitacion.nombre_hab, habitacion.habid, habitacion.precio_hab, hotel.nombre_hotel,
       hotel.estrellas
FROM habitacion, hotel
WHERE hotel.estrellas > 3 AND habitacion.h_hid = hotel.hid;
SELECT tour.tid, tour.descripcion_tour, tour.precio_tour
FROM tour, (SELECT agencia1.aid, agencia.rid
            FROM (SELECT agencia.aid, COUNT(*) AS cantidad
                  FROM agencia
                  GROUP BY agencia.aid
                  HAVING COUNT(aid) = 1) AS agencia1, agencia
            WHERE agencia1.aid = agencia.aid) AS agencia_n
WHERE tour.aid = agencia_n.aid AND agencia_n.rid = 14
GROUP BY tour.tid;
SELECT H1.nombre_hab
FROM habitacion AS H1
WHERE (SELECT COUNT(*)
    FROM habitacion AS H2
    WHERE H2.precio_hab > H1.precio_hab) <= 4000;
SELECT reserva.resvid, reserva.fecha_inicio, reserva.fecha_fin, habitacion.habid,
       habitacion.nombre_hab
FROM reserva, habitacion
WHERE reserva.r_uid = 332 AND reserva.r_habid = habitacion.habid
AND reserva.fecha_inicio > '2026-01-10' AND reserva.fecha_fin < '2030-08-30';
SELECT reserva.resvid, usuario.uid, usuario.nombre_usuario, usuario.correo_usuario,
       habitacion.precio_hab
FROM usuario, reserva, habitacion
WHERE usuario.uid = reserva.r_uid AND reserva.resvid = 5 AND
      habitacion.habid = reserva.r_habid;
SELECT usuario.uid, usuario.nombre_usuario, consulta1.habid, consulta1.nombre_hab, consulta1.precio_hab
FROM reserva, usuario, (SELECT H1.habid, H1.nombre_hab, H1.precio_hab, H2.hid, H2.nombre_hotel, H2.h_rid
                        FROM hotel H2, habitacion H1
                        WHERE H2.h_rid = 2
                          AND H1.h_hid = H2.hid
                          AND H1.precio_hab = (SELECT MIN(H1.precio_hab)
                           FROM habitacion H1, hotel H2 WHERE H2.h_rid = 2 AND H1.h_hid = H2.hid)) AS consulta1
WHERE reserva.r_uid = usuario.uid AND reserva.r_habid = consulta1.habid ;


SELECT H1.habid, H1.nombre_hab, H1.precio_hab, H2.hid, H2.nombre_hotel, H2.h_rid
FROM hotel H2, habitacion H1
WHERE H2.h_rid = 2 AND H1.h_hid = H2.hid AND H1.precio_hab = (SELECT MIN(H1.precio_hab)
FROM habitacion H1, hotel H2 WHERE H2.h_rid = 2 AND H1.h_hid = H2.hid) ;
SELECT MIN(habitacion.precio_hab)
FROM habitacion;
