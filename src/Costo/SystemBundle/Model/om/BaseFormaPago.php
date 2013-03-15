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
use Costo\SystemBundle\Model\FormaPago;
use Costo\SystemBundle\Model\FormaPagoPeer;
use Costo\SystemBundle\Model\FormaPagoQuery;

/**
 * Base class that represents a row from the 'forma_pago' table.
 *
 *
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseFormaPago extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Costo\\SystemBundle\\Model\\FormaPagoPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        FormaPagoPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_forma_pago field.
     * @var        int
     */
    protected $id_forma_pago;

    /**
     * The value for the nombre_forma_pago field.
     * @var        string
     */
    protected $nombre_forma_pago;

    /**
     * The value for the descripcion_forma_pago field.
     * @var        string
     */
    protected $descripcion_forma_pago;

    /**
     * The value for the fecha_creacion_forma_pago field.
     * @var        string
     */
    protected $fecha_creacion_forma_pago;

    /**
     * The value for the fecha_modificacion_forma_pago field.
     * @var        string
     */
    protected $fecha_modificacion_forma_pago;

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
     * Get the [id_forma_pago] column value.
     *
     * @return int
     */
    public function getIdFormaPago()
    {
        return $this->id_forma_pago;
    }

    /**
     * Get the [nombre_forma_pago] column value.
     *
     * @return string
     */
    public function getNombreFormaPago()
    {
        return $this->nombre_forma_pago;
    }

    /**
     * Get the [descripcion_forma_pago] column value.
     *
     * @return string
     */
    public function getDescripcionFormaPago()
    {
        return $this->descripcion_forma_pago;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_creacion_forma_pago] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaCreacionFormaPago($format = null)
    {
        if ($this->fecha_creacion_forma_pago === null) {
            return null;
        }

        if ($this->fecha_creacion_forma_pago === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_creacion_forma_pago);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_creacion_forma_pago, true), $x);
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
     * Get the [optionally formatted] temporal [fecha_modificacion_forma_pago] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaModificacionFormaPago($format = null)
    {
        if ($this->fecha_modificacion_forma_pago === null) {
            return null;
        }

        if ($this->fecha_modificacion_forma_pago === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_modificacion_forma_pago);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_modificacion_forma_pago, true), $x);
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
     * Set the value of [id_forma_pago] column.
     *
     * @param int $v new value
     * @return FormaPago The current object (for fluent API support)
     */
    public function setIdFormaPago($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_forma_pago !== $v) {
            $this->id_forma_pago = $v;
            $this->modifiedColumns[] = FormaPagoPeer::ID_FORMA_PAGO;
        }


        return $this;
    } // setIdFormaPago()

    /**
     * Set the value of [nombre_forma_pago] column.
     *
     * @param string $v new value
     * @return FormaPago The current object (for fluent API support)
     */
    public function setNombreFormaPago($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nombre_forma_pago !== $v) {
            $this->nombre_forma_pago = $v;
            $this->modifiedColumns[] = FormaPagoPeer::NOMBRE_FORMA_PAGO;
        }


        return $this;
    } // setNombreFormaPago()

    /**
     * Set the value of [descripcion_forma_pago] column.
     *
     * @param string $v new value
     * @return FormaPago The current object (for fluent API support)
     */
    public function setDescripcionFormaPago($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->descripcion_forma_pago !== $v) {
            $this->descripcion_forma_pago = $v;
            $this->modifiedColumns[] = FormaPagoPeer::DESCRIPCION_FORMA_PAGO;
        }


        return $this;
    } // setDescripcionFormaPago()

    /**
     * Sets the value of [fecha_creacion_forma_pago] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return FormaPago The current object (for fluent API support)
     */
    public function setFechaCreacionFormaPago($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_creacion_forma_pago !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_creacion_forma_pago !== null && $tmpDt = new DateTime($this->fecha_creacion_forma_pago)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_creacion_forma_pago = $newDateAsString;
                $this->modifiedColumns[] = FormaPagoPeer::FECHA_CREACION_FORMA_PAGO;
            }
        } // if either are not null


        return $this;
    } // setFechaCreacionFormaPago()

    /**
     * Sets the value of [fecha_modificacion_forma_pago] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return FormaPago The current object (for fluent API support)
     */
    public function setFechaModificacionFormaPago($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_modificacion_forma_pago !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_modificacion_forma_pago !== null && $tmpDt = new DateTime($this->fecha_modificacion_forma_pago)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_modificacion_forma_pago = $newDateAsString;
                $this->modifiedColumns[] = FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO;
            }
        } // if either are not null


        return $this;
    } // setFechaModificacionFormaPago()

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

            $this->id_forma_pago = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nombre_forma_pago = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->descripcion_forma_pago = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->fecha_creacion_forma_pago = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->fecha_modificacion_forma_pago = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = FormaPagoPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating FormaPago object", $e);
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
            $con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = FormaPagoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = FormaPagoQuery::create()
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
            $con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO)) {
                    $this->setFechaCreacionFormaPago(time());
                }
                if (!$this->isColumnModified(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO)) {
                    $this->setFechaModificacionFormaPago(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO)) {
                    $this->setFechaModificacionFormaPago(time());
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
                FormaPagoPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = FormaPagoPeer::ID_FORMA_PAGO;
        if (null !== $this->id_forma_pago) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FormaPagoPeer::ID_FORMA_PAGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FormaPagoPeer::ID_FORMA_PAGO)) {
            $modifiedColumns[':p' . $index++]  = '`id_forma_pago`';
        }
        if ($this->isColumnModified(FormaPagoPeer::NOMBRE_FORMA_PAGO)) {
            $modifiedColumns[':p' . $index++]  = '`nombre_forma_pago`';
        }
        if ($this->isColumnModified(FormaPagoPeer::DESCRIPCION_FORMA_PAGO)) {
            $modifiedColumns[':p' . $index++]  = '`descripcion_forma_pago`';
        }
        if ($this->isColumnModified(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_creacion_forma_pago`';
        }
        if ($this->isColumnModified(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_modificacion_forma_pago`';
        }

        $sql = sprintf(
            'INSERT INTO `forma_pago` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_forma_pago`':
                        $stmt->bindValue($identifier, $this->id_forma_pago, PDO::PARAM_INT);
                        break;
                    case '`nombre_forma_pago`':
                        $stmt->bindValue($identifier, $this->nombre_forma_pago, PDO::PARAM_STR);
                        break;
                    case '`descripcion_forma_pago`':
                        $stmt->bindValue($identifier, $this->descripcion_forma_pago, PDO::PARAM_STR);
                        break;
                    case '`fecha_creacion_forma_pago`':
                        $stmt->bindValue($identifier, $this->fecha_creacion_forma_pago, PDO::PARAM_STR);
                        break;
                    case '`fecha_modificacion_forma_pago`':
                        $stmt->bindValue($identifier, $this->fecha_modificacion_forma_pago, PDO::PARAM_STR);
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
        $this->setIdFormaPago($pk);

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


            if (($retval = FormaPagoPeer::doValidate($this, $columns)) !== true) {
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
        $pos = FormaPagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdFormaPago();
                break;
            case 1:
                return $this->getNombreFormaPago();
                break;
            case 2:
                return $this->getDescripcionFormaPago();
                break;
            case 3:
                return $this->getFechaCreacionFormaPago();
                break;
            case 4:
                return $this->getFechaModificacionFormaPago();
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
        if (isset($alreadyDumpedObjects['FormaPago'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['FormaPago'][$this->getPrimaryKey()] = true;
        $keys = FormaPagoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdFormaPago(),
            $keys[1] => $this->getNombreFormaPago(),
            $keys[2] => $this->getDescripcionFormaPago(),
            $keys[3] => $this->getFechaCreacionFormaPago(),
            $keys[4] => $this->getFechaModificacionFormaPago(),
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
        $pos = FormaPagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdFormaPago($value);
                break;
            case 1:
                $this->setNombreFormaPago($value);
                break;
            case 2:
                $this->setDescripcionFormaPago($value);
                break;
            case 3:
                $this->setFechaCreacionFormaPago($value);
                break;
            case 4:
                $this->setFechaModificacionFormaPago($value);
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
        $keys = FormaPagoPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdFormaPago($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNombreFormaPago($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescripcionFormaPago($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFechaCreacionFormaPago($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFechaModificacionFormaPago($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(FormaPagoPeer::DATABASE_NAME);

        if ($this->isColumnModified(FormaPagoPeer::ID_FORMA_PAGO)) $criteria->add(FormaPagoPeer::ID_FORMA_PAGO, $this->id_forma_pago);
        if ($this->isColumnModified(FormaPagoPeer::NOMBRE_FORMA_PAGO)) $criteria->add(FormaPagoPeer::NOMBRE_FORMA_PAGO, $this->nombre_forma_pago);
        if ($this->isColumnModified(FormaPagoPeer::DESCRIPCION_FORMA_PAGO)) $criteria->add(FormaPagoPeer::DESCRIPCION_FORMA_PAGO, $this->descripcion_forma_pago);
        if ($this->isColumnModified(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO)) $criteria->add(FormaPagoPeer::FECHA_CREACION_FORMA_PAGO, $this->fecha_creacion_forma_pago);
        if ($this->isColumnModified(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO)) $criteria->add(FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO, $this->fecha_modificacion_forma_pago);

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
        $criteria = new Criteria(FormaPagoPeer::DATABASE_NAME);
        $criteria->add(FormaPagoPeer::ID_FORMA_PAGO, $this->id_forma_pago);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdFormaPago();
    }

    /**
     * Generic method to set the primary key (id_forma_pago column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdFormaPago($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdFormaPago();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of FormaPago (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombreFormaPago($this->getNombreFormaPago());
        $copyObj->setDescripcionFormaPago($this->getDescripcionFormaPago());
        $copyObj->setFechaCreacionFormaPago($this->getFechaCreacionFormaPago());
        $copyObj->setFechaModificacionFormaPago($this->getFechaModificacionFormaPago());

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
            $copyObj->setIdFormaPago(NULL); // this is a auto-increment column, so set to default value
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
     * @return FormaPago Clone of current object.
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
     * @return FormaPagoPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new FormaPagoPeer();
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
     * @return FormaPago The current object (for fluent API support)
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
     * If this FormaPago is new, it will return
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
                    ->filterByFormaPago($this)
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
     * @return FormaPago The current object (for fluent API support)
     */
    public function setDetalleVentas(PropelCollection $detalleVentas, PropelPDO $con = null)
    {
        $detalleVentasToDelete = $this->getDetalleVentas(new Criteria(), $con)->diff($detalleVentas);


        $this->detalleVentasScheduledForDeletion = $detalleVentasToDelete;

        foreach ($detalleVentasToDelete as $detalleVentaRemoved) {
            $detalleVentaRemoved->setFormaPago(null);
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
                ->filterByFormaPago($this)
                ->count($con);
        }

        return count($this->collDetalleVentas);
    }

    /**
     * Method called to associate a DetalleVenta object to this object
     * through the DetalleVenta foreign key attribute.
     *
     * @param    DetalleVenta $l DetalleVenta
     * @return FormaPago The current object (for fluent API support)
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
        $detalleVenta->setFormaPago($this);
    }

    /**
     * @param	DetalleVenta $detalleVenta The detalleVenta object to remove.
     * @return FormaPago The current object (for fluent API support)
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
            $detalleVenta->setFormaPago(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this FormaPago is new, it will return
     * an empty collection; or if this FormaPago has previously
     * been saved, it will retrieve related DetalleVentas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in FormaPago.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|DetalleVenta[] List of DetalleVenta objects
     */
    public function getDetalleVentasJoinVenta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DetalleVentaQuery::create(null, $criteria);
        $query->joinWith('Venta', $join_behavior);

        return $this->getDetalleVentas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this FormaPago is new, it will return
     * an empty collection; or if this FormaPago has previously
     * been saved, it will retrieve related DetalleVentas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in FormaPago.
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
     * Otherwise if this FormaPago is new, it will return
     * an empty collection; or if this FormaPago has previously
     * been saved, it will retrieve related DetalleVentas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in FormaPago.
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_forma_pago = null;
        $this->nombre_forma_pago = null;
        $this->descripcion_forma_pago = null;
        $this->fecha_creacion_forma_pago = null;
        $this->fecha_modificacion_forma_pago = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
        return (string) $this->exportTo(FormaPagoPeer::DEFAULT_STRING_FORMAT);
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
     * @return     FormaPago The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = FormaPagoPeer::FECHA_MODIFICACION_FORMA_PAGO;

        return $this;
    }

}
