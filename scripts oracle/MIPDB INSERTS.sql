INSERT INTO "ADMIN"."CATEGORIA" (NOMBRE_CATEGORIA, DESCRIPCION_CATEGORIA) VALUES (N'DESKTOP', N'SON ESCRITORIOS');
INSERT INTO "ADMIN"."CATEGORIA" (NOMBRE_CATEGORIA, DESCRIPCION_CATEGORIA) VALUES (N'LAPTOPS', N'SON PORTABLES');
INSERT INTO "ADMIN"."CATEGORIA" (NOMBRE_CATEGORIA, DESCRIPCION_CATEGORIA) VALUES (N'VIDEOJUEGOS', N'SON ENTRETENIMIENTO INTERACTIVO');
INSERT INTO "ADMIN"."CATEGORIA" (NOMBRE_CATEGORIA, DESCRIPCION_CATEGORIA) VALUES (N'PELICULAS', N'SON ENTRETENIMIENTO VISUAL');
INSERT INTO "ADMIN"."CATEGORIA" (NOMBRE_CATEGORIA, DESCRIPCION_CATEGORIA) VALUES (N'CANCIONES', N'SON ENTRETENIMIENTO AUDITIVO');

INSERT INTO "ADMIN"."CLIENTE" (NIT_CLIENTE, NOMBRE_CLIENTE, DIRECCION_CLIENTE, TELEFONO) VALUES ('12348784', N'EDWIN CASTILLO', N'OTRA CASITA', '54632145');
INSERT INTO "ADMIN"."CLIENTE" (NIT_CLIENTE, NOMBRE_CLIENTE, DIRECCION_CLIENTE, TELEFONO) VALUES ('12344654', N'MORENO SARMIENTO', N'TU OTRA CASITA', '54485488');
INSERT INTO "ADMIN"."CLIENTE" (NIT_CLIENTE, NOMBRE_CLIENTE, DIRECCION_CLIENTE, TELEFONO) VALUES ('12313584', N'EFRAIN ALEXANDER', N'SU OTRA CASITA', '54864525');

INSERT INTO "ADMIN"."PROVEEDOR" (NIT_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, TELEFONO) VALUES ('12364895', N'FULANO', N'TANGAMANDAPIO', '45621878');
INSERT INTO "ADMIN"."PROVEEDOR" (NIT_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, TELEFONO) VALUES ('36412565', N'SUTANO', N'TANGAMANDAPIO 1', '45548878');
INSERT INTO "ADMIN"."PROVEEDOR" (NIT_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, TELEFONO) VALUES ('12331895', N'MENGANO', N'TANGAMANDAPIO 2', '45696878');


INSERT INTO "ADMIN"."PRODUCTO" (NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO, EXISTENCIA, PRECIO_COMPRA, CATEGORIA_ID_CATEGORIA) VALUES (N'DESKTOP HP', N'ES DE ULTIMA GENERACION EN HP', '15', '11000', '1');
INSERT INTO "ADMIN"."PRODUCTO" (NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO, EXISTENCIA, PRECIO_COMPRA, CATEGORIA_ID_CATEGORIA) VALUES (N'LAPTOP DELL', N'ES DE ULTIMA GENERACION EN DELL', '10', '8500', '2');
INSERT INTO "ADMIN"."PRODUCTO" (NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO, EXISTENCIA, PRECIO_COMPRA, CATEGORIA_ID_CATEGORIA) VALUES (N'JUEGO DE CRASH', N'ES EL REMASTERED DE CRASH', '100', '430', '3');
INSERT INTO "ADMIN"."PRODUCTO" (NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO, EXISTENCIA, PRECIO_COMPRA, CATEGORIA_ID_CATEGORIA) VALUES (N'PELICULA DE AVENGERS', N'PELICULAS BUENAS PERO INFRAVALORADAS', '30', '60', '4');
INSERT INTO "ADMIN"."PRODUCTO" (NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO, EXISTENCIA, PRECIO_COMPRA, CATEGORIA_ID_CATEGORIA) VALUES (N'CANCION HOMURA', N'ES CUANDO MUERE RENGOKU-SAN', '250', '15.50', '5');


INSERT INTO "ADMIN"."USERS" (NAME, EMAIL, PASSWORD) VALUES ('Edwin Barrera', 'admin1@tienda.com', '12345678');
INSERT INTO "ADMIN"."USERS" (NAME, EMAIL, PASSWORD) VALUES ('Bryan Moreno', 'admin2@tienda.com', '12345678');
INSERT INTO "ADMIN"."USERS" (NAME, EMAIL, PASSWORD) VALUES ('Efrain de Leon', 'admin3@tienda.com', '12345678');
INSERT INTO "ADMIN"."USERS" (NAME, EMAIL, PASSWORD) VALUES ('Fernando Barrera', 'admin4@tienda.com', '12345678');


