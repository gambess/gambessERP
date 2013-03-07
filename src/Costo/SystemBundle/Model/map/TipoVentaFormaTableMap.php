<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'tipo_venta_forma' table.
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
class TipoVentaFormaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.TipoVentaFormaTableMap';

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
        $this->setName('tipo_venta_forma');
        $this->setPhpName('TipoVentaForma');
        $this->setClassname('Costo\\SystemBundle\\Model\\TipoVentaForma');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_tipo_venta_forma', 'IdTipoVentaForma', 'INTEGER', true, 20, null);
        $this->addColumn('nombre_tipo_venta_forma', 'NombreTipoVentaForma', 'VARCHAR', true, 100, null);
        $this->addColumn('descripcion_tipo_venta_forma', 'DescripcionTipoVentaForma', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fecha_creacion_tipo_venta_forma', 'FechaCreacionTipoVentaForma', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion_tipo_venta_forma', 'FechaActualizacionTipoVentaForma', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('VentaForma', 'Costo\\SystemBundle\\Model\\VentaForma', RelationMap::ONE_TO_MANY, array('id_tipo_venta_forma' => 'id_tipo_venta_forma', ), null, null, 'VentaFormas');
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
  'create_column' => 'fecha_creacion_tipo_venta_forma',
  'update_column' => 'fecha_modificacion_tipo_venta_forma',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // TipoVentaFormaTableMap
