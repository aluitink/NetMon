<?php


/**
 * Base class that represents a query for the 'Poll' table.
 *
 *
 *
 * @method PollQuery orderByPollid($order = Criteria::ASC) Order by the PollId column
 * @method PollQuery orderByDeviceid($order = Criteria::ASC) Order by the DeviceId column
 * @method PollQuery orderBySnmppropertyid($order = Criteria::ASC) Order by the SnmpPropertyId column
 * @method PollQuery orderByPluginid($order = Criteria::ASC) Order by the PluginId column
 * @method PollQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method PollQuery orderByValue($order = Criteria::ASC) Order by the Value column
 *
 * @method PollQuery groupByPollid() Group by the PollId column
 * @method PollQuery groupByDeviceid() Group by the DeviceId column
 * @method PollQuery groupBySnmppropertyid() Group by the SnmpPropertyId column
 * @method PollQuery groupByPluginid() Group by the PluginId column
 * @method PollQuery groupByTimestamp() Group by the Timestamp column
 * @method PollQuery groupByValue() Group by the Value column
 *
 * @method PollQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PollQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PollQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PollQuery leftJoinDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Device relation
 * @method PollQuery rightJoinDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Device relation
 * @method PollQuery innerJoinDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the Device relation
 *
 * @method PollQuery leftJoinSnmpProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the SnmpProperty relation
 * @method PollQuery rightJoinSnmpProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SnmpProperty relation
 * @method PollQuery innerJoinSnmpProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the SnmpProperty relation
 *
 * @method PollQuery leftJoinPlugin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Plugin relation
 * @method PollQuery rightJoinPlugin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Plugin relation
 * @method PollQuery innerJoinPlugin($relationAlias = null) Adds a INNER JOIN clause to the query using the Plugin relation
 *
 * @method Poll findOne(PropelPDO $con = null) Return the first Poll matching the query
 * @method Poll findOneOrCreate(PropelPDO $con = null) Return the first Poll matching the query, or a new Poll object populated from the query conditions when no match is found
 *
 * @method Poll findOneByDeviceid(int $DeviceId) Return the first Poll filtered by the DeviceId column
 * @method Poll findOneBySnmppropertyid(int $SnmpPropertyId) Return the first Poll filtered by the SnmpPropertyId column
 * @method Poll findOneByPluginid(int $PluginId) Return the first Poll filtered by the PluginId column
 * @method Poll findOneByTimestamp(string $Timestamp) Return the first Poll filtered by the Timestamp column
 * @method Poll findOneByValue(string $Value) Return the first Poll filtered by the Value column
 *
 * @method array findByPollid(int $PollId) Return Poll objects filtered by the PollId column
 * @method array findByDeviceid(int $DeviceId) Return Poll objects filtered by the DeviceId column
 * @method array findBySnmppropertyid(int $SnmpPropertyId) Return Poll objects filtered by the SnmpPropertyId column
 * @method array findByPluginid(int $PluginId) Return Poll objects filtered by the PluginId column
 * @method array findByTimestamp(string $Timestamp) Return Poll objects filtered by the Timestamp column
 * @method array findByValue(string $Value) Return Poll objects filtered by the Value column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BasePollQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePollQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Poll', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PollQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PollQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PollQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PollQuery) {
            return $criteria;
        }
        $query = new PollQuery();
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
     * @return   Poll|Poll[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PollPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PollPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Poll A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPollid($key, $con = null)
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
     * @return                 Poll A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PollId`, `DeviceId`, `SnmpPropertyId`, `PluginId`, `Timestamp`, `Value` FROM `Poll` WHERE `PollId` = :p0';
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
            $obj = new Poll();
            $obj->hydrate($row);
            PollPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Poll|Poll[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Poll[]|mixed the list of results, formatted by the current formatter
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
     * @return PollQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PollPeer::POLLID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PollQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PollPeer::POLLID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the PollId column
     *
     * Example usage:
     * <code>
     * $query->filterByPollid(1234); // WHERE PollId = 1234
     * $query->filterByPollid(array(12, 34)); // WHERE PollId IN (12, 34)
     * $query->filterByPollid(array('min' => 12)); // WHERE PollId >= 12
     * $query->filterByPollid(array('max' => 12)); // WHERE PollId <= 12
     * </code>
     *
     * @param     mixed $pollid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PollQuery The current query, for fluid interface
     */
    public function filterByPollid($pollid = null, $comparison = null)
    {
        if (is_array($pollid)) {
            $useMinMax = false;
            if (isset($pollid['min'])) {
                $this->addUsingAlias(PollPeer::POLLID, $pollid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pollid['max'])) {
                $this->addUsingAlias(PollPeer::POLLID, $pollid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollPeer::POLLID, $pollid, $comparison);
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
     * @return PollQuery The current query, for fluid interface
     */
    public function filterByDeviceid($deviceid = null, $comparison = null)
    {
        if (is_array($deviceid)) {
            $useMinMax = false;
            if (isset($deviceid['min'])) {
                $this->addUsingAlias(PollPeer::DEVICEID, $deviceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceid['max'])) {
                $this->addUsingAlias(PollPeer::DEVICEID, $deviceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollPeer::DEVICEID, $deviceid, $comparison);
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
     * @return PollQuery The current query, for fluid interface
     */
    public function filterBySnmppropertyid($snmppropertyid = null, $comparison = null)
    {
        if (is_array($snmppropertyid)) {
            $useMinMax = false;
            if (isset($snmppropertyid['min'])) {
                $this->addUsingAlias(PollPeer::SNMPPROPERTYID, $snmppropertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snmppropertyid['max'])) {
                $this->addUsingAlias(PollPeer::SNMPPROPERTYID, $snmppropertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollPeer::SNMPPROPERTYID, $snmppropertyid, $comparison);
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
     * @return PollQuery The current query, for fluid interface
     */
    public function filterByPluginid($pluginid = null, $comparison = null)
    {
        if (is_array($pluginid)) {
            $useMinMax = false;
            if (isset($pluginid['min'])) {
                $this->addUsingAlias(PollPeer::PLUGINID, $pluginid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginid['max'])) {
                $this->addUsingAlias(PollPeer::PLUGINID, $pluginid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollPeer::PLUGINID, $pluginid, $comparison);
    }

    /**
     * Filter the query on the Timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp('2011-03-14'); // WHERE Timestamp = '2011-03-14'
     * $query->filterByTimestamp('now'); // WHERE Timestamp = '2011-03-14'
     * $query->filterByTimestamp(array('max' => 'yesterday')); // WHERE Timestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PollQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(PollPeer::TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(PollPeer::TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollPeer::TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the Value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE Value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE Value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PollQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PollPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PollQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(PollPeer::DEVICEID, $device->getDeviceid(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PollPeer::DEVICEID, $device->toKeyValue('PrimaryKey', 'Deviceid'), $comparison);
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
     * @return PollQuery The current query, for fluid interface
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
     * Filter the query by a related SnmpProperty object
     *
     * @param   SnmpProperty|PropelObjectCollection $snmpProperty The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PollQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySnmpProperty($snmpProperty, $comparison = null)
    {
        if ($snmpProperty instanceof SnmpProperty) {
            return $this
                ->addUsingAlias(PollPeer::SNMPPROPERTYID, $snmpProperty->getSnmppropertyid(), $comparison);
        } elseif ($snmpProperty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PollPeer::SNMPPROPERTYID, $snmpProperty->toKeyValue('PrimaryKey', 'Snmppropertyid'), $comparison);
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
     * @return PollQuery The current query, for fluid interface
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
     * Filter the query by a related Plugin object
     *
     * @param   Plugin|PropelObjectCollection $plugin The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PollQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPlugin($plugin, $comparison = null)
    {
        if ($plugin instanceof Plugin) {
            return $this
                ->addUsingAlias(PollPeer::PLUGINID, $plugin->getPluginid(), $comparison);
        } elseif ($plugin instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PollPeer::PLUGINID, $plugin->toKeyValue('PrimaryKey', 'Pluginid'), $comparison);
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
     * @return PollQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Poll $poll Object to remove from the list of results
     *
     * @return PollQuery The current query, for fluid interface
     */
    public function prune($poll = null)
    {
        if ($poll) {
            $this->addUsingAlias(PollPeer::POLLID, $poll->getPollid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
