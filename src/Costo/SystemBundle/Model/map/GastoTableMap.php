<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'gasto' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.map
 */
class GastoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.GastoTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('gasto');
        $this->setPhpName('Gasto');
        $this->setClassname('Costo\\SystemBundle\\Model\\Gasto');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID_GASTO', 'IdGasto', 'INTEGER', true, 20, null);
        $this->addForeignKey('FK_CUENTA', 'FkCuenta', 'INTEGER', 'cuenta', 'ID_CUENTA', false, 20, null);
        $this->addColumn('NOMBRE_GASTO', 'NombreGasto', 'VARCHAR', false, 100, null);
        $this->addColumn('COSTO_GASTO', 'CostoGasto', 'FLOAT', true, 7, 0);
        $this->addColumn('FECHA_CREACION_GASTO', 'FechaCreacionGasto', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('FECHA_EMISION_GASTO', 'FechaEmisionGasto', 'TIMESTAMP', false, null, null);
        $this->addColumn('FECHA_PAGO_GASTO', 'FechaPagoGasto', 'TIMESTAMP', false, null, null);
        $this->addColumn('ACTIVA_GASTO', 'ActivaGasto', 'BOOLEAN', true, 1, true);
        $this->addColumn('NUMERO_DOC_GASTO', 'NumeroDocGasto', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cuenta', 'Costo\\SystemBundle\\Model\\Cuenta', RelationMap::MANY_TO_ONE, array('fk_cuenta' => 'id_cuenta', ), null, null);
    } // buildRelations()

} // GastoTableMap
