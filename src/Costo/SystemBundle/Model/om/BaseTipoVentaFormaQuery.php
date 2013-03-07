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
use Costo\SystemBundle\Model\TipoVentaForma;
use Costo\SystemBundle\Model\TipoVentaFormaPeer;
use Costo\SystemBundle\Model\TipoVentaFormaQuery;
use Costo\SystemBundle\Model\VentaForma;

/**
 * Base class that represents a query for the 'tipo_venta_forma' table.
 *
 *
 *
 * @method TipoVentaFormaQuery orderByIdTipoVentaForma($order = Criteria::ASC) Order by the id_tipo_venta_forma column
 * @method TipoVentaFormaQuery orderByNombreTipoVentaForma($order = Criteria::ASC) Order by the nombre_tipo_venta_forma column
 * @method TipoVentaFormaQuery orderByDescripcionTipoVentaForma($order = Criteria::ASC) Order by the descripcion_tipo_venta_forma column
 * @method TipoVentaFormaQuery orderByFechaCreacionTipoVentaForma($order = Criteria::ASC) Order by the fecha_creacion_tipo_venta_forma column
 * @method TipoVentaFormaQuery orderByFechaActualizacionTipoVentaForma($order = Criteria::ASC) Order by the fecha_modificacion_tipo_venta_forma column
 *
 * @method TipoVentaFormaQuery groupByIdTipoVentaForma() Group by the id_tipo_venta_forma column
 * @method TipoVentaFormaQuery groupByNombreTipoVentaForma() Group by the nombre_tipo_venta_forma column
 * @method TipoVentaFormaQuery groupByDescripcionTipoVentaForma() Group by the descripcion_tipo_venta_forma column
 * @method TipoVentaFormaQuery groupByFechaCreacionTipoVentaForma() Group by the fecha_creacion_tipo_venta_forma column
 * @method TipoVentaFormaQuery groupByFechaActualizacionTipoVentaForma() Group by the fecha_modificacion_tipo_venta_forma column
 *
 * @method TipoVentaFormaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TipoVentaFormaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TipoVentaFormaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TipoVentaFormaQuery leftJoinVentaForma($relationAlias = null) Adds a LEFT JOIN clause to the query using the VentaForma relation
 * @method TipoVentaFormaQuery rightJoinVentaForma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VentaForma relation
 * @method TipoVentaFormaQuery innerJoinVentaForma($relationAlias = null) Adds a INNER JOIN clause to the query using the VentaForma relation
 *
 * @method TipoVentaForma findOne(PropelPDO $con = null) Return the first TipoVentaForma matching the query
 * @method TipoVentaForma findOneOrCreate(PropelPDO $con = null) Return the first TipoVentaForma matching the query, or a new TipoVentaForma object populated from the query conditions when no match is found
 *
 * @method TipoVentaForma findOneByNombreTipoVentaForma(string $nombre_tipo_venta_forma) Return the first TipoVentaForma filtered by the nombre_tipo_venta_forma column
 * @method TipoVentaForma findOneByDescripcionTipoVentaForma(string $descripcion_tipo_venta_forma) Return the first TipoVentaForma filtered by the descripcion_tipo_venta_forma column
 * @method TipoVentaForma findOneByFechaCreacionTipoVentaForma(string $fecha_creacion_tipo_venta_forma) Return the first TipoVentaForma filtered by the fecha_creacion_tipo_venta_forma column
 * @method TipoVentaForma findOneByFechaActualizacionTipoVentaForma(string $fecha_modificacion_tipo_venta_forma) Return the first TipoVentaForma filtered by the fecha_modificacion_tipo_venta_forma column
 *
 * @method array findByIdTipoVentaForma(int $id_tipo_venta_forma) Return TipoVentaForma objects filtered by the id_tipo_venta_forma column
 * @method array findByNombreTipoVentaForma(string $nombre_tipo_venta_forma) Return TipoVentaForma objects filtered by the nombre_tipo_venta_forma column
 * @method array findByDescripcionTipoVentaForma(string $descripcion_tipo_venta_forma) Return TipoVentaForma objects filtered by the descripcion_tipo_venta_forma column
 * @method array findByFechaCreacionTipoVentaForma(string $fecha_creacion_tipo_venta_forma) Return TipoVentaForma objects filtered by the fecha_creacion_tipo_venta_forma column
 * @method array findByFechaActualizacionTipoVentaForma(string $fecha_modificacion_tipo_venta_forma) Return TipoVentaForma objects filtered by the fecha_modificacion_tipo_venta_forma column
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseTipoVentaFormaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTipoVentaFormaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'testing', $modelName = 'Costo\\SystemBundle\\Model\\TipoVentaForma', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TipoVentaFormaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TipoVentaFormaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TipoVentaFormaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TipoVentaFormaQuery) {
            return $criteria;
        }
        $query = new TipoVentaFormaQuery();
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
     * @return   TipoVentaForma|TipoVentaForma[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TipoVentaFormaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TipoVentaFormaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TipoVentaForma A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTipoVentaForma($key, $con = null)
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
     * @return                 TipoVentaForma A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tipo_venta_forma`, `nombre_tipo_venta_forma`, `descripcion_tipo_venta_forma`, `fecha_creacion_tipo_venta_forma`, `fecha_modificacion_tipo_venta_forma` FROM `tipo_venta_forma` WHERE `id_tipo_venta_forma` = :p0';
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
            $obj = new TipoVentaForma();
            $obj->hydrate($row);
            TipoVentaFormaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TipoVentaForma|TipoVentaForma[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TipoVentaForma[]|mixed the list of results, formatted by the current formatter
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
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TipoVentaFormaPeer::ID_TIPO_VENTA_FORMA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TipoVentaFormaPeer::ID_TIPO_VENTA_FORMA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tipo_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTipoVentaForma(1234); // WHERE id_tipo_venta_forma = 1234
     * $query->filterByIdTipoVentaForma(array(12, 34)); // WHERE id_tipo_venta_forma IN (12, 34)
     * $query->filterByIdTipoVentaForma(array('min' => 12)); // WHERE id_tipo_venta_forma >= 12
     * $query->filterByIdTipoVentaForma(array('max' => 12)); // WHERE id_tipo_venta_forma <= 12
     * </code>
     *
     * @param     mixed $idTipoVentaForma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function filterByIdTipoVentaForma($idTipoVentaForma = null, $comparison = null)
    {
        if (is_array($idTipoVentaForma)) {
            $useMinMax = false;
            if (isset($idTipoVentaForma['min'])) {
                $this->addUsingAlias(TipoVentaFormaPeer::ID_TIPO_VENTA_FORMA, $idTipoVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTipoVentaForma['max'])) {
                $this->addUsingAlias(TipoVentaFormaPeer::ID_TIPO_VENTA_FORMA, $idTipoVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TipoVentaFormaPeer::ID_TIPO_VENTA_FORMA, $idTipoVentaForma, $comparison);
    }

    /**
     * Filter the query on the nombre_tipo_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreTipoVentaForma('fooValue');   // WHERE nombre_tipo_venta_forma = 'fooValue'
     * $query->filterByNombreTipoVentaForma('%fooValue%'); // WHERE nombre_tipo_venta_forma LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreTipoVentaForma The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function filterByNombreTipoVentaForma($nombreTipoVentaForma = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreTipoVentaForma)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombreTipoVentaForma)) {
                $nombreTipoVentaForma = str_replace('*', '%', $nombreTipoVentaForma);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TipoVentaFormaPeer::NOMBRE_TIPO_VENTA_FORMA, $nombreTipoVentaForma, $comparison);
    }

    /**
     * Filter the query on the descripcion_tipo_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionTipoVentaForma('fooValue');   // WHERE descripcion_tipo_venta_forma = 'fooValue'
     * $query->filterByDescripcionTipoVentaForma('%fooValue%'); // WHERE descripcion_tipo_venta_forma LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionTipoVentaForma The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function filterByDescripcionTipoVentaForma($descripcionTipoVentaForma = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionTipoVentaForma)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionTipoVentaForma)) {
                $descripcionTipoVentaForma = str_replace('*', '%', $descripcionTipoVentaForma);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TipoVentaFormaPeer::DESCRIPCION_TIPO_VENTA_FORMA, $descripcionTipoVentaForma, $comparison);
    }

    /**
     * Filter the query on the fecha_creacion_tipo_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCreacionTipoVentaForma('2011-03-14'); // WHERE fecha_creacion_tipo_venta_forma = '2011-03-14'
     * $query->filterByFechaCreacionTipoVentaForma('now'); // WHERE fecha_creacion_tipo_venta_forma = '2011-03-14'
     * $query->filterByFechaCreacionTipoVentaForma(array('max' => 'yesterday')); // WHERE fecha_creacion_tipo_venta_forma > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCreacionTipoVentaForma The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function filterByFechaCreacionTipoVentaForma($fechaCreacionTipoVentaForma = null, $comparison = null)
    {
        if (is_array($fechaCreacionTipoVentaForma)) {
            $useMinMax = false;
            if (isset($fechaCreacionTipoVentaForma['min'])) {
                $this->addUsingAlias(TipoVentaFormaPeer::FECHA_CREACION_TIPO_VENTA_FORMA, $fechaCreacionTipoVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCreacionTipoVentaForma['max'])) {
                $this->addUsingAlias(TipoVentaFormaPeer::FECHA_CREACION_TIPO_VENTA_FORMA, $fechaCreacionTipoVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TipoVentaFormaPeer::FECHA_CREACION_TIPO_VENTA_FORMA, $fechaCreacionTipoVentaForma, $comparison);
    }

    /**
     * Filter the query on the fecha_modificacion_tipo_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaActualizacionTipoVentaForma('2011-03-14'); // WHERE fecha_modificacion_tipo_venta_forma = '2011-03-14'
     * $query->filterByFechaActualizacionTipoVentaForma('now'); // WHERE fecha_modificacion_tipo_venta_forma = '2011-03-14'
     * $query->filterByFechaActualizacionTipoVentaForma(array('max' => 'yesterday')); // WHERE fecha_modificacion_tipo_venta_forma > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaActualizacionTipoVentaForma The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function filterByFechaActualizacionTipoVentaForma($fechaActualizacionTipoVentaForma = null, $comparison = null)
    {
        if (is_array($fechaActualizacionTipoVentaForma)) {
            $useMinMax = false;
            if (isset($fechaActualizacionTipoVentaForma['min'])) {
                $this->addUsingAlias(TipoVentaFormaPeer::FECHA_MODIFICACION_TIPO_VENTA_FORMA, $fechaActualizacionTipoVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaActualizacionTipoVentaForma['max'])) {
                $this->addUsingAlias(TipoVentaFormaPeer::FECHA_MODIFICACION_TIPO_VENTA_FORMA, $fechaActualizacionTipoVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TipoVentaFormaPeer::FECHA_MODIFICACION_TIPO_VENTA_FORMA, $fechaActualizacionTipoVentaForma, $comparison);
    }

    /**
     * Filter the query by a related VentaForma object
     *
     * @param   VentaForma|PropelObjectCollection $ventaForma  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TipoVentaFormaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVentaForma($ventaForma, $comparison = null)
    {
        if ($ventaForma instanceof VentaForma) {
            return $this
                ->addUsingAlias(TipoVentaFormaPeer::ID_TIPO_VENTA_FORMA, $ventaForma->getIdTipoVentaForma(), $comparison);
        } elseif ($ventaForma instanceof PropelObjectCollection) {
            return $this
                ->useVentaFormaQuery()
                ->filterByPrimaryKeys($ventaForma->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVentaForma() only accepts arguments of type VentaForma or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VentaForma relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function joinVentaForma($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VentaForma');

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
            $this->addJoinObject($join, 'VentaForma');
        }

        return $this;
    }

    /**
     * Use the VentaForma relation VentaForma object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Costo\SystemBundle\Model\VentaFormaQuery A secondary query class using the current class as primary query
     */
    public function useVentaFormaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVentaForma($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VentaForma', '\Costo\SystemBundle\Model\VentaFormaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TipoVentaForma $tipoVentaForma Object to remove from the list of results
     *
     * @return TipoVentaFormaQuery The current query, for fluid interface
     */
    public function prune($tipoVentaForma = null)
    {
        if ($tipoVentaForma) {
            $this->addUsingAlias(TipoVentaFormaPeer::ID_TIPO_VENTA_FORMA, $tipoVentaForma->getIdTipoVentaForma(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     TipoVentaFormaQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(TipoVentaFormaPeer::FECHA_MODIFICACION_TIPO_VENTA_FORMA, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     TipoVentaFormaQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(TipoVentaFormaPeer::FECHA_MODIFICACION_TIPO_VENTA_FORMA);
    }

    /**
     * Order by update date asc
     *
     * @return     TipoVentaFormaQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(TipoVentaFormaPeer::FECHA_MODIFICACION_TIPO_VENTA_FORMA);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     TipoVentaFormaQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(TipoVentaFormaPeer::FECHA_CREACION_TIPO_VENTA_FORMA, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     TipoVentaFormaQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(TipoVentaFormaPeer::FECHA_CREACION_TIPO_VENTA_FORMA);
    }

    /**
     * Order by create date asc
     *
     * @return     TipoVentaFormaQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(TipoVentaFormaPeer::FECHA_CREACION_TIPO_VENTA_FORMA);
    }
}
