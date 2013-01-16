<?php


/**
 * Base class that represents a query for the 'Alarm' table.
 *
 *
 *
 * @method AlarmQuery orderByAlarmid($order = Criteria::ASC) Order by the AlarmId column
 * @method AlarmQuery orderByThresholdid($order = Criteria::ASC) Order by the ThresholdId column
 * @method AlarmQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method AlarmQuery orderByActive($order = Criteria::ASC) Order by the Active column
 * @method AlarmQuery orderByAcknowledged($order = Criteria::ASC) Order by the Acknowledged column
 *
 * @method AlarmQuery groupByAlarmid() Group by the AlarmId column
 * @method AlarmQuery groupByThresholdid() Group by the ThresholdId column
 * @method AlarmQuery groupByTimestamp() Group by the Timestamp column
 * @method AlarmQuery groupByActive() Group by the Active column
 * @method AlarmQuery groupByAcknowledged() Group by the Acknowledged column
 *
 * @method AlarmQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AlarmQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AlarmQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AlarmQuery leftJoinThreshold($relationAlias = null) Adds a LEFT JOIN clause to the query using the Threshold relation
 * @method AlarmQuery rightJoinThreshold($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Threshold relation
 * @method AlarmQuery innerJoinThreshold($relationAlias = null) Adds a INNER JOIN clause to the query using the Threshold relation
 *
 * @method Alarm findOne(PropelPDO $con = null) Return the first Alarm matching the query
 * @method Alarm findOneOrCreate(PropelPDO $con = null) Return the first Alarm matching the query, or a new Alarm object populated from the query conditions when no match is found
 *
 * @method Alarm findOneByThresholdid(int $ThresholdId) Return the first Alarm filtered by the ThresholdId column
 * @method Alarm findOneByTimestamp(string $Timestamp) Return the first Alarm filtered by the Timestamp column
 * @method Alarm findOneByActive(boolean $Active) Return the first Alarm filtered by the Active column
 * @method Alarm findOneByAcknowledged(boolean $Acknowledged) Return the first Alarm filtered by the Acknowledged column
 *
 * @method array findByAlarmid(int $AlarmId) Return Alarm objects filtered by the AlarmId column
 * @method array findByThresholdid(int $ThresholdId) Return Alarm objects filtered by the ThresholdId column
 * @method array findByTimestamp(string $Timestamp) Return Alarm objects filtered by the Timestamp column
 * @method array findByActive(boolean $Active) Return Alarm objects filtered by the Active column
 * @method array findByAcknowledged(boolean $Acknowledged) Return Alarm objects filtered by the Acknowledged column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseAlarmQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAlarmQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Alarm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AlarmQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AlarmQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AlarmQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AlarmQuery) {
            return $criteria;
        }
        $query = new AlarmQuery();
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
     * @return   Alarm|Alarm[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AlarmPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AlarmPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Alarm A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAlarmid($key, $con = null)
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
     * @return                 Alarm A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `AlarmId`, `ThresholdId`, `Timestamp`, `Active`, `Acknowledged` FROM `Alarm` WHERE `AlarmId` = :p0';
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
            $obj = new Alarm();
            $obj->hydrate($row);
            AlarmPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Alarm|Alarm[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Alarm[]|mixed the list of results, formatted by the current formatter
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
     * @return AlarmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AlarmPeer::ALARMID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AlarmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AlarmPeer::ALARMID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the AlarmId column
     *
     * Example usage:
     * <code>
     * $query->filterByAlarmid(1234); // WHERE AlarmId = 1234
     * $query->filterByAlarmid(array(12, 34)); // WHERE AlarmId IN (12, 34)
     * $query->filterByAlarmid(array('min' => 12)); // WHERE AlarmId >= 12
     * $query->filterByAlarmid(array('max' => 12)); // WHERE AlarmId <= 12
     * </code>
     *
     * @param     mixed $alarmid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlarmQuery The current query, for fluid interface
     */
    public function filterByAlarmid($alarmid = null, $comparison = null)
    {
        if (is_array($alarmid)) {
            $useMinMax = false;
            if (isset($alarmid['min'])) {
                $this->addUsingAlias(AlarmPeer::ALARMID, $alarmid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($alarmid['max'])) {
                $this->addUsingAlias(AlarmPeer::ALARMID, $alarmid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlarmPeer::ALARMID, $alarmid, $comparison);
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
     * @see       filterByThreshold()
     *
     * @param     mixed $thresholdid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlarmQuery The current query, for fluid interface
     */
    public function filterByThresholdid($thresholdid = null, $comparison = null)
    {
        if (is_array($thresholdid)) {
            $useMinMax = false;
            if (isset($thresholdid['min'])) {
                $this->addUsingAlias(AlarmPeer::THRESHOLDID, $thresholdid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thresholdid['max'])) {
                $this->addUsingAlias(AlarmPeer::THRESHOLDID, $thresholdid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlarmPeer::THRESHOLDID, $thresholdid, $comparison);
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
     * @return AlarmQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(AlarmPeer::TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(AlarmPeer::TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlarmPeer::TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the Active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive(true); // WHERE Active = true
     * $query->filterByActive('yes'); // WHERE Active = true
     * </code>
     *
     * @param     boolean|string $active The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlarmQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AlarmPeer::ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query on the Acknowledged column
     *
     * Example usage:
     * <code>
     * $query->filterByAcknowledged(true); // WHERE Acknowledged = true
     * $query->filterByAcknowledged('yes'); // WHERE Acknowledged = true
     * </code>
     *
     * @param     boolean|string $acknowledged The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlarmQuery The current query, for fluid interface
     */
    public function filterByAcknowledged($acknowledged = null, $comparison = null)
    {
        if (is_string($acknowledged)) {
            $acknowledged = in_array(strtolower($acknowledged), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AlarmPeer::ACKNOWLEDGED, $acknowledged, $comparison);
    }

    /**
     * Filter the query by a related Threshold object
     *
     * @param   Threshold|PropelObjectCollection $threshold The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlarmQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByThreshold($threshold, $comparison = null)
    {
        if ($threshold instanceof Threshold) {
            return $this
                ->addUsingAlias(AlarmPeer::THRESHOLDID, $threshold->getThresholdid(), $comparison);
        } elseif ($threshold instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlarmPeer::THRESHOLDID, $threshold->toKeyValue('PrimaryKey', 'Thresholdid'), $comparison);
        } else {
            throw new PropelException('filterByThreshold() only accepts arguments of type Threshold or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Threshold relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlarmQuery The current query, for fluid interface
     */
    public function joinThreshold($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Threshold');

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
            $this->addJoinObject($join, 'Threshold');
        }

        return $this;
    }

    /**
     * Use the Threshold relation Threshold object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ThresholdQuery A secondary query class using the current class as primary query
     */
    public function useThresholdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinThreshold($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Threshold', 'ThresholdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Alarm $alarm Object to remove from the list of results
     *
     * @return AlarmQuery The current query, for fluid interface
     */
    public function prune($alarm = null)
    {
        if ($alarm) {
            $this->addUsingAlias(AlarmPeer::ALARMID, $alarm->getAlarmid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
