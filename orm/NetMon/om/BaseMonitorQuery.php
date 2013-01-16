<?php


/**
 * Base class that represents a query for the 'Monitor' table.
 *
 *
 *
 * @method MonitorQuery orderByMonitorid($order = Criteria::ASC) Order by the MonitorId column
 * @method MonitorQuery orderByDeviceid($order = Criteria::ASC) Order by the DeviceId column
 * @method MonitorQuery orderByPluginid($order = Criteria::ASC) Order by the PluginId column
 * @method MonitorQuery orderByAdapterid($order = Criteria::ASC) Order by the AdapterId column
 * @method MonitorQuery orderBySnmppropertyid($order = Criteria::ASC) Order by the SnmpPropertyId column
 *
 * @method MonitorQuery groupByMonitorid() Group by the MonitorId column
 * @method MonitorQuery groupByDeviceid() Group by the DeviceId column
 * @method MonitorQuery groupByPluginid() Group by the PluginId column
 * @method MonitorQuery groupByAdapterid() Group by the AdapterId column
 * @method MonitorQuery groupBySnmppropertyid() Group by the SnmpPropertyId column
 *
 * @method MonitorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MonitorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MonitorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MonitorQuery leftJoinDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Device relation
 * @method MonitorQuery rightJoinDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Device relation
 * @method MonitorQuery innerJoinDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the Device relation
 *
 * @method MonitorQuery leftJoinPlugin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Plugin relation
 * @method MonitorQuery rightJoinPlugin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Plugin relation
 * @method MonitorQuery innerJoinPlugin($relationAlias = null) Adds a INNER JOIN clause to the query using the Plugin relation
 *
 * @method MonitorQuery leftJoinAdapter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Adapter relation
 * @method MonitorQuery rightJoinAdapter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Adapter relation
 * @method MonitorQuery innerJoinAdapter($relationAlias = null) Adds a INNER JOIN clause to the query using the Adapter relation
 *
 * @method MonitorQuery leftJoinSnmpProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the SnmpProperty relation
 * @method MonitorQuery rightJoinSnmpProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SnmpProperty relation
 * @method MonitorQuery innerJoinSnmpProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the SnmpProperty relation
 *
 * @method Monitor findOne(PropelPDO $con = null) Return the first Monitor matching the query
 * @method Monitor findOneOrCreate(PropelPDO $con = null) Return the first Monitor matching the query, or a new Monitor object populated from the query conditions when no match is found
 *
 * @method Monitor findOneByMonitorid(int $MonitorId) Return the first Monitor filtered by the MonitorId column
 * @method Monitor findOneByDeviceid(int $DeviceId) Return the first Monitor filtered by the DeviceId column
 * @method Monitor findOneByPluginid(int $PluginId) Return the first Monitor filtered by the PluginId column
 * @method Monitor findOneByAdapterid(int $AdapterId) Return the first Monitor filtered by the AdapterId column
 * @method Monitor findOneBySnmppropertyid(int $SnmpPropertyId) Return the first Monitor filtered by the SnmpPropertyId column
 *
 * @method array findByMonitorid(int $MonitorId) Return Monitor objects filtered by the MonitorId column
 * @method array findByDeviceid(int $DeviceId) Return Monitor objects filtered by the DeviceId column
 * @method array findByPluginid(int $PluginId) Return Monitor objects filtered by the PluginId column
 * @method array findByAdapterid(int $AdapterId) Return Monitor objects filtered by the AdapterId column
 * @method array findBySnmppropertyid(int $SnmpPropertyId) Return Monitor objects filtered by the SnmpPropertyId column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseMonitorQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMonitorQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Monitor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MonitorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MonitorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MonitorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MonitorQuery) {
            return $criteria;
        }
        $query = new MonitorQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34, 56, 78, 91), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$MonitorId, $DeviceId, $PluginId, $AdapterId, $SnmpPropertyId]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Monitor|Monitor[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MonitorPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2], (string) $key[3], (string) $key[4]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MonitorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Monitor A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `MonitorId`, `DeviceId`, `PluginId`, `AdapterId`, `SnmpPropertyId` FROM `Monitor` WHERE `MonitorId` = :p0 AND `DeviceId` = :p1 AND `PluginId` = :p2 AND `AdapterId` = :p3 AND `SnmpPropertyId` = :p4';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_INT);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Monitor();
            $obj->hydrate($row);
            MonitorPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2], (string) $key[3], (string) $key[4])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Monitor|Monitor[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Monitor[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MonitorPeer::MONITORID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MonitorPeer::DEVICEID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(MonitorPeer::PLUGINID, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(MonitorPeer::ADAPTERID, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(MonitorPeer::SNMPPROPERTYID, $key[4], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MonitorPeer::MONITORID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MonitorPeer::DEVICEID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(MonitorPeer::PLUGINID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(MonitorPeer::ADAPTERID, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(MonitorPeer::SNMPPROPERTYID, $key[4], Criteria::EQUAL);
            $cton0->addAnd($cton4);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the MonitorId column
     *
     * Example usage:
     * <code>
     * $query->filterByMonitorid(1234); // WHERE MonitorId = 1234
     * $query->filterByMonitorid(array(12, 34)); // WHERE MonitorId IN (12, 34)
     * $query->filterByMonitorid(array('min' => 12)); // WHERE MonitorId >= 12
     * $query->filterByMonitorid(array('max' => 12)); // WHERE MonitorId <= 12
     * </code>
     *
     * @param     mixed $monitorid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function filterByMonitorid($monitorid = null, $comparison = null)
    {
        if (is_array($monitorid)) {
            $useMinMax = false;
            if (isset($monitorid['min'])) {
                $this->addUsingAlias(MonitorPeer::MONITORID, $monitorid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monitorid['max'])) {
                $this->addUsingAlias(MonitorPeer::MONITORID, $monitorid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MonitorPeer::MONITORID, $monitorid, $comparison);
    }

    /**
     * Filter the query on the DeviceId column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceid(1234); // WHERE DeviceId = 1234
     * $query->filterByDeviceid(array(12, 34)); // WHERE DeviceId IN (12, 34)
     * $query->filterByDeviceid(array('min' => 12)); // WHERE DeviceId >= 12
     * $query->filterByDeviceid(array('max' => 12)); // WHERE DeviceId <= 12
     * </code>
     *
     * @see       filterByDevice()
     *
     * @param     mixed $deviceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function filterByDeviceid($deviceid = null, $comparison = null)
    {
        if (is_array($deviceid)) {
            $useMinMax = false;
            if (isset($deviceid['min'])) {
                $this->addUsingAlias(MonitorPeer::DEVICEID, $deviceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceid['max'])) {
                $this->addUsingAlias(MonitorPeer::DEVICEID, $deviceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MonitorPeer::DEVICEID, $deviceid, $comparison);
    }

    /**
     * Filter the query on the PluginId column
     *
     * Example usage:
     * <code>
     * $query->filterByPluginid(1234); // WHERE PluginId = 1234
     * $query->filterByPluginid(array(12, 34)); // WHERE PluginId IN (12, 34)
     * $query->filterByPluginid(array('min' => 12)); // WHERE PluginId >= 12
     * $query->filterByPluginid(array('max' => 12)); // WHERE PluginId <= 12
     * </code>
     *
     * @see       filterByPlugin()
     *
     * @param     mixed $pluginid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function filterByPluginid($pluginid = null, $comparison = null)
    {
        if (is_array($pluginid)) {
            $useMinMax = false;
            if (isset($pluginid['min'])) {
                $this->addUsingAlias(MonitorPeer::PLUGINID, $pluginid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginid['max'])) {
                $this->addUsingAlias(MonitorPeer::PLUGINID, $pluginid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MonitorPeer::PLUGINID, $pluginid, $comparison);
    }

    /**
     * Filter the query on the AdapterId column
     *
     * Example usage:
     * <code>
     * $query->filterByAdapterid(1234); // WHERE AdapterId = 1234
     * $query->filterByAdapterid(array(12, 34)); // WHERE AdapterId IN (12, 34)
     * $query->filterByAdapterid(array('min' => 12)); // WHERE AdapterId >= 12
     * $query->filterByAdapterid(array('max' => 12)); // WHERE AdapterId <= 12
     * </code>
     *
     * @see       filterByAdapter()
     *
     * @param     mixed $adapterid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function filterByAdapterid($adapterid = null, $comparison = null)
    {
        if (is_array($adapterid)) {
            $useMinMax = false;
            if (isset($adapterid['min'])) {
                $this->addUsingAlias(MonitorPeer::ADAPTERID, $adapterid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adapterid['max'])) {
                $this->addUsingAlias(MonitorPeer::ADAPTERID, $adapterid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MonitorPeer::ADAPTERID, $adapterid, $comparison);
    }

    /**
     * Filter the query on the SnmpPropertyId column
     *
     * Example usage:
     * <code>
     * $query->filterBySnmppropertyid(1234); // WHERE SnmpPropertyId = 1234
     * $query->filterBySnmppropertyid(array(12, 34)); // WHERE SnmpPropertyId IN (12, 34)
     * $query->filterBySnmppropertyid(array('min' => 12)); // WHERE SnmpPropertyId >= 12
     * $query->filterBySnmppropertyid(array('max' => 12)); // WHERE SnmpPropertyId <= 12
     * </code>
     *
     * @see       filterBySnmpProperty()
     *
     * @param     mixed $snmppropertyid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function filterBySnmppropertyid($snmppropertyid = null, $comparison = null)
    {
        if (is_array($snmppropertyid)) {
            $useMinMax = false;
            if (isset($snmppropertyid['min'])) {
                $this->addUsingAlias(MonitorPeer::SNMPPROPERTYID, $snmppropertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snmppropertyid['max'])) {
                $this->addUsingAlias(MonitorPeer::SNMPPROPERTYID, $snmppropertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MonitorPeer::SNMPPROPERTYID, $snmppropertyid, $comparison);
    }

    /**
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MonitorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(MonitorPeer::DEVICEID, $device->getDeviceid(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MonitorPeer::DEVICEID, $device->toKeyValue('PrimaryKey', 'Deviceid'), $comparison);
        } else {
            throw new PropelException('filterByDevice() only accepts arguments of type Device or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Device relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function joinDevice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Device');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Device');
        }

        return $this;
    }

    /**
     * Use the Device relation Device object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeviceQuery A secondary query class using the current class as primary query
     */
    public function useDeviceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDevice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Device', 'DeviceQuery');
    }

    /**
     * Filter the query by a related Plugin object
     *
     * @param   Plugin|PropelObjectCollection $plugin The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MonitorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPlugin($plugin, $comparison = null)
    {
        if ($plugin instanceof Plugin) {
            return $this
                ->addUsingAlias(MonitorPeer::PLUGINID, $plugin->getPluginid(), $comparison);
        } elseif ($plugin instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MonitorPeer::PLUGINID, $plugin->toKeyValue('PrimaryKey', 'Pluginid'), $comparison);
        } else {
            throw new PropelException('filterByPlugin() only accepts arguments of type Plugin or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Plugin relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function joinPlugin($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Plugin');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Plugin');
        }

        return $this;
    }

    /**
     * Use the Plugin relation Plugin object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PluginQuery A secondary query class using the current class as primary query
     */
    public function usePluginQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPlugin($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Plugin', 'PluginQuery');
    }

    /**
     * Filter the query by a related Adapter object
     *
     * @param   Adapter|PropelObjectCollection $adapter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MonitorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapter($adapter, $comparison = null)
    {
        if ($adapter instanceof Adapter) {
            return $this
                ->addUsingAlias(MonitorPeer::ADAPTERID, $adapter->getAdapterid(), $comparison);
        } elseif ($adapter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MonitorPeer::ADAPTERID, $adapter->toKeyValue('PrimaryKey', 'Adapterid'), $comparison);
        } else {
            throw new PropelException('filterByAdapter() only accepts arguments of type Adapter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Adapter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function joinAdapter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Adapter');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Adapter');
        }

        return $this;
    }

    /**
     * Use the Adapter relation Adapter object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdapterQuery A secondary query class using the current class as primary query
     */
    public function useAdapterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdapter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Adapter', 'AdapterQuery');
    }

    /**
     * Filter the query by a related SnmpProperty object
     *
     * @param   SnmpProperty|PropelObjectCollection $snmpProperty The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MonitorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySnmpProperty($snmpProperty, $comparison = null)
    {
        if ($snmpProperty instanceof SnmpProperty) {
            return $this
                ->addUsingAlias(MonitorPeer::SNMPPROPERTYID, $snmpProperty->getSnmppropertyid(), $comparison);
        } elseif ($snmpProperty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MonitorPeer::SNMPPROPERTYID, $snmpProperty->toKeyValue('PrimaryKey', 'Snmppropertyid'), $comparison);
        } else {
            throw new PropelException('filterBySnmpProperty() only accepts arguments of type SnmpProperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SnmpProperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function joinSnmpProperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SnmpProperty');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SnmpProperty');
        }

        return $this;
    }

    /**
     * Use the SnmpProperty relation SnmpProperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SnmpPropertyQuery A secondary query class using the current class as primary query
     */
    public function useSnmpPropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSnmpProperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SnmpProperty', 'SnmpPropertyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Monitor $monitor Object to remove from the list of results
     *
     * @return MonitorQuery The current query, for fluid interface
     */
    public function prune($monitor = null)
    {
        if ($monitor) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MonitorPeer::MONITORID), $monitor->getMonitorid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MonitorPeer::DEVICEID), $monitor->getDeviceid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(MonitorPeer::PLUGINID), $monitor->getPluginid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(MonitorPeer::ADAPTERID), $monitor->getAdapterid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(MonitorPeer::SNMPPROPERTYID), $monitor->getSnmppropertyid(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
