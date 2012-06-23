
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ajuste_venta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ajuste_venta`;

CREATE TABLE `ajuste_venta`
(
    `id_ajuste_venta` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_venta` INTEGER(20) DEFAULT 0 NOT NULL,
    `fecha_venta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `tipo_venta` enum('FORMAL','INFORMAL') DEFAULT 'FORMAL' NOT NULL,
    `total_venta` FLOAT(7,2) DEFAULT 0.00 NOT NULL,
    `total_venta_formal` FLOAT(7,2) DEFAULT 0.00 NOT NULL,
    `total_venta_informal` FLOAT(7,2) DEFAULT 0.00 NOT NULL,
    `total_iva_venta` FLOAT(7,2) DEFAULT 0.00 NOT NULL,
    `detalle_venta` TEXT,
    PRIMARY KEY (`id_ajuste_venta`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cuenta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta`
(
    `id_cuenta` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `nombre_cuenta` VARCHAR(150),
    `valor_cuenta` FLOAT(7,2) DEFAULT 0.00 NOT NULL,
    `tipo_cuenta` enum('FORMAL','INFORMAL') DEFAULT 'FORMAL',
    `fecha_creacion_cuenta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `user_crea_cuenta` VARCHAR(20),
    `activa_cuenta` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gasto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gasto`;

CREATE TABLE `gasto`
(
    `id_gasto` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `fk_cuenta` INTEGER(20),
    `nombre_gasto` VARCHAR(100),
    `costo_gasto` FLOAT(7,2) DEFAULT 0.00 NOT NULL,
    `fecha_creacion_gasto` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `fecha_emision_gasto` DATETIME,
    `fecha_pago_gasto` DATETIME,
    `activa_gasto` TINYINT(1) DEFAULT 1 NOT NULL,
    `numero_doc_gasto` VARCHAR(100),
    PRIMARY KEY (`id_gasto`),
    INDEX `FI_gasto_cuenta` (`fk_cuenta`),
    CONSTRAINT `fk_gasto_cuenta`
        FOREIGN KEY (`fk_cuenta`)
        REFERENCES `cuenta` (`id_cuenta`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
