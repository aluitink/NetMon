<?php


/**
 * Base class that represents a row from the 'Monitor' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseMonitor extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MonitorPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MonitorPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the monitorid field.
     * @var        int
     */
    protected $monitorid;

    /**
     * The value for the pluginid field.
     * @var        int
     */
    protected $pluginid;

    /**
     * The value for the pluginmetaid field.
     * @var        int
     */
    protected $pluginmetaid;

    /**
     * @var        Plugin
     */
    protected $aPlugin;

    /**
     * @var        PluginMeta
     */
    protected $aPluginMeta;

    /**
     * @var        PropelObjectCollection|Threshold[] Collection to store aggregation of Threshold objects.
     */
    protected $collMonitorThresholds;
    protected $collMonitorThresholdsPartial;

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
    protected $monitorThresholdsScheduledForDeletion = null;

    /**
     * Get the [monitorid] column value.
     *
     * @return int
     */
    public function getMonitorid()
    {
        return $this->monitorid;
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
     * Get the [pluginmetaid] column value.
     *
     * @return int
     */
    public function getPluginmetaid()
    {
        return $this->pluginmetaid;
    }

    /**
     * Set the value of [monitorid] column.
     *
     * @param int $v new value
     * @return Monitor The current object (for fluent API support)
     */
    public function setMonitorid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->monitorid !== $v) {
            $this->monitorid = $v;
            $this->modifiedColumns[] = MonitorPeer::MONITORID;
        }


        return $this;
    } // setMonitorid()

    /**
     * Set the value of [pluginid] column.
     *
     * @param int $v new value
     * @return Monitor The current object (for fluent API support)
     */
    public function setPluginid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pluginid !== $v) {
            $this->pluginid = $v;
            $this->modifiedColumns[] = MonitorPeer::PLUGINID;
        }

        if ($this->aPlugin !== null && $this->aPlugin->getPluginid() !== $v) {
            $this->aPlugin = null;
        }


        return $this;
    } // setPluginid()

    /**
     * Set the value of [pluginmetaid] column.
     *
     * @param int $v new value
     * @return Monitor The current object (for fluent API support)
     */
    public function setPluginmetaid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pluginmetaid !== $v) {
            $this->pluginmetaid = $v;
            $this->modifiedColumns[] = MonitorPeer::PLUGINMETAID;
        }

        if ($this->aPluginMeta !== null && $this->aPluginMeta->getPluginmetaid() !== $v) {
            $this->aPluginMeta = null;
        }


        return $this;
    } // setPluginmetaid()

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

            $this->monitorid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->pluginid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->pluginmetaid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 3; // 3 = MonitorPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Monitor object", $e);
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

        if ($this->aPlugin !== null && $this->pluginid !== $this->aPlugin->getPluginid()) {
            $this->aPlugin = null;
        }
        if ($this->aPluginMeta !== null && $this->pluginmetaid !== $this->aPluginMeta->getPluginmetaid()) {
            $this->aPluginMeta = null;
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
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MonitorPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPlugin = null;
            $this->aPluginMeta = null;
            $this->collMonitorThresholds = null;

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
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MonitorQuery::create()
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
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MonitorPeer::addInstanceToPool($this);
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

            if ($this->aPlugin !== null) {
                if ($this->aPlugin->isModified() || $this->aPlugin->isNew()) {
                    $affectedRows += $this->aPlugin->save($con);
                }
                $this->setPlugin($this->aPlugin);
            }

            if ($this->aPluginMeta !== null) {
                if ($this->aPluginMeta->isModified() || $this->aPluginMeta->isNew()) {
                    $affectedRows += $this->aPluginMeta->save($con);
                }
                $this->setPluginMeta($this->aPluginMeta);
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

            if ($this->monitorThresholdsScheduledForDeletion !== null) {
                if (!$this->monitorThresholdsScheduledForDeletion->isEmpty()) {
                    ThresholdQuery::create()
                        ->filterByPrimaryKeys($this->monitorThresholdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->monitorThresholdsScheduledForDeletion = null;
                }
            }

            if ($this->collMonitorThresholds !== null) {
                foreach ($this->collMonitorThresholds as $referrerFK) {
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

        $this->modifiedColumns[] = MonitorPeer::MONITORID;
        if (null !== $this->monitorid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MonitorPeer::MONITORID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MonitorPeer::MONITORID)) {
            $modifiedColumns[':p' . $index++]  = '`MonitorId`';
        }
        if ($this->isColumnModified(MonitorPeer::PLUGINID)) {
            $modifiedColumns[':p' . $index++]  = '`PluginId`';
        }
        if ($this->isColumnModified(MonitorPeer::PLUGINMETAID)) {
            $modifiedColumns[':p' . $index++]  = '`PluginMetaId`';
        }

        $sql = sprintf(
            'INSERT INTO `Monitor` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`MonitorId`':
                        $stmt->bindValue($identifier, $this->monitorid, PDO::PARAM_INT);
                        break;
                    case '`PluginId`':
                        $stmt->bindValue($identifier, $this->pluginid, PDO::PARAM_INT);
                        break;
                    case '`PluginMetaId`':
                        $stmt->bindValue($identifier, $this->pluginmetaid, PDO::PARAM_INT);
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
        $this->setMonitorid($pk);

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

            if ($this->aPlugin !== null) {
                if (!$this->aPlugin->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPlugin->getValidationFailures());
                }
            }

            if ($this->aPluginMeta !== null) {
                if (!$this->aPluginMeta->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPluginMeta->getValidationFailures());
                }
            }


            if (($retval = MonitorPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMonitorThresholds !== null) {
                    foreach ($this->collMonitorThresholds as $referrerFK) {
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
        $pos = MonitorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMonitorid();
                break;
            case 1:
                return $this->getPluginid();
                break;
            case 2:
                return $this->getPluginmetaid();
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
        if (isset($alreadyDumpedObjects['Monitor'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Monitor'][serialize($this->getPrimaryKey())] = true;
        $keys = MonitorPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMonitorid(),
            $keys[1] => $this->getPluginid(),
            $keys[2] => $this->getPluginmetaid(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPlugin) {
                $result['Plugin'] = $this->aPlugin->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPluginMeta) {
                $result['PluginMeta'] = $this->aPluginMeta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMonitorThresholds) {
                $result['MonitorThresholds'] = $this->collMonitorThresholds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MonitorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMonitorid($value);
                break;
            case 1:
                $this->setPluginid($value);
                break;
            case 2:
                $this->setPluginmetaid($value);
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
        $keys = MonitorPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setMonitorid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPluginid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPluginmetaid($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MonitorPeer::DATABASE_NAME);

        if ($this->isColumnModified(MonitorPeer::MONITORID)) $criteria->add(MonitorPeer::MONITORID, $this->monitorid);
        if ($this->isColumnModified(MonitorPeer::PLUGINID)) $criteria->add(MonitorPeer::PLUGINID, $this->pluginid);
        if ($this->isColumnModified(MonitorPeer::PLUGINMETAID)) $criteria->add(MonitorPeer::PLUGINMETAID, $this->pluginmetaid);

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
        $criteria = new Criteria(MonitorPeer::DATABASE_NAME);
        $criteria->add(MonitorPeer::MONITORID, $this->monitorid);
        $criteria->add(MonitorPeer::PLUGINID, $this->pluginid);
        $criteria->add(MonitorPeer::PLUGINMETAID, $this->pluginmetaid);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getMonitorid();
        $pks[1] = $this->getPluginid();
        $pks[2] = $this->getPluginmetaid();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setMonitorid($keys[0]);
        $this->setPluginid($keys[1]);
        $this->setPluginmetaid($keys[2]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getMonitorid()) && (null === $this->getPluginid()) && (null === $this->getPluginmetaid());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Monitor (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPluginid($this->getPluginid());
        $copyObj->setPluginmetaid($this->getPluginmetaid());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMonitorThresholds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMonitorThreshold($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setMonitorid(NULL); // this is a auto-increment column, so set to default value
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
     * @return Monitor Clone of current object.
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
     * @return MonitorPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MonitorPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Plugin object.
     *
     * @param             Plugin $v
     * @return Monitor The current object (for fluent API support)
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
            $v->addPluginMonitor($this);
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
                $this->aPlugin->addPluginMonitors($this);
             */
        }

        return $this->aPlugin;
    }

    /**
     * Declares an association between this object and a PluginMeta object.
     *
     * @param             PluginMeta $v
     * @return Monitor The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPluginMeta(PluginMeta $v = null)
    {
        if ($v === null) {
            $this->setPluginmetaid(NULL);
        } else {
            $this->setPluginmetaid($v->getPluginmetaid());
        }

        $this->aPluginMeta = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the PluginMeta object, it will not be re-added.
        if ($v !== null) {
            $v->addPluginMetaMonitor($this);
        }


        return $this;
    }


    /**
     * Get the associated PluginMeta object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return PluginMeta The associated PluginMeta object.
     * @throws PropelException
     */
    public function getPluginMeta(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPluginMeta === null && ($this->pluginmetaid !== null) && $doQuery) {
            $this->aPluginMeta = PluginMetaQuery::create()->findPk($this->pluginmetaid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPluginMeta->addPluginMetaMonitors($this);
             */
        }

        return $this->aPluginMeta;
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
        if ('MonitorThreshold' == $relationName) {
            $this->initMonitorThresholds();
        }
    }

    /**
     * Clears out the collMonitorThresholds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Monitor The current object (for fluent API support)
     * @see        addMonitorThresholds()
     */
    public function clearMonitorThresholds()
    {
        $this->collMonitorThresholds = null; // important to set this to null since that means it is uninitialized
        $this->collMonitorThresholdsPartial = null;

        return $this;
    }

    /**
     * reset is the collMonitorThresholds collection loaded partially
     *
     * @return void
     */
    public function resetPartialMonitorThresholds($v = true)
    {
        $this->collMonitorThresholdsPartial = $v;
    }

    /**
     * Initializes the collMonitorThresholds collection.
     *
     * By default this just sets the collMonitorThresholds collection to an empty array (like clearcollMonitorThresholds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMonitorThresholds($overrideExisting = true)
    {
        if (null !== $this->collMonitorThresholds && !$overrideExisting) {
            return;
        }
        $this->collMonitorThresholds = new PropelObjectCollection();
        $this->collMonitorThresholds->setModel('Threshold');
    }

    /**
     * Gets an array of Threshold objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Monitor is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     * @throws PropelException
     */
    public function getMonitorThresholds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMonitorThresholdsPartial && !$this->isNew();
        if (null === $this->collMonitorThresholds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMonitorThresholds) {
                // return empty collection
                $this->initMonitorThresholds();
            } else {
                $collMonitorThresholds = ThresholdQuery::create(null, $criteria)
                    ->filterByMonitor($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMonitorThresholdsPartial && count($collMonitorThresholds)) {
                      $this->initMonitorThresholds(false);

                      foreach($collMonitorThresholds as $obj) {
                        if (false == $this->collMonitorThresholds->contains($obj)) {
                          $this->collMonitorThresholds->append($obj);
                        }
                      }

                      $this->collMonitorThresholdsPartial = true;
                    }

                    $collMonitorThresholds->getInternalIterator()->rewind();
                    return $collMonitorThresholds;
                }

                if($partial && $this->collMonitorThresholds) {
                    foreach($this->collMonitorThresholds as $obj) {
                        if($obj->isNew()) {
                            $collMonitorThresholds[] = $obj;
                        }
                    }
                }

                $this->collMonitorThresholds = $collMonitorThresholds;
                $this->collMonitorThresholdsPartial = false;
            }
        }

        return $this->collMonitorThresholds;
    }

    /**
     * Sets a collection of MonitorThreshold objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $monitorThresholds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Monitor The current object (for fluent API support)
     */
    public function setMonitorThresholds(PropelCollection $monitorThresholds, PropelPDO $con = null)
    {
        $monitorThresholdsToDelete = $this->getMonitorThresholds(new Criteria(), $con)->diff($monitorThresholds);

        $this->monitorThresholdsScheduledForDeletion = unserialize(serialize($monitorThresholdsToDelete));

        foreach ($monitorThresholdsToDelete as $monitorThresholdRemoved) {
            $monitorThresholdRemoved->setMonitor(null);
        }

        $this->collMonitorThresholds = null;
        foreach ($monitorThresholds as $monitorThreshold) {
            $this->addMonitorThreshold($monitorThreshold);
        }

        $this->collMonitorThresholds = $monitorThresholds;
        $this->collMonitorThresholdsPartial = false;

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
    public function countMonitorThresholds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMonitorThresholdsPartial && !$this->isNew();
        if (null === $this->collMonitorThresholds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMonitorThresholds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMonitorThresholds());
            }
            $query = ThresholdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMonitor($this)
                ->count($con);
        }

        return count($this->collMonitorThresholds);
    }

    /**
     * Method called to associate a Threshold object to this object
     * through the Threshold foreign key attribute.
     *
     * @param    Threshold $l Threshold
     * @return Monitor The current object (for fluent API support)
     */
    public function addMonitorThreshold(Threshold $l)
    {
        if ($this->collMonitorThresholds === null) {
            $this->initMonitorThresholds();
            $this->collMonitorThresholdsPartial = true;
        }
        if (!in_array($l, $this->collMonitorThresholds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMonitorThreshold($l);
        }

        return $this;
    }

    /**
     * @param	MonitorThreshold $monitorThreshold The monitorThreshold object to add.
     */
    protected function doAddMonitorThreshold($monitorThreshold)
    {
        $this->collMonitorThresholds[]= $monitorThreshold;
        $monitorThreshold->setMonitor($this);
    }

    /**
     * @param	MonitorThreshold $monitorThreshold The monitorThreshold object to remove.
     * @return Monitor The current object (for fluent API support)
     */
    public function removeMonitorThreshold($monitorThreshold)
    {
        if ($this->getMonitorThresholds()->contains($monitorThreshold)) {
            $this->collMonitorThresholds->remove($this->collMonitorThresholds->search($monitorThreshold));
            if (null === $this->monitorThresholdsScheduledForDeletion) {
                $this->monitorThresholdsScheduledForDeletion = clone $this->collMonitorThresholds;
                $this->monitorThresholdsScheduledForDeletion->clear();
            }
            $this->monitorThresholdsScheduledForDeletion[]= clone $monitorThreshold;
            $monitorThreshold->setMonitor(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Monitor is new, it will return
     * an empty collection; or if this Monitor has previously
     * been saved, it will retrieve related MonitorThresholds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Monitor.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Threshold[] List of Threshold objects
     */
    public function getMonitorThresholdsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ThresholdQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getMonitorThresholds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->monitorid = null;
        $this->pluginid = null;
        $this->pluginmetaid = null;
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
            if ($this->collMonitorThresholds) {
                foreach ($this->collMonitorThresholds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPlugin instanceof Persistent) {
              $this->aPlugin->clearAllReferences($deep);
            }
            if ($this->aPluginMeta instanceof Persistent) {
              $this->aPluginMeta->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMonitorThresholds instanceof PropelCollection) {
            $this->collMonitorThresholds->clearIterator();
        }
        $this->collMonitorThresholds = null;
        $this->aPlugin = null;
        $this->aPluginMeta = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MonitorPeer::DEFAULT_STRING_FORMAT);
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
