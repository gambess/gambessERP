
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- cuenta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta`
(
    `id_cuenta` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `nombre_cuenta` VARCHAR(150) NOT NULL,
    `valor_cuenta` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `tipo_cuenta` VARCHAR(10) DEFAULT 'FORMAL',
    `user_crea_cuenta` VARCHAR(20),
    `fecha_creacion_cuenta` DATETIME,
    `fecha_modificacion_cuenta` DATETIME,
    PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- detalle_venta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `detalle_venta`;

CREATE TABLE `detalle_venta`
(
    `id_detalle` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `id_venta` INTEGER(20) NOT NULL,
    `id_venta_forma` INTEGER(20) NOT NULL,
    `id_lugar_venta` INTEGER(20) NOT NULL,
    `id_forma_pago` INTEGER(20) NOT NULL,
    `fecha_venta` DATETIME NOT NULL,
    `total_neto_venta` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_iva_venta` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_venta` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `descripcion_venta` TEXT,
    `fecha_creacion_detalle` DATETIME,
    `fecha_modificacion_detalle` DATETIME,
    PRIMARY KEY (`id_detalle`),
    INDEX `FI_alle_venta_ibfk_4` (`id_venta`),
    INDEX `FI_alle_venta_ibfk_1` (`id_venta_forma`),
    INDEX `FI_alle_venta_ibfk_2` (`id_lugar_venta`),
    INDEX `FI_alle_venta_ibfk_3` (`id_forma_pago`),
    CONSTRAINT `detalle_venta_ibfk_4`
        FOREIGN KEY (`id_venta`)
        REFERENCES `venta` (`id`),
    CONSTRAINT `detalle_venta_ibfk_1`
        FOREIGN KEY (`id_venta_forma`)
        REFERENCES `venta_forma` (`id_venta_forma`),
    CONSTRAINT `detalle_venta_ibfk_2`
        FOREIGN KEY (`id_lugar_venta`)
        REFERENCES `lugar_venta` (`id_lugar_venta`),
    CONSTRAINT `detalle_venta_ibfk_3`
        FOREIGN KEY (`id_forma_pago`)
        REFERENCES `forma_pago` (`id_forma_pago`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- eventos_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `eventos_detalle`;

CREATE TABLE `eventos_detalle`
(
    `id_evento` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `id_detalle` INTEGER(20) NOT NULL,
    `etiqueta_evento` VARCHAR(100) NOT NULL,
    `fecha_evento` DATETIME NOT NULL,
    `color_evento` VARCHAR(10) NOT NULL,
    `email_notificacion` VARCHAR(100) NOT NULL,
    `fecha_creacion_evento` DATETIME,
    `fecha_modificacion_evento` DATETIME,
    PRIMARY KEY (`id_evento`),
    INDEX `FI_ntos_detalle_ibfk_1` (`id_detalle`),
    CONSTRAINT `eventos_detalle_ibfk_1`
        FOREIGN KEY (`id_detalle`)
        REFERENCES `detalle_venta` (`id_detalle`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- forma_pago
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `forma_pago`;

CREATE TABLE `forma_pago`
(
    `id_forma_pago` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `nombre_forma_pago` VARCHAR(100) NOT NULL,
    `descripcion_forma_pago` TEXT,
    `fecha_creacion_forma_pago` DATETIME,
    `fecha_modificacion_forma_pago` DATETIME,
    PRIMARY KEY (`id_forma_pago`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gasto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gasto`;

CREATE TABLE `gasto`
(
    `id_gasto` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `fk_cuenta` INTEGER(20) DEFAULT 0 NOT NULL,
    `nombre_gasto` VARCHAR(100) NOT NULL,
    `costo_gasto` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `fecha_emision_gasto` DATE,
    `fecha_pago_gasto` DATE,
    `numero_doc_gasto` TEXT,
    `fecha_creacion_gasto` DATETIME,
    `fecha_modificacion_gasto` DATETIME,
    PRIMARY KEY (`id_gasto`),
    INDEX `FI_gasto_cuenta` (`fk_cuenta`),
    CONSTRAINT `fk_gasto_cuenta`
        FOREIGN KEY (`fk_cuenta`)
        REFERENCES `cuenta` (`id_cuenta`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- lugar_venta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lugar_venta`;

CREATE TABLE `lugar_venta`
(
    `id_lugar_venta` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `nombre_lugar_venta` VARCHAR(100) NOT NULL,
    `descripcion_lugar_venta` TEXT,
    `encargado_lugar_venta` VARCHAR(100),
    `fecha_creacion_lugar_venta` DATETIME,
    `fecha_modificacion_lugar_venta` DATETIME,
    PRIMARY KEY (`id_lugar_venta`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_venta_forma
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_venta_forma`;

CREATE TABLE `tipo_venta_forma`
(
    `id_tipo_venta_forma` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `nombre_tipo_venta_forma` VARCHAR(100) NOT NULL,
    `descripcion_tipo_venta_forma` TEXT,
    `fecha_creacion_tipo_venta_forma` DATETIME,
    `fecha_modificacion_tipo_venta_forma` DATETIME,
    PRIMARY KEY (`id_tipo_venta_forma`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- venta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `venta`;

CREATE TABLE `venta`
(
    `id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `fecha` DATETIME NOT NULL,
    `total_neto_documentada` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_iva_documentada` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_documentada` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_neto_no_documentada` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_iva_no_documentada` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_no_documentada` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_neto` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_iva` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_neto_real` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_iva_real` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `total_real` FLOAT(11,2) DEFAULT 0.00 NOT NULL,
    `descripcion` TEXT,
    `fecha_creacion` DATETIME,
    `fecha_modificacion` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `fecha_venta_UNIQUE` (`fecha`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- venta_forma
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `venta_forma`;

CREATE TABLE `venta_forma`
(
    `id_venta_forma` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `id_tipo_venta_forma` INTEGER(20) NOT NULL,
    `nombre_venta_forma` VARCHAR(100) NOT NULL,
    `descripcion_venta_forma` TEXT,
    `fecha_creacion_venta_forma` DATETIME,
    `fecha_modificacion_venta_forma` DATETIME,
    PRIMARY KEY (`id_venta_forma`),
    INDEX `FI_ta_forma_ibfk_1` (`id_tipo_venta_forma`),
    CONSTRAINT `venta_forma_ibfk_1`
        FOREIGN KEY (`id_tipo_venta_forma`)
        REFERENCES `tipo_venta_forma` (`id_tipo_venta_forma`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
