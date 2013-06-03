<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'cuenta' table.
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
class CuentaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.CuentaTableMap';

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
        $this->setName('cuenta');
        $this->setPhpName('Cuenta');
        $this->setClassname('Costo\\SystemBundle\\Model\\Cuenta');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cuenta', 'IdCuenta', 'INTEGER', true, 20, null);
        $this->addColumn('nombre_cuenta', 'NombreCuenta', 'VARCHAR', true, 150, null);
        $this->addColumn('valor_cuenta', 'ValorCuenta', 'FLOAT', true, 11, 0);
        $this->addColumn('tipo_cuenta', 'TipoCuenta', 'VARCHAR', false, 10, 'FORMAL');
        $this->addColumn('user_crea_cuenta', 'UserCreaCuenta', 'VARCHAR', false, 20, null);
        $this->addColumn('fecha_creacion_cuenta', 'FechaCreacionCuenta', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion_cuenta', 'FechaModificacionCuenta', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Gasto', 'Costo\\SystemBundle\\Model\\Gasto', RelationMap::ONE_TO_MANY, array('id_cuenta' => 'fk_cuenta', ), null, null, 'Gastos');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' =>  array (
  'create_column' => 'fecha_creacion_cuenta',
  'update_column' => 'fecha_modificacion_cuenta',
  'disable_updated_at' => 'false',
),
            'aggregate_column' =>  array (
  'name' => 'valor_cuenta',
  'expression' => 'SUM(costo_gasto)',
  'condition' => NULL,
  'foreign_table' => 'gasto',
  'foreign_schema' => NULL,
),
        );
    } // getBehaviors()

} // CuentaTableMap
