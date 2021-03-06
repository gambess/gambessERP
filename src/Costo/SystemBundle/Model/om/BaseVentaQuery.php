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
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaPeer;
use Costo\SystemBundle\Model\VentaQuery;

/**
 * Base class that represents a query for the 'venta' table.
 *
 *
 *
 * @method VentaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method VentaQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method VentaQuery orderByTotalNetoDocumentada($order = Criteria::ASC) Order by the total_neto_documentada column
 * @method VentaQuery orderByTotalIvaDocumentada($order = Criteria::ASC) Order by the total_iva_documentada column
 * @method VentaQuery orderByTotalDocumentada($order = Criteria::ASC) Order by the total_documentada column
 * @method VentaQuery orderByTotalNetoNoDocumentada($order = Criteria::ASC) Order by the total_neto_no_documentada column
 * @method VentaQuery orderByTotalIvaNoDocumentada($order = Criteria::ASC) Order by the total_iva_no_documentada column
 * @method VentaQuery orderByTotalNoDocumentada($order = Criteria::ASC) Order by the total_no_documentada column
 * @method VentaQuery orderByTotalNeto($order = Criteria::ASC) Order by the total_neto column
 * @method VentaQuery orderByTotalIva($order = Criteria::ASC) Order by the total_iva column
 * @method VentaQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method VentaQuery orderByTotalNetoReal($order = Criteria::ASC) Order by the total_neto_real column
 * @method VentaQuery orderByTotalIvaReal($order = Criteria::ASC) Order by the total_iva_real column
 * @method VentaQuery orderByTotalReal($order = Criteria::ASC) Order by the total_real column
 * @method VentaQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method VentaQuery orderByFechaCreacion($order = Criteria::ASC) Order by the fecha_creacion column
 * @method VentaQuery orderByFechaModificacion($order = Criteria::ASC) Order by the fecha_modificacion column
 *
 * @method VentaQuery groupById() Group by the id column
 * @method VentaQuery groupByFecha() Group by the fecha column
 * @method VentaQuery groupByTotalNetoDocumentada() Group by the total_neto_documentada column
 * @method VentaQuery groupByTotalIvaDocumentada() Group by the total_iva_documentada column
 * @method VentaQuery groupByTotalDocumentada() Group by the total_documentada column
 * @method VentaQuery groupByTotalNetoNoDocumentada() Group by the total_neto_no_documentada column
 * @method VentaQuery groupByTotalIvaNoDocumentada() Group by the total_iva_no_documentada column
 * @method VentaQuery groupByTotalNoDocumentada() Group by the total_no_documentada column
 * @method VentaQuery groupByTotalNeto() Group by the total_neto column
 * @method VentaQuery groupByTotalIva() Group by the total_iva column
 * @method VentaQuery groupByTotal() Group by the total column
 * @method VentaQuery groupByTotalNetoReal() Group by the total_neto_real column
 * @method VentaQuery groupByTotalIvaReal() Group by the total_iva_real column
 * @method VentaQuery groupByTotalReal() Group by the total_real column
 * @method VentaQuery groupByDescripcion() Group by the descripcion column
 * @method VentaQuery groupByFechaCreacion() Group by the fecha_creacion column
 * @method VentaQuery groupByFechaModificacion() Group by the fecha_modificacion column
 *
 * @method VentaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VentaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VentaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VentaQuery leftJoinDetalleVenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the DetalleVenta relation
 * @method VentaQuery rightJoinDetalleVenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DetalleVenta relation
 * @method VentaQuery innerJoinDetalleVenta($relationAlias = null) Adds a INNER JOIN clause to the query using the DetalleVenta relation
 *
 * @method Venta findOne(PropelPDO $con = null) Return the first Venta matching the query
 * @method Venta findOneOrCreate(PropelPDO $con = null) Return the first Venta matching the query, or a new Venta object populated from the query conditions when no match is found
 *
 * @method Venta findOneByFecha(string $fecha) Return the first Venta filtered by the fecha column
 * @method Venta findOneByTotalNetoDocumentada(double $total_neto_documentada) Return the first Venta filtered by the total_neto_documentada column
 * @method Venta findOneByTotalIvaDocumentada(double $total_iva_documentada) Return the first Venta filtered by the total_iva_documentada column
 * @method Venta findOneByTotalDocumentada(double $total_documentada) Return the first Venta filtered by the total_documentada column
 * @method Venta findOneByTotalNetoNoDocumentada(double $total_neto_no_documentada) Return the first Venta filtered by the total_neto_no_documentada column
 * @method Venta findOneByTotalIvaNoDocumentada(double $total_iva_no_documentada) Return the first Venta filtered by the total_iva_no_documentada column
 * @method Venta findOneByTotalNoDocumentada(double $total_no_documentada) Return the first Venta filtered by the total_no_documentada column
 * @method Venta findOneByTotalNeto(double $total_neto) Return the first Venta filtered by the total_neto column
 * @method Venta findOneByTotalIva(double $total_iva) Return the first Venta filtered by the total_iva column
 * @method Venta findOneByTotal(double $total) Return the first Venta filtered by the total column
 * @method Venta findOneByTotalNetoReal(double $total_neto_real) Return the first Venta filtered by the total_neto_real column
 * @method Venta findOneByTotalIvaReal(double $total_iva_real) Return the first Venta filtered by the total_iva_real column
 * @method Venta findOneByTotalReal(double $total_real) Return the first Venta filtered by the total_real column
 * @method Venta findOneByDescripcion(string $descripcion) Return the first Venta filtered by the descripcion column
 * @method Venta findOneByFechaCreacion(string $fecha_creacion) Return the first Venta filtered by the fecha_creacion column
 * @method Venta findOneByFechaModificacion(string $fecha_modificacion) Return the first Venta filtered by the fecha_modificacion column
 *
 * @method array findById(int $id) Return Venta objects filtered by the id column
 * @method array findByFecha(string $fecha) Return Venta objects filtered by the fecha column
 * @method array findByTotalNetoDocumentada(double $total_neto_documentada) Return Venta objects filtered by the total_neto_documentada column
 * @method array findByTotalIvaDocumentada(double $total_iva_documentada) Return Venta objects filtered by the total_iva_documentada column
 * @method array findByTotalDocumentada(double $total_documentada) Return Venta objects filtered by the total_documentada column
 * @method array findByTotalNetoNoDocumentada(double $total_neto_no_documentada) Return Venta objects filtered by the total_neto_no_documentada column
 * @method array findByTotalIvaNoDocumentada(double $total_iva_no_documentada) Return Venta objects filtered by the total_iva_no_documentada column
 * @method array findByTotalNoDocumentada(double $total_no_documentada) Return Venta objects filtered by the total_no_documentada column
 * @method array findByTotalNeto(double $total_neto) Return Venta objects filtered by the total_neto column
 * @method array findByTotalIva(double $total_iva) Return Venta objects filtered by the total_iva column
 * @method array findByTotal(double $total) Return Venta objects filtered by the total column
 * @method array findByTotalNetoReal(double $total_neto_real) Return Venta objects filtered by the total_neto_real column
 * @method array findByTotalIvaReal(double $total_iva_real) Return Venta objects filtered by the total_iva_real column
 * @method array findByTotalReal(double $total_real) Return Venta objects filtered by the total_real column
 * @method array findByDescripcion(string $descripcion) Return Venta objects filtered by the descripcion column
 * @method array findByFechaCreacion(string $fecha_creacion) Return Venta objects filtered by the fecha_creacion column
 * @method array findByFechaModificacion(string $fecha_modificacion) Return Venta objects filtered by the fecha_modificacion column
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
     * @param   VentaQuery|Criteria $criteria Optional Criteria to build the query from
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Venta A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
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
     * @return                 Venta A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `fecha`, `total_neto_documentada`, `total_iva_documentada`, `total_documentada`, `total_neto_no_documentada`, `total_iva_no_documentada`, `total_no_documentada`, `total_neto`, `total_iva`, `total`, `total_neto_real`, `total_iva_real`, `total_real`, `descripcion`, `fecha_creacion`, `fecha_modificacion` FROM `venta` WHERE `id` = :p0';
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

        return $this->addUsingAlias(VentaPeer::ID, $key, Criteria::EQUAL);
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

        return $this->addUsingAlias(VentaPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VentaPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VentaPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the fecha column
     *
     * Example usage:
     * <code>
     * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecha The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(VentaPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(VentaPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::FECHA, $fecha, $comparison);
    }

    /**
     * Filter the query on the total_neto_documentada column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalNetoDocumentada(1234); // WHERE total_neto_documentada = 1234
     * $query->filterByTotalNetoDocumentada(array(12, 34)); // WHERE total_neto_documentada IN (12, 34)
     * $query->filterByTotalNetoDocumentada(array('min' => 12)); // WHERE total_neto_documentada >= 12
     * $query->filterByTotalNetoDocumentada(array('max' => 12)); // WHERE total_neto_documentada <= 12
     * </code>
     *
     * @param     mixed $totalNetoDocumentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalNetoDocumentada($totalNetoDocumentada = null, $comparison = null)
    {
        if (is_array($totalNetoDocumentada)) {
            $useMinMax = false;
            if (isset($totalNetoDocumentada['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO_DOCUMENTADA, $totalNetoDocumentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNetoDocumentada['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO_DOCUMENTADA, $totalNetoDocumentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_NETO_DOCUMENTADA, $totalNetoDocumentada, $comparison);
    }

    /**
     * Filter the query on the total_iva_documentada column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalIvaDocumentada(1234); // WHERE total_iva_documentada = 1234
     * $query->filterByTotalIvaDocumentada(array(12, 34)); // WHERE total_iva_documentada IN (12, 34)
     * $query->filterByTotalIvaDocumentada(array('min' => 12)); // WHERE total_iva_documentada >= 12
     * $query->filterByTotalIvaDocumentada(array('max' => 12)); // WHERE total_iva_documentada <= 12
     * </code>
     *
     * @param     mixed $totalIvaDocumentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalIvaDocumentada($totalIvaDocumentada = null, $comparison = null)
    {
        if (is_array($totalIvaDocumentada)) {
            $useMinMax = false;
            if (isset($totalIvaDocumentada['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_DOCUMENTADA, $totalIvaDocumentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalIvaDocumentada['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_DOCUMENTADA, $totalIvaDocumentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_IVA_DOCUMENTADA, $totalIvaDocumentada, $comparison);
    }

    /**
     * Filter the query on the total_documentada column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalDocumentada(1234); // WHERE total_documentada = 1234
     * $query->filterByTotalDocumentada(array(12, 34)); // WHERE total_documentada IN (12, 34)
     * $query->filterByTotalDocumentada(array('min' => 12)); // WHERE total_documentada >= 12
     * $query->filterByTotalDocumentada(array('max' => 12)); // WHERE total_documentada <= 12
     * </code>
     *
     * @param     mixed $totalDocumentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalDocumentada($totalDocumentada = null, $comparison = null)
    {
        if (is_array($totalDocumentada)) {
            $useMinMax = false;
            if (isset($totalDocumentada['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_DOCUMENTADA, $totalDocumentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalDocumentada['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_DOCUMENTADA, $totalDocumentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_DOCUMENTADA, $totalDocumentada, $comparison);
    }

    /**
     * Filter the query on the total_neto_no_documentada column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalNetoNoDocumentada(1234); // WHERE total_neto_no_documentada = 1234
     * $query->filterByTotalNetoNoDocumentada(array(12, 34)); // WHERE total_neto_no_documentada IN (12, 34)
     * $query->filterByTotalNetoNoDocumentada(array('min' => 12)); // WHERE total_neto_no_documentada >= 12
     * $query->filterByTotalNetoNoDocumentada(array('max' => 12)); // WHERE total_neto_no_documentada <= 12
     * </code>
     *
     * @param     mixed $totalNetoNoDocumentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalNetoNoDocumentada($totalNetoNoDocumentada = null, $comparison = null)
    {
        if (is_array($totalNetoNoDocumentada)) {
            $useMinMax = false;
            if (isset($totalNetoNoDocumentada['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO_NO_DOCUMENTADA, $totalNetoNoDocumentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNetoNoDocumentada['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO_NO_DOCUMENTADA, $totalNetoNoDocumentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_NETO_NO_DOCUMENTADA, $totalNetoNoDocumentada, $comparison);
    }

    /**
     * Filter the query on the total_iva_no_documentada column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalIvaNoDocumentada(1234); // WHERE total_iva_no_documentada = 1234
     * $query->filterByTotalIvaNoDocumentada(array(12, 34)); // WHERE total_iva_no_documentada IN (12, 34)
     * $query->filterByTotalIvaNoDocumentada(array('min' => 12)); // WHERE total_iva_no_documentada >= 12
     * $query->filterByTotalIvaNoDocumentada(array('max' => 12)); // WHERE total_iva_no_documentada <= 12
     * </code>
     *
     * @param     mixed $totalIvaNoDocumentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalIvaNoDocumentada($totalIvaNoDocumentada = null, $comparison = null)
    {
        if (is_array($totalIvaNoDocumentada)) {
            $useMinMax = false;
            if (isset($totalIvaNoDocumentada['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_NO_DOCUMENTADA, $totalIvaNoDocumentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalIvaNoDocumentada['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_NO_DOCUMENTADA, $totalIvaNoDocumentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_IVA_NO_DOCUMENTADA, $totalIvaNoDocumentada, $comparison);
    }

    /**
     * Filter the query on the total_no_documentada column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalNoDocumentada(1234); // WHERE total_no_documentada = 1234
     * $query->filterByTotalNoDocumentada(array(12, 34)); // WHERE total_no_documentada IN (12, 34)
     * $query->filterByTotalNoDocumentada(array('min' => 12)); // WHERE total_no_documentada >= 12
     * $query->filterByTotalNoDocumentada(array('max' => 12)); // WHERE total_no_documentada <= 12
     * </code>
     *
     * @param     mixed $totalNoDocumentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalNoDocumentada($totalNoDocumentada = null, $comparison = null)
    {
        if (is_array($totalNoDocumentada)) {
            $useMinMax = false;
            if (isset($totalNoDocumentada['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NO_DOCUMENTADA, $totalNoDocumentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNoDocumentada['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NO_DOCUMENTADA, $totalNoDocumentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_NO_DOCUMENTADA, $totalNoDocumentada, $comparison);
    }

    /**
     * Filter the query on the total_neto column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalNeto(1234); // WHERE total_neto = 1234
     * $query->filterByTotalNeto(array(12, 34)); // WHERE total_neto IN (12, 34)
     * $query->filterByTotalNeto(array('min' => 12)); // WHERE total_neto >= 12
     * $query->filterByTotalNeto(array('max' => 12)); // WHERE total_neto <= 12
     * </code>
     *
     * @param     mixed $totalNeto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalNeto($totalNeto = null, $comparison = null)
    {
        if (is_array($totalNeto)) {
            $useMinMax = false;
            if (isset($totalNeto['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO, $totalNeto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNeto['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO, $totalNeto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_NETO, $totalNeto, $comparison);
    }

    /**
     * Filter the query on the total_iva column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalIva(1234); // WHERE total_iva = 1234
     * $query->filterByTotalIva(array(12, 34)); // WHERE total_iva IN (12, 34)
     * $query->filterByTotalIva(array('min' => 12)); // WHERE total_iva >= 12
     * $query->filterByTotalIva(array('max' => 12)); // WHERE total_iva <= 12
     * </code>
     *
     * @param     mixed $totalIva The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalIva($totalIva = null, $comparison = null)
    {
        if (is_array($totalIva)) {
            $useMinMax = false;
            if (isset($totalIva['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA, $totalIva['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalIva['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA, $totalIva['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_IVA, $totalIva, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total >= 12
     * $query->filterByTotal(array('max' => 12)); // WHERE total <= 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the total_neto_real column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalNetoReal(1234); // WHERE total_neto_real = 1234
     * $query->filterByTotalNetoReal(array(12, 34)); // WHERE total_neto_real IN (12, 34)
     * $query->filterByTotalNetoReal(array('min' => 12)); // WHERE total_neto_real >= 12
     * $query->filterByTotalNetoReal(array('max' => 12)); // WHERE total_neto_real <= 12
     * </code>
     *
     * @param     mixed $totalNetoReal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalNetoReal($totalNetoReal = null, $comparison = null)
    {
        if (is_array($totalNetoReal)) {
            $useMinMax = false;
            if (isset($totalNetoReal['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO_REAL, $totalNetoReal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNetoReal['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_NETO_REAL, $totalNetoReal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_NETO_REAL, $totalNetoReal, $comparison);
    }

    /**
     * Filter the query on the total_iva_real column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalIvaReal(1234); // WHERE total_iva_real = 1234
     * $query->filterByTotalIvaReal(array(12, 34)); // WHERE total_iva_real IN (12, 34)
     * $query->filterByTotalIvaReal(array('min' => 12)); // WHERE total_iva_real >= 12
     * $query->filterByTotalIvaReal(array('max' => 12)); // WHERE total_iva_real <= 12
     * </code>
     *
     * @param     mixed $totalIvaReal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalIvaReal($totalIvaReal = null, $comparison = null)
    {
        if (is_array($totalIvaReal)) {
            $useMinMax = false;
            if (isset($totalIvaReal['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_REAL, $totalIvaReal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalIvaReal['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_IVA_REAL, $totalIvaReal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_IVA_REAL, $totalIvaReal, $comparison);
    }

    /**
     * Filter the query on the total_real column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalReal(1234); // WHERE total_real = 1234
     * $query->filterByTotalReal(array(12, 34)); // WHERE total_real IN (12, 34)
     * $query->filterByTotalReal(array('min' => 12)); // WHERE total_real >= 12
     * $query->filterByTotalReal(array('max' => 12)); // WHERE total_real <= 12
     * </code>
     *
     * @param     mixed $totalReal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByTotalReal($totalReal = null, $comparison = null)
    {
        if (is_array($totalReal)) {
            $useMinMax = false;
            if (isset($totalReal['min'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_REAL, $totalReal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalReal['max'])) {
                $this->addUsingAlias(VentaPeer::TOTAL_REAL, $totalReal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::TOTAL_REAL, $totalReal, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcion)) {
                $descripcion = str_replace('*', '%', $descripcion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VentaPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaCreacion('2011-03-14'); // WHERE fecha_creacion = '2011-03-14'
     * $query->filterByFechaCreacion('now'); // WHERE fecha_creacion = '2011-03-14'
     * $query->filterByFechaCreacion(array('max' => 'yesterday')); // WHERE fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByFechaCreacion($fechaCreacion = null, $comparison = null)
    {
        if (is_array($fechaCreacion)) {
            $useMinMax = false;
            if (isset($fechaCreacion['min'])) {
                $this->addUsingAlias(VentaPeer::FECHA_CREACION, $fechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaCreacion['max'])) {
                $this->addUsingAlias(VentaPeer::FECHA_CREACION, $fechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::FECHA_CREACION, $fechaCreacion, $comparison);
    }

    /**
     * Filter the query on the fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaModificacion('2011-03-14'); // WHERE fecha_modificacion = '2011-03-14'
     * $query->filterByFechaModificacion('now'); // WHERE fecha_modificacion = '2011-03-14'
     * $query->filterByFechaModificacion(array('max' => 'yesterday')); // WHERE fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function filterByFechaModificacion($fechaModificacion = null, $comparison = null)
    {
        if (is_array($fechaModificacion)) {
            $useMinMax = false;
            if (isset($fechaModificacion['min'])) {
                $this->addUsingAlias(VentaPeer::FECHA_MODIFICACION, $fechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaModificacion['max'])) {
                $this->addUsingAlias(VentaPeer::FECHA_MODIFICACION, $fechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VentaPeer::FECHA_MODIFICACION, $fechaModificacion, $comparison);
    }

    /**
     * Filter the query by a related DetalleVenta object
     *
     * @param   DetalleVenta|PropelObjectCollection $detalleVenta  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VentaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDetalleVenta($detalleVenta, $comparison = null)
    {
        if ($detalleVenta instanceof DetalleVenta) {
            return $this
                ->addUsingAlias(VentaPeer::ID, $detalleVenta->getIdVenta(), $comparison);
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
     * @return VentaQuery The current query, for fluid interface
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
     * @param   Venta $venta Object to remove from the list of results
     *
     * @return VentaQuery The current query, for fluid interface
     */
    public function prune($venta = null)
    {
        if ($venta) {
            $this->addUsingAlias(VentaPeer::ID, $venta->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     VentaQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(VentaPeer::FECHA_MODIFICACION, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     VentaQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(VentaPeer::FECHA_MODIFICACION);
    }

    /**
     * Order by update date asc
     *
     * @return     VentaQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(VentaPeer::FECHA_MODIFICACION);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     VentaQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(VentaPeer::FECHA_CREACION, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     VentaQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(VentaPeer::FECHA_CREACION);
    }

    /**
     * Order by create date asc
     *
     * @return     VentaQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(VentaPeer::FECHA_CREACION);
    }
}
