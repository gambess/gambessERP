<?php

namespace Costo\SystemBundle\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaPeer;
use Costo\SystemBundle\Model\map\VentaTableMap;

/**
 * Base static class for performing query and update operations on the 'venta' table.
 *
 *
 *
 * @package propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseVentaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'testing';

    /** the table name for this class */
    const TABLE_NAME = 'venta';

    /** the related Propel class for this table */
    const OM_CLASS = 'Costo\\SystemBundle\\Model\\Venta';

    /** the related TableMap class for this table */
    const TM_CLASS = 'VentaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 17;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 17;

    /** the column name for the id field */
    const ID = 'venta.id';

    /** the column name for the fecha field */
    const FECHA = 'venta.fecha';

    /** the column name for the total_neto_documentada field */
    const TOTAL_NETO_DOCUMENTADA = 'venta.total_neto_documentada';

    /** the column name for the total_iva_documentada field */
    const TOTAL_IVA_DOCUMENTADA = 'venta.total_iva_documentada';

    /** the column name for the total_documentada field */
    const TOTAL_DOCUMENTADA = 'venta.total_documentada';

    /** the column name for the total_neto_no_documentada field */
    const TOTAL_NETO_NO_DOCUMENTADA = 'venta.total_neto_no_documentada';

    /** the column name for the total_iva_no_documentada field */
    const TOTAL_IVA_NO_DOCUMENTADA = 'venta.total_iva_no_documentada';

    /** the column name for the total_no_documentada field */
    const TOTAL_NO_DOCUMENTADA = 'venta.total_no_documentada';

    /** the column name for the total_neto field */
    const TOTAL_NETO = 'venta.total_neto';

    /** the column name for the total_iva field */
    const TOTAL_IVA = 'venta.total_iva';

    /** the column name for the total field */
    const TOTAL = 'venta.total';

    /** the column name for the total_neto_real field */
    const TOTAL_NETO_REAL = 'venta.total_neto_real';

    /** the column name for the total_iva_real field */
    const TOTAL_IVA_REAL = 'venta.total_iva_real';

    /** the column name for the total_real field */
    const TOTAL_REAL = 'venta.total_real';

    /** the column name for the descripcion field */
    const DESCRIPCION = 'venta.descripcion';

    /** the column name for the fecha_creacion field */
    const FECHA_CREACION = 'venta.fecha_creacion';

    /** the column name for the fecha_modificacion field */
    const FECHA_MODIFICACION = 'venta.fecha_modificacion';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Venta objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Venta[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. VentaPeer::$fieldNames[VentaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Fecha', 'TotalNetoDocumentada', 'TotalIvaDocumentada', 'TotalDocumentada', 'TotalNetoNoDocumentada', 'TotalIvaNoDocumentada', 'TotalNoDocumentada', 'TotalNeto', 'TotalIva', 'Total', 'TotalNetoReal', 'TotalIvaReal', 'TotalReal', 'Descripcion', 'FechaCreacion', 'FechaModificacion', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fecha', 'totalNetoDocumentada', 'totalIvaDocumentada', 'totalDocumentada', 'totalNetoNoDocumentada', 'totalIvaNoDocumentada', 'totalNoDocumentada', 'totalNeto', 'totalIva', 'total', 'totalNetoReal', 'totalIvaReal', 'totalReal', 'descripcion', 'fechaCreacion', 'fechaModificacion', ),
        BasePeer::TYPE_COLNAME => array (VentaPeer::ID, VentaPeer::FECHA, VentaPeer::TOTAL_NETO_DOCUMENTADA, VentaPeer::TOTAL_IVA_DOCUMENTADA, VentaPeer::TOTAL_DOCUMENTADA, VentaPeer::TOTAL_NETO_NO_DOCUMENTADA, VentaPeer::TOTAL_IVA_NO_DOCUMENTADA, VentaPeer::TOTAL_NO_DOCUMENTADA, VentaPeer::TOTAL_NETO, VentaPeer::TOTAL_IVA, VentaPeer::TOTAL, VentaPeer::TOTAL_NETO_REAL, VentaPeer::TOTAL_IVA_REAL, VentaPeer::TOTAL_REAL, VentaPeer::DESCRIPCION, VentaPeer::FECHA_CREACION, VentaPeer::FECHA_MODIFICACION, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'FECHA', 'TOTAL_NETO_DOCUMENTADA', 'TOTAL_IVA_DOCUMENTADA', 'TOTAL_DOCUMENTADA', 'TOTAL_NETO_NO_DOCUMENTADA', 'TOTAL_IVA_NO_DOCUMENTADA', 'TOTAL_NO_DOCUMENTADA', 'TOTAL_NETO', 'TOTAL_IVA', 'TOTAL', 'TOTAL_NETO_REAL', 'TOTAL_IVA_REAL', 'TOTAL_REAL', 'DESCRIPCION', 'FECHA_CREACION', 'FECHA_MODIFICACION', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'fecha', 'total_neto_documentada', 'total_iva_documentada', 'total_documentada', 'total_neto_no_documentada', 'total_iva_no_documentada', 'total_no_documentada', 'total_neto', 'total_iva', 'total', 'total_neto_real', 'total_iva_real', 'total_real', 'descripcion', 'fecha_creacion', 'fecha_modificacion', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. VentaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecha' => 1, 'TotalNetoDocumentada' => 2, 'TotalIvaDocumentada' => 3, 'TotalDocumentada' => 4, 'TotalNetoNoDocumentada' => 5, 'TotalIvaNoDocumentada' => 6, 'TotalNoDocumentada' => 7, 'TotalNeto' => 8, 'TotalIva' => 9, 'Total' => 10, 'TotalNetoReal' => 11, 'TotalIvaReal' => 12, 'TotalReal' => 13, 'Descripcion' => 14, 'FechaCreacion' => 15, 'FechaModificacion' => 16, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fecha' => 1, 'totalNetoDocumentada' => 2, 'totalIvaDocumentada' => 3, 'totalDocumentada' => 4, 'totalNetoNoDocumentada' => 5, 'totalIvaNoDocumentada' => 6, 'totalNoDocumentada' => 7, 'totalNeto' => 8, 'totalIva' => 9, 'total' => 10, 'totalNetoReal' => 11, 'totalIvaReal' => 12, 'totalReal' => 13, 'descripcion' => 14, 'fechaCreacion' => 15, 'fechaModificacion' => 16, ),
        BasePeer::TYPE_COLNAME => array (VentaPeer::ID => 0, VentaPeer::FECHA => 1, VentaPeer::TOTAL_NETO_DOCUMENTADA => 2, VentaPeer::TOTAL_IVA_DOCUMENTADA => 3, VentaPeer::TOTAL_DOCUMENTADA => 4, VentaPeer::TOTAL_NETO_NO_DOCUMENTADA => 5, VentaPeer::TOTAL_IVA_NO_DOCUMENTADA => 6, VentaPeer::TOTAL_NO_DOCUMENTADA => 7, VentaPeer::TOTAL_NETO => 8, VentaPeer::TOTAL_IVA => 9, VentaPeer::TOTAL => 10, VentaPeer::TOTAL_NETO_REAL => 11, VentaPeer::TOTAL_IVA_REAL => 12, VentaPeer::TOTAL_REAL => 13, VentaPeer::DESCRIPCION => 14, VentaPeer::FECHA_CREACION => 15, VentaPeer::FECHA_MODIFICACION => 16, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'FECHA' => 1, 'TOTAL_NETO_DOCUMENTADA' => 2, 'TOTAL_IVA_DOCUMENTADA' => 3, 'TOTAL_DOCUMENTADA' => 4, 'TOTAL_NETO_NO_DOCUMENTADA' => 5, 'TOTAL_IVA_NO_DOCUMENTADA' => 6, 'TOTAL_NO_DOCUMENTADA' => 7, 'TOTAL_NETO' => 8, 'TOTAL_IVA' => 9, 'TOTAL' => 10, 'TOTAL_NETO_REAL' => 11, 'TOTAL_IVA_REAL' => 12, 'TOTAL_REAL' => 13, 'DESCRIPCION' => 14, 'FECHA_CREACION' => 15, 'FECHA_MODIFICACION' => 16, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecha' => 1, 'total_neto_documentada' => 2, 'total_iva_documentada' => 3, 'total_documentada' => 4, 'total_neto_no_documentada' => 5, 'total_iva_no_documentada' => 6, 'total_no_documentada' => 7, 'total_neto' => 8, 'total_iva' => 9, 'total' => 10, 'total_neto_real' => 11, 'total_iva_real' => 12, 'total_real' => 13, 'descripcion' => 14, 'fecha_creacion' => 15, 'fecha_modificacion' => 16, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $toNames = VentaPeer::getFieldNames($toType);
        $key = isset(VentaPeer::$fieldKeys[$fromType][$name]) ? VentaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(VentaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, VentaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return VentaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. VentaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(VentaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(VentaPeer::ID);
            $criteria->addSelectColumn(VentaPeer::FECHA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_NETO_DOCUMENTADA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_IVA_DOCUMENTADA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_DOCUMENTADA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_NETO_NO_DOCUMENTADA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_IVA_NO_DOCUMENTADA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_NO_DOCUMENTADA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_NETO);
            $criteria->addSelectColumn(VentaPeer::TOTAL_IVA);
            $criteria->addSelectColumn(VentaPeer::TOTAL);
            $criteria->addSelectColumn(VentaPeer::TOTAL_NETO_REAL);
            $criteria->addSelectColumn(VentaPeer::TOTAL_IVA_REAL);
            $criteria->addSelectColumn(VentaPeer::TOTAL_REAL);
            $criteria->addSelectColumn(VentaPeer::DESCRIPCION);
            $criteria->addSelectColumn(VentaPeer::FECHA_CREACION);
            $criteria->addSelectColumn(VentaPeer::FECHA_MODIFICACION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.fecha');
            $criteria->addSelectColumn($alias . '.total_neto_documentada');
            $criteria->addSelectColumn($alias . '.total_iva_documentada');
            $criteria->addSelectColumn($alias . '.total_documentada');
            $criteria->addSelectColumn($alias . '.total_neto_no_documentada');
            $criteria->addSelectColumn($alias . '.total_iva_no_documentada');
            $criteria->addSelectColumn($alias . '.total_no_documentada');
            $criteria->addSelectColumn($alias . '.total_neto');
            $criteria->addSelectColumn($alias . '.total_iva');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.total_neto_real');
            $criteria->addSelectColumn($alias . '.total_iva_real');
            $criteria->addSelectColumn($alias . '.total_real');
            $criteria->addSelectColumn($alias . '.descripcion');
            $criteria->addSelectColumn($alias . '.fecha_creacion');
            $criteria->addSelectColumn($alias . '.fecha_modificacion');
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
        $criteria->setPrimaryTableName(VentaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VentaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(VentaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Venta
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = VentaPeer::doSelect($critcopy, $con);
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
        return VentaPeer::populateObjects(VentaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            VentaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(VentaPeer::DATABASE_NAME);

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
     * @param      Venta $obj A Venta object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            VentaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Venta object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Venta) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Venta object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(VentaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Venta Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(VentaPeer::$instances[$key])) {
                return VentaPeer::$instances[$key];
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
        foreach (VentaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        VentaPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to venta
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
        $cls = VentaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = VentaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = VentaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VentaPeer::addInstanceToPool($obj, $key);
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
     * @return array (Venta object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = VentaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = VentaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + VentaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VentaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            VentaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        return Propel::getDatabaseMap(VentaPeer::DATABASE_NAME)->getTable(VentaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseVentaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseVentaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new VentaTableMap());
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
        return VentaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Venta or Criteria object.
     *
     * @param      mixed $values Criteria or Venta object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Venta object
        }

        if ($criteria->containsKey(VentaPeer::ID) && $criteria->keyContainsValue(VentaPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.VentaPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(VentaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Venta or Criteria object.
     *
     * @param      mixed $values Criteria or Venta object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(VentaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(VentaPeer::ID);
            $value = $criteria->remove(VentaPeer::ID);
            if ($value) {
                $selectCriteria->add(VentaPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(VentaPeer::TABLE_NAME);
            }

        } else { // $values is Venta object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(VentaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the venta table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(VentaPeer::TABLE_NAME, $con, VentaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VentaPeer::clearInstancePool();
            VentaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Venta or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Venta object or primary key or array of primary keys
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
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            VentaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Venta) { // it's a model object
            // invalidate the cache for this single object
            VentaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VentaPeer::DATABASE_NAME);
            $criteria->add(VentaPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                VentaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(VentaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            VentaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Venta object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Venta $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(VentaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(VentaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(VentaPeer::DATABASE_NAME, VentaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Venta
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = VentaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(VentaPeer::DATABASE_NAME);
        $criteria->add(VentaPeer::ID, $pk);

        $v = VentaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Venta[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(VentaPeer::DATABASE_NAME);
            $criteria->add(VentaPeer::ID, $pks, Criteria::IN);
            $objs = VentaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseVentaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseVentaPeer::buildTableMap();

