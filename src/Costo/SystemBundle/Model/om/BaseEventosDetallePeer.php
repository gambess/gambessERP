<?php

namespace Costo\SystemBundle\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Costo\SystemBundle\Model\DetalleVentaPeer;
use Costo\SystemBundle\Model\EventosDetalle;
use Costo\SystemBundle\Model\EventosDetallePeer;
use Costo\SystemBundle\Model\map\EventosDetalleTableMap;

/**
 * Base static class for performing query and update operations on the 'eventos_detalle' table.
 *
 *
 *
 * @package propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseEventosDetallePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'testing';

    /** the table name for this class */
    const TABLE_NAME = 'eventos_detalle';

    /** the related Propel class for this table */
    const OM_CLASS = 'Costo\\SystemBundle\\Model\\EventosDetalle';

    /** the related TableMap class for this table */
    const TM_CLASS = 'EventosDetalleTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the id_evento field */
    const ID_EVENTO = 'eventos_detalle.id_evento';

    /** the column name for the id_detalle field */
    const ID_DETALLE = 'eventos_detalle.id_detalle';

    /** the column name for the etiqueta_evento field */
    const ETIQUETA_EVENTO = 'eventos_detalle.etiqueta_evento';

    /** the column name for the fecha_evento field */
    const FECHA_EVENTO = 'eventos_detalle.fecha_evento';

    /** the column name for the color_evento field */
    const COLOR_EVENTO = 'eventos_detalle.color_evento';

    /** the column name for the email_notificacion field */
    const EMAIL_NOTIFICACION = 'eventos_detalle.email_notificacion';

    /** the column name for the fecha_creacion_evento field */
    const FECHA_CREACION_EVENTO = 'eventos_detalle.fecha_creacion_evento';

    /** the column name for the fecha_modificacion_evento field */
    const FECHA_MODIFICACION_EVENTO = 'eventos_detalle.fecha_modificacion_evento';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of EventosDetalle objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array EventosDetalle[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. EventosDetallePeer::$fieldNames[EventosDetallePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdEvento', 'IdDetalle', 'EtiquetaEvento', 'FechaEvento', 'ColorEvento', 'EmailNotificacion', 'FechaCreacionEvento', 'FechaModificacionEvento', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idEvento', 'idDetalle', 'etiquetaEvento', 'fechaEvento', 'colorEvento', 'emailNotificacion', 'fechaCreacionEvento', 'fechaModificacionEvento', ),
        BasePeer::TYPE_COLNAME => array (EventosDetallePeer::ID_EVENTO, EventosDetallePeer::ID_DETALLE, EventosDetallePeer::ETIQUETA_EVENTO, EventosDetallePeer::FECHA_EVENTO, EventosDetallePeer::COLOR_EVENTO, EventosDetallePeer::EMAIL_NOTIFICACION, EventosDetallePeer::FECHA_CREACION_EVENTO, EventosDetallePeer::FECHA_MODIFICACION_EVENTO, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_EVENTO', 'ID_DETALLE', 'ETIQUETA_EVENTO', 'FECHA_EVENTO', 'COLOR_EVENTO', 'EMAIL_NOTIFICACION', 'FECHA_CREACION_EVENTO', 'FECHA_MODIFICACION_EVENTO', ),
        BasePeer::TYPE_FIELDNAME => array ('id_evento', 'id_detalle', 'etiqueta_evento', 'fecha_evento', 'color_evento', 'email_notificacion', 'fecha_creacion_evento', 'fecha_modificacion_evento', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. EventosDetallePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdEvento' => 0, 'IdDetalle' => 1, 'EtiquetaEvento' => 2, 'FechaEvento' => 3, 'ColorEvento' => 4, 'EmailNotificacion' => 5, 'FechaCreacionEvento' => 6, 'FechaModificacionEvento' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idEvento' => 0, 'idDetalle' => 1, 'etiquetaEvento' => 2, 'fechaEvento' => 3, 'colorEvento' => 4, 'emailNotificacion' => 5, 'fechaCreacionEvento' => 6, 'fechaModificacionEvento' => 7, ),
        BasePeer::TYPE_COLNAME => array (EventosDetallePeer::ID_EVENTO => 0, EventosDetallePeer::ID_DETALLE => 1, EventosDetallePeer::ETIQUETA_EVENTO => 2, EventosDetallePeer::FECHA_EVENTO => 3, EventosDetallePeer::COLOR_EVENTO => 4, EventosDetallePeer::EMAIL_NOTIFICACION => 5, EventosDetallePeer::FECHA_CREACION_EVENTO => 6, EventosDetallePeer::FECHA_MODIFICACION_EVENTO => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_EVENTO' => 0, 'ID_DETALLE' => 1, 'ETIQUETA_EVENTO' => 2, 'FECHA_EVENTO' => 3, 'COLOR_EVENTO' => 4, 'EMAIL_NOTIFICACION' => 5, 'FECHA_CREACION_EVENTO' => 6, 'FECHA_MODIFICACION_EVENTO' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('id_evento' => 0, 'id_detalle' => 1, 'etiqueta_evento' => 2, 'fecha_evento' => 3, 'color_evento' => 4, 'email_notificacion' => 5, 'fecha_creacion_evento' => 6, 'fecha_modificacion_evento' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = EventosDetallePeer::getFieldNames($toType);
        $key = isset(EventosDetallePeer::$fieldKeys[$fromType][$name]) ? EventosDetallePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(EventosDetallePeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, EventosDetallePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return EventosDetallePeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. EventosDetallePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(EventosDetallePeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(EventosDetallePeer::ID_EVENTO);
            $criteria->addSelectColumn(EventosDetallePeer::ID_DETALLE);
            $criteria->addSelectColumn(EventosDetallePeer::ETIQUETA_EVENTO);
            $criteria->addSelectColumn(EventosDetallePeer::FECHA_EVENTO);
            $criteria->addSelectColumn(EventosDetallePeer::COLOR_EVENTO);
            $criteria->addSelectColumn(EventosDetallePeer::EMAIL_NOTIFICACION);
            $criteria->addSelectColumn(EventosDetallePeer::FECHA_CREACION_EVENTO);
            $criteria->addSelectColumn(EventosDetallePeer::FECHA_MODIFICACION_EVENTO);
        } else {
            $criteria->addSelectColumn($alias . '.id_evento');
            $criteria->addSelectColumn($alias . '.id_detalle');
            $criteria->addSelectColumn($alias . '.etiqueta_evento');
            $criteria->addSelectColumn($alias . '.fecha_evento');
            $criteria->addSelectColumn($alias . '.color_evento');
            $criteria->addSelectColumn($alias . '.email_notificacion');
            $criteria->addSelectColumn($alias . '.fecha_creacion_evento');
            $criteria->addSelectColumn($alias . '.fecha_modificacion_evento');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventosDetallePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventosDetallePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(EventosDetallePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 EventosDetalle
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = EventosDetallePeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return EventosDetallePeer::populateObjects(EventosDetallePeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            EventosDetallePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      EventosDetalle $obj A EventosDetalle object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdEvento();
            } // if key === null
            EventosDetallePeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A EventosDetalle object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof EventosDetalle) {
                $key = (string) $value->getIdEvento();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or EventosDetalle object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(EventosDetallePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   EventosDetalle Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(EventosDetallePeer::$instances[$key])) {
                return EventosDetallePeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (EventosDetallePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        EventosDetallePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to eventos_detalle
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = EventosDetallePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = EventosDetallePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = EventosDetallePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EventosDetallePeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (EventosDetalle object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = EventosDetallePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = EventosDetallePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + EventosDetallePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EventosDetallePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            EventosDetallePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related DetalleVenta table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinDetalleVenta(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventosDetallePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventosDetallePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventosDetallePeer::ID_DETALLE, DetalleVentaPeer::ID_DETALLE, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of EventosDetalle objects pre-filled with their DetalleVenta objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of EventosDetalle objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDetalleVenta(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);
        }

        EventosDetallePeer::addSelectColumns($criteria);
        $startcol = EventosDetallePeer::NUM_HYDRATE_COLUMNS;
        DetalleVentaPeer::addSelectColumns($criteria);

        $criteria->addJoin(EventosDetallePeer::ID_DETALLE, DetalleVentaPeer::ID_DETALLE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventosDetallePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventosDetallePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = EventosDetallePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventosDetallePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = DetalleVentaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DetalleVentaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    DetalleVentaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (EventosDetalle) to $obj2 (DetalleVenta)
                $obj2->addEventosDetalle($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(EventosDetallePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            EventosDetallePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(EventosDetallePeer::ID_DETALLE, DetalleVentaPeer::ID_DETALLE, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of EventosDetalle objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of EventosDetalle objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);
        }

        EventosDetallePeer::addSelectColumns($criteria);
        $startcol2 = EventosDetallePeer::NUM_HYDRATE_COLUMNS;

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DetalleVentaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(EventosDetallePeer::ID_DETALLE, DetalleVentaPeer::ID_DETALLE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = EventosDetallePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = EventosDetallePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = EventosDetallePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                EventosDetallePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined DetalleVenta rows

            $key2 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = DetalleVentaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DetalleVentaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DetalleVentaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (EventosDetalle) to the collection in $obj2 (DetalleVenta)
                $obj2->addEventosDetalle($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(EventosDetallePeer::DATABASE_NAME)->getTable(EventosDetallePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseEventosDetallePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseEventosDetallePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new EventosDetalleTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return EventosDetallePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a EventosDetalle or Criteria object.
     *
     * @param      mixed $values Criteria or EventosDetalle object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from EventosDetalle object
        }

        if ($criteria->containsKey(EventosDetallePeer::ID_EVENTO) && $criteria->keyContainsValue(EventosDetallePeer::ID_EVENTO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventosDetallePeer::ID_EVENTO.')');
        }


        // Set the correct dbName
        $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a EventosDetalle or Criteria object.
     *
     * @param      mixed $values Criteria or EventosDetalle object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(EventosDetallePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(EventosDetallePeer::ID_EVENTO);
            $value = $criteria->remove(EventosDetallePeer::ID_EVENTO);
            if ($value) {
                $selectCriteria->add(EventosDetallePeer::ID_EVENTO, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(EventosDetallePeer::TABLE_NAME);
            }

        } else { // $values is EventosDetalle object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the eventos_detalle table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(EventosDetallePeer::TABLE_NAME, $con, EventosDetallePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EventosDetallePeer::clearInstancePool();
            EventosDetallePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a EventosDetalle or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or EventosDetalle object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            EventosDetallePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof EventosDetalle) { // it's a model object
            // invalidate the cache for this single object
            EventosDetallePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EventosDetallePeer::DATABASE_NAME);
            $criteria->add(EventosDetallePeer::ID_EVENTO, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                EventosDetallePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(EventosDetallePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            EventosDetallePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given EventosDetalle object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      EventosDetalle $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(EventosDetallePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(EventosDetallePeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(EventosDetallePeer::DATABASE_NAME, EventosDetallePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return EventosDetalle
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = EventosDetallePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(EventosDetallePeer::DATABASE_NAME);
        $criteria->add(EventosDetallePeer::ID_EVENTO, $pk);

        $v = EventosDetallePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return EventosDetalle[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(EventosDetallePeer::DATABASE_NAME);
            $criteria->add(EventosDetallePeer::ID_EVENTO, $pks, Criteria::IN);
            $objs = EventosDetallePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseEventosDetallePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseEventosDetallePeer::buildTableMap();

