<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'venta' table.
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
class VentaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.VentaTableMap';

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
        $this->setName('venta');
        $this->setPhpName('Venta');
        $this->setClassname('Costo\\SystemBundle\\Model\\Venta');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 20, null);
        $this->addColumn('fecha', 'Fecha', 'TIMESTAMP', true, null, null);
        $this->addColumn('total_neto_documentada', 'TotalNetoDocumentada', 'FLOAT', true, 11, 0);
        $this->addColumn('total_iva_documentada', 'TotalIvaDocumentada', 'FLOAT', true, 11, 0);
        $this->addColumn('total_documentada', 'TotalDocumentada', 'FLOAT', true, 11, 0);
        $this->addColumn('total_neto_no_documentada', 'TotalNetoNoDocumentada', 'FLOAT', true, 11, 0);
        $this->addColumn('total_iva_no_documentada', 'TotalIvaNoDocumentada', 'FLOAT', true, 11, 0);
        $this->addColumn('total_no_documentada', 'TotalNoDocumentada', 'FLOAT', true, 11, 0);
        $this->addColumn('total_neto', 'TotalNeto', 'FLOAT', true, 11, 0);
        $this->addColumn('total_iva', 'TotalIva', 'FLOAT', true, 11, 0);
        $this->addColumn('total', 'Total', 'FLOAT', true, 11, 0);
        $this->addColumn('total_neto_real', 'TotalNetoReal', 'FLOAT', true, 11, 0);
        $this->addColumn('total_iva_real', 'TotalIvaReal', 'FLOAT', true, 11, 0);
        $this->addColumn('total_real', 'TotalReal', 'FLOAT', true, 11, 0);
        $this->addColumn('descripcion', 'Descripcion', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fecha_creacion', 'FechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion', 'FechaModificacion', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DetalleVenta', 'Costo\\SystemBundle\\Model\\DetalleVenta', RelationMap::ONE_TO_MANY, array('id' => 'id_venta', ), null, null, 'DetalleVentas');
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
  'create_column' => 'fecha_creacion',
  'update_column' => 'fecha_modificacion',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // VentaTableMap
