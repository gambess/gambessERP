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
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use Costo\SystemBundle\Model\DetalleVenta;
use Costo\SystemBundle\Model\DetalleVentaPeer;
use Costo\SystemBundle\Model\DetalleVentaQuery;
use Costo\SystemBundle\Model\FormaPago;
use Costo\SystemBundle\Model\FormaPagoQuery;
use Costo\SystemBundle\Model\LugarVenta;
use Costo\SystemBundle\Model\LugarVentaQuery;
use Costo\SystemBundle\Model\VentaForma;
use Costo\SystemBundle\Model\VentaFormaQuery;

/**
 * Base class that represents a row from the 'detalle_venta' table.
 *
 *
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseDetalleVenta extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Costo\\SystemBundle\\Model\\DetalleVentaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DetalleVentaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_detalle field.
     * @var        int
     */
    protected $id_detalle;

    /**
     * The value for the id_venta_forma field.
     * @var        int
     */
    protected $id_venta_forma;

    /**
     * The value for the id_lugar_venta field.
     * @var        int
     */
    protected $id_lugar_venta;

    /**
     * The value for the id_forma_pago field.
     * @var        int
     */
    protected $id_forma_pago;

    /**
     * The value for the fecha_venta field.
     * @var        string
     */
    protected $fecha_venta;

    /**
     * The value for the total_neto_venta field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_neto_venta;

    /**
     * The value for the total_iva_venta field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_iva_venta;

    /**
     * The value for the total_venta field.
     * Note: this column has a database default value of: 0
     * @var        double
     */
    protected $total_venta;

    /**
     * The value for the descripcion_venta field.
     * @var        string
     */
    protected $descripcion_venta;

    /**
     * The value for the fecha_creacion_detalle field.
     * @var        string
     */
    protected $fecha_creacion_detalle;

    /**
     * The value for the fecha_modificacion_detalle field.
     * @var        string
     */
    protected $fecha_modificacion_detalle;

    /**
     * @var        VentaForma
     */
    protected $aVentaForma;

    /**
     * @var        LugarVenta
     */
    protected $aLugarVenta;

    /**
     * @var        FormaPago
     */
    protected $aFormaPago;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->total_neto_venta = 0;
        $this->total_iva_venta = 0;
        $this->total_venta = 0;
    }

    /**
     * Initializes internal state of BaseDetalleVenta object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_detalle] column value.
     *
     * @return int
     */
    public function getIdDetalle()
    {
        return $this->id_detalle;
    }

    /**
     * Get the [id_venta_forma] column value.
     *
     * @return int
     */
    public function getIdVentaForma()
    {
        return $this->id_venta_forma;
    }

    /**
     * Get the [id_lugar_venta] column value.
     *
     * @return int
     */
    public function getIdLugarVenta()
    {
        return $this->id_lugar_venta;
    }

    /**
     * Get the [id_forma_pago] column value.
     *
     * @return int
     */
    public function getIdFormaPago()
    {
        return $this->id_forma_pago;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_venta] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaVenta($format = null)
    {
        if ($this->fecha_venta === null) {
            return null;
        }

        if ($this->fecha_venta === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_venta);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_venta, true), $x);
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
     * Get the [total_neto_venta] column value.
     *
     * @return double
     */
    public function getTotalNetoVenta()
    {
        return $this->total_neto_venta;
    }

    /**
     * Get the [total_iva_venta] column value.
     *
     * @return double
     */
    public function getTotalIvaVenta()
    {
        return $this->total_iva_venta;
    }

    /**
     * Get the [total_venta] column value.
     *
     * @return double
     */
    public function getTotalVenta()
    {
        return $this->total_venta;
    }

    /**
     * Get the [descripcion_venta] column value.
     *
     * @return string
     */
    public function getDescripcionVenta()
    {
        return $this->descripcion_venta;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_creacion_detalle] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaCreacionDetalle($format = null)
    {
        if ($this->fecha_creacion_detalle === null) {
            return null;
        }

        if ($this->fecha_creacion_detalle === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_creacion_detalle);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_creacion_detalle, true), $x);
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
     * Get the [optionally formatted] temporal [fecha_modificacion_detalle] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaModificacionDetalle($format = null)
    {
        if ($this->fecha_modificacion_detalle === null) {
            return null;
        }

        if ($this->fecha_modificacion_detalle === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_modificacion_detalle);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_modificacion_detalle, true), $x);
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
     * Set the value of [id_detalle] column.
     *
     * @param int $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setIdDetalle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_detalle !== $v) {
            $this->id_detalle = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::ID_DETALLE;
        }


        return $this;
    } // setIdDetalle()

    /**
     * Set the value of [id_venta_forma] column.
     *
     * @param int $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setIdVentaForma($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_venta_forma !== $v) {
            $this->id_venta_forma = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::ID_VENTA_FORMA;
        }

        if ($this->aVentaForma !== null && $this->aVentaForma->getIdVentaForma() !== $v) {
            $this->aVentaForma = null;
        }


        return $this;
    } // setIdVentaForma()

    /**
     * Set the value of [id_lugar_venta] column.
     *
     * @param int $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setIdLugarVenta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_lugar_venta !== $v) {
            $this->id_lugar_venta = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::ID_LUGAR_VENTA;
        }

        if ($this->aLugarVenta !== null && $this->aLugarVenta->getIdLugarVenta() !== $v) {
            $this->aLugarVenta = null;
        }


        return $this;
    } // setIdLugarVenta()

    /**
     * Set the value of [id_forma_pago] column.
     *
     * @param int $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setIdFormaPago($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_forma_pago !== $v) {
            $this->id_forma_pago = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::ID_FORMA_PAGO;
        }

        if ($this->aFormaPago !== null && $this->aFormaPago->getIdFormaPago() !== $v) {
            $this->aFormaPago = null;
        }


        return $this;
    } // setIdFormaPago()

    /**
     * Sets the value of [fecha_venta] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setFechaVenta($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_venta !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_venta !== null && $tmpDt = new DateTime($this->fecha_venta)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_venta = $newDateAsString;
                $this->modifiedColumns[] = DetalleVentaPeer::FECHA_VENTA;
            }
        } // if either are not null


        return $this;
    } // setFechaVenta()

    /**
     * Set the value of [total_neto_venta] column.
     *
     * @param double $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setTotalNetoVenta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_neto_venta !== $v) {
            $this->total_neto_venta = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::TOTAL_NETO_VENTA;
        }


        return $this;
    } // setTotalNetoVenta()

    /**
     * Set the value of [total_iva_venta] column.
     *
     * @param double $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setTotalIvaVenta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_iva_venta !== $v) {
            $this->total_iva_venta = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::TOTAL_IVA_VENTA;
        }


        return $this;
    } // setTotalIvaVenta()

    /**
     * Set the value of [total_venta] column.
     *
     * @param double $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setTotalVenta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->total_venta !== $v) {
            $this->total_venta = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::TOTAL_VENTA;
        }


        return $this;
    } // setTotalVenta()

    /**
     * Set the value of [descripcion_venta] column.
     *
     * @param string $v new value
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setDescripcionVenta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->descripcion_venta !== $v) {
            $this->descripcion_venta = $v;
            $this->modifiedColumns[] = DetalleVentaPeer::DESCRIPCION_VENTA;
        }


        return $this;
    } // setDescripcionVenta()

    /**
     * Sets the value of [fecha_creacion_detalle] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setFechaCreacionDetalle($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_creacion_detalle !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_creacion_detalle !== null && $tmpDt = new DateTime($this->fecha_creacion_detalle)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_creacion_detalle = $newDateAsString;
                $this->modifiedColumns[] = DetalleVentaPeer::FECHA_CREACION_DETALLE;
            }
        } // if either are not null


        return $this;
    } // setFechaCreacionDetalle()

    /**
     * Sets the value of [fecha_modificacion_detalle] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return DetalleVenta The current object (for fluent API support)
     */
    public function setFechaModificacionDetalle($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_modificacion_detalle !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_modificacion_detalle !== null && $tmpDt = new DateTime($this->fecha_modificacion_detalle)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_modificacion_detalle = $newDateAsString;
                $this->modifiedColumns[] = DetalleVentaPeer::FECHA_MODIFICACION_DETALLE;
            }
        } // if either are not null


        return $this;
    } // setFechaModificacionDetalle()

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
            if ($this->total_neto_venta !== 0) {
                return false;
            }

            if ($this->total_iva_venta !== 0) {
                return false;
            }

            if ($this->total_venta !== 0) {
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

            $this->id_detalle = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->id_venta_forma = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->id_lugar_venta = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->id_forma_pago = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->fecha_venta = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->total_neto_venta = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
            $this->total_iva_venta = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
            $this->total_venta = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
            $this->descripcion_venta = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->fecha_creacion_detalle = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->fecha_modificacion_detalle = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = DetalleVentaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating DetalleVenta object", $e);
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

        if ($this->aVentaForma !== null && $this->id_venta_forma !== $this->aVentaForma->getIdVentaForma()) {
            $this->aVentaForma = null;
        }
        if ($this->aLugarVenta !== null && $this->id_lugar_venta !== $this->aLugarVenta->getIdLugarVenta()) {
            $this->aLugarVenta = null;
        }
        if ($this->aFormaPago !== null && $this->id_forma_pago !== $this->aFormaPago->getIdFormaPago()) {
            $this->aFormaPago = null;
        }
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
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DetalleVentaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aVentaForma = null;
            $this->aLugarVenta = null;
            $this->aFormaPago = null;
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
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DetalleVentaQuery::create()
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
            $con = Propel::getConnection(DetalleVentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(DetalleVentaPeer::FECHA_CREACION_DETALLE)) {
                    $this->setFechaCreacionDetalle(time());
                }
                if (!$this->isColumnModified(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE)) {
                    $this->setFechaModificacionDetalle(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE)) {
                    $this->setFechaModificacionDetalle(time());
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
                DetalleVentaPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aVentaForma !== null) {
                if ($this->aVentaForma->isModified() || $this->aVentaForma->isNew()) {
                    $affectedRows += $this->aVentaForma->save($con);
                }
                $this->setVentaForma($this->aVentaForma);
            }

            if ($this->aLugarVenta !== null) {
                if ($this->aLugarVenta->isModified() || $this->aLugarVenta->isNew()) {
                    $affectedRows += $this->aLugarVenta->save($con);
                }
                $this->setLugarVenta($this->aLugarVenta);
            }

            if ($this->aFormaPago !== null) {
                if ($this->aFormaPago->isModified() || $this->aFormaPago->isNew()) {
                    $affectedRows += $this->aFormaPago->save($con);
                }
                $this->setFormaPago($this->aFormaPago);
            }

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

        $this->modifiedColumns[] = DetalleVentaPeer::ID_DETALLE;
        if (null !== $this->id_detalle) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DetalleVentaPeer::ID_DETALLE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DetalleVentaPeer::ID_DETALLE)) {
            $modifiedColumns[':p' . $index++]  = '`id_detalle`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::ID_VENTA_FORMA)) {
            $modifiedColumns[':p' . $index++]  = '`id_venta_forma`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::ID_LUGAR_VENTA)) {
            $modifiedColumns[':p' . $index++]  = '`id_lugar_venta`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::ID_FORMA_PAGO)) {
            $modifiedColumns[':p' . $index++]  = '`id_forma_pago`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::FECHA_VENTA)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_venta`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::TOTAL_NETO_VENTA)) {
            $modifiedColumns[':p' . $index++]  = '`total_neto_venta`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::TOTAL_IVA_VENTA)) {
            $modifiedColumns[':p' . $index++]  = '`total_iva_venta`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::TOTAL_VENTA)) {
            $modifiedColumns[':p' . $index++]  = '`total_venta`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::DESCRIPCION_VENTA)) {
            $modifiedColumns[':p' . $index++]  = '`descripcion_venta`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::FECHA_CREACION_DETALLE)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_creacion_detalle`';
        }
        if ($this->isColumnModified(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_modificacion_detalle`';
        }

        $sql = sprintf(
            'INSERT INTO `detalle_venta` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_detalle`':
                        $stmt->bindValue($identifier, $this->id_detalle, PDO::PARAM_INT);
                        break;
                    case '`id_venta_forma`':
                        $stmt->bindValue($identifier, $this->id_venta_forma, PDO::PARAM_INT);
                        break;
                    case '`id_lugar_venta`':
                        $stmt->bindValue($identifier, $this->id_lugar_venta, PDO::PARAM_INT);
                        break;
                    case '`id_forma_pago`':
                        $stmt->bindValue($identifier, $this->id_forma_pago, PDO::PARAM_INT);
                        break;
                    case '`fecha_venta`':
                        $stmt->bindValue($identifier, $this->fecha_venta, PDO::PARAM_STR);
                        break;
                    case '`total_neto_venta`':
                        $stmt->bindValue($identifier, $this->total_neto_venta, PDO::PARAM_STR);
                        break;
                    case '`total_iva_venta`':
                        $stmt->bindValue($identifier, $this->total_iva_venta, PDO::PARAM_STR);
                        break;
                    case '`total_venta`':
                        $stmt->bindValue($identifier, $this->total_venta, PDO::PARAM_STR);
                        break;
                    case '`descripcion_venta`':
                        $stmt->bindValue($identifier, $this->descripcion_venta, PDO::PARAM_STR);
                        break;
                    case '`fecha_creacion_detalle`':
                        $stmt->bindValue($identifier, $this->fecha_creacion_detalle, PDO::PARAM_STR);
                        break;
                    case '`fecha_modificacion_detalle`':
                        $stmt->bindValue($identifier, $this->fecha_modificacion_detalle, PDO::PARAM_STR);
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
        $this->setIdDetalle($pk);

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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aVentaForma !== null) {
                if (!$this->aVentaForma->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aVentaForma->getValidationFailures());
                }
            }

            if ($this->aLugarVenta !== null) {
                if (!$this->aLugarVenta->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLugarVenta->getValidationFailures());
                }
            }

            if ($this->aFormaPago !== null) {
                if (!$this->aFormaPago->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFormaPago->getValidationFailures());
                }
            }


            if (($retval = DetalleVentaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = DetalleVentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdDetalle();
                break;
            case 1:
                return $this->getIdVentaForma();
                break;
            case 2:
                return $this->getIdLugarVenta();
                break;
            case 3:
                return $this->getIdFormaPago();
                break;
            case 4:
                return $this->getFechaVenta();
                break;
            case 5:
                return $this->getTotalNetoVenta();
                break;
            case 6:
                return $this->getTotalIvaVenta();
                break;
            case 7:
                return $this->getTotalVenta();
                break;
            case 8:
                return $this->getDescripcionVenta();
                break;
            case 9:
                return $this->getFechaCreacionDetalle();
                break;
            case 10:
                return $this->getFechaModificacionDetalle();
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
        if (isset($alreadyDumpedObjects['DetalleVenta'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['DetalleVenta'][$this->getPrimaryKey()] = true;
        $keys = DetalleVentaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdDetalle(),
            $keys[1] => $this->getIdVentaForma(),
            $keys[2] => $this->getIdLugarVenta(),
            $keys[3] => $this->getIdFormaPago(),
            $keys[4] => $this->getFechaVenta(),
            $keys[5] => $this->getTotalNetoVenta(),
            $keys[6] => $this->getTotalIvaVenta(),
            $keys[7] => $this->getTotalVenta(),
            $keys[8] => $this->getDescripcionVenta(),
            $keys[9] => $this->getFechaCreacionDetalle(),
            $keys[10] => $this->getFechaModificacionDetalle(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aVentaForma) {
                $result['VentaForma'] = $this->aVentaForma->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLugarVenta) {
                $result['LugarVenta'] = $this->aLugarVenta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFormaPago) {
                $result['FormaPago'] = $this->aFormaPago->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = DetalleVentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdDetalle($value);
                break;
            case 1:
                $this->setIdVentaForma($value);
                break;
            case 2:
                $this->setIdLugarVenta($value);
                break;
            case 3:
                $this->setIdFormaPago($value);
                break;
            case 4:
                $this->setFechaVenta($value);
                break;
            case 5:
                $this->setTotalNetoVenta($value);
                break;
            case 6:
                $this->setTotalIvaVenta($value);
                break;
            case 7:
                $this->setTotalVenta($value);
                break;
            case 8:
                $this->setDescripcionVenta($value);
                break;
            case 9:
                $this->setFechaCreacionDetalle($value);
                break;
            case 10:
                $this->setFechaModificacionDetalle($value);
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
        $keys = DetalleVentaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdDetalle($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdVentaForma($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdLugarVenta($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIdFormaPago($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFechaVenta($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTotalNetoVenta($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTotalIvaVenta($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTotalVenta($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDescripcionVenta($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setFechaCreacionDetalle($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setFechaModificacionDetalle($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DetalleVentaPeer::DATABASE_NAME);

        if ($this->isColumnModified(DetalleVentaPeer::ID_DETALLE)) $criteria->add(DetalleVentaPeer::ID_DETALLE, $this->id_detalle);
        if ($this->isColumnModified(DetalleVentaPeer::ID_VENTA_FORMA)) $criteria->add(DetalleVentaPeer::ID_VENTA_FORMA, $this->id_venta_forma);
        if ($this->isColumnModified(DetalleVentaPeer::ID_LUGAR_VENTA)) $criteria->add(DetalleVentaPeer::ID_LUGAR_VENTA, $this->id_lugar_venta);
        if ($this->isColumnModified(DetalleVentaPeer::ID_FORMA_PAGO)) $criteria->add(DetalleVentaPeer::ID_FORMA_PAGO, $this->id_forma_pago);
        if ($this->isColumnModified(DetalleVentaPeer::FECHA_VENTA)) $criteria->add(DetalleVentaPeer::FECHA_VENTA, $this->fecha_venta);
        if ($this->isColumnModified(DetalleVentaPeer::TOTAL_NETO_VENTA)) $criteria->add(DetalleVentaPeer::TOTAL_NETO_VENTA, $this->total_neto_venta);
        if ($this->isColumnModified(DetalleVentaPeer::TOTAL_IVA_VENTA)) $criteria->add(DetalleVentaPeer::TOTAL_IVA_VENTA, $this->total_iva_venta);
        if ($this->isColumnModified(DetalleVentaPeer::TOTAL_VENTA)) $criteria->add(DetalleVentaPeer::TOTAL_VENTA, $this->total_venta);
        if ($this->isColumnModified(DetalleVentaPeer::DESCRIPCION_VENTA)) $criteria->add(DetalleVentaPeer::DESCRIPCION_VENTA, $this->descripcion_venta);
        if ($this->isColumnModified(DetalleVentaPeer::FECHA_CREACION_DETALLE)) $criteria->add(DetalleVentaPeer::FECHA_CREACION_DETALLE, $this->fecha_creacion_detalle);
        if ($this->isColumnModified(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE)) $criteria->add(DetalleVentaPeer::FECHA_MODIFICACION_DETALLE, $this->fecha_modificacion_detalle);

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
        $criteria = new Criteria(DetalleVentaPeer::DATABASE_NAME);
        $criteria->add(DetalleVentaPeer::ID_DETALLE, $this->id_detalle);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdDetalle();
    }

    /**
     * Generic method to set the primary key (id_detalle column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdDetalle($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdDetalle();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of DetalleVenta (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdVentaForma($this->getIdVentaForma());
        $copyObj->setIdLugarVenta($this->getIdLugarVenta());
        $copyObj->setIdFormaPago($this->getIdFormaPago());
        $copyObj->setFechaVenta($this->getFechaVenta());
        $copyObj->setTotalNetoVenta($this->getTotalNetoVenta());
        $copyObj->setTotalIvaVenta($this->getTotalIvaVenta());
        $copyObj->setTotalVenta($this->getTotalVenta());
        $copyObj->setDescripcionVenta($this->getDescripcionVenta());
        $copyObj->setFechaCreacionDetalle($this->getFechaCreacionDetalle());
        $copyObj->setFechaModificacionDetalle($this->getFechaModificacionDetalle());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdDetalle(NULL); // this is a auto-increment column, so set to default value
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
     * @return DetalleVenta Clone of current object.
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
     * @return DetalleVentaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DetalleVentaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a VentaForma object.
     *
     * @param             VentaForma $v
     * @return DetalleVenta The current object (for fluent API support)
     * @throws PropelException
     */
    public function setVentaForma(VentaForma $v = null)
    {
        if ($v === null) {
            $this->setIdVentaForma(NULL);
        } else {
            $this->setIdVentaForma($v->getIdVentaForma());
        }

        $this->aVentaForma = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the VentaForma object, it will not be re-added.
        if ($v !== null) {
            $v->addDetalleVenta($this);
        }


        return $this;
    }


    /**
     * Get the associated VentaForma object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return VentaForma The associated VentaForma object.
     * @throws PropelException
     */
    public function getVentaForma(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aVentaForma === null && ($this->id_venta_forma !== null) && $doQuery) {
            $this->aVentaForma = VentaFormaQuery::create()->findPk($this->id_venta_forma, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aVentaForma->addDetalleVentas($this);
             */
        }

        return $this->aVentaForma;
    }

    /**
     * Declares an association between this object and a LugarVenta object.
     *
     * @param             LugarVenta $v
     * @return DetalleVenta The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLugarVenta(LugarVenta $v = null)
    {
        if ($v === null) {
            $this->setIdLugarVenta(NULL);
        } else {
            $this->setIdLugarVenta($v->getIdLugarVenta());
        }

        $this->aLugarVenta = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LugarVenta object, it will not be re-added.
        if ($v !== null) {
            $v->addDetalleVenta($this);
        }


        return $this;
    }


    /**
     * Get the associated LugarVenta object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LugarVenta The associated LugarVenta object.
     * @throws PropelException
     */
    public function getLugarVenta(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLugarVenta === null && ($this->id_lugar_venta !== null) && $doQuery) {
            $this->aLugarVenta = LugarVentaQuery::create()->findPk($this->id_lugar_venta, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLugarVenta->addDetalleVentas($this);
             */
        }

        return $this->aLugarVenta;
    }

    /**
     * Declares an association between this object and a FormaPago object.
     *
     * @param             FormaPago $v
     * @return DetalleVenta The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFormaPago(FormaPago $v = null)
    {
        if ($v === null) {
            $this->setIdFormaPago(NULL);
        } else {
            $this->setIdFormaPago($v->getIdFormaPago());
        }

        $this->aFormaPago = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the FormaPago object, it will not be re-added.
        if ($v !== null) {
            $v->addDetalleVenta($this);
        }


        return $this;
    }


    /**
     * Get the associated FormaPago object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return FormaPago The associated FormaPago object.
     * @throws PropelException
     */
    public function getFormaPago(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFormaPago === null && ($this->id_forma_pago !== null) && $doQuery) {
            $this->aFormaPago = FormaPagoQuery::create()->findPk($this->id_forma_pago, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFormaPago->addDetalleVentas($this);
             */
        }

        return $this->aFormaPago;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_detalle = null;
        $this->id_venta_forma = null;
        $this->id_lugar_venta = null;
        $this->id_forma_pago = null;
        $this->fecha_venta = null;
        $this->total_neto_venta = null;
        $this->total_iva_venta = null;
        $this->total_venta = null;
        $this->descripcion_venta = null;
        $this->fecha_creacion_detalle = null;
        $this->fecha_modificacion_detalle = null;
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
            if ($this->aVentaForma instanceof Persistent) {
              $this->aVentaForma->clearAllReferences($deep);
            }
            if ($this->aLugarVenta instanceof Persistent) {
              $this->aLugarVenta->clearAllReferences($deep);
            }
            if ($this->aFormaPago instanceof Persistent) {
              $this->aFormaPago->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aVentaForma = null;
        $this->aLugarVenta = null;
        $this->aFormaPago = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DetalleVentaPeer::DEFAULT_STRING_FORMAT);
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
     * @return     DetalleVenta The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = DetalleVentaPeer::FECHA_MODIFICACION_DETALLE;

        return $this;
    }

}
