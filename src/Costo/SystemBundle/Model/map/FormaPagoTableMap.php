<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'forma_pago' table.
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
class FormaPagoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.FormaPagoTableMap';

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
        $this->setName('forma_pago');
        $this->setPhpName('FormaPago');
        $this->setClassname('Costo\\SystemBundle\\Model\\FormaPago');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_forma_pago', 'IdFormaPago', 'INTEGER', true, 20, null);
        $this->addColumn('nombre_forma_pago', 'NombreFormaPago', 'VARCHAR', true, 100, null);
        $this->addColumn('descripcion_forma_pago', 'DescripcionFormaPago', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fecha_creacion_forma_pago', 'FechaCreacionFormaPago', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion_forma_pago', 'FechaModificacionFormaPago', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DetalleVenta', 'Costo\\SystemBundle\\Model\\DetalleVenta', RelationMap::ONE_TO_MANY, array('id_forma_pago' => 'id_forma_pago', ), null, null, 'DetalleVentas');
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
  'create_column' => 'fecha_creacion_forma_pago',
  'update_column' => 'fecha_modificacion_forma_pago',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // FormaPagoTableMap
