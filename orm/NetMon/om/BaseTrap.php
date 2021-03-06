<?php


/**
 * Base class that represents a row from the 'Trap' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseTrap extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'TrapPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TrapPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the trapid field.
     * @var        int
     */
    protected $trapid;

    /**
     * The value for the deviceid field.
     * @var        int
     */
    protected $deviceid;

    /**
     * The value for the adapterid field.
     * @var        int
     */
    protected $adapterid;

    /**
     * The value for the snmppropertyid field.
     * @var        int
     */
    protected $snmppropertyid;

    /**
     * The value for the timestamp field.
     * @var        string
     */
    protected $timestamp;

    /**
     * The value for the value field.
     * @var        int
     */
    protected $value;

    /**
     * The value for the expected field.
     * @var        int
     */
    protected $expected;

    /**
     * @var        Device
     */
    protected $aDevice;

    /**
     * @var        Adapter
     */
    protected $aAdapter;

    /**
     * @var        SnmpProperty
     */
    protected $aSnmpProperty;

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
     * Get the [trapid] column value.
     *
     * @return int
     */
    public function getTrapid()
    {
        return $this->trapid;
    }

    /**
     * Get the [deviceid] column value.
     *
     * @return int
     */
    public function getDeviceid()
    {
        return $this->deviceid;
    }

    /**
     * Get the [adapterid] column value.
     *
     * @return int
     */
    public function getAdapterid()
    {
        return $this->adapterid;
    }

    /**
     * Get the [snmppropertyid] column value.
     *
     * @return int
     */
    public function getSnmppropertyid()
    {
        return $this->snmppropertyid;
    }

    /**
     * Get the [optionally formatted] temporal [timestamp] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTimestamp($format = '{Y-m-d H:i:s}|string')
    {
        if ($this->timestamp === null) {
            return null;
        }

        if ($this->timestamp === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->timestamp);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->timestamp, true), $x);
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
     * Get the [value] column value.
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the [expected] column value.
     *
     * @return int
     */
    public function getExpected()
    {
        return $this->expected;
    }

    /**
     * Set the value of [trapid] column.
     *
     * @param int $v new value
     * @return Trap The current object (for fluent API support)
     */
    public function setTrapid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->trapid !== $v) {
            $this->trapid = $v;
            $this->modifiedColumns[] = TrapPeer::TRAPID;
        }


        return $this;
    } // setTrapid()

    /**
     * Set the value of [deviceid] column.
     *
     * @param int $v new value
     * @return Trap The current object (for fluent API support)
     */
    public function setDeviceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deviceid !== $v) {
            $this->deviceid = $v;
            $this->modifiedColumns[] = TrapPeer::DEVICEID;
        }

        if ($this->aDevice !== null && $this->aDevice->getDeviceid() !== $v) {
            $this->aDevice = null;
        }


        return $this;
    } // setDeviceid()

    /**
     * Set the value of [adapterid] column.
     *
     * @param int $v new value
     * @return Trap The current object (for fluent API support)
     */
    public function setAdapterid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->adapterid !== $v) {
            $this->adapterid = $v;
            $this->modifiedColumns[] = TrapPeer::ADAPTERID;
        }

        if ($this->aAdapter !== null && $this->aAdapter->getAdapterid() !== $v) {
            $this->aAdapter = null;
        }


        return $this;
    } // setAdapterid()

    /**
     * Set the value of [snmppropertyid] column.
     *
     * @param int $v new value
     * @return Trap The current object (for fluent API support)
     */
    public function setSnmppropertyid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->snmppropertyid !== $v) {
            $this->snmppropertyid = $v;
            $this->modifiedColumns[] = TrapPeer::SNMPPROPERTYID;
        }

        if ($this->aSnmpProperty !== null && $this->aSnmpProperty->getSnmppropertyid() !== $v) {
            $this->aSnmpProperty = null;
        }


        return $this;
    } // setSnmppropertyid()

    /**
     * Sets the value of [timestamp] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Trap The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            $currentDateAsString = ($this->timestamp !== null && $tmpDt = new DateTime($this->timestamp)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->timestamp = $newDateAsString;
                $this->modifiedColumns[] = TrapPeer::TIMESTAMP;
            }
        } // if either are not null


        return $this;
    } // setTimestamp()

    /**
     * Set the value of [value] column.
     *
     * @param int $v new value
     * @return Trap The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = TrapPeer::VALUE;
        }


        return $this;
    } // setValue()

    /**
     * Set the value of [expected] column.
     *
     * @param int $v new value
     * @return Trap The current object (for fluent API support)
     */
    public function setExpected($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->expected !== $v) {
            $this->expected = $v;
            $this->modifiedColumns[] = TrapPeer::EXPECTED;
        }


        return $this;
    } // setExpected()

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

            $this->trapid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->deviceid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->adapterid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->snmppropertyid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->timestamp = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->value = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->expected = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = TrapPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Trap object", $e);
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

        if ($this->aDevice !== null && $this->deviceid !== $this->aDevice->getDeviceid()) {
            $this->aDevice = null;
        }
        if ($this->aAdapter !== null && $this->adapterid !== $this->aAdapter->getAdapterid()) {
            $this->aAdapter = null;
        }
        if ($this->aSnmpProperty !== null && $this->snmppropertyid !== $this->aSnmpProperty->getSnmppropertyid()) {
            $this->aSnmpProperty = null;
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
            $con = Propel::getConnection(TrapPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TrapPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDevice = null;
            $this->aAdapter = null;
            $this->aSnmpProperty = null;
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
            $con = Propel::getConnection(TrapPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TrapQuery::create()
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
            $con = Propel::getConnection(TrapPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TrapPeer::addInstanceToPool($this);
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

            if ($this->aDevice !== null) {
                if ($this->aDevice->isModified() || $this->aDevice->isNew()) {
                    $affectedRows += $this->aDevice->save($con);
                }
                $this->setDevice($this->aDevice);
            }

            if ($this->aAdapter !== null) {
                if ($this->aAdapter->isModified() || $this->aAdapter->isNew()) {
                    $affectedRows += $this->aAdapter->save($con);
                }
                $this->setAdapter($this->aAdapter);
            }

            if ($this->aSnmpProperty !== null) {
                if ($this->aSnmpProperty->isModified() || $this->aSnmpProperty->isNew()) {
                    $affectedRows += $this->aSnmpProperty->save($con);
                }
                $this->setSnmpProperty($this->aSnmpProperty);
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

        $this->modifiedColumns[] = TrapPeer::TRAPID;
        if (null !== $this->trapid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TrapPeer::TRAPID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TrapPeer::TRAPID)) {
            $modifiedColumns[':p' . $index++]  = '`TrapId`';
        }
        if ($this->isColumnModified(TrapPeer::DEVICEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceId`';
        }
        if ($this->isColumnModified(TrapPeer::ADAPTERID)) {
            $modifiedColumns[':p' . $index++]  = '`AdapterId`';
        }
        if ($this->isColumnModified(TrapPeer::SNMPPROPERTYID)) {
            $modifiedColumns[':p' . $index++]  = '`SnmpPropertyId`';
        }
        if ($this->isColumnModified(TrapPeer::TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = '`Timestamp`';
        }
        if ($this->isColumnModified(TrapPeer::VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`Value`';
        }
        if ($this->isColumnModified(TrapPeer::EXPECTED)) {
            $modifiedColumns[':p' . $index++]  = '`Expected`';
        }

        $sql = sprintf(
            'INSERT INTO `Trap` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`TrapId`':
                        $stmt->bindValue($identifier, $this->trapid, PDO::PARAM_INT);
                        break;
                    case '`DeviceId`':
                        $stmt->bindValue($identifier, $this->deviceid, PDO::PARAM_INT);
                        break;
                    case '`AdapterId`':
                        $stmt->bindValue($identifier, $this->adapterid, PDO::PARAM_INT);
                        break;
                    case '`SnmpPropertyId`':
                        $stmt->bindValue($identifier, $this->snmppropertyid, PDO::PARAM_INT);
                        break;
                    case '`Timestamp`':
                        $stmt->bindValue($identifier, $this->timestamp, PDO::PARAM_STR);
                        break;
                    case '`Value`':
                        $stmt->bindValue($identifier, $this->value, PDO::PARAM_INT);
                        break;
                    case '`Expected`':
                        $stmt->bindValue($identifier, $this->expected, PDO::PARAM_INT);
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
        $this->setTrapid($pk);

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

            if ($this->aDevice !== null) {
                if (!$this->aDevice->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDevice->getValidationFailures());
                }
            }

            if ($this->aAdapter !== null) {
                if (!$this->aAdapter->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAdapter->getValidationFailures());
                }
            }

            if ($this->aSnmpProperty !== null) {
                if (!$this->aSnmpProperty->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnmpProperty->getValidationFailures());
                }
            }


            if (($retval = TrapPeer::doValidate($this, $columns)) !== true) {
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
        $pos = TrapPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTrapid();
                break;
            case 1:
                return $this->getDeviceid();
                break;
            case 2:
                return $this->getAdapterid();
                break;
            case 3:
                return $this->getSnmppropertyid();
                break;
            case 4:
                return $this->getTimestamp();
                break;
            case 5:
                return $this->getValue();
                break;
            case 6:
                return $this->getExpected();
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
        if (isset($alreadyDumpedObjects['Trap'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Trap'][$this->getPrimaryKey()] = true;
        $keys = TrapPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTrapid(),
            $keys[1] => $this->getDeviceid(),
            $keys[2] => $this->getAdapterid(),
            $keys[3] => $this->getSnmppropertyid(),
            $keys[4] => $this->getTimestamp(),
            $keys[5] => $this->getValue(),
            $keys[6] => $this->getExpected(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aDevice) {
                $result['Device'] = $this->aDevice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAdapter) {
                $result['Adapter'] = $this->aAdapter->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSnmpProperty) {
                $result['SnmpProperty'] = $this->aSnmpProperty->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = TrapPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTrapid($value);
                break;
            case 1:
                $this->setDeviceid($value);
                break;
            case 2:
                $this->setAdapterid($value);
                break;
            case 3:
                $this->setSnmppropertyid($value);
                break;
            case 4:
                $this->setTimestamp($value);
                break;
            case 5:
                $this->setValue($value);
                break;
            case 6:
                $this->setExpected($value);
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
        $keys = TrapPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTrapid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDeviceid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAdapterid($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSnmppropertyid($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTimestamp($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setValue($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setExpected($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TrapPeer::DATABASE_NAME);

        if ($this->isColumnModified(TrapPeer::TRAPID)) $criteria->add(TrapPeer::TRAPID, $this->trapid);
        if ($this->isColumnModified(TrapPeer::DEVICEID)) $criteria->add(TrapPeer::DEVICEID, $this->deviceid);
        if ($this->isColumnModified(TrapPeer::ADAPTERID)) $criteria->add(TrapPeer::ADAPTERID, $this->adapterid);
        if ($this->isColumnModified(TrapPeer::SNMPPROPERTYID)) $criteria->add(TrapPeer::SNMPPROPERTYID, $this->snmppropertyid);
        if ($this->isColumnModified(TrapPeer::TIMESTAMP)) $criteria->add(TrapPeer::TIMESTAMP, $this->timestamp);
        if ($this->isColumnModified(TrapPeer::VALUE)) $criteria->add(TrapPeer::VALUE, $this->value);
        if ($this->isColumnModified(TrapPeer::EXPECTED)) $criteria->add(TrapPeer::EXPECTED, $this->expected);

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
        $criteria = new Criteria(TrapPeer::DATABASE_NAME);
        $criteria->add(TrapPeer::TRAPID, $this->trapid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getTrapid();
    }

    /**
     * Generic method to set the primary key (trapid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTrapid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTrapid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Trap (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeviceid($this->getDeviceid());
        $copyObj->setAdapterid($this->getAdapterid());
        $copyObj->setSnmppropertyid($this->getSnmppropertyid());
        $copyObj->setTimestamp($this->getTimestamp());
        $copyObj->setValue($this->getValue());
        $copyObj->setExpected($this->getExpected());

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
            $copyObj->setTrapid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Trap Clone of current object.
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
     * @return TrapPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TrapPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Device object.
     *
     * @param             Device $v
     * @return Trap The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDevice(Device $v = null)
    {
        if ($v === null) {
            $this->setDeviceid(NULL);
        } else {
            $this->setDeviceid($v->getDeviceid());
        }

        $this->aDevice = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Device object, it will not be re-added.
        if ($v !== null) {
            $v->addDeviceTrap($this);
        }


        return $this;
    }


    /**
     * Get the associated Device object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Device The associated Device object.
     * @throws PropelException
     */
    public function getDevice(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDevice === null && ($this->deviceid !== null) && $doQuery) {
            $this->aDevice = DeviceQuery::create()->findPk($this->deviceid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDevice->addDeviceTraps($this);
             */
        }

        return $this->aDevice;
    }

    /**
     * Declares an association between this object and a Adapter object.
     *
     * @param             Adapter $v
     * @return Trap The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAdapter(Adapter $v = null)
    {
        if ($v === null) {
            $this->setAdapterid(NULL);
        } else {
            $this->setAdapterid($v->getAdapterid());
        }

        $this->aAdapter = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Adapter object, it will not be re-added.
        if ($v !== null) {
            $v->addAdapterTrap($this);
        }


        return $this;
    }


    /**
     * Get the associated Adapter object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Adapter The associated Adapter object.
     * @throws PropelException
     */
    public function getAdapter(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAdapter === null && ($this->adapterid !== null) && $doQuery) {
            $this->aAdapter = AdapterQuery::create()->findPk($this->adapterid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAdapter->addAdapterTraps($this);
             */
        }

        return $this->aAdapter;
    }

    /**
     * Declares an association between this object and a SnmpProperty object.
     *
     * @param             SnmpProperty $v
     * @return Trap The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSnmpProperty(SnmpProperty $v = null)
    {
        if ($v === null) {
            $this->setSnmppropertyid(NULL);
        } else {
            $this->setSnmppropertyid($v->getSnmppropertyid());
        }

        $this->aSnmpProperty = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SnmpProperty object, it will not be re-added.
        if ($v !== null) {
            $v->addSnmpPropertyTrap($this);
        }


        return $this;
    }


    /**
     * Get the associated SnmpProperty object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SnmpProperty The associated SnmpProperty object.
     * @throws PropelException
     */
    public function getSnmpProperty(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSnmpProperty === null && ($this->snmppropertyid !== null) && $doQuery) {
            $this->aSnmpProperty = SnmpPropertyQuery::create()->findPk($this->snmppropertyid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSnmpProperty->addSnmpPropertyTraps($this);
             */
        }

        return $this->aSnmpProperty;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->trapid = null;
        $this->deviceid = null;
        $this->adapterid = null;
        $this->snmppropertyid = null;
        $this->timestamp = null;
        $this->value = null;
        $this->expected = null;
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
            if ($this->aDevice instanceof Persistent) {
              $this->aDevice->clearAllReferences($deep);
            }
            if ($this->aAdapter instanceof Persistent) {
              $this->aAdapter->clearAllReferences($deep);
            }
            if ($this->aSnmpProperty instanceof Persistent) {
              $this->aSnmpProperty->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aDevice = null;
        $this->aAdapter = null;
        $this->aSnmpProperty = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TrapPeer::DEFAULT_STRING_FORMAT);
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

}
