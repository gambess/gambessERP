<?php

namespace Costo\SystemBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'eventos_detalle' table.
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
class EventosDetalleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Costo.SystemBundle.Model.map.EventosDetalleTableMap';

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
        $this->setName('eventos_detalle');
        $this->setPhpName('EventosDetalle');
        $this->setClassname('Costo\\SystemBundle\\Model\\EventosDetalle');
        $this->setPackage('src.Costo.SystemBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_evento', 'IdEvento', 'INTEGER', true, 20, null);
        $this->addForeignKey('id_detalle', 'IdDetalle', 'INTEGER', 'detalle_venta', 'id_detalle', true, 20, null);
        $this->addColumn('etiqueta_evento', 'EtiquetaEvento', 'VARCHAR', true, 100, null);
        $this->addColumn('fecha_evento', 'FechaEvento', 'TIMESTAMP', true, null, null);
        $this->addColumn('color_evento', 'ColorEvento', 'VARCHAR', true, 10, null);
        $this->addColumn('email_notificacion', 'EmailNotificacion', 'VARCHAR', true, 100, null);
        $this->addColumn('fecha_creacion_evento', 'FechaCreacionEvento', 'TIMESTAMP', false, null, null);
        $this->addColumn('fecha_modificacion_evento', 'FechaModificacionEvento', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DetalleVenta', 'Costo\\SystemBundle\\Model\\DetalleVenta', RelationMap::MANY_TO_ONE, array('id_detalle' => 'id_detalle', ), null, null);
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
  'create_column' => 'fecha_creacion_evento',
  'update_column' => 'fecha_modificacion_evento',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // EventosDetalleTableMap
