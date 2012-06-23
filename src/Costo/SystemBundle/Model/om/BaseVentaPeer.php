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
 * Base static class for performing query and update operations on the 'ajuste_venta' table.
 *
 * 
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseVentaPeer {

    /** the default database name for this class */
    const DATABASE_NAME = 'testing';

    /** the table name for this class */
    const TABLE_NAME = 'ajuste_venta';

    /** the related Propel class for this table */
    const OM_CLASS = 'Costo\\SystemBundle\\Model\\Venta';

    /** the related TableMap class for this table */
    const TM_CLASS = 'VentaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the ID_AJUSTE_VENTA field */
    const ID_AJUSTE_VENTA = 'ajuste_venta.ID_AJUSTE_VENTA';

    /** the column name for the FK_VENTA field */
    const FK_VENTA = 'ajuste_venta.FK_VENTA';

    /** the column name for the FECHA_VENTA field */
    const FECHA_VENTA = 'ajuste_venta.FECHA_VENTA';

    /** the column name for the TIPO_VENTA field */
    const TIPO_VENTA = 'ajuste_venta.TIPO_VENTA';

    /** the column name for the TOTAL_VENTA field */
    const TOTAL_VENTA = 'ajuste_venta.TOTAL_VENTA';

    /** the column name for the TOTAL_VENTA_FORMAL field */
    const TOTAL_VENTA_FORMAL = 'ajuste_venta.TOTAL_VENTA_FORMAL';

    /** the column name for the TOTAL_VENTA_INFORMAL field */
    const TOTAL_VENTA_INFORMAL = 'ajuste_venta.TOTAL_VENTA_INFORMAL';

    /** the column name for the TOTAL_IVA_VENTA field */
    const TOTAL_IVA_VENTA = 'ajuste_venta.TOTAL_IVA_VENTA';

    /** the column name for the DETALLE_VENTA field */
    const DETALLE_VENTA = 'ajuste_venta.DETALLE_VENTA';

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
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdVenta', 'FkVenta', 'FechaVenta', 'TipoVenta', 'TotalVenta', 'TotalVentaFormal', 'TotalVentaInformal', 'TotalIvaVenta', 'DetalleVenta', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idVenta', 'fkVenta', 'fechaVenta', 'tipoVenta', 'totalVenta', 'totalVentaFormal', 'totalVentaInformal', 'totalIvaVenta', 'detalleVenta', ),
        BasePeer::TYPE_COLNAME => array (self::ID_AJUSTE_VENTA, self::FK_VENTA, self::FECHA_VENTA, self::TIPO_VENTA, self::TOTAL_VENTA, self::TOTAL_VENTA_FORMAL, self::TOTAL_VENTA_INFORMAL, self::TOTAL_IVA_VENTA, self::DETALLE_VENTA, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_AJUSTE_VENTA', 'FK_VENTA', 'FECHA_VENTA', 'TIPO_VENTA', 'TOTAL_VENTA', 'TOTAL_VENTA_FORMAL', 'TOTAL_VENTA_INFORMAL', 'TOTAL_IVA_VENTA', 'DETALLE_VENTA', ),
        BasePeer::TYPE_FIELDNAME => array ('id_ajuste_venta', 'fk_venta', 'fecha_venta', 'tipo_venta', 'total_venta', 'total_venta_formal', 'total_venta_informal', 'total_iva_venta', 'detalle_venta', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdVenta' => 0, 'FkVenta' => 1, 'FechaVenta' => 2, 'TipoVenta' => 3, 'TotalVenta' => 4, 'TotalVentaFormal' => 5, 'TotalVentaInformal' => 6, 'TotalIvaVenta' => 7, 'DetalleVenta' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idVenta' => 0, 'fkVenta' => 1, 'fechaVenta' => 2, 'tipoVenta' => 3, 'totalVenta' => 4, 'totalVentaFormal' => 5, 'totalVentaInformal' => 6, 'totalIvaVenta' => 7, 'detalleVenta' => 8, ),
        BasePeer::TYPE_COLNAME => array (self::ID_AJUSTE_VENTA => 0, self::FK_VENTA => 1, self::FECHA_VENTA => 2, self::TIPO_VENTA => 3, self::TOTAL_VENTA => 4, self::TOTAL_VENTA_FORMAL => 5, self::TOTAL_VENTA_INFORMAL => 6, self::TOTAL_IVA_VENTA => 7, self::DETALLE_VENTA => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_AJUSTE_VENTA' => 0, 'FK_VENTA' => 1, 'FECHA_VENTA' => 2, 'TIPO_VENTA' => 3, 'TOTAL_VENTA' => 4, 'TOTAL_VENTA_FORMAL' => 5, 'TOTAL_VENTA_INFORMAL' => 6, 'TOTAL_IVA_VENTA' => 7, 'DETALLE_VENTA' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('id_ajuste_venta' => 0, 'fk_venta' => 1, 'fecha_venta' => 2, 'tipo_venta' => 3, 'total_venta' => 4, 'total_venta_formal' => 5, 'total_venta_informal' => 6, 'total_iva_venta' => 7, 'detalle_venta' => 8, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $toNames = self::getFieldNames($toType);
        $key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, self::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return self::$fieldNames[$type];
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
            $criteria->addSelectColumn(VentaPeer::ID_AJUSTE_VENTA);
            $criteria->addSelectColumn(VentaPeer::FK_VENTA);
            $criteria->addSelectColumn(VentaPeer::FECHA_VENTA);
            $criteria->addSelectColumn(VentaPeer::TIPO_VENTA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_VENTA);
            $criteria->addSelectColumn(VentaPeer::TOTAL_VENTA_FORMAL);
            $criteria->addSelectColumn(VentaPeer::TOTAL_VENTA_INFORMAL);
            $criteria->addSelectColumn(VentaPeer::TOTAL_IVA_VENTA);
            $criteria->addSelectColumn(VentaPeer::DETALLE_VENTA);
        } else {
            $criteria->addSelectColumn($alias . '.ID_AJUSTE_VENTA');
            $criteria->addSelectColumn($alias . '.FK_VENTA');
            $criteria->addSelectColumn($alias . '.FECHA_VENTA');
            $criteria->addSelectColumn($alias . '.TIPO_VENTA');
            $criteria->addSelectColumn($alias . '.TOTAL_VENTA');
            $criteria->addSelectColumn($alias . '.TOTAL_VENTA_FORMAL');
            $criteria->addSelectColumn($alias . '.TOTAL_VENTA_INFORMAL');
            $criteria->addSelectColumn($alias . '.TOTAL_IVA_VENTA');
            $criteria->addSelectColumn($alias . '.DETALLE_VENTA');
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
        $criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

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
     * Use this method directly if you want to work with an executed statement durirectly (for example
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
        $criteria->setDbName(self::DATABASE_NAME);

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
                $key = (string) $obj->getIdVenta();
            } // if key === null
            self::$instances[$key] = $obj;
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
                $key = (string) $value->getIdVenta();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Venta object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Venta Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(self::$instances[$key])) {
                return self::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        self::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ajuste_venta
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
     * @return string A string version of PK or NULL if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return NULL.
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
        return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
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
    public static function getOMClass()
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

        if ($criteria->containsKey(VentaPeer::ID_AJUSTE_VENTA) && $criteria->keyContainsValue(VentaPeer::ID_AJUSTE_VENTA) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.VentaPeer::ID_AJUSTE_VENTA.')');
        }


        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

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

        $selectCriteria = new Criteria(self::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(VentaPeer::ID_AJUSTE_VENTA);
            $value = $criteria->remove(VentaPeer::ID_AJUSTE_VENTA);
            if ($value) {
                $selectCriteria->add(VentaPeer::ID_AJUSTE_VENTA, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(VentaPeer::TABLE_NAME);
            }

        } else { // $values is Venta object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ajuste_venta table.
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
            $criteria = new Criteria(self::DATABASE_NAME);
            $criteria->add(VentaPeer::ID_AJUSTE_VENTA, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                VentaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

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
        $criteria->add(VentaPeer::ID_AJUSTE_VENTA, $pk);

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
            $criteria->add(VentaPeer::ID_AJUSTE_VENTA, $pks, Criteria::IN);
            $objs = VentaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseVentaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseVentaPeer::buildTableMap();

