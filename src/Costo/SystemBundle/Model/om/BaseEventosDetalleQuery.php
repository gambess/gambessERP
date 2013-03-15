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
use Costo\SystemBundle\Model\EventosDetalle;
use Costo\SystemBundle\Model\EventosDetallePeer;
use Costo\SystemBundle\Model\EventosDetalleQuery;

/**
 * Base class that represents a query for the 'eventos_detalle' table.
 *
 *
 *
 * @method EventosDetalleQuery orderByIdEvento($order = Criteria::ASC) Order by the id_evento column
 * @method EventosDetalleQuery orderByIdDetalle($order = Criteria::ASC) Order by the id_detalle column
 * @method EventosDetalleQuery orderByEtiquetaEvento($order = Criteria::ASC) Order by the etiqueta_evento column
 * @method EventosDetalleQuery orderByFechaEvento($order = Criteria::ASC) Order by the fecha_evento column
 * @method EventosDetalleQuery orderByColorEvento($order = Criteria::ASC) Order by the color_evento column
 * @method EventosDetalleQuery orderByEmailNotificacion($order = Criteria::ASC) Order by the email_notificacion column
 * @method EventosDetalleQuery orderByFechaCreacionEvento($order = Criteria::ASC) Order by the fecha_creacion_evento column
 * @method EventosDetalleQuery orderByFechaModificacionEvento($order = Criteria::ASC) Order by the fecha_modificacion_evento column
 *
 * @method EventosDetalleQuery groupByIdEvento() Group by the id_evento column
 * @method EventosDetalleQuery groupByIdDetalle() Group by the id_detalle column
 * @method EventosDetalleQuery groupByEtiquetaEvento() Group by the etiqueta_evento column
 * @method EventosDetalleQuery groupByFechaEvento() Group by the fecha_evento column
 * @method EventosDetalleQuery groupByColorEvento() Group by the color_evento column
 * @method EventosDetalleQuery groupByEmailNotificacion() Group by the email_notificacion column
 * @method EventosDetalleQuery groupByFechaCreacionEvento() Group by the fecha_creacion_evento column
 * @method EventosDetalleQuery groupByFechaModificacionEvento() Group by the fecha_modificacion_evento column
 *
 * @method EventosDetalleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventosDetalleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventosDetalleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventosDetalleQuery leftJoinDetalleVenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the DetalleVenta relation
 * @method EventosDetalleQuery rightJoinDetalleVenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DetalleVenta relation
 * @method EventosDetalleQuery innerJoinDetalleVenta($relationAlias = null) Adds a INNER JOIN clause to the query using the DetalleVenta relation
 *
 * @method EventosDetalle findOne(PropelPDO $con = null) Return the first EventosDetalle matching the query
 * @method EventosDetalle findOneOrCreate(PropelPDO $con = null) Return the first EventosDetalle matching the query, or a new EventosDetalle object populated from the query conditions when no match is found
 *
 * @method EventosDetalle findOneByIdDetalle(int $id_detalle) Return the first EventosDetalle filtered by the id_detalle column
 * @method EventosDetalle findOneByEtiquetaEvento(string $etiqueta_evento) Return the first EventosDetalle filtered by the etiqueta_evento column
 * @method EventosDetalle findOneByFechaEvento(string $fecha_evento) Return the first EventosDetalle filtered by the fecha_evento column
 * @method EventosDetalle findOneByColorEvento(string $color_evento) Return the first EventosDetalle filtered by the color_evento column
 * @method EventosDetalle findOneByEmailNotificacion(string $email_notificacion) Return the first EventosDetalle filtered by the email_notificacion column
 * @method EventosDetalle findOneByFechaCreacionEvento(string $fecha_creacion_evento) Return the first EventosDetalle filtered by the fecha_creacion_evento column
 * @method EventosDetalle findOneByFechaModificacionEvento(string $fecha_modificacion_evento) Return the first EventosDetalle filtered by the fecha_modificacion_evento column
 *
 * @method array findByIdEvento(int $id_evento) Return EventosDetalle objects filtered by the id_evento column
 * @method array findByIdDetalle(int $id_detalle) Return EventosDetalle objects filtered by the id_detalle column
 * @method array findByEtiquetaEvento(string $etiqueta_evento) Return EventosDetalle objects filtered by the etiqueta_evento column
 * @method array findByFechaEvento(string $fecha_evento) Return EventosDetalle objects filtered by the fecha_evento column
 * @method array findByColorEvento(string $color_evento) Return EventosDetalle objects filtered by the color_evento column
 * @method array findByEmailNotificacion(string $email_notificacion) Return EventosDetalle objects filtered by the email_notificacion column
 * @method array findByFechaCreacionEvento(string $fecha_creacion_evento) Return EventosDetalle objects filtered by the fecha_creacion_evento column
 * @method array findByFechaModificacionEvento(string $fecha_modificacion_evento) Return EventosDetalle objects filtered by the fecha_modificacion_evento column
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseEventosDetalleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventosDetalleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'testing', $modelName = 'Costo\\SystemBundle\\Model\\EventosDetalle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventosDetalleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventosDetalleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventosDetalleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventosDetalleQuery) {
            return $criteria;
        }
        $query = new EventosDetalleQuery();
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
     * @return   EventosDetalle|EventosDetalle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventosDetallePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventosDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventosDetalle A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdEvento($key, $con = null)
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
     * @return                 EventosDetalle A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_evento`, `id_detalle`, `etiqueta_evento`, `fecha_evento`, `color_evento`, `email_notificacion`, `fecha_creacion_evento`, `fecha_modificacion_evento` FROM `eventos_detalle` WHERE `id_evento` = :p0';
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
            $obj = new EventosDetalle();
            $obj->hydrate($row);
            EventosDetallePeer::addInstanceToPool($obj, (string) $key);
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
     * @return EventosDetalle|EventosDetalle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventosDetalle[]|mixed the list of results, formatted by the current formatter
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
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventosDetallePeer::ID_EVENTO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventosDetallePeer::ID_EVENTO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_evento column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEvento(1234); // WHERE id_evento = 1234
     * $query->filterByIdEvento(array(12, 34)); // WHERE id_evento IN (12, 34)
     * $query->filterByIdEvento(array('min' => 12)); // WHERE id_evento >= 12
     * $query->filterByIdEvento(array('max' => 12)); // WHERE id_evento <= 12
     * </code>
     *
     * @param     mixed $idEvento The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByIdEvento($idEvento = null, $comparison = null)
    {
        if (is_array($idEvento)) {
            $useMinMax = false;
            if (isset($idEvento['min'])) {
                $this->addUsingAlias(EventosDetallePeer::ID_EVENTO, $idEvento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEvento['max'])) {
                $this->addUsingAlias(EventosDetallePeer::ID_EVENTO, $idEvento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::ID_EVENTO, $idEvento, $comparison);
    }

    /**
     * Filter the query on the id_detalle column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDetalle(1234); // WHERE id_detalle = 1234
     * $query->filterByIdDetalle(array(12, 34)); // WHERE id_detalle IN (12, 34)
     * $query->filterByIdDetalle(array('min' => 12)); // WHERE id_detalle >= 12
     * $query->filterByIdDetalle(array('max' => 12)); // WHERE id_detalle <= 12
     * </code>
     *
     * @see       filterByDetalleVenta()
     *
     * @param     mixed $idDetalle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByIdDetalle($idDetalle = null, $comparison = null)
    {
        if (is_array($idDetalle)) {
            $useMinMax = false;
            if (isset($idDetalle['min'])) {
                $this->addUsingAlias(EventosDetallePeer::ID_DETALLE, $idDetalle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDetalle['max'])) {
                $this->addUsingAlias(EventosDetallePeer::ID_DETALLE, $idDetalle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::ID_DETALLE, $idDetalle, $comparison);
    }

    /**
     * Filter the query on the etiqueta_evento column
     *
     * Example usage:
     * <code>
     * $query->filterByEtiquetaEvento('fooValue');   // WHERE etiqueta_evento = 'fooValue'
     * $query->filterByEtiquetaEvento('%fooValue%'); // WHERE etiqueta_evento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $etiquetaEvento The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByEtiquetaEvento($etiquetaEvento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($etiquetaEvento)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $etiquetaEvento)) {
                $etiquetaEvento = str_replace('*', '%', $etiquetaEvento);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::ETIQUETA_EVENTO, $etiquetaEvento, $comparison);
    }

    /**
     * Filter the query on the fecha_evento column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaEvento('2011-03-14'); // WHERE fecha_evento = '2011-03-14'
     * $query->filterByFechaEvento('now'); // WHERE fecha_evento = '2011-03-14'
     * $query->filterByFechaEvento(array('max' => 'yesterday')); // WHERE fecha_evento > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaEvento The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByFechaEvento($fechaEvento = null, $comparison = null)
    {
        if (is_array($fechaEvento)) {
            $useMinMax = false;
            if (isset($fechaEvento['min'])) {
                $this->addUsingAlias(EventosDetallePeer::FECHA_EVENTO, $fechaEvento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaEvento['max'])) {
                $this->addUsingAlias(EventosDetallePeer::FECHA_EVENTO, $fechaEvento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::FECHA_EVENTO, $fechaEvento, $comparison);
    }

    /**
     * Filter the query on the color_evento column
     *
     * Example usage:
     * <code>
     * $query->filterByColorEvento('fooValue');   // WHERE color_evento = 'fooValue'
     * $query->filterByColorEvento('%fooValue%'); // WHERE color_evento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $colorEvento The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByColorEvento($colorEvento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($colorEvento)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $colorEvento)) {
                $colorEvento = str_replace('*', '%', $colorEvento);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::COLOR_EVENTO, $colorEvento, $comparison);
    }

    /**
     * Filter the query on the email_notificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailNotificacion('fooValue');   // WHERE email_notificacion = 'fooValue'
     * $query->filterByEmailNotificacion('%fooValue%'); // WHERE email_notificacion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailNotificacion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByEmailNotificacion($emailNotificacion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailNotificacion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $emailNotificacion)) {
                $emailNotificacion = str_replace('*', '%', $emailNotificacion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::EMAIL_NOTIFICACION, $emailNotificacion, $comparison);
    }

    /**
     * Filter the query on the fecha_creacion_evento column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCreacionEvento('2011-03-14'); // WHERE fecha_creacion_evento = '2011-03-14'
     * $query->filterByFechaCreacionEvento('now'); // WHERE fecha_creacion_evento = '2011-03-14'
     * $query->filterByFechaCreacionEvento(array('max' => 'yesterday')); // WHERE fecha_creacion_evento > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCreacionEvento The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByFechaCreacionEvento($fechaCreacionEvento = null, $comparison = null)
    {
        if (is_array($fechaCreacionEvento)) {
            $useMinMax = false;
            if (isset($fechaCreacionEvento['min'])) {
                $this->addUsingAlias(EventosDetallePeer::FECHA_CREACION_EVENTO, $fechaCreacionEvento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCreacionEvento['max'])) {
                $this->addUsingAlias(EventosDetallePeer::FECHA_CREACION_EVENTO, $fechaCreacionEvento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::FECHA_CREACION_EVENTO, $fechaCreacionEvento, $comparison);
    }

    /**
     * Filter the query on the fecha_modificacion_evento column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaModificacionEvento('2011-03-14'); // WHERE fecha_modificacion_evento = '2011-03-14'
     * $query->filterByFechaModificacionEvento('now'); // WHERE fecha_modificacion_evento = '2011-03-14'
     * $query->filterByFechaModificacionEvento(array('max' => 'yesterday')); // WHERE fecha_modificacion_evento > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaModificacionEvento The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function filterByFechaModificacionEvento($fechaModificacionEvento = null, $comparison = null)
    {
        if (is_array($fechaModificacionEvento)) {
            $useMinMax = false;
            if (isset($fechaModificacionEvento['min'])) {
                $this->addUsingAlias(EventosDetallePeer::FECHA_MODIFICACION_EVENTO, $fechaModificacionEvento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaModificacionEvento['max'])) {
                $this->addUsingAlias(EventosDetallePeer::FECHA_MODIFICACION_EVENTO, $fechaModificacionEvento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventosDetallePeer::FECHA_MODIFICACION_EVENTO, $fechaModificacionEvento, $comparison);
    }

    /**
     * Filter the query by a related DetalleVenta object
     *
     * @param   DetalleVenta|PropelObjectCollection $detalleVenta The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventosDetalleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDetalleVenta($detalleVenta, $comparison = null)
    {
        if ($detalleVenta instanceof DetalleVenta) {
            return $this
                ->addUsingAlias(EventosDetallePeer::ID_DETALLE, $detalleVenta->getIdDetalle(), $comparison);
        } elseif ($detalleVenta instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventosDetallePeer::ID_DETALLE, $detalleVenta->toKeyValue('PrimaryKey', 'IdDetalle'), $comparison);
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
     * @return EventosDetalleQuery The current query, for fluid interface
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
     * @param   EventosDetalle $eventosDetalle Object to remove from the list of results
     *
     * @return EventosDetalleQuery The current query, for fluid interface
     */
    public function prune($eventosDetalle = null)
    {
        if ($eventosDetalle) {
            $this->addUsingAlias(EventosDetallePeer::ID_EVENTO, $eventosDetalle->getIdEvento(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     EventosDetalleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(EventosDetallePeer::FECHA_MODIFICACION_EVENTO, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     EventosDetalleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(EventosDetallePeer::FECHA_MODIFICACION_EVENTO);
    }

    /**
     * Order by update date asc
     *
     * @return     EventosDetalleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(EventosDetallePeer::FECHA_MODIFICACION_EVENTO);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     EventosDetalleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(EventosDetallePeer::FECHA_CREACION_EVENTO, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     EventosDetalleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(EventosDetallePeer::FECHA_CREACION_EVENTO);
    }

    /**
     * Order by create date asc
     *
     * @return     EventosDetalleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(EventosDetallePeer::FECHA_CREACION_EVENTO);
    }
}
