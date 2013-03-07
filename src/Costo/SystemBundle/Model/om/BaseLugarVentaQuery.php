<?php

namespace Costo\SystemBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Costo\SystemBundle\Model\DetalleVenta;
use Costo\SystemBundle\Model\LugarVenta;
use Costo\SystemBundle\Model\LugarVentaPeer;
use Costo\SystemBundle\Model\LugarVentaQuery;

/**
 * Base class that represents a query for the 'lugar_venta' table.
 *
 *
 *
 * @method LugarVentaQuery orderByIdLugarVenta($order = Criteria::ASC) Order by the id_lugar_venta column
 * @method LugarVentaQuery orderByNombreLugarVenta($order = Criteria::ASC) Order by the nombre_lugar_venta column
 * @method LugarVentaQuery orderByDescripcionLugarVenta($order = Criteria::ASC) Order by the descripcion_lugar_venta column
 * @method LugarVentaQuery orderByEncargadoLugarVenta($order = Criteria::ASC) Order by the encargado_lugar_venta column
 * @method LugarVentaQuery orderByFechaCreacionLugarVenta($order = Criteria::ASC) Order by the fecha_creacion_lugar_venta column
 * @method LugarVentaQuery orderByFechaModificacionLugarVenta($order = Criteria::ASC) Order by the fecha_modificacion_lugar_venta column
 *
 * @method LugarVentaQuery groupByIdLugarVenta() Group by the id_lugar_venta column
 * @method LugarVentaQuery groupByNombreLugarVenta() Group by the nombre_lugar_venta column
 * @method LugarVentaQuery groupByDescripcionLugarVenta() Group by the descripcion_lugar_venta column
 * @method LugarVentaQuery groupByEncargadoLugarVenta() Group by the encargado_lugar_venta column
 * @method LugarVentaQuery groupByFechaCreacionLugarVenta() Group by the fecha_creacion_lugar_venta column
 * @method LugarVentaQuery groupByFechaModificacionLugarVenta() Group by the fecha_modificacion_lugar_venta column
 *
 * @method LugarVentaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LugarVentaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LugarVentaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LugarVentaQuery leftJoinDetalleVenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the DetalleVenta relation
 * @method LugarVentaQuery rightJoinDetalleVenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DetalleVenta relation
 * @method LugarVentaQuery innerJoinDetalleVenta($relationAlias = null) Adds a INNER JOIN clause to the query using the DetalleVenta relation
 *
 * @method LugarVenta findOne(PropelPDO $con = null) Return the first LugarVenta matching the query
 * @method LugarVenta findOneOrCreate(PropelPDO $con = null) Return the first LugarVenta matching the query, or a new LugarVenta object populated from the query conditions when no match is found
 *
 * @method LugarVenta findOneByNombreLugarVenta(string $nombre_lugar_venta) Return the first LugarVenta filtered by the nombre_lugar_venta column
 * @method LugarVenta findOneByDescripcionLugarVenta(string $descripcion_lugar_venta) Return the first LugarVenta filtered by the descripcion_lugar_venta column
 * @method LugarVenta findOneByEncargadoLugarVenta(string $encargado_lugar_venta) Return the first LugarVenta filtered by the encargado_lugar_venta column
 * @method LugarVenta findOneByFechaCreacionLugarVenta(string $fecha_creacion_lugar_venta) Return the first LugarVenta filtered by the fecha_creacion_lugar_venta column
 * @method LugarVenta findOneByFechaModificacionLugarVenta(string $fecha_modificacion_lugar_venta) Return the first LugarVenta filtered by the fecha_modificacion_lugar_venta column
 *
 * @method array findByIdLugarVenta(int $id_lugar_venta) Return LugarVenta objects filtered by the id_lugar_venta column
 * @method array findByNombreLugarVenta(string $nombre_lugar_venta) Return LugarVenta objects filtered by the nombre_lugar_venta column
 * @method array findByDescripcionLugarVenta(string $descripcion_lugar_venta) Return LugarVenta objects filtered by the descripcion_lugar_venta column
 * @method array findByEncargadoLugarVenta(string $encargado_lugar_venta) Return LugarVenta objects filtered by the encargado_lugar_venta column
 * @method array findByFechaCreacionLugarVenta(string $fecha_creacion_lugar_venta) Return LugarVenta objects filtered by the fecha_creacion_lugar_venta column
 * @method array findByFechaModificacionLugarVenta(string $fecha_modificacion_lugar_venta) Return LugarVenta objects filtered by the fecha_modificacion_lugar_venta column
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseLugarVentaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLugarVentaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'testing', $modelName = 'Costo\\SystemBundle\\Model\\LugarVenta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LugarVentaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LugarVentaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LugarVentaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LugarVentaQuery) {
            return $criteria;
        }
        $query = new LugarVentaQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   LugarVenta|LugarVenta[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LugarVentaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LugarVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 LugarVenta A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdLugarVenta($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 LugarVenta A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_lugar_venta`, `nombre_lugar_venta`, `descripcion_lugar_venta`, `encargado_lugar_venta`, `fecha_creacion_lugar_venta`, `fecha_modificacion_lugar_venta` FROM `lugar_venta` WHERE `id_lugar_venta` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new LugarVenta();
            $obj->hydrate($row);
            LugarVentaPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return LugarVenta|LugarVenta[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|LugarVenta[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LugarVentaPeer::ID_LUGAR_VENTA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LugarVentaPeer::ID_LUGAR_VENTA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_lugar_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLugarVenta(1234); // WHERE id_lugar_venta = 1234
     * $query->filterByIdLugarVenta(array(12, 34)); // WHERE id_lugar_venta IN (12, 34)
     * $query->filterByIdLugarVenta(array('min' => 12)); // WHERE id_lugar_venta >= 12
     * $query->filterByIdLugarVenta(array('max' => 12)); // WHERE id_lugar_venta <= 12
     * </code>
     *
     * @param     mixed $idLugarVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByIdLugarVenta($idLugarVenta = null, $comparison = null)
    {
        if (is_array($idLugarVenta)) {
            $useMinMax = false;
            if (isset($idLugarVenta['min'])) {
                $this->addUsingAlias(LugarVentaPeer::ID_LUGAR_VENTA, $idLugarVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLugarVenta['max'])) {
                $this->addUsingAlias(LugarVentaPeer::ID_LUGAR_VENTA, $idLugarVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LugarVentaPeer::ID_LUGAR_VENTA, $idLugarVenta, $comparison);
    }

    /**
     * Filter the query on the nombre_lugar_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreLugarVenta('fooValue');   // WHERE nombre_lugar_venta = 'fooValue'
     * $query->filterByNombreLugarVenta('%fooValue%'); // WHERE nombre_lugar_venta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreLugarVenta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByNombreLugarVenta($nombreLugarVenta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreLugarVenta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombreLugarVenta)) {
                $nombreLugarVenta = str_replace('*', '%', $nombreLugarVenta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LugarVentaPeer::NOMBRE_LUGAR_VENTA, $nombreLugarVenta, $comparison);
    }

    /**
     * Filter the query on the descripcion_lugar_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionLugarVenta('fooValue');   // WHERE descripcion_lugar_venta = 'fooValue'
     * $query->filterByDescripcionLugarVenta('%fooValue%'); // WHERE descripcion_lugar_venta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionLugarVenta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByDescripcionLugarVenta($descripcionLugarVenta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionLugarVenta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionLugarVenta)) {
                $descripcionLugarVenta = str_replace('*', '%', $descripcionLugarVenta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LugarVentaPeer::DESCRIPCION_LUGAR_VENTA, $descripcionLugarVenta, $comparison);
    }

    /**
     * Filter the query on the encargado_lugar_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByEncargadoLugarVenta('fooValue');   // WHERE encargado_lugar_venta = 'fooValue'
     * $query->filterByEncargadoLugarVenta('%fooValue%'); // WHERE encargado_lugar_venta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $encargadoLugarVenta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByEncargadoLugarVenta($encargadoLugarVenta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($encargadoLugarVenta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $encargadoLugarVenta)) {
                $encargadoLugarVenta = str_replace('*', '%', $encargadoLugarVenta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LugarVentaPeer::ENCARGADO_LUGAR_VENTA, $encargadoLugarVenta, $comparison);
    }

    /**
     * Filter the query on the fecha_creacion_lugar_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCreacionLugarVenta('2011-03-14'); // WHERE fecha_creacion_lugar_venta = '2011-03-14'
     * $query->filterByFechaCreacionLugarVenta('now'); // WHERE fecha_creacion_lugar_venta = '2011-03-14'
     * $query->filterByFechaCreacionLugarVenta(array('max' => 'yesterday')); // WHERE fecha_creacion_lugar_venta > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCreacionLugarVenta The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByFechaCreacionLugarVenta($fechaCreacionLugarVenta = null, $comparison = null)
    {
        if (is_array($fechaCreacionLugarVenta)) {
            $useMinMax = false;
            if (isset($fechaCreacionLugarVenta['min'])) {
                $this->addUsingAlias(LugarVentaPeer::FECHA_CREACION_LUGAR_VENTA, $fechaCreacionLugarVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCreacionLugarVenta['max'])) {
                $this->addUsingAlias(LugarVentaPeer::FECHA_CREACION_LUGAR_VENTA, $fechaCreacionLugarVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LugarVentaPeer::FECHA_CREACION_LUGAR_VENTA, $fechaCreacionLugarVenta, $comparison);
    }

    /**
     * Filter the query on the fecha_modificacion_lugar_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaModificacionLugarVenta('2011-03-14'); // WHERE fecha_modificacion_lugar_venta = '2011-03-14'
     * $query->filterByFechaModificacionLugarVenta('now'); // WHERE fecha_modificacion_lugar_venta = '2011-03-14'
     * $query->filterByFechaModificacionLugarVenta(array('max' => 'yesterday')); // WHERE fecha_modificacion_lugar_venta > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaModificacionLugarVenta The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function filterByFechaModificacionLugarVenta($fechaModificacionLugarVenta = null, $comparison = null)
    {
        if (is_array($fechaModificacionLugarVenta)) {
            $useMinMax = false;
            if (isset($fechaModificacionLugarVenta['min'])) {
                $this->addUsingAlias(LugarVentaPeer::FECHA_MODIFICACION_LUGAR_VENTA, $fechaModificacionLugarVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaModificacionLugarVenta['max'])) {
                $this->addUsingAlias(LugarVentaPeer::FECHA_MODIFICACION_LUGAR_VENTA, $fechaModificacionLugarVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LugarVentaPeer::FECHA_MODIFICACION_LUGAR_VENTA, $fechaModificacionLugarVenta, $comparison);
    }

    /**
     * Filter the query by a related DetalleVenta object
     *
     * @param   DetalleVenta|PropelObjectCollection $detalleVenta  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LugarVentaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDetalleVenta($detalleVenta, $comparison = null)
    {
        if ($detalleVenta instanceof DetalleVenta) {
            return $this
                ->addUsingAlias(LugarVentaPeer::ID_LUGAR_VENTA, $detalleVenta->getIdLugarVenta(), $comparison);
        } elseif ($detalleVenta instanceof PropelObjectCollection) {
            return $this
                ->useDetalleVentaQuery()
                ->filterByPrimaryKeys($detalleVenta->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDetalleVenta() only accepts arguments of type DetalleVenta or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DetalleVenta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function joinDetalleVenta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DetalleVenta');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DetalleVenta');
        }

        return $this;
    }

    /**
     * Use the DetalleVenta relation DetalleVenta object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Costo\SystemBundle\Model\DetalleVentaQuery A secondary query class using the current class as primary query
     */
    public function useDetalleVentaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDetalleVenta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DetalleVenta', '\Costo\SystemBundle\Model\DetalleVentaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   LugarVenta $lugarVenta Object to remove from the list of results
     *
     * @return LugarVentaQuery The current query, for fluid interface
     */
    public function prune($lugarVenta = null)
    {
        if ($lugarVenta) {
            $this->addUsingAlias(LugarVentaPeer::ID_LUGAR_VENTA, $lugarVenta->getIdLugarVenta(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     LugarVentaQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(LugarVentaPeer::FECHA_MODIFICACION_LUGAR_VENTA, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     LugarVentaQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(LugarVentaPeer::FECHA_MODIFICACION_LUGAR_VENTA);
    }

    /**
     * Order by update date asc
     *
     * @return     LugarVentaQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(LugarVentaPeer::FECHA_MODIFICACION_LUGAR_VENTA);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     LugarVentaQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(LugarVentaPeer::FECHA_CREACION_LUGAR_VENTA, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     LugarVentaQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(LugarVentaPeer::FECHA_CREACION_LUGAR_VENTA);
    }

    /**
     * Order by create date asc
     *
     * @return     LugarVentaQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(LugarVentaPeer::FECHA_CREACION_LUGAR_VENTA);
    }
}
