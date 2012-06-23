<?php

namespace Costo\SystemBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaPeer;
use Costo\SystemBundle\Model\VentaQuery;

/**
 * Base class that represents a query for the 'ajuste_venta' table.
 *
 * 
 *
 * @method     VentaQuery orderByIdVenta($order = Criteria::ASC) Order by the id_ajuste_venta column
 * @method     VentaQuery orderByFkVenta($order = Criteria::ASC) Order by the fk_venta column
 * @method     VentaQuery orderByFechaVenta($order = Criteria::ASC) Order by the fecha_venta column
 * @method     VentaQuery orderByTipoVenta($order = Criteria::ASC) Order by the tipo_venta column
 * @method     VentaQuery orderByTotalVenta($order = Criteria::ASC) Order by the total_venta column
 * @method     VentaQuery orderByTotalVentaFormal($order = Criteria::ASC) Order by the total_venta_formal column
 * @method     VentaQuery orderByTotalVentaInformal($order = Criteria::ASC) Order by the total_venta_informal column
 * @method     VentaQuery orderByTotalIvaVenta($order = Criteria::ASC) Order by the total_iva_venta column
 * @method     VentaQuery orderByDetalleVenta($order = Criteria::ASC) Order by the detalle_venta column
 *
 * @method     VentaQuery groupByIdVenta() Group by the id_ajuste_venta column
 * @method     VentaQuery groupByFkVenta() Group by the fk_venta column
 * @method     VentaQuery groupByFechaVenta() Group by the fecha_venta column
 * @method     VentaQuery groupByTipoVenta() Group by the tipo_venta column
 * @method     VentaQuery groupByTotalVenta() Group by the total_venta column
 * @method     VentaQuery groupByTotalVentaFormal() Group by the total_venta_formal column
 * @method     VentaQuery groupByTotalVentaInformal() Group by the total_venta_informal column
 * @method     VentaQuery groupByTotalIvaVenta() Group by the total_iva_venta column
 * @method     VentaQuery groupByDetalleVenta() Group by the detalle_venta column
 *
 * @method     VentaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     VentaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     VentaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Venta findOne(PropelPDO $con = null) Return the first Venta matching the query
 * @method     Venta findOneOrCreate(PropelPDO $con = null) Return the first Venta matching the query, or a new Venta object populated from the query conditions when no match is found
 *
 * @method     Venta findOneByIdVenta(int $id_ajuste_venta) Return the first Venta filtered by the id_ajuste_venta column
 * @method     Venta findOneByFkVenta(int $fk_venta) Return the first Venta filtered by the fk_venta column
 * @method     Venta findOneByFechaVenta(string $fecha_venta) Return the first Venta filtered by the fecha_venta column
 * @method     Venta findOneByTipoVenta(string $tipo_venta) Return the first Venta filtered by the tipo_venta column
 * @method     Venta findOneByTotalVenta(double $total_venta) Return the first Venta filtered by the total_venta column
 * @method     Venta findOneByTotalVentaFormal(double $total_venta_formal) Return the first Venta filtered by the total_venta_formal column
 * @method     Venta findOneByTotalVentaInformal(double $total_venta_informal) Return the first Venta filtered by the total_venta_informal column
 * @method     Venta findOneByTotalIvaVenta(double $total_iva_venta) Return the first Venta filtered by the total_iva_venta column
 * @method     Venta findOneByDetalleVenta(string $detalle_venta) Return the first Venta filtered by the detalle_venta column
 *
 * @method     array findByIdVenta(int $id_ajuste_venta) Return Venta objects filtered by the id_ajuste_venta column
 * @method     array findByFkVenta(int $fk_venta) Return Venta objects filtered by the fk_venta column
 * @method     array findByFechaVenta(string $fecha_venta) Return Venta objects filtered by the fecha_venta column
 * @method     array findByTipoVenta(string $tipo_venta) Return Venta objects filtered by the tipo_venta column
 * @method     array findByTotalVenta(double $total_venta) Return Venta objects filtered by the total_venta column
 * @method     array findByTotalVentaFormal(double $total_venta_formal) Return Venta objects filtered by the total_venta_formal column
 * @method     array findByTotalVentaInformal(double $total_venta_informal) Return Venta objects filtered by the total_venta_informal column
 * @method     array findByTotalIvaVenta(double $total_iva_venta) Return Venta objects filtered by the total_iva_venta column
 * @method     array findByDetalleVenta(string $detalle_venta) Return Venta objects filtered by the detalle_venta column
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseVentaQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseVentaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'testing', $modelName = 'Costo\\SystemBundle\\Model\\Venta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VentaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     VentaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VentaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VentaQuery) {
            return $criteria;
        }
        $query = new VentaQuery();
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
     * @return   Venta|Venta[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VentaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Venta A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID_AJUSTE_VENTA`, `FK_VENTA`, `FECHA_VENTA`, `TIPO_VENTA`, `TOTAL_VENTA`, `TOTAL_VENTA_FORMAL`, `TOTAL_VENTA_INFORMAL`, `TOTAL_IVA_VENTA`, `DETALLE_VENTA` FROM `ajuste_venta` WHERE `ID_AJUSTE_VENTA` = :p0';
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
            $obj = new Venta();
            $obj->hydrate($row);
            VentaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Venta|Venta[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Venta[]|mixed the list of results, formatted by the current formatter
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
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VentaPeer::ID_AJUSTE_VENTA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VentaPeer::ID_AJUSTE_VENTA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_ajuste_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByIdVenta(1234); // WHERE id_ajuste_venta = 1234
     * $query->filterByIdVenta(array(12, 34)); // WHERE id_ajuste_venta IN (12, 34)
     * $query->filterByIdVenta(array('min' => 12)); // WHERE id_ajuste_venta > 12
     * </code>
     *
     * @param     mixed $idVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByIdVenta($idVenta = null, $comparison = null)
    {
        if (is_array($idVenta) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(VentaPeer::ID_AJUSTE_VENTA, $idVenta, $comparison);
    }

    /**
     * Filter the query on the fk_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByFkVenta(1234); // WHERE fk_venta = 1234
     * $query->filterByFkVenta(array(12, 34)); // WHERE fk_venta IN (12, 34)
     * $query->filterByFkVenta(array('min' => 12)); // WHERE fk_venta > 12
     * </code>
     *
     * @param     mixed $fkVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByFkVenta($fkVenta = null, $comparison = null)
    {
        if (is_array($fkVenta)) {
            $useMinMax = false;
            if (isset($fkVenta['min'])) {
                $this->addUsingAlias(VentaPeer::FK_VENTA, $fkVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkVenta['max'])) {
                $this->addUsingAlias(VentaPeer::FK_VENTA, $fkVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::FK_VENTA, $fkVenta, $comparison);
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
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByFechaVenta($fechaVenta = null, $comparison = null)
    {
        if (is_array($fechaVenta)) {
            $useMinMax = false;
            if (isset($fechaVenta['min'])) {
                $this->addUsingAlias(VentaPeer::FECHA_VENTA, $fechaVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaVenta['max'])) {
                $this->addUsingAlias(VentaPeer::FECHA_VENTA, $fechaVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::FECHA_VENTA, $fechaVenta, $comparison);
    }

    /**
     * Filter the query on the tipo_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoVenta('fooValue');   // WHERE tipo_venta = 'fooValue'
     * $query->filterByTipoVenta('%fooValue%'); // WHERE tipo_venta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipoVenta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTipoVenta($tipoVenta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipoVenta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipoVenta)) {
                $tipoVenta = str_replace('*', '%', $tipoVenta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VentaPeer::TIPO_VENTA, $tipoVenta, $comparison);
    }

    /**
     * Filter the query on the total_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalVenta(1234); // WHERE total_venta = 1234
     * $query->filterByTotalVenta(array(12, 34)); // WHERE total_venta IN (12, 34)
     * $query->filterByTotalVenta(array('min' => 12)); // WHERE total_venta > 12
     * </code>
     *
     * @param     mixed $totalVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalVenta($totalVenta = null, $comparison = null)
    {
        if (is_array($totalVenta)) {
            $useMinMax = false;
            if (isset($totalVenta['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_VENTA, $totalVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalVenta['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_VENTA, $totalVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_VENTA, $totalVenta, $comparison);
    }

    /**
     * Filter the query on the total_venta_formal column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalVentaFormal(1234); // WHERE total_venta_formal = 1234
     * $query->filterByTotalVentaFormal(array(12, 34)); // WHERE total_venta_formal IN (12, 34)
     * $query->filterByTotalVentaFormal(array('min' => 12)); // WHERE total_venta_formal > 12
     * </code>
     *
     * @param     mixed $totalVentaFormal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalVentaFormal($totalVentaFormal = null, $comparison = null)
    {
        if (is_array($totalVentaFormal)) {
            $useMinMax = false;
            if (isset($totalVentaFormal['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_VENTA_FORMAL, $totalVentaFormal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalVentaFormal['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_VENTA_FORMAL, $totalVentaFormal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_VENTA_FORMAL, $totalVentaFormal, $comparison);
    }

    /**
     * Filter the query on the total_venta_informal column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalVentaInformal(1234); // WHERE total_venta_informal = 1234
     * $query->filterByTotalVentaInformal(array(12, 34)); // WHERE total_venta_informal IN (12, 34)
     * $query->filterByTotalVentaInformal(array('min' => 12)); // WHERE total_venta_informal > 12
     * </code>
     *
     * @param     mixed $totalVentaInformal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalVentaInformal($totalVentaInformal = null, $comparison = null)
    {
        if (is_array($totalVentaInformal)) {
            $useMinMax = false;
            if (isset($totalVentaInformal['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_VENTA_INFORMAL, $totalVentaInformal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalVentaInformal['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_VENTA_INFORMAL, $totalVentaInformal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_VENTA_INFORMAL, $totalVentaInformal, $comparison);
    }

    /**
     * Filter the query on the total_iva_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalIvaVenta(1234); // WHERE total_iva_venta = 1234
     * $query->filterByTotalIvaVenta(array(12, 34)); // WHERE total_iva_venta IN (12, 34)
     * $query->filterByTotalIvaVenta(array('min' => 12)); // WHERE total_iva_venta > 12
     * </code>
     *
     * @param     mixed $totalIvaVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalIvaVenta($totalIvaVenta = null, $comparison = null)
    {
        if (is_array($totalIvaVenta)) {
            $useMinMax = false;
            if (isset($totalIvaVenta['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_VENTA, $totalIvaVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalIvaVenta['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_VENTA, $totalIvaVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_IVA_VENTA, $totalIvaVenta, $comparison);
    }

    /**
     * Filter the query on the detalle_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByDetalleVenta('fooValue');   // WHERE detalle_venta = 'fooValue'
     * $query->filterByDetalleVenta('%fooValue%'); // WHERE detalle_venta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detalleVenta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByDetalleVenta($detalleVenta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detalleVenta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $detalleVenta)) {
                $detalleVenta = str_replace('*', '%', $detalleVenta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VentaPeer::DETALLE_VENTA, $detalleVenta, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Venta $venta Object to remove from the list of results
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function prune($venta = null)
    {
        if ($venta) {
            $this->addUsingAlias(VentaPeer::ID_AJUSTE_VENTA, $venta->getIdVenta(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseVentaQuery