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
use Costo\SystemBundle\Model\DetalleVentaPeer;
use Costo\SystemBundle\Model\DetalleVentaQuery;
use Costo\SystemBundle\Model\EventosDetalle;
use Costo\SystemBundle\Model\FormaPago;
use Costo\SystemBundle\Model\LugarVenta;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaForma;

/**
 * Base class that represents a query for the 'detalle_venta' table.
 *
 *
 *
 * @method DetalleVentaQuery orderByIdDetalle($order = Criteria::ASC) Order by the id_detalle column
 * @method DetalleVentaQuery orderByIdVenta($order = Criteria::ASC) Order by the id_venta column
 * @method DetalleVentaQuery orderByIdVentaForma($order = Criteria::ASC) Order by the id_venta_forma column
 * @method DetalleVentaQuery orderByIdLugarVenta($order = Criteria::ASC) Order by the id_lugar_venta column
 * @method DetalleVentaQuery orderByIdFormaPago($order = Criteria::ASC) Order by the id_forma_pago column
 * @method DetalleVentaQuery orderByFechaVenta($order = Criteria::ASC) Order by the fecha_venta column
 * @method DetalleVentaQuery orderByTotalNetoVenta($order = Criteria::ASC) Order by the total_neto_venta column
 * @method DetalleVentaQuery orderByTotalIvaVenta($order = Criteria::ASC) Order by the total_iva_venta column
 * @method DetalleVentaQuery orderByTotalVenta($order = Criteria::ASC) Order by the total_venta column
 * @method DetalleVentaQuery orderByDescripcionVenta($order = Criteria::ASC) Order by the descripcion_venta column
 * @method DetalleVentaQuery orderByFechaCreacionDetalle($order = Criteria::ASC) Order by the fecha_creacion_detalle column
 * @method DetalleVentaQuery orderByFechaModificacionDetalle($order = Criteria::ASC) Order by the fecha_modificacion_detalle column
 *
 * @method DetalleVentaQuery groupByIdDetalle() Group by the id_detalle column
 * @method DetalleVentaQuery groupByIdVenta() Group by the id_venta column
 * @method DetalleVentaQuery groupByIdVentaForma() Group by the id_venta_forma column
 * @method DetalleVentaQuery groupByIdLugarVenta() Group by the id_lugar_venta column
 * @method DetalleVentaQuery groupByIdFormaPago() Group by the id_forma_pago column
 * @method DetalleVentaQuery groupByFechaVenta() Group by the fecha_venta column
 * @method DetalleVentaQuery groupByTotalNetoVenta() Group by the total_neto_venta column
 * @method DetalleVentaQuery groupByTotalIvaVenta() Group by the total_iva_venta column
 * @method DetalleVentaQuery groupByTotalVenta() Group by the total_venta column
 * @method DetalleVentaQuery groupByDescripcionVenta() Group by the descripcion_venta column
 * @method DetalleVentaQuery groupByFechaCreacionDetalle() Group by the fecha_creacion_detalle column
 * @method DetalleVentaQuery groupByFechaModificacionDetalle() Group by the fecha_modificacion_detalle column
 *
 * @method DetalleVentaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DetalleVentaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DetalleVentaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DetalleVentaQuery leftJoinVenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Venta relation
 * @method DetalleVentaQuery rightJoinVenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Venta relation
 * @method DetalleVentaQuery innerJoinVenta($relationAlias = null) Adds a INNER JOIN clause to the query using the Venta relation
 *
 * @method DetalleVentaQuery leftJoinVentaForma($relationAlias = null) Adds a LEFT JOIN clause to the query using the VentaForma relation
 * @method DetalleVentaQuery rightJoinVentaForma($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VentaForma relation
 * @method DetalleVentaQuery innerJoinVentaForma($relationAlias = null) Adds a INNER JOIN clause to the query using the VentaForma relation
 *
 * @method DetalleVentaQuery leftJoinLugarVenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the LugarVenta relation
 * @method DetalleVentaQuery rightJoinLugarVenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LugarVenta relation
 * @method DetalleVentaQuery innerJoinLugarVenta($relationAlias = null) Adds a INNER JOIN clause to the query using the LugarVenta relation
 *
 * @method DetalleVentaQuery leftJoinFormaPago($relationAlias = null) Adds a LEFT JOIN clause to the query using the FormaPago relation
 * @method DetalleVentaQuery rightJoinFormaPago($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FormaPago relation
 * @method DetalleVentaQuery innerJoinFormaPago($relationAlias = null) Adds a INNER JOIN clause to the query using the FormaPago relation
 *
 * @method DetalleVentaQuery leftJoinEventosDetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventosDetalle relation
 * @method DetalleVentaQuery rightJoinEventosDetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventosDetalle relation
 * @method DetalleVentaQuery innerJoinEventosDetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the EventosDetalle relation
 *
 * @method DetalleVenta findOne(PropelPDO $con = null) Return the first DetalleVenta matching the query
 * @method DetalleVenta findOneOrCreate(PropelPDO $con = null) Return the first DetalleVenta matching the query, or a new DetalleVenta object populated from the query conditions when no match is found
 *
 * @method DetalleVenta findOneByIdVenta(int $id_venta) Return the first DetalleVenta filtered by the id_venta column
 * @method DetalleVenta findOneByIdVentaForma(int $id_venta_forma) Return the first DetalleVenta filtered by the id_venta_forma column
 * @method DetalleVenta findOneByIdLugarVenta(int $id_lugar_venta) Return the first DetalleVenta filtered by the id_lugar_venta column
 * @method DetalleVenta findOneByIdFormaPago(int $id_forma_pago) Return the first DetalleVenta filtered by the id_forma_pago column
 * @method DetalleVenta findOneByFechaVenta(string $fecha_venta) Return the first DetalleVenta filtered by the fecha_venta column
 * @method DetalleVenta findOneByTotalNetoVenta(double $total_neto_venta) Return the first DetalleVenta filtered by the total_neto_venta column
 * @method DetalleVenta findOneByTotalIvaVenta(double $total_iva_venta) Return the first DetalleVenta filtered by the total_iva_venta column
 * @method DetalleVenta findOneByTotalVenta(double $total_venta) Return the first DetalleVenta filtered by the total_venta column
 * @method DetalleVenta findOneByDescripcionVenta(string $descripcion_venta) Return the first DetalleVenta filtered by the descripcion_venta column
 * @method DetalleVenta findOneByFechaCreacionDetalle(string $fecha_creacion_detalle) Return the first DetalleVenta filtered by the fecha_creacion_detalle column
 * @method DetalleVenta findOneByFechaModificacionDetalle(string $fecha_modificacion_detalle) Return the first DetalleVenta filtered by the fecha_modificacion_detalle column
 *
 * @method array findByIdDetalle(int $id_detalle) Return DetalleVenta objects filtered by the id_detalle column
 * @method array findByIdVenta(int $id_venta) Return DetalleVenta objects filtered by the id_venta column
 * @method array findByIdVentaForma(int $id_venta_forma) Return DetalleVenta objects filtered by the id_venta_forma column
 * @method array findByIdLugarVenta(int $id_lugar_venta) Return DetalleVenta objects filtered by the id_lugar_venta column
 * @method array findByIdFormaPago(int $id_forma_pago) Return DetalleVenta objects filtered by the id_forma_pago column
 * @method array findByFechaVenta(string $fecha_venta) Return DetalleVenta objects filtered by the fecha_venta column
 * @method array findByTotalNetoVenta(double $total_neto_venta) Return DetalleVenta objects filtered by the total_neto_venta column
 * @method array findByTotalIvaVenta(double $total_iva_venta) Return DetalleVenta objects filtered by the total_iva_venta column
 * @method array findByTotalVenta(double $total_venta) Return DetalleVenta objects filtered by the total_venta column
 * @method array findByDescripcionVenta(string $descripcion_venta) Return DetalleVenta objects filtered by the descripcion_venta column
 * @method array findByFechaCreacionDetalle(string $fecha_creacion_detalle) Return DetalleVenta objects filtered by the fecha_creacion_detalle column
 * @method array findByFechaModificacionDetalle(string $fecha_modificacion_detalle) Return DetalleVenta objects filtered by the fecha_modificacion_detalle column
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseDetalleVentaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDetalleVentaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'testing', $modelName = 'Costo\\SystemBundle\\Model\\DetalleVenta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DetalleVentaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DetalleVentaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DetalleVentaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DetalleVentaQuery) {
            return $criteria;
        }
        $query = new DetalleVentaQuery();
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
     * @return   DetalleVenta|DetalleVenta[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DetalleVentaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 DetalleVenta A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDetalle($key, $con = null)
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
     * @return                 DetalleVenta A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_detalle`, `id_venta`, `id_venta_forma`, `id_lugar_venta`, `id_forma_pago`, `fecha_venta`, `total_neto_venta`, `total_iva_venta`, `total_venta`, `descripcion_venta`, `fecha_creacion_detalle`, `fecha_modificacion_detalle` FROM `detalle_venta` WHERE `id_detalle` = :p0';
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
            $obj = new DetalleVenta();
            $obj->hydrate($row);
            DetalleVentaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return DetalleVenta|DetalleVenta[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DetalleVenta[]|mixed the list of results, formatted by the current formatter
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
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DetalleVentaPeer::ID_DETALLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DetalleVentaPeer::ID_DETALLE, $keys, Criteria::IN);
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
     * @param     mixed $idDetalle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByIdDetalle($idDetalle = null, $comparison = null)
    {
        if (is_array($idDetalle)) {
            $useMinMax = false;
            if (isset($idDetalle['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_DETALLE, $idDetalle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDetalle['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_DETALLE, $idDetalle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::ID_DETALLE, $idDetalle, $comparison);
    }

    /**
     * Filter the query on the id_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByIdVenta(1234); // WHERE id_venta = 1234
     * $query->filterByIdVenta(array(12, 34)); // WHERE id_venta IN (12, 34)
     * $query->filterByIdVenta(array('min' => 12)); // WHERE id_venta >= 12
     * $query->filterByIdVenta(array('max' => 12)); // WHERE id_venta <= 12
     * </code>
     *
     * @see       filterByVenta()
     *
     * @param     mixed $idVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByIdVenta($idVenta = null, $comparison = null)
    {
        if (is_array($idVenta)) {
            $useMinMax = false;
            if (isset($idVenta['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_VENTA, $idVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVenta['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_VENTA, $idVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::ID_VENTA, $idVenta, $comparison);
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
     * @see       filterByVentaForma()
     *
     * @param     mixed $idVentaForma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByIdVentaForma($idVentaForma = null, $comparison = null)
    {
        if (is_array($idVentaForma)) {
            $useMinMax = false;
            if (isset($idVentaForma['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_VENTA_FORMA, $idVentaForma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVentaForma['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_VENTA_FORMA, $idVentaForma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::ID_VENTA_FORMA, $idVentaForma, $comparison);
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
     * @see       filterByLugarVenta()
     *
     * @param     mixed $idLugarVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByIdLugarVenta($idLugarVenta = null, $comparison = null)
    {
        if (is_array($idLugarVenta)) {
            $useMinMax = false;
            if (isset($idLugarVenta['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_LUGAR_VENTA, $idLugarVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLugarVenta['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_LUGAR_VENTA, $idLugarVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::ID_LUGAR_VENTA, $idLugarVenta, $comparison);
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
     * @see       filterByFormaPago()
     *
     * @param     mixed $idFormaPago The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByIdFormaPago($idFormaPago = null, $comparison = null)
    {
        if (is_array($idFormaPago)) {
            $useMinMax = false;
            if (isset($idFormaPago['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_FORMA_PAGO, $idFormaPago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFormaPago['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::ID_FORMA_PAGO, $idFormaPago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::ID_FORMA_PAGO, $idFormaPago, $comparison);
    }

    /**
     * Filter the query on the fecha_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaVenta('2011-03-14'); // WHERE fecha_venta = '2011-03-14'
     * $query->filterByFechaVenta('now'); // WHERE fecha_venta = '2011-03-14'
     * $query->filterByFechaVenta(array('max' => 'yesterday')); // WHERE fecha_venta > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaVenta The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByFechaVenta($fechaVenta = null, $comparison = null)
    {
        if (is_array($fechaVenta)) {
            $useMinMax = false;
            if (isset($fechaVenta['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::FECHA_VENTA, $fechaVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaVenta['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::FECHA_VENTA, $fechaVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::FECHA_VENTA, $fechaVenta, $comparison);
    }

    /**
     * Filter the query on the total_neto_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalNetoVenta(1234); // WHERE total_neto_venta = 1234
     * $query->filterByTotalNetoVenta(array(12, 34)); // WHERE total_neto_venta IN (12, 34)
     * $query->filterByTotalNetoVenta(array('min' => 12)); // WHERE total_neto_venta >= 12
     * $query->filterByTotalNetoVenta(array('max' => 12)); // WHERE total_neto_venta <= 12
     * </code>
     *
     * @param     mixed $totalNetoVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByTotalNetoVenta($totalNetoVenta = null, $comparison = null)
    {
        if (is_array($totalNetoVenta)) {
            $useMinMax = false;
            if (isset($totalNetoVenta['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::TOTAL_NETO_VENTA, $totalNetoVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNetoVenta['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::TOTAL_NETO_VENTA, $totalNetoVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::TOTAL_NETO_VENTA, $totalNetoVenta, $comparison);
    }

    /**
     * Filter the query on the total_iva_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalIvaVenta(1234); // WHERE total_iva_venta = 1234
     * $query->filterByTotalIvaVenta(array(12, 34)); // WHERE total_iva_venta IN (12, 34)
     * $query->filterByTotalIvaVenta(array('min' => 12)); // WHERE total_iva_venta >= 12
     * $query->filterByTotalIvaVenta(array('max' => 12)); // WHERE total_iva_venta <= 12
     * </code>
     *
     * @param     mixed $totalIvaVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByTotalIvaVenta($totalIvaVenta = null, $comparison = null)
    {
        if (is_array($totalIvaVenta)) {
            $useMinMax = false;
            if (isset($totalIvaVenta['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::TOTAL_IVA_VENTA, $totalIvaVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalIvaVenta['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::TOTAL_IVA_VENTA, $totalIvaVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::TOTAL_IVA_VENTA, $totalIvaVenta, $comparison);
    }

    /**
     * Filter the query on the total_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalVenta(1234); // WHERE total_venta = 1234
     * $query->filterByTotalVenta(array(12, 34)); // WHERE total_venta IN (12, 34)
     * $query->filterByTotalVenta(array('min' => 12)); // WHERE total_venta >= 12
     * $query->filterByTotalVenta(array('max' => 12)); // WHERE total_venta <= 12
     * </code>
     *
     * @param     mixed $totalVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByTotalVenta($totalVenta = null, $comparison = null)
    {
        if (is_array($totalVenta)) {
            $useMinMax = false;
            if (isset($totalVenta['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::TOTAL_VENTA, $totalVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalVenta['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::TOTAL_VENTA, $totalVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::TOTAL_VENTA, $totalVenta, $comparison);
    }

    /**
     * Filter the query on the descripcion_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionVenta('fooValue');   // WHERE descripcion_venta = 'fooValue'
     * $query->filterByDescripcionVenta('%fooValue%'); // WHERE descripcion_venta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionVenta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByDescripcionVenta($descripcionVenta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionVenta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionVenta)) {
                $descripcionVenta = str_replace('*', '%', $descripcionVenta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::DESCRIPCION_VENTA, $descripcionVenta, $comparison);
    }

    /**
     * Filter the query on the fecha_creacion_detalle column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCreacionDetalle('2011-03-14'); // WHERE fecha_creacion_detalle = '2011-03-14'
     * $query->filterByFechaCreacionDetalle('now'); // WHERE fecha_creacion_detalle = '2011-03-14'
     * $query->filterByFechaCreacionDetalle(array('max' => 'yesterday')); // WHERE fecha_creacion_detalle > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCreacionDetalle The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByFechaCreacionDetalle($fechaCreacionDetalle = null, $comparison = null)
    {
        if (is_array($fechaCreacionDetalle)) {
            $useMinMax = false;
            if (isset($fechaCreacionDetalle['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::FECHA_CREACION_DETALLE, $fechaCreacionDetalle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCreacionDetalle['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::FECHA_CREACION_DETALLE, $fechaCreacionDetalle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::FECHA_CREACION_DETALLE, $fechaCreacionDetalle, $comparison);
    }

    /**
     * Filter the query on the fecha_modificacion_detalle column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaModificacionDetalle('2011-03-14'); // WHERE fecha_modificacion_detalle = '2011-03-14'
     * $query->filterByFechaModificacionDetalle('now'); // WHERE fecha_modificacion_detalle = '2011-03-14'
     * $query->filterByFechaModificacionDetalle(array('max' => 'yesterday')); // WHERE fecha_modificacion_detalle > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaModificacionDetalle The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function filterByFechaModificacionDetalle($fechaModificacionDetalle = null, $comparison = null)
    {
        if (is_array($fechaModificacionDetalle)) {
            $useMinMax = false;
            if (isset($fechaModificacionDetalle['min'])) {
                $this->addUsingAlias(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE, $fechaModificacionDetalle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaModificacionDetalle['max'])) {
                $this->addUsingAlias(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE, $fechaModificacionDetalle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE, $fechaModificacionDetalle, $comparison);
    }

    /**
     * Filter the query by a related Venta object
     *
     * @param   Venta|PropelObjectCollection $venta The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DetalleVentaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVenta($venta, $comparison = null)
    {
        if ($venta instanceof Venta) {
            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_VENTA, $venta->getId(), $comparison);
        } elseif ($venta instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_VENTA, $venta->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByVenta() only accepts arguments of type Venta or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Venta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function joinVenta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Venta');

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
            $this->addJoinObject($join, 'Venta');
        }

        return $this;
    }

    /**
     * Use the Venta relation Venta object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Costo\SystemBundle\Model\VentaQuery A secondary query class using the current class as primary query
     */
    public function useVentaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVenta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Venta', '\Costo\SystemBundle\Model\VentaQuery');
    }

    /**
     * Filter the query by a related VentaForma object
     *
     * @param   VentaForma|PropelObjectCollection $ventaForma The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DetalleVentaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVentaForma($ventaForma, $comparison = null)
    {
        if ($ventaForma instanceof VentaForma) {
            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_VENTA_FORMA, $ventaForma->getIdVentaForma(), $comparison);
        } elseif ($ventaForma instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_VENTA_FORMA, $ventaForma->toKeyValue('PrimaryKey', 'IdVentaForma'), $comparison);
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
     * @return DetalleVentaQuery The current query, for fluid interface
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
     * Filter the query by a related LugarVenta object
     *
     * @param   LugarVenta|PropelObjectCollection $lugarVenta The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DetalleVentaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLugarVenta($lugarVenta, $comparison = null)
    {
        if ($lugarVenta instanceof LugarVenta) {
            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_LUGAR_VENTA, $lugarVenta->getIdLugarVenta(), $comparison);
        } elseif ($lugarVenta instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_LUGAR_VENTA, $lugarVenta->toKeyValue('PrimaryKey', 'IdLugarVenta'), $comparison);
        } else {
            throw new PropelException('filterByLugarVenta() only accepts arguments of type LugarVenta or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LugarVenta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function joinLugarVenta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LugarVenta');

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
            $this->addJoinObject($join, 'LugarVenta');
        }

        return $this;
    }

    /**
     * Use the LugarVenta relation LugarVenta object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Costo\SystemBundle\Model\LugarVentaQuery A secondary query class using the current class as primary query
     */
    public function useLugarVentaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLugarVenta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LugarVenta', '\Costo\SystemBundle\Model\LugarVentaQuery');
    }

    /**
     * Filter the query by a related FormaPago object
     *
     * @param   FormaPago|PropelObjectCollection $formaPago The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DetalleVentaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFormaPago($formaPago, $comparison = null)
    {
        if ($formaPago instanceof FormaPago) {
            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_FORMA_PAGO, $formaPago->getIdFormaPago(), $comparison);
        } elseif ($formaPago instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_FORMA_PAGO, $formaPago->toKeyValue('PrimaryKey', 'IdFormaPago'), $comparison);
        } else {
            throw new PropelException('filterByFormaPago() only accepts arguments of type FormaPago or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FormaPago relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function joinFormaPago($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FormaPago');

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
            $this->addJoinObject($join, 'FormaPago');
        }

        return $this;
    }

    /**
     * Use the FormaPago relation FormaPago object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Costo\SystemBundle\Model\FormaPagoQuery A secondary query class using the current class as primary query
     */
    public function useFormaPagoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFormaPago($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FormaPago', '\Costo\SystemBundle\Model\FormaPagoQuery');
    }

    /**
     * Filter the query by a related EventosDetalle object
     *
     * @param   EventosDetalle|PropelObjectCollection $eventosDetalle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DetalleVentaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventosDetalle($eventosDetalle, $comparison = null)
    {
        if ($eventosDetalle instanceof EventosDetalle) {
            return $this
                ->addUsingAlias(DetalleVentaPeer::ID_DETALLE, $eventosDetalle->getIdDetalle(), $comparison);
        } elseif ($eventosDetalle instanceof PropelObjectCollection) {
            return $this
                ->useEventosDetalleQuery()
                ->filterByPrimaryKeys($eventosDetalle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventosDetalle() only accepts arguments of type EventosDetalle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventosDetalle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function joinEventosDetalle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventosDetalle');

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
            $this->addJoinObject($join, 'EventosDetalle');
        }

        return $this;
    }

    /**
     * Use the EventosDetalle relation EventosDetalle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Costo\SystemBundle\Model\EventosDetalleQuery A secondary query class using the current class as primary query
     */
    public function useEventosDetalleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventosDetalle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventosDetalle', '\Costo\SystemBundle\Model\EventosDetalleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   DetalleVenta $detalleVenta Object to remove from the list of results
     *
     * @return DetalleVentaQuery The current query, for fluid interface
     */
    public function prune($detalleVenta = null)
    {
        if ($detalleVenta) {
            $this->addUsingAlias(DetalleVentaPeer::ID_DETALLE, $detalleVenta->getIdDetalle(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     DetalleVentaQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     DetalleVentaQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE);
    }

    /**
     * Order by update date asc
     *
     * @return     DetalleVentaQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     DetalleVentaQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(DetalleVentaPeer::FECHA_CREACION_DETALLE, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     DetalleVentaQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(DetalleVentaPeer::FECHA_CREACION_DETALLE);
    }

    /**
     * Order by create date asc
     *
     * @return     DetalleVentaQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(DetalleVentaPeer::FECHA_CREACION_DETALLE);
    }
}
