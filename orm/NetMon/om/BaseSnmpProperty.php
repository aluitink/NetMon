<?php


/**
 * Base class that represents a row from the 'SnmpProperty' table.
 *
 *
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseSnmpProperty extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SnmpPropertyPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SnmpPropertyPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the snmppropertyid field.
     * @var        int
     */
    protected $snmppropertyid;

    /**
     * The value for the snmpnamespaceid field.
     * @var        int
     */
    protected $snmpnamespaceid;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the property field.
     * @var        string
     */
    protected $property;

    /**
     * @var        SnmpNamespace
     */
    protected $aSnmpNamespace;

    /**
     * @var        PropelObjectCollection|Poll[] Collection to store aggregation of Poll objects.
     */
    protected $collSnmpPropertyPolls;
    protected $collSnmpPropertyPollsPartial;

    /**
     * @var        PropelObjectCollection|Trap[] Collection to store aggregation of Trap objects.
     */
    protected $collSnmpPropertyTraps;
    protected $collSnmpPropertyTrapsPartial;

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
    protected $snmpPropertyPollsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $snmpPropertyTrapsScheduledForDeletion = null;

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
     * Get the [snmpnamespaceid] column value.
     *
     * @return int
     */
    public function getSnmpnamespaceid()
    {
        return $this->snmpnamespaceid;
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
     * Get the [property] column value.
     *
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Set the value of [snmppropertyid] column.
     *
     * @param int $v new value
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function setSnmppropertyid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->snmppropertyid !== $v) {
            $this->snmppropertyid = $v;
            $this->modifiedColumns[] = SnmpPropertyPeer::SNMPPROPERTYID;
        }


        return $this;
    } // setSnmppropertyid()

    /**
     * Set the value of [snmpnamespaceid] column.
     *
     * @param int $v new value
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function setSnmpnamespaceid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->snmpnamespaceid !== $v) {
            $this->snmpnamespaceid = $v;
            $this->modifiedColumns[] = SnmpPropertyPeer::SNMPNAMESPACEID;
        }

        if ($this->aSnmpNamespace !== null && $this->aSnmpNamespace->getSnmpnamespaceid() !== $v) {
            $this->aSnmpNamespace = null;
        }


        return $this;
    } // setSnmpnamespaceid()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = SnmpPropertyPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [property] column.
     *
     * @param string $v new value
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function setProperty($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->property !== $v) {
            $this->property = $v;
            $this->modifiedColumns[] = SnmpPropertyPeer::PROPERTY;
        }


        return $this;
    } // setProperty()

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

            $this->snmppropertyid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->snmpnamespaceid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->property = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = SnmpPropertyPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SnmpProperty object", $e);
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

        if ($this->aSnmpNamespace !== null && $this->snmpnamespaceid !== $this->aSnmpNamespace->getSnmpnamespaceid()) {
            $this->aSnmpNamespace = null;
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
            $con = Propel::getConnection(SnmpPropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SnmpPropertyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSnmpNamespace = null;
            $this->collSnmpPropertyPolls = null;

            $this->collSnmpPropertyTraps = null;

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
            $con = Propel::getConnection(SnmpPropertyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SnmpPropertyQuery::create()
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
            $con = Propel::getConnection(SnmpPropertyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SnmpPropertyPeer::addInstanceToPool($this);
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

            if ($this->aSnmpNamespace !== null) {
                if ($this->aSnmpNamespace->isModified() || $this->aSnmpNamespace->isNew()) {
                    $affectedRows += $this->aSnmpNamespace->save($con);
                }
                $this->setSnmpNamespace($this->aSnmpNamespace);
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

            if ($this->snmpPropertyPollsScheduledForDeletion !== null) {
                if (!$this->snmpPropertyPollsScheduledForDeletion->isEmpty()) {
                    PollQuery::create()
                        ->filterByPrimaryKeys($this->snmpPropertyPollsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->snmpPropertyPollsScheduledForDeletion = null;
                }
            }

            if ($this->collSnmpPropertyPolls !== null) {
                foreach ($this->collSnmpPropertyPolls as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->snmpPropertyTrapsScheduledForDeletion !== null) {
                if (!$this->snmpPropertyTrapsScheduledForDeletion->isEmpty()) {
                    foreach ($this->snmpPropertyTrapsScheduledForDeletion as $snmpPropertyTrap) {
                        // need to save related object because we set the relation to null
                        $snmpPropertyTrap->save($con);
                    }
                    $this->snmpPropertyTrapsScheduledForDeletion = null;
                }
            }

            if ($this->collSnmpPropertyTraps !== null) {
                foreach ($this->collSnmpPropertyTraps as $referrerFK) {
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

        $this->modifiedColumns[] = SnmpPropertyPeer::SNMPPROPERTYID;
        if (null !== $this->snmppropertyid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SnmpPropertyPeer::SNMPPROPERTYID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SnmpPropertyPeer::SNMPPROPERTYID)) {
            $modifiedColumns[':p' . $index++]  = '`SnmpPropertyId`';
        }
        if ($this->isColumnModified(SnmpPropertyPeer::SNMPNAMESPACEID)) {
            $modifiedColumns[':p' . $index++]  = '`SnmpNamespaceId`';
        }
        if ($this->isColumnModified(SnmpPropertyPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`Name`';
        }
        if ($this->isColumnModified(SnmpPropertyPeer::PROPERTY)) {
            $modifiedColumns[':p' . $index++]  = '`Property`';
        }

        $sql = sprintf(
            'INSERT INTO `SnmpProperty` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`SnmpPropertyId`':
                        $stmt->bindValue($identifier, $this->snmppropertyid, PDO::PARAM_INT);
                        break;
                    case '`SnmpNamespaceId`':
                        $stmt->bindValue($identifier, $this->snmpnamespaceid, PDO::PARAM_INT);
                        break;
                    case '`Name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`Property`':
                        $stmt->bindValue($identifier, $this->property, PDO::PARAM_STR);
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
        $this->setSnmppropertyid($pk);

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

            if ($this->aSnmpNamespace !== null) {
                if (!$this->aSnmpNamespace->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSnmpNamespace->getValidationFailures());
                }
            }


            if (($retval = SnmpPropertyPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSnmpPropertyPolls !== null) {
                    foreach ($this->collSnmpPropertyPolls as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSnmpPropertyTraps !== null) {
                    foreach ($this->collSnmpPropertyTraps as $referrerFK) {
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
        $pos = SnmpPropertyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSnmppropertyid();
                break;
            case 1:
                return $this->getSnmpnamespaceid();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getProperty();
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
        if (isset($alreadyDumpedObjects['SnmpProperty'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SnmpProperty'][$this->getPrimaryKey()] = true;
        $keys = SnmpPropertyPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSnmppropertyid(),
            $keys[1] => $this->getSnmpnamespaceid(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getProperty(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSnmpNamespace) {
                $result['SnmpNamespace'] = $this->aSnmpNamespace->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSnmpPropertyPolls) {
                $result['SnmpPropertyPolls'] = $this->collSnmpPropertyPolls->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSnmpPropertyTraps) {
                $result['SnmpPropertyTraps'] = $this->collSnmpPropertyTraps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SnmpPropertyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSnmppropertyid($value);
                break;
            case 1:
                $this->setSnmpnamespaceid($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setProperty($value);
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
        $keys = SnmpPropertyPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSnmppropertyid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSnmpnamespaceid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProperty($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SnmpPropertyPeer::DATABASE_NAME);

        if ($this->isColumnModified(SnmpPropertyPeer::SNMPPROPERTYID)) $criteria->add(SnmpPropertyPeer::SNMPPROPERTYID, $this->snmppropertyid);
        if ($this->isColumnModified(SnmpPropertyPeer::SNMPNAMESPACEID)) $criteria->add(SnmpPropertyPeer::SNMPNAMESPACEID, $this->snmpnamespaceid);
        if ($this->isColumnModified(SnmpPropertyPeer::NAME)) $criteria->add(SnmpPropertyPeer::NAME, $this->name);
        if ($this->isColumnModified(SnmpPropertyPeer::PROPERTY)) $criteria->add(SnmpPropertyPeer::PROPERTY, $this->property);

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
        $criteria = new Criteria(SnmpPropertyPeer::DATABASE_NAME);
        $criteria->add(SnmpPropertyPeer::SNMPPROPERTYID, $this->snmppropertyid);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getSnmppropertyid();
    }

    /**
     * Generic method to set the primary key (snmppropertyid column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSnmppropertyid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getSnmppropertyid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SnmpProperty (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSnmpnamespaceid($this->getSnmpnamespaceid());
        $copyObj->setName($this->getName());
        $copyObj->setProperty($this->getProperty());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSnmpPropertyPolls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSnmpPropertyPoll($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSnmpPropertyTraps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSnmpPropertyTrap($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setSnmppropertyid(NULL); // this is a auto-increment column, so set to default value
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
     * @return SnmpProperty Clone of current object.
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
     * @return SnmpPropertyPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SnmpPropertyPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a SnmpNamespace object.
     *
     * @param             SnmpNamespace $v
     * @return SnmpProperty The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSnmpNamespace(SnmpNamespace $v = null)
    {
        if ($v === null) {
            $this->setSnmpnamespaceid(NULL);
        } else {
            $this->setSnmpnamespaceid($v->getSnmpnamespaceid());
        }

        $this->aSnmpNamespace = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SnmpNamespace object, it will not be re-added.
        if ($v !== null) {
            $v->addSnmpNamespaceSnmpProperty($this);
        }


        return $this;
    }


    /**
     * Get the associated SnmpNamespace object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SnmpNamespace The associated SnmpNamespace object.
     * @throws PropelException
     */
    public function getSnmpNamespace(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSnmpNamespace === null && ($this->snmpnamespaceid !== null) && $doQuery) {
            $this->aSnmpNamespace = SnmpNamespaceQuery::create()->findPk($this->snmpnamespaceid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSnmpNamespace->addSnmpNamespaceSnmpPropertys($this);
             */
        }

        return $this->aSnmpNamespace;
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
        if ('SnmpPropertyPoll' == $relationName) {
            $this->initSnmpPropertyPolls();
        }
        if ('SnmpPropertyTrap' == $relationName) {
            $this->initSnmpPropertyTraps();
        }
    }

    /**
     * Clears out the collSnmpPropertyPolls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SnmpProperty The current object (for fluent API support)
     * @see        addSnmpPropertyPolls()
     */
    public function clearSnmpPropertyPolls()
    {
        $this->collSnmpPropertyPolls = null; // important to set this to null since that means it is uninitialized
        $this->collSnmpPropertyPollsPartial = null;

        return $this;
    }

    /**
     * reset is the collSnmpPropertyPolls collection loaded partially
     *
     * @return void
     */
    public function resetPartialSnmpPropertyPolls($v = true)
    {
        $this->collSnmpPropertyPollsPartial = $v;
    }

    /**
     * Initializes the collSnmpPropertyPolls collection.
     *
     * By default this just sets the collSnmpPropertyPolls collection to an empty array (like clearcollSnmpPropertyPolls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSnmpPropertyPolls($overrideExisting = true)
    {
        if (null !== $this->collSnmpPropertyPolls && !$overrideExisting) {
            return;
        }
        $this->collSnmpPropertyPolls = new PropelObjectCollection();
        $this->collSnmpPropertyPolls->setModel('Poll');
    }

    /**
     * Gets an array of Poll objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SnmpProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Poll[] List of Poll objects
     * @throws PropelException
     */
    public function getSnmpPropertyPolls($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSnmpPropertyPollsPartial && !$this->isNew();
        if (null === $this->collSnmpPropertyPolls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSnmpPropertyPolls) {
                // return empty collection
                $this->initSnmpPropertyPolls();
            } else {
                $collSnmpPropertyPolls = PollQuery::create(null, $criteria)
                    ->filterBySnmpProperty($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSnmpPropertyPollsPartial && count($collSnmpPropertyPolls)) {
                      $this->initSnmpPropertyPolls(false);

                      foreach($collSnmpPropertyPolls as $obj) {
                        if (false == $this->collSnmpPropertyPolls->contains($obj)) {
                          $this->collSnmpPropertyPolls->append($obj);
                        }
                      }

                      $this->collSnmpPropertyPollsPartial = true;
                    }

                    $collSnmpPropertyPolls->getInternalIterator()->rewind();
                    return $collSnmpPropertyPolls;
                }

                if($partial && $this->collSnmpPropertyPolls) {
                    foreach($this->collSnmpPropertyPolls as $obj) {
                        if($obj->isNew()) {
                            $collSnmpPropertyPolls[] = $obj;
                        }
                    }
                }

                $this->collSnmpPropertyPolls = $collSnmpPropertyPolls;
                $this->collSnmpPropertyPollsPartial = false;
            }
        }

        return $this->collSnmpPropertyPolls;
    }

    /**
     * Sets a collection of SnmpPropertyPoll objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $snmpPropertyPolls A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function setSnmpPropertyPolls(PropelCollection $snmpPropertyPolls, PropelPDO $con = null)
    {
        $snmpPropertyPollsToDelete = $this->getSnmpPropertyPolls(new Criteria(), $con)->diff($snmpPropertyPolls);

        $this->snmpPropertyPollsScheduledForDeletion = unserialize(serialize($snmpPropertyPollsToDelete));

        foreach ($snmpPropertyPollsToDelete as $snmpPropertyPollRemoved) {
            $snmpPropertyPollRemoved->setSnmpProperty(null);
        }

        $this->collSnmpPropertyPolls = null;
        foreach ($snmpPropertyPolls as $snmpPropertyPoll) {
            $this->addSnmpPropertyPoll($snmpPropertyPoll);
        }

        $this->collSnmpPropertyPolls = $snmpPropertyPolls;
        $this->collSnmpPropertyPollsPartial = false;

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
    public function countSnmpPropertyPolls(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSnmpPropertyPollsPartial && !$this->isNew();
        if (null === $this->collSnmpPropertyPolls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSnmpPropertyPolls) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSnmpPropertyPolls());
            }
            $query = PollQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySnmpProperty($this)
                ->count($con);
        }

        return count($this->collSnmpPropertyPolls);
    }

    /**
     * Method called to associate a Poll object to this object
     * through the Poll foreign key attribute.
     *
     * @param    Poll $l Poll
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function addSnmpPropertyPoll(Poll $l)
    {
        if ($this->collSnmpPropertyPolls === null) {
            $this->initSnmpPropertyPolls();
            $this->collSnmpPropertyPollsPartial = true;
        }
        if (!in_array($l, $this->collSnmpPropertyPolls->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSnmpPropertyPoll($l);
        }

        return $this;
    }

    /**
     * @param	SnmpPropertyPoll $snmpPropertyPoll The snmpPropertyPoll object to add.
     */
    protected function doAddSnmpPropertyPoll($snmpPropertyPoll)
    {
        $this->collSnmpPropertyPolls[]= $snmpPropertyPoll;
        $snmpPropertyPoll->setSnmpProperty($this);
    }

    /**
     * @param	SnmpPropertyPoll $snmpPropertyPoll The snmpPropertyPoll object to remove.
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function removeSnmpPropertyPoll($snmpPropertyPoll)
    {
        if ($this->getSnmpPropertyPolls()->contains($snmpPropertyPoll)) {
            $this->collSnmpPropertyPolls->remove($this->collSnmpPropertyPolls->search($snmpPropertyPoll));
            if (null === $this->snmpPropertyPollsScheduledForDeletion) {
                $this->snmpPropertyPollsScheduledForDeletion = clone $this->collSnmpPropertyPolls;
                $this->snmpPropertyPollsScheduledForDeletion->clear();
            }
            $this->snmpPropertyPollsScheduledForDeletion[]= clone $snmpPropertyPoll;
            $snmpPropertyPoll->setSnmpProperty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SnmpProperty is new, it will return
     * an empty collection; or if this SnmpProperty has previously
     * been saved, it will retrieve related SnmpPropertyPolls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SnmpProperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Poll[] List of Poll objects
     */
    public function getSnmpPropertyPollsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PollQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getSnmpPropertyPolls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SnmpProperty is new, it will return
     * an empty collection; or if this SnmpProperty has previously
     * been saved, it will retrieve related SnmpPropertyPolls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SnmpProperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Poll[] List of Poll objects
     */
    public function getSnmpPropertyPollsJoinPlugin($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PollQuery::create(null, $criteria);
        $query->joinWith('Plugin', $join_behavior);

        return $this->getSnmpPropertyPolls($query, $con);
    }

    /**
     * Clears out the collSnmpPropertyTraps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SnmpProperty The current object (for fluent API support)
     * @see        addSnmpPropertyTraps()
     */
    public function clearSnmpPropertyTraps()
    {
        $this->collSnmpPropertyTraps = null; // important to set this to null since that means it is uninitialized
        $this->collSnmpPropertyTrapsPartial = null;

        return $this;
    }

    /**
     * reset is the collSnmpPropertyTraps collection loaded partially
     *
     * @return void
     */
    public function resetPartialSnmpPropertyTraps($v = true)
    {
        $this->collSnmpPropertyTrapsPartial = $v;
    }

    /**
     * Initializes the collSnmpPropertyTraps collection.
     *
     * By default this just sets the collSnmpPropertyTraps collection to an empty array (like clearcollSnmpPropertyTraps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSnmpPropertyTraps($overrideExisting = true)
    {
        if (null !== $this->collSnmpPropertyTraps && !$overrideExisting) {
            return;
        }
        $this->collSnmpPropertyTraps = new PropelObjectCollection();
        $this->collSnmpPropertyTraps->setModel('Trap');
    }

    /**
     * Gets an array of Trap objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SnmpProperty is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Trap[] List of Trap objects
     * @throws PropelException
     */
    public function getSnmpPropertyTraps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSnmpPropertyTrapsPartial && !$this->isNew();
        if (null === $this->collSnmpPropertyTraps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSnmpPropertyTraps) {
                // return empty collection
                $this->initSnmpPropertyTraps();
            } else {
                $collSnmpPropertyTraps = TrapQuery::create(null, $criteria)
                    ->filterBySnmpProperty($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSnmpPropertyTrapsPartial && count($collSnmpPropertyTraps)) {
                      $this->initSnmpPropertyTraps(false);

                      foreach($collSnmpPropertyTraps as $obj) {
                        if (false == $this->collSnmpPropertyTraps->contains($obj)) {
                          $this->collSnmpPropertyTraps->append($obj);
                        }
                      }

                      $this->collSnmpPropertyTrapsPartial = true;
                    }

                    $collSnmpPropertyTraps->getInternalIterator()->rewind();
                    return $collSnmpPropertyTraps;
                }

                if($partial && $this->collSnmpPropertyTraps) {
                    foreach($this->collSnmpPropertyTraps as $obj) {
                        if($obj->isNew()) {
                            $collSnmpPropertyTraps[] = $obj;
                        }
                    }
                }

                $this->collSnmpPropertyTraps = $collSnmpPropertyTraps;
                $this->collSnmpPropertyTrapsPartial = false;
            }
        }

        return $this->collSnmpPropertyTraps;
    }

    /**
     * Sets a collection of SnmpPropertyTrap objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $snmpPropertyTraps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function setSnmpPropertyTraps(PropelCollection $snmpPropertyTraps, PropelPDO $con = null)
    {
        $snmpPropertyTrapsToDelete = $this->getSnmpPropertyTraps(new Criteria(), $con)->diff($snmpPropertyTraps);

        $this->snmpPropertyTrapsScheduledForDeletion = unserialize(serialize($snmpPropertyTrapsToDelete));

        foreach ($snmpPropertyTrapsToDelete as $snmpPropertyTrapRemoved) {
            $snmpPropertyTrapRemoved->setSnmpProperty(null);
        }

        $this->collSnmpPropertyTraps = null;
        foreach ($snmpPropertyTraps as $snmpPropertyTrap) {
            $this->addSnmpPropertyTrap($snmpPropertyTrap);
        }

        $this->collSnmpPropertyTraps = $snmpPropertyTraps;
        $this->collSnmpPropertyTrapsPartial = false;

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
    public function countSnmpPropertyTraps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSnmpPropertyTrapsPartial && !$this->isNew();
        if (null === $this->collSnmpPropertyTraps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSnmpPropertyTraps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSnmpPropertyTraps());
            }
            $query = TrapQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySnmpProperty($this)
                ->count($con);
        }

        return count($this->collSnmpPropertyTraps);
    }

    /**
     * Method called to associate a Trap object to this object
     * through the Trap foreign key attribute.
     *
     * @param    Trap $l Trap
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function addSnmpPropertyTrap(Trap $l)
    {
        if ($this->collSnmpPropertyTraps === null) {
            $this->initSnmpPropertyTraps();
            $this->collSnmpPropertyTrapsPartial = true;
        }
        if (!in_array($l, $this->collSnmpPropertyTraps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSnmpPropertyTrap($l);
        }

        return $this;
    }

    /**
     * @param	SnmpPropertyTrap $snmpPropertyTrap The snmpPropertyTrap object to add.
     */
    protected function doAddSnmpPropertyTrap($snmpPropertyTrap)
    {
        $this->collSnmpPropertyTraps[]= $snmpPropertyTrap;
        $snmpPropertyTrap->setSnmpProperty($this);
    }

    /**
     * @param	SnmpPropertyTrap $snmpPropertyTrap The snmpPropertyTrap object to remove.
     * @return SnmpProperty The current object (for fluent API support)
     */
    public function removeSnmpPropertyTrap($snmpPropertyTrap)
    {
        if ($this->getSnmpPropertyTraps()->contains($snmpPropertyTrap)) {
            $this->collSnmpPropertyTraps->remove($this->collSnmpPropertyTraps->search($snmpPropertyTrap));
            if (null === $this->snmpPropertyTrapsScheduledForDeletion) {
                $this->snmpPropertyTrapsScheduledForDeletion = clone $this->collSnmpPropertyTraps;
                $this->snmpPropertyTrapsScheduledForDeletion->clear();
            }
            $this->snmpPropertyTrapsScheduledForDeletion[]= $snmpPropertyTrap;
            $snmpPropertyTrap->setSnmpProperty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SnmpProperty is new, it will return
     * an empty collection; or if this SnmpProperty has previously
     * been saved, it will retrieve related SnmpPropertyTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SnmpProperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getSnmpPropertyTrapsJoinDevice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('Device', $join_behavior);

        return $this->getSnmpPropertyTraps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SnmpProperty is new, it will return
     * an empty collection; or if this SnmpProperty has previously
     * been saved, it will retrieve related SnmpPropertyTraps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SnmpProperty.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Trap[] List of Trap objects
     */
    public function getSnmpPropertyTrapsJoinAdapter($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TrapQuery::create(null, $criteria);
        $query->joinWith('Adapter', $join_behavior);

        return $this->getSnmpPropertyTraps($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->snmppropertyid = null;
        $this->snmpnamespaceid = null;
        $this->name = null;
        $this->property = null;
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
            if ($this->collSnmpPropertyPolls) {
                foreach ($this->collSnmpPropertyPolls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSnmpPropertyTraps) {
                foreach ($this->collSnmpPropertyTraps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSnmpNamespace instanceof Persistent) {
              $this->aSnmpNamespace->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSnmpPropertyPolls instanceof PropelCollection) {
            $this->collSnmpPropertyPolls->clearIterator();
        }
        $this->collSnmpPropertyPolls = null;
        if ($this->collSnmpPropertyTraps instanceof PropelCollection) {
            $this->collSnmpPropertyTraps->clearIterator();
        }
        $this->collSnmpPropertyTraps = null;
        $this->aSnmpNamespace = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SnmpPropertyPeer::DEFAULT_STRING_FORMAT);
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
