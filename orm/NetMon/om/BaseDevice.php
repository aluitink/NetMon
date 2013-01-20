<?php


/**
 * Base class that represents a row from the 'Device' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseDevice extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DevicePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DevicePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the deviceid field.
     * @var        int
     */
    protected $deviceid;

    /**
     * The value for the devicetypeid field.
     * @var        int
     */
    protected $devicetypeid;

    /**
     * The value for the hostname field.
     * @var        string
     */
    protected $hostname;

    /**
     * The value for the ipaddress field.
     * @var        string
     */
    protected $ipaddress;

    /**
     * The value for the dateadded field.
     * @var        string
     */
    protected $dateadded;

    /**
     * The value for the dateremoved field.
     * @var        string
     */
    protected $dateremoved;

    /**
     * The value for the active field.
     * @var        boolean
     */
    protected $active;

    /**
     * The value for the modified field.
     * @var        boolean
     */
    protected $modified;

    /**
     * @var        DeviceType
     */
    protected $aDeviceType;

    /**
     * @var        PropelObjectCollection|Threshold[] Collection to store aggregation of Threshold objects.
     */
    protected $collDeviceThresholds;
    protected $collDeviceThresholdsPartial;

    /**
     * @var        PropelObjectCollection|Adapter[] Collection to store aggregation of Adapter objects.
     */
    protected $collDeviceAdapters;
    protected $collDeviceAdaptersPartial;

    /**
     * @var        PropelObjectCollection|Poll[] Collection to store aggregation of Poll objects.
     */
    protected $collDevicePolls;
    protected $collDevicePollsPartial;

    /**
     * @var        PropelObjectCollection|Monitor[] Collection to store aggregation of Monitor objects.
     */
    protected $collDeviceMonitors;
    protected $collDeviceMonitorsPartial;

    /**
     * @var        PropelObjectCollection|Syslog[] Collection to store aggregation of Syslog objects.
     */
    protected $collDeviceSyslogs;
    protected $collDeviceSyslogsPartial;

    /**
     * @var        PropelObjectCollection|Trap[] Collection to store aggregation of Trap objects.
     */
    protected $collDeviceTraps;
    protected $collDeviceTrapsPartial;

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
    protected $deviceThresholdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $deviceAdaptersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $devicePollsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $deviceMonitorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $deviceSyslogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $deviceTrapsScheduledForDeletion = null;

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
     * Get the [devicetypeid] column value.
     *
     * @return int
     */
    public function getDevicetypeid()
    {
        return $this->devicetypeid;
    }

    /**
     * Get the [hostname] column value.
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Get the [ipaddress] column value.
     *
     * @return string
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Get the [optionally formatted] temporal [dateadded] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateadded($format = '{Y-m-d H:i:s}|string')
    {
        if ($this->dateadded === null) {
            return null;
        }

        if ($this->dateadded === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->dateadded);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dateadded, true), $x);
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
     * Get the [optionally formatted] temporal [dateremoved] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateremoved($format = '{Y-m-d H:i:s}|string')
    {
        if ($this->dateremoved === null) {
            return null;
        }

        if ($this->dateremoved === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->dateremoved);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dateremoved, true), $x);
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
     * Get the [active] column value.
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Get the [modified] column value.
     *
     * @return boolean
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set the value of [deviceid] column.
     *
     * @param int $v new value
     * @return Device The current object (for fluent API support)
     */
    public function setDeviceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deviceid !== $v) {
            $this->deviceid = $v;
            $this->modifiedColumns[] = DevicePeer::DEVICEID;
        }


        return $this;
    } // setDeviceid()

    /**
     * Set the value of [devicetypeid] column.
     *
     * @param int $v new value
     * @return Device The current object (for fluent API support)
     */
    public function setDevicetypeid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->devicetypeid !== $v) {
            $this->devicetypeid = $v;
            $this->modifiedColumns[] = DevicePeer::DEVICETYPEID;
        }

        if ($this->aDeviceType !== null && $this->aDeviceType->getDevicetypeid() !== $v) {
            $this->aDeviceType = null;
        }


        return $this;
    } // setDevicetypeid()

    /**
     * Set the value of [hostname] column.
     *
     * @param string $v new value
     * @return Device The current object (for fluent API support)
     */
    public function setHostname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->hostname !== $v) {
            $this->hostname = $v;
            $this->modifiedColumns[] = DevicePeer::HOSTNAME;
        }


        return $this;
    } // setHostname()

    /**
     * Set the value of [ipaddress] column.
     *
     * @param string $v new value
     * @return Device The current object (for fluent API support)
     */
    public function setIpaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ipaddress !== $v) {
            $this->ipaddress = $v;
            $this->modifiedColumns[] = DevicePeer::IPADDRESS;
        }


        return $this;
    } // setIpaddress()

    /**
     * Sets the value of [dateadded] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Device The current object (for fluent API support)
     */
    public function setDateadded($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateadded !== null || $dt !== null) {
            $currentDateAsString = ($this->dateadded !== null && $tmpDt = new DateTime($this->dateadded)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dateadded = $newDateAsString;
                $this->modifiedColumns[] = DevicePeer::DATEADDED;
            }
        } // if either are not null


        return $this;
    } // setDateadded()

    /**
     * Sets the value of [dateremoved] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Device The current object (for fluent API support)
     */
    public function setDateremoved($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateremoved !== null || $dt !== null) {
            $currentDateAsString = ($this->dateremoved !== null && $tmpDt = new DateTime($this->dateremoved)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dateremoved = $newDateAsString;
                $this->modifiedColumns[] = DevicePeer::DATEREMOVED;
            }
        } // if either are not null


        return $this;
    } // setDateremoved()

    /**
     * Sets the value of the [active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Device The current object (for fluent API support)
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
            $this->modifiedColumns[] = DevicePeer::ACTIVE;
        }


        return $this;
    } // setActive()

    /**
     * Sets the value of the [modified] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Device The current object (for fluent API support)
     */
    public function setModified($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->modified !== $v) {
            $this->modified = $v;
            $this->modifiedColumns[] = DevicePeer::MODIFIED;
        }


        return $this;
    } // setModified()

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

            $this->deviceid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->devicetypeid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->hostname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->ipaddress = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->dateadded = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->dateremoved = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->active = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
            $this->modified = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = DevicePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Device object", $e);
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

        if ($this->aDeviceType !== null && $this->devicetypeid !== $this->aDeviceType->getDevicetypeid()) {
            $this->aDeviceType = null;
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
            $con = Propel::getConnection(DevicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DevicePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDeviceType = null;
            $this->collDeviceThresholds = null;

            $this->collDeviceAdapters = null;

            $this->collDevicePolls = null;

            $this->collDeviceMonitors = null;

            $this->collDeviceSyslogs = null;

            $this->collDeviceTraps = null;

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
            $con = Propel::getConnection(DevicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DeviceQuery::create()
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
            $con = Propel::getConnection(DevicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DevicePeer::addInstanceToPool($this);
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

            if ($this->aDeviceType !== null) {
                if ($this->aDeviceType->isModified() || $this->aDeviceType->isNew()) {
                    $affectedRows += $this->aDeviceType->save($con);
                }
                $this->setDeviceType($this->aDeviceType);
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

            if ($this->deviceThresholdsScheduledForDeletion !== null) {
                if (!$this->deviceThresholdsScheduledForDeletion->isEmpty()) {
                    ThresholdQuery::create()
                        ->filterByPrimaryKeys($this->deviceThresholdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->deviceThresholdsScheduledForDeletion = null;
                }
            }

            if ($this->collDeviceThresholds !== null) {
                foreach ($this->collDeviceThresholds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->deviceAdaptersScheduledForDeletion !== null) {
                if (!$this->deviceAdaptersScheduledForDeletion->isEmpty()) {
                    AdapterQuery::create()
                        ->filterByPrimaryKeys($this->deviceAdaptersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->deviceAdaptersScheduledForDeletion = null;
                }
            }

            if ($this->collDeviceAdapters !== null) {
                foreach ($this->collDeviceAdapters as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->devicePollsScheduledForDeletion !== null) {
                if (!$this->devicePollsScheduledForDeletion->isEmpty()) {
                    PollQuery::create()
                        ->filterByPrimaryKeys($this->devicePollsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->devicePollsScheduledForDeletion = null;
                }
            }

            if ($this->collDevicePolls !== null) {
                foreach ($this->collDevicePolls as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->deviceMonitorsScheduledForDeletion !== null) {
                if (!$this->deviceMonitorsScheduledForDeletion->isEmpty()) {
                    MonitorQuery::create()
                        ->filterByPrimaryKeys($this->deviceMonitorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->deviceMonitorsScheduledForDeletion = null;
                }
            }

            if ($this->collDeviceMonitors !== null) {
                foreach ($this->collDeviceMonitors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->deviceSyslogsScheduledForDeletion !== null) {
                if (!$this->deviceSyslogsScheduledForDeletion->isEmpty()) {
                    SyslogQuery::create()
                        ->filterByPrimaryKeys($this->deviceSyslogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->deviceSyslogsScheduledForDeletion = null;
                }
            }

            if ($this->collDeviceSyslogs !== null) {
                foreach ($this->collDeviceSyslogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->deviceTrapsScheduledForDeletion !== null) {
                if (!$this->deviceTrapsScheduledForDeletion->isEmpty()) {
                    foreach ($this->deviceTrapsScheduledForDeletion as $deviceTrap) {
                        // need to save related object because we set the relation to null
                        $deviceTrap->save($con);
                    }
                    $this->deviceTrapsScheduledForDeletion = null;
                }
            }

            if ($this->collDeviceTraps !== null) {
                foreach ($this->collDeviceTraps as $referrerFK) {
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

        $this->modifiedColumns[] = DevicePeer::DEVICEID;
        if (null !== $this->deviceid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DevicePeer::DEVICEID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DevicePeer::DEVICEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceId`';
        }
        if ($this->isColumnModified(DevicePeer::DEVICETYPEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceTypeId`';
        }
        if ($this->isColumnModified(DevicePeer::HOSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`Hostname`';
        }
        if ($this->isColumnModified(DevicePeer::IPADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`IpAddress`';
        }
        if ($this->isColumnModified(DevicePeer::DATEADDED)) {
            $modifiedColumns[':p' . $index++]  = '`DateAdded`';
        }
        if ($this->isColumnModified(DevicePeer::DATEREMOVED)) {
            $modifiedColumns[':p' . $index++]  = '`DateRemoved`';
        }
        if ($this->isColumnModified(DevicePeer::ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`Active`';
        }
        if ($this->isColumnModified(DevicePeer::MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = '`Modified`';
        }

        $sql = sprintf(
            'INSERT INTO `Device` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`DeviceId`':
                        $stmt->bindValue($identifier, $this->deviceid, PDO::PARAM_INT);
                        break;
                    case '`DeviceTypeId`':
                        $stmt->bindValue($identifier, $this->devicetypeid, PDO::PARAM_INT);
                        break;
                    case '`Hostname`':
                        $stmt->bindValue($identifier, $this->hostname, PDO::PARAM_STR);
                        break;
                    case '`IpAddress`':
                        $stmt->bindValue($identifier, $this->ipaddress, PDO::PARAM_STR);
                        break;
                    case '`DateAdded`':
                        $stmt->bindValue($identifier, $this->dateadded, PDO::PARAM_STR);
                        break;
                    case '`DateRemoved`':
                        $stmt->bindValue($identifier, $this->dateremoved, PDO::PARAM_STR);
                        break;
                    case '`Active`':
                        $stmt->bindValue($identifier, (int) $this->active, PDO::PARAM_INT);
                        break;
                    case '`Modified`':
                        $stmt->bindValue($identifier, (int) $this->modified, PDO::PARAM_INT);
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
        $this->setDeviceid($pk);

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

            if ($this->aDeviceType !== null) {
                if (!$this->aDeviceType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDeviceType->getValidationFailures());
                }
            }


            if (($retval = DevicePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDeviceThresholds !== null) {
                    foreach ($this->collDeviceThresholds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDeviceAdapters !== null) {
                    foreach ($this->collDeviceAdapters as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDevicePolls !== null) {
                    foreach ($this->collDevicePolls as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDeviceMonitors !== null) {
                    foreach ($this->collDeviceMonitors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDeviceSyslogs !== null) {
                    foreach ($this->collDeviceSyslogs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDeviceTraps !== null) {
                    foreach ($this->collDeviceTraps as $referrerFK) {
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
        $pos = DevicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDeviceid();
                break;
            case 1:
                return $this->getDevicetypeid();
                break;
            case 2:
                return $this->getHostname();
                break;
            case 3:
                return $this->getIpaddress();
                break;
            case 4:
                return $this->getDateadded();
                break;
            case 5:
                return $this->getDateremoved();
                break;
            case 6:
                return $this->getActive();
                break;
            case 7:
                return $this->getModified();
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
        if (isset($alreadyDumpedObjects['Device'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Device'][$this->getPrimaryKey()] = true;
        $keys = DevicePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDeviceid(),
            $keys[1] => $this->getDevicetypeid(),
            $keys[2] => $this->getHostname(),
            $keys[3] => $this->getIpaddress(),
            $keys[4] => $this->getDateadded(),
            $keys[5] => $this->getDateremoved(),
            $keys[6] => $this->getActive(),
            $keys[7] => $this->getModified(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aDeviceType) {
                $result['DeviceType'] = $this->aDeviceType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDeviceThresholds) {
                $result['DeviceThresholds'] = $this->collDeviceThresholds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDeviceAdapters) {
                $result['DeviceAdapters'] = $this->collDeviceAdapters->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDevicePolls) {
                $result['DevicePolls'] = $this->collDevicePolls->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDeviceMonitors) {
                $result['DeviceMonitors'] = $this->collDeviceMonitors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDeviceSyslogs) {
                $result['DeviceSyslogs'] = $this->collDeviceSyslogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDeviceTraps) {
                $result['DeviceTraps'] = $this->collDeviceTraps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = DevicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDeviceid($value);
                break;
            case 1:
                $this->setDevicetypeid($value);
                break;
            case 2:
                $this->setHostname($value);
                break;
            case 3:
                $this->setIpaddress($value);
                break;
            case 4:
                $this->setDateadded($value);
                break;
            case 5:
                $this->setDateremoved($value);
                break;
            case 6:
                $this->setActive($value);
                break;
            case 7:
                $this->setModified($value);
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
        $keys = DevicePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setDeviceid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDevicetypeid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setHostname($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIpaddress($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDateadded($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDateremoved($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActive($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setModified($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DevicePeer::DATABASE_NAME);

        if ($this->isColumnModified(DevicePeer::DEVICEID)) $criteria->add(DevicePeer::DEVICEID, $this->deviceid);
        if ($this->isColumnModified(DevicePeer::DEVICETYPEID)) $criteria->add(DevicePeer::DEVICETYPEID, $this->devicetypeid);
        if ($this->isColumnModified(DevicePeer::HOSTNAME)) $criteria->add(DevicePeer::HOSTNAME, $this->hostname);
        if ($this->isColumnModified(DevicePeer::IPADDRESS)) $criteria->add(DevicePeer::IPADDRESS, $this->ipaddress);
        if ($this->isColumnModified(DevicePeer::DATEADDED)) $criteria->add(DevicePeer::DATEADDED, $this->dateadded);
        if ($this->isColumnModified(DevicePeer::DATEREMOVED)) $criteria->add(DevicePeer::DATEREMOVED, $this->dateremoved);
        if ($this->isColumnModified(DevicePeer::ACTIVE)) $criteria->add(DevicePeer::ACTIVE, $this->active);
        if ($this->isColumnModified(DevicePeer::MODIFIED)) $criteria->add(DevicePeer::MODIFIED, $this->modified);

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
        $criteria = new Criteria(DevicePeer::DATABASE_NAME);
        $criteria->add(DevicePeer::DEVICEID, $this->deviceid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getDeviceid();
    }

    /**
     * Generic method to set the primary key (deviceid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setDeviceid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getDeviceid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Device (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDevicetypeid($this->getDevicetypeid());
        $copyObj->setHostname($this->getHostname());
        $copyObj->setIpaddress($this->getIpaddress());
        $copyObj->setDateadded($this->getDateadded());
        $copyObj->setDateremoved($this->getDateremoved());
        $copyObj->setActive($this->getActive());
        $copyObj->setModified($this->getModified());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDeviceThresholds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeviceThreshold($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDeviceAdapters() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeviceAdapter($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDevicePolls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDevicePoll($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDeviceMonitors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeviceMonitor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDeviceSyslogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeviceSyslog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDeviceTraps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDeviceTrap($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setDeviceid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Device Clone of current object.
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
     * @return DevicePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DevicePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a DeviceType object.
     *
     * @param             DeviceType $v
     * @return Device The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDeviceType(DeviceType $v = null)
    {
        if ($v === null) {
            $this->setDevicetypeid(NULL);
        } else {
            $this->setDevicetypeid($v->getDevicetypeid());
        }

        $this->aDeviceType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the DeviceType object, it will not be re-added.
        if ($v !== null) {
            $v->addDeviceTypeDevice($this);
        }


        return $this;
    }


    /**
     * Get the associated DeviceType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return DeviceType The associated DeviceType object.
     * @throws PropelException
     */
    public function getDeviceType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDeviceType === null && ($this->devicetypeid !== null) && $doQuery) {
            $this->aDeviceType = DeviceTypeQuery::create()->findPk($this->devicetypeid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDeviceType->addDeviceTypeDevices($this);
             */
        }

        return $this->aDeviceType;
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
        if ('DeviceThreshold' == $relationName) {
            $this->initDeviceThresholds();
        }
        if ('DeviceAdapter' == $relationName) {
            $this->initDeviceAdapters();
        }
        if ('DevicePoll' == $relationName) {
            $this->initDevicePolls();
        }
        if ('DeviceMonitor' == $relationName) {
            $this->initDeviceMonitors();
        }
        if ('DeviceSyslog' == $relationName) {
            $this->initDeviceSyslogs();
        }
        if ('DeviceTrap' == $relationName) {
            $this->initDeviceTraps();
        }
    }

    /**
     * Clears out the collDeviceThresholds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Device The current object (for fluent API support)
     * @see        addDeviceThresholds()
     */
    public function clearDeviceThresholds()
    {
        $this->collDeviceThresholds = null; // important to set this to null since that means it is uninitialized
        $this->collDeviceThresholdsPartial = null;

        return $this;
    }

    /**
     * reset is the collDeviceThresholds collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeviceThresholds($v = true)
    {
        $this->collDeviceThresholdsPartial = $v;
    }

    /**
     * Initializes the collDeviceThresholds collection.
     *
     * By default this just sets the collDeviceThresholds collection to an empty array (like clearcollDeviceThresholds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeviceThresholds($overrideExisting = true)
    {
        if (null !== $this->collDeviceThresholds && !$overrideExisting) {
            return;
        }
        $this->collDeviceThresholds = new PropelObjectCollection();
        $this->collDeviceThresholds->setModel('Threshold');
    }

    /**
     * Gets an array of Threshold objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Device is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     * @throws PropelException
     */
    public function getDeviceThresholds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeviceThresholdsPartial && !$this->isNew();
        if (null === $this->collDeviceThresholds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeviceThresholds) {
                // return empty collection
                $this->initDeviceThresholds();
            } else {
                $collDeviceThresholds = ThresholdQuery::create(null, $criteria)
                    ->filterByDevice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeviceThresholdsPartial && count($collDeviceThresholds)) {
                      $this->initDeviceThresholds(false);

                      foreach($collDeviceThresholds as $obj) {
                        if (false == $this->collDeviceThresholds->contains($obj)) {
                          $this->collDeviceThresholds->append($obj);
                        }
                      }

                      $this->collDeviceThresholdsPartial = true;
                    }

                    $collDeviceThresholds->getInternalIterator()->rewind();
                    return $collDeviceThresholds;
                }

                if($partial && $this->collDeviceThresholds) {
                    foreach($this->collDeviceThresholds as $obj) {
                        if($obj->isNew()) {
                            $collDeviceThresholds[] = $obj;
                        }
                    }
                }

                $this->collDeviceThresholds = $collDeviceThresholds;
                $this->collDeviceThresholdsPartial = false;
            }
        }

        return $this->collDeviceThresholds;
    }

    /**
     * Sets a collection of DeviceThreshold objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deviceThresholds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Device The current object (for fluent API support)
     */
    public function setDeviceThresholds(PropelCollection $deviceThresholds, PropelPDO $con = null)
    {
        $deviceThresholdsToDelete = $this->getDeviceThresholds(new Criteria(), $con)->diff($deviceThresholds);

        $this->deviceThresholdsScheduledForDeletion = unserialize(serialize($deviceThresholdsToDelete));

        foreach ($deviceThresholdsToDelete as $deviceThresholdRemoved) {
            $deviceThresholdRemoved->setDevice(null);
        }

        $this->collDeviceThresholds = null;
        foreach ($deviceThresholds as $deviceThreshold) {
            $this->addDeviceThreshold($deviceThreshold);
        }

        $this->collDeviceThresholds = $deviceThresholds;
        $this->collDeviceThresholdsPartial = false;

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
    public function countDeviceThresholds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeviceThresholdsPartial && !$this->isNew();
        if (null === $this->collDeviceThresholds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeviceThresholds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDeviceThresholds());
            }
            $query = ThresholdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDevice($this)
                ->count($con);
        }

        return count($this->collDeviceThresholds);
    }

    /**
     * Method called to associate a Threshold object to this object
     * through the Threshold foreign key attribute.
     *
     * @param    Threshold $l Threshold
     * @return Device The current object (for fluent API support)
     */
    public function addDeviceThreshold(Threshold $l)
    {
        if ($this->collDeviceThresholds === null) {
            $this->initDeviceThresholds();
            $this->collDeviceThresholdsPartial = true;
        }
        if (!in_array($l, $this->collDeviceThresholds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeviceThreshold($l);
        }

        return $this;
    }

    /**
     * @param	DeviceThreshold $deviceThreshold The deviceThreshold object to add.
     */
    protected function doAddDeviceThreshold($deviceThreshold)
    {
        $this->collDeviceThresholds[]= $deviceThreshold;
        $deviceThreshold->setDevice($this);
    }

    /**
     * @param	DeviceThreshold $deviceThreshold The deviceThreshold object to remove.
     * @return Device The current object (for fluent API support)
     */
    public function removeDeviceThreshold($deviceThreshold)
    {
        if ($this->getDeviceThresholds()->contains($deviceThreshold)) {
            $this->collDeviceThresholds->remove($this->collDeviceThresholds->search($deviceThreshold));
            if (null === $this->deviceThresholdsScheduledForDeletion) {
                $this->deviceThresholdsScheduledForDeletion = clone $this->collDeviceThresholds;
                $this->deviceThresholdsScheduledForDeletion->clear();
            }
            $this->deviceThresholdsScheduledForDeletion[]= clone $deviceThreshold;
            $deviceThreshold->setDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getDeviceThresholdsJoinPoll($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Poll', $join_behavior);

        return $this->getDeviceThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getDeviceThresholdsJoinTrap($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Trap', $join_behavior);

        return $this->getDeviceThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getDeviceThresholdsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getDeviceThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getDeviceThresholdsJoinSyslog($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Syslog', $join_behavior);

        return $this->getDeviceThresholds($query, $con);
    }

    /**
     * Clears out the collDeviceAdapters collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Device The current object (for fluent API support)
     * @see        addDeviceAdapters()
     */
    public function clearDeviceAdapters()
    {
        $this->collDeviceAdapters = null; // important to set this to null since that means it is uninitialized
        $this->collDeviceAdaptersPartial = null;

        return $this;
    }

    /**
     * reset is the collDeviceAdapters collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeviceAdapters($v = true)
    {
        $this->collDeviceAdaptersPartial = $v;
    }

    /**
     * Initializes the collDeviceAdapters collection.
     *
     * By default this just sets the collDeviceAdapters collection to an empty array (like clearcollDeviceAdapters());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeviceAdapters($overrideExisting = true)
    {
        if (null !== $this->collDeviceAdapters && !$overrideExisting) {
            return;
        }
        $this->collDeviceAdapters = new PropelObjectCollection();
        $this->collDeviceAdapters->setModel('Adapter');
    }

    /**
     * Gets an array of Adapter objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Device is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Adapter[] List of Adapter objects
     * @throws PropelException
     */
    public function getDeviceAdapters($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeviceAdaptersPartial && !$this->isNew();
        if (null === $this->collDeviceAdapters || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeviceAdapters) {
                // return empty collection
                $this->initDeviceAdapters();
            } else {
                $collDeviceAdapters = AdapterQuery::create(null, $criteria)
                    ->filterByDevice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeviceAdaptersPartial && count($collDeviceAdapters)) {
                      $this->initDeviceAdapters(false);

                      foreach($collDeviceAdapters as $obj) {
                        if (false == $this->collDeviceAdapters->contains($obj)) {
                          $this->collDeviceAdapters->append($obj);
                        }
                      }

                      $this->collDeviceAdaptersPartial = true;
                    }

                    $collDeviceAdapters->getInternalIterator()->rewind();
                    return $collDeviceAdapters;
                }

                if($partial && $this->collDeviceAdapters) {
                    foreach($this->collDeviceAdapters as $obj) {
                        if($obj->isNew()) {
                            $collDeviceAdapters[] = $obj;
                        }
                    }
                }

                $this->collDeviceAdapters = $collDeviceAdapters;
                $this->collDeviceAdaptersPartial = false;
            }
        }

        return $this->collDeviceAdapters;
    }

    /**
     * Sets a collection of DeviceAdapter objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deviceAdapters A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Device The current object (for fluent API support)
     */
    public function setDeviceAdapters(PropelCollection $deviceAdapters, PropelPDO $con = null)
    {
        $deviceAdaptersToDelete = $this->getDeviceAdapters(new Criteria(), $con)->diff($deviceAdapters);

        $this->deviceAdaptersScheduledForDeletion = unserialize(serialize($deviceAdaptersToDelete));

        foreach ($deviceAdaptersToDelete as $deviceAdapterRemoved) {
            $deviceAdapterRemoved->setDevice(null);
        }

        $this->collDeviceAdapters = null;
        foreach ($deviceAdapters as $deviceAdapter) {
            $this->addDeviceAdapter($deviceAdapter);
        }

        $this->collDeviceAdapters = $deviceAdapters;
        $this->collDeviceAdaptersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Adapter objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Adapter objects.
     * @throws PropelException
     */
    public function countDeviceAdapters(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeviceAdaptersPartial && !$this->isNew();
        if (null === $this->collDeviceAdapters || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeviceAdapters) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDeviceAdapters());
            }
            $query = AdapterQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDevice($this)
                ->count($con);
        }

        return count($this->collDeviceAdapters);
    }

    /**
     * Method called to associate a Adapter object to this object
     * through the Adapter foreign key attribute.
     *
     * @param    Adapter $l Adapter
     * @return Device The current object (for fluent API support)
     */
    public function addDeviceAdapter(Adapter $l)
    {
        if ($this->collDeviceAdapters === null) {
            $this->initDeviceAdapters();
            $this->collDeviceAdaptersPartial = true;
        }
        if (!in_array($l, $this->collDeviceAdapters->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeviceAdapter($l);
        }

        return $this;
    }

    /**
     * @param	DeviceAdapter $deviceAdapter The deviceAdapter object to add.
     */
    protected function doAddDeviceAdapter($deviceAdapter)
    {
        $this->collDeviceAdapters[]= $deviceAdapter;
        $deviceAdapter->setDevice($this);
    }

    /**
     * @param	DeviceAdapter $deviceAdapter The deviceAdapter object to remove.
     * @return Device The current object (for fluent API support)
     */
    public function removeDeviceAdapter($deviceAdapter)
    {
        if ($this->getDeviceAdapters()->contains($deviceAdapter)) {
            $this->collDeviceAdapters->remove($this->collDeviceAdapters->search($deviceAdapter));
            if (null === $this->deviceAdaptersScheduledForDeletion) {
                $this->deviceAdaptersScheduledForDeletion = clone $this->collDeviceAdapters;
                $this->deviceAdaptersScheduledForDeletion->clear();
            }
            $this->deviceAdaptersScheduledForDeletion[]= clone $deviceAdapter;
            $deviceAdapter->setDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceAdapters from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Adapter[] List of Adapter objects
     */
    public function getDeviceAdaptersJoinAdapterType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AdapterQuery::create(null, $criteria);
        $query->joinWith('AdapterType', $join_behavior);

        return $this->getDeviceAdapters($query, $con);
    }

    /**
     * Clears out the collDevicePolls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Device The current object (for fluent API support)
     * @see        addDevicePolls()
     */
    public function clearDevicePolls()
    {
        $this->collDevicePolls = null; // important to set this to null since that means it is uninitialized
        $this->collDevicePollsPartial = null;

        return $this;
    }

    /**
     * reset is the collDevicePolls collection loaded partially
     *
     * @return void
     */
    public function resetPartialDevicePolls($v = true)
    {
        $this->collDevicePollsPartial = $v;
    }

    /**
     * Initializes the collDevicePolls collection.
     *
     * By default this just sets the collDevicePolls collection to an empty array (like clearcollDevicePolls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDevicePolls($overrideExisting = true)
    {
        if (null !== $this->collDevicePolls && !$overrideExisting) {
            return;
        }
        $this->collDevicePolls = new PropelObjectCollection();
        $this->collDevicePolls->setModel('Poll');
    }

    /**
     * Gets an array of Poll objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Device is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Poll[] List of Poll objects
     * @throws PropelException
     */
    public function getDevicePolls($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDevicePollsPartial && !$this->isNew();
        if (null === $this->collDevicePolls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDevicePolls) {
                // return empty collection
                $this->initDevicePolls();
            } else {
                $collDevicePolls = PollQuery::create(null, $criteria)
                    ->filterByDevice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDevicePollsPartial && count($collDevicePolls)) {
                      $this->initDevicePolls(false);

                      foreach($collDevicePolls as $obj) {
                        if (false == $this->collDevicePolls->contains($obj)) {
                          $this->collDevicePolls->append($obj);
                        }
                      }

                      $this->collDevicePollsPartial = true;
                    }

                    $collDevicePolls->getInternalIterator()->rewind();
                    return $collDevicePolls;
                }

                if($partial && $this->collDevicePolls) {
                    foreach($this->collDevicePolls as $obj) {
                        if($obj->isNew()) {
                            $collDevicePolls[] = $obj;
                        }
                    }
                }

                $this->collDevicePolls = $collDevicePolls;
                $this->collDevicePollsPartial = false;
            }
        }

        return $this->collDevicePolls;
    }

    /**
     * Sets a collection of DevicePoll objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $devicePolls A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Device The current object (for fluent API support)
     */
    public function setDevicePolls(PropelCollection $devicePolls, PropelPDO $con = null)
    {
        $devicePollsToDelete = $this->getDevicePolls(new Criteria(), $con)->diff($devicePolls);

        $this->devicePollsScheduledForDeletion = unserialize(serialize($devicePollsToDelete));

        foreach ($devicePollsToDelete as $devicePollRemoved) {
            $devicePollRemoved->setDevice(null);
        }

        $this->collDevicePolls = null;
        foreach ($devicePolls as $devicePoll) {
            $this->addDevicePoll($devicePoll);
        }

        $this->collDevicePolls = $devicePolls;
        $this->collDevicePollsPartial = false;

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
    public function countDevicePolls(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDevicePollsPartial && !$this->isNew();
        if (null === $this->collDevicePolls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDevicePolls) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDevicePolls());
            }
            $query = PollQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDevice($this)
                ->count($con);
        }

        return count($this->collDevicePolls);
    }

    /**
     * Method called to associate a Poll object to this object
     * through the Poll foreign key attribute.
     *
     * @param    Poll $l Poll
     * @return Device The current object (for fluent API support)
     */
    public function addDevicePoll(Poll $l)
    {
        if ($this->collDevicePolls === null) {
            $this->initDevicePolls();
            $this->collDevicePollsPartial = true;
        }
        if (!in_array($l, $this->collDevicePolls->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDevicePoll($l);
        }

        return $this;
    }

    /**
     * @param	DevicePoll $devicePoll The devicePoll object to add.
     */
    protected function doAddDevicePoll($devicePoll)
    {
        $this->collDevicePolls[]= $devicePoll;
        $devicePoll->setDevice($this);
    }

    /**
     * @param	DevicePoll $devicePoll The devicePoll object to remove.
     * @return Device The current object (for fluent API support)
     */
    public function removeDevicePoll($devicePoll)
    {
        if ($this->getDevicePolls()->contains($devicePoll)) {
            $this->collDevicePolls->remove($this->collDevicePolls->search($devicePoll));
            if (null === $this->devicePollsScheduledForDeletion) {
                $this->devicePollsScheduledForDeletion = clone $this->collDevicePolls;
                $this->devicePollsScheduledForDeletion->clear();
            }
            $this->devicePollsScheduledForDeletion[]= clone $devicePoll;
            $devicePoll->setDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DevicePolls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Poll[] List of Poll objects
     */
    public function getDevicePollsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PollQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getDevicePolls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DevicePolls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Poll[] List of Poll objects
     */
    public function getDevicePollsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PollQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getDevicePolls($query, $con);
    }

    /**
     * Clears out the collDeviceMonitors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Device The current object (for fluent API support)
     * @see        addDeviceMonitors()
     */
    public function clearDeviceMonitors()
    {
        $this->collDeviceMonitors = null; // important to set this to null since that means it is uninitialized
        $this->collDeviceMonitorsPartial = null;

        return $this;
    }

    /**
     * reset is the collDeviceMonitors collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeviceMonitors($v = true)
    {
        $this->collDeviceMonitorsPartial = $v;
    }

    /**
     * Initializes the collDeviceMonitors collection.
     *
     * By default this just sets the collDeviceMonitors collection to an empty array (like clearcollDeviceMonitors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeviceMonitors($overrideExisting = true)
    {
        if (null !== $this->collDeviceMonitors && !$overrideExisting) {
            return;
        }
        $this->collDeviceMonitors = new PropelObjectCollection();
        $this->collDeviceMonitors->setModel('Monitor');
    }

    /**
     * Gets an array of Monitor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Device is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     * @throws PropelException
     */
    public function getDeviceMonitors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeviceMonitorsPartial && !$this->isNew();
        if (null === $this->collDeviceMonitors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeviceMonitors) {
                // return empty collection
                $this->initDeviceMonitors();
            } else {
                $collDeviceMonitors = MonitorQuery::create(null, $criteria)
                    ->filterByDevice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeviceMonitorsPartial && count($collDeviceMonitors)) {
                      $this->initDeviceMonitors(false);

                      foreach($collDeviceMonitors as $obj) {
                        if (false == $this->collDeviceMonitors->contains($obj)) {
                          $this->collDeviceMonitors->append($obj);
                        }
                      }

                      $this->collDeviceMonitorsPartial = true;
                    }

                    $collDeviceMonitors->getInternalIterator()->rewind();
                    return $collDeviceMonitors;
                }

                if($partial && $this->collDeviceMonitors) {
                    foreach($this->collDeviceMonitors as $obj) {
                        if($obj->isNew()) {
                            $collDeviceMonitors[] = $obj;
                        }
                    }
                }

                $this->collDeviceMonitors = $collDeviceMonitors;
                $this->collDeviceMonitorsPartial = false;
            }
        }

        return $this->collDeviceMonitors;
    }

    /**
     * Sets a collection of DeviceMonitor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deviceMonitors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Device The current object (for fluent API support)
     */
    public function setDeviceMonitors(PropelCollection $deviceMonitors, PropelPDO $con = null)
    {
        $deviceMonitorsToDelete = $this->getDeviceMonitors(new Criteria(), $con)->diff($deviceMonitors);

        $this->deviceMonitorsScheduledForDeletion = unserialize(serialize($deviceMonitorsToDelete));

        foreach ($deviceMonitorsToDelete as $deviceMonitorRemoved) {
            $deviceMonitorRemoved->setDevice(null);
        }

        $this->collDeviceMonitors = null;
        foreach ($deviceMonitors as $deviceMonitor) {
            $this->addDeviceMonitor($deviceMonitor);
        }

        $this->collDeviceMonitors = $deviceMonitors;
        $this->collDeviceMonitorsPartial = false;

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
    public function countDeviceMonitors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeviceMonitorsPartial && !$this->isNew();
        if (null === $this->collDeviceMonitors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeviceMonitors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDeviceMonitors());
            }
            $query = MonitorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDevice($this)
                ->count($con);
        }

        return count($this->collDeviceMonitors);
    }

    /**
     * Method called to associate a Monitor object to this object
     * through the Monitor foreign key attribute.
     *
     * @param    Monitor $l Monitor
     * @return Device The current object (for fluent API support)
     */
    public function addDeviceMonitor(Monitor $l)
    {
        if ($this->collDeviceMonitors === null) {
            $this->initDeviceMonitors();
            $this->collDeviceMonitorsPartial = true;
        }
        if (!in_array($l, $this->collDeviceMonitors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeviceMonitor($l);
        }

        return $this;
    }

    /**
     * @param	DeviceMonitor $deviceMonitor The deviceMonitor object to add.
     */
    protected function doAddDeviceMonitor($deviceMonitor)
    {
        $this->collDeviceMonitors[]= $deviceMonitor;
        $deviceMonitor->setDevice($this);
    }

    /**
     * @param	DeviceMonitor $deviceMonitor The deviceMonitor object to remove.
     * @return Device The current object (for fluent API support)
     */
    public function removeDeviceMonitor($deviceMonitor)
    {
        if ($this->getDeviceMonitors()->contains($deviceMonitor)) {
            $this->collDeviceMonitors->remove($this->collDeviceMonitors->search($deviceMonitor));
            if (null === $this->deviceMonitorsScheduledForDeletion) {
                $this->deviceMonitorsScheduledForDeletion = clone $this->collDeviceMonitors;
                $this->deviceMonitorsScheduledForDeletion->clear();
            }
            $this->deviceMonitorsScheduledForDeletion[]= clone $deviceMonitor;
            $deviceMonitor->setDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getDeviceMonitorsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getDeviceMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getDeviceMonitorsJoinAdapter($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Adapter', $join_behavior);

        return $this->getDeviceMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getDeviceMonitorsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getDeviceMonitors($query, $con);
    }

    /**
     * Clears out the collDeviceSyslogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Device The current object (for fluent API support)
     * @see        addDeviceSyslogs()
     */
    public function clearDeviceSyslogs()
    {
        $this->collDeviceSyslogs = null; // important to set this to null since that means it is uninitialized
        $this->collDeviceSyslogsPartial = null;

        return $this;
    }

    /**
     * reset is the collDeviceSyslogs collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeviceSyslogs($v = true)
    {
        $this->collDeviceSyslogsPartial = $v;
    }

    /**
     * Initializes the collDeviceSyslogs collection.
     *
     * By default this just sets the collDeviceSyslogs collection to an empty array (like clearcollDeviceSyslogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeviceSyslogs($overrideExisting = true)
    {
        if (null !== $this->collDeviceSyslogs && !$overrideExisting) {
            return;
        }
        $this->collDeviceSyslogs = new PropelObjectCollection();
        $this->collDeviceSyslogs->setModel('Syslog');
    }

    /**
     * Gets an array of Syslog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Device is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Syslog[] List of Syslog objects
     * @throws PropelException
     */
    public function getDeviceSyslogs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeviceSyslogsPartial && !$this->isNew();
        if (null === $this->collDeviceSyslogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeviceSyslogs) {
                // return empty collection
                $this->initDeviceSyslogs();
            } else {
                $collDeviceSyslogs = SyslogQuery::create(null, $criteria)
                    ->filterByDevice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeviceSyslogsPartial && count($collDeviceSyslogs)) {
                      $this->initDeviceSyslogs(false);

                      foreach($collDeviceSyslogs as $obj) {
                        if (false == $this->collDeviceSyslogs->contains($obj)) {
                          $this->collDeviceSyslogs->append($obj);
                        }
                      }

                      $this->collDeviceSyslogsPartial = true;
                    }

                    $collDeviceSyslogs->getInternalIterator()->rewind();
                    return $collDeviceSyslogs;
                }

                if($partial && $this->collDeviceSyslogs) {
                    foreach($this->collDeviceSyslogs as $obj) {
                        if($obj->isNew()) {
                            $collDeviceSyslogs[] = $obj;
                        }
                    }
                }

                $this->collDeviceSyslogs = $collDeviceSyslogs;
                $this->collDeviceSyslogsPartial = false;
            }
        }

        return $this->collDeviceSyslogs;
    }

    /**
     * Sets a collection of DeviceSyslog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deviceSyslogs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Device The current object (for fluent API support)
     */
    public function setDeviceSyslogs(PropelCollection $deviceSyslogs, PropelPDO $con = null)
    {
        $deviceSyslogsToDelete = $this->getDeviceSyslogs(new Criteria(), $con)->diff($deviceSyslogs);

        $this->deviceSyslogsScheduledForDeletion = unserialize(serialize($deviceSyslogsToDelete));

        foreach ($deviceSyslogsToDelete as $deviceSyslogRemoved) {
            $deviceSyslogRemoved->setDevice(null);
        }

        $this->collDeviceSyslogs = null;
        foreach ($deviceSyslogs as $deviceSyslog) {
            $this->addDeviceSyslog($deviceSyslog);
        }

        $this->collDeviceSyslogs = $deviceSyslogs;
        $this->collDeviceSyslogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Syslog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Syslog objects.
     * @throws PropelException
     */
    public function countDeviceSyslogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeviceSyslogsPartial && !$this->isNew();
        if (null === $this->collDeviceSyslogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeviceSyslogs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDeviceSyslogs());
            }
            $query = SyslogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDevice($this)
                ->count($con);
        }

        return count($this->collDeviceSyslogs);
    }

    /**
     * Method called to associate a Syslog object to this object
     * through the Syslog foreign key attribute.
     *
     * @param    Syslog $l Syslog
     * @return Device The current object (for fluent API support)
     */
    public function addDeviceSyslog(Syslog $l)
    {
        if ($this->collDeviceSyslogs === null) {
            $this->initDeviceSyslogs();
            $this->collDeviceSyslogsPartial = true;
        }
        if (!in_array($l, $this->collDeviceSyslogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeviceSyslog($l);
        }

        return $this;
    }

    /**
     * @param	DeviceSyslog $deviceSyslog The deviceSyslog object to add.
     */
    protected function doAddDeviceSyslog($deviceSyslog)
    {
        $this->collDeviceSyslogs[]= $deviceSyslog;
        $deviceSyslog->setDevice($this);
    }

    /**
     * @param	DeviceSyslog $deviceSyslog The deviceSyslog object to remove.
     * @return Device The current object (for fluent API support)
     */
    public function removeDeviceSyslog($deviceSyslog)
    {
        if ($this->getDeviceSyslogs()->contains($deviceSyslog)) {
            $this->collDeviceSyslogs->remove($this->collDeviceSyslogs->search($deviceSyslog));
            if (null === $this->deviceSyslogsScheduledForDeletion) {
                $this->deviceSyslogsScheduledForDeletion = clone $this->collDeviceSyslogs;
                $this->deviceSyslogsScheduledForDeletion->clear();
            }
            $this->deviceSyslogsScheduledForDeletion[]= clone $deviceSyslog;
            $deviceSyslog->setDevice(null);
        }

        return $this;
    }

    /**
     * Clears out the collDeviceTraps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Device The current object (for fluent API support)
     * @see        addDeviceTraps()
     */
    public function clearDeviceTraps()
    {
        $this->collDeviceTraps = null; // important to set this to null since that means it is uninitialized
        $this->collDeviceTrapsPartial = null;

        return $this;
    }

    /**
     * reset is the collDeviceTraps collection loaded partially
     *
     * @return void
     */
    public function resetPartialDeviceTraps($v = true)
    {
        $this->collDeviceTrapsPartial = $v;
    }

    /**
     * Initializes the collDeviceTraps collection.
     *
     * By default this just sets the collDeviceTraps collection to an empty array (like clearcollDeviceTraps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDeviceTraps($overrideExisting = true)
    {
        if (null !== $this->collDeviceTraps && !$overrideExisting) {
            return;
        }
        $this->collDeviceTraps = new PropelObjectCollection();
        $this->collDeviceTraps->setModel('Trap');
    }

    /**
     * Gets an array of Trap objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Device is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Trap[] List of Trap objects
     * @throws PropelException
     */
    public function getDeviceTraps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDeviceTrapsPartial && !$this->isNew();
        if (null === $this->collDeviceTraps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDeviceTraps) {
                // return empty collection
                $this->initDeviceTraps();
            } else {
                $collDeviceTraps = TrapQuery::create(null, $criteria)
                    ->filterByDevice($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDeviceTrapsPartial && count($collDeviceTraps)) {
                      $this->initDeviceTraps(false);

                      foreach($collDeviceTraps as $obj) {
                        if (false == $this->collDeviceTraps->contains($obj)) {
                          $this->collDeviceTraps->append($obj);
                        }
                      }

                      $this->collDeviceTrapsPartial = true;
                    }

                    $collDeviceTraps->getInternalIterator()->rewind();
                    return $collDeviceTraps;
                }

                if($partial && $this->collDeviceTraps) {
                    foreach($this->collDeviceTraps as $obj) {
                        if($obj->isNew()) {
                            $collDeviceTraps[] = $obj;
                        }
                    }
                }

                $this->collDeviceTraps = $collDeviceTraps;
                $this->collDeviceTrapsPartial = false;
            }
        }

        return $this->collDeviceTraps;
    }

    /**
     * Sets a collection of DeviceTrap objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $deviceTraps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Device The current object (for fluent API support)
     */
    public function setDeviceTraps(PropelCollection $deviceTraps, PropelPDO $con = null)
    {
        $deviceTrapsToDelete = $this->getDeviceTraps(new Criteria(), $con)->diff($deviceTraps);

        $this->deviceTrapsScheduledForDeletion = unserialize(serialize($deviceTrapsToDelete));

        foreach ($deviceTrapsToDelete as $deviceTrapRemoved) {
            $deviceTrapRemoved->setDevice(null);
        }

        $this->collDeviceTraps = null;
        foreach ($deviceTraps as $deviceTrap) {
            $this->addDeviceTrap($deviceTrap);
        }

        $this->collDeviceTraps = $deviceTraps;
        $this->collDeviceTrapsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Trap objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Trap objects.
     * @throws PropelException
     */
    public function countDeviceTraps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDeviceTrapsPartial && !$this->isNew();
        if (null === $this->collDeviceTraps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDeviceTraps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDeviceTraps());
            }
            $query = TrapQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDevice($this)
                ->count($con);
        }

        return count($this->collDeviceTraps);
    }

    /**
     * Method called to associate a Trap object to this object
     * through the Trap foreign key attribute.
     *
     * @param    Trap $l Trap
     * @return Device The current object (for fluent API support)
     */
    public function addDeviceTrap(Trap $l)
    {
        if ($this->collDeviceTraps === null) {
            $this->initDeviceTraps();
            $this->collDeviceTrapsPartial = true;
        }
        if (!in_array($l, $this->collDeviceTraps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDeviceTrap($l);
        }

        return $this;
    }

    /**
     * @param	DeviceTrap $deviceTrap The deviceTrap object to add.
     */
    protected function doAddDeviceTrap($deviceTrap)
    {
        $this->collDeviceTraps[]= $deviceTrap;
        $deviceTrap->setDevice($this);
    }

    /**
     * @param	DeviceTrap $deviceTrap The deviceTrap object to remove.
     * @return Device The current object (for fluent API support)
     */
    public function removeDeviceTrap($deviceTrap)
    {
        if ($this->getDeviceTraps()->contains($deviceTrap)) {
            $this->collDeviceTraps->remove($this->collDeviceTraps->search($deviceTrap));
            if (null === $this->deviceTrapsScheduledForDeletion) {
                $this->deviceTrapsScheduledForDeletion = clone $this->collDeviceTraps;
                $this->deviceTrapsScheduledForDeletion->clear();
            }
            $this->deviceTrapsScheduledForDeletion[]= $deviceTrap;
            $deviceTrap->setDevice(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getDeviceTrapsJoinAdapter($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('Adapter', $join_behavior);

        return $this->getDeviceTraps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Device is new, it will return
     * an empty collection; or if this Device has previously
     * been saved, it will retrieve related DeviceTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Device.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getDeviceTrapsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getDeviceTraps($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->deviceid = null;
        $this->devicetypeid = null;
        $this->hostname = null;
        $this->ipaddress = null;
        $this->dateadded = null;
        $this->dateremoved = null;
        $this->active = null;
        $this->modified = null;
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
            if ($this->collDeviceThresholds) {
                foreach ($this->collDeviceThresholds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDeviceAdapters) {
                foreach ($this->collDeviceAdapters as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDevicePolls) {
                foreach ($this->collDevicePolls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDeviceMonitors) {
                foreach ($this->collDeviceMonitors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDeviceSyslogs) {
                foreach ($this->collDeviceSyslogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDeviceTraps) {
                foreach ($this->collDeviceTraps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aDeviceType instanceof Persistent) {
              $this->aDeviceType->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDeviceThresholds instanceof PropelCollection) {
            $this->collDeviceThresholds->clearIterator();
        }
        $this->collDeviceThresholds = null;
        if ($this->collDeviceAdapters instanceof PropelCollection) {
            $this->collDeviceAdapters->clearIterator();
        }
        $this->collDeviceAdapters = null;
        if ($this->collDevicePolls instanceof PropelCollection) {
            $this->collDevicePolls->clearIterator();
        }
        $this->collDevicePolls = null;
        if ($this->collDeviceMonitors instanceof PropelCollection) {
            $this->collDeviceMonitors->clearIterator();
        }
        $this->collDeviceMonitors = null;
        if ($this->collDeviceSyslogs instanceof PropelCollection) {
            $this->collDeviceSyslogs->clearIterator();
        }
        $this->collDeviceSyslogs = null;
        if ($this->collDeviceTraps instanceof PropelCollection) {
            $this->collDeviceTraps->clearIterator();
        }
        $this->collDeviceTraps = null;
        $this->aDeviceType = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DevicePeer::DEFAULT_STRING_FORMAT);
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
