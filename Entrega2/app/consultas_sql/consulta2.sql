SELECT *
FROM habitacion, hotel
WHERE hotel.estrellas > 3 AND habitacion.h_hid = hotel.hid;