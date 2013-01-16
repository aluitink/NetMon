<?php


/**
 * Base class that represents a row from the 'Plugin' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BasePlugin extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PluginPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PluginPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the pluginid field.
     * @var        int
     */
    protected $pluginid;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the requests field.
     * @var        string
     */
    protected $requests;

    /**
     * The value for the active field.
     * @var        boolean
     */
    protected $active;

    /**
     * @var        PropelObjectCollection|Threshold[] Collection to store aggregation of Threshold objects.
     */
    protected $collPluginThresholds;
    protected $collPluginThresholdsPartial;

    /**
     * @var        PropelObjectCollection|Poll[] Collection to store aggregation of Poll objects.
     */
    protected $collPluginPolls;
    protected $collPluginPollsPartial;

    /**
     * @var        PropelObjectCollection|Monitor[] Collection to store aggregation of Monitor objects.
     */
    protected $collPluginMonitors;
    protected $collPluginMonitorsPartial;

    /**
     * @var        PropelObjectCollection|PluginSetting[] Collection to store aggregation of PluginSetting objects.
     */
    protected $collPluginPluginSettings;
    protected $collPluginPluginSettingsPartial;

    /**
     * @var        PropelObjectCollection|Device[] Collection to store aggregation of Device objects.
     */
    protected $collDevices;

    /**
     * @var        PropelObjectCollection|Adapter[] Collection to store aggregation of Adapter objects.
     */
    protected $collAdapters;

    /**
     * @var        PropelObjectCollection|SnmpProperty[] Collection to store aggregation of SnmpProperty objects.
     */
    protected $collSnmpPropertys;

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
    protected $devicesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $adaptersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $snmpPropertysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pluginThresholdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pluginPollsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pluginMonitorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pluginPluginSettingsScheduledForDeletion = null;

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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [requests] column value.
     *
     * @return string
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Get the [active] column value.
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of [pluginid] column.
     *
     * @param int $v new value
     * @return Plugin The current object (for fluent API support)
     */
    public function setPluginid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pluginid !== $v) {
            $this->pluginid = $v;
            $this->modifiedColumns[] = PluginPeer::PLUGINID;
        }


        return $this;
    } // setPluginid()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Plugin The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = PluginPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Plugin The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = PluginPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [requests] column.
     *
     * @param string $v new value
     * @return Plugin The current object (for fluent API support)
     */
    public function setRequests($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->requests !== $v) {
            $this->requests = $v;
            $this->modifiedColumns[] = PluginPeer::REQUESTS;
        }


        return $this;
    } // setRequests()

    /**
     * Sets the value of the [active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Plugin The current object (for fluent API support)
     */
    public function setActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->active !== $v) {
            $this->active = $v;
            $this->modifiedColumns[] = PluginPeer::ACTIVE;
        }


        return $this;
    } // setActive()

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

            $this->pluginid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->requests = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->active = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = PluginPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Plugin object", $e);
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
            $con = Propel::getConnection(PluginPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PluginPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPluginThresholds = null;

            $this->collPluginPolls = null;

            $this->collPluginMonitors = null;

            $this->collPluginPluginSettings = null;

            $this->collDevices = null;
            $this->collAdapters = null;
            $this->collSnmpPropertys = null;
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
            $con = Propel::getConnection(PluginPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PluginQuery::create()
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
            $con = Propel::getConnection(PluginPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PluginPeer::addInstanceToPool($this);
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

            if ($this->devicesScheduledForDeletion !== null) {
                if (!$this->devicesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->devicesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    PluginMonitorQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->devicesScheduledForDeletion = null;
                }

                foreach ($this->getDevices() as $device) {
                    if ($device->isModified()) {
                        $device->save($con);
                    }
                }
            } elseif ($this->collDevices) {
                foreach ($this->collDevices as $device) {
                    if ($device->isModified()) {
                        $device->save($con);
                    }
                }
            }

            if ($this->adaptersScheduledForDeletion !== null) {
                if (!$this->adaptersScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->adaptersScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    PluginMonitorQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->adaptersScheduledForDeletion = null;
                }

                foreach ($this->getAdapters() as $adapter) {
                    if ($adapter->isModified()) {
                        $adapter->save($con);
                    }
                }
            } elseif ($this->collAdapters) {
                foreach ($this->collAdapters as $adapter) {
                    if ($adapter->isModified()) {
                        $adapter->save($con);
                    }
                }
            }

            if ($this->snmpPropertysScheduledForDeletion !== null) {
                if (!$this->snmpPropertysScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->snmpPropertysScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    PluginMonitorQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->snmpPropertysScheduledForDeletion = null;
                }

                foreach ($this->getSnmpPropertys() as $snmpProperty) {
                    if ($snmpProperty->isModified()) {
                        $snmpProperty->save($con);
                    }
                }
            } elseif ($this->collSnmpPropertys) {
                foreach ($this->collSnmpPropertys as $snmpProperty) {
                    if ($snmpProperty->isModified()) {
                        $snmpProperty->save($con);
                    }
                }
            }

            if ($this->pluginThresholdsScheduledForDeletion !== null) {
                if (!$this->pluginThresholdsScheduledForDeletion->isEmpty()) {
                    ThresholdQuery::create()
                        ->filterByPrimaryKeys($this->pluginThresholdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pluginThresholdsScheduledForDeletion = null;
                }
            }

            if ($this->collPluginThresholds !== null) {
                foreach ($this->collPluginThresholds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pluginPollsScheduledForDeletion !== null) {
                if (!$this->pluginPollsScheduledForDeletion->isEmpty()) {
                    PollQuery::create()
                        ->filterByPrimaryKeys($this->pluginPollsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pluginPollsScheduledForDeletion = null;
                }
            }

            if ($this->collPluginPolls !== null) {
                foreach ($this->collPluginPolls as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pluginMonitorsScheduledForDeletion !== null) {
                if (!$this->pluginMonitorsScheduledForDeletion->isEmpty()) {
                    MonitorQuery::create()
                        ->filterByPrimaryKeys($this->pluginMonitorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pluginMonitorsScheduledForDeletion = null;
                }
            }

            if ($this->collPluginMonitors !== null) {
                foreach ($this->collPluginMonitors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pluginPluginSettingsScheduledForDeletion !== null) {
                if (!$this->pluginPluginSettingsScheduledForDeletion->isEmpty()) {
                    PluginSettingQuery::create()
                        ->filterByPrimaryKeys($this->pluginPluginSettingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pluginPluginSettingsScheduledForDeletion = null;
                }
            }

            if ($this->collPluginPluginSettings !== null) {
                foreach ($this->collPluginPluginSettings as $referrerFK) {
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

        $this->modifiedColumns[] = PluginPeer::PLUGINID;
        if (null !== $this->pluginid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PluginPeer::PLUGINID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PluginPeer::PLUGINID)) {
            $modifiedColumns[':p' . $index++]  = '`PluginId`';
        }
        if ($this->isColumnModified(PluginPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`Name`';
        }
        if ($this->isColumnModified(PluginPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`Description`';
        }
        if ($this->isColumnModified(PluginPeer::REQUESTS)) {
            $modifiedColumns[':p' . $index++]  = '`Requests`';
        }
        if ($this->isColumnModified(PluginPeer::ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`Active`';
        }

        $sql = sprintf(
            'INSERT INTO `Plugin` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`PluginId`':
                        $stmt->bindValue($identifier, $this->pluginid, PDO::PARAM_INT);
                        break;
                    case '`Name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`Description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`Requests`':
                        $stmt->bindValue($identifier, $this->requests, PDO::PARAM_STR);
                        break;
                    case '`Active`':
                        $stmt->bindValue($identifier, (int) $this->active, PDO::PARAM_INT);
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
        $this->setPluginid($pk);

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


            if (($retval = PluginPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPluginThresholds !== null) {
                    foreach ($this->collPluginThresholds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPluginPolls !== null) {
                    foreach ($this->collPluginPolls as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPluginMonitors !== null) {
                    foreach ($this->collPluginMonitors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPluginPluginSettings !== null) {
                    foreach ($this->collPluginPluginSettings as $referrerFK) {
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
        $pos = PluginPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPluginid();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getRequests();
                break;
            case 4:
                return $this->getActive();
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
        if (isset($alreadyDumpedObjects['Plugin'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Plugin'][$this->getPrimaryKey()] = true;
        $keys = PluginPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPluginid(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getRequests(),
            $keys[4] => $this->getActive(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPluginThresholds) {
                $result['PluginThresholds'] = $this->collPluginThresholds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPluginPolls) {
                $result['PluginPolls'] = $this->collPluginPolls->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPluginMonitors) {
                $result['PluginMonitors'] = $this->collPluginMonitors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPluginPluginSettings) {
                $result['PluginPluginSettings'] = $this->collPluginPluginSettings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PluginPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPluginid($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setRequests($value);
                break;
            case 4:
                $this->setActive($value);
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
        $keys = PluginPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPluginid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRequests($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setActive($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PluginPeer::DATABASE_NAME);

        if ($this->isColumnModified(PluginPeer::PLUGINID)) $criteria->add(PluginPeer::PLUGINID, $this->pluginid);
        if ($this->isColumnModified(PluginPeer::NAME)) $criteria->add(PluginPeer::NAME, $this->name);
        if ($this->isColumnModified(PluginPeer::DESCRIPTION)) $criteria->add(PluginPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(PluginPeer::REQUESTS)) $criteria->add(PluginPeer::REQUESTS, $this->requests);
        if ($this->isColumnModified(PluginPeer::ACTIVE)) $criteria->add(PluginPeer::ACTIVE, $this->active);

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
        $criteria = new Criteria(PluginPeer::DATABASE_NAME);
        $criteria->add(PluginPeer::PLUGINID, $this->pluginid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getPluginid();
    }

    /**
     * Generic method to set the primary key (pluginid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPluginid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPluginid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Plugin (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setRequests($this->getRequests());
        $copyObj->setActive($this->getActive());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPluginThresholds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPluginThreshold($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPluginPolls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPluginPoll($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPluginMonitors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPluginMonitor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPluginPluginSettings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPluginPluginSetting($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPluginid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Plugin Clone of current object.
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
     * @return PluginPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PluginPeer();
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
        if ('PluginThreshold' == $relationName) {
            $this->initPluginThresholds();
        }
        if ('PluginPoll' == $relationName) {
            $this->initPluginPolls();
        }
        if ('PluginMonitor' == $relationName) {
            $this->initPluginMonitors();
        }
        if ('PluginPluginSetting' == $relationName) {
            $this->initPluginPluginSettings();
        }
    }

    /**
     * Clears out the collPluginThresholds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Plugin The current object (for fluent API support)
     * @see        addPluginThresholds()
     */
    public function clearPluginThresholds()
    {
        $this->collPluginThresholds = null; // important to set this to null since that means it is uninitialized
        $this->collPluginThresholdsPartial = null;

        return $this;
    }

    /**
     * reset is the collPluginThresholds collection loaded partially
     *
     * @return void
     */
    public function resetPartialPluginThresholds($v = true)
    {
        $this->collPluginThresholdsPartial = $v;
    }

    /**
     * Initializes the collPluginThresholds collection.
     *
     * By default this just sets the collPluginThresholds collection to an empty array (like clearcollPluginThresholds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPluginThresholds($overrideExisting = true)
    {
        if (null !== $this->collPluginThresholds && !$overrideExisting) {
            return;
        }
        $this->collPluginThresholds = new PropelObjectCollection();
        $this->collPluginThresholds->setModel('Threshold');
    }

    /**
     * Gets an array of Threshold objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Plugin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     * @throws PropelException
     */
    public function getPluginThresholds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPluginThresholdsPartial && !$this->isNew();
        if (null === $this->collPluginThresholds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPluginThresholds) {
                // return empty collection
                $this->initPluginThresholds();
            } else {
                $collPluginThresholds = ThresholdQuery::create(null, $criteria)
                    ->filterByPlugin($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPluginThresholdsPartial && count($collPluginThresholds)) {
                      $this->initPluginThresholds(false);

                      foreach($collPluginThresholds as $obj) {
                        if (false == $this->collPluginThresholds->contains($obj)) {
                          $this->collPluginThresholds->append($obj);
                        }
                      }

                      $this->collPluginThresholdsPartial = true;
                    }

                    $collPluginThresholds->getInternalIterator()->rewind();
                    return $collPluginThresholds;
                }

                if($partial && $this->collPluginThresholds) {
                    foreach($this->collPluginThresholds as $obj) {
                        if($obj->isNew()) {
                            $collPluginThresholds[] = $obj;
                        }
                    }
                }

                $this->collPluginThresholds = $collPluginThresholds;
                $this->collPluginThresholdsPartial = false;
            }
        }

        return $this->collPluginThresholds;
    }

    /**
     * Sets a collection of PluginThreshold objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pluginThresholds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Plugin The current object (for fluent API support)
     */
    public function setPluginThresholds(PropelCollection $pluginThresholds, PropelPDO $con = null)
    {
        $pluginThresholdsToDelete = $this->getPluginThresholds(new Criteria(), $con)->diff($pluginThresholds);

        $this->pluginThresholdsScheduledForDeletion = unserialize(serialize($pluginThresholdsToDelete));

        foreach ($pluginThresholdsToDelete as $pluginThresholdRemoved) {
            $pluginThresholdRemoved->setPlugin(null);
        }

        $this->collPluginThresholds = null;
        foreach ($pluginThresholds as $pluginThreshold) {
            $this->addPluginThreshold($pluginThreshold);
        }

        $this->collPluginThresholds = $pluginThresholds;
        $this->collPluginThresholdsPartial = false;

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
    public function countPluginThresholds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPluginThresholdsPartial && !$this->isNew();
        if (null === $this->collPluginThresholds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPluginThresholds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPluginThresholds());
            }
            $query = ThresholdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPlugin($this)
                ->count($con);
        }

        return count($this->collPluginThresholds);
    }

    /**
     * Method called to associate a Threshold object to this object
     * through the Threshold foreign key attribute.
     *
     * @param    Threshold $l Threshold
     * @return Plugin The current object (for fluent API support)
     */
    public function addPluginThreshold(Threshold $l)
    {
        if ($this->collPluginThresholds === null) {
            $this->initPluginThresholds();
            $this->collPluginThresholdsPartial = true;
        }
        if (!in_array($l, $this->collPluginThresholds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPluginThreshold($l);
        }

        return $this;
    }

    /**
     * @param	PluginThreshold $pluginThreshold The pluginThreshold object to add.
     */
    protected function doAddPluginThreshold($pluginThreshold)
    {
        $this->collPluginThresholds[]= $pluginThreshold;
        $pluginThreshold->setPlugin($this);
    }

    /**
     * @param	PluginThreshold $pluginThreshold The pluginThreshold object to remove.
     * @return Plugin The current object (for fluent API support)
     */
    public function removePluginThreshold($pluginThreshold)
    {
        if ($this->getPluginThresholds()->contains($pluginThreshold)) {
            $this->collPluginThresholds->remove($this->collPluginThresholds->search($pluginThreshold));
            if (null === $this->pluginThresholdsScheduledForDeletion) {
                $this->pluginThresholdsScheduledForDeletion = clone $this->collPluginThresholds;
                $this->pluginThresholdsScheduledForDeletion->clear();
            }
            $this->pluginThresholdsScheduledForDeletion[]= clone $pluginThreshold;
            $pluginThreshold->setPlugin(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPluginThresholdsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getPluginThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPluginThresholdsJoinPoll($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Poll', $join_behavior);

        return $this->getPluginThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPluginThresholdsJoinTrap($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Trap', $join_behavior);

        return $this->getPluginThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getPluginThresholdsJoinSyslog($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Syslog', $join_behavior);

        return $this->getPluginThresholds($query, $con);
    }

    /**
     * Clears out the collPluginPolls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Plugin The current object (for fluent API support)
     * @see        addPluginPolls()
     */
    public function clearPluginPolls()
    {
        $this->collPluginPolls = null; // important to set this to null since that means it is uninitialized
        $this->collPluginPollsPartial = null;

        return $this;
    }

    /**
     * reset is the collPluginPolls collection loaded partially
     *
     * @return void
     */
    public function resetPartialPluginPolls($v = true)
    {
        $this->collPluginPollsPartial = $v;
    }

    /**
     * Initializes the collPluginPolls collection.
     *
     * By default this just sets the collPluginPolls collection to an empty array (like clearcollPluginPolls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPluginPolls($overrideExisting = true)
    {
        if (null !== $this->collPluginPolls && !$overrideExisting) {
            return;
        }
        $this->collPluginPolls = new PropelObjectCollection();
        $this->collPluginPolls->setModel('Poll');
    }

    /**
     * Gets an array of Poll objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Plugin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Poll[] List of Poll objects
     * @throws PropelException
     */
    public function getPluginPolls($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPluginPollsPartial && !$this->isNew();
        if (null === $this->collPluginPolls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPluginPolls) {
                // return empty collection
                $this->initPluginPolls();
            } else {
                $collPluginPolls = PollQuery::create(null, $criteria)
                    ->filterByPlugin($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPluginPollsPartial && count($collPluginPolls)) {
                      $this->initPluginPolls(false);

                      foreach($collPluginPolls as $obj) {
                        if (false == $this->collPluginPolls->contains($obj)) {
                          $this->collPluginPolls->append($obj);
                        }
                      }

                      $this->collPluginPollsPartial = true;
                    }

                    $collPluginPolls->getInternalIterator()->rewind();
                    return $collPluginPolls;
                }

                if($partial && $this->collPluginPolls) {
                    foreach($this->collPluginPolls as $obj) {
                        if($obj->isNew()) {
                            $collPluginPolls[] = $obj;
                        }
                    }
                }

                $this->collPluginPolls = $collPluginPolls;
                $this->collPluginPollsPartial = false;
            }
        }

        return $this->collPluginPolls;
    }

    /**
     * Sets a collection of PluginPoll objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pluginPolls A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Plugin The current object (for fluent API support)
     */
    public function setPluginPolls(PropelCollection $pluginPolls, PropelPDO $con = null)
    {
        $pluginPollsToDelete = $this->getPluginPolls(new Criteria(), $con)->diff($pluginPolls);

        $this->pluginPollsScheduledForDeletion = unserialize(serialize($pluginPollsToDelete));

        foreach ($pluginPollsToDelete as $pluginPollRemoved) {
            $pluginPollRemoved->setPlugin(null);
        }

        $this->collPluginPolls = null;
        foreach ($pluginPolls as $pluginPoll) {
            $this->addPluginPoll($pluginPoll);
        }

        $this->collPluginPolls = $pluginPolls;
        $this->collPluginPollsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Poll objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Poll objects.
     * @throws PropelException
     */
    public function countPluginPolls(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPluginPollsPartial && !$this->isNew();
        if (null === $this->collPluginPolls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPluginPolls) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPluginPolls());
            }
            $query = PollQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPlugin($this)
                ->count($con);
        }

        return count($this->collPluginPolls);
    }

    /**
     * Method called to associate a Poll object to this object
     * through the Poll foreign key attribute.
     *
     * @param    Poll $l Poll
     * @return Plugin The current object (for fluent API support)
     */
    public function addPluginPoll(Poll $l)
    {
        if ($this->collPluginPolls === null) {
            $this->initPluginPolls();
            $this->collPluginPollsPartial = true;
        }
        if (!in_array($l, $this->collPluginPolls->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPluginPoll($l);
        }

        return $this;
    }

    /**
     * @param	PluginPoll $pluginPoll The pluginPoll object to add.
     */
    protected function doAddPluginPoll($pluginPoll)
    {
        $this->collPluginPolls[]= $pluginPoll;
        $pluginPoll->setPlugin($this);
    }

    /**
     * @param	PluginPoll $pluginPoll The pluginPoll object to remove.
     * @return Plugin The current object (for fluent API support)
     */
    public function removePluginPoll($pluginPoll)
    {
        if ($this->getPluginPolls()->contains($pluginPoll)) {
            $this->collPluginPolls->remove($this->collPluginPolls->search($pluginPoll));
            if (null === $this->pluginPollsScheduledForDeletion) {
                $this->pluginPollsScheduledForDeletion = clone $this->collPluginPolls;
                $this->pluginPollsScheduledForDeletion->clear();
            }
            $this->pluginPollsScheduledForDeletion[]= clone $pluginPoll;
            $pluginPoll->setPlugin(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginPolls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Poll[] List of Poll objects
     */
    public function getPluginPollsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PollQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getPluginPolls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginPolls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Poll[] List of Poll objects
     */
    public function getPluginPollsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PollQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getPluginPolls($query, $con);
    }

    /**
     * Clears out the collPluginMonitors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Plugin The current object (for fluent API support)
     * @see        addPluginMonitors()
     */
    public function clearPluginMonitors()
    {
        $this->collPluginMonitors = null; // important to set this to null since that means it is uninitialized
        $this->collPluginMonitorsPartial = null;

        return $this;
    }

    /**
     * reset is the collPluginMonitors collection loaded partially
     *
     * @return void
     */
    public function resetPartialPluginMonitors($v = true)
    {
        $this->collPluginMonitorsPartial = $v;
    }

    /**
     * Initializes the collPluginMonitors collection.
     *
     * By default this just sets the collPluginMonitors collection to an empty array (like clearcollPluginMonitors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPluginMonitors($overrideExisting = true)
    {
        if (null !== $this->collPluginMonitors && !$overrideExisting) {
            return;
        }
        $this->collPluginMonitors = new PropelObjectCollection();
        $this->collPluginMonitors->setModel('Monitor');
    }

    /**
     * Gets an array of Monitor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Plugin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     * @throws PropelException
     */
    public function getPluginMonitors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPluginMonitorsPartial && !$this->isNew();
        if (null === $this->collPluginMonitors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPluginMonitors) {
                // return empty collection
                $this->initPluginMonitors();
            } else {
                $collPluginMonitors = MonitorQuery::create(null, $criteria)
                    ->filterByPlugin($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPluginMonitorsPartial && count($collPluginMonitors)) {
                      $this->initPluginMonitors(false);

                      foreach($collPluginMonitors as $obj) {
                        if (false == $this->collPluginMonitors->contains($obj)) {
                          $this->collPluginMonitors->append($obj);
                        }
                      }

                      $this->collPluginMonitorsPartial = true;
                    }

                    $collPluginMonitors->getInternalIterator()->rewind();
                    return $collPluginMonitors;
                }

                if($partial && $this->collPluginMonitors) {
                    foreach($this->collPluginMonitors as $obj) {
                        if($obj->isNew()) {
                            $collPluginMonitors[] = $obj;
                        }
                    }
                }

                $this->collPluginMonitors = $collPluginMonitors;
                $this->collPluginMonitorsPartial = false;
            }
        }

        return $this->collPluginMonitors;
    }

    /**
     * Sets a collection of PluginMonitor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pluginMonitors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Plugin The current object (for fluent API support)
     */
    public function setPluginMonitors(PropelCollection $pluginMonitors, PropelPDO $con = null)
    {
        $pluginMonitorsToDelete = $this->getPluginMonitors(new Criteria(), $con)->diff($pluginMonitors);

        $this->pluginMonitorsScheduledForDeletion = unserialize(serialize($pluginMonitorsToDelete));

        foreach ($pluginMonitorsToDelete as $pluginMonitorRemoved) {
            $pluginMonitorRemoved->setPlugin(null);
        }

        $this->collPluginMonitors = null;
        foreach ($pluginMonitors as $pluginMonitor) {
            $this->addPluginMonitor($pluginMonitor);
        }

        $this->collPluginMonitors = $pluginMonitors;
        $this->collPluginMonitorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Monitor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Monitor objects.
     * @throws PropelException
     */
    public function countPluginMonitors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPluginMonitorsPartial && !$this->isNew();
        if (null === $this->collPluginMonitors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPluginMonitors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPluginMonitors());
            }
            $query = MonitorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPlugin($this)
                ->count($con);
        }

        return count($this->collPluginMonitors);
    }

    /**
     * Method called to associate a Monitor object to this object
     * through the Monitor foreign key attribute.
     *
     * @param    Monitor $l Monitor
     * @return Plugin The current object (for fluent API support)
     */
    public function addPluginMonitor(Monitor $l)
    {
        if ($this->collPluginMonitors === null) {
            $this->initPluginMonitors();
            $this->collPluginMonitorsPartial = true;
        }
        if (!in_array($l, $this->collPluginMonitors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPluginMonitor($l);
        }

        return $this;
    }

    /**
     * @param	PluginMonitor $pluginMonitor The pluginMonitor object to add.
     */
    protected function doAddPluginMonitor($pluginMonitor)
    {
        $this->collPluginMonitors[]= $pluginMonitor;
        $pluginMonitor->setPlugin($this);
    }

    /**
     * @param	PluginMonitor $pluginMonitor The pluginMonitor object to remove.
     * @return Plugin The current object (for fluent API support)
     */
    public function removePluginMonitor($pluginMonitor)
    {
        if ($this->getPluginMonitors()->contains($pluginMonitor)) {
            $this->collPluginMonitors->remove($this->collPluginMonitors->search($pluginMonitor));
            if (null === $this->pluginMonitorsScheduledForDeletion) {
                $this->pluginMonitorsScheduledForDeletion = clone $this->collPluginMonitors;
                $this->pluginMonitorsScheduledForDeletion->clear();
            }
            $this->pluginMonitorsScheduledForDeletion[]= clone $pluginMonitor;
            $pluginMonitor->setPlugin(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getPluginMonitorsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getPluginMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getPluginMonitorsJoinAdapter($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Adapter', $join_behavior);

        return $this->getPluginMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Plugin is new, it will return
     * an empty collection; or if this Plugin has previously
     * been saved, it will retrieve related PluginMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Plugin.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getPluginMonitorsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getPluginMonitors($query, $con);
    }

    /**
     * Clears out the collPluginPluginSettings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Plugin The current object (for fluent API support)
     * @see        addPluginPluginSettings()
     */
    public function clearPluginPluginSettings()
    {
        $this->collPluginPluginSettings = null; // important to set this to null since that means it is uninitialized
        $this->collPluginPluginSettingsPartial = null;

        return $this;
    }

    /**
     * reset is the collPluginPluginSettings collection loaded partially
     *
     * @return void
     */
    public function resetPartialPluginPluginSettings($v = true)
    {
        $this->collPluginPluginSettingsPartial = $v;
    }

    /**
     * Initializes the collPluginPluginSettings collection.
     *
     * By default this just sets the collPluginPluginSettings collection to an empty array (like clearcollPluginPluginSettings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPluginPluginSettings($overrideExisting = true)
    {
        if (null !== $this->collPluginPluginSettings && !$overrideExisting) {
            return;
        }
        $this->collPluginPluginSettings = new PropelObjectCollection();
        $this->collPluginPluginSettings->setModel('PluginSetting');
    }

    /**
     * Gets an array of PluginSetting objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Plugin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PluginSetting[] List of PluginSetting objects
     * @throws PropelException
     */
    public function getPluginPluginSettings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPluginPluginSettingsPartial && !$this->isNew();
        if (null === $this->collPluginPluginSettings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPluginPluginSettings) {
                // return empty collection
                $this->initPluginPluginSettings();
            } else {
                $collPluginPluginSettings = PluginSettingQuery::create(null, $criteria)
                    ->filterByPlugin($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPluginPluginSettingsPartial && count($collPluginPluginSettings)) {
                      $this->initPluginPluginSettings(false);

                      foreach($collPluginPluginSettings as $obj) {
                        if (false == $this->collPluginPluginSettings->contains($obj)) {
                          $this->collPluginPluginSettings->append($obj);
                        }
                      }

                      $this->collPluginPluginSettingsPartial = true;
                    }

                    $collPluginPluginSettings->getInternalIterator()->rewind();
                    return $collPluginPluginSettings;
                }

                if($partial && $this->collPluginPluginSettings) {
                    foreach($this->collPluginPluginSettings as $obj) {
                        if($obj->isNew()) {
                            $collPluginPluginSettings[] = $obj;
                        }
                    }
                }

                $this->collPluginPluginSettings = $collPluginPluginSettings;
                $this->collPluginPluginSettingsPartial = false;
            }
        }

        return $this->collPluginPluginSettings;
    }

    /**
     * Sets a collection of PluginPluginSetting objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pluginPluginSettings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Plugin The current object (for fluent API support)
     */
    public function setPluginPluginSettings(PropelCollection $pluginPluginSettings, PropelPDO $con = null)
    {
        $pluginPluginSettingsToDelete = $this->getPluginPluginSettings(new Criteria(), $con)->diff($pluginPluginSettings);

        $this->pluginPluginSettingsScheduledForDeletion = unserialize(serialize($pluginPluginSettingsToDelete));

        foreach ($pluginPluginSettingsToDelete as $pluginPluginSettingRemoved) {
            $pluginPluginSettingRemoved->setPlugin(null);
        }

        $this->collPluginPluginSettings = null;
        foreach ($pluginPluginSettings as $pluginPluginSetting) {
            $this->addPluginPluginSetting($pluginPluginSetting);
        }

        $this->collPluginPluginSettings = $pluginPluginSettings;
        $this->collPluginPluginSettingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PluginSetting objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PluginSetting objects.
     * @throws PropelException
     */
    public function countPluginPluginSettings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPluginPluginSettingsPartial && !$this->isNew();
        if (null === $this->collPluginPluginSettings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPluginPluginSettings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPluginPluginSettings());
            }
            $query = PluginSettingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPlugin($this)
                ->count($con);
        }

        return count($this->collPluginPluginSettings);
    }

    /**
     * Method called to associate a PluginSetting object to this object
     * through the PluginSetting foreign key attribute.
     *
     * @param    PluginSetting $l PluginSetting
     * @return Plugin The current object (for fluent API support)
     */
    public function addPluginPluginSetting(PluginSetting $l)
    {
        if ($this->collPluginPluginSettings === null) {
            $this->initPluginPluginSettings();
            $this->collPluginPluginSettingsPartial = true;
        }
        if (!in_array($l, $this->collPluginPluginSettings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPluginPluginSetting($l);
        }

        return $this;
    }

    /**
     * @param	PluginPluginSetting $pluginPluginSetting The pluginPluginSetting object to add.
     */
    protected function doAddPluginPluginSetting($pluginPluginSetting)
    {
        $this->collPluginPluginSettings[]= $pluginPluginSetting;
        $pluginPluginSetting->setPlugin($this);
    }

    /**
     * @param	PluginPluginSetting $pluginPluginSetting The pluginPluginSetting object to remove.
     * @return Plugin The current object (for fluent API support)
     */
    public function removePluginPluginSetting($pluginPluginSetting)
    {
        if ($this->getPluginPluginSettings()->contains($pluginPluginSetting)) {
            $this->collPluginPluginSettings->remove($this->collPluginPluginSettings->search($pluginPluginSetting));
            if (null === $this->pluginPluginSettingsScheduledForDeletion) {
                $this->pluginPluginSettingsScheduledForDeletion = clone $this->collPluginPluginSettings;
                $this->pluginPluginSettingsScheduledForDeletion->clear();
            }
            $this->pluginPluginSettingsScheduledForDeletion[]= clone $pluginPluginSetting;
            $pluginPluginSetting->setPlugin(null);
        }

        return $this;
    }

    /**
     * Clears out the collDevices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Plugin The current object (for fluent API support)
     * @see        addDevices()
     */
    public function clearDevices()
    {
        $this->collDevices = null; // important to set this to null since that means it is uninitialized
        $this->collDevicesPartial = null;

        return $this;
    }

    /**
     * Initializes the collDevices collection.
     *
     * By default this just sets the collDevices collection to an empty collection (like clearDevices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initDevices()
    {
        $this->collDevices = new PropelObjectCollection();
        $this->collDevices->setModel('Device');
    }

    /**
     * Gets a collection of Device objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Plugin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Device[] List of Device objects
     */
    public function getDevices($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collDevices || null !== $criteria) {
            if ($this->isNew() && null === $this->collDevices) {
                // return empty collection
                $this->initDevices();
            } else {
                $collDevices = DeviceQuery::create(null, $criteria)
                    ->filterByPlugin($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collDevices;
                }
                $this->collDevices = $collDevices;
            }
        }

        return $this->collDevices;
    }

    /**
     * Sets a collection of Device objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $devices A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Plugin The current object (for fluent API support)
     */
    public function setDevices(PropelCollection $devices, PropelPDO $con = null)
    {
        $this->clearDevices();
        $currentDevices = $this->getDevices();

        $this->devicesScheduledForDeletion = $currentDevices->diff($devices);

        foreach ($devices as $device) {
            if (!$currentDevices->contains($device)) {
                $this->doAddDevice($device);
            }
        }

        $this->collDevices = $devices;

        return $this;
    }

    /**
     * Gets the number of Device objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Device objects
     */
    public function countDevices($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collDevices || null !== $criteria) {
            if ($this->isNew() && null === $this->collDevices) {
                return 0;
            } else {
                $query = DeviceQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPlugin($this)
                    ->count($con);
            }
        } else {
            return count($this->collDevices);
        }
    }

    /**
     * Associate a Device object to this object
     * through the Monitor cross reference table.
     *
     * @param  Device $device The Monitor object to relate
     * @return Plugin The current object (for fluent API support)
     */
    public function addDevice(Device $device)
    {
        if ($this->collDevices === null) {
            $this->initDevices();
        }
        if (!$this->collDevices->contains($device)) { // only add it if the **same** object is not already associated
            $this->doAddDevice($device);

            $this->collDevices[]= $device;
        }

        return $this;
    }

    /**
     * @param	Device $device The device object to add.
     */
    protected function doAddDevice($device)
    {
        $monitor = new Monitor();
        $monitor->setDevice($device);
        $this->addPluginMonitor($monitor);
    }

    /**
     * Remove a Device object to this object
     * through the Monitor cross reference table.
     *
     * @param Device $device The Monitor object to relate
     * @return Plugin The current object (for fluent API support)
     */
    public function removeDevice(Device $device)
    {
        if ($this->getDevices()->contains($device)) {
            $this->collDevices->remove($this->collDevices->search($device));
            if (null === $this->devicesScheduledForDeletion) {
                $this->devicesScheduledForDeletion = clone $this->collDevices;
                $this->devicesScheduledForDeletion->clear();
            }
            $this->devicesScheduledForDeletion[]= $device;
        }

        return $this;
    }

    /**
     * Clears out the collAdapters collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Plugin The current object (for fluent API support)
     * @see        addAdapters()
     */
    public function clearAdapters()
    {
        $this->collAdapters = null; // important to set this to null since that means it is uninitialized
        $this->collAdaptersPartial = null;

        return $this;
    }

    /**
     * Initializes the collAdapters collection.
     *
     * By default this just sets the collAdapters collection to an empty collection (like clearAdapters());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initAdapters()
    {
        $this->collAdapters = new PropelObjectCollection();
        $this->collAdapters->setModel('Adapter');
    }

    /**
     * Gets a collection of Adapter objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Plugin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Adapter[] List of Adapter objects
     */
    public function getAdapters($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAdapters || null !== $criteria) {
            if ($this->isNew() && null === $this->collAdapters) {
                // return empty collection
                $this->initAdapters();
            } else {
                $collAdapters = AdapterQuery::create(null, $criteria)
                    ->filterByPlugin($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAdapters;
                }
                $this->collAdapters = $collAdapters;
            }
        }

        return $this->collAdapters;
    }

    /**
     * Sets a collection of Adapter objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $adapters A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Plugin The current object (for fluent API support)
     */
    public function setAdapters(PropelCollection $adapters, PropelPDO $con = null)
    {
        $this->clearAdapters();
        $currentAdapters = $this->getAdapters();

        $this->adaptersScheduledForDeletion = $currentAdapters->diff($adapters);

        foreach ($adapters as $adapter) {
            if (!$currentAdapters->contains($adapter)) {
                $this->doAddAdapter($adapter);
            }
        }

        $this->collAdapters = $adapters;

        return $this;
    }

    /**
     * Gets the number of Adapter objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Adapter objects
     */
    public function countAdapters($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAdapters || null !== $criteria) {
            if ($this->isNew() && null === $this->collAdapters) {
                return 0;
            } else {
                $query = AdapterQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPlugin($this)
                    ->count($con);
            }
        } else {
            return count($this->collAdapters);
        }
    }

    /**
     * Associate a Adapter object to this object
     * through the Monitor cross reference table.
     *
     * @param  Adapter $adapter The Monitor object to relate
     * @return Plugin The current object (for fluent API support)
     */
    public function addAdapter(Adapter $adapter)
    {
        if ($this->collAdapters === null) {
            $this->initAdapters();
        }
        if (!$this->collAdapters->contains($adapter)) { // only add it if the **same** object is not already associated
            $this->doAddAdapter($adapter);

            $this->collAdapters[]= $adapter;
        }

        return $this;
    }

    /**
     * @param	Adapter $adapter The adapter object to add.
     */
    protected function doAddAdapter($adapter)
    {
        $monitor = new Monitor();
        $monitor->setAdapter($adapter);
        $this->addPluginMonitor($monitor);
    }

    /**
     * Remove a Adapter object to this object
     * through the Monitor cross reference table.
     *
     * @param Adapter $adapter The Monitor object to relate
     * @return Plugin The current object (for fluent API support)
     */
    public function removeAdapter(Adapter $adapter)
    {
        if ($this->getAdapters()->contains($adapter)) {
            $this->collAdapters->remove($this->collAdapters->search($adapter));
            if (null === $this->adaptersScheduledForDeletion) {
                $this->adaptersScheduledForDeletion = clone $this->collAdapters;
                $this->adaptersScheduledForDeletion->clear();
            }
            $this->adaptersScheduledForDeletion[]= $adapter;
        }

        return $this;
    }

    /**
     * Clears out the collSnmpPropertys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Plugin The current object (for fluent API support)
     * @see        addSnmpPropertys()
     */
    public function clearSnmpPropertys()
    {
        $this->collSnmpPropertys = null; // important to set this to null since that means it is uninitialized
        $this->collSnmpPropertysPartial = null;

        return $this;
    }

    /**
     * Initializes the collSnmpPropertys collection.
     *
     * By default this just sets the collSnmpPropertys collection to an empty collection (like clearSnmpPropertys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initSnmpPropertys()
    {
        $this->collSnmpPropertys = new PropelObjectCollection();
        $this->collSnmpPropertys->setModel('SnmpProperty');
    }

    /**
     * Gets a collection of SnmpProperty objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Plugin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|SnmpProperty[] List of SnmpProperty objects
     */
    public function getSnmpPropertys($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSnmpPropertys || null !== $criteria) {
            if ($this->isNew() && null === $this->collSnmpPropertys) {
                // return empty collection
                $this->initSnmpPropertys();
            } else {
                $collSnmpPropertys = SnmpPropertyQuery::create(null, $criteria)
                    ->filterByPlugin($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSnmpPropertys;
                }
                $this->collSnmpPropertys = $collSnmpPropertys;
            }
        }

        return $this->collSnmpPropertys;
    }

    /**
     * Sets a collection of SnmpProperty objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $snmpPropertys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Plugin The current object (for fluent API support)
     */
    public function setSnmpPropertys(PropelCollection $snmpPropertys, PropelPDO $con = null)
    {
        $this->clearSnmpPropertys();
        $currentSnmpPropertys = $this->getSnmpPropertys();

        $this->snmpPropertysScheduledForDeletion = $currentSnmpPropertys->diff($snmpPropertys);

        foreach ($snmpPropertys as $snmpProperty) {
            if (!$currentSnmpPropertys->contains($snmpProperty)) {
                $this->doAddSnmpProperty($snmpProperty);
            }
        }

        $this->collSnmpPropertys = $snmpPropertys;

        return $this;
    }

    /**
     * Gets the number of SnmpProperty objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related SnmpProperty objects
     */
    public function countSnmpPropertys($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSnmpPropertys || null !== $criteria) {
            if ($this->isNew() && null === $this->collSnmpPropertys) {
                return 0;
            } else {
                $query = SnmpPropertyQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPlugin($this)
                    ->count($con);
            }
        } else {
            return count($this->collSnmpPropertys);
        }
    }

    /**
     * Associate a SnmpProperty object to this object
     * through the Monitor cross reference table.
     *
     * @param  SnmpProperty $snmpProperty The Monitor object to relate
     * @return Plugin The current object (for fluent API support)
     */
    public function addSnmpProperty(SnmpProperty $snmpProperty)
    {
        if ($this->collSnmpPropertys === null) {
            $this->initSnmpPropertys();
        }
        if (!$this->collSnmpPropertys->contains($snmpProperty)) { // only add it if the **same** object is not already associated
            $this->doAddSnmpProperty($snmpProperty);

            $this->collSnmpPropertys[]= $snmpProperty;
        }

        return $this;
    }

    /**
     * @param	SnmpProperty $snmpProperty The snmpProperty object to add.
     */
    protected function doAddSnmpProperty($snmpProperty)
    {
        $monitor = new Monitor();
        $monitor->setSnmpProperty($snmpProperty);
        $this->addPluginMonitor($monitor);
    }

    /**
     * Remove a SnmpProperty object to this object
     * through the Monitor cross reference table.
     *
     * @param SnmpProperty $snmpProperty The Monitor object to relate
     * @return Plugin The current object (for fluent API support)
     */
    public function removeSnmpProperty(SnmpProperty $snmpProperty)
    {
        if ($this->getSnmpPropertys()->contains($snmpProperty)) {
            $this->collSnmpPropertys->remove($this->collSnmpPropertys->search($snmpProperty));
            if (null === $this->snmpPropertysScheduledForDeletion) {
                $this->snmpPropertysScheduledForDeletion = clone $this->collSnmpPropertys;
                $this->snmpPropertysScheduledForDeletion->clear();
            }
            $this->snmpPropertysScheduledForDeletion[]= $snmpProperty;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->pluginid = null;
        $this->name = null;
        $this->description = null;
        $this->requests = null;
        $this->active = null;
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
            if ($this->collPluginThresholds) {
                foreach ($this->collPluginThresholds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPluginPolls) {
                foreach ($this->collPluginPolls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPluginMonitors) {
                foreach ($this->collPluginMonitors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPluginPluginSettings) {
                foreach ($this->collPluginPluginSettings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDevices) {
                foreach ($this->collDevices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAdapters) {
                foreach ($this->collAdapters as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSnmpPropertys) {
                foreach ($this->collSnmpPropertys as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPluginThresholds instanceof PropelCollection) {
            $this->collPluginThresholds->clearIterator();
        }
        $this->collPluginThresholds = null;
        if ($this->collPluginPolls instanceof PropelCollection) {
            $this->collPluginPolls->clearIterator();
        }
        $this->collPluginPolls = null;
        if ($this->collPluginMonitors instanceof PropelCollection) {
            $this->collPluginMonitors->clearIterator();
        }
        $this->collPluginMonitors = null;
        if ($this->collPluginPluginSettings instanceof PropelCollection) {
            $this->collPluginPluginSettings->clearIterator();
        }
        $this->collPluginPluginSettings = null;
        if ($this->collDevices instanceof PropelCollection) {
            $this->collDevices->clearIterator();
        }
        $this->collDevices = null;
        if ($this->collAdapters instanceof PropelCollection) {
            $this->collAdapters->clearIterator();
        }
        $this->collAdapters = null;
        if ($this->collSnmpPropertys instanceof PropelCollection) {
            $this->collSnmpPropertys->clearIterator();
        }
        $this->collSnmpPropertys = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PluginPeer::DEFAULT_STRING_FORMAT);
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
