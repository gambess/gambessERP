<?php

namespace Costo\SystemBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \DateTimeZone;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Costo\SystemBundle\Model\Cuenta;
use Costo\SystemBundle\Model\CuentaPeer;
use Costo\SystemBundle\Model\CuentaQuery;

/**
 * Base class that represents a row from the 'cuenta' table.
 *
 * 
 *
 * @package    propel.generator.src.Costo.SystemBundle.Model.om
 */
abstract class BaseCuenta extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'Costo\\SystemBundle\\Model\\CuentaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CuentaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_cuenta field.
     * @var        int
     */
    protected $id_cuenta;

    /**
     * The value for the nombre_cuenta field.
     * @var        string
     */
    protected $nombre_cuenta;

    /**
     * The value for the valor_cuenta field.
     * @var        double
     */
    protected $valor_cuenta;

    /**
     * The value for the tipo_cuenta field.
     * @var        string
     */
    protected $tipo_cuenta;

    /**
     * The value for the fecha_creacion_cuenta field.
     * @var        string
     */
    protected $fecha_creacion_cuenta;

    /**
     * The value for the user_crea_cuenta field.
     * @var        string
     */
    protected $user_crea_cuenta;

    /**
     * The value for the activa_cuenta field.
     * @var        boolean
     */
    protected $activa_cuenta;

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
     * Get the [id_cuenta] column value.
     * 
     * @return   int
     */
    public function getIdCuenta()
    {

        return $this->id_cuenta;
    }

    /**
     * Get the [nombre_cuenta] column value.
     * 
     * @return   string
     */
    public function getNombreCuenta()
    {

        return $this->nombre_cuenta;
    }

    /**
     * Get the [valor_cuenta] column value.
     * 
     * @return   double
     */
    public function getValorCuenta()
    {

        return $this->valor_cuenta;
    }

    /**
     * Get the [tipo_cuenta] column value.
     * 
     * @return   string
     */
    public function getTipoCuenta()
    {

        return $this->tipo_cuenta;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_creacion_cuenta] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaCreacionCuenta($format = NULL)
    {
        if ($this->fecha_creacion_cuenta === null) {
            return null;
        }


        if ($this->fecha_creacion_cuenta === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->fecha_creacion_cuenta);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_creacion_cuenta, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [user_crea_cuenta] column value.
     * 
     * @return   string
     */
    public function getUserCreaCuenta()
    {

        return $this->user_crea_cuenta;
    }

    /**
     * Get the [activa_cuenta] column value.
     * 
     * @return   boolean
     */
    public function getActivaCuenta()
    {

        return $this->activa_cuenta;
    }

    /**
     * Set the value of [id_cuenta] column.
     * 
     * @param      int $v new value
     * @return   Cuenta The current object (for fluent API support)
     */
    public function setIdCuenta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_cuenta !== $v) {
            $this->id_cuenta = $v;
            $this->modifiedColumns[] = CuentaPeer::ID_CUENTA;
        }


        return $this;
    } // setIdCuenta()

    /**
     * Set the value of [nombre_cuenta] column.
     * 
     * @param      string $v new value
     * @return   Cuenta The current object (for fluent API support)
     */
    public function setNombreCuenta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre_cuenta !== $v) {
            $this->nombre_cuenta = $v;
            $this->modifiedColumns[] = CuentaPeer::NOMBRE_CUENTA;
        }


        return $this;
    } // setNombreCuenta()

    /**
     * Set the value of [valor_cuenta] column.
     * 
     * @param      double $v new value
     * @return   Cuenta The current object (for fluent API support)
     */
    public function setValorCuenta($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->valor_cuenta !== $v) {
            $this->valor_cuenta = $v;
            $this->modifiedColumns[] = CuentaPeer::VALOR_CUENTA;
        }


        return $this;
    } // setValorCuenta()

    /**
     * Set the value of [tipo_cuenta] column.
     * 
     * @param      string $v new value
     * @return   Cuenta The current object (for fluent API support)
     */
    public function setTipoCuenta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tipo_cuenta !== $v) {
            $this->tipo_cuenta = $v;
            $this->modifiedColumns[] = CuentaPeer::TIPO_CUENTA;
        }


        return $this;
    } // setTipoCuenta()

    /**
     * Sets the value of [fecha_creacion_cuenta] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Cuenta The current object (for fluent API support)
     */
    public function setFechaCreacionCuenta($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_creacion_cuenta !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_creacion_cuenta !== null && $tmpDt = new DateTime($this->fecha_creacion_cuenta)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_creacion_cuenta = $newDateAsString;
                $this->modifiedColumns[] = CuentaPeer::FECHA_CREACION_CUENTA;
            }
        } // if either are not null


        return $this;
    } // setFechaCreacionCuenta()

    /**
     * Set the value of [user_crea_cuenta] column.
     * 
     * @param      string $v new value
     * @return   Cuenta The current object (for fluent API support)
     */
    public function setUserCreaCuenta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_crea_cuenta !== $v) {
            $this->user_crea_cuenta = $v;
            $this->modifiedColumns[] = CuentaPeer::USER_CREA_CUENTA;
        }


        return $this;
    } // setUserCreaCuenta()

    /**
     * Sets the value of the [activa_cuenta] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   Cuenta The current object (for fluent API support)
     */
    public function setActivaCuenta($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->activa_cuenta !== $v) {
            $this->activa_cuenta = $v;
            $this->modifiedColumns[] = CuentaPeer::ACTIVA_CUENTA;
        }


        return $this;
    } // setActivaCuenta()

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
        // otherwise, everything was equal, so return TRUE
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
     * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_cuenta = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nombre_cuenta = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->valor_cuenta = ($row[$startcol + 2] !== null) ? (double) $row[$startcol + 2] : null;
            $this->tipo_cuenta = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->fecha_creacion_cuenta = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->user_crea_cuenta = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->activa_cuenta = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = CuentaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Cuenta object", $e);
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
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      PropelPDO $con (optional) The PropelPDO connection to use.
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
            $con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CuentaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      PropelPDO $con
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
            $con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CuentaQuery::create()
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
     * @param      PropelPDO $con
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
            $con = Propel::getConnection(CuentaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CuentaPeer::addInstanceToPool($this);
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
     * @param      PropelPDO $con
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

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = CuentaPeer::ID_CUENTA;
        if (null !== $this->id_cuenta) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CuentaPeer::ID_CUENTA . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CuentaPeer::ID_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = '`ID_CUENTA`';
        }
        if ($this->isColumnModified(CuentaPeer::NOMBRE_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = '`NOMBRE_CUENTA`';
        }
        if ($this->isColumnModified(CuentaPeer::VALOR_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = '`VALOR_CUENTA`';
        }
        if ($this->isColumnModified(CuentaPeer::TIPO_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = '`TIPO_CUENTA`';
        }
        if ($this->isColumnModified(CuentaPeer::FECHA_CREACION_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = '`FECHA_CREACION_CUENTA`';
        }
        if ($this->isColumnModified(CuentaPeer::USER_CREA_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = '`USER_CREA_CUENTA`';
        }
        if ($this->isColumnModified(CuentaPeer::ACTIVA_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = '`ACTIVA_CUENTA`';
        }

        $sql = sprintf(
            'INSERT INTO `cuenta` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID_CUENTA`':
						$stmt->bindValue($identifier, $this->id_cuenta, PDO::PARAM_INT);
                        break;
                    case '`NOMBRE_CUENTA`':
						$stmt->bindValue($identifier, $this->nombre_cuenta, PDO::PARAM_STR);
                        break;
                    case '`VALOR_CUENTA`':
						$stmt->bindValue($identifier, $this->valor_cuenta, PDO::PARAM_STR);
                        break;
                    case '`TIPO_CUENTA`':
						$stmt->bindValue($identifier, $this->tipo_cuenta, PDO::PARAM_STR);
                        break;
                    case '`FECHA_CREACION_CUENTA`':
						$stmt->bindValue($identifier, $this->fecha_creacion_cuenta, PDO::PARAM_STR);
                        break;
                    case '`USER_CREA_CUENTA`':
						$stmt->bindValue($identifier, $this->user_crea_cuenta, PDO::PARAM_STR);
                        break;
                    case '`ACTIVA_CUENTA`':
						$stmt->bindValue($identifier, (int) $this->activa_cuenta, PDO::PARAM_INT);
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
        $this->setIdCuenta($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      PropelPDO $con
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
     * @param      mixed $columns Column name or an array of column names.
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
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = CuentaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CuentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdCuenta();
                break;
            case 1:
                return $this->getNombreCuenta();
                break;
            case 2:
                return $this->getValorCuenta();
                break;
            case 3:
                return $this->getTipoCuenta();
                break;
            case 4:
                return $this->getFechaCreacionCuenta();
                break;
            case 5:
                return $this->getUserCreaCuenta();
                break;
            case 6:
                return $this->getActivaCuenta();
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
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['Cuenta'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cuenta'][$this->getPrimaryKey()] = true;
        $keys = CuentaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCuenta(),
            $keys[1] => $this->getNombreCuenta(),
            $keys[2] => $this->getValorCuenta(),
            $keys[3] => $this->getTipoCuenta(),
            $keys[4] => $this->getFechaCreacionCuenta(),
            $keys[5] => $this->getUserCreaCuenta(),
            $keys[6] => $this->getActivaCuenta(),
        );

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CuentaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCuenta($value);
                break;
            case 1:
                $this->setNombreCuenta($value);
                break;
            case 2:
                $this->setValorCuenta($value);
                break;
            case 3:
                $this->setTipoCuenta($value);
                break;
            case 4:
                $this->setFechaCreacionCuenta($value);
                break;
            case 5:
                $this->setUserCreaCuenta($value);
                break;
            case 6:
                $this->setActivaCuenta($value);
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
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = CuentaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCuenta($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNombreCuenta($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setValorCuenta($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTipoCuenta($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFechaCreacionCuenta($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUserCreaCuenta($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActivaCuenta($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CuentaPeer::DATABASE_NAME);

        if ($this->isColumnModified(CuentaPeer::ID_CUENTA)) $criteria->add(CuentaPeer::ID_CUENTA, $this->id_cuenta);
        if ($this->isColumnModified(CuentaPeer::NOMBRE_CUENTA)) $criteria->add(CuentaPeer::NOMBRE_CUENTA, $this->nombre_cuenta);
        if ($this->isColumnModified(CuentaPeer::VALOR_CUENTA)) $criteria->add(CuentaPeer::VALOR_CUENTA, $this->valor_cuenta);
        if ($this->isColumnModified(CuentaPeer::TIPO_CUENTA)) $criteria->add(CuentaPeer::TIPO_CUENTA, $this->tipo_cuenta);
        if ($this->isColumnModified(CuentaPeer::FECHA_CREACION_CUENTA)) $criteria->add(CuentaPeer::FECHA_CREACION_CUENTA, $this->fecha_creacion_cuenta);
        if ($this->isColumnModified(CuentaPeer::USER_CREA_CUENTA)) $criteria->add(CuentaPeer::USER_CREA_CUENTA, $this->user_crea_cuenta);
        if ($this->isColumnModified(CuentaPeer::ACTIVA_CUENTA)) $criteria->add(CuentaPeer::ACTIVA_CUENTA, $this->activa_cuenta);

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
        $criteria = new Criteria(CuentaPeer::DATABASE_NAME);
        $criteria->add(CuentaPeer::ID_CUENTA, $this->id_cuenta);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCuenta();
    }

    /**
     * Generic method to set the primary key (id_cuenta column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCuenta($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCuenta();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of Cuenta (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombreCuenta($this->getNombreCuenta());
        $copyObj->setValorCuenta($this->getValorCuenta());
        $copyObj->setTipoCuenta($this->getTipoCuenta());
        $copyObj->setFechaCreacionCuenta($this->getFechaCreacionCuenta());
        $copyObj->setUserCreaCuenta($this->getUserCreaCuenta());
        $copyObj->setActivaCuenta($this->getActivaCuenta());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCuenta(NULL); // this is a auto-increment column, so set to default value
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
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 Cuenta Clone of current object.
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
     * @return   CuentaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CuentaPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_cuenta = null;
        $this->nombre_cuenta = null;
        $this->valor_cuenta = null;
        $this->tipo_cuenta = null;
        $this->fecha_creacion_cuenta = null;
        $this->user_crea_cuenta = null;
        $this->activa_cuenta = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
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
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CuentaPeer::DEFAULT_STRING_FORMAT);
    }

} // BaseCuenta
