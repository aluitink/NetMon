<?php


/**
 * Base class that represents a row from the 'Interface' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseInterface extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'InterfacePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        InterfacePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the interfaceid field.
     * @var        int
     */
    protected $interfaceid;

    /**
     * The value for the interfacetypeid field.
     * @var        int
     */
    protected $interfacetypeid;

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
     * @var        InterfaceType
     */
    protected $aInterfaceType;

    /**
     * @var        Device
     */
    protected $aDevice;

    /**
     * @var        PropelObjectCollection|InterfaceStatistic[] Collection to store aggregation of InterfaceStatistic objects.
     */
    protected $collInterfaceInterfaceStatistics;
    protected $collInterfaceInterfaceStatisticsPartial;

    /**
     * @var        PropelObjectCollection|Monitor[] Collection to store aggregation of Monitor objects.
     */
    protected $collInterfaceMonitors;
    protected $collInterfaceMonitorsPartial;

    /**
     * @var        PropelObjectCollection|Trap[] Collection to store aggregation of Trap objects.
     */
    protected $collInterfaceTraps;
    protected $collInterfaceTrapsPartial;

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
    protected $interfaceInterfaceStatisticsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $interfaceMonitorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $interfaceTrapsScheduledForDeletion = null;

    /**
     * Get the [interfaceid] column value.
     *
     * @return int
     */
    public function getInterfaceid()
    {
        return $this->interfaceid;
    }

    /**
     * Get the [interfacetypeid] column value.
     *
     * @return int
     */
    public function getInterfacetypeid()
    {
        return $this->interfacetypeid;
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
     * Set the value of [interfaceid] column.
     *
     * @param int $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setInterfaceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->interfaceid !== $v) {
            $this->interfaceid = $v;
            $this->modifiedColumns[] = InterfacePeer::INTERFACEID;
        }


        return $this;
    } // setInterfaceid()

    /**
     * Set the value of [interfacetypeid] column.
     *
     * @param int $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setInterfacetypeid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->interfacetypeid !== $v) {
            $this->interfacetypeid = $v;
            $this->modifiedColumns[] = InterfacePeer::INTERFACETYPEID;
        }

        if ($this->aInterfaceType !== null && $this->aInterfaceType->getInterfacetypeid() !== $v) {
            $this->aInterfaceType = null;
        }


        return $this;
    } // setInterfacetypeid()

    /**
     * Set the value of [deviceid] column.
     *
     * @param int $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setDeviceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deviceid !== $v) {
            $this->deviceid = $v;
            $this->modifiedColumns[] = InterfacePeer::DEVICEID;
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
     * @return Interface The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = InterfacePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [instance] column.
     *
     * @param int $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setInstance($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->instance !== $v) {
            $this->instance = $v;
            $this->modifiedColumns[] = InterfacePeer::INSTANCE;
        }


        return $this;
    } // setInstance()

    /**
     * Set the value of [ipaddress] column.
     *
     * @param string $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setIpaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ipaddress !== $v) {
            $this->ipaddress = $v;
            $this->modifiedColumns[] = InterfacePeer::IPADDRESS;
        }


        return $this;
    } // setIpaddress()

    /**
     * Set the value of [netmask] column.
     *
     * @param string $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setNetmask($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->netmask !== $v) {
            $this->netmask = $v;
            $this->modifiedColumns[] = InterfacePeer::NETMASK;
        }


        return $this;
    } // setNetmask()

    /**
     * Set the value of [macaddress] column.
     *
     * @param string $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setMacaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->macaddress !== $v) {
            $this->macaddress = $v;
            $this->modifiedColumns[] = InterfacePeer::MACADDRESS;
        }


        return $this;
    } // setMacaddress()

    /**
     * Set the value of [speed] column.
     *
     * @param int $v new value
     * @return Interface The current object (for fluent API support)
     */
    public function setSpeed($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->speed !== $v) {
            $this->speed = $v;
            $this->modifiedColumns[] = InterfacePeer::SPEED;
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
     * @return Interface The current object (for fluent API support)
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
            $this->modifiedColumns[] = InterfacePeer::ADMINISTRATIVESTATUS;
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
     * @return Interface The current object (for fluent API support)
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
            $this->modifiedColumns[] = InterfacePeer::OPERATIONALSTATUS;
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
     * @return Interface The current object (for fluent API support)
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
            $this->modifiedColumns[] = InterfacePeer::MODIFIED;
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

            $this->interfaceid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->interfacetypeid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
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
            return $startcol + 12; // 12 = InterfacePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Interface object", $e);
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

        if ($this->aInterfaceType !== null && $this->interfacetypeid !== $this->aInterfaceType->getInterfacetypeid()) {
            $this->aInterfaceType = null;
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
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = InterfacePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aInterfaceType = null;
            $this->aDevice = null;
            $this->collInterfaceInterfaceStatistics = null;

            $this->collInterfaceMonitors = null;

            $this->collInterfaceTraps = null;

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
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = InterfaceQuery::create()
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
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                InterfacePeer::addInstanceToPool($this);
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

            if ($this->aInterfaceType !== null) {
                if ($this->aInterfaceType->isModified() || $this->aInterfaceType->isNew()) {
                    $affectedRows += $this->aInterfaceType->save($con);
                }
                $this->setInterfaceType($this->aInterfaceType);
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
                    InterfaceMonitorQuery::create()
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
                    InterfaceMonitorQuery::create()
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
                    InterfaceMonitorQuery::create()
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

            if ($this->interfaceInterfaceStatisticsScheduledForDeletion !== null) {
                if (!$this->interfaceInterfaceStatisticsScheduledForDeletion->isEmpty()) {
                    InterfaceStatisticQuery::create()
                        ->filterByPrimaryKeys($this->interfaceInterfaceStatisticsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->interfaceInterfaceStatisticsScheduledForDeletion = null;
                }
            }

            if ($this->collInterfaceInterfaceStatistics !== null) {
                foreach ($this->collInterfaceInterfaceStatistics as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->interfaceMonitorsScheduledForDeletion !== null) {
                if (!$this->interfaceMonitorsScheduledForDeletion->isEmpty()) {
                    MonitorQuery::create()
                        ->filterByPrimaryKeys($this->interfaceMonitorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->interfaceMonitorsScheduledForDeletion = null;
                }
            }

            if ($this->collInterfaceMonitors !== null) {
                foreach ($this->collInterfaceMonitors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->interfaceTrapsScheduledForDeletion !== null) {
                if (!$this->interfaceTrapsScheduledForDeletion->isEmpty()) {
                    foreach ($this->interfaceTrapsScheduledForDeletion as $interfaceTrap) {
                        // need to save related object because we set the relation to null
                        $interfaceTrap->save($con);
                    }
                    $this->interfaceTrapsScheduledForDeletion = null;
                }
            }

            if ($this->collInterfaceTraps !== null) {
                foreach ($this->collInterfaceTraps as $referrerFK) {
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

        $this->modifiedColumns[] = InterfacePeer::INTERFACEID;
        if (null !== $this->interfaceid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . InterfacePeer::INTERFACEID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(InterfacePeer::INTERFACEID)) {
            $modifiedColumns[':p' . $index++]  = '`InterfaceId`';
        }
        if ($this->isColumnModified(InterfacePeer::INTERFACETYPEID)) {
            $modifiedColumns[':p' . $index++]  = '`InterfaceTypeId`';
        }
        if ($this->isColumnModified(InterfacePeer::DEVICEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceId`';
        }
        if ($this->isColumnModified(InterfacePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`Name`';
        }
        if ($this->isColumnModified(InterfacePeer::INSTANCE)) {
            $modifiedColumns[':p' . $index++]  = '`Instance`';
        }
        if ($this->isColumnModified(InterfacePeer::IPADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`IpAddress`';
        }
        if ($this->isColumnModified(InterfacePeer::NETMASK)) {
            $modifiedColumns[':p' . $index++]  = '`Netmask`';
        }
        if ($this->isColumnModified(InterfacePeer::MACADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`MacAddress`';
        }
        if ($this->isColumnModified(InterfacePeer::SPEED)) {
            $modifiedColumns[':p' . $index++]  = '`Speed`';
        }
        if ($this->isColumnModified(InterfacePeer::ADMINISTRATIVESTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`AdministrativeStatus`';
        }
        if ($this->isColumnModified(InterfacePeer::OPERATIONALSTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`OperationalStatus`';
        }
        if ($this->isColumnModified(InterfacePeer::MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = '`Modified`';
        }

        $sql = sprintf(
            'INSERT INTO `Interface` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`InterfaceId`':
                        $stmt->bindValue($identifier, $this->interfaceid, PDO::PARAM_INT);
                        break;
                    case '`InterfaceTypeId`':
                        $stmt->bindValue($identifier, $this->interfacetypeid, PDO::PARAM_INT);
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
        $this->setInterfaceid($pk);

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

            if ($this->aInterfaceType !== null) {
                if (!$this->aInterfaceType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aInterfaceType->getValidationFailures());
                }
            }

            if ($this->aDevice !== null) {
                if (!$this->aDevice->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDevice->getValidationFailures());
                }
            }


            if (($retval = InterfacePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collInterfaceInterfaceStatistics !== null) {
                    foreach ($this->collInterfaceInterfaceStatistics as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collInterfaceMonitors !== null) {
                    foreach ($this->collInterfaceMonitors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collInterfaceTraps !== null) {
                    foreach ($this->collInterfaceTraps as $referrerFK) {
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
        $pos = InterfacePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getInterfaceid();
                break;
            case 1:
                return $this->getInterfacetypeid();
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
        if (isset($alreadyDumpedObjects['Interface'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Interface'][$this->getPrimaryKey()] = true;
        $keys = InterfacePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getInterfaceid(),
            $keys[1] => $this->getInterfacetypeid(),
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
            if (null !== $this->aInterfaceType) {
                $result['InterfaceType'] = $this->aInterfaceType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDevice) {
                $result['Device'] = $this->aDevice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collInterfaceInterfaceStatistics) {
                $result['InterfaceInterfaceStatistics'] = $this->collInterfaceInterfaceStatistics->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInterfaceMonitors) {
                $result['InterfaceMonitors'] = $this->collInterfaceMonitors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInterfaceTraps) {
                $result['InterfaceTraps'] = $this->collInterfaceTraps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = InterfacePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setInterfaceid($value);
                break;
            case 1:
                $this->setInterfacetypeid($value);
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
        $keys = InterfacePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setInterfaceid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setInterfacetypeid($arr[$keys[1]]);
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
        $criteria = new Criteria(InterfacePeer::DATABASE_NAME);

        if ($this->isColumnModified(InterfacePeer::INTERFACEID)) $criteria->add(InterfacePeer::INTERFACEID, $this->interfaceid);
        if ($this->isColumnModified(InterfacePeer::INTERFACETYPEID)) $criteria->add(InterfacePeer::INTERFACETYPEID, $this->interfacetypeid);
        if ($this->isColumnModified(InterfacePeer::DEVICEID)) $criteria->add(InterfacePeer::DEVICEID, $this->deviceid);
        if ($this->isColumnModified(InterfacePeer::NAME)) $criteria->add(InterfacePeer::NAME, $this->name);
        if ($this->isColumnModified(InterfacePeer::INSTANCE)) $criteria->add(InterfacePeer::INSTANCE, $this->instance);
        if ($this->isColumnModified(InterfacePeer::IPADDRESS)) $criteria->add(InterfacePeer::IPADDRESS, $this->ipaddress);
        if ($this->isColumnModified(InterfacePeer::NETMASK)) $criteria->add(InterfacePeer::NETMASK, $this->netmask);
        if ($this->isColumnModified(InterfacePeer::MACADDRESS)) $criteria->add(InterfacePeer::MACADDRESS, $this->macaddress);
        if ($this->isColumnModified(InterfacePeer::SPEED)) $criteria->add(InterfacePeer::SPEED, $this->speed);
        if ($this->isColumnModified(InterfacePeer::ADMINISTRATIVESTATUS)) $criteria->add(InterfacePeer::ADMINISTRATIVESTATUS, $this->administrativestatus);
        if ($this->isColumnModified(InterfacePeer::OPERATIONALSTATUS)) $criteria->add(InterfacePeer::OPERATIONALSTATUS, $this->operationalstatus);
        if ($this->isColumnModified(InterfacePeer::MODIFIED)) $criteria->add(InterfacePeer::MODIFIED, $this->modified);

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
        $criteria = new Criteria(InterfacePeer::DATABASE_NAME);
        $criteria->add(InterfacePeer::INTERFACEID, $this->interfaceid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getInterfaceid();
    }

    /**
     * Generic method to set the primary key (interfaceid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setInterfaceid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getInterfaceid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Interface (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setInterfacetypeid($this->getInterfacetypeid());
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

            foreach ($this->getInterfaceInterfaceStatistics() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInterfaceInterfaceStatistic($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInterfaceMonitors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInterfaceMonitor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInterfaceTraps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInterfaceTrap($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setInterfaceid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Interface Clone of current object.
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
     * @return InterfacePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new InterfacePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a InterfaceType object.
     *
     * @param             InterfaceType $v
     * @return Interface The current object (for fluent API support)
     * @throws PropelException
     */
    public function setInterfaceType(InterfaceType $v = null)
    {
        if ($v === null) {
            $this->setInterfacetypeid(NULL);
        } else {
            $this->setInterfacetypeid($v->getInterfacetypeid());
        }

        $this->aInterfaceType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the InterfaceType object, it will not be re-added.
        if ($v !== null) {
            $v->addInterfaceInterfaceType($this);
        }


        return $this;
    }


    /**
     * Get the associated InterfaceType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return InterfaceType The associated InterfaceType object.
     * @throws PropelException
     */
    public function getInterfaceType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aInterfaceType === null && ($this->interfacetypeid !== null) && $doQuery) {
            $this->aInterfaceType = InterfaceTypeQuery::create()->findPk($this->interfacetypeid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aInterfaceType->addInterfaceInterfaceTypes($this);
             */
        }

        return $this->aInterfaceType;
    }

    /**
     * Declares an association between this object and a Device object.
     *
     * @param             Device $v
     * @return Interface The current object (for fluent API support)
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
            $v->addDeviceInterface($this);
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
                $this->aDevice->addDeviceInterfaces($this);
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
        if ('InterfaceInterfaceStatistic' == $relationName) {
            $this->initInterfaceInterfaceStatistics();
        }
        if ('InterfaceMonitor' == $relationName) {
            $this->initInterfaceMonitors();
        }
        if ('InterfaceTrap' == $relationName) {
            $this->initInterfaceTraps();
        }
    }

    /**
     * Clears out the collInterfaceInterfaceStatistics collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Interface The current object (for fluent API support)
     * @see        addInterfaceInterfaceStatistics()
     */
    public function clearInterfaceInterfaceStatistics()
    {
        $this->collInterfaceInterfaceStatistics = null; // important to set this to null since that means it is uninitialized
        $this->collInterfaceInterfaceStatisticsPartial = null;

        return $this;
    }

    /**
     * reset is the collInterfaceInterfaceStatistics collection loaded partially
     *
     * @return void
     */
    public function resetPartialInterfaceInterfaceStatistics($v = true)
    {
        $this->collInterfaceInterfaceStatisticsPartial = $v;
    }

    /**
     * Initializes the collInterfaceInterfaceStatistics collection.
     *
     * By default this just sets the collInterfaceInterfaceStatistics collection to an empty array (like clearcollInterfaceInterfaceStatistics());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInterfaceInterfaceStatistics($overrideExisting = true)
    {
        if (null !== $this->collInterfaceInterfaceStatistics && !$overrideExisting) {
            return;
        }
        $this->collInterfaceInterfaceStatistics = new PropelObjectCollection();
        $this->collInterfaceInterfaceStatistics->setModel('InterfaceStatistic');
    }

    /**
     * Gets an array of InterfaceStatistic objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Interface is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|InterfaceStatistic[] List of InterfaceStatistic objects
     * @throws PropelException
     */
    public function getInterfaceInterfaceStatistics($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInterfaceInterfaceStatisticsPartial && !$this->isNew();
        if (null === $this->collInterfaceInterfaceStatistics || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInterfaceInterfaceStatistics) {
                // return empty collection
                $this->initInterfaceInterfaceStatistics();
            } else {
                $collInterfaceInterfaceStatistics = InterfaceStatisticQuery::create(null, $criteria)
                    ->filterByInterface($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInterfaceInterfaceStatisticsPartial && count($collInterfaceInterfaceStatistics)) {
                      $this->initInterfaceInterfaceStatistics(false);

                      foreach($collInterfaceInterfaceStatistics as $obj) {
                        if (false == $this->collInterfaceInterfaceStatistics->contains($obj)) {
                          $this->collInterfaceInterfaceStatistics->append($obj);
                        }
                      }

                      $this->collInterfaceInterfaceStatisticsPartial = true;
                    }

                    $collInterfaceInterfaceStatistics->getInternalIterator()->rewind();
                    return $collInterfaceInterfaceStatistics;
                }

                if($partial && $this->collInterfaceInterfaceStatistics) {
                    foreach($this->collInterfaceInterfaceStatistics as $obj) {
                        if($obj->isNew()) {
                            $collInterfaceInterfaceStatistics[] = $obj;
                        }
                    }
                }

                $this->collInterfaceInterfaceStatistics = $collInterfaceInterfaceStatistics;
                $this->collInterfaceInterfaceStatisticsPartial = false;
            }
        }

        return $this->collInterfaceInterfaceStatistics;
    }

    /**
     * Sets a collection of InterfaceInterfaceStatistic objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $interfaceInterfaceStatistics A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Interface The current object (for fluent API support)
     */
    public function setInterfaceInterfaceStatistics(PropelCollection $interfaceInterfaceStatistics, PropelPDO $con = null)
    {
        $interfaceInterfaceStatisticsToDelete = $this->getInterfaceInterfaceStatistics(new Criteria(), $con)->diff($interfaceInterfaceStatistics);

        $this->interfaceInterfaceStatisticsScheduledForDeletion = unserialize(serialize($interfaceInterfaceStatisticsToDelete));

        foreach ($interfaceInterfaceStatisticsToDelete as $interfaceInterfaceStatisticRemoved) {
            $interfaceInterfaceStatisticRemoved->setInterface(null);
        }

        $this->collInterfaceInterfaceStatistics = null;
        foreach ($interfaceInterfaceStatistics as $interfaceInterfaceStatistic) {
            $this->addInterfaceInterfaceStatistic($interfaceInterfaceStatistic);
        }

        $this->collInterfaceInterfaceStatistics = $interfaceInterfaceStatistics;
        $this->collInterfaceInterfaceStatisticsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InterfaceStatistic objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related InterfaceStatistic objects.
     * @throws PropelException
     */
    public function countInterfaceInterfaceStatistics(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInterfaceInterfaceStatisticsPartial && !$this->isNew();
        if (null === $this->collInterfaceInterfaceStatistics || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInterfaceInterfaceStatistics) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getInterfaceInterfaceStatistics());
            }
            $query = InterfaceStatisticQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInterface($this)
                ->count($con);
        }

        return count($this->collInterfaceInterfaceStatistics);
    }

    /**
     * Method called to associate a InterfaceStatistic object to this object
     * through the InterfaceStatistic foreign key attribute.
     *
     * @param    InterfaceStatistic $l InterfaceStatistic
     * @return Interface The current object (for fluent API support)
     */
    public function addInterfaceInterfaceStatistic(InterfaceStatistic $l)
    {
        if ($this->collInterfaceInterfaceStatistics === null) {
            $this->initInterfaceInterfaceStatistics();
            $this->collInterfaceInterfaceStatisticsPartial = true;
        }
        if (!in_array($l, $this->collInterfaceInterfaceStatistics->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInterfaceInterfaceStatistic($l);
        }

        return $this;
    }

    /**
     * @param	InterfaceInterfaceStatistic $interfaceInterfaceStatistic The interfaceInterfaceStatistic object to add.
     */
    protected function doAddInterfaceInterfaceStatistic($interfaceInterfaceStatistic)
    {
        $this->collInterfaceInterfaceStatistics[]= $interfaceInterfaceStatistic;
        $interfaceInterfaceStatistic->setInterface($this);
    }

    /**
     * @param	InterfaceInterfaceStatistic $interfaceInterfaceStatistic The interfaceInterfaceStatistic object to remove.
     * @return Interface The current object (for fluent API support)
     */
    public function removeInterfaceInterfaceStatistic($interfaceInterfaceStatistic)
    {
        if ($this->getInterfaceInterfaceStatistics()->contains($interfaceInterfaceStatistic)) {
            $this->collInterfaceInterfaceStatistics->remove($this->collInterfaceInterfaceStatistics->search($interfaceInterfaceStatistic));
            if (null === $this->interfaceInterfaceStatisticsScheduledForDeletion) {
                $this->interfaceInterfaceStatisticsScheduledForDeletion = clone $this->collInterfaceInterfaceStatistics;
                $this->interfaceInterfaceStatisticsScheduledForDeletion->clear();
            }
            $this->interfaceInterfaceStatisticsScheduledForDeletion[]= clone $interfaceInterfaceStatistic;
            $interfaceInterfaceStatistic->setInterface(null);
        }

        return $this;
    }

    /**
     * Clears out the collInterfaceMonitors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Interface The current object (for fluent API support)
     * @see        addInterfaceMonitors()
     */
    public function clearInterfaceMonitors()
    {
        $this->collInterfaceMonitors = null; // important to set this to null since that means it is uninitialized
        $this->collInterfaceMonitorsPartial = null;

        return $this;
    }

    /**
     * reset is the collInterfaceMonitors collection loaded partially
     *
     * @return void
     */
    public function resetPartialInterfaceMonitors($v = true)
    {
        $this->collInterfaceMonitorsPartial = $v;
    }

    /**
     * Initializes the collInterfaceMonitors collection.
     *
     * By default this just sets the collInterfaceMonitors collection to an empty array (like clearcollInterfaceMonitors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInterfaceMonitors($overrideExisting = true)
    {
        if (null !== $this->collInterfaceMonitors && !$overrideExisting) {
            return;
        }
        $this->collInterfaceMonitors = new PropelObjectCollection();
        $this->collInterfaceMonitors->setModel('Monitor');
    }

    /**
     * Gets an array of Monitor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Interface is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     * @throws PropelException
     */
    public function getInterfaceMonitors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInterfaceMonitorsPartial && !$this->isNew();
        if (null === $this->collInterfaceMonitors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInterfaceMonitors) {
                // return empty collection
                $this->initInterfaceMonitors();
            } else {
                $collInterfaceMonitors = MonitorQuery::create(null, $criteria)
                    ->filterByInterface($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInterfaceMonitorsPartial && count($collInterfaceMonitors)) {
                      $this->initInterfaceMonitors(false);

                      foreach($collInterfaceMonitors as $obj) {
                        if (false == $this->collInterfaceMonitors->contains($obj)) {
                          $this->collInterfaceMonitors->append($obj);
                        }
                      }

                      $this->collInterfaceMonitorsPartial = true;
                    }

                    $collInterfaceMonitors->getInternalIterator()->rewind();
                    return $collInterfaceMonitors;
                }

                if($partial && $this->collInterfaceMonitors) {
                    foreach($this->collInterfaceMonitors as $obj) {
                        if($obj->isNew()) {
                            $collInterfaceMonitors[] = $obj;
                        }
                    }
                }

                $this->collInterfaceMonitors = $collInterfaceMonitors;
                $this->collInterfaceMonitorsPartial = false;
            }
        }

        return $this->collInterfaceMonitors;
    }

    /**
     * Sets a collection of InterfaceMonitor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $interfaceMonitors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Interface The current object (for fluent API support)
     */
    public function setInterfaceMonitors(PropelCollection $interfaceMonitors, PropelPDO $con = null)
    {
        $interfaceMonitorsToDelete = $this->getInterfaceMonitors(new Criteria(), $con)->diff($interfaceMonitors);

        $this->interfaceMonitorsScheduledForDeletion = unserialize(serialize($interfaceMonitorsToDelete));

        foreach ($interfaceMonitorsToDelete as $interfaceMonitorRemoved) {
            $interfaceMonitorRemoved->setInterface(null);
        }

        $this->collInterfaceMonitors = null;
        foreach ($interfaceMonitors as $interfaceMonitor) {
            $this->addInterfaceMonitor($interfaceMonitor);
        }

        $this->collInterfaceMonitors = $interfaceMonitors;
        $this->collInterfaceMonitorsPartial = false;

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
    public function countInterfaceMonitors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInterfaceMonitorsPartial && !$this->isNew();
        if (null === $this->collInterfaceMonitors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInterfaceMonitors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getInterfaceMonitors());
            }
            $query = MonitorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInterface($this)
                ->count($con);
        }

        return count($this->collInterfaceMonitors);
    }

    /**
     * Method called to associate a Monitor object to this object
     * through the Monitor foreign key attribute.
     *
     * @param    Monitor $l Monitor
     * @return Interface The current object (for fluent API support)
     */
    public function addInterfaceMonitor(Monitor $l)
    {
        if ($this->collInterfaceMonitors === null) {
            $this->initInterfaceMonitors();
            $this->collInterfaceMonitorsPartial = true;
        }
        if (!in_array($l, $this->collInterfaceMonitors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInterfaceMonitor($l);
        }

        return $this;
    }

    /**
     * @param	InterfaceMonitor $interfaceMonitor The interfaceMonitor object to add.
     */
    protected function doAddInterfaceMonitor($interfaceMonitor)
    {
        $this->collInterfaceMonitors[]= $interfaceMonitor;
        $interfaceMonitor->setInterface($this);
    }

    /**
     * @param	InterfaceMonitor $interfaceMonitor The interfaceMonitor object to remove.
     * @return Interface The current object (for fluent API support)
     */
    public function removeInterfaceMonitor($interfaceMonitor)
    {
        if ($this->getInterfaceMonitors()->contains($interfaceMonitor)) {
            $this->collInterfaceMonitors->remove($this->collInterfaceMonitors->search($interfaceMonitor));
            if (null === $this->interfaceMonitorsScheduledForDeletion) {
                $this->interfaceMonitorsScheduledForDeletion = clone $this->collInterfaceMonitors;
                $this->interfaceMonitorsScheduledForDeletion->clear();
            }
            $this->interfaceMonitorsScheduledForDeletion[]= clone $interfaceMonitor;
            $interfaceMonitor->setInterface(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Interface is new, it will return
     * an empty collection; or if this Interface has previously
     * been saved, it will retrieve related InterfaceMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Interface.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getInterfaceMonitorsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getInterfaceMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Interface is new, it will return
     * an empty collection; or if this Interface has previously
     * been saved, it will retrieve related InterfaceMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Interface.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getInterfaceMonitorsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getInterfaceMonitors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Interface is new, it will return
     * an empty collection; or if this Interface has previously
     * been saved, it will retrieve related InterfaceMonitors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Interface.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Monitor[] List of Monitor objects
     */
    public function getInterfaceMonitorsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MonitorQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getInterfaceMonitors($query, $con);
    }

    /**
     * Clears out the collInterfaceTraps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Interface The current object (for fluent API support)
     * @see        addInterfaceTraps()
     */
    public function clearInterfaceTraps()
    {
        $this->collInterfaceTraps = null; // important to set this to null since that means it is uninitialized
        $this->collInterfaceTrapsPartial = null;

        return $this;
    }

    /**
     * reset is the collInterfaceTraps collection loaded partially
     *
     * @return void
     */
    public function resetPartialInterfaceTraps($v = true)
    {
        $this->collInterfaceTrapsPartial = $v;
    }

    /**
     * Initializes the collInterfaceTraps collection.
     *
     * By default this just sets the collInterfaceTraps collection to an empty array (like clearcollInterfaceTraps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInterfaceTraps($overrideExisting = true)
    {
        if (null !== $this->collInterfaceTraps && !$overrideExisting) {
            return;
        }
        $this->collInterfaceTraps = new PropelObjectCollection();
        $this->collInterfaceTraps->setModel('Trap');
    }

    /**
     * Gets an array of Trap objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Interface is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Trap[] List of Trap objects
     * @throws PropelException
     */
    public function getInterfaceTraps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInterfaceTrapsPartial && !$this->isNew();
        if (null === $this->collInterfaceTraps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInterfaceTraps) {
                // return empty collection
                $this->initInterfaceTraps();
            } else {
                $collInterfaceTraps = TrapQuery::create(null, $criteria)
                    ->filterByInterface($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInterfaceTrapsPartial && count($collInterfaceTraps)) {
                      $this->initInterfaceTraps(false);

                      foreach($collInterfaceTraps as $obj) {
                        if (false == $this->collInterfaceTraps->contains($obj)) {
                          $this->collInterfaceTraps->append($obj);
                        }
                      }

                      $this->collInterfaceTrapsPartial = true;
                    }

                    $collInterfaceTraps->getInternalIterator()->rewind();
                    return $collInterfaceTraps;
                }

                if($partial && $this->collInterfaceTraps) {
                    foreach($this->collInterfaceTraps as $obj) {
                        if($obj->isNew()) {
                            $collInterfaceTraps[] = $obj;
                        }
                    }
                }

                $this->collInterfaceTraps = $collInterfaceTraps;
                $this->collInterfaceTrapsPartial = false;
            }
        }

        return $this->collInterfaceTraps;
    }

    /**
     * Sets a collection of InterfaceTrap objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $interfaceTraps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Interface The current object (for fluent API support)
     */
    public function setInterfaceTraps(PropelCollection $interfaceTraps, PropelPDO $con = null)
    {
        $interfaceTrapsToDelete = $this->getInterfaceTraps(new Criteria(), $con)->diff($interfaceTraps);

        $this->interfaceTrapsScheduledForDeletion = unserialize(serialize($interfaceTrapsToDelete));

        foreach ($interfaceTrapsToDelete as $interfaceTrapRemoved) {
            $interfaceTrapRemoved->setInterface(null);
        }

        $this->collInterfaceTraps = null;
        foreach ($interfaceTraps as $interfaceTrap) {
            $this->addInterfaceTrap($interfaceTrap);
        }

        $this->collInterfaceTraps = $interfaceTraps;
        $this->collInterfaceTrapsPartial = false;

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
    public function countInterfaceTraps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInterfaceTrapsPartial && !$this->isNew();
        if (null === $this->collInterfaceTraps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInterfaceTraps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getInterfaceTraps());
            }
            $query = TrapQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInterface($this)
                ->count($con);
        }

        return count($this->collInterfaceTraps);
    }

    /**
     * Method called to associate a Trap object to this object
     * through the Trap foreign key attribute.
     *
     * @param    Trap $l Trap
     * @return Interface The current object (for fluent API support)
     */
    public function addInterfaceTrap(Trap $l)
    {
        if ($this->collInterfaceTraps === null) {
            $this->initInterfaceTraps();
            $this->collInterfaceTrapsPartial = true;
        }
        if (!in_array($l, $this->collInterfaceTraps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInterfaceTrap($l);
        }

        return $this;
    }

    /**
     * @param	InterfaceTrap $interfaceTrap The interfaceTrap object to add.
     */
    protected function doAddInterfaceTrap($interfaceTrap)
    {
        $this->collInterfaceTraps[]= $interfaceTrap;
        $interfaceTrap->setInterface($this);
    }

    /**
     * @param	InterfaceTrap $interfaceTrap The interfaceTrap object to remove.
     * @return Interface The current object (for fluent API support)
     */
    public function removeInterfaceTrap($interfaceTrap)
    {
        if ($this->getInterfaceTraps()->contains($interfaceTrap)) {
            $this->collInterfaceTraps->remove($this->collInterfaceTraps->search($interfaceTrap));
            if (null === $this->interfaceTrapsScheduledForDeletion) {
                $this->interfaceTrapsScheduledForDeletion = clone $this->collInterfaceTraps;
                $this->interfaceTrapsScheduledForDeletion->clear();
            }
            $this->interfaceTrapsScheduledForDeletion[]= $interfaceTrap;
            $interfaceTrap->setInterface(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Interface is new, it will return
     * an empty collection; or if this Interface has previously
     * been saved, it will retrieve related InterfaceTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Interface.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getInterfaceTrapsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getInterfaceTraps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Interface is new, it will return
     * an empty collection; or if this Interface has previously
     * been saved, it will retrieve related InterfaceTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Interface.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getInterfaceTrapsJoinSnmpProperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('SnmpProperty', $join_behavior);

        return $this->getInterfaceTraps($query, $con);
    }

    /**
     * Clears out the collDevices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Interface The current object (for fluent API support)
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
     * If this Interface is new, it will return
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
                    ->filterByInterface($this)
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
     * @return Interface The current object (for fluent API support)
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
                    ->filterByInterface($this)
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
     * @return Interface The current object (for fluent API support)
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
        $this->addInterfaceMonitor($monitor);
    }

    /**
     * Remove a Device object to this object
     * through the Monitor cross reference table.
     *
     * @param Device $device The Monitor object to relate
     * @return Interface The current object (for fluent API support)
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
     * @return Interface The current object (for fluent API support)
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
     * If this Interface is new, it will return
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
                    ->filterByInterface($this)
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
     * @return Interface The current object (for fluent API support)
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
                    ->filterByInterface($this)
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
     * @return Interface The current object (for fluent API support)
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
        $this->addInterfaceMonitor($monitor);
    }

    /**
     * Remove a Plugin object to this object
     * through the Monitor cross reference table.
     *
     * @param Plugin $plugin The Monitor object to relate
     * @return Interface The current object (for fluent API support)
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
     * @return Interface The current object (for fluent API support)
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
     * If this Interface is new, it will return
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
                    ->filterByInterface($this)
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
     * @return Interface The current object (for fluent API support)
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
                    ->filterByInterface($this)
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
     * @return Interface The current object (for fluent API support)
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
        $this->addInterfaceMonitor($monitor);
    }

    /**
     * Remove a SnmpProperty object to this object
     * through the Monitor cross reference table.
     *
     * @param SnmpProperty $snmpProperty The Monitor object to relate
     * @return Interface The current object (for fluent API support)
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
        $this->interfaceid = null;
        $this->interfacetypeid = null;
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
            if ($this->collInterfaceInterfaceStatistics) {
                foreach ($this->collInterfaceInterfaceStatistics as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInterfaceMonitors) {
                foreach ($this->collInterfaceMonitors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInterfaceTraps) {
                foreach ($this->collInterfaceTraps as $o) {
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
            if ($this->aInterfaceType instanceof Persistent) {
              $this->aInterfaceType->clearAllReferences($deep);
            }
            if ($this->aDevice instanceof Persistent) {
              $this->aDevice->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collInterfaceInterfaceStatistics instanceof PropelCollection) {
            $this->collInterfaceInterfaceStatistics->clearIterator();
        }
        $this->collInterfaceInterfaceStatistics = null;
        if ($this->collInterfaceMonitors instanceof PropelCollection) {
            $this->collInterfaceMonitors->clearIterator();
        }
        $this->collInterfaceMonitors = null;
        if ($this->collInterfaceTraps instanceof PropelCollection) {
            $this->collInterfaceTraps->clearIterator();
        }
        $this->collInterfaceTraps = null;
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
        $this->aInterfaceType = null;
        $this->aDevice = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(InterfacePeer::DEFAULT_STRING_FORMAT);
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
