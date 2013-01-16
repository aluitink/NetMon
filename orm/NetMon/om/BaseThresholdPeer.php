<?php


/**
 * Base static class for performing query and update operations on the 'Threshold' table.
 *
 *
 *
 * @package propel.generator.NetMon.om
 */
abstract class BaseThresholdPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'NetMon';

    /** the table name for this class */
    const TABLE_NAME = 'Threshold';

    /** the related Propel class for this table */
    const OM_CLASS = 'Threshold';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ThresholdTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the ThresholdId field */
    const THRESHOLDID = 'Threshold.ThresholdId';

    /** the column name for the DeviceId field */
    const DEVICEID = 'Threshold.DeviceId';

    /** the column name for the PollId field */
    const POLLID = 'Threshold.PollId';

    /** the column name for the TrapId field */
    const TRAPID = 'Threshold.TrapId';

    /** the column name for the PluginId field */
    const PLUGINID = 'Threshold.PluginId';

    /** the column name for the SyslogId field */
    const SYSLOGID = 'Threshold.SyslogId';

    /** the column name for the GreaterThan field */
    const GREATERTHAN = 'Threshold.GreaterThan';

    /** the column name for the Value field */
    const VALUE = 'Threshold.Value';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Threshold objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Threshold[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ThresholdPeer::$fieldNames[ThresholdPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Thresholdid', 'Deviceid', 'Pollid', 'Trapid', 'Pluginid', 'Syslogid', 'Greaterthan', 'Value', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('thresholdid', 'deviceid', 'pollid', 'trapid', 'pluginid', 'syslogid', 'greaterthan', 'value', ),
        BasePeer::TYPE_COLNAME => array (ThresholdPeer::THRESHOLDID, ThresholdPeer::DEVICEID, ThresholdPeer::POLLID, ThresholdPeer::TRAPID, ThresholdPeer::PLUGINID, ThresholdPeer::SYSLOGID, ThresholdPeer::GREATERTHAN, ThresholdPeer::VALUE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('THRESHOLDID', 'DEVICEID', 'POLLID', 'TRAPID', 'PLUGINID', 'SYSLOGID', 'GREATERTHAN', 'VALUE', ),
        BasePeer::TYPE_FIELDNAME => array ('ThresholdId', 'DeviceId', 'PollId', 'TrapId', 'PluginId', 'SyslogId', 'GreaterThan', 'Value', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ThresholdPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Thresholdid' => 0, 'Deviceid' => 1, 'Pollid' => 2, 'Trapid' => 3, 'Pluginid' => 4, 'Syslogid' => 5, 'Greaterthan' => 6, 'Value' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('thresholdid' => 0, 'deviceid' => 1, 'pollid' => 2, 'trapid' => 3, 'pluginid' => 4, 'syslogid' => 5, 'greaterthan' => 6, 'value' => 7, ),
        BasePeer::TYPE_COLNAME => array (ThresholdPeer::THRESHOLDID => 0, ThresholdPeer::DEVICEID => 1, ThresholdPeer::POLLID => 2, ThresholdPeer::TRAPID => 3, ThresholdPeer::PLUGINID => 4, ThresholdPeer::SYSLOGID => 5, ThresholdPeer::GREATERTHAN => 6, ThresholdPeer::VALUE => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('THRESHOLDID' => 0, 'DEVICEID' => 1, 'POLLID' => 2, 'TRAPID' => 3, 'PLUGINID' => 4, 'SYSLOGID' => 5, 'GREATERTHAN' => 6, 'VALUE' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('ThresholdId' => 0, 'DeviceId' => 1, 'PollId' => 2, 'TrapId' => 3, 'PluginId' => 4, 'SyslogId' => 5, 'GreaterThan' => 6, 'Value' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ThresholdPeer::getFieldNames($toType);
        $key = isset(ThresholdPeer::$fieldKeys[$fromType][$name]) ? ThresholdPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ThresholdPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ThresholdPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ThresholdPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ThresholdPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ThresholdPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ThresholdPeer::THRESHOLDID);
            $criteria->addSelectColumn(ThresholdPeer::DEVICEID);
            $criteria->addSelectColumn(ThresholdPeer::POLLID);
            $criteria->addSelectColumn(ThresholdPeer::TRAPID);
            $criteria->addSelectColumn(ThresholdPeer::PLUGINID);
            $criteria->addSelectColumn(ThresholdPeer::SYSLOGID);
            $criteria->addSelectColumn(ThresholdPeer::GREATERTHAN);
            $criteria->addSelectColumn(ThresholdPeer::VALUE);
        } else {
            $criteria->addSelectColumn($alias . '.ThresholdId');
            $criteria->addSelectColumn($alias . '.DeviceId');
            $criteria->addSelectColumn($alias . '.PollId');
            $criteria->addSelectColumn($alias . '.TrapId');
            $criteria->addSelectColumn($alias . '.PluginId');
            $criteria->addSelectColumn($alias . '.SyslogId');
            $criteria->addSelectColumn($alias . '.GreaterThan');
            $criteria->addSelectColumn($alias . '.Value');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Threshold
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ThresholdPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ThresholdPeer::populateObjects(ThresholdPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ThresholdPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Threshold $obj A Threshold object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getThresholdid();
            } // if key === null
            ThresholdPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Threshold object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Threshold) {
                $key = (string) $value->getThresholdid();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Threshold object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ThresholdPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Threshold Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ThresholdPeer::$instances[$key])) {
                return ThresholdPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (ThresholdPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ThresholdPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Threshold
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ThresholdPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ThresholdPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ThresholdPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Threshold object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ThresholdPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ThresholdPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ThresholdPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ThresholdPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ThresholdPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Device table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinDevice(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Poll table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPoll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Trap table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTrap(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Plugin table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPlugin(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Syslog table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSyslog(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with their Device objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDevice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol = ThresholdPeer::NUM_HYDRATE_COLUMNS;
        DevicePeer::addSelectColumns($criteria);

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = DevicePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = DevicePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DevicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    DevicePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Threshold) to $obj2 (Device)
                $obj2->addDeviceThreshold($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with their Poll objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPoll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol = ThresholdPeer::NUM_HYDRATE_COLUMNS;
        PollPeer::addSelectColumns($criteria);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PollPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PollPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PollPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PollPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Threshold) to $obj2 (Poll)
                $obj2->addPollThreshold($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with their Trap objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTrap(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol = ThresholdPeer::NUM_HYDRATE_COLUMNS;
        TrapPeer::addSelectColumns($criteria);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TrapPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TrapPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TrapPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TrapPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Threshold) to $obj2 (Trap)
                $obj2->addTrapThreshold($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with their Plugin objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPlugin(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol = ThresholdPeer::NUM_HYDRATE_COLUMNS;
        PluginPeer::addSelectColumns($criteria);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PluginPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PluginPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PluginPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Threshold) to $obj2 (Plugin)
                $obj2->addPluginThreshold($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with their Syslog objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSyslog(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol = ThresholdPeer::NUM_HYDRATE_COLUMNS;
        SyslogPeer::addSelectColumns($criteria);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SyslogPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SyslogPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SyslogPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SyslogPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Threshold) to $obj2 (Syslog)
                $obj2->addSyslogThreshold($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Threshold objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol2 = ThresholdPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        PollPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PollPeer::NUM_HYDRATE_COLUMNS;

        TrapPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TrapPeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PluginPeer::NUM_HYDRATE_COLUMNS;

        SyslogPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SyslogPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Device rows

            $key2 = DevicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = DevicePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DevicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DevicePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Threshold) to the collection in $obj2 (Device)
                $obj2->addDeviceThreshold($obj1);
            } // if joined row not null

            // Add objects for joined Poll rows

            $key3 = PollPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PollPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PollPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PollPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Threshold) to the collection in $obj3 (Poll)
                $obj3->addPollThreshold($obj1);
            } // if joined row not null

            // Add objects for joined Trap rows

            $key4 = TrapPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = TrapPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = TrapPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TrapPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Threshold) to the collection in $obj4 (Trap)
                $obj4->addTrapThreshold($obj1);
            } // if joined row not null

            // Add objects for joined Plugin rows

            $key5 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = PluginPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = PluginPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PluginPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Threshold) to the collection in $obj5 (Plugin)
                $obj5->addPluginThreshold($obj1);
            } // if joined row not null

            // Add objects for joined Syslog rows

            $key6 = SyslogPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = SyslogPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = SyslogPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SyslogPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Threshold) to the collection in $obj6 (Syslog)
                $obj6->addSyslogThreshold($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Device table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptDevice(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Poll table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPoll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Trap table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTrap(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Plugin table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPlugin(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Syslog table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSyslog(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ThresholdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with all related objects except Device.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptDevice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol2 = ThresholdPeer::NUM_HYDRATE_COLUMNS;

        PollPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PollPeer::NUM_HYDRATE_COLUMNS;

        TrapPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TrapPeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PluginPeer::NUM_HYDRATE_COLUMNS;

        SyslogPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SyslogPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Poll rows

                $key2 = PollPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PollPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = PollPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PollPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj2 (Poll)
                $obj2->addPollThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Trap rows

                $key3 = TrapPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TrapPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = TrapPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TrapPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj3 (Trap)
                $obj3->addTrapThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Plugin rows

                $key4 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PluginPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = PluginPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PluginPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj4 (Plugin)
                $obj4->addPluginThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Syslog rows

                $key5 = SyslogPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SyslogPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = SyslogPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SyslogPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj5 (Syslog)
                $obj5->addSyslogThreshold($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with all related objects except Poll.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPoll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol2 = ThresholdPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        TrapPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TrapPeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PluginPeer::NUM_HYDRATE_COLUMNS;

        SyslogPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SyslogPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Device rows

                $key2 = DevicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DevicePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DevicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DevicePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj2 (Device)
                $obj2->addDeviceThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Trap rows

                $key3 = TrapPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TrapPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = TrapPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TrapPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj3 (Trap)
                $obj3->addTrapThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Plugin rows

                $key4 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PluginPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = PluginPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PluginPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj4 (Plugin)
                $obj4->addPluginThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Syslog rows

                $key5 = SyslogPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SyslogPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = SyslogPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SyslogPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj5 (Syslog)
                $obj5->addSyslogThreshold($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with all related objects except Trap.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTrap(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol2 = ThresholdPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        PollPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PollPeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PluginPeer::NUM_HYDRATE_COLUMNS;

        SyslogPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SyslogPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Device rows

                $key2 = DevicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DevicePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DevicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DevicePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj2 (Device)
                $obj2->addDeviceThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Poll rows

                $key3 = PollPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PollPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PollPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PollPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj3 (Poll)
                $obj3->addPollThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Plugin rows

                $key4 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PluginPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = PluginPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PluginPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj4 (Plugin)
                $obj4->addPluginThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Syslog rows

                $key5 = SyslogPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SyslogPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = SyslogPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SyslogPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj5 (Syslog)
                $obj5->addSyslogThreshold($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with all related objects except Plugin.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPlugin(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol2 = ThresholdPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        PollPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PollPeer::NUM_HYDRATE_COLUMNS;

        TrapPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TrapPeer::NUM_HYDRATE_COLUMNS;

        SyslogPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SyslogPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::SYSLOGID, SyslogPeer::SYSLOGID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Device rows

                $key2 = DevicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DevicePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DevicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DevicePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj2 (Device)
                $obj2->addDeviceThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Poll rows

                $key3 = PollPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PollPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PollPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PollPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj3 (Poll)
                $obj3->addPollThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Trap rows

                $key4 = TrapPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TrapPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = TrapPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TrapPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj4 (Trap)
                $obj4->addTrapThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Syslog rows

                $key5 = SyslogPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SyslogPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = SyslogPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SyslogPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj5 (Syslog)
                $obj5->addSyslogThreshold($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Threshold objects pre-filled with all related objects except Syslog.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Threshold objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSyslog(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ThresholdPeer::DATABASE_NAME);
        }

        ThresholdPeer::addSelectColumns($criteria);
        $startcol2 = ThresholdPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        PollPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PollPeer::NUM_HYDRATE_COLUMNS;

        TrapPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TrapPeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PluginPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ThresholdPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::POLLID, PollPeer::POLLID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::TRAPID, TrapPeer::TRAPID, $join_behavior);

        $criteria->addJoin(ThresholdPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ThresholdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ThresholdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ThresholdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ThresholdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Device rows

                $key2 = DevicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DevicePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = DevicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DevicePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj2 (Device)
                $obj2->addDeviceThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Poll rows

                $key3 = PollPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PollPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PollPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PollPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj3 (Poll)
                $obj3->addPollThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Trap rows

                $key4 = TrapPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TrapPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = TrapPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TrapPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj4 (Trap)
                $obj4->addTrapThreshold($obj1);

            } // if joined row is not null

                // Add objects for joined Plugin rows

                $key5 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PluginPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = PluginPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PluginPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Threshold) to the collection in $obj5 (Plugin)
                $obj5->addPluginThreshold($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ThresholdPeer::DATABASE_NAME)->getTable(ThresholdPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseThresholdPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseThresholdPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ThresholdTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return ThresholdPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Threshold or Criteria object.
     *
     * @param      mixed $values Criteria or Threshold object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Threshold object
        }

        if ($criteria->containsKey(ThresholdPeer::THRESHOLDID) && $criteria->keyContainsValue(ThresholdPeer::THRESHOLDID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ThresholdPeer::THRESHOLDID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Threshold or Criteria object.
     *
     * @param      mixed $values Criteria or Threshold object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ThresholdPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ThresholdPeer::THRESHOLDID);
            $value = $criteria->remove(ThresholdPeer::THRESHOLDID);
            if ($value) {
                $selectCriteria->add(ThresholdPeer::THRESHOLDID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ThresholdPeer::TABLE_NAME);
            }

        } else { // $values is Threshold object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Threshold table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ThresholdPeer::TABLE_NAME, $con, ThresholdPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ThresholdPeer::clearInstancePool();
            ThresholdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Threshold or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Threshold object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ThresholdPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Threshold) { // it's a model object
            // invalidate the cache for this single object
            ThresholdPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ThresholdPeer::DATABASE_NAME);
            $criteria->add(ThresholdPeer::THRESHOLDID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ThresholdPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ThresholdPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ThresholdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Threshold object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Threshold $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ThresholdPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ThresholdPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(ThresholdPeer::DATABASE_NAME, ThresholdPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Threshold
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ThresholdPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ThresholdPeer::DATABASE_NAME);
        $criteria->add(ThresholdPeer::THRESHOLDID, $pk);

        $v = ThresholdPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Threshold[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ThresholdPeer::DATABASE_NAME);
            $criteria->add(ThresholdPeer::THRESHOLDID, $pks, Criteria::IN);
            $objs = ThresholdPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseThresholdPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseThresholdPeer::buildTableMap();

