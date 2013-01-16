<?php


/**
 * Base class that represents a row from the 'Threshold' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseThreshold extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ThresholdPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ThresholdPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the thresholdid field.
     * @var        int
     */
    protected $thresholdid;

    /**
     * The value for the deviceid field.
     * @var        int
     */
    protected $deviceid;

    /**
     * The value for the pollid field.
     * @var        int
     */
    protected $pollid;

    /**
     * The value for the trapid field.
     * @var        int
     */
    protected $trapid;

    /**
     * The value for the pluginid field.
     * @var        int
     */
    protected $pluginid;

    /**
     * The value for the syslogid field.
     * @var        int
     */
    protected $syslogid;

    /**
     * The value for the greaterthan field.
     * @var        int
     */
    protected $greaterthan;

    /**
     * The value for the value field.
     * @var        int
     */
    protected $value;

    /**
     * @var        Device
     */
    protected $aDevice;

    /**
     * @var        Poll
     */
    protected $aPoll;

    /**
     * @var        Trap
     */
    protected $aTrap;

    /**
     * @var        Plugin
     */
    protected $aPlugin;

    /**
     * @var        Syslog
     */
    protected $aSyslog;

    /**
     * @var        PropelObjectCollection|Alarm[] Collection to store aggregation of Alarm objects.
     */
    protected $collAlarmThresholds;
    protected $collAlarmThresholdsPartial;

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
    protected $alarmThresholdsScheduledForDeletion = null;

    /**
     * Get the [thresholdid] column value.
     *
     * @return int
     */
    public function getThresholdid()
    {
        return $this->thresholdid;
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
     * Get the [pollid] column value.
     *
     * @return int
     */
    public function getPollid()
    {
        return $this->pollid;
    }

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
     * Get the [pluginid] column value.
     *
     * @return int
     */
    public function getPluginid()
    {
        return $this->pluginid;
    }

    /**
     * Get the [syslogid] column value.
     *
     * @return int
     */
    public function getSyslogid()
    {
        return $this->syslogid;
    }

    /**
     * Get the [greaterthan] column value.
     *
     * @return int
     */
    public function getGreaterthan()
    {
        return $this->greaterthan;
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
     * Set the value of [thresholdid] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setThresholdid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->thresholdid !== $v) {
            $this->thresholdid = $v;
            $this->modifiedColumns[] = ThresholdPeer::THRESHOLDID;
        }


        return $this;
    } // setThresholdid()

    /**
     * Set the value of [deviceid] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setDeviceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deviceid !== $v) {
            $this->deviceid = $v;
            $this->modifiedColumns[] = ThresholdPeer::DEVICEID;
        }

        if ($this->aDevice !== null && $this->aDevice->getDeviceid() !== $v) {
            $this->aDevice = null;
        }


        return $this;
    } // setDeviceid()

    /**
     * Set the value of [pollid] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setPollid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pollid !== $v) {
            $this->pollid = $v;
            $this->modifiedColumns[] = ThresholdPeer::POLLID;
        }

        if ($this->aPoll !== null && $this->aPoll->getPollid() !== $v) {
            $this->aPoll = null;
        }


        return $this;
    } // setPollid()

    /**
     * Set the value of [trapid] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setTrapid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->trapid !== $v) {
            $this->trapid = $v;
            $this->modifiedColumns[] = ThresholdPeer::TRAPID;
        }

        if ($this->aTrap !== null && $this->aTrap->getTrapid() !== $v) {
            $this->aTrap = null;
        }


        return $this;
    } // setTrapid()

    /**
     * Set the value of [pluginid] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setPluginid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pluginid !== $v) {
            $this->pluginid = $v;
            $this->modifiedColumns[] = ThresholdPeer::PLUGINID;
        }

        if ($this->aPlugin !== null && $this->aPlugin->getPluginid() !== $v) {
            $this->aPlugin = null;
        }


        return $this;
    } // setPluginid()

    /**
     * Set the value of [syslogid] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setSyslogid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->syslogid !== $v) {
            $this->syslogid = $v;
            $this->modifiedColumns[] = ThresholdPeer::SYSLOGID;
        }

        if ($this->aSyslog !== null && $this->aSyslog->getSyslogid() !== $v) {
            $this->aSyslog = null;
        }


        return $this;
    } // setSyslogid()

    /**
     * Set the value of [greaterthan] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setGreaterthan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->greaterthan !== $v) {
            $this->greaterthan = $v;
            $this->modifiedColumns[] = ThresholdPeer::GREATERTHAN;
        }


        return $this;
    } // setGreaterthan()

    /**
     * Set the value of [value] column.
     *
     * @param int $v new value
     * @return Threshold The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = ThresholdPeer::VALUE;
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

            $this->thresholdid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->deviceid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->pollid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->trapid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->pluginid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->syslogid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->greaterthan = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->value = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = ThresholdPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Threshold object", $e);
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
        if ($this->aPoll !== null && $this->pollid !== $this->aPoll->getPollid()) {
            $this->aPoll = null;
        }
        if ($this->aTrap !== null && $this->trapid !== $this->aTrap->getTrapid()) {
            $this->aTrap = null;
        }
        if ($this->aPlugin !== null && $this->pluginid !== $this->aPlugin->getPluginid()) {
            $this->aPlugin = null;
        }
        if ($this->aSyslog !== null && $this->syslogid !== $this->aSyslog->getSyslogid()) {
            $this->aSyslog = null;
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
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ThresholdPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDevice = null;
            $this->aPoll = null;
            $this->aTrap = null;
            $this->aPlugin = null;
            $this->aSyslog = null;
            $this->collAlarmThresholds = null;

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
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ThresholdQuery::create()
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
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ThresholdPeer::addInstanceToPool($this);
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

            if ($this->aPoll !== null) {
                if ($this->aPoll->isModified() || $this->aPoll->isNew()) {
                    $affectedRows += $this->aPoll->save($con);
                }
                $this->setPoll($this->aPoll);
            }

            if ($this->aTrap !== null) {
                if ($this->aTrap->isModified() || $this->aTrap->isNew()) {
                    $affectedRows += $this->aTrap->save($con);
                }
                $this->setTrap($this->aTrap);
            }

            if ($this->aPlugin !== null) {
                if ($this->aPlugin->isModified() || $this->aPlugin->isNew()) {
                    $affectedRows += $this->aPlugin->save($con);
                }
                $this->setPlugin($this->aPlugin);
            }

            if ($this->aSyslog !== null) {
                if ($this->aSyslog->isModified() || $this->aSyslog->isNew()) {
                    $affectedRows += $this->aSyslog->save($con);
                }
                $this->setSyslog($this->aSyslog);
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

            if ($this->alarmThresholdsScheduledForDeletion !== null) {
                if (!$this->alarmThresholdsScheduledForDeletion->isEmpty()) {
                    AlarmQuery::create()
                        ->filterByPrimaryKeys($this->alarmThresholdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->alarmThresholdsScheduledForDeletion = null;
                }
            }

            if ($this->collAlarmThresholds !== null) {
                foreach ($this->collAlarmThresholds as $referrerFK) {
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

        $this->modifiedColumns[] = ThresholdPeer::THRESHOLDID;
        if (null !== $this->thresholdid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ThresholdPeer::THRESHOLDID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ThresholdPeer::THRESHOLDID)) {
            $modifiedColumns[':p' . $index++]  = '`ThresholdId`';
        }
        if ($this->isColumnModified(ThresholdPeer::DEVICEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceId`';
        }
        if ($this->isColumnModified(ThresholdPeer::POLLID)) {
            $modifiedColumns[':p' . $index++]  = '`PollId`';
        }
        if ($this->isColumnModified(ThresholdPeer::TRAPID)) {
            $modifiedColumns[':p' . $index++]  = '`TrapId`';
        }
        if ($this->isColumnModified(ThresholdPeer::PLUGINID)) {
            $modifiedColumns[':p' . $index++]  = '`PluginId`';
        }
        if ($this->isColumnModified(ThresholdPeer::SYSLOGID)) {
            $modifiedColumns[':p' . $index++]  = '`SyslogId`';
        }
        if ($this->isColumnModified(ThresholdPeer::GREATERTHAN)) {
            $modifiedColumns[':p' . $index++]  = '`GreaterThan`';
        }
        if ($this->isColumnModified(ThresholdPeer::VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`Value`';
        }

        $sql = sprintf(
            'INSERT INTO `Threshold` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ThresholdId`':
                        $stmt->bindValue($identifier, $this->thresholdid, PDO::PARAM_INT);
                        break;
                    case '`DeviceId`':
                        $stmt->bindValue($identifier, $this->deviceid, PDO::PARAM_INT);
                        break;
                    case '`PollId`':
                        $stmt->bindValue($identifier, $this->pollid, PDO::PARAM_INT);
                        break;
                    case '`TrapId`':
                        $stmt->bindValue($identifier, $this->trapid, PDO::PARAM_INT);
                        break;
                    case '`PluginId`':
                        $stmt->bindValue($identifier, $this->pluginid, PDO::PARAM_INT);
                        break;
                    case '`SyslogId`':
                        $stmt->bindValue($identifier, $this->syslogid, PDO::PARAM_INT);
                        break;
                    case '`GreaterThan`':
                        $stmt->bindValue($identifier, $this->greaterthan, PDO::PARAM_INT);
                        break;
                    case '`Value`':
                        $stmt->bindValue($identifier, $this->value, PDO::PARAM_INT);
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
        $this->setThresholdid($pk);

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

            if ($this->aPoll !== null) {
                if (!$this->aPoll->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPoll->getValidationFailures());
                }
            }

            if ($this->aTrap !== null) {
                if (!$this->aTrap->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTrap->getValidationFailures());
                }
            }

            if ($this->aPlugin !== null) {
                if (!$this->aPlugin->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPlugin->getValidationFailures());
                }
            }

            if ($this->aSyslog !== null) {
                if (!$this->aSyslog->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSyslog->getValidationFailures());
                }
            }


            if (($retval = ThresholdPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlarmThresholds !== null) {
                    foreach ($this->collAlarmThresholds as $referrerFK) {
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
        $pos = ThresholdPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getThresholdid();
                break;
            case 1:
                return $this->getDeviceid();
                break;
            case 2:
                return $this->getPollid();
                break;
            case 3:
                return $this->getTrapid();
                break;
            case 4:
                return $this->getPluginid();
                break;
            case 5:
                return $this->getSyslogid();
                break;
            case 6:
                return $this->getGreaterthan();
                break;
            case 7:
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
        if (isset($alreadyDumpedObjects['Threshold'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Threshold'][$this->getPrimaryKey()] = true;
        $keys = ThresholdPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getThresholdid(),
            $keys[1] => $this->getDeviceid(),
            $keys[2] => $this->getPollid(),
            $keys[3] => $this->getTrapid(),
            $keys[4] => $this->getPluginid(),
            $keys[5] => $this->getSyslogid(),
            $keys[6] => $this->getGreaterthan(),
            $keys[7] => $this->getValue(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aDevice) {
                $result['Device'] = $this->aDevice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPoll) {
                $result['Poll'] = $this->aPoll->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTrap) {
                $result['Trap'] = $this->aTrap->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPlugin) {
                $result['Plugin'] = $this->aPlugin->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSyslog) {
                $result['Syslog'] = $this->aSyslog->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAlarmThresholds) {
                $result['AlarmThresholds'] = $this->collAlarmThresholds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ThresholdPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setThresholdid($value);
                break;
            case 1:
                $this->setDeviceid($value);
                break;
            case 2:
                $this->setPollid($value);
                break;
            case 3:
                $this->setTrapid($value);
                break;
            case 4:
                $this->setPluginid($value);
                break;
            case 5:
                $this->setSyslogid($value);
                break;
            case 6:
                $this->setGreaterthan($value);
                break;
            case 7:
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
        $keys = ThresholdPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setThresholdid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDeviceid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPollid($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTrapid($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPluginid($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSyslogid($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setGreaterthan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setValue($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ThresholdPeer::DATABASE_NAME);

        if ($this->isColumnModified(ThresholdPeer::THRESHOLDID)) $criteria->add(ThresholdPeer::THRESHOLDID, $this->thresholdid);
        if ($this->isColumnModified(ThresholdPeer::DEVICEID)) $criteria->add(ThresholdPeer::DEVICEID, $this->deviceid);
        if ($this->isColumnModified(ThresholdPeer::POLLID)) $criteria->add(ThresholdPeer::POLLID, $this->pollid);
        if ($this->isColumnModified(ThresholdPeer::TRAPID)) $criteria->add(ThresholdPeer::TRAPID, $this->trapid);
        if ($this->isColumnModified(ThresholdPeer::PLUGINID)) $criteria->add(ThresholdPeer::PLUGINID, $this->pluginid);
        if ($this->isColumnModified(ThresholdPeer::SYSLOGID)) $criteria->add(ThresholdPeer::SYSLOGID, $this->syslogid);
        if ($this->isColumnModified(ThresholdPeer::GREATERTHAN)) $criteria->add(ThresholdPeer::GREATERTHAN, $this->greaterthan);
        if ($this->isColumnModified(ThresholdPeer::VALUE)) $criteria->add(ThresholdPeer::VALUE, $this->value);

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
        $criteria = new Criteria(ThresholdPeer::DATABASE_NAME);
        $criteria->add(ThresholdPeer::THRESHOLDID, $this->thresholdid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getThresholdid();
    }

    /**
     * Generic method to set the primary key (thresholdid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setThresholdid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getThresholdid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Threshold (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeviceid($this->getDeviceid());
        $copyObj->setPollid($this->getPollid());
        $copyObj->setTrapid($this->getTrapid());
        $copyObj->setPluginid($this->getPluginid());
        $copyObj->setSyslogid($this->getSyslogid());
        $copyObj->setGreaterthan($this->getGreaterthan());
        $copyObj->setValue($this->getValue());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAlarmThresholds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlarmThreshold($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setThresholdid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Threshold Clone of current object.
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
     * @return ThresholdPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ThresholdPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Device object.
     *
     * @param             Device $v
     * @return Threshold The current object (for fluent API support)
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
            $v->addDeviceThreshold($this);
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
                $this->aDevice->addDeviceThresholds($this);
             */
        }

        return $this->aDevice;
    }

    /**
     * Declares an association between this object and a Poll object.
     *
     * @param             Poll $v
     * @return Threshold The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPoll(Poll $v = null)
    {
        if ($v === null) {
            $this->setPollid(NULL);
        } else {
            $this->setPollid($v->getPollid());
        }

        $this->aPoll = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Poll object, it will not be re-added.
        if ($v !== null) {
            $v->addPollThreshold($this);
        }


        return $this;
    }


    /**
     * Get the associated Poll object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Poll The associated Poll object.
     * @throws PropelException
     */
    public function getPoll(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPoll === null && ($this->pollid !== null) && $doQuery) {
            $this->aPoll = PollQuery::create()->findPk($this->pollid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPoll->addPollThresholds($this);
             */
        }

        return $this->aPoll;
    }

    /**
     * Declares an association between this object and a Trap object.
     *
     * @param             Trap $v
     * @return Threshold The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTrap(Trap $v = null)
    {
        if ($v === null) {
            $this->setTrapid(NULL);
        } else {
            $this->setTrapid($v->getTrapid());
        }

        $this->aTrap = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Trap object, it will not be re-added.
        if ($v !== null) {
            $v->addTrapThreshold($this);
        }


        return $this;
    }


    /**
     * Get the associated Trap object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Trap The associated Trap object.
     * @throws PropelException
     */
    public function getTrap(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTrap === null && ($this->trapid !== null) && $doQuery) {
            $this->aTrap = TrapQuery::create()->findPk($this->trapid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTrap->addTrapThresholds($this);
             */
        }

        return $this->aTrap;
    }

    /**
     * Declares an association between this object and a Plugin object.
     *
     * @param             Plugin $v
     * @return Threshold The current object (for fluent API support)
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
            $v->addPluginThreshold($this);
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
                $this->aPlugin->addPluginThresholds($this);
             */
        }

        return $this->aPlugin;
    }

    /**
     * Declares an association between this object and a Syslog object.
     *
     * @param             Syslog $v
     * @return Threshold The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSyslog(Syslog $v = null)
    {
        if ($v === null) {
            $this->setSyslogid(NULL);
        } else {
            $this->setSyslogid($v->getSyslogid());
        }

        $this->aSyslog = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Syslog object, it will not be re-added.
        if ($v !== null) {
            $v->addSyslogThreshold($this);
        }


        return $this;
    }


    /**
     * Get the associated Syslog object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Syslog The associated Syslog object.
     * @throws PropelException
     */
    public function getSyslog(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSyslog === null && ($this->syslogid !== null) && $doQuery) {
            $this->aSyslog = SyslogQuery::create()->findPk($this->syslogid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSyslog->addSyslogThresholds($this);
             */
        }

        return $this->aSyslog;
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
        if ('AlarmThreshold' == $relationName) {
            $this->initAlarmThresholds();
        }
    }

    /**
     * Clears out the collAlarmThresholds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Threshold The current object (for fluent API support)
     * @see        addAlarmThresholds()
     */
    public function clearAlarmThresholds()
    {
        $this->collAlarmThresholds = null; // important to set this to null since that means it is uninitialized
        $this->collAlarmThresholdsPartial = null;

        return $this;
    }

    /**
     * reset is the collAlarmThresholds collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlarmThresholds($v = true)
    {
        $this->collAlarmThresholdsPartial = $v;
    }

    /**
     * Initializes the collAlarmThresholds collection.
     *
     * By default this just sets the collAlarmThresholds collection to an empty array (like clearcollAlarmThresholds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlarmThresholds($overrideExisting = true)
    {
        if (null !== $this->collAlarmThresholds && !$overrideExisting) {
            return;
        }
        $this->collAlarmThresholds = new PropelObjectCollection();
        $this->collAlarmThresholds->setModel('Alarm');
    }

    /**
     * Gets an array of Alarm objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Threshold is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alarm[] List of Alarm objects
     * @throws PropelException
     */
    public function getAlarmThresholds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlarmThresholdsPartial && !$this->isNew();
        if (null === $this->collAlarmThresholds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlarmThresholds) {
                // return empty collection
                $this->initAlarmThresholds();
            } else {
                $collAlarmThresholds = AlarmQuery::create(null, $criteria)
                    ->filterByThreshold($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlarmThresholdsPartial && count($collAlarmThresholds)) {
                      $this->initAlarmThresholds(false);

                      foreach($collAlarmThresholds as $obj) {
                        if (false == $this->collAlarmThresholds->contains($obj)) {
                          $this->collAlarmThresholds->append($obj);
                        }
                      }

                      $this->collAlarmThresholdsPartial = true;
                    }

                    $collAlarmThresholds->getInternalIterator()->rewind();
                    return $collAlarmThresholds;
                }

                if($partial && $this->collAlarmThresholds) {
                    foreach($this->collAlarmThresholds as $obj) {
                        if($obj->isNew()) {
                            $collAlarmThresholds[] = $obj;
                        }
                    }
                }

                $this->collAlarmThresholds = $collAlarmThresholds;
                $this->collAlarmThresholdsPartial = false;
            }
        }

        return $this->collAlarmThresholds;
    }

    /**
     * Sets a collection of AlarmThreshold objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alarmThresholds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Threshold The current object (for fluent API support)
     */
    public function setAlarmThresholds(PropelCollection $alarmThresholds, PropelPDO $con = null)
    {
        $alarmThresholdsToDelete = $this->getAlarmThresholds(new Criteria(), $con)->diff($alarmThresholds);

        $this->alarmThresholdsScheduledForDeletion = unserialize(serialize($alarmThresholdsToDelete));

        foreach ($alarmThresholdsToDelete as $alarmThresholdRemoved) {
            $alarmThresholdRemoved->setThreshold(null);
        }

        $this->collAlarmThresholds = null;
        foreach ($alarmThresholds as $alarmThreshold) {
            $this->addAlarmThreshold($alarmThreshold);
        }

        $this->collAlarmThresholds = $alarmThresholds;
        $this->collAlarmThresholdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Alarm objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Alarm objects.
     * @throws PropelException
     */
    public function countAlarmThresholds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlarmThresholdsPartial && !$this->isNew();
        if (null === $this->collAlarmThresholds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlarmThresholds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlarmThresholds());
            }
            $query = AlarmQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByThreshold($this)
                ->count($con);
        }

        return count($this->collAlarmThresholds);
    }

    /**
     * Method called to associate a Alarm object to this object
     * through the Alarm foreign key attribute.
     *
     * @param    Alarm $l Alarm
     * @return Threshold The current object (for fluent API support)
     */
    public function addAlarmThreshold(Alarm $l)
    {
        if ($this->collAlarmThresholds === null) {
            $this->initAlarmThresholds();
            $this->collAlarmThresholdsPartial = true;
        }
        if (!in_array($l, $this->collAlarmThresholds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlarmThreshold($l);
        }

        return $this;
    }

    /**
     * @param	AlarmThreshold $alarmThreshold The alarmThreshold object to add.
     */
    protected function doAddAlarmThreshold($alarmThreshold)
    {
        $this->collAlarmThresholds[]= $alarmThreshold;
        $alarmThreshold->setThreshold($this);
    }

    /**
     * @param	AlarmThreshold $alarmThreshold The alarmThreshold object to remove.
     * @return Threshold The current object (for fluent API support)
     */
    public function removeAlarmThreshold($alarmThreshold)
    {
        if ($this->getAlarmThresholds()->contains($alarmThreshold)) {
            $this->collAlarmThresholds->remove($this->collAlarmThresholds->search($alarmThreshold));
            if (null === $this->alarmThresholdsScheduledForDeletion) {
                $this->alarmThresholdsScheduledForDeletion = clone $this->collAlarmThresholds;
                $this->alarmThresholdsScheduledForDeletion->clear();
            }
            $this->alarmThresholdsScheduledForDeletion[]= clone $alarmThreshold;
            $alarmThreshold->setThreshold(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->thresholdid = null;
        $this->deviceid = null;
        $this->pollid = null;
        $this->trapid = null;
        $this->pluginid = null;
        $this->syslogid = null;
        $this->greaterthan = null;
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
            if ($this->collAlarmThresholds) {
                foreach ($this->collAlarmThresholds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aDevice instanceof Persistent) {
              $this->aDevice->clearAllReferences($deep);
            }
            if ($this->aPoll instanceof Persistent) {
              $this->aPoll->clearAllReferences($deep);
            }
            if ($this->aTrap instanceof Persistent) {
              $this->aTrap->clearAllReferences($deep);
            }
            if ($this->aPlugin instanceof Persistent) {
              $this->aPlugin->clearAllReferences($deep);
            }
            if ($this->aSyslog instanceof Persistent) {
              $this->aSyslog->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlarmThresholds instanceof PropelCollection) {
            $this->collAlarmThresholds->clearIterator();
        }
        $this->collAlarmThresholds = null;
        $this->aDevice = null;
        $this->aPoll = null;
        $this->aTrap = null;
        $this->aPlugin = null;
        $this->aSyslog = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ThresholdPeer::DEFAULT_STRING_FORMAT);
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
