<?php


/**
 * Base class that represents a query for the 'Threshold' table.
 *
 *
 *
 * @method ThresholdQuery orderByThresholdid($order = Criteria::ASC) Order by the ThresholdId column
 * @method ThresholdQuery orderByDeviceid($order = Criteria::ASC) Order by the DeviceId column
 * @method ThresholdQuery orderByPollid($order = Criteria::ASC) Order by the PollId column
 * @method ThresholdQuery orderByTrapid($order = Criteria::ASC) Order by the TrapId column
 * @method ThresholdQuery orderByPluginid($order = Criteria::ASC) Order by the PluginId column
 * @method ThresholdQuery orderBySyslogid($order = Criteria::ASC) Order by the SyslogId column
 * @method ThresholdQuery orderByGreaterthan($order = Criteria::ASC) Order by the GreaterThan column
 * @method ThresholdQuery orderByValue($order = Criteria::ASC) Order by the Value column
 *
 * @method ThresholdQuery groupByThresholdid() Group by the ThresholdId column
 * @method ThresholdQuery groupByDeviceid() Group by the DeviceId column
 * @method ThresholdQuery groupByPollid() Group by the PollId column
 * @method ThresholdQuery groupByTrapid() Group by the TrapId column
 * @method ThresholdQuery groupByPluginid() Group by the PluginId column
 * @method ThresholdQuery groupBySyslogid() Group by the SyslogId column
 * @method ThresholdQuery groupByGreaterthan() Group by the GreaterThan column
 * @method ThresholdQuery groupByValue() Group by the Value column
 *
 * @method ThresholdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ThresholdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ThresholdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ThresholdQuery leftJoinDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Device relation
 * @method ThresholdQuery rightJoinDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Device relation
 * @method ThresholdQuery innerJoinDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the Device relation
 *
 * @method ThresholdQuery leftJoinPoll($relationAlias = null) Adds a LEFT JOIN clause to the query using the Poll relation
 * @method ThresholdQuery rightJoinPoll($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Poll relation
 * @method ThresholdQuery innerJoinPoll($relationAlias = null) Adds a INNER JOIN clause to the query using the Poll relation
 *
 * @method ThresholdQuery leftJoinTrap($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trap relation
 * @method ThresholdQuery rightJoinTrap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trap relation
 * @method ThresholdQuery innerJoinTrap($relationAlias = null) Adds a INNER JOIN clause to the query using the Trap relation
 *
 * @method ThresholdQuery leftJoinPlugin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Plugin relation
 * @method ThresholdQuery rightJoinPlugin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Plugin relation
 * @method ThresholdQuery innerJoinPlugin($relationAlias = null) Adds a INNER JOIN clause to the query using the Plugin relation
 *
 * @method ThresholdQuery leftJoinSyslog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Syslog relation
 * @method ThresholdQuery rightJoinSyslog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Syslog relation
 * @method ThresholdQuery innerJoinSyslog($relationAlias = null) Adds a INNER JOIN clause to the query using the Syslog relation
 *
 * @method ThresholdQuery leftJoinAlarmThreshold($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlarmThreshold relation
 * @method ThresholdQuery rightJoinAlarmThreshold($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlarmThreshold relation
 * @method ThresholdQuery innerJoinAlarmThreshold($relationAlias = null) Adds a INNER JOIN clause to the query using the AlarmThreshold relation
 *
 * @method Threshold findOne(PropelPDO $con = null) Return the first Threshold matching the query
 * @method Threshold findOneOrCreate(PropelPDO $con = null) Return the first Threshold matching the query, or a new Threshold object populated from the query conditions when no match is found
 *
 * @method Threshold findOneByDeviceid(int $DeviceId) Return the first Threshold filtered by the DeviceId column
 * @method Threshold findOneByPollid(int $PollId) Return the first Threshold filtered by the PollId column
 * @method Threshold findOneByTrapid(int $TrapId) Return the first Threshold filtered by the TrapId column
 * @method Threshold findOneByPluginid(int $PluginId) Return the first Threshold filtered by the PluginId column
 * @method Threshold findOneBySyslogid(int $SyslogId) Return the first Threshold filtered by the SyslogId column
 * @method Threshold findOneByGreaterthan(int $GreaterThan) Return the first Threshold filtered by the GreaterThan column
 * @method Threshold findOneByValue(int $Value) Return the first Threshold filtered by the Value column
 *
 * @method array findByThresholdid(int $ThresholdId) Return Threshold objects filtered by the ThresholdId column
 * @method array findByDeviceid(int $DeviceId) Return Threshold objects filtered by the DeviceId column
 * @method array findByPollid(int $PollId) Return Threshold objects filtered by the PollId column
 * @method array findByTrapid(int $TrapId) Return Threshold objects filtered by the TrapId column
 * @method array findByPluginid(int $PluginId) Return Threshold objects filtered by the PluginId column
 * @method array findBySyslogid(int $SyslogId) Return Threshold objects filtered by the SyslogId column
 * @method array findByGreaterthan(int $GreaterThan) Return Threshold objects filtered by the GreaterThan column
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
        $sql = 'SELECT `ThresholdId`, `DeviceId`, `PollId`, `TrapId`, `PluginId`, `SyslogId`, `GreaterThan`, `Value` FROM `Threshold` WHERE `ThresholdId` = :p0';
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
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByDeviceid($deviceid = null, $comparison = null)
    {
        if (is_array($deviceid)) {
            $useMinMax = false;
            if (isset($deviceid['min'])) {
                $this->addUsingAlias(ThresholdPeer::DEVICEID, $deviceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceid['max'])) {
                $this->addUsingAlias(ThresholdPeer::DEVICEID, $deviceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::DEVICEID, $deviceid, $comparison);
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
     * @see       filterByPoll()
     *
     * @param     mixed $pollid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByPollid($pollid = null, $comparison = null)
    {
        if (is_array($pollid)) {
            $useMinMax = false;
            if (isset($pollid['min'])) {
                $this->addUsingAlias(ThresholdPeer::POLLID, $pollid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pollid['max'])) {
                $this->addUsingAlias(ThresholdPeer::POLLID, $pollid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::POLLID, $pollid, $comparison);
    }

    /**
     * Filter the query on the TrapId column
     *
     * Example usage:
     * <code>
     * $query->filterByTrapid(1234); // WHERE TrapId = 1234
     * $query->filterByTrapid(array(12, 34)); // WHERE TrapId IN (12, 34)
     * $query->filterByTrapid(array('min' => 12)); // WHERE TrapId >= 12
     * $query->filterByTrapid(array('max' => 12)); // WHERE TrapId <= 12
     * </code>
     *
     * @see       filterByTrap()
     *
     * @param     mixed $trapid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByTrapid($trapid = null, $comparison = null)
    {
        if (is_array($trapid)) {
            $useMinMax = false;
            if (isset($trapid['min'])) {
                $this->addUsingAlias(ThresholdPeer::TRAPID, $trapid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trapid['max'])) {
                $this->addUsingAlias(ThresholdPeer::TRAPID, $trapid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::TRAPID, $trapid, $comparison);
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
     * Filter the query on the SyslogId column
     *
     * Example usage:
     * <code>
     * $query->filterBySyslogid(1234); // WHERE SyslogId = 1234
     * $query->filterBySyslogid(array(12, 34)); // WHERE SyslogId IN (12, 34)
     * $query->filterBySyslogid(array('min' => 12)); // WHERE SyslogId >= 12
     * $query->filterBySyslogid(array('max' => 12)); // WHERE SyslogId <= 12
     * </code>
     *
     * @see       filterBySyslog()
     *
     * @param     mixed $syslogid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterBySyslogid($syslogid = null, $comparison = null)
    {
        if (is_array($syslogid)) {
            $useMinMax = false;
            if (isset($syslogid['min'])) {
                $this->addUsingAlias(ThresholdPeer::SYSLOGID, $syslogid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($syslogid['max'])) {
                $this->addUsingAlias(ThresholdPeer::SYSLOGID, $syslogid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ThresholdPeer::SYSLOGID, $syslogid, $comparison);
    }

    /**
     * Filter the query on the GreaterThan column
     *
     * Example usage:
     * <code>
     * $query->filterByGreaterthan(1234); // WHERE GreaterThan = 1234
     * $query->filterByGreaterthan(array(12, 34)); // WHERE GreaterThan IN (12, 34)
     * $query->filterByGreaterthan(array('min' => 12)); // WHERE GreaterThan >= 12
     * $query->filterByGreaterthan(array('max' => 12)); // WHERE GreaterThan <= 12
     * </code>
     *
     * @param     mixed $greaterthan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function filterByGreaterthan($greaterthan = null, $comparison = null)
    {
        if (is_array($greaterthan)) {
            $useMinMax = false;
            if (isset($greaterthan['min'])) {
                $this->addUsingAlias(ThresholdPeer::GREATERTHAN, $greaterthan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($greaterthan['max'])) {
                $this->addUsingAlias(ThresholdPeer::GREATERTHAN, $greaterthan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
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
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ThresholdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(ThresholdPeer::DEVICEID, $device->getDeviceid(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ThresholdPeer::DEVICEID, $device->toKeyValue('PrimaryKey', 'Deviceid'), $comparison);
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
     * @return ThresholdQuery The current query, for fluid interface
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
     * Filter the query by a related Poll object
     *
     * @param   Poll|PropelObjectCollection $poll The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ThresholdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPoll($poll, $comparison = null)
    {
        if ($poll instanceof Poll) {
            return $this
                ->addUsingAlias(ThresholdPeer::POLLID, $poll->getPollid(), $comparison);
        } elseif ($poll instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ThresholdPeer::POLLID, $poll->toKeyValue('PrimaryKey', 'Pollid'), $comparison);
        } else {
            throw new PropelException('filterByPoll() only accepts arguments of type Poll or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Poll relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function joinPoll($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Poll');

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
            $this->addJoinObject($join, 'Poll');
        }

        return $this;
    }

    /**
     * Use the Poll relation Poll object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PollQuery A secondary query class using the current class as primary query
     */
    public function usePollQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPoll($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Poll', 'PollQuery');
    }

    /**
     * Filter the query by a related Trap object
     *
     * @param   Trap|PropelObjectCollection $trap The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ThresholdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrap($trap, $comparison = null)
    {
        if ($trap instanceof Trap) {
            return $this
                ->addUsingAlias(ThresholdPeer::TRAPID, $trap->getTrapid(), $comparison);
        } elseif ($trap instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ThresholdPeer::TRAPID, $trap->toKeyValue('PrimaryKey', 'Trapid'), $comparison);
        } else {
            throw new PropelException('filterByTrap() only accepts arguments of type Trap or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trap relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function joinTrap($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trap');

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
            $this->addJoinObject($join, 'Trap');
        }

        return $this;
    }

    /**
     * Use the Trap relation Trap object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TrapQuery A secondary query class using the current class as primary query
     */
    public function useTrapQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrap($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trap', 'TrapQuery');
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
     * Filter the query by a related Syslog object
     *
     * @param   Syslog|PropelObjectCollection $syslog The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ThresholdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySyslog($syslog, $comparison = null)
    {
        if ($syslog instanceof Syslog) {
            return $this
                ->addUsingAlias(ThresholdPeer::SYSLOGID, $syslog->getSyslogid(), $comparison);
        } elseif ($syslog instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ThresholdPeer::SYSLOGID, $syslog->toKeyValue('PrimaryKey', 'Syslogid'), $comparison);
        } else {
            throw new PropelException('filterBySyslog() only accepts arguments of type Syslog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Syslog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ThresholdQuery The current query, for fluid interface
     */
    public function joinSyslog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Syslog');

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
            $this->addJoinObject($join, 'Syslog');
        }

        return $this;
    }

    /**
     * Use the Syslog relation Syslog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SyslogQuery A secondary query class using the current class as primary query
     */
    public function useSyslogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSyslog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Syslog', 'SyslogQuery');
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
