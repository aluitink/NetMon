<?php


/**
 * Base class that represents a row from the 'Adapter' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseAdapter extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'AdapterPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AdapterPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the adapterid field.
     * @var        int
     */
    protected $adapterid;

    /**
     * The value for the adaptertypeid field.
     * @var        int
     */
    protected $adaptertypeid;

    /**
     * The value for the deviceid field.
     * @var        int
     */
    protected $deviceid;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the instance field.
     * @var        int
     */
    protected $instance;

    /**
     * The value for the ipaddress field.
     * @var        string
     */
    protected $ipaddress;

    /**
     * The value for the netmask field.
     * @var        string
     */
    protected $netmask;

    /**
     * The value for the macaddress field.
     * @var        string
     */
    protected $macaddress;

    /**
     * The value for the speed field.
     * @var        int
     */
    protected $speed;

    /**
     * The value for the administrativestatus field.
     * @var        boolean
     */
    protected $administrativestatus;

    /**
     * The value for the operationalstatus field.
     * @var        boolean
     */
    protected $operationalstatus;

    /**
     * The value for the modified field.
     * @var        boolean
     */
    protected $modified;

    /**
     * @var        AdapterType
     */
    protected $aAdapterType;

    /**
     * @var        Device
     */
    protected $aDevice;

    /**
     * @var        PropelObjectCollection|AdapterStatistic[] Collection to store aggregation of AdapterStatistic objects.
     */
    protected $collAdapterAdapterStatistics;
    protected $collAdapterAdapterStatisticsPartial;

    /**
     * @var        PropelObjectCollection|Monitor[] Collection to store aggregation of Monitor objects.
     */
    protected $collAdapterMonitors;
    protected $collAdapterMonitorsPartial;

    /**
     * @var        PropelObjectCollection|Trap[] Collection to store aggregation of Trap objects.
     */
    protected $collAdapterTraps;
    protected $collAdapterTrapsPartial;

    /**
     * @var        PropelObjectCollection|Device[] Collection to store aggregation of Device objects.
     */
    protected $collDevices;

    /**
     * @var        PropelObjectCollection|Plugin[] Collection to store aggregation of Plugin objects.
     */
    protected $collPlugins;

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
    protected $pluginsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $snmpPropertysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $adapterAdapterStatisticsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $adapterMonitorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $adapterTrapsScheduledForDeletion = null;

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
     * Get the [adaptertypeid] column value.
     *
     * @return int
     */
    public function getAdaptertypeid()
    {
        return $this->adaptertypeid;
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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [instance] column value.
     *
     * @return int
     */
    public function getInstance()
    {
        return $this->instance;
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
     * Get the [netmask] column value.
     *
     * @return string
     */
    public function getNetmask()
    {
        return $this->netmask;
    }

    /**
     * Get the [macaddress] column value.
     *
     * @return string
     */
    public function getMacaddress()
    {
        return $this->macaddress;
    }

    /**
     * Get the [speed] column value.
     *
     * @return int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Get the [administrativestatus] column value.
     *
     * @return boolean
     */
    public function getAdministrativestatus()
    {
        return $this->administrativestatus;
    }

    /**
     * Get the [operationalstatus] column value.
     *
     * @return boolean
     */
    public function getOperationalstatus()
    {
        return $this->operationalstatus;
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
     * Set the value of [adapterid] column.
     *
     * @param int $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setAdapterid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->adapterid !== $v) {
            $this->adapterid = $v;
            $this->modifiedColumns[] = AdapterPeer::ADAPTERID;
        }


        return $this;
    } // setAdapterid()

    /**
     * Set the value of [adaptertypeid] column.
     *
     * @param int $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setAdaptertypeid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->adaptertypeid !== $v) {
            $this->adaptertypeid = $v;
            $this->modifiedColumns[] = AdapterPeer::ADAPTERTYPEID;
        }

        if ($this->aAdapterType !== null && $this->aAdapterType->getAdaptertypeid() !== $v) {
            $this->aAdapterType = null;
        }


        return $this;
    } // setAdaptertypeid()

    /**
     * Set the value of [deviceid] column.
     *
     * @param int $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setDeviceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deviceid !== $v) {
            $this->deviceid = $v;
            $this->modifiedColumns[] = AdapterPeer::DEVICEID;
        }

        if ($this->aDevice !== null && $this->aDevice->getDeviceid() !== $v) {
            $this->aDevice = null;
        }


        return $this;
    } // setDeviceid()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = AdapterPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [instance] column.
     *
     * @param int $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setInstance($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->instance !== $v) {
            $this->instance = $v;
            $this->modifiedColumns[] = AdapterPeer::INSTANCE;
        }


        return $this;
    } // setInstance()

    /**
     * Set the value of [ipaddress] column.
     *
     * @param string $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setIpaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ipaddress !== $v) {
            $this->ipaddress = $v;
            $this->modifiedColumns[] = AdapterPeer::IPADDRESS;
        }


        return $this;
    } // setIpaddress()

    /**
     * Set the value of [netmask] column.
     *
     * @param string $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setNetmask($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->netmask !== $v) {
            $this->netmask = $v;
            $this->modifiedColumns[] = AdapterPeer::NETMASK;
        }


        return $this;
    } // setNetmask()

    /**
     * Set the value of [macaddress] column.
     *
     * @param string $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setMacaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->macaddress !== $v) {
            $this->macaddress = $v;
            $this->modifiedColumns[] = AdapterPeer::MACADDRESS;
        }


        return $this;
    } // setMacaddress()

    /**
     * Set the value of [speed] column.
     *
     * @param int $v new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setSpeed($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->speed !== $v) {
            $this->speed = $v;
            $this->modifiedColumns[] = AdapterPeer::SPEED;
        }


        return $this;
    } // setSpeed()

    /**
     * Sets the value of the [administrativestatus] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setAdministrativestatus($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->administrativestatus !== $v) {
            $this->administrativestatus = $v;
            $this->modifiedColumns[] = AdapterPeer::ADMINISTRATIVESTATUS;
        }


        return $this;
    } // setAdministrativestatus()

    /**
     * Sets the value of the [operationalstatus] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Adapter The current object (for fluent API support)
     */
    public function setOperationalstatus($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->operationalstatus !== $v) {
            $this->operationalstatus = $v;
            $this->modifiedColumns[] = AdapterPeer::OPERATIONALSTATUS;
        }


        return $this;
    } // setOperationalstatus()

    /**
     * Sets the value of the [modified] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Adapter The current object (for fluent API support)
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
            $this->modifiedColumns[] = AdapterPeer::MODIFIED;
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

            $this->adapterid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->adaptertypeid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->deviceid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->instance = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->ipaddress = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->netmask = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->macaddress = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->speed = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->administrativestatus = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->operationalstatus = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->modified = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = AdapterPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Adapter object", $e);
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

        if ($this->aAdapterType !== null && $this->adaptertypeid !== $this->aAdapterType->getAdaptertypeid()) {
            $this->aAdapterType = null;
        }
        if ($this->aDevice !== null && $this->deviceid !== $this->aDevice->getDeviceid()) {
            $this->aDevice = null;
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
            $con = Propel::getConnection(AdapterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AdapterPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAdapterType = null;
            $this->aDevice = null;
            $this->collAdapterAdapterStatistics = null;

            $this->collAdapterMonitors = null;

            $this->collAdapterTraps = null;

            $this->collDevices = null;
            $this->collPlugins = null;
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
            $con = Propel::getConnection(AdapterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AdapterQuery::create()
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
            $con = Propel::getConnection(AdapterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AdapterPeer::addInstanceToPool($this);
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

            if ($this->aAdapterType !== null) {
                if ($this->aAdapterType->isModified() || $this->aAdapterType->isNew()) {
                    $affectedRows += $this->aAdapterType->save($con);
                }
                $this->setAdapterType($this->aAdapterType);
            }

            if ($this->aDevice !== null) {
                if ($this->aDevice->isModified() || $this->aDevice->isNew()) {
                    $affectedRows += $this->aDevice->save($con);
                }
                $this->setDevice($this->aDevice);
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

            if ($this->devicesScheduledForDeletion !== null) {
                if (!$this->devicesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->devicesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    AdapterMonitorQuery::create()
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

            if ($this->pluginsScheduledForDeletion !== null) {
                if (!$this->pluginsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->pluginsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    AdapterMonitorQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->pluginsScheduledForDeletion = null;
                }

                foreach ($this->getPlugins() as $plugin) {
                    if ($plugin->isModified()) {
                        $plugin->save($con);
                    }
                }
            } elseif ($this->collPlugins) {
                foreach ($this->collPlugins as $plugin) {
                    if ($plugin->isModified()) {
                        $plugin->save($con);
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
                    AdapterMonitorQuery::create()
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

            if ($this->adapterAdapterStatisticsScheduledForDeletion !== null) {
                if (!$this->adapterAdapterStatisticsScheduledForDeletion->isEmpty()) {
                    AdapterStatisticQuery::create()
                        ->filterByPrimaryKeys($this->adapterAdapterStatisticsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->adapterAdapterStatisticsScheduledForDeletion = null;
                }
            }

            if ($this->collAdapterAdapterStatistics !== null) {
                foreach ($this->collAdapterAdapterStatistics as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->adapterMonitorsScheduledForDeletion !== null) {
                if (!$this->adapterMonitorsScheduledForDeletion->isEmpty()) {
                    MonitorQuery::create()
                        ->filterByPrimaryKeys($this->adapterMonitorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->adapterMonitorsScheduledForDeletion = null;
                }
            }

            if ($this->collAdapterMonitors !== null) {
                foreach ($this->collAdapterMonitors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->adapterTrapsScheduledForDeletion !== null) {
                if (!$this->adapterTrapsScheduledForDeletion->isEmpty()) {
                    foreach ($this->adapterTrapsScheduledForDeletion as $adapterTrap) {
                        // need to save related object because we set the relation to null
                        $adapterTrap->save($con);
                    }
                    $this->adapterTrapsScheduledForDeletion = null;
                }
            }

            if ($this->collAdapterTraps !== null) {
                foreach ($this->collAdapterTraps as $referrerFK) {
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

        $this->modifiedColumns[] = AdapterPeer::ADAPTERID;
        if (null !== $this->adapterid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AdapterPeer::ADAPTERID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AdapterPeer::ADAPTERID)) {
            $modifiedColumns[':p' . $index++]  = '`AdapterId`';
        }
        if ($this->isColumnModified(AdapterPeer::ADAPTERTYPEID)) {
            $modifiedColumns[':p' . $index++]  = '`AdapterTypeId`';
        }
        if ($this->isColumnModified(AdapterPeer::DEVICEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceId`';
        }
        if ($this->isColumnModified(AdapterPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`Name`';
        }
        if ($this->isColumnModified(AdapterPeer::INSTANCE)) {
            $modifiedColumns[':p' . $index++]  = '`Instance`';
        }
        if ($this->isColumnModified(AdapterPeer::IPADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`IpAddress`';
        }
        if ($this->isColumnModified(AdapterPeer::NETMASK)) {
            $modifiedColumns[':p' . $index++]  = '`Netmask`';
        }
        if ($this->isColumnModified(AdapterPeer::MACADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`MacAddress`';
        }
        if ($this->isColumnModified(AdapterPeer::SPEED)) {
            $modifiedColumns[':p' . $index++]  = '`Speed`';
        }
        if ($this->isColumnModified(AdapterPeer::ADMINISTRATIVESTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`AdministrativeStatus`';
        }
        if ($this->isColumnModified(AdapterPeer::OPERATIONALSTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`OperationalStatus`';
        }
        if ($this->isColumnModified(AdapterPeer::MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = '`Modified`';
        }

        $sql = sprintf(
            'INSERT INTO `Adapter` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`AdapterId`':
                        $stmt->bindValue($identifier, $this->adapterid, PDO::PARAM_INT);
                        break;
                    case '`AdapterTypeId`':
                        $stmt->bindValue($identifier, $this->adaptertypeid, PDO::PARAM_INT);
                        break;
                    case '`DeviceId`':
                        $stmt->bindValue($identifier, $this->deviceid, PDO::PARAM_INT);
                        break;
                    case '`Name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`Instance`':
                        $stmt->bindValue($identifier, $this->instance, PDO::PARAM_INT);
                        break;
                    case '`IpAddress`':
                        $stmt->bindValue($identifier, $this->ipaddress, PDO::PARAM_STR);
                        break;
                    case '`Netmask`':
                        $stmt->bindValue($identifier, $this->netmask, PDO::PARAM_STR);
                        break;
                    case '`MacAddress`':
                        $stmt->bindValue($identifier, $this->macaddress, PDO::PARAM_STR);
                        break;
                    case '`Speed`':
                        $stmt->bindValue($identifier, $this->speed, PDO::PARAM_INT);
                        break;
                    case '`AdministrativeStatus`':
                        $stmt->bindValue($identifier, (int) $this->administrativestatus, PDO::PARAM_INT);
                        break;
                    case '`OperationalStatus`':
                        $stmt->bindValue($identifier, (int) $this->operationalstatus, PDO::PARAM_INT);
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
        $this->setAdapterid($pk);

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

            if ($this->aAdapterType !== null) {
                if (!$this->aAdapterType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAdapterType->getValidationFailures());
                }
            }

            if ($this->aDevice !== null) {
                if (!$this->aDevice->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDevice->getValidationFailures());
                }
            }


            if (($retval = AdapterPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAdapterAdapterStatistics !== null) {
                    foreach ($this->collAdapterAdapterStatistics as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAdapterMonitors !== null) {
                    foreach ($this->collAdapterMonitors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAdapterTraps !== null) {
                    foreach ($this->collAdapterTraps as $referrerFK) {
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
        $pos = AdapterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAdapterid();
                break;
            case 1:
                return $this->getAdaptertypeid();
                break;
            case 2:
                return $this->getDeviceid();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getInstance();
                break;
            case 5:
                return $this->getIpaddress();
                break;
            case 6:
                return $this->getNetmask();
                break;
            case 7:
                return $this->getMacaddress();
                break;
            case 8:
                return $this->getSpeed();
                break;
            case 9:
                return $this->getAdministrativestatus();
                break;
            case 10:
                return $this->getOperationalstatus();
                break;
            case 11:
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
        if (isset($alreadyDumpedObjects['Adapter'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Adapter'][$this->getPrimaryKey()] = true;
        $keys = AdapterPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAdapterid(),
            $keys[1] => $this->getAdaptertypeid(),
            $keys[2] => $this->getDeviceid(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getInstance(),
            $keys[5] => $this->getIpaddress(),
            $keys[6] => $this->getNetmask(),
            $keys[7] => $this->getMacaddress(),
            $keys[8] => $this->getSpeed(),
            $keys[9] => $this->getAdministrativestatus(),
            $keys[10] => $this->getOperationalstatus(),
            $keys[11] => $this->getModified(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAdapterType) {
                $result['AdapterType'] = $this->aAdapterType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDevice) {
                $result['Device'] = $this->aDevice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAdapterAdapterStatistics) {
                $result['AdapterAdapterStatistics'] = $this->collAdapterAdapterStatistics->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAdapterMonitors) {
                $result['AdapterMonitors'] = $this->collAdapterMonitors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAdapterTraps) {
                $result['AdapterTraps'] = $this->collAdapterTraps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = AdapterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAdapterid($value);
                break;
            case 1:
                $this->setAdaptertypeid($value);
                break;
            case 2:
                $this->setDeviceid($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setInstance($value);
                break;
            case 5:
                $this->setIpaddress($value);
                break;
            case 6:
                $this->setNetmask($value);
                break;
            case 7:
                $this->setMacaddress($value);
                break;
            case 8:
                $this->setSpeed($value);
                break;
            case 9:
                $this->setAdministrativestatus($value);
                break;
            case 10:
                $this->setOperationalstatus($value);
                break;
            case 11:
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
        $keys = AdapterPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setAdapterid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setAdaptertypeid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDeviceid($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setInstance($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIpaddress($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNetmask($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMacaddress($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSpeed($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAdministrativestatus($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setOperationalstatus($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setModified($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AdapterPeer::DATABASE_NAME);

        if ($this->isColumnModified(AdapterPeer::ADAPTERID)) $criteria->add(AdapterPeer::ADAPTERID, $this->adapterid);
        if ($this->isColumnModified(AdapterPeer::ADAPTERTYPEID)) $criteria->add(AdapterPeer::ADAPTERTYPEID, $this->adaptertypeid);
        if ($this->isColumnModified(AdapterPeer::DEVICEID)) $criteria->add(AdapterPeer::DEVICEID, $this->deviceid);
        if ($this->isColumnModified(AdapterPeer::NAME)) $criteria->add(AdapterPeer::NAME, $this->name);
        if ($this->isColumnModified(AdapterPeer::INSTANCE)) $criteria->add(AdapterPeer::INSTANCE, $this->instance);
        if ($this->isColumnModified(AdapterPeer::IPADDRESS)) $criteria->add(AdapterPeer::IPADDRESS, $this->ipaddress);
        if ($this->isColumnModified(AdapterPeer::NETMASK)) $criteria->add(AdapterPeer::NETMASK, $this->netmask);
        if ($this->isColumnModified(AdapterPeer::MACADDRESS)) $criteria->add(AdapterPeer::MACADDRESS, $this->macaddress);
        if ($this->isColumnModified(AdapterPeer::SPEED)) $criteria->add(AdapterPeer::SPEED, $this->speed);
        if ($this->isColumnModified(AdapterPeer::ADMINISTRATIVESTATUS)) $criteria->add(AdapterPeer::ADMINISTRATIVESTATUS, $this->administrativestatus);
        if ($this->isColumnModified(AdapterPeer::OPERATIONALSTATUS)) $criteria->add(AdapterPeer::OPERATIONALSTATUS, $this->operationalstatus);
        if ($this->isColumnModified(AdapterPeer::MODIFIED)) $criteria->add(AdapterPeer::MODIFIED, $this->modified);

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
        $criteria = new Criteria(AdapterPeer::DATABASE_NAME);
        $criteria->add(AdapterPeer::ADAPTERID, $this->adapterid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getAdapterid();
    }

    /**
     * Generic method to set the primary key (adapterid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAdapterid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAdapterid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Adapter (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAdaptertypeid($this->getAdaptertypeid());
        $copyObj->setDeviceid($this->getDeviceid());
        $copyObj->setName($this->getName());
        $copyObj->setInstance($this->getInstance());
        $copyObj->setIpaddress($this->getIpaddress());
        $copyObj->setNetmask($this->getNetmask());
        $copyObj->setMacaddress($this->getMacaddress());
        $copyObj->setSpeed($this->getSpeed());
        $copyObj->setAdministrativestatus($this->getAdministrativestatus());
        $copyObj->setOperationalstatus($this->getOperationalstatus());
        $copyObj->setModified($this->getModified());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAdapterAdapterStatistics() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAdapterAdapterStatistic($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAdapterMonitors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAdapterMonitor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAdapterTraps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAdapterTrap($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAdapterid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Adapter Clone of current object.
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
     * @return AdapterPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AdapterPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a AdapterType object.
     *
     * @param             AdapterType $v
     * @return Adapter The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAdapterType(AdapterType $v = null)
    {
        if ($v === null) {
            $this->setAdaptertypeid(NULL);
        } else {
            $this->setAdaptertypeid($v->getAdaptertypeid());
        }

        $this->aAdapterType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the AdapterType object, it will not be re-added.
        if ($v !== null) {
            $v->addAdapterAdapterType($this);
        }


        return $this;
    }


    /**
     * Get the associated AdapterType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return AdapterType The associated AdapterType object.
     * @throws PropelException
     */
    public function getAdapterType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAdapterType === null && ($this->adaptertypeid !== null) && $doQuery) {
            $this->aAdapterType = AdapterTypeQuery::create()->findPk($this->adaptertypeid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAdapterType->addAdapterAdapterTypes($this);
             */
        }

        return $this->aAdapterType;
    }

    /**
     * Declares an association between this object and a Device object.
     *
     * @param             Device $v
     * @return Adapter The current object (for fluent API support)
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
            $v->addDeviceAdapter($this);
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
                $this->aDevice->addDeviceAdapters($this);
             */
        }

        return $this->aDevice;
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
        if ('AdapterAdapterStatistic' == $relationName) {
            $this->initAdapterAdapterStatistics();
        }
        if ('AdapterMonitor' == $relationName) {
            $this->initAdapterMonitors();
        }
        if ('AdapterTrap' == $relationName) {
            $this->initAdapterTraps();
        }
    }

    /**
     * Clears out the collAdapterAdapterStatistics collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Adapter The current object (for fluent API support)
     * @see        addAdapterAdapterStatistics()
     */
    public function clearAdapterAdapterStatistics()
    {
        $this->collAdapterAdapterStatistics = null; // important to set this to null since that means it is uninitialized
        $this->collAdapterAdapterStatisticsPartial = null;

        return $this;
    }

    /**
     * reset is the collAdapterAdapterStatistics collection loaded partially
     *
     * @return void
     */
    public function resetPartialAdapterAdapterStatistics($v = true)
    {
        $this->collAdapterAdapterStatisticsPartial = $v;
    }

    /**
     * Initializes the collAdapterAdapterStatistics collection.
     *
     * By default this just sets the collAdapterAdapterStatistics collection to an empty array (like clearcollAdapterAdapterStatistics());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAdapterAdapterStatistics($overrideExisting = true)
    {
        if (null !== $this->collAdapterAdapterStatistics && !$overrideExisting) {
            return;
        }
        $this->collAdapterAdapterStatistics = new PropelObjectCollection();
        $this->collAdapterAdapterStatistics->setModel('AdapterStatistic');
    }

    /**
     * Gets an array of AdapterStatistic objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Adapter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AdapterStatistic[] List of AdapterStatistic objects
     * @throws PropelException
     */
    public function getAdapterAdapterStatistics($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAdapterAdapterStatisticsPartial && !$this->isNew();
        if (null === $this->collAdapterAdapterStatistics || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAdapterAdapterStatistics) {
                // return empty collection
                $this->initAdapterAdapterStatistics();
            } else {
                $collAdapterAdapterStatistics = AdapterStatisticQuery::create(null, $criteria)
                    ->filterByAdapter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAdapterAdapterStatisticsPartial && count($collAdapterAdapterStatistics)) {
                      $this->initAdapterAdapterStatistics(false);

                      foreach($collAdapterAdapterStatistics as $obj) {
                        if (false == $this->collAdapterAdapterStatistics->contains($obj)) {
                          $this->collAdapterAdapterStatistics->append($obj);
                        }
                      }

                      $this->collAdapterAdapterStatisticsPartial = true;
                    }

                    $collAdapterAdapterStatistics->getInternalIterator()->rewind();
                    return $collAdapterAdapterStatistics;
                }

                if($partial && $this->collAdapterAdapterStatistics) {
                    foreach($this->collAdapterAdapterStatistics as $obj) {
                        if($obj->isNew()) {
                            $collAdapterAdapterStatistics[] = $obj;
                        }
                    }
                }

                $this->collAdapterAdapterStatistics = $collAdapterAdapterStatistics;
                $this->collAdapterAdapterStatisticsPartial = false;
            }
        }

        return $this->collAdapterAdapterStatistics;
    }

    /**
     * Sets a collection of AdapterAdapterStatistic objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $adapterAdapterStatistics A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Adapter The current object (for fluent API support)
     */
    public function setAdapterAdapterStatistics(PropelCollection $adapterAdapterStatistics, PropelPDO $con = null)
    {
        $adapterAdapterStatisticsToDelete = $this->getAdapterAdapterStatistics(new Criteria(), $con)->diff($adapterAdapterStatistics);

        $this->adapterAdapterStatisticsScheduledForDeletion = unserialize(serialize($adapterAdapterStatisticsToDelete));

        foreach ($adapterAdapterStatisticsToDelete as $adapterAdapterStatisticRemoved) {
            $adapterAdapterStatisticRemoved->setAdapter(null);
        }

        $this->collAdapterAdapterStatistics = null;
        foreach ($adapterAdapterStatistics as $adapterAdapterStatistic) {
            $this->addAdapterAdapterStatistic($adapterAdapterStatistic);
        }

        $this->collAdapterAdapterStatistics = $adapterAdapterStatistics;
        $this->collAdapterAdapterStatisticsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AdapterStatistic objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AdapterStatistic objects.
     * @throws PropelException
     */
    public function countAdapterAdapterStatistics(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAdapterAdapterStatisticsPartial && !$this->isNew();
        if (null === $this->collAdapterAdapterStatistics || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAdapterAdapterStatistics) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAdapterAdapterStatistics());
            }
            $query = AdapterStatisticQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAdapter($this)
                ->count($con);
        }

        return count($this->collAdapterAdapterStatistics);
    }

    /**
     * Method called to associate a AdapterStatistic object to this object
     * through the AdapterStatistic foreign key attribute.
     *
     * @param    AdapterStatistic $l AdapterStatistic
     * @return Adapter The current object (for fluent API support)
     */
    public function addAdapterAdapterStatistic(AdapterStatistic $l)
    {
        if ($this->collAdapterAdapterStatistics === null) {
            $this->initAdapterAdapterStatistics();
            $this->collAdapterAdapterStatisticsPartial = true;
        }
        if (!in_array($l, $this->collAdapterAdapterStatistics->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAdapterAdapterStatistic($l);
        }

        return $this;
    }

    /**
     * @param	AdapterAdapterStatistic $adapterAdapterStatistic The adapterAdapterStatistic object to add.
     */
    protected function doAddAdapterAdapterStatistic($adapterAdapterStatistic)
    {
        $this->collAdapterAdapterStatistics[]= $adapterAdapterStatistic;
        $adapterAdapterStatistic->setAdapter($this);
    }

    /**
     * @param	AdapterAdapterStatistic $adapterAdapterStatistic The adapterAdapterStatistic object to remove.
     * @return Adapter The current object (for fluent API support)
     */
    public function removeAdapterAdapterStatistic($adapterAdapterStatistic)
    {
        if ($this->getAdapterAdapterStatistics()->contains($adapterAdapterStatistic)) {
            $this->collAdapterAdapterStatistics->remove($this->collAdapterAdapterStatistics->search($adapterAdapterStatistic));
            if (null === $this->adapterAdapterStatisticsScheduledForDeletion) {
                $this->adapterAdapterStatisticsScheduledForDeletion = clone $this->collAdapterAdapterStatistics;
                $this->adapterAdapterStatisticsScheduledForDeletion->clear();
            }
            $this->adapterAdapterStatisticsScheduledForDeletion[]= clone $adapterAdapterStatistic;
            $adapterAdapterStatistic->setAdapter(null);
        }

        return $this;
    }

    /**
     * Clears out the collAdapterMonitors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Adapter The current object (for fluent API support)
     * @see        addAdapterMonitors()
     */
    public function clearAdapterMonitors()
    {
        $this->collAdapterMonitors = null; // important to set this to null since that means it is uninitialized
        $this->collAdapterMonitorsPartial = null;

        return $this;
    }

    /**
     * reset is the collAdapterMonitors collection loaded partially
     *
     * @return void
     */
    public function resetPartialAdapterMonitors($v = true)
    {
        $this->collAdapterMonitorsPartial = $v;
    }

    /**
     * Initializes the collAdapterMonitors collection.
     *
     * By default this just sets the collAdapterMonitors collection to an empty array (like clearcollAdapterMonitors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAdapterMonitors($overrideExisting = true)
    {
        if (null !== $this->collAdapterMonitors && !$overrideExisting) {
            return;
        }
        $this->collAdapterMonitors = new PropelObjectCollection();
        $this->collAdapterMonitors->setModel('Monitor');
    }

    /**
     * Gets an array of Monitor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Adapter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     * @throws PropelException
     */
    public function getAdapterMonitors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAdapterMonitorsPartial && !$this->isNew();
        if (null === $this->collAdapterMonitors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAdapterMonitors) {
                // return empty collection
                $this->initAdapterMonitors();
            } else {
                $collAdapterMonitors = MonitorQuery::create(null, $criteria)
                    ->filterByAdapter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAdapterMonitorsPartial && count($collAdapterMonitors)) {
                      $this->initAdapterMonitors(false);

                      foreach($collAdapterMonitors as $obj) {
                        if (false == $this->collAdapterMonitors->contains($obj)) {
                          $this->collAdapterMonitors->append($obj);
                        }
                      }

                      $this->collAdapterMonitorsPartial = true;
                    }

                    $collAdapterMonitors->getInternalIterator()->rewind();
                    return $collAdapterMonitors;
                }

                if($partial && $this->collAdapterMonitors) {
                    foreach($this->collAdapterMonitors as $obj) {
                        if($obj->isNew()) {
                            $collAdapterMonitors[] = $obj;
                        }
                    }
                }

                $this->collAdapterMonitors = $collAdapterMonitors;
                $this->collAdapterMonitorsPartial = false;
            }
        }

        return $this->collAdapterMonitors;
    }

    /**
     * Sets a collection of AdapterMonitor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $adapterMonitors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Adapter The current object (for fluent API support)
     */
    public function setAdapterMonitors(PropelCollection $adapterMonitors, PropelPDO $con = null)
    {
        $adapterMonitorsToDelete = $this->getAdapterMonitors(new Criteria(), $con)->diff($adapterMonitors);

        $this->adapterMonitorsScheduledForDeletion = unserialize(serialize($adapterMonitorsToDelete));

        foreach ($adapterMonitorsToDelete as $adapterMonitorRemoved) {
            $adapterMonitorRemoved->setAdapter(null);
        }

        $this->collAdapterMonitors = null;
        foreach ($adapterMonitors as $adapterMonitor) {
            $this->addAdapterMonitor($adapterMonitor);
        }

        $this->collAdapterMonitors = $adapterMonitors;
        $this->collAdapterMonitorsPartial = false;

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
    public function countAdapterMonitors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAdapterMonitorsPartial && !$this->isNew();
        if (null === $this->collAdapterMonitors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAdapterMonitors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAdapterMonitors());
            }
            $query = MonitorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAdapter($this)
                ->count($con);
        }

        return count($this->collAdapterMonitors);
    }

    /**
     * Method called to associate a Monitor object to this object
     * through the Monitor foreign key attribute.
     *
     * @param    Monitor $l Monitor
     * @return Adapter The current object (for fluent API support)
     */
    public function addAdapterMonitor(Monitor $l)
    {
        if ($this->collAdapterMonitors === null) {
            $this->initAdapterMonitors();
            $this->collAdapterMonitorsPartial = true;
        }
        if (!in_array($l, $this->collAdapterMonitors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAdapterMonitor($l);
        }

        return $this;
    }

    /**
     * @param	AdapterMonitor $adapterMonitor The adapterMonitor object to add.
     */
    protected function doAddAdapterMonitor($adapterMonitor)
    {
        $this->collAdapterMonitors[]= $adapterMonitor;
        $adapterMonitor->setAdapter($this);
    }

    /**
     * @param	AdapterMonitor $adapterMonitor The adapterMonitor object to remove.
     * @return Adapter The current object (for fluent API support)
     */
    public function removeAdapterMonitor($adapterMonitor)
    {
        if ($this->getAdapterMonitors()->contains($adapterMonitor)) {
            $this->collAdapterMonitors->remove($this->collAdapterMonitors->search($adapterMonitor));
            if (null === $this->adapterMonitorsScheduledForDeletion) {
                $this->adapterMonitorsScheduledForDeletion = clone $this->collAdapterMonitors;
                $this->adapterMonitorsScheduledForDeletion->clear();
            }
            $this->adapterMonitorsScheduledForDeletion[]= clone $adapterMonitor;
            $adapterMonitor->setAdapter(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Adapter is new, it will return
     * an empty collection; or if this Adapter has previously
     * been saved, it will retrieve related AdapterMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Adapter.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getAdapterMonitorsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getAdapterMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Adapter is new, it will return
     * an empty collection; or if this Adapter has previously
     * been saved, it will retrieve related AdapterMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Adapter.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getAdapterMonitorsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getAdapterMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Adapter is new, it will return
     * an empty collection; or if this Adapter has previously
     * been saved, it will retrieve related AdapterMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Adapter.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getAdapterMonitorsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getAdapterMonitors($query, $con);
    }

    /**
     * Clears out the collAdapterTraps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Adapter The current object (for fluent API support)
     * @see        addAdapterTraps()
     */
    public function clearAdapterTraps()
    {
        $this->collAdapterTraps = null; // important to set this to null since that means it is uninitialized
        $this->collAdapterTrapsPartial = null;

        return $this;
    }

    /**
     * reset is the collAdapterTraps collection loaded partially
     *
     * @return void
     */
    public function resetPartialAdapterTraps($v = true)
    {
        $this->collAdapterTrapsPartial = $v;
    }

    /**
     * Initializes the collAdapterTraps collection.
     *
     * By default this just sets the collAdapterTraps collection to an empty array (like clearcollAdapterTraps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAdapterTraps($overrideExisting = true)
    {
        if (null !== $this->collAdapterTraps && !$overrideExisting) {
            return;
        }
        $this->collAdapterTraps = new PropelObjectCollection();
        $this->collAdapterTraps->setModel('Trap');
    }

    /**
     * Gets an array of Trap objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Adapter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Trap[] List of Trap objects
     * @throws PropelException
     */
    public function getAdapterTraps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAdapterTrapsPartial && !$this->isNew();
        if (null === $this->collAdapterTraps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAdapterTraps) {
                // return empty collection
                $this->initAdapterTraps();
            } else {
                $collAdapterTraps = TrapQuery::create(null, $criteria)
                    ->filterByAdapter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAdapterTrapsPartial && count($collAdapterTraps)) {
                      $this->initAdapterTraps(false);

                      foreach($collAdapterTraps as $obj) {
                        if (false == $this->collAdapterTraps->contains($obj)) {
                          $this->collAdapterTraps->append($obj);
                        }
                      }

                      $this->collAdapterTrapsPartial = true;
                    }

                    $collAdapterTraps->getInternalIterator()->rewind();
                    return $collAdapterTraps;
                }

                if($partial && $this->collAdapterTraps) {
                    foreach($this->collAdapterTraps as $obj) {
                        if($obj->isNew()) {
                            $collAdapterTraps[] = $obj;
                        }
                    }
                }

                $this->collAdapterTraps = $collAdapterTraps;
                $this->collAdapterTrapsPartial = false;
            }
        }

        return $this->collAdapterTraps;
    }

    /**
     * Sets a collection of AdapterTrap objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $adapterTraps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Adapter The current object (for fluent API support)
     */
    public function setAdapterTraps(PropelCollection $adapterTraps, PropelPDO $con = null)
    {
        $adapterTrapsToDelete = $this->getAdapterTraps(new Criteria(), $con)->diff($adapterTraps);

        $this->adapterTrapsScheduledForDeletion = unserialize(serialize($adapterTrapsToDelete));

        foreach ($adapterTrapsToDelete as $adapterTrapRemoved) {
            $adapterTrapRemoved->setAdapter(null);
        }

        $this->collAdapterTraps = null;
        foreach ($adapterTraps as $adapterTrap) {
            $this->addAdapterTrap($adapterTrap);
        }

        $this->collAdapterTraps = $adapterTraps;
        $this->collAdapterTrapsPartial = false;

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
    public function countAdapterTraps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAdapterTrapsPartial && !$this->isNew();
        if (null === $this->collAdapterTraps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAdapterTraps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAdapterTraps());
            }
            $query = TrapQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAdapter($this)
                ->count($con);
        }

        return count($this->collAdapterTraps);
    }

    /**
     * Method called to associate a Trap object to this object
     * through the Trap foreign key attribute.
     *
     * @param    Trap $l Trap
     * @return Adapter The current object (for fluent API support)
     */
    public function addAdapterTrap(Trap $l)
    {
        if ($this->collAdapterTraps === null) {
            $this->initAdapterTraps();
            $this->collAdapterTrapsPartial = true;
        }
        if (!in_array($l, $this->collAdapterTraps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAdapterTrap($l);
        }

        return $this;
    }

    /**
     * @param	AdapterTrap $adapterTrap The adapterTrap object to add.
     */
    protected function doAddAdapterTrap($adapterTrap)
    {
        $this->collAdapterTraps[]= $adapterTrap;
        $adapterTrap->setAdapter($this);
    }

    /**
     * @param	AdapterTrap $adapterTrap The adapterTrap object to remove.
     * @return Adapter The current object (for fluent API support)
     */
    public function removeAdapterTrap($adapterTrap)
    {
        if ($this->getAdapterTraps()->contains($adapterTrap)) {
            $this->collAdapterTraps->remove($this->collAdapterTraps->search($adapterTrap));
            if (null === $this->adapterTrapsScheduledForDeletion) {
                $this->adapterTrapsScheduledForDeletion = clone $this->collAdapterTraps;
                $this->adapterTrapsScheduledForDeletion->clear();
            }
            $this->adapterTrapsScheduledForDeletion[]= $adapterTrap;
            $adapterTrap->setAdapter(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Adapter is new, it will return
     * an empty collection; or if this Adapter has previously
     * been saved, it will retrieve related AdapterTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Adapter.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getAdapterTrapsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getAdapterTraps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Adapter is new, it will return
     * an empty collection; or if this Adapter has previously
     * been saved, it will retrieve related AdapterTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Adapter.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getAdapterTrapsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getAdapterTraps($query, $con);
    }

    /**
     * Clears out the collDevices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Adapter The current object (for fluent API support)
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
     * If this Adapter is new, it will return
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
                    ->filterByAdapter($this)
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
     * @return Adapter The current object (for fluent API support)
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
                    ->filterByAdapter($this)
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
     * @return Adapter The current object (for fluent API support)
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
        $this->addAdapterMonitor($monitor);
    }

    /**
     * Remove a Device object to this object
     * through the Monitor cross reference table.
     *
     * @param Device $device The Monitor object to relate
     * @return Adapter The current object (for fluent API support)
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
     * Clears out the collPlugins collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Adapter The current object (for fluent API support)
     * @see        addPlugins()
     */
    public function clearPlugins()
    {
        $this->collPlugins = null; // important to set this to null since that means it is uninitialized
        $this->collPluginsPartial = null;

        return $this;
    }

    /**
     * Initializes the collPlugins collection.
     *
     * By default this just sets the collPlugins collection to an empty collection (like clearPlugins());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initPlugins()
    {
        $this->collPlugins = new PropelObjectCollection();
        $this->collPlugins->setModel('Plugin');
    }

    /**
     * Gets a collection of Plugin objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Adapter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Plugin[] List of Plugin objects
     */
    public function getPlugins($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collPlugins || null !== $criteria) {
            if ($this->isNew() && null === $this->collPlugins) {
                // return empty collection
                $this->initPlugins();
            } else {
                $collPlugins = PluginQuery::create(null, $criteria)
                    ->filterByAdapter($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collPlugins;
                }
                $this->collPlugins = $collPlugins;
            }
        }

        return $this->collPlugins;
    }

    /**
     * Sets a collection of Plugin objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $plugins A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Adapter The current object (for fluent API support)
     */
    public function setPlugins(PropelCollection $plugins, PropelPDO $con = null)
    {
        $this->clearPlugins();
        $currentPlugins = $this->getPlugins();

        $this->pluginsScheduledForDeletion = $currentPlugins->diff($plugins);

        foreach ($plugins as $plugin) {
            if (!$currentPlugins->contains($plugin)) {
                $this->doAddPlugin($plugin);
            }
        }

        $this->collPlugins = $plugins;

        return $this;
    }

    /**
     * Gets the number of Plugin objects related by a many-to-many relationship
     * to the current object by way of the Monitor cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Plugin objects
     */
    public function countPlugins($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collPlugins || null !== $criteria) {
            if ($this->isNew() && null === $this->collPlugins) {
                return 0;
            } else {
                $query = PluginQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByAdapter($this)
                    ->count($con);
            }
        } else {
            return count($this->collPlugins);
        }
    }

    /**
     * Associate a Plugin object to this object
     * through the Monitor cross reference table.
     *
     * @param  Plugin $plugin The Monitor object to relate
     * @return Adapter The current object (for fluent API support)
     */
    public function addPlugin(Plugin $plugin)
    {
        if ($this->collPlugins === null) {
            $this->initPlugins();
        }
        if (!$this->collPlugins->contains($plugin)) { // only add it if the **same** object is not already associated
            $this->doAddPlugin($plugin);

            $this->collPlugins[]= $plugin;
        }

        return $this;
    }

    /**
     * @param	Plugin $plugin The plugin object to add.
     */
    protected function doAddPlugin($plugin)
    {
        $monitor = new Monitor();
        $monitor->setPlugin($plugin);
        $this->addAdapterMonitor($monitor);
    }

    /**
     * Remove a Plugin object to this object
     * through the Monitor cross reference table.
     *
     * @param Plugin $plugin The Monitor object to relate
     * @return Adapter The current object (for fluent API support)
     */
    public function removePlugin(Plugin $plugin)
    {
        if ($this->getPlugins()->contains($plugin)) {
            $this->collPlugins->remove($this->collPlugins->search($plugin));
            if (null === $this->pluginsScheduledForDeletion) {
                $this->pluginsScheduledForDeletion = clone $this->collPlugins;
                $this->pluginsScheduledForDeletion->clear();
            }
            $this->pluginsScheduledForDeletion[]= $plugin;
        }

        return $this;
    }

    /**
     * Clears out the collSnmpPropertys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Adapter The current object (for fluent API support)
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
     * If this Adapter is new, it will return
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
                    ->filterByAdapter($this)
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
     * @return Adapter The current object (for fluent API support)
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
                    ->filterByAdapter($this)
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
     * @return Adapter The current object (for fluent API support)
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
        $this->addAdapterMonitor($monitor);
    }

    /**
     * Remove a SnmpProperty object to this object
     * through the Monitor cross reference table.
     *
     * @param SnmpProperty $snmpProperty The Monitor object to relate
     * @return Adapter The current object (for fluent API support)
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
        $this->adapterid = null;
        $this->adaptertypeid = null;
        $this->deviceid = null;
        $this->name = null;
        $this->instance = null;
        $this->ipaddress = null;
        $this->netmask = null;
        $this->macaddress = null;
        $this->speed = null;
        $this->administrativestatus = null;
        $this->operationalstatus = null;
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
            if ($this->collAdapterAdapterStatistics) {
                foreach ($this->collAdapterAdapterStatistics as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAdapterMonitors) {
                foreach ($this->collAdapterMonitors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAdapterTraps) {
                foreach ($this->collAdapterTraps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDevices) {
                foreach ($this->collDevices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPlugins) {
                foreach ($this->collPlugins as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSnmpPropertys) {
                foreach ($this->collSnmpPropertys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aAdapterType instanceof Persistent) {
              $this->aAdapterType->clearAllReferences($deep);
            }
            if ($this->aDevice instanceof Persistent) {
              $this->aDevice->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAdapterAdapterStatistics instanceof PropelCollection) {
            $this->collAdapterAdapterStatistics->clearIterator();
        }
        $this->collAdapterAdapterStatistics = null;
        if ($this->collAdapterMonitors instanceof PropelCollection) {
            $this->collAdapterMonitors->clearIterator();
        }
        $this->collAdapterMonitors = null;
        if ($this->collAdapterTraps instanceof PropelCollection) {
            $this->collAdapterTraps->clearIterator();
        }
        $this->collAdapterTraps = null;
        if ($this->collDevices instanceof PropelCollection) {
            $this->collDevices->clearIterator();
        }
        $this->collDevices = null;
        if ($this->collPlugins instanceof PropelCollection) {
            $this->collPlugins->clearIterator();
        }
        $this->collPlugins = null;
        if ($this->collSnmpPropertys instanceof PropelCollection) {
            $this->collSnmpPropertys->clearIterator();
        }
        $this->collSnmpPropertys = null;
        $this->aAdapterType = null;
        $this->aDevice = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AdapterPeer::DEFAULT_STRING_FORMAT);
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
