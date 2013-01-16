<?php


/**
 * Base static class for performing query and update operations on the 'Monitor' table.
 *
 *
 *
 * @package propel.generator.NetMon.om
 */
abstract class BaseMonitorPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'NetMon';

    /** the table name for this class */
    const TABLE_NAME = 'Monitor';

    /** the related Propel class for this table */
    const OM_CLASS = 'Monitor';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MonitorTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 5;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 5;

    /** the column name for the MonitorId field */
    const MONITORID = 'Monitor.MonitorId';

    /** the column name for the DeviceId field */
    const DEVICEID = 'Monitor.DeviceId';

    /** the column name for the PluginId field */
    const PLUGINID = 'Monitor.PluginId';

    /** the column name for the AdapterId field */
    const ADAPTERID = 'Monitor.AdapterId';

    /** the column name for the SnmpPropertyId field */
    const SNMPPROPERTYID = 'Monitor.SnmpPropertyId';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Monitor objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Monitor[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MonitorPeer::$fieldNames[MonitorPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Monitorid', 'Deviceid', 'Pluginid', 'Adapterid', 'Snmppropertyid', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('monitorid', 'deviceid', 'pluginid', 'adapterid', 'snmppropertyid', ),
        BasePeer::TYPE_COLNAME => array (MonitorPeer::MONITORID, MonitorPeer::DEVICEID, MonitorPeer::PLUGINID, MonitorPeer::ADAPTERID, MonitorPeer::SNMPPROPERTYID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MONITORID', 'DEVICEID', 'PLUGINID', 'ADAPTERID', 'SNMPPROPERTYID', ),
        BasePeer::TYPE_FIELDNAME => array ('MonitorId', 'DeviceId', 'PluginId', 'AdapterId', 'SnmpPropertyId', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MonitorPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Monitorid' => 0, 'Deviceid' => 1, 'Pluginid' => 2, 'Adapterid' => 3, 'Snmppropertyid' => 4, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('monitorid' => 0, 'deviceid' => 1, 'pluginid' => 2, 'adapterid' => 3, 'snmppropertyid' => 4, ),
        BasePeer::TYPE_COLNAME => array (MonitorPeer::MONITORID => 0, MonitorPeer::DEVICEID => 1, MonitorPeer::PLUGINID => 2, MonitorPeer::ADAPTERID => 3, MonitorPeer::SNMPPROPERTYID => 4, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MONITORID' => 0, 'DEVICEID' => 1, 'PLUGINID' => 2, 'ADAPTERID' => 3, 'SNMPPROPERTYID' => 4, ),
        BasePeer::TYPE_FIELDNAME => array ('MonitorId' => 0, 'DeviceId' => 1, 'PluginId' => 2, 'AdapterId' => 3, 'SnmpPropertyId' => 4, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
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
        $toNames = MonitorPeer::getFieldNames($toType);
        $key = isset(MonitorPeer::$fieldKeys[$fromType][$name]) ? MonitorPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MonitorPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, MonitorPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MonitorPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. MonitorPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MonitorPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(MonitorPeer::MONITORID);
            $criteria->addSelectColumn(MonitorPeer::DEVICEID);
            $criteria->addSelectColumn(MonitorPeer::PLUGINID);
            $criteria->addSelectColumn(MonitorPeer::ADAPTERID);
            $criteria->addSelectColumn(MonitorPeer::SNMPPROPERTYID);
        } else {
            $criteria->addSelectColumn($alias . '.MonitorId');
            $criteria->addSelectColumn($alias . '.DeviceId');
            $criteria->addSelectColumn($alias . '.PluginId');
            $criteria->addSelectColumn($alias . '.AdapterId');
            $criteria->addSelectColumn($alias . '.SnmpPropertyId');
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
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MonitorPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Monitor
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MonitorPeer::doSelect($critcopy, $con);
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
        return MonitorPeer::populateObjects(MonitorPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MonitorPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

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
     * @param      Monitor $obj A Monitor object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getMonitorid(), (string) $obj->getDeviceid(), (string) $obj->getPluginid(), (string) $obj->getAdapterid(), (string) $obj->getSnmppropertyid()));
            } // if key === null
            MonitorPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Monitor object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Monitor) {
                $key = serialize(array((string) $value->getMonitorid(), (string) $value->getDeviceid(), (string) $value->getPluginid(), (string) $value->getAdapterid(), (string) $value->getSnmppropertyid()));
            } elseif (is_array($value) && count($value) === 5) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1], (string) $value[2], (string) $value[3], (string) $value[4]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Monitor object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MonitorPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Monitor Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MonitorPeer::$instances[$key])) {
                return MonitorPeer::$instances[$key];
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
        foreach (MonitorPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        MonitorPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Monitor
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
        if ($row[$startcol] === null && $row[$startcol + 1] === null && $row[$startcol + 2] === null && $row[$startcol + 3] === null && $row[$startcol + 4] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1], (string) $row[$startcol + 2], (string) $row[$startcol + 3], (string) $row[$startcol + 4]));
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

        return array((int) $row[$startcol], (int) $row[$startcol + 1], (int) $row[$startcol + 2], (int) $row[$startcol + 3], (int) $row[$startcol + 4]);
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
        $cls = MonitorPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MonitorPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MonitorPeer::addInstanceToPool($obj, $key);
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
     * @return array (Monitor object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MonitorPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MonitorPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MonitorPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MonitorPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MonitorPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

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
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Adapter table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAdapter(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SnmpProperty table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSnmpProperty(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);

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
     * Selects a collection of Monitor objects pre-filled with their Device objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDevice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol = MonitorPeer::NUM_HYDRATE_COLUMNS;
        DevicePeer::addSelectColumns($criteria);

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Monitor) to $obj2 (Device)
                $obj2->addDeviceMonitor($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Monitor objects pre-filled with their Plugin objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPlugin(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol = MonitorPeer::NUM_HYDRATE_COLUMNS;
        PluginPeer::addSelectColumns($criteria);

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Monitor) to $obj2 (Plugin)
                $obj2->addPluginMonitor($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Monitor objects pre-filled with their Adapter objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAdapter(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol = MonitorPeer::NUM_HYDRATE_COLUMNS;
        AdapterPeer::addSelectColumns($criteria);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AdapterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AdapterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AdapterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AdapterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Monitor) to $obj2 (Adapter)
                $obj2->addAdapterMonitor($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Monitor objects pre-filled with their SnmpProperty objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSnmpProperty(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol = MonitorPeer::NUM_HYDRATE_COLUMNS;
        SnmpPropertyPeer::addSelectColumns($criteria);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SnmpPropertyPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SnmpPropertyPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SnmpPropertyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SnmpPropertyPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Monitor) to $obj2 (SnmpProperty)
                $obj2->addSnmpPropertyMonitor($obj1);

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
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);

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
     * Selects a collection of Monitor objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol2 = MonitorPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PluginPeer::NUM_HYDRATE_COLUMNS;

        AdapterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + AdapterPeer::NUM_HYDRATE_COLUMNS;

        SnmpPropertyPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SnmpPropertyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Monitor) to the collection in $obj2 (Device)
                $obj2->addDeviceMonitor($obj1);
            } // if joined row not null

            // Add objects for joined Plugin rows

            $key3 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PluginPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PluginPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PluginPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Monitor) to the collection in $obj3 (Plugin)
                $obj3->addPluginMonitor($obj1);
            } // if joined row not null

            // Add objects for joined Adapter rows

            $key4 = AdapterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = AdapterPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = AdapterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    AdapterPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Monitor) to the collection in $obj4 (Adapter)
                $obj4->addAdapterMonitor($obj1);
            } // if joined row not null

            // Add objects for joined SnmpProperty rows

            $key5 = SnmpPropertyPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = SnmpPropertyPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = SnmpPropertyPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SnmpPropertyPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Monitor) to the collection in $obj5 (SnmpProperty)
                $obj5->addSnmpPropertyMonitor($obj1);
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
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);

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
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Adapter table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAdapter(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SnmpProperty table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSnmpProperty(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MonitorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

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
     * Selects a collection of Monitor objects pre-filled with all related objects except Device.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
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
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol2 = MonitorPeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PluginPeer::NUM_HYDRATE_COLUMNS;

        AdapterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + AdapterPeer::NUM_HYDRATE_COLUMNS;

        SnmpPropertyPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SnmpPropertyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Plugin rows

                $key2 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PluginPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = PluginPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PluginPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj2 (Plugin)
                $obj2->addPluginMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined Adapter rows

                $key3 = AdapterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = AdapterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = AdapterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    AdapterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj3 (Adapter)
                $obj3->addAdapterMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined SnmpProperty rows

                $key4 = SnmpPropertyPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SnmpPropertyPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = SnmpPropertyPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SnmpPropertyPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj4 (SnmpProperty)
                $obj4->addSnmpPropertyMonitor($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Monitor objects pre-filled with all related objects except Plugin.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
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
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol2 = MonitorPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        AdapterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + AdapterPeer::NUM_HYDRATE_COLUMNS;

        SnmpPropertyPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SnmpPropertyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Monitor) to the collection in $obj2 (Device)
                $obj2->addDeviceMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined Adapter rows

                $key3 = AdapterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = AdapterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = AdapterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    AdapterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj3 (Adapter)
                $obj3->addAdapterMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined SnmpProperty rows

                $key4 = SnmpPropertyPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SnmpPropertyPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = SnmpPropertyPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SnmpPropertyPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj4 (SnmpProperty)
                $obj4->addSnmpPropertyMonitor($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Monitor objects pre-filled with all related objects except Adapter.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAdapter(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol2 = MonitorPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PluginPeer::NUM_HYDRATE_COLUMNS;

        SnmpPropertyPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SnmpPropertyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::SNMPPROPERTYID, SnmpPropertyPeer::SNMPPROPERTYID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Monitor) to the collection in $obj2 (Device)
                $obj2->addDeviceMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined Plugin rows

                $key3 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PluginPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PluginPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PluginPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj3 (Plugin)
                $obj3->addPluginMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined SnmpProperty rows

                $key4 = SnmpPropertyPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SnmpPropertyPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = SnmpPropertyPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SnmpPropertyPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj4 (SnmpProperty)
                $obj4->addSnmpPropertyMonitor($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Monitor objects pre-filled with all related objects except SnmpProperty.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Monitor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSnmpProperty(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MonitorPeer::DATABASE_NAME);
        }

        MonitorPeer::addSelectColumns($criteria);
        $startcol2 = MonitorPeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        PluginPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PluginPeer::NUM_HYDRATE_COLUMNS;

        AdapterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + AdapterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MonitorPeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $criteria->addJoin(MonitorPeer::PLUGINID, PluginPeer::PLUGINID, $join_behavior);

        $criteria->addJoin(MonitorPeer::ADAPTERID, AdapterPeer::ADAPTERID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MonitorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MonitorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MonitorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MonitorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Monitor) to the collection in $obj2 (Device)
                $obj2->addDeviceMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined Plugin rows

                $key3 = PluginPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PluginPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PluginPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PluginPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj3 (Plugin)
                $obj3->addPluginMonitor($obj1);

            } // if joined row is not null

                // Add objects for joined Adapter rows

                $key4 = AdapterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = AdapterPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = AdapterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    AdapterPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Monitor) to the collection in $obj4 (Adapter)
                $obj4->addAdapterMonitor($obj1);

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
        return Propel::getDatabaseMap(MonitorPeer::DATABASE_NAME)->getTable(MonitorPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMonitorPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMonitorPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new MonitorTableMap());
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
        return MonitorPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Monitor or Criteria object.
     *
     * @param      mixed $values Criteria or Monitor object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Monitor object
        }

        if ($criteria->containsKey(MonitorPeer::MONITORID) && $criteria->keyContainsValue(MonitorPeer::MONITORID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MonitorPeer::MONITORID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Monitor or Criteria object.
     *
     * @param      mixed $values Criteria or Monitor object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MonitorPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MonitorPeer::MONITORID);
            $value = $criteria->remove(MonitorPeer::MONITORID);
            if ($value) {
                $selectCriteria->add(MonitorPeer::MONITORID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(MonitorPeer::DEVICEID);
            $value = $criteria->remove(MonitorPeer::DEVICEID);
            if ($value) {
                $selectCriteria->add(MonitorPeer::DEVICEID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(MonitorPeer::PLUGINID);
            $value = $criteria->remove(MonitorPeer::PLUGINID);
            if ($value) {
                $selectCriteria->add(MonitorPeer::PLUGINID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(MonitorPeer::ADAPTERID);
            $value = $criteria->remove(MonitorPeer::ADAPTERID);
            if ($value) {
                $selectCriteria->add(MonitorPeer::ADAPTERID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(MonitorPeer::SNMPPROPERTYID);
            $value = $criteria->remove(MonitorPeer::SNMPPROPERTYID);
            if ($value) {
                $selectCriteria->add(MonitorPeer::SNMPPROPERTYID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MonitorPeer::TABLE_NAME);
            }

        } else { // $values is Monitor object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Monitor table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(MonitorPeer::TABLE_NAME, $con, MonitorPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MonitorPeer::clearInstancePool();
            MonitorPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Monitor or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Monitor object or primary key or array of primary keys
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
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            MonitorPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Monitor) { // it's a model object
            // invalidate the cache for this single object
            MonitorPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MonitorPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(MonitorPeer::MONITORID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(MonitorPeer::DEVICEID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(MonitorPeer::PLUGINID, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(MonitorPeer::ADAPTERID, $value[3]));
                $criterion->addAnd($criteria->getNewCriterion(MonitorPeer::SNMPPROPERTYID, $value[4]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                MonitorPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(MonitorPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            MonitorPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Monitor object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Monitor $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MonitorPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MonitorPeer::TABLE_NAME);

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

        return BasePeer::doValidate(MonitorPeer::DATABASE_NAME, MonitorPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   int $monitorid
     * @param   int $deviceid
     * @param   int $pluginid
     * @param   int $adapterid
     * @param   int $snmppropertyid
     * @param      PropelPDO $con
     * @return   Monitor
     */
    public static function retrieveByPK($monitorid, $deviceid, $pluginid, $adapterid, $snmppropertyid, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $monitorid, (string) $deviceid, (string) $pluginid, (string) $adapterid, (string) $snmppropertyid));
         if (null !== ($obj = MonitorPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(MonitorPeer::DATABASE_NAME);
        $criteria->add(MonitorPeer::MONITORID, $monitorid);
        $criteria->add(MonitorPeer::DEVICEID, $deviceid);
        $criteria->add(MonitorPeer::PLUGINID, $pluginid);
        $criteria->add(MonitorPeer::ADAPTERID, $adapterid);
        $criteria->add(MonitorPeer::SNMPPROPERTYID, $snmppropertyid);
        $v = MonitorPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseMonitorPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMonitorPeer::buildTableMap();