INSERT INTO "ADMIN"."FACTURA_COMPRA" (NO_COMPRA, FECHA_COMPRA, PROVEEDOR_ID_PROVEEDOR, USERS_ID) VALUES ('1313', TO_DATE('2021-05-07 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '1', '1');
INSERT INTO "ADMIN"."FACTURA_COMPRA" (NO_COMPRA, FECHA_COMPRA, PROVEEDOR_ID_PROVEEDOR, USERS_ID) VALUES ('6345', TO_DATE('2021-04-09 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '2', '3');
INSERT INTO "ADMIN"."FACTURA_COMPRA" (NO_COMPRA, FECHA_COMPRA, PROVEEDOR_ID_PROVEEDOR, USERS_ID) VALUES ('1320', TO_DATE('2021-04-25 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '1', '2');
INSERT INTO "ADMIN"."FACTURA_COMPRA" (NO_COMPRA, FECHA_COMPRA, PROVEEDOR_ID_PROVEEDOR, USERS_ID) VALUES ('3200', TO_DATE('2021-05-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '3', '1');


INSERT INTO "ADMIN"."FACTURA_VENTA" (FECHA_VENTA, CLIENTE_ID_CLIENTE, USERS_ID) VALUES ( TO_DATE('2021-04-20 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '1', '1');
INSERT INTO "ADMIN"."FACTURA_VENTA" (FECHA_VENTA, CLIENTE_ID_CLIENTE, USERS_ID) VALUES ( TO_DATE('2021-04-21 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '2', '3');
INSERT INTO "ADMIN"."FACTURA_VENTA" (FECHA_VENTA, CLIENTE_ID_CLIENTE, USERS_ID) VALUES ( TO_DATE('2021-04-30 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '1', '2');
INSERT INTO "ADMIN"."FACTURA_VENTA" (FECHA_VENTA, CLIENTE_ID_CLIENTE, USERS_ID) VALUES ( TO_DATE('2021-05-07 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), '3', '1');


INSERT INTO "ADMIN"."DETALLE_VENTA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, FACTURA_VENTA_ID_VENTA, PRECIO_VENTA) VALUES ('3','1', '1', '11000');
INSERT INTO "ADMIN"."DETALLE_VENTA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, FACTURA_VENTA_ID_VENTA, PRECIO_VENTA) VALUES ('1','2', '1', '8500');
INSERT INTO "ADMIN"."DETALLE_VENTA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, FACTURA_VENTA_ID_VENTA, PRECIO_VENTA) VALUES ('5','2', '2', '8500');
INSERT INTO "ADMIN"."DETALLE_VENTA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, FACTURA_VENTA_ID_VENTA, PRECIO_VENTA) VALUES ('15','3', '3', '430');
INSERT INTO "ADMIN"."DETALLE_VENTA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, FACTURA_VENTA_ID_VENTA, PRECIO_VENTA) VALUES ('20','5', '4', '15.5');


INSERT INTO "ADMIN"."DETALLE_COMPRA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, PRECIO_PRODUCTO, FACTURA_COMPRAS_ID_COMPRA) VALUES ('5', '1', '250.00', '1');
INSERT INTO "ADMIN"."DETALLE_COMPRA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, PRECIO_PRODUCTO, FACTURA_COMPRAS_ID_COMPRA) VALUES ('10', '2', '15.65', '2');
INSERT INTO "ADMIN"."DETALLE_COMPRA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, PRECIO_PRODUCTO, FACTURA_COMPRAS_ID_COMPRA) VALUES ('25', '3', '345.35', '3');
INSERT INTO "ADMIN"."DETALLE_COMPRA" (CANTIDAD, PRODUCTO_ID_PRODUCTO, PRECIO_PRODUCTO, FACTURA_COMPRAS_ID_COMPRA) VALUES ('60', '5', '345.35', '4');


DELETE FROM "ADMIN"."FACTURA_COMPRA" WHERE ID_COMPRA = '1';
DELETE FROM "ADMIN"."FACTURA_VENTA" WHERE ID_VENTA = '1';


COMMIT;

BEGIN
IMPUESTO_COMPRAS(2);
IMPUESTO_COMPRAS(3);
IMPUESTO_COMPRAS(4);

IMPUESTO_VENTAS(2);
IMPUESTO_VENTAS(3);
IMPUESTO_VENTAS(4);
END;
