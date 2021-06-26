DROP DATABASE IF EXISTS kpacithor;
CREATE DATABASE IF NOT EXISTS kpacithor;

use kpacithor;

DROP TABLE IF EXISTS categoria;
CREATE TABLE IF NOT EXISTS categoria(
    categoriaId       INT             AUTO_INCREMENT PRIMARY KEY,
    categoriaNombre   VARCHAR(45)     NOT NULL,
    categoriaTieneSub CHAR(1)         NOT NULL,
    categoriaPadre    INT             NULL,
    FOREIGN KEY (categoriaPadre) REFERENCES categoria(categoriaId)
);

DROP TABLE IF EXISTS prd;
CREATE TABLE IF NOT EXISTS prd(
    prdId         INT             AUTO_INCREMENT PRIMARY KEY,
    prdNombre     VARCHAR(45)     NOT NULL,
    prdDesc       VARCHAR(60)     NOT NULL,
    prdPrecio     DECIMAL(14,4)   NOT NULL,
    prdNomImg     VARCHAR(45)     NOT NULL,
    prdStock      INT             NOT NULL,
    prdNuevo      CHAR(1)         NOT NULL,
    prdPromocion  CHAR(1)         NULL,
    prdDescuento  INT             NULL,
    categoriaId   INT             NOT NULL,
    FOREIGN KEY (categoriaId) REFERENCES categoria(categoriaId)
);

DROP TABLE IF EXISTS mon;
CREATE TABLE IF NOT EXISTS mon(
    monId         INT             AUTO_INCREMENT PRIMARY KEY,
    monNombre     VARCHAR(45)     NOT NULL,
    monSimbolo    CHAR(6)         NOT NULL,
    monDivisa     DECIMAL(14,4)   NOT NULL
);

DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario(
    usrId         INT             AUTO_INCREMENT PRIMARY KEY,
    usrNombre     VARCHAR(60)     NOT NULL,
    usrMail       VARCHAR(80)     NOT NULL,
    usrPass       VARCHAR(20)     NOT NULL
);

DROP TABLE IF EXISTS favorito;
CREATE TABLE IF NOT EXISTS favorito(
    favoritoId    INT             AUTO_INCREMENT PRIMARY KEY,
    usrId         INT             NOT NULL,
    FOREIGN KEY (usrId) REFERENCES usuario(usrId)
);

DROP TABLE IF EXISTS prd_fav;
CREATE TABLE IF NOT EXISTS prd_fav(
    ped_favId     INT             AUTO_INCREMENT PRIMARY KEY,
    prdId         INT             NOT NULL,
    favoritoId    INT             NOT NULL,
    FOREIGN KEY (prdId) REFERENCES prd(prdId),
    FOREIGN KEY (favoritoId) REFERENCES favorito(favoritoId)
);

DROP TABLE IF EXISTS compraHis;
CREATE TABLE IF NOT EXISTS compraHis(
    compraHisId   INT             AUTO_INCREMENT PRIMARY KEY,
    usrId         INT             NOT NULL,
    FOREIGN KEY (usrId) REFERENCES usuario(usrId)
);

DROP TABLE IF EXISTS prd_com;
CREATE TABLE IF NOT EXISTS prd_com(
    ped_comId     INT             AUTO_INCREMENT PRIMARY KEY,
    prdId         INT             NOT NULL,
    compraHisId   INT             NOT NULL,
    prdCantCar    INT             NOT NULL,
    FOREIGN KEY (prdId) REFERENCES prd(prdId),
    FOREIGN KEY (compraHisId) REFERENCES compraHis(compraHisId)
);

DROP TABLE IF EXISTS suscripciones;
CREATE TABLE IF NOT EXISTS suscripciones(
    susId     INT             AUTO_INCREMENT PRIMARY KEY,
    susMail   VARCHAR(60)     NOT NULL
);



INSERT INTO categoria (categoriaNombre, categoriaTieneSub)
    VALUES  ('Sensores', 'N'),
            ('Leds', 'N'),
            ('Resistencias', 'N'),
            ('Capacitores', 'N'),
            ('Herramientas', 'S'),
            ('Medicion', 'N'),
            ('Soldadura', 'N');

UPDATE categoria
    SET categoriaPadre = 5
    WHERE categoriaId = 6 OR
          categoriaId = 7;

SELECT * FROM categoria;

