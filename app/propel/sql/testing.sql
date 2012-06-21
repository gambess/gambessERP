
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
    `valor_cuenta` FLOAT(7,2) NOT NULL,
    `tipo_cuenta` VARCHAR(100) NOT NULL,
    `fecha_creacion_cuenta` DATETIME NOT NULL,
    `user_crea_cuenta` VARCHAR(20) NOT NULL,
    `activa_cuenta` TINYINT(1) NOT NULL,
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
    PRIMARY KEY (`id_gasto`),
    INDEX `fk_cuenta` (`fk_cuenta`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
