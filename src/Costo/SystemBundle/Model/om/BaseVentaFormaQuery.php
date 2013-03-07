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
use Costo\SystemBundle\Model\TipoVentaForma;
use Costo\SystemBundle\Model\VentaForma;
use Costo\SystemBundle\Model\VentaFormaPeer;
use Costo\SystemBundle\Model\VentaFormaQuery;

/**
 * Base class that represents a query for the 'venta_forma' table.
 *
 *
 *
 * @method VentaFormaQuery orderByIdVentaForma($order = Criteria::ASC) Order by the id_venta_forma column
 * @method VentaFormaQuery orderByIdTipoVentaForma($order = Criteria::ASC) Order by the id_tipo_venta_forma column
 * @method VentaFormaQuery orderByNombreVentaForma($order = Criteria::ASC) Order by the nombre_venta_forma column
 * @method VentaFormaQuery orderByDescripcionVentaForma($order = Criteria::ASC) Order by the descripcion_venta_forma column
 * @method VentaFormaQuery orderByFechaCreacionVentaForma($order = Criteria::ASC) Order by the fecha_creacion_venta_forma column
 * @method VentaFormaQuery orderByFechaModificacionVentaForma($order = Criteria::ASC) Order by the fecha_modificacion_venta_forma column
 *
 * @method VentaFormaQuery groupByIdVentaForma() Group by the id_venta_forma column
 * @method VentaFormaQuery groupByIdTipoVentaForma() Group by the id_tipo_venta_forma column
 * @method VentaFormaQuery groupByNombreVentaForma() Group by the nombre_venta_forma column
 * @method VentaFormaQuery groupByDescripcionVentaForma() Group by the descripcion_venta_forma column
 * @method VentaFormaQuery groupByFechaCreacionVentaForma() Group by the fecha_creacion_venta_forma column
 * @method VentaFormaQuery groupByFechaModificacionVentaForma() Group by the fecha_modificacion_venta_forma column
 *
 * @method VentaFormaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VentaFormaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VentaFormaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VentaFormaQuery leftJoinTipoVentaForma($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoVentaForma relation
 * @method VentaFormaQuery rightJoinTipoVentaForma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoVentaForma relation
 * @method VentaFormaQuery innerJoinTipoVentaForma($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoVentaForma relation
 *
 * @method VentaFormaQuery leftJoinDetalleVenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the DetalleVenta relation
 * @method VentaFormaQuery rightJoinDetalleVenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DetalleVenta relation
 * @method VentaFormaQuery innerJoinDetalleVenta($relationAlias = null) Adds a INNER JOIN clause to the query using the DetalleVenta relation
 *
 * @method VentaForma findOne(PropelPDO $con = null) Return the first VentaForma matching the query
 * @method VentaForma findOneOrCreate(PropelPDO $con = null) Return the first VentaForma matching the query, or a new VentaForma object populated from the query conditions when no match is found
 *
 * @method VentaForma findOneByIdTipoVentaForma(int $id_tipo_venta_forma) Return the first VentaForma filtered by the id_tipo_venta_forma column
 * @method VentaForma findOneByNombreVentaForma(string $nombre_venta_forma) Return the first VentaForma filtered by the nombre_venta_forma column
 * @method VentaForma findOneByDescripcionVentaForma(string $descripcion_venta_forma) Return the first VentaForma filtered by the descripcion_venta_forma column
 * @method VentaForma findOneByFechaCreacionVentaForma(string $fecha_creacion_venta_forma) Return the first VentaForma filtered by the fecha_creacion_venta_forma column
 * @method VentaForma findOneByFechaModificacionVentaForma(string $fecha_modificacion_venta_forma) Return the first VentaForma filtered by the fecha_modificacion_venta_forma column
 *
 * @method array findByIdVentaForma(int $id_venta_forma) Return VentaForma objects filtered by the id_venta_forma column
 * @method array findByIdTipoVentaForma(int $id_tipo_venta_forma) Return VentaForma objects filtered by the id_tipo_venta_forma column
 * @method array findByNombreVentaForma(string $nombre_venta_forma) Return VentaForma objects filtered by the nombre_venta_forma column
 * @method array findByDescripcionVentaForma(string $descripcion_venta_forma) Return VentaForma objects filtered by the descripcion_venta_forma column
 * @method array findByFechaCreacionVentaForma(string $fecha_creacion_venta_forma) Return VentaForma objects filtered by the fecha_creacion_venta_forma column
 * @method array findByFechaModificacionVentaForma(string $fecha_modificacion_venta_forma) Return VentaForma objects filtered by the fecha_modificacion_venta_forma column
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseVentaFormaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVentaFormaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'testing', $modelName = 'Costo\\SystemBundle\\Model\\VentaForma', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VentaFormaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VentaFormaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VentaFormaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VentaFormaQuery) {
            return $criteria;
        }
        $query = new VentaFormaQuery();
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
     * @return   VentaForma|VentaForma[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VentaFormaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VentaFormaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 VentaForma A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdVentaForma($key, $con = null)
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
     * @return                 VentaForma A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_venta_forma`, `id_tipo_venta_forma`, `nombre_venta_forma`, `descripcion_venta_forma`, `fecha_creacion_venta_forma`, `fecha_modificacion_venta_forma` FROM `venta_forma` WHERE `id_venta_forma` = :p0';
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
            $obj = new VentaForma();
            $obj->hydrate($row);
            VentaFormaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return VentaForma|VentaForma[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|VentaForma[]|mixed the list of results, formatted by the current formatter
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
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VentaFormaPeer::ID_VENTA_FORMA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VentaFormaPeer::ID_VENTA_FORMA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByIdVentaForma(1234); // WHERE id_venta_forma = 1234
     * $query->filterByIdVentaForma(array(12, 34)); // WHERE id_venta_forma IN (12, 34)
     * $query->filterByIdVentaForma(array('min' => 12)); // WHERE id_venta_forma >= 12
     * $query->filterByIdVentaForma(array('max' => 12)); // WHERE id_venta_forma <= 12
     * </code>
     *
     * @param     mixed $idVentaForma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByIdVentaForma($idVentaForma = null, $comparison = null)
    {
        if (is_array($idVentaForma)) {
            $useMinMax = false;
            if (isset($idVentaForma['min'])) {
                $this->addUsingAlias(VentaFormaPeer::ID_VENTA_FORMA, $idVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVentaForma['max'])) {
                $this->addUsingAlias(VentaFormaPeer::ID_VENTA_FORMA, $idVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaFormaPeer::ID_VENTA_FORMA, $idVentaForma, $comparison);
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
     * @see       filterByTipoVentaForma()
     *
     * @param     mixed $idTipoVentaForma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByIdTipoVentaForma($idTipoVentaForma = null, $comparison = null)
    {
        if (is_array($idTipoVentaForma)) {
            $useMinMax = false;
            if (isset($idTipoVentaForma['min'])) {
                $this->addUsingAlias(VentaFormaPeer::ID_TIPO_VENTA_FORMA, $idTipoVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTipoVentaForma['max'])) {
                $this->addUsingAlias(VentaFormaPeer::ID_TIPO_VENTA_FORMA, $idTipoVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaFormaPeer::ID_TIPO_VENTA_FORMA, $idTipoVentaForma, $comparison);
    }

    /**
     * Filter the query on the nombre_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreVentaForma('fooValue');   // WHERE nombre_venta_forma = 'fooValue'
     * $query->filterByNombreVentaForma('%fooValue%'); // WHERE nombre_venta_forma LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreVentaForma The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByNombreVentaForma($nombreVentaForma = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreVentaForma)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombreVentaForma)) {
                $nombreVentaForma = str_replace('*', '%', $nombreVentaForma);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VentaFormaPeer::NOMBRE_VENTA_FORMA, $nombreVentaForma, $comparison);
    }

    /**
     * Filter the query on the descripcion_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionVentaForma('fooValue');   // WHERE descripcion_venta_forma = 'fooValue'
     * $query->filterByDescripcionVentaForma('%fooValue%'); // WHERE descripcion_venta_forma LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionVentaForma The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByDescripcionVentaForma($descripcionVentaForma = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionVentaForma)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionVentaForma)) {
                $descripcionVentaForma = str_replace('*', '%', $descripcionVentaForma);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VentaFormaPeer::DESCRIPCION_VENTA_FORMA, $descripcionVentaForma, $comparison);
    }

    /**
     * Filter the query on the fecha_creacion_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCreacionVentaForma('2011-03-14'); // WHERE fecha_creacion_venta_forma = '2011-03-14'
     * $query->filterByFechaCreacionVentaForma('now'); // WHERE fecha_creacion_venta_forma = '2011-03-14'
     * $query->filterByFechaCreacionVentaForma(array('max' => 'yesterday')); // WHERE fecha_creacion_venta_forma > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCreacionVentaForma The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByFechaCreacionVentaForma($fechaCreacionVentaForma = null, $comparison = null)
    {
        if (is_array($fechaCreacionVentaForma)) {
            $useMinMax = false;
            if (isset($fechaCreacionVentaForma['min'])) {
                $this->addUsingAlias(VentaFormaPeer::FECHA_CREACION_VENTA_FORMA, $fechaCreacionVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCreacionVentaForma['max'])) {
                $this->addUsingAlias(VentaFormaPeer::FECHA_CREACION_VENTA_FORMA, $fechaCreacionVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaFormaPeer::FECHA_CREACION_VENTA_FORMA, $fechaCreacionVentaForma, $comparison);
    }

    /**
     * Filter the query on the fecha_modificacion_venta_forma column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaModificacionVentaForma('2011-03-14'); // WHERE fecha_modificacion_venta_forma = '2011-03-14'
     * $query->filterByFechaModificacionVentaForma('now'); // WHERE fecha_modificacion_venta_forma = '2011-03-14'
     * $query->filterByFechaModificacionVentaForma(array('max' => 'yesterday')); // WHERE fecha_modificacion_venta_forma > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaModificacionVentaForma The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function filterByFechaModificacionVentaForma($fechaModificacionVentaForma = null, $comparison = null)
    {
        if (is_array($fechaModificacionVentaForma)) {
            $useMinMax = false;
            if (isset($fechaModificacionVentaForma['min'])) {
                $this->addUsingAlias(VentaFormaPeer::FECHA_MODIFICACION_VENTA_FORMA, $fechaModificacionVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaModificacionVentaForma['max'])) {
                $this->addUsingAlias(VentaFormaPeer::FECHA_MODIFICACION_VENTA_FORMA, $fechaModificacionVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaFormaPeer::FECHA_MODIFICACION_VENTA_FORMA, $fechaModificacionVentaForma, $comparison);
    }

    /**
     * Filter the query by a related TipoVentaForma object
     *
     * @param   TipoVentaForma|PropelObjectCollection $tipoVentaForma The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VentaFormaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTipoVentaForma($tipoVentaForma, $comparison = null)
    {
        if ($tipoVentaForma instanceof TipoVentaForma) {
            return $this
                ->addUsingAlias(VentaFormaPeer::ID_TIPO_VENTA_FORMA, $tipoVentaForma->getIdTipoVentaForma(), $comparison);
        } elseif ($tipoVentaForma instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VentaFormaPeer::ID_TIPO_VENTA_FORMA, $tipoVentaForma->toKeyValue('PrimaryKey', 'IdTipoVentaForma'), $comparison);
        } else {
            throw new PropelException('filterByTipoVentaForma() only accepts arguments of type TipoVentaForma or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TipoVentaForma relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function joinTipoVentaForma($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TipoVentaForma');

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
            $this->addJoinObject($join, 'TipoVentaForma');
        }

        return $this;
    }

    /**
     * Use the TipoVentaForma relation TipoVentaForma object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Costo\SystemBundle\Model\TipoVentaFormaQuery A secondary query class using the current class as primary query
     */
    public function useTipoVentaFormaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTipoVentaForma($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TipoVentaForma', '\Costo\SystemBundle\Model\TipoVentaFormaQuery');
    }

    /**
     * Filter the query by a related DetalleVenta object
     *
     * @param   DetalleVenta|PropelObjectCollection $detalleVenta  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VentaFormaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDetalleVenta($detalleVenta, $comparison = null)
    {
        if ($detalleVenta instanceof DetalleVenta) {
            return $this
                ->addUsingAlias(VentaFormaPeer::ID_VENTA_FORMA, $detalleVenta->getIdVentaForma(), $comparison);
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
     * @return VentaFormaQuery The current query, for fluid interface
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
     * @param   VentaForma $ventaForma Object to remove from the list of results
     *
     * @return VentaFormaQuery The current query, for fluid interface
     */
    public function prune($ventaForma = null)
    {
        if ($ventaForma) {
            $this->addUsingAlias(VentaFormaPeer::ID_VENTA_FORMA, $ventaForma->getIdVentaForma(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     VentaFormaQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(VentaFormaPeer::FECHA_MODIFICACION_VENTA_FORMA, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     VentaFormaQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(VentaFormaPeer::FECHA_MODIFICACION_VENTA_FORMA);
    }

    /**
     * Order by update date asc
     *
     * @return     VentaFormaQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(VentaFormaPeer::FECHA_MODIFICACION_VENTA_FORMA);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     VentaFormaQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(VentaFormaPeer::FECHA_CREACION_VENTA_FORMA, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     VentaFormaQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(VentaFormaPeer::FECHA_CREACION_VENTA_FORMA);
    }

    /**
     * Order by create date asc
     *
     * @return     VentaFormaQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(VentaFormaPeer::FECHA_CREACION_VENTA_FORMA);
    }
}
