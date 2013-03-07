<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'detalle_venta' table.
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
class DetalleVentaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.DetalleVentaTableMap';

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
        $this->setName('detalle_venta');
        $this->setPhpName('DetalleVenta');
        $this->setClassname('Costo\\SystemBundle\\Model\\DetalleVenta');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_detalle', 'IdDetalle', 'INTEGER', true, 20, null);
        $this->addForeignKey('id_venta_forma', 'IdVentaForma', 'INTEGER', 'venta_forma', 'id_venta_forma', true, 20, null);
        $this->addForeignKey('id_lugar_venta', 'IdLugarVenta', 'INTEGER', 'lugar_venta', 'id_lugar_venta', true, 20, null);
        $this->addForeignKey('id_forma_pago', 'IdFormaPago', 'INTEGER', 'forma_pago', 'id_forma_pago', true, 20, null);
        $this->addColumn('fecha_venta', 'FechaVenta', 'DATE', true, null, null);
        $this->addColumn('total_neto_venta', 'TotalNetoVenta', 'FLOAT', true, 11, 0);
        $this->addColumn('total_iva_venta', 'TotalIvaVenta', 'FLOAT', true, 11, 0);
        $this->addColumn('total_venta', 'TotalVenta', 'FLOAT', true, 11, 0);
        $this->addColumn('descripcion_venta', 'DescripcionVenta', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fecha_creacion_detalle', 'FechaCreacionDetalle', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion_detalle', 'FechaModificacionDetalle', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('VentaForma', 'Costo\\SystemBundle\\Model\\VentaForma', RelationMap::MANY_TO_ONE, array('id_venta_forma' => 'id_venta_forma', ), null, null);
        $this->addRelation('LugarVenta', 'Costo\\SystemBundle\\Model\\LugarVenta', RelationMap::MANY_TO_ONE, array('id_lugar_venta' => 'id_lugar_venta', ), null, null);
        $this->addRelation('FormaPago', 'Costo\\SystemBundle\\Model\\FormaPago', RelationMap::MANY_TO_ONE, array('id_forma_pago' => 'id_forma_pago', ), null, null);
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
  'create_column' => 'fecha_creacion_detalle',
  'update_column' => 'fecha_modificacion_detalle',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // DetalleVentaTableMap
