DROP DATABASE IF EXISTS kpacithor;
CREATE DATABASE IF NOT EXISTS kpacithor;

use kpacithor;

DROP TABLE IF EXISTS categoria;
CREATE TABLE IF NOT EXISTS categoria(
    categoriaId       INT             AUTO_INCREMENT PRIMARY KEY,
    categoriaNombre   VARCHAR(45)     NOT NULL,
    categoriaTieneSub CHAR(1)         NOT NULL,
    categoriaPadre    INT             NOT NULL,
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

DROP TABLE IF EXISTS carrito;
CREATE TABLE IF NOT EXISTS carrito(
    carritoId     INT             AUTO_INCREMENT PRIMARY KEY,
    usrId         INT             NOT NULL,
    FOREIGN KEY (usrId) REFERENCES usuario(usrId)
);

DROP TABLE IF EXISTS prd_car;
CREATE TABLE IF NOT EXISTS prd_car(
    ped_carId     INT             AUTO_INCREMENT PRIMARY KEY,
    prdId         INT             NOT NULL,
    carritoId     INT             NOT NULL,
    prdCantCar    INT             NOT NULL,
    FOREIGN KEY (prdId) REFERENCES prd(prdId),
    FOREIGN KEY (carritoId) REFERENCES carrito(carritoId)
);




INSERT INTO categoria (categoriaNombre, categoriaTieneSub, categoriaPadre)
    VALUES  ('Sensores', 'N', 0),
            ('Leds', 'N', 0),
            ('Resistencias', 'N', 0),
            ('Capacitores', 'N', 0),
            ('Herramientas', 'S', 0);

SELECT * FROM categoria;