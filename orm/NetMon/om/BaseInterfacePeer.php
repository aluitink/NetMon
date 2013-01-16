<?php


/**
 * Base static class for performing query and update operations on the 'Interface' table.
 *
 *
 *
 * @package propel.generator.NetMon.om
 */
abstract class BaseInterfacePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'NetMon';

    /** the table name for this class */
    const TABLE_NAME = 'Interface';

    /** the related Propel class for this table */
    const OM_CLASS = 'Interface';

    /** the related TableMap class for this table */
    const TM_CLASS = 'InterfaceTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the InterfaceId field */
    const INTERFACEID = 'Interface.InterfaceId';

    /** the column name for the InterfaceTypeId field */
    const INTERFACETYPEID = 'Interface.InterfaceTypeId';

    /** the column name for the DeviceId field */
    const DEVICEID = 'Interface.DeviceId';

    /** the column name for the Name field */
    const NAME = 'Interface.Name';

    /** the column name for the Instance field */
    const INSTANCE = 'Interface.Instance';

    /** the column name for the IpAddress field */
    const IPADDRESS = 'Interface.IpAddress';

    /** the column name for the Netmask field */
    const NETMASK = 'Interface.Netmask';

    /** the column name for the MacAddress field */
    const MACADDRESS = 'Interface.MacAddress';

    /** the column name for the Speed field */
    const SPEED = 'Interface.Speed';

    /** the column name for the AdministrativeStatus field */
    const ADMINISTRATIVESTATUS = 'Interface.AdministrativeStatus';

    /** the column name for the OperationalStatus field */
    const OPERATIONALSTATUS = 'Interface.OperationalStatus';

    /** the column name for the Modified field */
    const MODIFIED = 'Interface.Modified';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Interface objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Interface[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. InterfacePeer::$fieldNames[InterfacePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Interfaceid', 'Interfacetypeid', 'Deviceid', 'Name', 'Instance', 'Ipaddress', 'Netmask', 'Macaddress', 'Speed', 'Administrativestatus', 'Operationalstatus', 'Modified', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('interfaceid', 'interfacetypeid', 'deviceid', 'name', 'instance', 'ipaddress', 'netmask', 'macaddress', 'speed', 'administrativestatus', 'operationalstatus', 'modified', ),
        BasePeer::TYPE_COLNAME => array (InterfacePeer::INTERFACEID, InterfacePeer::INTERFACETYPEID, InterfacePeer::DEVICEID, InterfacePeer::NAME, InterfacePeer::INSTANCE, InterfacePeer::IPADDRESS, InterfacePeer::NETMASK, InterfacePeer::MACADDRESS, InterfacePeer::SPEED, InterfacePeer::ADMINISTRATIVESTATUS, InterfacePeer::OPERATIONALSTATUS, InterfacePeer::MODIFIED, ),
        BasePeer::TYPE_RAW_COLNAME => array ('INTERFACEID', 'INTERFACETYPEID', 'DEVICEID', 'NAME', 'INSTANCE', 'IPADDRESS', 'NETMASK', 'MACADDRESS', 'SPEED', 'ADMINISTRATIVESTATUS', 'OPERATIONALSTATUS', 'MODIFIED', ),
        BasePeer::TYPE_FIELDNAME => array ('InterfaceId', 'InterfaceTypeId', 'DeviceId', 'Name', 'Instance', 'IpAddress', 'Netmask', 'MacAddress', 'Speed', 'AdministrativeStatus', 'OperationalStatus', 'Modified', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. InterfacePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Interfaceid' => 0, 'Interfacetypeid' => 1, 'Deviceid' => 2, 'Name' => 3, 'Instance' => 4, 'Ipaddress' => 5, 'Netmask' => 6, 'Macaddress' => 7, 'Speed' => 8, 'Administrativestatus' => 9, 'Operationalstatus' => 10, 'Modified' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('interfaceid' => 0, 'interfacetypeid' => 1, 'deviceid' => 2, 'name' => 3, 'instance' => 4, 'ipaddress' => 5, 'netmask' => 6, 'macaddress' => 7, 'speed' => 8, 'administrativestatus' => 9, 'operationalstatus' => 10, 'modified' => 11, ),
        BasePeer::TYPE_COLNAME => array (InterfacePeer::INTERFACEID => 0, InterfacePeer::INTERFACETYPEID => 1, InterfacePeer::DEVICEID => 2, InterfacePeer::NAME => 3, InterfacePeer::INSTANCE => 4, InterfacePeer::IPADDRESS => 5, InterfacePeer::NETMASK => 6, InterfacePeer::MACADDRESS => 7, InterfacePeer::SPEED => 8, InterfacePeer::ADMINISTRATIVESTATUS => 9, InterfacePeer::OPERATIONALSTATUS => 10, InterfacePeer::MODIFIED => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('INTERFACEID' => 0, 'INTERFACETYPEID' => 1, 'DEVICEID' => 2, 'NAME' => 3, 'INSTANCE' => 4, 'IPADDRESS' => 5, 'NETMASK' => 6, 'MACADDRESS' => 7, 'SPEED' => 8, 'ADMINISTRATIVESTATUS' => 9, 'OPERATIONALSTATUS' => 10, 'MODIFIED' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('InterfaceId' => 0, 'InterfaceTypeId' => 1, 'DeviceId' => 2, 'Name' => 3, 'Instance' => 4, 'IpAddress' => 5, 'Netmask' => 6, 'MacAddress' => 7, 'Speed' => 8, 'AdministrativeStatus' => 9, 'OperationalStatus' => 10, 'Modified' => 11, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $toNames = InterfacePeer::getFieldNames($toType);
        $key = isset(InterfacePeer::$fieldKeys[$fromType][$name]) ? InterfacePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(InterfacePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, InterfacePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return InterfacePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. InterfacePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(InterfacePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(InterfacePeer::INTERFACEID);
            $criteria->addSelectColumn(InterfacePeer::INTERFACETYPEID);
            $criteria->addSelectColumn(InterfacePeer::DEVICEID);
            $criteria->addSelectColumn(InterfacePeer::NAME);
            $criteria->addSelectColumn(InterfacePeer::INSTANCE);
            $criteria->addSelectColumn(InterfacePeer::IPADDRESS);
            $criteria->addSelectColumn(InterfacePeer::NETMASK);
            $criteria->addSelectColumn(InterfacePeer::MACADDRESS);
            $criteria->addSelectColumn(InterfacePeer::SPEED);
            $criteria->addSelectColumn(InterfacePeer::ADMINISTRATIVESTATUS);
            $criteria->addSelectColumn(InterfacePeer::OPERATIONALSTATUS);
            $criteria->addSelectColumn(InterfacePeer::MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.InterfaceId');
            $criteria->addSelectColumn($alias . '.InterfaceTypeId');
            $criteria->addSelectColumn($alias . '.DeviceId');
            $criteria->addSelectColumn($alias . '.Name');
            $criteria->addSelectColumn($alias . '.Instance');
            $criteria->addSelectColumn($alias . '.IpAddress');
            $criteria->addSelectColumn($alias . '.Netmask');
            $criteria->addSelectColumn($alias . '.MacAddress');
            $criteria->addSelectColumn($alias . '.Speed');
            $criteria->addSelectColumn($alias . '.AdministrativeStatus');
            $criteria->addSelectColumn($alias . '.OperationalStatus');
            $criteria->addSelectColumn($alias . '.Modified');
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
        $criteria->setPrimaryTableName(InterfacePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            InterfacePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(InterfacePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Interface
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = InterfacePeer::doSelect($critcopy, $con);
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
        return InterfacePeer::populateObjects(InterfacePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            InterfacePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

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
     * @param      Interface $obj A Interface object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getInterfaceid();
            } // if key === null
            InterfacePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Interface object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Interface) {
                $key = (string) $value->getInterfaceid();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Interface object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(InterfacePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Interface Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(InterfacePeer::$instances[$key])) {
                return InterfacePeer::$instances[$key];
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
        foreach (InterfacePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        InterfacePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to Interface
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
        $cls = InterfacePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = InterfacePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = InterfacePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InterfacePeer::addInstanceToPool($obj, $key);
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
     * @return array (Interface object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = InterfacePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = InterfacePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + InterfacePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InterfacePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            InterfacePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related InterfaceType table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinInterfaceType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(InterfacePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            InterfacePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(InterfacePeer::INTERFACETYPEID, InterfaceTypePeer::INTERFACETYPEID, $join_behavior);

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
        $criteria->setPrimaryTableName(InterfacePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            InterfacePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(InterfacePeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

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
     * Selects a collection of Interface objects pre-filled with their InterfaceType objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Interface objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinInterfaceType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(InterfacePeer::DATABASE_NAME);
        }

        InterfacePeer::addSelectColumns($criteria);
        $startcol = InterfacePeer::NUM_HYDRATE_COLUMNS;
        InterfaceTypePeer::addSelectColumns($criteria);

        $criteria->addJoin(InterfacePeer::INTERFACETYPEID, InterfaceTypePeer::INTERFACETYPEID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = InterfacePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = InterfacePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = InterfacePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                InterfacePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = InterfaceTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = InterfaceTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = InterfaceTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    InterfaceTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Interface) to $obj2 (InterfaceType)
                $obj2->addInterfaceInterfaceType($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Interface objects pre-filled with their Device objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Interface objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDevice(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(InterfacePeer::DATABASE_NAME);
        }

        InterfacePeer::addSelectColumns($criteria);
        $startcol = InterfacePeer::NUM_HYDRATE_COLUMNS;
        DevicePeer::addSelectColumns($criteria);

        $criteria->addJoin(InterfacePeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = InterfacePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = InterfacePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = InterfacePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                InterfacePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Interface) to $obj2 (Device)
                $obj2->addDeviceInterface($obj1);

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
        $criteria->setPrimaryTableName(InterfacePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            InterfacePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(InterfacePeer::INTERFACETYPEID, InterfaceTypePeer::INTERFACETYPEID, $join_behavior);

        $criteria->addJoin(InterfacePeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

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
     * Selects a collection of Interface objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Interface objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(InterfacePeer::DATABASE_NAME);
        }

        InterfacePeer::addSelectColumns($criteria);
        $startcol2 = InterfacePeer::NUM_HYDRATE_COLUMNS;

        InterfaceTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + InterfaceTypePeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + DevicePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(InterfacePeer::INTERFACETYPEID, InterfaceTypePeer::INTERFACETYPEID, $join_behavior);

        $criteria->addJoin(InterfacePeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = InterfacePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = InterfacePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = InterfacePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                InterfacePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined InterfaceType rows

            $key2 = InterfaceTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = InterfaceTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = InterfaceTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    InterfaceTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Interface) to the collection in $obj2 (InterfaceType)
                $obj2->addInterfaceInterfaceType($obj1);
            } // if joined row not null

            // Add objects for joined Device rows

            $key3 = DevicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = DevicePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = DevicePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    DevicePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Interface) to the collection in $obj3 (Device)
                $obj3->addDeviceInterface($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related InterfaceType table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptInterfaceType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(InterfacePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            InterfacePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(InterfacePeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);

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
        $criteria->setPrimaryTableName(InterfacePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            InterfacePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(InterfacePeer::INTERFACETYPEID, InterfaceTypePeer::INTERFACETYPEID, $join_behavior);

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
     * Selects a collection of Interface objects pre-filled with all related objects except InterfaceType.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Interface objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptInterfaceType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(InterfacePeer::DATABASE_NAME);
        }

        InterfacePeer::addSelectColumns($criteria);
        $startcol2 = InterfacePeer::NUM_HYDRATE_COLUMNS;

        DevicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DevicePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(InterfacePeer::DEVICEID, DevicePeer::DEVICEID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = InterfacePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = InterfacePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = InterfacePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                InterfacePeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Interface) to the collection in $obj2 (Device)
                $obj2->addDeviceInterface($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Interface objects pre-filled with all related objects except Device.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Interface objects.
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
            $criteria->setDbName(InterfacePeer::DATABASE_NAME);
        }

        InterfacePeer::addSelectColumns($criteria);
        $startcol2 = InterfacePeer::NUM_HYDRATE_COLUMNS;

        InterfaceTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + InterfaceTypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(InterfacePeer::INTERFACETYPEID, InterfaceTypePeer::INTERFACETYPEID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = InterfacePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = InterfacePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = InterfacePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                InterfacePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined InterfaceType rows

                $key2 = InterfaceTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = InterfaceTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = InterfaceTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    InterfaceTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Interface) to the collection in $obj2 (InterfaceType)
                $obj2->addInterfaceInterfaceType($obj1);

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
        return Propel::getDatabaseMap(InterfacePeer::DATABASE_NAME)->getTable(InterfacePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseInterfacePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseInterfacePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new InterfaceTableMap());
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
        return InterfacePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Interface or Criteria object.
     *
     * @param      mixed $values Criteria or Interface object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Interface object
        }

        if ($criteria->containsKey(InterfacePeer::INTERFACEID) && $criteria->keyContainsValue(InterfacePeer::INTERFACEID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.InterfacePeer::INTERFACEID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Interface or Criteria object.
     *
     * @param      mixed $values Criteria or Interface object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(InterfacePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(InterfacePeer::INTERFACEID);
            $value = $criteria->remove(InterfacePeer::INTERFACEID);
            if ($value) {
                $selectCriteria->add(InterfacePeer::INTERFACEID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(InterfacePeer::TABLE_NAME);
            }

        } else { // $values is Interface object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the Interface table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(InterfacePeer::TABLE_NAME, $con, InterfacePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InterfacePeer::clearInstancePool();
            InterfacePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Interface or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Interface object or primary key or array of primary keys
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
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            InterfacePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Interface) { // it's a model object
            // invalidate the cache for this single object
            InterfacePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InterfacePeer::DATABASE_NAME);
            $criteria->add(InterfacePeer::INTERFACEID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                InterfacePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(InterfacePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            InterfacePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Interface object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Interface $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(InterfacePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(InterfacePeer::TABLE_NAME);

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

        return BasePeer::doValidate(InterfacePeer::DATABASE_NAME, InterfacePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Interface
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = InterfacePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(InterfacePeer::DATABASE_NAME);
        $criteria->add(InterfacePeer::INTERFACEID, $pk);

        $v = InterfacePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Interface[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(InterfacePeer::DATABASE_NAME);
            $criteria->add(InterfacePeer::INTERFACEID, $pks, Criteria::IN);
            $objs = InterfacePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseInterfacePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseInterfacePeer::buildTableMap();

