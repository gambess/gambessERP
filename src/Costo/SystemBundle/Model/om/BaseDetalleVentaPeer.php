<?php

namespace Costo\SystemBundle\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Costo\SystemBundle\Model\DetalleVenta;
use Costo\SystemBundle\Model\DetalleVentaPeer;
use Costo\SystemBundle\Model\FormaPagoPeer;
use Costo\SystemBundle\Model\LugarVentaPeer;
use Costo\SystemBundle\Model\VentaFormaPeer;
use Costo\SystemBundle\Model\map\DetalleVentaTableMap;

/**
 * Base static class for performing query and update operations on the 'detalle_venta' table.
 *
 *
 *
 * @package propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseDetalleVentaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'testing';

    /** the table name for this class */
    const TABLE_NAME = 'detalle_venta';

    /** the related Propel class for this table */
    const OM_CLASS = 'Costo\\SystemBundle\\Model\\DetalleVenta';

    /** the related TableMap class for this table */
    const TM_CLASS = 'DetalleVentaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the id_detalle field */
    const ID_DETALLE = 'detalle_venta.id_detalle';

    /** the column name for the id_venta_forma field */
    const ID_VENTA_FORMA = 'detalle_venta.id_venta_forma';

    /** the column name for the id_lugar_venta field */
    const ID_LUGAR_VENTA = 'detalle_venta.id_lugar_venta';

    /** the column name for the id_forma_pago field */
    const ID_FORMA_PAGO = 'detalle_venta.id_forma_pago';

    /** the column name for the fecha_venta field */
    const FECHA_VENTA = 'detalle_venta.fecha_venta';

    /** the column name for the total_neto_venta field */
    const TOTAL_NETO_VENTA = 'detalle_venta.total_neto_venta';

    /** the column name for the total_iva_venta field */
    const TOTAL_IVA_VENTA = 'detalle_venta.total_iva_venta';

    /** the column name for the total_venta field */
    const TOTAL_VENTA = 'detalle_venta.total_venta';

    /** the column name for the descripcion_venta field */
    const DESCRIPCION_VENTA = 'detalle_venta.descripcion_venta';

    /** the column name for the fecha_creacion_detalle field */
    const FECHA_CREACION_DETALLE = 'detalle_venta.fecha_creacion_detalle';

    /** the column name for the fecha_modificacion_detalle field */
    const FECHA_MODIFICACION_DETALLE = 'detalle_venta.fecha_modificacion_detalle';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of DetalleVenta objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array DetalleVenta[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. DetalleVentaPeer::$fieldNames[DetalleVentaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdDetalle', 'IdVentaForma', 'IdLugarVenta', 'IdFormaPago', 'FechaVenta', 'TotalNetoVenta', 'TotalIvaVenta', 'TotalVenta', 'DescripcionVenta', 'FechaCreacionDetalle', 'FechaModificacionDetalle', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idDetalle', 'idVentaForma', 'idLugarVenta', 'idFormaPago', 'fechaVenta', 'totalNetoVenta', 'totalIvaVenta', 'totalVenta', 'descripcionVenta', 'fechaCreacionDetalle', 'fechaModificacionDetalle', ),
        BasePeer::TYPE_COLNAME => array (DetalleVentaPeer::ID_DETALLE, DetalleVentaPeer::ID_VENTA_FORMA, DetalleVentaPeer::ID_LUGAR_VENTA, DetalleVentaPeer::ID_FORMA_PAGO, DetalleVentaPeer::FECHA_VENTA, DetalleVentaPeer::TOTAL_NETO_VENTA, DetalleVentaPeer::TOTAL_IVA_VENTA, DetalleVentaPeer::TOTAL_VENTA, DetalleVentaPeer::DESCRIPCION_VENTA, DetalleVentaPeer::FECHA_CREACION_DETALLE, DetalleVentaPeer::FECHA_MODIFICACION_DETALLE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_DETALLE', 'ID_VENTA_FORMA', 'ID_LUGAR_VENTA', 'ID_FORMA_PAGO', 'FECHA_VENTA', 'TOTAL_NETO_VENTA', 'TOTAL_IVA_VENTA', 'TOTAL_VENTA', 'DESCRIPCION_VENTA', 'FECHA_CREACION_DETALLE', 'FECHA_MODIFICACION_DETALLE', ),
        BasePeer::TYPE_FIELDNAME => array ('id_detalle', 'id_venta_forma', 'id_lugar_venta', 'id_forma_pago', 'fecha_venta', 'total_neto_venta', 'total_iva_venta', 'total_venta', 'descripcion_venta', 'fecha_creacion_detalle', 'fecha_modificacion_detalle', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. DetalleVentaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdDetalle' => 0, 'IdVentaForma' => 1, 'IdLugarVenta' => 2, 'IdFormaPago' => 3, 'FechaVenta' => 4, 'TotalNetoVenta' => 5, 'TotalIvaVenta' => 6, 'TotalVenta' => 7, 'DescripcionVenta' => 8, 'FechaCreacionDetalle' => 9, 'FechaModificacionDetalle' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idDetalle' => 0, 'idVentaForma' => 1, 'idLugarVenta' => 2, 'idFormaPago' => 3, 'fechaVenta' => 4, 'totalNetoVenta' => 5, 'totalIvaVenta' => 6, 'totalVenta' => 7, 'descripcionVenta' => 8, 'fechaCreacionDetalle' => 9, 'fechaModificacionDetalle' => 10, ),
        BasePeer::TYPE_COLNAME => array (DetalleVentaPeer::ID_DETALLE => 0, DetalleVentaPeer::ID_VENTA_FORMA => 1, DetalleVentaPeer::ID_LUGAR_VENTA => 2, DetalleVentaPeer::ID_FORMA_PAGO => 3, DetalleVentaPeer::FECHA_VENTA => 4, DetalleVentaPeer::TOTAL_NETO_VENTA => 5, DetalleVentaPeer::TOTAL_IVA_VENTA => 6, DetalleVentaPeer::TOTAL_VENTA => 7, DetalleVentaPeer::DESCRIPCION_VENTA => 8, DetalleVentaPeer::FECHA_CREACION_DETALLE => 9, DetalleVentaPeer::FECHA_MODIFICACION_DETALLE => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_DETALLE' => 0, 'ID_VENTA_FORMA' => 1, 'ID_LUGAR_VENTA' => 2, 'ID_FORMA_PAGO' => 3, 'FECHA_VENTA' => 4, 'TOTAL_NETO_VENTA' => 5, 'TOTAL_IVA_VENTA' => 6, 'TOTAL_VENTA' => 7, 'DESCRIPCION_VENTA' => 8, 'FECHA_CREACION_DETALLE' => 9, 'FECHA_MODIFICACION_DETALLE' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id_detalle' => 0, 'id_venta_forma' => 1, 'id_lugar_venta' => 2, 'id_forma_pago' => 3, 'fecha_venta' => 4, 'total_neto_venta' => 5, 'total_iva_venta' => 6, 'total_venta' => 7, 'descripcion_venta' => 8, 'fecha_creacion_detalle' => 9, 'fecha_modificacion_detalle' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $toNames = DetalleVentaPeer::getFieldNames($toType);
        $key = isset(DetalleVentaPeer::$fieldKeys[$fromType][$name]) ? DetalleVentaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(DetalleVentaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, DetalleVentaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return DetalleVentaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. DetalleVentaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(DetalleVentaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(DetalleVentaPeer::ID_DETALLE);
            $criteria->addSelectColumn(DetalleVentaPeer::ID_VENTA_FORMA);
            $criteria->addSelectColumn(DetalleVentaPeer::ID_LUGAR_VENTA);
            $criteria->addSelectColumn(DetalleVentaPeer::ID_FORMA_PAGO);
            $criteria->addSelectColumn(DetalleVentaPeer::FECHA_VENTA);
            $criteria->addSelectColumn(DetalleVentaPeer::TOTAL_NETO_VENTA);
            $criteria->addSelectColumn(DetalleVentaPeer::TOTAL_IVA_VENTA);
            $criteria->addSelectColumn(DetalleVentaPeer::TOTAL_VENTA);
            $criteria->addSelectColumn(DetalleVentaPeer::DESCRIPCION_VENTA);
            $criteria->addSelectColumn(DetalleVentaPeer::FECHA_CREACION_DETALLE);
            $criteria->addSelectColumn(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE);
        } else {
            $criteria->addSelectColumn($alias . '.id_detalle');
            $criteria->addSelectColumn($alias . '.id_venta_forma');
            $criteria->addSelectColumn($alias . '.id_lugar_venta');
            $criteria->addSelectColumn($alias . '.id_forma_pago');
            $criteria->addSelectColumn($alias . '.fecha_venta');
            $criteria->addSelectColumn($alias . '.total_neto_venta');
            $criteria->addSelectColumn($alias . '.total_iva_venta');
            $criteria->addSelectColumn($alias . '.total_venta');
            $criteria->addSelectColumn($alias . '.descripcion_venta');
            $criteria->addSelectColumn($alias . '.fecha_creacion_detalle');
            $criteria->addSelectColumn($alias . '.fecha_modificacion_detalle');
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
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 DetalleVenta
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = DetalleVentaPeer::doSelect($critcopy, $con);
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
        return DetalleVentaPeer::populateObjects(DetalleVentaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

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
     * @param      DetalleVenta $obj A DetalleVenta object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdDetalle();
            } // if key === null
            DetalleVentaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A DetalleVenta object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof DetalleVenta) {
                $key = (string) $value->getIdDetalle();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DetalleVenta object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(DetalleVentaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   DetalleVenta Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(DetalleVentaPeer::$instances[$key])) {
                return DetalleVentaPeer::$instances[$key];
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
        foreach (DetalleVentaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        DetalleVentaPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to detalle_venta
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
        $cls = DetalleVentaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = DetalleVentaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DetalleVentaPeer::addInstanceToPool($obj, $key);
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
     * @return array (DetalleVenta object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = DetalleVentaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + DetalleVentaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DetalleVentaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            DetalleVentaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related VentaForma table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinVentaForma(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LugarVenta table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLugarVenta(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related FormaPago table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinFormaPago(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);

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
     * Selects a collection of DetalleVenta objects pre-filled with their VentaForma objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of DetalleVenta objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinVentaForma(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);
        }

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol = DetalleVentaPeer::NUM_HYDRATE_COLUMNS;
        VentaFormaPeer::addSelectColumns($criteria);

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DetalleVentaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = DetalleVentaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DetalleVentaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = VentaFormaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = VentaFormaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = VentaFormaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    VentaFormaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (DetalleVenta) to $obj2 (VentaForma)
                $obj2->addDetalleVenta($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of DetalleVenta objects pre-filled with their LugarVenta objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of DetalleVenta objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLugarVenta(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);
        }

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol = DetalleVentaPeer::NUM_HYDRATE_COLUMNS;
        LugarVentaPeer::addSelectColumns($criteria);

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DetalleVentaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = DetalleVentaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DetalleVentaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LugarVentaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LugarVentaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LugarVentaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LugarVentaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (DetalleVenta) to $obj2 (LugarVenta)
                $obj2->addDetalleVenta($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of DetalleVenta objects pre-filled with their FormaPago objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of DetalleVenta objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinFormaPago(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);
        }

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol = DetalleVentaPeer::NUM_HYDRATE_COLUMNS;
        FormaPagoPeer::addSelectColumns($criteria);

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DetalleVentaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = DetalleVentaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DetalleVentaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = FormaPagoPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = FormaPagoPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = FormaPagoPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    FormaPagoPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (DetalleVenta) to $obj2 (FormaPago)
                $obj2->addDetalleVenta($obj1);

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
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);

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
     * Selects a collection of DetalleVenta objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of DetalleVenta objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);
        }

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol2 = DetalleVentaPeer::NUM_HYDRATE_COLUMNS;

        VentaFormaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + VentaFormaPeer::NUM_HYDRATE_COLUMNS;

        LugarVentaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LugarVentaPeer::NUM_HYDRATE_COLUMNS;

        FormaPagoPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + FormaPagoPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DetalleVentaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DetalleVentaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DetalleVentaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined VentaForma rows

            $key2 = VentaFormaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = VentaFormaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = VentaFormaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    VentaFormaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj2 (VentaForma)
                $obj2->addDetalleVenta($obj1);
            } // if joined row not null

            // Add objects for joined LugarVenta rows

            $key3 = LugarVentaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = LugarVentaPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = LugarVentaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LugarVentaPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj3 (LugarVenta)
                $obj3->addDetalleVenta($obj1);
            } // if joined row not null

            // Add objects for joined FormaPago rows

            $key4 = FormaPagoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = FormaPagoPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = FormaPagoPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    FormaPagoPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj4 (FormaPago)
                $obj4->addDetalleVenta($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related VentaForma table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptVentaForma(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LugarVenta table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLugarVenta(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related FormaPago table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptFormaPago(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DetalleVentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);

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
     * Selects a collection of DetalleVenta objects pre-filled with all related objects except VentaForma.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of DetalleVenta objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptVentaForma(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);
        }

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol2 = DetalleVentaPeer::NUM_HYDRATE_COLUMNS;

        LugarVentaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LugarVentaPeer::NUM_HYDRATE_COLUMNS;

        FormaPagoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FormaPagoPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DetalleVentaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DetalleVentaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DetalleVentaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LugarVenta rows

                $key2 = LugarVentaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LugarVentaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = LugarVentaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LugarVentaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj2 (LugarVenta)
                $obj2->addDetalleVenta($obj1);

            } // if joined row is not null

                // Add objects for joined FormaPago rows

                $key3 = FormaPagoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FormaPagoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = FormaPagoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FormaPagoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj3 (FormaPago)
                $obj3->addDetalleVenta($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of DetalleVenta objects pre-filled with all related objects except LugarVenta.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of DetalleVenta objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLugarVenta(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);
        }

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol2 = DetalleVentaPeer::NUM_HYDRATE_COLUMNS;

        VentaFormaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + VentaFormaPeer::NUM_HYDRATE_COLUMNS;

        FormaPagoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FormaPagoPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_FORMA_PAGO, FormaPagoPeer::ID_FORMA_PAGO, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DetalleVentaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DetalleVentaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DetalleVentaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined VentaForma rows

                $key2 = VentaFormaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = VentaFormaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = VentaFormaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    VentaFormaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj2 (VentaForma)
                $obj2->addDetalleVenta($obj1);

            } // if joined row is not null

                // Add objects for joined FormaPago rows

                $key3 = FormaPagoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FormaPagoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = FormaPagoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FormaPagoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj3 (FormaPago)
                $obj3->addDetalleVenta($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of DetalleVenta objects pre-filled with all related objects except FormaPago.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of DetalleVenta objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptFormaPago(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);
        }

        DetalleVentaPeer::addSelectColumns($criteria);
        $startcol2 = DetalleVentaPeer::NUM_HYDRATE_COLUMNS;

        VentaFormaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + VentaFormaPeer::NUM_HYDRATE_COLUMNS;

        LugarVentaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LugarVentaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(DetalleVentaPeer::ID_VENTA_FORMA, VentaFormaPeer::ID_VENTA_FORMA, $join_behavior);

        $criteria->addJoin(DetalleVentaPeer::ID_LUGAR_VENTA, LugarVentaPeer::ID_LUGAR_VENTA, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = DetalleVentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = DetalleVentaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = DetalleVentaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                DetalleVentaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined VentaForma rows

                $key2 = VentaFormaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = VentaFormaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = VentaFormaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    VentaFormaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj2 (VentaForma)
                $obj2->addDetalleVenta($obj1);

            } // if joined row is not null

                // Add objects for joined LugarVenta rows

                $key3 = LugarVentaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LugarVentaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = LugarVentaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LugarVentaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (DetalleVenta) to the collection in $obj3 (LugarVenta)
                $obj3->addDetalleVenta($obj1);

            } // if joined row is not null

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
        return Propel::getDatabaseMap(DetalleVentaPeer::DATABASE_NAME)->getTable(DetalleVentaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseDetalleVentaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseDetalleVentaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new DetalleVentaTableMap());
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
        return DetalleVentaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a DetalleVenta or Criteria object.
     *
     * @param      mixed $values Criteria or DetalleVenta object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from DetalleVenta object
        }

        if ($criteria->containsKey(DetalleVentaPeer::ID_DETALLE) && $criteria->keyContainsValue(DetalleVentaPeer::ID_DETALLE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DetalleVentaPeer::ID_DETALLE.')');
        }


        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a DetalleVenta or Criteria object.
     *
     * @param      mixed $values Criteria or DetalleVenta object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(DetalleVentaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(DetalleVentaPeer::ID_DETALLE);
            $value = $criteria->remove(DetalleVentaPeer::ID_DETALLE);
            if ($value) {
                $selectCriteria->add(DetalleVentaPeer::ID_DETALLE, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(DetalleVentaPeer::TABLE_NAME);
            }

        } else { // $values is DetalleVenta object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the detalle_venta table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(DetalleVentaPeer::TABLE_NAME, $con, DetalleVentaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DetalleVentaPeer::clearInstancePool();
            DetalleVentaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a DetalleVenta or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or DetalleVenta object or primary key or array of primary keys
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
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            DetalleVentaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof DetalleVenta) { // it's a model object
            // invalidate the cache for this single object
            DetalleVentaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DetalleVentaPeer::DATABASE_NAME);
            $criteria->add(DetalleVentaPeer::ID_DETALLE, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                DetalleVentaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(DetalleVentaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            DetalleVentaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given DetalleVenta object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      DetalleVenta $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(DetalleVentaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(DetalleVentaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(DetalleVentaPeer::DATABASE_NAME, DetalleVentaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return DetalleVenta
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = DetalleVentaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(DetalleVentaPeer::DATABASE_NAME);
        $criteria->add(DetalleVentaPeer::ID_DETALLE, $pk);

        $v = DetalleVentaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return DetalleVenta[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(DetalleVentaPeer::DATABASE_NAME);
            $criteria->add(DetalleVentaPeer::ID_DETALLE, $pks, Criteria::IN);
            $objs = DetalleVentaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseDetalleVentaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseDetalleVentaPeer::buildTableMap();

