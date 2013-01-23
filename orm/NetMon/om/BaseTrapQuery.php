<?php


/**
 * Base class that represents a query for the 'Trap' table.
 *
 *
 *
 * @method TrapQuery orderByTrapid($order = Criteria::ASC) Order by the TrapId column
 * @method TrapQuery orderByDeviceid($order = Criteria::ASC) Order by the DeviceId column
 * @method TrapQuery orderByAdapterid($order = Criteria::ASC) Order by the AdapterId column
 * @method TrapQuery orderBySnmppropertyid($order = Criteria::ASC) Order by the SnmpPropertyId column
 * @method TrapQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method TrapQuery orderByValue($order = Criteria::ASC) Order by the Value column
 * @method TrapQuery orderByExpected($order = Criteria::ASC) Order by the Expected column
 *
 * @method TrapQuery groupByTrapid() Group by the TrapId column
 * @method TrapQuery groupByDeviceid() Group by the DeviceId column
 * @method TrapQuery groupByAdapterid() Group by the AdapterId column
 * @method TrapQuery groupBySnmppropertyid() Group by the SnmpPropertyId column
 * @method TrapQuery groupByTimestamp() Group by the Timestamp column
 * @method TrapQuery groupByValue() Group by the Value column
 * @method TrapQuery groupByExpected() Group by the Expected column
 *
 * @method TrapQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TrapQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TrapQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TrapQuery leftJoinDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Device relation
 * @method TrapQuery rightJoinDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Device relation
 * @method TrapQuery innerJoinDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the Device relation
 *
 * @method TrapQuery leftJoinAdapter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Adapter relation
 * @method TrapQuery rightJoinAdapter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Adapter relation
 * @method TrapQuery innerJoinAdapter($relationAlias = null) Adds a INNER JOIN clause to the query using the Adapter relation
 *
 * @method TrapQuery leftJoinSnmpProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the SnmpProperty relation
 * @method TrapQuery rightJoinSnmpProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SnmpProperty relation
 * @method TrapQuery innerJoinSnmpProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the SnmpProperty relation
 *
 * @method Trap findOne(PropelPDO $con = null) Return the first Trap matching the query
 * @method Trap findOneOrCreate(PropelPDO $con = null) Return the first Trap matching the query, or a new Trap object populated from the query conditions when no match is found
 *
 * @method Trap findOneByDeviceid(int $DeviceId) Return the first Trap filtered by the DeviceId column
 * @method Trap findOneByAdapterid(int $AdapterId) Return the first Trap filtered by the AdapterId column
 * @method Trap findOneBySnmppropertyid(int $SnmpPropertyId) Return the first Trap filtered by the SnmpPropertyId column
 * @method Trap findOneByTimestamp(string $Timestamp) Return the first Trap filtered by the Timestamp column
 * @method Trap findOneByValue(int $Value) Return the first Trap filtered by the Value column
 * @method Trap findOneByExpected(int $Expected) Return the first Trap filtered by the Expected column
 *
 * @method array findByTrapid(int $TrapId) Return Trap objects filtered by the TrapId column
 * @method array findByDeviceid(int $DeviceId) Return Trap objects filtered by the DeviceId column
 * @method array findByAdapterid(int $AdapterId) Return Trap objects filtered by the AdapterId column
 * @method array findBySnmppropertyid(int $SnmpPropertyId) Return Trap objects filtered by the SnmpPropertyId column
 * @method array findByTimestamp(string $Timestamp) Return Trap objects filtered by the Timestamp column
 * @method array findByValue(int $Value) Return Trap objects filtered by the Value column
 * @method array findByExpected(int $Expected) Return Trap objects filtered by the Expected column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseTrapQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTrapQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Trap', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TrapQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TrapQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TrapQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TrapQuery) {
            return $criteria;
        }
        $query = new TrapQuery();
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
     * @return   Trap|Trap[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TrapPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TrapPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Trap A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTrapid($key, $con = null)
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
     * @return                 Trap A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `TrapId`, `DeviceId`, `AdapterId`, `SnmpPropertyId`, `Timestamp`, `Value`, `Expected` FROM `Trap` WHERE `TrapId` = :p0';
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
            $obj = new Trap();
            $obj->hydrate($row);
            TrapPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Trap|Trap[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Trap[]|mixed the list of results, formatted by the current formatter
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TrapPeer::TRAPID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TrapPeer::TRAPID, $keys, Criteria::IN);
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
     * @param     mixed $trapid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByTrapid($trapid = null, $comparison = null)
    {
        if (is_array($trapid)) {
            $useMinMax = false;
            if (isset($trapid['min'])) {
                $this->addUsingAlias(TrapPeer::TRAPID, $trapid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trapid['max'])) {
                $this->addUsingAlias(TrapPeer::TRAPID, $trapid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrapPeer::TRAPID, $trapid, $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByDeviceid($deviceid = null, $comparison = null)
    {
        if (is_array($deviceid)) {
            $useMinMax = false;
            if (isset($deviceid['min'])) {
                $this->addUsingAlias(TrapPeer::DEVICEID, $deviceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceid['max'])) {
                $this->addUsingAlias(TrapPeer::DEVICEID, $deviceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrapPeer::DEVICEID, $deviceid, $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByAdapterid($adapterid = null, $comparison = null)
    {
        if (is_array($adapterid)) {
            $useMinMax = false;
            if (isset($adapterid['min'])) {
                $this->addUsingAlias(TrapPeer::ADAPTERID, $adapterid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adapterid['max'])) {
                $this->addUsingAlias(TrapPeer::ADAPTERID, $adapterid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrapPeer::ADAPTERID, $adapterid, $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterBySnmppropertyid($snmppropertyid = null, $comparison = null)
    {
        if (is_array($snmppropertyid)) {
            $useMinMax = false;
            if (isset($snmppropertyid['min'])) {
                $this->addUsingAlias(TrapPeer::SNMPPROPERTYID, $snmppropertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snmppropertyid['max'])) {
                $this->addUsingAlias(TrapPeer::SNMPPROPERTYID, $snmppropertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrapPeer::SNMPPROPERTYID, $snmppropertyid, $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(TrapPeer::TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(TrapPeer::TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrapPeer::TIMESTAMP, $timestamp, $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(TrapPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(TrapPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrapPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the Expected column
     *
     * Example usage:
     * <code>
     * $query->filterByExpected(1234); // WHERE Expected = 1234
     * $query->filterByExpected(array(12, 34)); // WHERE Expected IN (12, 34)
     * $query->filterByExpected(array('min' => 12)); // WHERE Expected >= 12
     * $query->filterByExpected(array('max' => 12)); // WHERE Expected <= 12
     * </code>
     *
     * @param     mixed $expected The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrapQuery The current query, for fluid interface
     */
    public function filterByExpected($expected = null, $comparison = null)
    {
        if (is_array($expected)) {
            $useMinMax = false;
            if (isset($expected['min'])) {
                $this->addUsingAlias(TrapPeer::EXPECTED, $expected['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expected['max'])) {
                $this->addUsingAlias(TrapPeer::EXPECTED, $expected['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrapPeer::EXPECTED, $expected, $comparison);
    }

    /**
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrapQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(TrapPeer::DEVICEID, $device->getDeviceid(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrapPeer::DEVICEID, $device->toKeyValue('PrimaryKey', 'Deviceid'), $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function joinDevice($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useDeviceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDevice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Device', 'DeviceQuery');
    }

    /**
     * Filter the query by a related Adapter object
     *
     * @param   Adapter|PropelObjectCollection $adapter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrapQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapter($adapter, $comparison = null)
    {
        if ($adapter instanceof Adapter) {
            return $this
                ->addUsingAlias(TrapPeer::ADAPTERID, $adapter->getAdapterid(), $comparison);
        } elseif ($adapter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrapPeer::ADAPTERID, $adapter->toKeyValue('PrimaryKey', 'Adapterid'), $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function joinAdapter($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useAdapterQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * @return                 TrapQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySnmpProperty($snmpProperty, $comparison = null)
    {
        if ($snmpProperty instanceof SnmpProperty) {
            return $this
                ->addUsingAlias(TrapPeer::SNMPPROPERTYID, $snmpProperty->getSnmppropertyid(), $comparison);
        } elseif ($snmpProperty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrapPeer::SNMPPROPERTYID, $snmpProperty->toKeyValue('PrimaryKey', 'Snmppropertyid'), $comparison);
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
     * @return TrapQuery The current query, for fluid interface
     */
    public function joinSnmpProperty($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSnmpPropertyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSnmpProperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SnmpProperty', 'SnmpPropertyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Trap $trap Object to remove from the list of results
     *
     * @return TrapQuery The current query, for fluid interface
     */
    public function prune($trap = null)
    {
        if ($trap) {
            $this->addUsingAlias(TrapPeer::TRAPID, $trap->getTrapid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
