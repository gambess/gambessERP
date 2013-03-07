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
use Costo\SystemBundle\Model\FormaPago;
use Costo\SystemBundle\Model\FormaPagoPeer;
use Costo\SystemBundle\Model\FormaPagoQuery;

/**
 * Base class that represents a query for the 'forma_pago' table.
 *
 *
 *
 * @method FormaPagoQuery orderByIdFormaPago($order = Criteria::ASC) Order by the id_forma_pago column
 * @method FormaPagoQuery orderByNombreFormaPago($order = Criteria::ASC) Order by the nombre_forma_pago column
 * @method FormaPagoQuery orderByDescripcionFormaPago($order = Criteria::ASC) Order by the descripcion_forma_pago column
 * @method FormaPagoQuery orderByFechaCreacionFormaPago($order = Criteria::ASC) Order by the fecha_creacion_forma_pago column
 * @method FormaPagoQuery orderByFechaModificacionFormaPago($order = Criteria::ASC) Order by the fecha_modificacion_forma_pago column
 *
 * @method FormaPagoQuery groupByIdFormaPago() Group by the id_forma_pago column
 * @method FormaPagoQuery groupByNombreFormaPago() Group by the nombre_forma_pago column
 * @method FormaPagoQuery groupByDescripcionFormaPago() Group by the descripcion_forma_pago column
 * @method FormaPagoQuery groupByFechaCreacionFormaPago() Group by the fecha_creacion_forma_pago column
 * @method FormaPagoQuery groupByFechaModificacionFormaPago() Group by the fecha_modificacion_forma_pago column
 *
 * @method FormaPagoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FormaPagoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FormaPagoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FormaPagoQuery leftJoinDetalleVenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the DetalleVenta relation
 * @method FormaPagoQuery rightJoinDetalleVenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DetalleVenta relation
 * @method FormaPagoQuery innerJoinDetalleVenta($relationAlias = null) Adds a INNER JOIN clause to the query using the DetalleVenta relation
 *
 * @method FormaPago findOne(PropelPDO $con = null) Return the first FormaPago matching the query
 * @method FormaPago findOneOrCreate(PropelPDO $con = null) Return the first FormaPago matching the query, or a new FormaPago object populated from the query conditions when no match is found
 *
 * @method FormaPago findOneByNombreFormaPago(string $nombre_forma_pago) Return the first FormaPago filtered by the nombre_forma_pago column
 * @method FormaPago findOneByDescripcionFormaPago(string $descripcion_forma_pago) Return the first FormaPago filtered by the descripcion_forma_pago column
 * @method FormaPago findOneByFechaCreacionFormaPago(string $fecha_creacion_forma_pago) Return the first FormaPago filtered by the fecha_creacion_forma_pago column
 * @method FormaPago findOneByFechaModificacionFormaPago(string $fecha_modificacion_forma_pago) Return the first FormaPago filtered by the fecha_modificacion_forma_pago column
 *
 * @method array findByIdFormaPago(int $id_forma_pago) Return FormaPago objects filtered by the id_forma_pago column
 * @method array findByNombreFormaPago(string $nombre_forma_pago) Return FormaPago objects filtered by the nombre_forma_pago column
 * @method array findByDescripcionFormaPago(string $descripcion_forma_pago) Return FormaPago objects filtered by the descripcion_forma_pago column
 * @method array findByFechaCreacionFormaPago(string $fecha_creacion_forma_pago) Return FormaPago objects filtered by the fecha_creacion_forma_pago column
 * @method array findByFechaModificacionFormaPago(string $fecha_modificacion_forma_pago) Return FormaPago objects filtered by the fecha_modificacion_forma_pago column
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseFormaPagoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFormaPagoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'testing', $modelName = 'Costo\\SystemBundle\\Model\\FormaPago', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FormaPagoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FormaPagoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FormaPagoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FormaPagoQuery) {
            return $criteria;
        }
        $query = new FormaPagoQuery();
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
     * @return   FormaPago|FormaPago[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FormaPagoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 FormaPago A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdFormaPago($key, $con = null)
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
     * @return                 FormaPago A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_forma_pago`, `nombre_forma_pago`, `descripcion_forma_pago`, `fecha_creacion_forma_pago`, `fecha_modificacion_forma_pago` FROM `forma_pago` WHERE `id_forma_pago` = :p0';
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
            $obj = new FormaPago();
            $obj->hydrate($row);
            FormaPagoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return FormaPago|FormaPago[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|FormaPago[]|mixed the list of results, formatted by the current formatter
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
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FormaPagoPeer::ID_FORMA_PAGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FormaPagoPeer::ID_FORMA_PAGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_forma_pago column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFormaPago(1234); // WHERE id_forma_pago = 1234
     * $query->filterByIdFormaPago(array(12, 34)); // WHERE id_forma_pago IN (12, 34)
     * $query->filterByIdFormaPago(array('min' => 12)); // WHERE id_forma_pago >= 12
     * $query->filterByIdFormaPago(array('max' => 12)); // WHERE id_forma_pago <= 12
     * </code>
     *
     * @param     mixed $idFormaPago The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function filterByIdFormaPago($idFormaPago = null, $comparison = null)
    {
        if (is_array($idFormaPago)) {
            $useMinMax = false;
            if (isset($idFormaPago['min'])) {
                $this->addUsingAlias(FormaPagoPeer::ID_FORMA_PAGO, $idFormaPago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFormaPago['max'])) {
                $this->addUsingAlias(FormaPagoPeer::ID_FORMA_PAGO, $idFormaPago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormaPagoPeer::ID_FORMA_PAGO, $idFormaPago, $comparison);
    }

    /**
     * Filter the query on the nombre_forma_pago column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreFormaPago('fooValue');   // WHERE nombre_forma_pago = 'fooValue'
     * $query->filterByNombreFormaPago('%fooValue%'); // WHERE nombre_forma_pago LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreFormaPago The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function filterByNombreFormaPago($nombreFormaPago = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreFormaPago)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombreFormaPago)) {
                $nombreFormaPago = str_replace('*', '%', $nombreFormaPago);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FormaPagoPeer::NOMBRE_FORMA_PAGO, $nombreFormaPago, $comparison);
    }

    /**
     * Filter the query on the descripcion_forma_pago column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionFormaPago('fooValue');   // WHERE descripcion_forma_pago = 'fooValue'
     * $query->filterByDescripcionFormaPago('%fooValue%'); // WHERE descripcion_forma_pago LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionFormaPago The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function filterByDescripcionFormaPago($descripcionFormaPago = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionFormaPago)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionFormaPago)) {
                $descripcionFormaPago = str_replace('*', '%', $descripcionFormaPago);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FormaPagoPeer::DESCRIPCION_FORMA_PAGO, $descripcionFormaPago, $comparison);
    }

    /**
     * Filter the query on the fecha_creacion_forma_pago column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCreacionFormaPago('2011-03-14'); // WHERE fecha_creacion_forma_pago = '2011-03-14'
     * $query->filterByFechaCreacionFormaPago('now'); // WHERE fecha_creacion_forma_pago = '2011-03-14'
     * $query->filterByFechaCreacionFormaPago(array('max' => 'yesterday')); // WHERE fecha_creacion_forma_pago > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCreacionFormaPago The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function filterByFechaCreacionFormaPago($fechaCreacionFormaPago = null, $comparison = null)
    {
        if (is_array($fechaCreacionFormaPago)) {
            $useMinMax = false;
            if (isset($fechaCreacionFormaPago['min'])) {
                $this->addUsingAlias(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO, $fechaCreacionFormaPago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCreacionFormaPago['max'])) {
                $this->addUsingAlias(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO, $fechaCreacionFormaPago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO, $fechaCreacionFormaPago, $comparison);
    }

    /**
     * Filter the query on the fecha_modificacion_forma_pago column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaModificacionFormaPago('2011-03-14'); // WHERE fecha_modificacion_forma_pago = '2011-03-14'
     * $query->filterByFechaModificacionFormaPago('now'); // WHERE fecha_modificacion_forma_pago = '2011-03-14'
     * $query->filterByFechaModificacionFormaPago(array('max' => 'yesterday')); // WHERE fecha_modificacion_forma_pago > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaModificacionFormaPago The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function filterByFechaModificacionFormaPago($fechaModificacionFormaPago = null, $comparison = null)
    {
        if (is_array($fechaModificacionFormaPago)) {
            $useMinMax = false;
            if (isset($fechaModificacionFormaPago['min'])) {
                $this->addUsingAlias(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO, $fechaModificacionFormaPago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaModificacionFormaPago['max'])) {
                $this->addUsingAlias(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO, $fechaModificacionFormaPago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO, $fechaModificacionFormaPago, $comparison);
    }

    /**
     * Filter the query by a related DetalleVenta object
     *
     * @param   DetalleVenta|PropelObjectCollection $detalleVenta  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FormaPagoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDetalleVenta($detalleVenta, $comparison = null)
    {
        if ($detalleVenta instanceof DetalleVenta) {
            return $this
                ->addUsingAlias(FormaPagoPeer::ID_FORMA_PAGO, $detalleVenta->getIdFormaPago(), $comparison);
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
     * @return FormaPagoQuery The current query, for fluid interface
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
     * @param   FormaPago $formaPago Object to remove from the list of results
     *
     * @return FormaPagoQuery The current query, for fluid interface
     */
    public function prune($formaPago = null)
    {
        if ($formaPago) {
            $this->addUsingAlias(FormaPagoPeer::ID_FORMA_PAGO, $formaPago->getIdFormaPago(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     FormaPagoQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     FormaPagoQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO);
    }

    /**
     * Order by update date asc
     *
     * @return     FormaPagoQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     FormaPagoQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     FormaPagoQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO);
    }

    /**
     * Order by create date asc
     *
     * @return     FormaPagoQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO);
    }
}
