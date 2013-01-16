<?php


/**
 * Base class that represents a row from the 'Poll' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BasePoll extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PollPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PollPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the pollid field.
     * @var        int
     */
    protected $pollid;

    /**
     * The value for the deviceid field.
     * @var        int
     */
    protected $deviceid;

    /**
     * The value for the snmppropertyid field.
     * @var        int
     */
    protected $snmppropertyid;

    /**
     * The value for the pluginid field.
     * @var        int
     */
    protected $pluginid;

    /**
     * The value for the timestamp field.
     * @var        string
     */
    protected $timestamp;

    /**
     * The value for the value field.
     * @var        string
     */
    protected $value;

    /**
     * @var        Device
     */
    protected $aDevice;

    /**
     * @var        SnmpProperty
     */
    protected $aSnmpProperty;

    /**
     * @var        Plugin
     */
    protected $aPlugin;

    /**
     * @var        PropelObjectCollection|Threshold[] Collection to store aggregation of Threshold objects.
     */
    protected $collPollThresholds;
    protected $collPollThresholdsPartial;

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
    protected $pollThresholdsScheduledForDeletion = null;

    /**
     * Get the [pollid] column value.
     *
     * @return int
     */
    public function getPollid()
    {
        return $this->pollid;
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
     * Get the [snmppropertyid] column value.
     *
     * @return int
     */
    public function getSnmppropertyid()
    {
        return $this->snmppropertyid;
    }

    /**
     * Get the [pluginid] column value.
     *
     * @return int
     */
    public function getPluginid()
    {
        return $this->pluginid;
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
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of [pollid] column.
     *
     * @param int $v new value
     * @return Poll The current object (for fluent API support)
     */
    public function setPollid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pollid !== $v) {
            $this->pollid = $v;
            $this->modifiedColumns[] = PollPeer::POLLID;
        }


        return $this;
    } // setPollid()

    /**
     * Set the value of [deviceid] column.
     *
     * @param int $v new value
     * @return Poll The current object (for fluent API support)
     */
    public function setDeviceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deviceid !== $v) {
            $this->deviceid = $v;
            $this->modifiedColumns[] = PollPeer::DEVICEID;
        }

        if ($this->aDevice !== null && $this->aDevice->getDeviceid() !== $v) {
            $this->aDevice = null;
        }


        return $this;
    } // setDeviceid()

    /**
     * Set the value of [snmppropertyid] column.
     *
     * @param int $v new value
     * @return Poll The current object (for fluent API support)
     */
    public function setSnmppropertyid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->snmppropertyid !== $v) {
            $this->snmppropertyid = $v;
            $this->modifiedColumns[] = PollPeer::SNMPPROPERTYID;
        }

        if ($this->aSnmpProperty !== null && $this->aSnmpProperty->getSnmppropertyid() !== $v) {
            $this->aSnmpProperty = null;
        }


        return $this;
    } // setSnmppropertyid()

    /**
     * Set the value of [pluginid] column.
     *
     * @param int $v new value
     * @return Poll The current object (for fluent API support)
     */
    public function setPluginid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pluginid !== $v) {
            $this->pluginid = $v;
            $this->modifiedColumns[] = PollPeer::PLUGINID;
        }

        if ($this->aPlugin !== null && $this->aPlugin->getPluginid() !== $v) {
            $this->aPlugin = null;
        }


        return $this;
    } // setPluginid()

    /**
     * Sets the value of [timestamp] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Poll The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            $currentDateAsString = ($this->timestamp !== null && $tmpDt = new DateTime($this->timestamp)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->timestamp = $newDateAsString;
                $this->modifiedColumns[] = PollPeer::TIMESTAMP;
            }
        } // if either are not null


        return $this;
    } // setTimestamp()

    /**
     * Set the value of [value] column.
     *
     * @param string $v new value
     * @return Poll The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = PollPeer::VALUE;
        }


        return $this;
    } // setValue()

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

            $this->pollid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->deviceid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->snmppropertyid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->pluginid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->timestamp = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->value = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = PollPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Poll object", $e);
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
        if ($this->aSnmpProperty !== null && $this->snmppropertyid !== $this->aSnmpProperty->getSnmppropertyid()) {
            $this->aSnmpProperty = null;
        }
        if ($this->aPlugin !== null && $this->pluginid !== $this->aPlugin->getPluginid()) {
            $this->aPlugin = null;
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
            $con = Propel::getConnection(PollPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PollPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDevice = null;
            $this->aSnmpProperty = null;
            $this->aPlugin = null;
            $this->collPollThresholds = null;

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
            $con = Propel::getConnection(PollPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PollQuery::create()
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
            $con = Propel::getConnection(PollPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PollPeer::addInstanceToPool($this);
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

            if ($this->aSnmpProperty !== null) {
                if ($this->aSnmpProperty->isModified() || $this->aSnmpProperty->isNew()) {
                    $affectedRows += $this->aSnmpProperty->save($con);
                }
                $this->setSnmpProperty($this->aSnmpProperty);
            }

            if ($this->aPlugin !== null) {
                if ($this->aPlugin->isModified() || $this->aPlugin->isNew()) {
                    $affectedRows += $this->aPlugin->save($con);
                }
                $this->setPlugin($this->aPlugin);
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

            if ($this->pollThresholdsScheduledForDeletion !== null) {
                if (!$this->pollThresholdsScheduledForDeletion->isEmpty()) {
                    ThresholdQuery::create()
                        ->filterByPrimaryKeys($this->pollThresholdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pollThresholdsScheduledForDeletion = null;
                }
            }

            if ($this->collPollThresholds !== null) {
                foreach ($this->collPollThresholds as $referrerFK) {
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

        $this->modifiedColumns[] = PollPeer::POLLID;
        if (null !== $this->pollid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PollPeer::POLLID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PollPeer::POLLID)) {
            $modifiedColumns[':p' . $index++]  = '`PollId`';
        }
        if ($this->isColumnModified(PollPeer::DEVICEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceId`';
        }
        if ($this->isColumnModified(PollPeer::SNMPPROPERTYID)) {
            $modifiedColumns[':p' . $index++]  = '`SnmpPropertyId`';
        }
        if ($this->isColumnModified(PollPeer::PLUGINID)) {
            $modifiedColumns[':p' . $index++]  = '`PluginId`';
        }
        if ($this->isColumnModified(PollPeer::TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = '`Timestamp`';
        }
        if ($this->isColumnModified(PollPeer::VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`Value`';
        }

        $sql = sprintf(
            'INSERT INTO `Poll` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`PollId`':
                        $stmt->bindValue($identifier, $this->pollid, PDO::PARAM_INT);
                        break;
                    case '`DeviceId`':
                        $stmt->bindValue($identifier, $this->deviceid, PDO::PARAM_INT);
                        break;
                    case '`SnmpPropertyId`':
                        $stmt->bindValue($identifier, $this->snmppropertyid, PDO::PARAM_INT);
                        break;
                    case '`PluginId`':
                        $stmt->bindValue($identifier, $this->pluginid, PDO::PARAM_INT);
                        break;
                    case '`Timestamp`':
                        $stmt->bindValue($identifier, $this->timestamp, PDO::PARAM_STR);
                        break;
                    case '`Value`':
                        $stmt->bindValue($identifier, $this->value, PDO::PARAM_STR);
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
        $this->setPollid($pk);

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

            if ($this->aSnmpProperty !== null) {
                if (!$this->aSnmpProperty->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnmpProperty->getValidationFailures());
                }
            }

            if ($this->aPlugin !== null) {
                if (!$this->aPlugin->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPlugin->getValidationFailures());
                }
            }


            if (($retval = PollPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPollThresholds !== null) {
                    foreach ($this->collPollThresholds as $referrerFK) {
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
        $pos = PollPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPollid();
                break;
            case 1:
                return $this->getDeviceid();
                break;
            case 2:
                return $this->getSnmppropertyid();
                break;
            case 3:
                return $this->getPluginid();
                break;
            case 4:
                return $this->getTimestamp();
                break;
            case 5:
                return $this->getValue();
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
        if (isset($alreadyDumpedObjects['Poll'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Poll'][$this->getPrimaryKey()] = true;
        $keys = PollPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPollid(),
            $keys[1] => $this->getDeviceid(),
            $keys[2] => $this->getSnmppropertyid(),
            $keys[3] => $this->getPluginid(),
            $keys[4] => $this->getTimestamp(),
            $keys[5] => $this->getValue(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aDevice) {
                $result['Device'] = $this->aDevice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSnmpProperty) {
                $result['SnmpProperty'] = $this->aSnmpProperty->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPlugin) {
                $result['Plugin'] = $this->aPlugin->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPollThresholds) {
                $result['PollThresholds'] = $this->collPollThresholds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PollPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPollid($value);
                break;
            case 1:
                $this->setDeviceid($value);
                break;
            case 2:
                $this->setSnmppropertyid($value);
                break;
            case 3:
                $this->setPluginid($value);
                break;
            case 4:
                $this->setTimestamp($value);
                break;
            case 5:
                $this->setValue($value);
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
        $keys = PollPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPollid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDeviceid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSnmppropertyid($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPluginid($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTimestamp($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setValue($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PollPeer::DATABASE_NAME);

        if ($this->isColumnModified(PollPeer::POLLID)) $criteria->add(PollPeer::POLLID, $this->pollid);
        if ($this->isColumnModified(PollPeer::DEVICEID)) $criteria->add(PollPeer::DEVICEID, $this->deviceid);
        if ($this->isColumnModified(PollPeer::SNMPPROPERTYID)) $criteria->add(PollPeer::SNMPPROPERTYID, $this->snmppropertyid);
        if ($this->isColumnModified(PollPeer::PLUGINID)) $criteria->add(PollPeer::PLUGINID, $this->pluginid);
        if ($this->isColumnModified(PollPeer::TIMESTAMP)) $criteria->add(PollPeer::TIMESTAMP, $this->timestamp);
        if ($this->isColumnModified(PollPeer::VALUE)) $criteria->add(PollPeer::VALUE, $this->value);

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
        $criteria = new Criteria(PollPeer::DATABASE_NAME);
        $criteria->add(PollPeer::POLLID, $this->pollid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getPollid();
    }

    /**
     * Generic method to set the primary key (pollid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPollid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPollid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Poll (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeviceid($this->getDeviceid());
        $copyObj->setSnmppropertyid($this->getSnmppropertyid());
        $copyObj->setPluginid($this->getPluginid());
        $copyObj->setTimestamp($this->getTimestamp());
        $copyObj->setValue($this->getValue());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPollThresholds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPollThreshold($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPollid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Poll Clone of current object.
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
     * @return PollPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PollPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Device object.
     *
     * @param             Device $v
     * @return Poll The current object (for fluent API support)
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
            $v->addDevicePoll($this);
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
                $this->aDevice->addDevicePolls($this);
             */
        }

        return $this->aDevice;
    }

    /**
     * Declares an association between this object and a SnmpProperty object.
     *
     * @param             SnmpProperty $v
     * @return Poll The current object (for fluent API support)
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
            $v->addSnmpPropertyPoll($this);
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
                $this->aSnmpProperty->addSnmpPropertyPolls($this);
             */
        }

        return $this->aSnmpProperty;
    }

    /**
     * Declares an association between this object and a Plugin object.
     *
     * @param             Plugin $v
     * @return Poll The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPlugin(Plugin $v = null)
    {
        if ($v === null) {
            $this->setPluginid(NULL);
        } else {
            $this->setPluginid($v->getPluginid());
        }

        $this->aPlugin = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Plugin object, it will not be re-added.
        if ($v !== null) {
            $v->addPluginPoll($this);
        }


        return $this;
    }


    /**
     * Get the associated Plugin object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Plugin The associated Plugin object.
     * @throws PropelException
     */
    public function getPlugin(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPlugin === null && ($this->pluginid !== null) && $doQuery) {
            $this->aPlugin = PluginQuery::create()->findPk($this->pluginid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPlugin->addPluginPolls($this);
             */
        }

        return $this->aPlugin;
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
        if ('PollThreshold' == $relationName) {
            $this->initPollThresholds();
        }
    }

    /**
     * Clears out the collPollThresholds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Poll The current object (for fluent API support)
     * @see        addPollThresholds()
     */
    public function clearPollThresholds()
    {
        $this->collPollThresholds = null; // important to set this to null since that means it is uninitialized
        $this->collPollThresholdsPartial = null;

        return $this;
    }

    /**
     * reset is the collPollThresholds collection loaded partially
     *
     * @return void
     */
    public function resetPartialPollThresholds($v = true)
    {
        $this->collPollThresholdsPartial = $v;
    }

    /**
     * Initializes the collPollThresholds collection.
     *
     * By default this just sets the collPollThresholds collection to an empty array (like clearcollPollThresholds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPollThresholds($overrideExisting = true)
    {
        if (null !== $this->collPollThresholds && !$overrideExisting) {
            return;
        }
        $this->collPollThresholds = new PropelObjectCollection();
        $this->collPollThresholds->setModel('Threshold');
    }

    /**
     * Gets an array of Threshold objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Poll is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     * @throws PropelException
     */
    public function getPollThresholds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPollThresholdsPartial && !$this->isNew();
        if (null === $this->collPollThresholds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPollThresholds) {
                // return empty collection
                $this->initPollThresholds();
            } else {
                $collPollThresholds = ThresholdQuery::create(null, $criteria)
                    ->filterByPoll($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPollThresholdsPartial && count($collPollThresholds)) {
                      $this->initPollThresholds(false);

                      foreach($collPollThresholds as $obj) {
                        if (false == $this->collPollThresholds->contains($obj)) {
                          $this->collPollThresholds->append($obj);
                        }
                      }

                      $this->collPollThresholdsPartial = true;
                    }

                    $collPollThresholds->getInternalIterator()->rewind();
                    return $collPollThresholds;
                }

                if($partial && $this->collPollThresholds) {
                    foreach($this->collPollThresholds as $obj) {
                        if($obj->isNew()) {
                            $collPollThresholds[] = $obj;
                        }
                    }
                }

                $this->collPollThresholds = $collPollThresholds;
                $this->collPollThresholdsPartial = false;
            }
        }

        return $this->collPollThresholds;
    }

    /**
     * Sets a collection of PollThreshold objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pollThresholds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Poll The current object (for fluent API support)
     */
    public function setPollThresholds(PropelCollection $pollThresholds, PropelPDO $con = null)
    {
        $pollThresholdsToDelete = $this->getPollThresholds(new Criteria(), $con)->diff($pollThresholds);

        $this->pollThresholdsScheduledForDeletion = unserialize(serialize($pollThresholdsToDelete));

        foreach ($pollThresholdsToDelete as $pollThresholdRemoved) {
            $pollThresholdRemoved->setPoll(null);
        }

        $this->collPollThresholds = null;
        foreach ($pollThresholds as $pollThreshold) {
            $this->addPollThreshold($pollThreshold);
        }

        $this->collPollThresholds = $pollThresholds;
        $this->collPollThresholdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Threshold objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Threshold objects.
     * @throws PropelException
     */
    public function countPollThresholds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPollThresholdsPartial && !$this->isNew();
        if (null === $this->collPollThresholds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPollThresholds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPollThresholds());
            }
            $query = ThresholdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPoll($this)
                ->count($con);
        }

        return count($this->collPollThresholds);
    }

    /**
     * Method called to associate a Threshold object to this object
     * through the Threshold foreign key attribute.
     *
     * @param    Threshold $l Threshold
     * @return Poll The current object (for fluent API support)
     */
    public function addPollThreshold(Threshold $l)
    {
        if ($this->collPollThresholds === null) {
            $this->initPollThresholds();
            $this->collPollThresholdsPartial = true;
        }
        if (!in_array($l, $this->collPollThresholds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPollThreshold($l);
        }

        return $this;
    }

    /**
     * @param	PollThreshold $pollThreshold The pollThreshold object to add.
     */
    protected function doAddPollThreshold($pollThreshold)
    {
        $this->collPollThresholds[]= $pollThreshold;
        $pollThreshold->setPoll($this);
    }

    /**
     * @param	PollThreshold $pollThreshold The pollThreshold object to remove.
     * @return Poll The current object (for fluent API support)
     */
    public function removePollThreshold($pollThreshold)
    {
        if ($this->getPollThresholds()->contains($pollThreshold)) {
            $this->collPollThresholds->remove($this->collPollThresholds->search($pollThreshold));
            if (null === $this->pollThresholdsScheduledForDeletion) {
                $this->pollThresholdsScheduledForDeletion = clone $this->collPollThresholds;
                $this->pollThresholdsScheduledForDeletion->clear();
            }
            $this->pollThresholdsScheduledForDeletion[]= clone $pollThreshold;
            $pollThreshold->setPoll(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Poll is new, it will return
     * an empty collection; or if this Poll has previously
     * been saved, it will retrieve related PollThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Poll.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPollThresholdsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getPollThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Poll is new, it will return
     * an empty collection; or if this Poll has previously
     * been saved, it will retrieve related PollThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Poll.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPollThresholdsJoinTrap($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Trap', $join_behavior);

        return $this->getPollThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Poll is new, it will return
     * an empty collection; or if this Poll has previously
     * been saved, it will retrieve related PollThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Poll.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPollThresholdsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getPollThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Poll is new, it will return
     * an empty collection; or if this Poll has previously
     * been saved, it will retrieve related PollThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Poll.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPollThresholdsJoinSyslog($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Syslog', $join_behavior);

        return $this->getPollThresholds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->pollid = null;
        $this->deviceid = null;
        $this->snmppropertyid = null;
        $this->pluginid = null;
        $this->timestamp = null;
        $this->value = null;
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
            if ($this->collPollThresholds) {
                foreach ($this->collPollThresholds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aDevice instanceof Persistent) {
              $this->aDevice->clearAllReferences($deep);
            }
            if ($this->aSnmpProperty instanceof Persistent) {
              $this->aSnmpProperty->clearAllReferences($deep);
            }
            if ($this->aPlugin instanceof Persistent) {
              $this->aPlugin->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPollThresholds instanceof PropelCollection) {
            $this->collPollThresholds->clearIterator();
        }
        $this->collPollThresholds = null;
        $this->aDevice = null;
        $this->aSnmpProperty = null;
        $this->aPlugin = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PollPeer::DEFAULT_STRING_FORMAT);
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
