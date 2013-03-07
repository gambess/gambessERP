<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'venta_forma' table.
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
class VentaFormaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.VentaFormaTableMap';

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
        $this->setName('venta_forma');
        $this->setPhpName('VentaForma');
        $this->setClassname('Costo\\SystemBundle\\Model\\VentaForma');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_venta_forma', 'IdVentaForma', 'INTEGER', true, 20, null);
        $this->addForeignKey('id_tipo_venta_forma', 'IdTipoVentaForma', 'INTEGER', 'tipo_venta_forma', 'id_tipo_venta_forma', true, 20, null);
        $this->addColumn('nombre_venta_forma', 'NombreVentaForma', 'VARCHAR', true, 100, null);
        $this->addColumn('descripcion_venta_forma', 'DescripcionVentaForma', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fecha_creacion_venta_forma', 'FechaCreacionVentaForma', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion_venta_forma', 'FechaModificacionVentaForma', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TipoVentaForma', 'Costo\\SystemBundle\\Model\\TipoVentaForma', RelationMap::MANY_TO_ONE, array('id_tipo_venta_forma' => 'id_tipo_venta_forma', ), null, null);
        $this->addRelation('DetalleVenta', 'Costo\\SystemBundle\\Model\\DetalleVenta', RelationMap::ONE_TO_MANY, array('id_venta_forma' => 'id_venta_forma', ), null, null, 'DetalleVentas');
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
  'create_column' => 'fecha_creacion_venta_forma',
  'update_column' => 'fecha_modificacion_venta_forma',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // VentaFormaTableMap