INSERT INTO prd	(prdNombre, prdDesc, prdPrecio, prdNomImg, prdStock, prdNuevo, prdPromocion, prdDescuento, categoriaId)
    VALUES('Sensor Efecto Hall A3144', '', 95, 'sensor-hall-a3144', 200, 'N', 'N',null, 1),
          ('Sensor Efecto Hall 49e', '', 99.99, 'sensor-hall-49e', 150, 'N', 'S', 10, 1),
          ('Sensor Efecto Hall A1321', '', 300, 'sensor-hall-a1321', 150, 'N', 'N',null, 1),
          ('Lote 10 leds 3mm Rojo', '', 110, 'Leds-3mm-Rojo', 400, 'S', 'S', 10, 2),
          ('Lote 10 Leds 3mm Verde', '', 110, 'Leds-3mm-Verde', 400, 'S', 'S', 10, 2),
          ('Lote 10 Leds 3mm Azul', '', 110, 'Leds-3mm-Azul', 400, 'S', 'S', 10, 2),
          ('Lote 5 Leds 10mm Blanco', '', 110, 'Leds-5mm-Blanco', 350, 'S', 'S', 20, 2),
          ('Lote 50 Resistencias 100 Ohm', '', 96, 'resistencia-100-ohm', 330, 'N', 'N',null, 3),
          ('Lote 10 Resistencias 470 Ohm', '', 280, 'resistencia-470-ohm', 150, 'N', 'N',null, 3),
          ('Lote 10 Resistencias 10 Ohm', '', 276, 'resistencia-10-ohm', 150, 'N', 'N',null, 3),
          ('Capacitor Electrolitico 470uf 16v  X10', '', 97, 'capacitor-470-16', 220, 'S', 'N',null, 4),
          ('Capacitor Electrolitico 680uf 25v', '', 320, 'capacitor-680-25', 95, 'S', 'N',null, 4),
          ('Capacitor Electrolitico 1000uf 25v  X10', '', 449, 'capacitor-1000-25', 52, 'S', 'N',null, 4),
          ('Multimetro Digital Ut33c+', '', 1695, 'multimetro-ut33c+', 360, 'N', 'S', 15, 6),
          ('Multimetro Digital T830d', '', 448, 'multimetro-t830d', 150, 'N', 'N',null, 6),
          ('Pinza Amperometrica Ut201+', '', 3200, 'pinza-amperometrica-ut201+', 265, 'N', 'S', 10, 6),
          ('Soldador Pistola 30-70 Watts', '', 1150, 'soldador-pistola', 640, 'N', 'N',null, 7),
          ('Soldador Estaño tipo lapiz madera 40 Watts', '', 430, 'soldador-lapiz', 210, 'S', 'N',null, 7),
          ('Estaño Tubo 3mts 60/40 0.8mm', '', 165, 'estanio-rollo', 100, 'S', 'N',null, 7),
          ('Estaño 100grs 60/40 0.7mm', '', 595, 'estanio-rollo', 20, 'N', 'N',null, '7');


SELECT * FROM prd;

INSERT INTO mon	(monNombre, monSimbolo, monDivisa) 
    VALUES('pesos', 'ARS$', 1),
          ('dolar', 'U$S', 145);

SELECT * FROM mon;

INSERT INTO usuario (usrNombre, usrMail, usrPass)
    VALUES ('admin', 'admin@admin.com', 'admin');

SELECT * FROM usuario;

INSERT INTO favorito(usrId) 
    VALUES(1);
INSERT INTO prd_fav (prdId, favoritoId)
    VALUES (15, 1),
           (5, 1),
           (9, 1);

SELECT * FROM favorito
    INNER JOIN prd_fav ON favorito.favoritoId = prd_fav.favoritoId
    INNER JOIN prd ON prd_fav.prdId = prd.prdId
    WHERE favorito.usrId = 1;

INSERT INTO compraHis(usrId) 
    VALUES(1);
INSERT INTO prd_com (prdId, compraHisId, prdCantCar)
    VALUES (15, 1, 1),
           (5, 1, 2),
           (9, 1, 4);

SELECT * FROM compraHis
    INNER JOIN prd_com ON compraHis.compraHisId = prd_com.compraHisId
    INNER JOIN prd ON prd_com.prdId = prd.prdId
    WHERE compraHis.usrId = 1;