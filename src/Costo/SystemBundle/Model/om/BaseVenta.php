<?php

namespace Costo\SystemBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Costo\SystemBundle\Model\DetalleVenta;
use Costo\SystemBundle\Model\DetalleVentaQuery;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaPeer;
use Costo\SystemBundle\Model\VentaQuery;

/**
 * Base class that represents a row from the 'venta' table.
 *
 *
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseVenta extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Costo\\SystemBundle\\Model\\VentaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        VentaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the fecha field.
     * @var        string
     */
    protected $fecha;

    /**
     * The value for the total_neto_documentada field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_neto_documentada;

    /**
     * The value for the total_iva_documentada field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_iva_documentada;

    /**
     * The value for the total_documentada field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_documentada;

    /**
     * The value for the total_neto_no_documentada field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_neto_no_documentada;

    /**
     * The value for the total_iva_no_documentada field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_iva_no_documentada;

    /**
     * The value for the total_no_documentada field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_no_documentada;

    /**
     * The value for the total_neto field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_neto;

    /**
     * The value for the total_iva field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_iva;

    /**
     * The value for the total field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total;

    /**
     * The value for the total_neto_real field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_neto_real;

    /**
     * The value for the total_iva_real field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_iva_real;

    /**
     * The value for the total_real field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_real;

    /**
     * The value for the descripcion field.
     * @var        string
     */
    protected $descripcion;

    /**
     * The value for the fecha_creacion field.
     * @var        string
     */
    protected $fecha_creacion;

    /**
     * The value for the fecha_modificacion field.
     * @var        string
     */
    protected $fecha_modificacion;

    /**
     * @var        PropelObjectCollection|DetalleVenta[] Collection to store aggregation of DetalleVenta objects.
     */
    protected $collDetalleVentas;
    protected $collDetalleVentasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $detalleVentasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->total_neto_documentada = 0;
        $this->total_iva_documentada = 0;
        $this->total_documentada = 0;
        $this->total_neto_no_documentada = 0;
        $this->total_iva_no_documentada = 0;
        $this->total_no_documentada = 0;
        $this->total_neto = 0;
        $this->total_iva = 0;
        $this->total = 0;
        $this->total_neto_real = 0;
        $this->total_iva_real = 0;
        $this->total_real = 0;
    }

    /**
     * Initializes internal state of BaseVenta object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [optionally formatted] temporal [fecha] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFecha($format = null)
    {
        if ($this->fecha === null) {
            return null;
        }

        if ($this->fecha === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [total_neto_documentada] column value.
     *
     * @return double
     */
    public function getTotalNetoDocumentada()
    {
        return $this->total_neto_documentada;
    }

    /**
     * Get the [total_iva_documentada] column value.
     *
     * @return double
     */
    public function getTotalIvaDocumentada()
    {
        return $this->total_iva_documentada;
    }

    /**
     * Get the [total_documentada] column value.
     *
     * @return double
     */
    public function getTotalDocumentada()
    {
        return $this->total_documentada;
    }

    /**
     * Get the [total_neto_no_documentada] column value.
     *
     * @return double
     */
    public function getTotalNetoNoDocumentada()
    {
        return $this->total_neto_no_documentada;
    }

    /**
     * Get the [total_iva_no_documentada] column value.
     *
     * @return double
     */
    public function getTotalIvaNoDocumentada()
    {
        return $this->total_iva_no_documentada;
    }

    /**
     * Get the [total_no_documentada] column value.
     *
     * @return double
     */
    public function getTotalNoDocumentada()
    {
        return $this->total_no_documentada;
    }

    /**
     * Get the [total_neto] column value.
     *
     * @return double
     */
    public function getTotalNeto()
    {
        return $this->total_neto;
    }

    /**
     * Get the [total_iva] column value.
     *
     * @return double
     */
    public function getTotalIva()
    {
        return $this->total_iva;
    }

    /**
     * Get the [total] column value.
     *
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [total_neto_real] column value.
     *
     * @return double
     */
    public function getTotalNetoReal()
    {
        return $this->total_neto_real;
    }

    /**
     * Get the [total_iva_real] column value.
     *
     * @return double
     */
    public function getTotalIvaReal()
    {
        return $this->total_iva_real;
    }

    /**
     * Get the [total_real] column value.
     *
     * @return double
     */
    public function getTotalReal()
    {
        return $this->total_real;
    }

    /**
     * Get the [descripcion] column value.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_creacion] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaCreacion($format = null)
    {
        if ($this->fecha_creacion === null) {
            return null;
        }

        if ($this->fecha_creacion === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_creacion);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_creacion, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [fecha_modificacion] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaModificacion($format = null)
    {
        if ($this->fecha_modificacion === null) {
            return null;
        }

        if ($this->fecha_modificacion === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_modificacion);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_modificacion, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = VentaPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [fecha] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Venta The current object (for fluent API support)
     */
    public function setFecha($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha !== null && $tmpDt = new DateTime($this->fecha)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha = $newDateAsString;
                $this->modifiedColumns[] = VentaPeer::FECHA;
            }
        } // if either are not null


        return $this;
    } // setFecha()

    /**
     * Set the value of [total_neto_documentada] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalNetoDocumentada($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_neto_documentada !== $v) {
            $this->total_neto_documentada = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_NETO_DOCUMENTADA;
        }


        return $this;
    } // setTotalNetoDocumentada()

    /**
     * Set the value of [total_iva_documentada] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalIvaDocumentada($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_iva_documentada !== $v) {
            $this->total_iva_documentada = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_IVA_DOCUMENTADA;
        }


        return $this;
    } // setTotalIvaDocumentada()

    /**
     * Set the value of [total_documentada] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalDocumentada($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_documentada !== $v) {
            $this->total_documentada = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_DOCUMENTADA;
        }


        return $this;
    } // setTotalDocumentada()

    /**
     * Set the value of [total_neto_no_documentada] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalNetoNoDocumentada($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_neto_no_documentada !== $v) {
            $this->total_neto_no_documentada = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_NETO_NO_DOCUMENTADA;
        }


        return $this;
    } // setTotalNetoNoDocumentada()

    /**
     * Set the value of [total_iva_no_documentada] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalIvaNoDocumentada($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_iva_no_documentada !== $v) {
            $this->total_iva_no_documentada = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_IVA_NO_DOCUMENTADA;
        }


        return $this;
    } // setTotalIvaNoDocumentada()

    /**
     * Set the value of [total_no_documentada] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalNoDocumentada($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_no_documentada !== $v) {
            $this->total_no_documentada = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_NO_DOCUMENTADA;
        }


        return $this;
    } // setTotalNoDocumentada()

    /**
     * Set the value of [total_neto] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalNeto($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_neto !== $v) {
            $this->total_neto = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_NETO;
        }


        return $this;
    } // setTotalNeto()

    /**
     * Set the value of [total_iva] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalIva($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_iva !== $v) {
            $this->total_iva = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_IVA;
        }


        return $this;
    } // setTotalIva()

    /**
     * Set the value of [total] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL;
        }


        return $this;
    } // setTotal()

    /**
     * Set the value of [total_neto_real] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalNetoReal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_neto_real !== $v) {
            $this->total_neto_real = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_NETO_REAL;
        }


        return $this;
    } // setTotalNetoReal()

    /**
     * Set the value of [total_iva_real] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalIvaReal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_iva_real !== $v) {
            $this->total_iva_real = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_IVA_REAL;
        }


        return $this;
    } // setTotalIvaReal()

    /**
     * Set the value of [total_real] column.
     *
     * @param double $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setTotalReal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_real !== $v) {
            $this->total_real = $v;
            $this->modifiedColumns[] = VentaPeer::TOTAL_REAL;
        }


        return $this;
    } // setTotalReal()

    /**
     * Set the value of [descripcion] column.
     *
     * @param string $v new value
     * @return Venta The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[] = VentaPeer::DESCRIPCION;
        }


        return $this;
    } // setDescripcion()

    /**
     * Sets the value of [fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Venta The current object (for fluent API support)
     */
    public function setFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_creacion !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_creacion !== null && $tmpDt = new DateTime($this->fecha_creacion)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_creacion = $newDateAsString;
                $this->modifiedColumns[] = VentaPeer::FECHA_CREACION;
            }
        } // if either are not null


        return $this;
    } // setFechaCreacion()

    /**
     * Sets the value of [fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Venta The current object (for fluent API support)
     */
    public function setFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_modificacion !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_modificacion !== null && $tmpDt = new DateTime($this->fecha_modificacion)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_modificacion = $newDateAsString;
                $this->modifiedColumns[] = VentaPeer::FECHA_MODIFICACION;
            }
        } // if either are not null


        return $this;
    } // setFechaModificacion()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->total_neto_documentada !== 0) {
                return false;
            }

            if ($this->total_iva_documentada !== 0) {
                return false;
            }

            if ($this->total_documentada !== 0) {
                return false;
            }

            if ($this->total_neto_no_documentada !== 0) {
                return false;
            }

            if ($this->total_iva_no_documentada !== 0) {
                return false;
            }

            if ($this->total_no_documentada !== 0) {
                return false;
            }

            if ($this->total_neto !== 0) {
                return false;
            }

            if ($this->total_iva !== 0) {
                return false;
            }

            if ($this->total !== 0) {
                return false;
            }

            if ($this->total_neto_real !== 0) {
                return false;
            }

            if ($this->total_iva_real !== 0) {
                return false;
            }

            if ($this->total_real !== 0) {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fecha = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->total_neto_documentada = ($row[$startcol + 2] !== null) ? (double) $row[$startcol + 2] : null;
            $this->total_iva_documentada = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
            $this->total_documentada = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
            $this->total_neto_no_documentada = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
            $this->total_iva_no_documentada = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
            $this->total_no_documentada = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
            $this->total_neto = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
            $this->total_iva = ($row[$startcol + 9] !== null) ? (double) $row[$startcol + 9] : null;
            $this->total = ($row[$startcol + 10] !== null) ? (double) $row[$startcol + 10] : null;
            $this->total_neto_real = ($row[$startcol + 11] !== null) ? (double) $row[$startcol + 11] : null;
            $this->total_iva_real = ($row[$startcol + 12] !== null) ? (double) $row[$startcol + 12] : null;
            $this->total_real = ($row[$startcol + 13] !== null) ? (double) $row[$startcol + 13] : null;
            $this->descripcion = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->fecha_creacion = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->fecha_modificacion = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 17; // 17 = VentaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Venta object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = VentaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collDetalleVentas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = VentaQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(VentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(VentaPeer::FECHA_CREACION)) {
                    $this->setFechaCreacion(time());
                }
                if (!$this->isColumnModified(VentaPeer::FECHA_MODIFICACION)) {
                    $this->setFechaModificacion(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(VentaPeer::FECHA_MODIFICACION)) {
                    $this->setFechaModificacion(time());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                VentaPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->detalleVentasScheduledForDeletion !== null) {
                if (!$this->detalleVentasScheduledForDeletion->isEmpty()) {
                    foreach ($this->detalleVentasScheduledForDeletion as $detalleVenta) {
                        // need to save related object because we set the relation to null
                        $detalleVenta->save($con);
                    }
                    $this->detalleVentasScheduledForDeletion = null;
                }
            }

            if ($this->collDetalleVentas !== null) {
                foreach ($this->collDetalleVentas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = VentaPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . VentaPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(VentaPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(VentaPeer::FECHA)) {
            $modifiedColumns[':p' . $index++]  = '`fecha`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO_DOCUMENTADA)) {
            $modifiedColumns[':p' . $index++]  = '`total_neto_documentada`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA_DOCUMENTADA)) {
            $modifiedColumns[':p' . $index++]  = '`total_iva_documentada`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_DOCUMENTADA)) {
            $modifiedColumns[':p' . $index++]  = '`total_documentada`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO_NO_DOCUMENTADA)) {
            $modifiedColumns[':p' . $index++]  = '`total_neto_no_documentada`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA_NO_DOCUMENTADA)) {
            $modifiedColumns[':p' . $index++]  = '`total_iva_no_documentada`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_NO_DOCUMENTADA)) {
            $modifiedColumns[':p' . $index++]  = '`total_no_documentada`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO)) {
            $modifiedColumns[':p' . $index++]  = '`total_neto`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA)) {
            $modifiedColumns[':p' . $index++]  = '`total_iva`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL)) {
            $modifiedColumns[':p' . $index++]  = '`total`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO_REAL)) {
            $modifiedColumns[':p' . $index++]  = '`total_neto_real`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA_REAL)) {
            $modifiedColumns[':p' . $index++]  = '`total_iva_real`';
        }
        if ($this->isColumnModified(VentaPeer::TOTAL_REAL)) {
            $modifiedColumns[':p' . $index++]  = '`total_real`';
        }
        if ($this->isColumnModified(VentaPeer::DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = '`descripcion`';
        }
        if ($this->isColumnModified(VentaPeer::FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_creacion`';
        }
        if ($this->isColumnModified(VentaPeer::FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_modificacion`';
        }

        $sql = sprintf(
            'INSERT INTO `venta` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`fecha`':
                        $stmt->bindValue($identifier, $this->fecha, PDO::PARAM_STR);
                        break;
                    case '`total_neto_documentada`':
                        $stmt->bindValue($identifier, $this->total_neto_documentada, PDO::PARAM_STR);
                        break;
                    case '`total_iva_documentada`':
                        $stmt->bindValue($identifier, $this->total_iva_documentada, PDO::PARAM_STR);
                        break;
                    case '`total_documentada`':
                        $stmt->bindValue($identifier, $this->total_documentada, PDO::PARAM_STR);
                        break;
                    case '`total_neto_no_documentada`':
                        $stmt->bindValue($identifier, $this->total_neto_no_documentada, PDO::PARAM_STR);
                        break;
                    case '`total_iva_no_documentada`':
                        $stmt->bindValue($identifier, $this->total_iva_no_documentada, PDO::PARAM_STR);
                        break;
                    case '`total_no_documentada`':
                        $stmt->bindValue($identifier, $this->total_no_documentada, PDO::PARAM_STR);
                        break;
                    case '`total_neto`':
                        $stmt->bindValue($identifier, $this->total_neto, PDO::PARAM_STR);
                        break;
                    case '`total_iva`':
                        $stmt->bindValue($identifier, $this->total_iva, PDO::PARAM_STR);
                        break;
                    case '`total`':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case '`total_neto_real`':
                        $stmt->bindValue($identifier, $this->total_neto_real, PDO::PARAM_STR);
                        break;
                    case '`total_iva_real`':
                        $stmt->bindValue($identifier, $this->total_iva_real, PDO::PARAM_STR);
                        break;
                    case '`total_real`':
                        $stmt->bindValue($identifier, $this->total_real, PDO::PARAM_STR);
                        break;
                    case '`descripcion`':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case '`fecha_creacion`':
                        $stmt->bindValue($identifier, $this->fecha_creacion, PDO::PARAM_STR);
                        break;
                    case '`fecha_modificacion`':
                        $stmt->bindValue($identifier, $this->fecha_modificacion, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = VentaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDetalleVentas !== null) {
                    foreach ($this->collDetalleVentas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = VentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getFecha();
                break;
            case 2:
                return $this->getTotalNetoDocumentada();
                break;
            case 3:
                return $this->getTotalIvaDocumentada();
                break;
            case 4:
                return $this->getTotalDocumentada();
                break;
            case 5:
                return $this->getTotalNetoNoDocumentada();
                break;
            case 6:
                return $this->getTotalIvaNoDocumentada();
                break;
            case 7:
                return $this->getTotalNoDocumentada();
                break;
            case 8:
                return $this->getTotalNeto();
                break;
            case 9:
                return $this->getTotalIva();
                break;
            case 10:
                return $this->getTotal();
                break;
            case 11:
                return $this->getTotalNetoReal();
                break;
            case 12:
                return $this->getTotalIvaReal();
                break;
            case 13:
                return $this->getTotalReal();
                break;
            case 14:
                return $this->getDescripcion();
                break;
            case 15:
                return $this->getFechaCreacion();
                break;
            case 16:
                return $this->getFechaModificacion();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Venta'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Venta'][$this->getPrimaryKey()] = true;
        $keys = VentaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFecha(),
            $keys[2] => $this->getTotalNetoDocumentada(),
            $keys[3] => $this->getTotalIvaDocumentada(),
            $keys[4] => $this->getTotalDocumentada(),
            $keys[5] => $this->getTotalNetoNoDocumentada(),
            $keys[6] => $this->getTotalIvaNoDocumentada(),
            $keys[7] => $this->getTotalNoDocumentada(),
            $keys[8] => $this->getTotalNeto(),
            $keys[9] => $this->getTotalIva(),
            $keys[10] => $this->getTotal(),
            $keys[11] => $this->getTotalNetoReal(),
            $keys[12] => $this->getTotalIvaReal(),
            $keys[13] => $this->getTotalReal(),
            $keys[14] => $this->getDescripcion(),
            $keys[15] => $this->getFechaCreacion(),
            $keys[16] => $this->getFechaModificacion(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collDetalleVentas) {
                $result['DetalleVentas'] = $this->collDetalleVentas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = VentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setFecha($value);
                break;
            case 2:
                $this->setTotalNetoDocumentada($value);
                break;
            case 3:
                $this->setTotalIvaDocumentada($value);
                break;
            case 4:
                $this->setTotalDocumentada($value);
                break;
            case 5:
                $this->setTotalNetoNoDocumentada($value);
                break;
            case 6:
                $this->setTotalIvaNoDocumentada($value);
                break;
            case 7:
                $this->setTotalNoDocumentada($value);
                break;
            case 8:
                $this->setTotalNeto($value);
                break;
            case 9:
                $this->setTotalIva($value);
                break;
            case 10:
                $this->setTotal($value);
                break;
            case 11:
                $this->setTotalNetoReal($value);
                break;
            case 12:
                $this->setTotalIvaReal($value);
                break;
            case 13:
                $this->setTotalReal($value);
                break;
            case 14:
                $this->setDescripcion($value);
                break;
            case 15:
                $this->setFechaCreacion($value);
                break;
            case 16:
                $this->setFechaModificacion($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = VentaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTotalNetoDocumentada($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTotalIvaDocumentada($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTotalDocumentada($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTotalNetoNoDocumentada($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTotalIvaNoDocumentada($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTotalNoDocumentada($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTotalNeto($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setTotalIva($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTotal($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTotalNetoReal($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTotalIvaReal($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setTotalReal($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setDescripcion($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setFechaCreacion($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setFechaModificacion($arr[$keys[16]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(VentaPeer::DATABASE_NAME);

        if ($this->isColumnModified(VentaPeer::ID)) $criteria->add(VentaPeer::ID, $this->id);
        if ($this->isColumnModified(VentaPeer::FECHA)) $criteria->add(VentaPeer::FECHA, $this->fecha);
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO_DOCUMENTADA)) $criteria->add(VentaPeer::TOTAL_NETO_DOCUMENTADA, $this->total_neto_documentada);
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA_DOCUMENTADA)) $criteria->add(VentaPeer::TOTAL_IVA_DOCUMENTADA, $this->total_iva_documentada);
        if ($this->isColumnModified(VentaPeer::TOTAL_DOCUMENTADA)) $criteria->add(VentaPeer::TOTAL_DOCUMENTADA, $this->total_documentada);
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO_NO_DOCUMENTADA)) $criteria->add(VentaPeer::TOTAL_NETO_NO_DOCUMENTADA, $this->total_neto_no_documentada);
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA_NO_DOCUMENTADA)) $criteria->add(VentaPeer::TOTAL_IVA_NO_DOCUMENTADA, $this->total_iva_no_documentada);
        if ($this->isColumnModified(VentaPeer::TOTAL_NO_DOCUMENTADA)) $criteria->add(VentaPeer::TOTAL_NO_DOCUMENTADA, $this->total_no_documentada);
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO)) $criteria->add(VentaPeer::TOTAL_NETO, $this->total_neto);
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA)) $criteria->add(VentaPeer::TOTAL_IVA, $this->total_iva);
        if ($this->isColumnModified(VentaPeer::TOTAL)) $criteria->add(VentaPeer::TOTAL, $this->total);
        if ($this->isColumnModified(VentaPeer::TOTAL_NETO_REAL)) $criteria->add(VentaPeer::TOTAL_NETO_REAL, $this->total_neto_real);
        if ($this->isColumnModified(VentaPeer::TOTAL_IVA_REAL)) $criteria->add(VentaPeer::TOTAL_IVA_REAL, $this->total_iva_real);
        if ($this->isColumnModified(VentaPeer::TOTAL_REAL)) $criteria->add(VentaPeer::TOTAL_REAL, $this->total_real);
        if ($this->isColumnModified(VentaPeer::DESCRIPCION)) $criteria->add(VentaPeer::DESCRIPCION, $this->descripcion);
        if ($this->isColumnModified(VentaPeer::FECHA_CREACION)) $criteria->add(VentaPeer::FECHA_CREACION, $this->fecha_creacion);
        if ($this->isColumnModified(VentaPeer::FECHA_MODIFICACION)) $criteria->add(VentaPeer::FECHA_MODIFICACION, $this->fecha_modificacion);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(VentaPeer::DATABASE_NAME);
        $criteria->add(VentaPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Venta (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFecha($this->getFecha());
        $copyObj->setTotalNetoDocumentada($this->getTotalNetoDocumentada());
        $copyObj->setTotalIvaDocumentada($this->getTotalIvaDocumentada());
        $copyObj->setTotalDocumentada($this->getTotalDocumentada());
        $copyObj->setTotalNetoNoDocumentada($this->getTotalNetoNoDocumentada());
        $copyObj->setTotalIvaNoDocumentada($this->getTotalIvaNoDocumentada());
        $copyObj->setTotalNoDocumentada($this->getTotalNoDocumentada());
        $copyObj->setTotalNeto($this->getTotalNeto());
        $copyObj->setTotalIva($this->getTotalIva());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotalNetoReal($this->getTotalNetoReal());
        $copyObj->setTotalIvaReal($this->getTotalIvaReal());
        $copyObj->setTotalReal($this->getTotalReal());
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setFechaCreacion($this->getFechaCreacion());
        $copyObj->setFechaModificacion($this->getFechaModificacion());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDetalleVentas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDetalleVenta($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Venta Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return VentaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new VentaPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('DetalleVenta' == $relationName) {
            $this->initDetalleVentas();
        }
    }

    /**
     * Clears out the collDetalleVentas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Venta The current object (for fluent API support)
     * @see        addDetalleVentas()
     */
    public function clearDetalleVentas()
    {
        $this->collDetalleVentas = null; // important to set this to null since that means it is uninitialized
        $this->collDetalleVentasPartial = null;

        return $this;
    }

    /**
     * reset is the collDetalleVentas collection loaded partially
     *
     * @return void
     */
    public function resetPartialDetalleVentas($v = true)
    {
        $this->collDetalleVentasPartial = $v;
    }

    /**
     * Initializes the collDetalleVentas collection.
     *
     * By default this just sets the collDetalleVentas collection to an empty array (like clearcollDetalleVentas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDetalleVentas($overrideExisting = true)
    {
        if (null !== $this->collDetalleVentas && !$overrideExisting) {
            return;
        }
        $this->collDetalleVentas = new PropelObjectCollection();
        $this->collDetalleVentas->setModel('DetalleVenta');
    }

    /**
     * Gets an array of DetalleVenta objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Venta is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|DetalleVenta[] List of DetalleVenta objects
     * @throws PropelException
     */
    public function getDetalleVentas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDetalleVentasPartial && !$this->isNew();
        if (null === $this->collDetalleVentas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDetalleVentas) {
                // return empty collection
                $this->initDetalleVentas();
            } else {
                $collDetalleVentas = DetalleVentaQuery::create(null, $criteria)
                    ->filterByVenta($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDetalleVentasPartial && count($collDetalleVentas)) {
                      $this->initDetalleVentas(false);

                      foreach($collDetalleVentas as $obj) {
                        if (false == $this->collDetalleVentas->contains($obj)) {
                          $this->collDetalleVentas->append($obj);
                        }
                      }

                      $this->collDetalleVentasPartial = true;
                    }

                    $collDetalleVentas->getInternalIterator()->rewind();
                    return $collDetalleVentas;
                }

                if($partial && $this->collDetalleVentas) {
                    foreach($this->collDetalleVentas as $obj) {
                        if($obj->isNew()) {
                            $collDetalleVentas[] = $obj;
                        }
                    }
                }

                $this->collDetalleVentas = $collDetalleVentas;
                $this->collDetalleVentasPartial = false;
            }
        }

        return $this->collDetalleVentas;
    }

    /**
     * Sets a collection of DetalleVenta objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $detalleVentas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Venta The current object (for fluent API support)
     */
    public function setDetalleVentas(PropelCollection $detalleVentas, PropelPDO $con = null)
    {
        $detalleVentasToDelete = $this->getDetalleVentas(new Criteria(), $con)->diff($detalleVentas);


        $this->detalleVentasScheduledForDeletion = $detalleVentasToDelete;

        foreach ($detalleVentasToDelete as $detalleVentaRemoved) {
            $detalleVentaRemoved->setVenta(null);
        }

        $this->collDetalleVentas = null;
        foreach ($detalleVentas as $detalleVenta) {
            $this->addDetalleVenta($detalleVenta);
        }

        $this->collDetalleVentas = $detalleVentas;
        $this->collDetalleVentasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DetalleVenta objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related DetalleVenta objects.
     * @throws PropelException
     */
    public function countDetalleVentas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDetalleVentasPartial && !$this->isNew();
        if (null === $this->collDetalleVentas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDetalleVentas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDetalleVentas());
            }
            $query = DetalleVentaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByVenta($this)
                ->count($con);
        }

        return count($this->collDetalleVentas);
    }

    /**
     * Method called to associate a DetalleVenta object to this object
     * through the DetalleVenta foreign key attribute.
     *
     * @param    DetalleVenta $l DetalleVenta
     * @return Venta The current object (for fluent API support)
     */
    public function addDetalleVenta(DetalleVenta $l)
    {
        if ($this->collDetalleVentas === null) {
            $this->initDetalleVentas();
            $this->collDetalleVentasPartial = true;
        }
        if (!in_array($l, $this->collDetalleVentas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDetalleVenta($l);
        }

        return $this;
    }

    /**
     * @param	DetalleVenta $detalleVenta The detalleVenta object to add.
     */
    protected function doAddDetalleVenta($detalleVenta)
    {
        $this->collDetalleVentas[]= $detalleVenta;
        $detalleVenta->setVenta($this);
    }

    /**
     * @param	DetalleVenta $detalleVenta The detalleVenta object to remove.
     * @return Venta The current object (for fluent API support)
     */
    public function removeDetalleVenta($detalleVenta)
    {
        if ($this->getDetalleVentas()->contains($detalleVenta)) {
            $this->collDetalleVentas->remove($this->collDetalleVentas->search($detalleVenta));
            if (null === $this->detalleVentasScheduledForDeletion) {
                $this->detalleVentasScheduledForDeletion = clone $this->collDetalleVentas;
                $this->detalleVentasScheduledForDeletion->clear();
            }
            $this->detalleVentasScheduledForDeletion[]= clone $detalleVenta;
            $detalleVenta->setVenta(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Venta is new, it will return
     * an empty collection; or if this Venta has previously
     * been saved, it will retrieve related DetalleVentas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Venta.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|DetalleVenta[] List of DetalleVenta objects
     */
    public function getDetalleVentasJoinVentaForma($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DetalleVentaQuery::create(null, $criteria);
        $query->joinWith('VentaForma', $join_behavior);

        return $this->getDetalleVentas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Venta is new, it will return
     * an empty collection; or if this Venta has previously
     * been saved, it will retrieve related DetalleVentas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Venta.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|DetalleVenta[] List of DetalleVenta objects
     */
    public function getDetalleVentasJoinLugarVenta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DetalleVentaQuery::create(null, $criteria);
        $query->joinWith('LugarVenta', $join_behavior);

        return $this->getDetalleVentas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Venta is new, it will return
     * an empty collection; or if this Venta has previously
     * been saved, it will retrieve related DetalleVentas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Venta.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|DetalleVenta[] List of DetalleVenta objects
     */
    public function getDetalleVentasJoinFormaPago($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DetalleVentaQuery::create(null, $criteria);
        $query->joinWith('FormaPago', $join_behavior);

        return $this->getDetalleVentas($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->fecha = null;
        $this->total_neto_documentada = null;
        $this->total_iva_documentada = null;
        $this->total_documentada = null;
        $this->total_neto_no_documentada = null;
        $this->total_iva_no_documentada = null;
        $this->total_no_documentada = null;
        $this->total_neto = null;
        $this->total_iva = null;
        $this->total = null;
        $this->total_neto_real = null;
        $this->total_iva_real = null;
        $this->total_real = null;
        $this->descripcion = null;
        $this->fecha_creacion = null;
        $this->fecha_modificacion = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collDetalleVentas) {
                foreach ($this->collDetalleVentas as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDetalleVentas instanceof PropelCollection) {
            $this->collDetalleVentas->clearIterator();
        }
        $this->collDetalleVentas = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(VentaPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     Venta The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = VentaPeer::FECHA_MODIFICACION;

        return $this;
    }

}
