<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'lugar_venta' table.
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
class LugarVentaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.LugarVentaTableMap';

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
        $this->setName('lugar_venta');
        $this->setPhpName('LugarVenta');
        $this->setClassname('Costo\\SystemBundle\\Model\\LugarVenta');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_lugar_venta', 'IdLugarVenta', 'INTEGER', true, 20, null);
        $this->addColumn('nombre_lugar_venta', 'NombreLugarVenta', 'VARCHAR', true, 100, null);
        $this->addColumn('descripcion_lugar_venta', 'DescripcionLugarVenta', 'LONGVARCHAR', false, null, null);
        $this->addColumn('encargado_lugar_venta', 'EncargadoLugarVenta', 'VARCHAR', false, 100, null);
        $this->addColumn('fecha_creacion_lugar_venta', 'FechaCreacionLugarVenta', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion_lugar_venta', 'FechaModificacionLugarVenta', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DetalleVenta', 'Costo\\SystemBundle\\Model\\DetalleVenta', RelationMap::ONE_TO_MANY, array('id_lugar_venta' => 'id_lugar_venta', ), null, null, 'DetalleVentas');
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
  'create_column' => 'fecha_creacion_lugar_venta',
  'update_column' => 'fecha_modificacion_lugar_venta',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // LugarVentaTableMap
