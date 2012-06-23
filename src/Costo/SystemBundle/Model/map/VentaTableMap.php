<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ajuste_venta' table.
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
        $this->setName('ajuste_venta');
        $this->setPhpName('Venta');
        $this->setClassname('Costo\\SystemBundle\\Model\\Venta');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID_AJUSTE_VENTA', 'IdVenta', 'INTEGER', true, null, null);
        $this->addColumn('FK_VENTA', 'FkVenta', 'INTEGER', true, 20, 0);
        $this->addColumn('FECHA_VENTA', 'FechaVenta', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('TIPO_VENTA', 'TipoVenta', 'CHAR', true, null, 'FORMAL');
        $this->addColumn('TOTAL_VENTA', 'TotalVenta', 'FLOAT', true, 7, 0);
        $this->addColumn('TOTAL_VENTA_FORMAL', 'TotalVentaFormal', 'FLOAT', true, 7, 0);
        $this->addColumn('TOTAL_VENTA_INFORMAL', 'TotalVentaInformal', 'FLOAT', true, 7, 0);
        $this->addColumn('TOTAL_IVA_VENTA', 'TotalIvaVenta', 'FLOAT', true, 7, 0);
        $this->addColumn('DETALLE_VENTA', 'DetalleVenta', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // VentaTableMap
