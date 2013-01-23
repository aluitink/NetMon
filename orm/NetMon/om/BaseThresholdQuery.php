<?php


/**
 * Base class that represents a query for the 'Threshold' table.
 *
 *
 *
 * @method ThresholdQuery orderByThresholdid($order = Criteria::ASC) Order by the ThresholdId column
 * @method ThresholdQuery orderByPluginid($order = Criteria::ASC) Order by the PluginId column
 * @method ThresholdQuery orderByMonitorid($order = Criteria::ASC) Order by the MonitorId column
 * @method ThresholdQuery orderByGreaterthan($order = Criteria::ASC) Order by the GreaterThan column
 * @method ThresholdQuery orderByValue($order = Criteria::ASC) Order by the Value column
 *
 * @method ThresholdQuery groupByThresholdid() Group by the ThresholdId column
 * @method ThresholdQuery groupByPluginid() Group by the PluginId column
 * @method ThresholdQuery groupByMonitorid() Group by the MonitorId column
 * @method ThresholdQuery groupByGreaterthan() Group by the GreaterThan column
 * @method ThresholdQuery groupByValue() Group by the Value column
 *
 * @method ThresholdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ThresholdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ThresholdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ThresholdQuery leftJoinPlugin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Plugin relation
 * @method ThresholdQuery rightJoinPlugin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Plugin relation
 * @method ThresholdQuery innerJoinPlugin($relationAlias = null) Adds a INNER JOIN clause to the query using the Plugin relation
 *
 * @method ThresholdQuery leftJoinMonitor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Monitor relation
 * @method ThresholdQuery rightJoinMonitor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Monitor relation
 * @method ThresholdQuery innerJoinMonitor($relationAlias = null) Adds a INNER JOIN clause to the query using the Monitor relation
 *
 * @method ThresholdQuery leftJoinAlarmThreshold($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlarmThreshold relation
 * @method ThresholdQuery rightJoinAlarmThreshold($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlarmThreshold relation
 * @method ThresholdQuery innerJoinAlarmThreshold($relationAlias = null) Adds a INNER JOIN clause to the query using the AlarmThreshold relation
 *
 * @method Threshold findOne(PropelPDO $con = null) Return the first Threshold matching the query
 * @method Threshold findOneOrCreate(PropelPDO $con = null) Return the first Threshold matching the query, or a new Threshold object populated from the query conditions when no match is found
 *
 * @method Threshold findOneByPluginid(int $PluginId) Return the first Threshold filtered by the PluginId column
 * @method Threshold findOneByMonitorid(int $MonitorId) Return the first Threshold filtered by the MonitorId column
 * @method Threshold findOneByGreaterthan(boolean $GreaterThan) Return the first Threshold filtered by the GreaterThan column
 * @method Threshold findOneByValue(int $Value) Return the first Threshold filtered by the Value column
 *
 * @method array findByThresholdid(int $ThresholdId) Return Threshold objects filtered by the ThresholdId column
 * @method array findByPluginid(int $PluginId) Return Threshold objects filtered by the PluginId column
 * @method array findByMonitorid(int $MonitorId) Return Threshold objects filtered by the MonitorId column
 * @method array findByGreaterthan(boolean $GreaterThan) Return Threshold objects filtered by the GreaterThan column
 * @method array findByValue(int $Value) Return Threshold objects filtered by the Value column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseThresholdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseThresholdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Threshold', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ThresholdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ThresholdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ThresholdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ThresholdQuery) {
            return $criteria;
        }
        $query = new ThresholdQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Threshold|Threshold[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ThresholdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ThresholdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Threshold A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByThresholdid($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Threshold A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ThresholdId`, `PluginId`, `MonitorId`, `GreaterThan`, `Value` FROM `Threshold` WHERE `ThresholdId` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Threshold();
            $obj->hydrate($row);
            ThresholdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Threshold|Threshold[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Threshold[]|mixed the list of results, formatted by the current formatter
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
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ThresholdPeer::THRESHOLDID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ThresholdPeer::THRESHOLDID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ThresholdId column
     *
     * Example usage:
     * <code>
     * $query->filterByThresholdid(1234); // WHERE ThresholdId = 1234
     * $query->filterByThresholdid(array(12, 34)); // WHERE ThresholdId IN (12, 34)
     * $query->filterByThresholdid(array('min' => 12)); // WHERE ThresholdId >= 12
     * $query->filterByThresholdid(array('max' => 12)); // WHERE ThresholdId <= 12
     * </code>
     *
     * @param     mixed $thresholdid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByThresholdid($thresholdid = null, $comparison = null)
    {
        if (is_array($thresholdid)) {
            $useMinMax = false;
            if (isset($thresholdid['min'])) {
                $this->addUsingAlias(ThresholdPeer::THRESHOLDID, $thresholdid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thresholdid['max'])) {
                $this->addUsingAlias(ThresholdPeer::THRESHOLDID, $thresholdid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::THRESHOLDID, $thresholdid, $comparison);
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
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByPluginid($pluginid = null, $comparison = null)
    {
        if (is_array($pluginid)) {
            $useMinMax = false;
            if (isset($pluginid['min'])) {
                $this->addUsingAlias(ThresholdPeer::PLUGINID, $pluginid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginid['max'])) {
                $this->addUsingAlias(ThresholdPeer::PLUGINID, $pluginid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::PLUGINID, $pluginid, $comparison);
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
     * @see       filterByMonitor()
     *
     * @param     mixed $monitorid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByMonitorid($monitorid = null, $comparison = null)
    {
        if (is_array($monitorid)) {
            $useMinMax = false;
            if (isset($monitorid['min'])) {
                $this->addUsingAlias(ThresholdPeer::MONITORID, $monitorid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monitorid['max'])) {
                $this->addUsingAlias(ThresholdPeer::MONITORID, $monitorid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::MONITORID, $monitorid, $comparison);
    }

    /**
     * Filter the query on the GreaterThan column
     *
     * Example usage:
     * <code>
     * $query->filterByGreaterthan(true); // WHERE GreaterThan = true
     * $query->filterByGreaterthan('yes'); // WHERE GreaterThan = true
     * </code>
     *
     * @param     boolean|string $greaterthan The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByGreaterthan($greaterthan = null, $comparison = null)
    {
        if (is_string($greaterthan)) {
            $greaterthan = in_array(strtolower($greaterthan), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ThresholdPeer::GREATERTHAN, $greaterthan, $comparison);
    }

    /**
     * Filter the query on the Value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE Value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE Value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE Value >= 12
     * $query->filterByValue(array('max' => 12)); // WHERE Value <= 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(ThresholdPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(ThresholdPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Plugin object
     *
     * @param   Plugin|PropelObjectCollection $plugin The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ThresholdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPlugin($plugin, $comparison = null)
    {
        if ($plugin instanceof Plugin) {
            return $this
                ->addUsingAlias(ThresholdPeer::PLUGINID, $plugin->getPluginid(), $comparison);
        } elseif ($plugin instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ThresholdPeer::PLUGINID, $plugin->toKeyValue('PrimaryKey', 'Pluginid'), $comparison);
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
     * @return ThresholdQuery The current query, for fluid interface
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
     * Filter the query by a related Monitor object
     *
     * @param   Monitor|PropelObjectCollection $monitor The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ThresholdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMonitor($monitor, $comparison = null)
    {
        if ($monitor instanceof Monitor) {
            return $this
                ->addUsingAlias(ThresholdPeer::MONITORID, $monitor->getMonitorid(), $comparison);
        } elseif ($monitor instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ThresholdPeer::MONITORID, $monitor->toKeyValue('Monitorid', 'Monitorid'), $comparison);
        } else {
            throw new PropelException('filterByMonitor() only accepts arguments of type Monitor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Monitor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function joinMonitor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Monitor');

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
            $this->addJoinObject($join, 'Monitor');
        }

        return $this;
    }

    /**
     * Use the Monitor relation Monitor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MonitorQuery A secondary query class using the current class as primary query
     */
    public function useMonitorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMonitor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Monitor', 'MonitorQuery');
    }

    /**
     * Filter the query by a related Alarm object
     *
     * @param   Alarm|PropelObjectCollection $alarm  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ThresholdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlarmThreshold($alarm, $comparison = null)
    {
        if ($alarm instanceof Alarm) {
            return $this
                ->addUsingAlias(ThresholdPeer::THRESHOLDID, $alarm->getThresholdid(), $comparison);
        } elseif ($alarm instanceof PropelObjectCollection) {
            return $this
                ->useAlarmThresholdQuery()
                ->filterByPrimaryKeys($alarm->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlarmThreshold() only accepts arguments of type Alarm or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlarmThreshold relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function joinAlarmThreshold($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlarmThreshold');

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
            $this->addJoinObject($join, 'AlarmThreshold');
        }

        return $this;
    }

    /**
     * Use the AlarmThreshold relation Alarm object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AlarmQuery A secondary query class using the current class as primary query
     */
    public function useAlarmThresholdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlarmThreshold($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlarmThreshold', 'AlarmQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Threshold $threshold Object to remove from the list of results
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function prune($threshold = null)
    {
        if ($threshold) {
            $this->addUsingAlias(ThresholdPeer::THRESHOLDID, $threshold->getThresholdid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
