<?php


/**
 * Base class that represents a row from the 'Syslog' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseSyslog extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SyslogPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SyslogPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the syslogid field.
     * @var        int
     */
    protected $syslogid;

    /**
     * The value for the deviceid field.
     * @var        int
     */
    protected $deviceid;

    /**
     * The value for the facility field.
     * @var        string
     */
    protected $facility;

    /**
     * The value for the priority field.
     * @var        string
     */
    protected $priority;

    /**
     * The value for the level field.
     * @var        string
     */
    protected $level;

    /**
     * The value for the tag field.
     * @var        string
     */
    protected $tag;

    /**
     * The value for the timestamp field.
     * @var        string
     */
    protected $timestamp;

    /**
     * The value for the program field.
     * @var        string
     */
    protected $program;

    /**
     * The value for the message field.
     * @var        string
     */
    protected $message;

    /**
     * The value for the sequence field.
     * @var        int
     */
    protected $sequence;

    /**
     * The value for the count field.
     * @var        int
     */
    protected $count;

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
     * @var        PropelObjectCollection|Threshold[] Collection to store aggregation of Threshold objects.
     */
    protected $collSyslogThresholds;
    protected $collSyslogThresholdsPartial;

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
    protected $syslogThresholdsScheduledForDeletion = null;

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
     * Get the [deviceid] column value.
     *
     * @return int
     */
    public function getDeviceid()
    {
        return $this->deviceid;
    }

    /**
     * Get the [facility] column value.
     *
     * @return string
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * Get the [priority] column value.
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get the [level] column value.
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the [tag] column value.
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
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
     * Get the [program] column value.
     *
     * @return string
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * Get the [message] column value.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the [sequence] column value.
     *
     * @return int
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Get the [count] column value.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
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
     * Set the value of [syslogid] column.
     *
     * @param int $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setSyslogid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->syslogid !== $v) {
            $this->syslogid = $v;
            $this->modifiedColumns[] = SyslogPeer::SYSLOGID;
        }


        return $this;
    } // setSyslogid()

    /**
     * Set the value of [deviceid] column.
     *
     * @param int $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setDeviceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->deviceid !== $v) {
            $this->deviceid = $v;
            $this->modifiedColumns[] = SyslogPeer::DEVICEID;
        }

        if ($this->aDevice !== null && $this->aDevice->getDeviceid() !== $v) {
            $this->aDevice = null;
        }


        return $this;
    } // setDeviceid()

    /**
     * Set the value of [facility] column.
     *
     * @param string $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setFacility($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->facility !== $v) {
            $this->facility = $v;
            $this->modifiedColumns[] = SyslogPeer::FACILITY;
        }


        return $this;
    } // setFacility()

    /**
     * Set the value of [priority] column.
     *
     * @param string $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setPriority($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->priority !== $v) {
            $this->priority = $v;
            $this->modifiedColumns[] = SyslogPeer::PRIORITY;
        }


        return $this;
    } // setPriority()

    /**
     * Set the value of [level] column.
     *
     * @param string $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[] = SyslogPeer::LEVEL;
        }


        return $this;
    } // setLevel()

    /**
     * Set the value of [tag] column.
     *
     * @param string $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setTag($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tag !== $v) {
            $this->tag = $v;
            $this->modifiedColumns[] = SyslogPeer::TAG;
        }


        return $this;
    } // setTag()

    /**
     * Sets the value of [timestamp] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Syslog The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            $currentDateAsString = ($this->timestamp !== null && $tmpDt = new DateTime($this->timestamp)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->timestamp = $newDateAsString;
                $this->modifiedColumns[] = SyslogPeer::TIMESTAMP;
            }
        } // if either are not null


        return $this;
    } // setTimestamp()

    /**
     * Set the value of [program] column.
     *
     * @param string $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setProgram($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->program !== $v) {
            $this->program = $v;
            $this->modifiedColumns[] = SyslogPeer::PROGRAM;
        }


        return $this;
    } // setProgram()

    /**
     * Set the value of [message] column.
     *
     * @param string $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setMessage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->message !== $v) {
            $this->message = $v;
            $this->modifiedColumns[] = SyslogPeer::MESSAGE;
        }


        return $this;
    } // setMessage()

    /**
     * Set the value of [sequence] column.
     *
     * @param int $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setSequence($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sequence !== $v) {
            $this->sequence = $v;
            $this->modifiedColumns[] = SyslogPeer::SEQUENCE;
        }


        return $this;
    } // setSequence()

    /**
     * Set the value of [count] column.
     *
     * @param int $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setCount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->count !== $v) {
            $this->count = $v;
            $this->modifiedColumns[] = SyslogPeer::COUNT;
        }


        return $this;
    } // setCount()

    /**
     * Set the value of [value] column.
     *
     * @param int $v new value
     * @return Syslog The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = SyslogPeer::VALUE;
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

            $this->syslogid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->deviceid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->facility = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->priority = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->level = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tag = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->timestamp = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->program = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->message = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->sequence = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->count = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->value = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = SyslogPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Syslog object", $e);
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
            $con = Propel::getConnection(SyslogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SyslogPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDevice = null;
            $this->collSyslogThresholds = null;

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
            $con = Propel::getConnection(SyslogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SyslogQuery::create()
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
            $con = Propel::getConnection(SyslogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SyslogPeer::addInstanceToPool($this);
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

            if ($this->syslogThresholdsScheduledForDeletion !== null) {
                if (!$this->syslogThresholdsScheduledForDeletion->isEmpty()) {
                    ThresholdQuery::create()
                        ->filterByPrimaryKeys($this->syslogThresholdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->syslogThresholdsScheduledForDeletion = null;
                }
            }

            if ($this->collSyslogThresholds !== null) {
                foreach ($this->collSyslogThresholds as $referrerFK) {
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

        $this->modifiedColumns[] = SyslogPeer::SYSLOGID;
        if (null !== $this->syslogid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SyslogPeer::SYSLOGID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SyslogPeer::SYSLOGID)) {
            $modifiedColumns[':p' . $index++]  = '`SyslogId`';
        }
        if ($this->isColumnModified(SyslogPeer::DEVICEID)) {
            $modifiedColumns[':p' . $index++]  = '`DeviceId`';
        }
        if ($this->isColumnModified(SyslogPeer::FACILITY)) {
            $modifiedColumns[':p' . $index++]  = '`Facility`';
        }
        if ($this->isColumnModified(SyslogPeer::PRIORITY)) {
            $modifiedColumns[':p' . $index++]  = '`Priority`';
        }
        if ($this->isColumnModified(SyslogPeer::LEVEL)) {
            $modifiedColumns[':p' . $index++]  = '`Level`';
        }
        if ($this->isColumnModified(SyslogPeer::TAG)) {
            $modifiedColumns[':p' . $index++]  = '`Tag`';
        }
        if ($this->isColumnModified(SyslogPeer::TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = '`Timestamp`';
        }
        if ($this->isColumnModified(SyslogPeer::PROGRAM)) {
            $modifiedColumns[':p' . $index++]  = '`Program`';
        }
        if ($this->isColumnModified(SyslogPeer::MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = '`Message`';
        }
        if ($this->isColumnModified(SyslogPeer::SEQUENCE)) {
            $modifiedColumns[':p' . $index++]  = '`Sequence`';
        }
        if ($this->isColumnModified(SyslogPeer::COUNT)) {
            $modifiedColumns[':p' . $index++]  = '`Count`';
        }
        if ($this->isColumnModified(SyslogPeer::VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`Value`';
        }

        $sql = sprintf(
            'INSERT INTO `Syslog` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`SyslogId`':
                        $stmt->bindValue($identifier, $this->syslogid, PDO::PARAM_INT);
                        break;
                    case '`DeviceId`':
                        $stmt->bindValue($identifier, $this->deviceid, PDO::PARAM_INT);
                        break;
                    case '`Facility`':
                        $stmt->bindValue($identifier, $this->facility, PDO::PARAM_STR);
                        break;
                    case '`Priority`':
                        $stmt->bindValue($identifier, $this->priority, PDO::PARAM_STR);
                        break;
                    case '`Level`':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_STR);
                        break;
                    case '`Tag`':
                        $stmt->bindValue($identifier, $this->tag, PDO::PARAM_STR);
                        break;
                    case '`Timestamp`':
                        $stmt->bindValue($identifier, $this->timestamp, PDO::PARAM_STR);
                        break;
                    case '`Program`':
                        $stmt->bindValue($identifier, $this->program, PDO::PARAM_STR);
                        break;
                    case '`Message`':
                        $stmt->bindValue($identifier, $this->message, PDO::PARAM_STR);
                        break;
                    case '`Sequence`':
                        $stmt->bindValue($identifier, $this->sequence, PDO::PARAM_INT);
                        break;
                    case '`Count`':
                        $stmt->bindValue($identifier, $this->count, PDO::PARAM_INT);
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
        $this->setSyslogid($pk);

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


            if (($retval = SyslogPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSyslogThresholds !== null) {
                    foreach ($this->collSyslogThresholds as $referrerFK) {
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
        $pos = SyslogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSyslogid();
                break;
            case 1:
                return $this->getDeviceid();
                break;
            case 2:
                return $this->getFacility();
                break;
            case 3:
                return $this->getPriority();
                break;
            case 4:
                return $this->getLevel();
                break;
            case 5:
                return $this->getTag();
                break;
            case 6:
                return $this->getTimestamp();
                break;
            case 7:
                return $this->getProgram();
                break;
            case 8:
                return $this->getMessage();
                break;
            case 9:
                return $this->getSequence();
                break;
            case 10:
                return $this->getCount();
                break;
            case 11:
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
        if (isset($alreadyDumpedObjects['Syslog'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Syslog'][$this->getPrimaryKey()] = true;
        $keys = SyslogPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSyslogid(),
            $keys[1] => $this->getDeviceid(),
            $keys[2] => $this->getFacility(),
            $keys[3] => $this->getPriority(),
            $keys[4] => $this->getLevel(),
            $keys[5] => $this->getTag(),
            $keys[6] => $this->getTimestamp(),
            $keys[7] => $this->getProgram(),
            $keys[8] => $this->getMessage(),
            $keys[9] => $this->getSequence(),
            $keys[10] => $this->getCount(),
            $keys[11] => $this->getValue(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aDevice) {
                $result['Device'] = $this->aDevice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSyslogThresholds) {
                $result['SyslogThresholds'] = $this->collSyslogThresholds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SyslogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSyslogid($value);
                break;
            case 1:
                $this->setDeviceid($value);
                break;
            case 2:
                $this->setFacility($value);
                break;
            case 3:
                $this->setPriority($value);
                break;
            case 4:
                $this->setLevel($value);
                break;
            case 5:
                $this->setTag($value);
                break;
            case 6:
                $this->setTimestamp($value);
                break;
            case 7:
                $this->setProgram($value);
                break;
            case 8:
                $this->setMessage($value);
                break;
            case 9:
                $this->setSequence($value);
                break;
            case 10:
                $this->setCount($value);
                break;
            case 11:
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
        $keys = SyslogPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSyslogid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDeviceid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFacility($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPriority($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLevel($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTag($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTimestamp($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setProgram($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setMessage($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSequence($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCount($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setValue($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SyslogPeer::DATABASE_NAME);

        if ($this->isColumnModified(SyslogPeer::SYSLOGID)) $criteria->add(SyslogPeer::SYSLOGID, $this->syslogid);
        if ($this->isColumnModified(SyslogPeer::DEVICEID)) $criteria->add(SyslogPeer::DEVICEID, $this->deviceid);
        if ($this->isColumnModified(SyslogPeer::FACILITY)) $criteria->add(SyslogPeer::FACILITY, $this->facility);
        if ($this->isColumnModified(SyslogPeer::PRIORITY)) $criteria->add(SyslogPeer::PRIORITY, $this->priority);
        if ($this->isColumnModified(SyslogPeer::LEVEL)) $criteria->add(SyslogPeer::LEVEL, $this->level);
        if ($this->isColumnModified(SyslogPeer::TAG)) $criteria->add(SyslogPeer::TAG, $this->tag);
        if ($this->isColumnModified(SyslogPeer::TIMESTAMP)) $criteria->add(SyslogPeer::TIMESTAMP, $this->timestamp);
        if ($this->isColumnModified(SyslogPeer::PROGRAM)) $criteria->add(SyslogPeer::PROGRAM, $this->program);
        if ($this->isColumnModified(SyslogPeer::MESSAGE)) $criteria->add(SyslogPeer::MESSAGE, $this->message);
        if ($this->isColumnModified(SyslogPeer::SEQUENCE)) $criteria->add(SyslogPeer::SEQUENCE, $this->sequence);
        if ($this->isColumnModified(SyslogPeer::COUNT)) $criteria->add(SyslogPeer::COUNT, $this->count);
        if ($this->isColumnModified(SyslogPeer::VALUE)) $criteria->add(SyslogPeer::VALUE, $this->value);

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
        $criteria = new Criteria(SyslogPeer::DATABASE_NAME);
        $criteria->add(SyslogPeer::SYSLOGID, $this->syslogid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getSyslogid();
    }

    /**
     * Generic method to set the primary key (syslogid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSyslogid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getSyslogid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Syslog (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeviceid($this->getDeviceid());
        $copyObj->setFacility($this->getFacility());
        $copyObj->setPriority($this->getPriority());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setTag($this->getTag());
        $copyObj->setTimestamp($this->getTimestamp());
        $copyObj->setProgram($this->getProgram());
        $copyObj->setMessage($this->getMessage());
        $copyObj->setSequence($this->getSequence());
        $copyObj->setCount($this->getCount());
        $copyObj->setValue($this->getValue());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSyslogThresholds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSyslogThreshold($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setSyslogid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Syslog Clone of current object.
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
     * @return SyslogPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SyslogPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Device object.
     *
     * @param             Device $v
     * @return Syslog The current object (for fluent API support)
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
            $v->addDeviceSyslog($this);
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
                $this->aDevice->addDeviceSyslogs($this);
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
        if ('SyslogThreshold' == $relationName) {
            $this->initSyslogThresholds();
        }
    }

    /**
     * Clears out the collSyslogThresholds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Syslog The current object (for fluent API support)
     * @see        addSyslogThresholds()
     */
    public function clearSyslogThresholds()
    {
        $this->collSyslogThresholds = null; // important to set this to null since that means it is uninitialized
        $this->collSyslogThresholdsPartial = null;

        return $this;
    }

    /**
     * reset is the collSyslogThresholds collection loaded partially
     *
     * @return void
     */
    public function resetPartialSyslogThresholds($v = true)
    {
        $this->collSyslogThresholdsPartial = $v;
    }

    /**
     * Initializes the collSyslogThresholds collection.
     *
     * By default this just sets the collSyslogThresholds collection to an empty array (like clearcollSyslogThresholds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSyslogThresholds($overrideExisting = true)
    {
        if (null !== $this->collSyslogThresholds && !$overrideExisting) {
            return;
        }
        $this->collSyslogThresholds = new PropelObjectCollection();
        $this->collSyslogThresholds->setModel('Threshold');
    }

    /**
     * Gets an array of Threshold objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Syslog is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     * @throws PropelException
     */
    public function getSyslogThresholds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSyslogThresholdsPartial && !$this->isNew();
        if (null === $this->collSyslogThresholds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSyslogThresholds) {
                // return empty collection
                $this->initSyslogThresholds();
            } else {
                $collSyslogThresholds = ThresholdQuery::create(null, $criteria)
                    ->filterBySyslog($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSyslogThresholdsPartial && count($collSyslogThresholds)) {
                      $this->initSyslogThresholds(false);

                      foreach($collSyslogThresholds as $obj) {
                        if (false == $this->collSyslogThresholds->contains($obj)) {
                          $this->collSyslogThresholds->append($obj);
                        }
                      }

                      $this->collSyslogThresholdsPartial = true;
                    }

                    $collSyslogThresholds->getInternalIterator()->rewind();
                    return $collSyslogThresholds;
                }

                if($partial && $this->collSyslogThresholds) {
                    foreach($this->collSyslogThresholds as $obj) {
                        if($obj->isNew()) {
                            $collSyslogThresholds[] = $obj;
                        }
                    }
                }

                $this->collSyslogThresholds = $collSyslogThresholds;
                $this->collSyslogThresholdsPartial = false;
            }
        }

        return $this->collSyslogThresholds;
    }

    /**
     * Sets a collection of SyslogThreshold objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $syslogThresholds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Syslog The current object (for fluent API support)
     */
    public function setSyslogThresholds(PropelCollection $syslogThresholds, PropelPDO $con = null)
    {
        $syslogThresholdsToDelete = $this->getSyslogThresholds(new Criteria(), $con)->diff($syslogThresholds);

        $this->syslogThresholdsScheduledForDeletion = unserialize(serialize($syslogThresholdsToDelete));

        foreach ($syslogThresholdsToDelete as $syslogThresholdRemoved) {
            $syslogThresholdRemoved->setSyslog(null);
        }

        $this->collSyslogThresholds = null;
        foreach ($syslogThresholds as $syslogThreshold) {
            $this->addSyslogThreshold($syslogThreshold);
        }

        $this->collSyslogThresholds = $syslogThresholds;
        $this->collSyslogThresholdsPartial = false;

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
    public function countSyslogThresholds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSyslogThresholdsPartial && !$this->isNew();
        if (null === $this->collSyslogThresholds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSyslogThresholds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSyslogThresholds());
            }
            $query = ThresholdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySyslog($this)
                ->count($con);
        }

        return count($this->collSyslogThresholds);
    }

    /**
     * Method called to associate a Threshold object to this object
     * through the Threshold foreign key attribute.
     *
     * @param    Threshold $l Threshold
     * @return Syslog The current object (for fluent API support)
     */
    public function addSyslogThreshold(Threshold $l)
    {
        if ($this->collSyslogThresholds === null) {
            $this->initSyslogThresholds();
            $this->collSyslogThresholdsPartial = true;
        }
        if (!in_array($l, $this->collSyslogThresholds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSyslogThreshold($l);
        }

        return $this;
    }

    /**
     * @param	SyslogThreshold $syslogThreshold The syslogThreshold object to add.
     */
    protected function doAddSyslogThreshold($syslogThreshold)
    {
        $this->collSyslogThresholds[]= $syslogThreshold;
        $syslogThreshold->setSyslog($this);
    }

    /**
     * @param	SyslogThreshold $syslogThreshold The syslogThreshold object to remove.
     * @return Syslog The current object (for fluent API support)
     */
    public function removeSyslogThreshold($syslogThreshold)
    {
        if ($this->getSyslogThresholds()->contains($syslogThreshold)) {
            $this->collSyslogThresholds->remove($this->collSyslogThresholds->search($syslogThreshold));
            if (null === $this->syslogThresholdsScheduledForDeletion) {
                $this->syslogThresholdsScheduledForDeletion = clone $this->collSyslogThresholds;
                $this->syslogThresholdsScheduledForDeletion->clear();
            }
            $this->syslogThresholdsScheduledForDeletion[]= clone $syslogThreshold;
            $syslogThreshold->setSyslog(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Syslog is new, it will return
     * an empty collection; or if this Syslog has previously
     * been saved, it will retrieve related SyslogThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Syslog.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getSyslogThresholdsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getSyslogThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Syslog is new, it will return
     * an empty collection; or if this Syslog has previously
     * been saved, it will retrieve related SyslogThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Syslog.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getSyslogThresholdsJoinPoll($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Poll', $join_behavior);

        return $this->getSyslogThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Syslog is new, it will return
     * an empty collection; or if this Syslog has previously
     * been saved, it will retrieve related SyslogThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Syslog.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getSyslogThresholdsJoinTrap($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Trap', $join_behavior);

        return $this->getSyslogThresholds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Syslog is new, it will return
     * an empty collection; or if this Syslog has previously
     * been saved, it will retrieve related SyslogThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Syslog.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getSyslogThresholdsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getSyslogThresholds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->syslogid = null;
        $this->deviceid = null;
        $this->facility = null;
        $this->priority = null;
        $this->level = null;
        $this->tag = null;
        $this->timestamp = null;
        $this->program = null;
        $this->message = null;
        $this->sequence = null;
        $this->count = null;
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
            if ($this->collSyslogThresholds) {
                foreach ($this->collSyslogThresholds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aDevice instanceof Persistent) {
              $this->aDevice->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSyslogThresholds instanceof PropelCollection) {
            $this->collSyslogThresholds->clearIterator();
        }
        $this->collSyslogThresholds = null;
        $this->aDevice = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SyslogPeer::DEFAULT_STRING_FORMAT);
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
