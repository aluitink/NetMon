<?php


/**
 * Base class that represents a query for the 'Device' table.
 *
 *
 *
 * @method DeviceQuery orderByDeviceid($order = Criteria::ASC) Order by the DeviceId column
 * @method DeviceQuery orderByDevicetypeid($order = Criteria::ASC) Order by the DeviceTypeId column
 * @method DeviceQuery orderByHostname($order = Criteria::ASC) Order by the Hostname column
 * @method DeviceQuery orderByIpaddress($order = Criteria::ASC) Order by the IpAddress column
 * @method DeviceQuery orderByDateadded($order = Criteria::ASC) Order by the DateAdded column
 * @method DeviceQuery orderByDateremoved($order = Criteria::ASC) Order by the DateRemoved column
 * @method DeviceQuery orderByActive($order = Criteria::ASC) Order by the Active column
 * @method DeviceQuery orderByModified($order = Criteria::ASC) Order by the Modified column
 *
 * @method DeviceQuery groupByDeviceid() Group by the DeviceId column
 * @method DeviceQuery groupByDevicetypeid() Group by the DeviceTypeId column
 * @method DeviceQuery groupByHostname() Group by the Hostname column
 * @method DeviceQuery groupByIpaddress() Group by the IpAddress column
 * @method DeviceQuery groupByDateadded() Group by the DateAdded column
 * @method DeviceQuery groupByDateremoved() Group by the DateRemoved column
 * @method DeviceQuery groupByActive() Group by the Active column
 * @method DeviceQuery groupByModified() Group by the Modified column
 *
 * @method DeviceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DeviceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DeviceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DeviceQuery leftJoinDeviceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeviceType relation
 * @method DeviceQuery rightJoinDeviceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeviceType relation
 * @method DeviceQuery innerJoinDeviceType($relationAlias = null) Adds a INNER JOIN clause to the query using the DeviceType relation
 *
 * @method DeviceQuery leftJoinDeviceThreshold($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeviceThreshold relation
 * @method DeviceQuery rightJoinDeviceThreshold($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeviceThreshold relation
 * @method DeviceQuery innerJoinDeviceThreshold($relationAlias = null) Adds a INNER JOIN clause to the query using the DeviceThreshold relation
 *
 * @method DeviceQuery leftJoinDeviceAdapter($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeviceAdapter relation
 * @method DeviceQuery rightJoinDeviceAdapter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeviceAdapter relation
 * @method DeviceQuery innerJoinDeviceAdapter($relationAlias = null) Adds a INNER JOIN clause to the query using the DeviceAdapter relation
 *
 * @method DeviceQuery leftJoinDevicePoll($relationAlias = null) Adds a LEFT JOIN clause to the query using the DevicePoll relation
 * @method DeviceQuery rightJoinDevicePoll($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DevicePoll relation
 * @method DeviceQuery innerJoinDevicePoll($relationAlias = null) Adds a INNER JOIN clause to the query using the DevicePoll relation
 *
 * @method DeviceQuery leftJoinDeviceMonitor($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeviceMonitor relation
 * @method DeviceQuery rightJoinDeviceMonitor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeviceMonitor relation
 * @method DeviceQuery innerJoinDeviceMonitor($relationAlias = null) Adds a INNER JOIN clause to the query using the DeviceMonitor relation
 *
 * @method DeviceQuery leftJoinDeviceSyslog($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeviceSyslog relation
 * @method DeviceQuery rightJoinDeviceSyslog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeviceSyslog relation
 * @method DeviceQuery innerJoinDeviceSyslog($relationAlias = null) Adds a INNER JOIN clause to the query using the DeviceSyslog relation
 *
 * @method DeviceQuery leftJoinDeviceTrap($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeviceTrap relation
 * @method DeviceQuery rightJoinDeviceTrap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeviceTrap relation
 * @method DeviceQuery innerJoinDeviceTrap($relationAlias = null) Adds a INNER JOIN clause to the query using the DeviceTrap relation
 *
 * @method Device findOne(PropelPDO $con = null) Return the first Device matching the query
 * @method Device findOneOrCreate(PropelPDO $con = null) Return the first Device matching the query, or a new Device object populated from the query conditions when no match is found
 *
 * @method Device findOneByDevicetypeid(int $DeviceTypeId) Return the first Device filtered by the DeviceTypeId column
 * @method Device findOneByHostname(string $Hostname) Return the first Device filtered by the Hostname column
 * @method Device findOneByIpaddress(string $IpAddress) Return the first Device filtered by the IpAddress column
 * @method Device findOneByDateadded(string $DateAdded) Return the first Device filtered by the DateAdded column
 * @method Device findOneByDateremoved(string $DateRemoved) Return the first Device filtered by the DateRemoved column
 * @method Device findOneByActive(boolean $Active) Return the first Device filtered by the Active column
 * @method Device findOneByModified(boolean $Modified) Return the first Device filtered by the Modified column
 *
 * @method array findByDeviceid(int $DeviceId) Return Device objects filtered by the DeviceId column
 * @method array findByDevicetypeid(int $DeviceTypeId) Return Device objects filtered by the DeviceTypeId column
 * @method array findByHostname(string $Hostname) Return Device objects filtered by the Hostname column
 * @method array findByIpaddress(string $IpAddress) Return Device objects filtered by the IpAddress column
 * @method array findByDateadded(string $DateAdded) Return Device objects filtered by the DateAdded column
 * @method array findByDateremoved(string $DateRemoved) Return Device objects filtered by the DateRemoved column
 * @method array findByActive(boolean $Active) Return Device objects filtered by the Active column
 * @method array findByModified(boolean $Modified) Return Device objects filtered by the Modified column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseDeviceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDeviceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Device', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DeviceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DeviceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DeviceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DeviceQuery) {
            return $criteria;
        }
        $query = new DeviceQuery();
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
     * @return   Device|Device[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DevicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DevicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Device A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByDeviceid($key, $con = null)
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
     * @return                 Device A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `DeviceId`, `DeviceTypeId`, `Hostname`, `IpAddress`, `DateAdded`, `DateRemoved`, `Active`, `Modified` FROM `Device` WHERE `DeviceId` = :p0';
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
            $obj = new Device();
            $obj->hydrate($row);
            DevicePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Device|Device[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Device[]|mixed the list of results, formatted by the current formatter
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
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DevicePeer::DEVICEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DevicePeer::DEVICEID, $keys, Criteria::IN);
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
     * @param     mixed $deviceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByDeviceid($deviceid = null, $comparison = null)
    {
        if (is_array($deviceid)) {
            $useMinMax = false;
            if (isset($deviceid['min'])) {
                $this->addUsingAlias(DevicePeer::DEVICEID, $deviceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceid['max'])) {
                $this->addUsingAlias(DevicePeer::DEVICEID, $deviceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicePeer::DEVICEID, $deviceid, $comparison);
    }

    /**
     * Filter the query on the DeviceTypeId column
     *
     * Example usage:
     * <code>
     * $query->filterByDevicetypeid(1234); // WHERE DeviceTypeId = 1234
     * $query->filterByDevicetypeid(array(12, 34)); // WHERE DeviceTypeId IN (12, 34)
     * $query->filterByDevicetypeid(array('min' => 12)); // WHERE DeviceTypeId >= 12
     * $query->filterByDevicetypeid(array('max' => 12)); // WHERE DeviceTypeId <= 12
     * </code>
     *
     * @see       filterByDeviceType()
     *
     * @param     mixed $devicetypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByDevicetypeid($devicetypeid = null, $comparison = null)
    {
        if (is_array($devicetypeid)) {
            $useMinMax = false;
            if (isset($devicetypeid['min'])) {
                $this->addUsingAlias(DevicePeer::DEVICETYPEID, $devicetypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($devicetypeid['max'])) {
                $this->addUsingAlias(DevicePeer::DEVICETYPEID, $devicetypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicePeer::DEVICETYPEID, $devicetypeid, $comparison);
    }

    /**
     * Filter the query on the Hostname column
     *
     * Example usage:
     * <code>
     * $query->filterByHostname('fooValue');   // WHERE Hostname = 'fooValue'
     * $query->filterByHostname('%fooValue%'); // WHERE Hostname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hostname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByHostname($hostname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hostname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hostname)) {
                $hostname = str_replace('*', '%', $hostname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DevicePeer::HOSTNAME, $hostname, $comparison);
    }

    /**
     * Filter the query on the IpAddress column
     *
     * Example usage:
     * <code>
     * $query->filterByIpaddress('fooValue');   // WHERE IpAddress = 'fooValue'
     * $query->filterByIpaddress('%fooValue%'); // WHERE IpAddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipaddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByIpaddress($ipaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipaddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipaddress)) {
                $ipaddress = str_replace('*', '%', $ipaddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DevicePeer::IPADDRESS, $ipaddress, $comparison);
    }

    /**
     * Filter the query on the DateAdded column
     *
     * Example usage:
     * <code>
     * $query->filterByDateadded('2011-03-14'); // WHERE DateAdded = '2011-03-14'
     * $query->filterByDateadded('now'); // WHERE DateAdded = '2011-03-14'
     * $query->filterByDateadded(array('max' => 'yesterday')); // WHERE DateAdded > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateadded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByDateadded($dateadded = null, $comparison = null)
    {
        if (is_array($dateadded)) {
            $useMinMax = false;
            if (isset($dateadded['min'])) {
                $this->addUsingAlias(DevicePeer::DATEADDED, $dateadded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateadded['max'])) {
                $this->addUsingAlias(DevicePeer::DATEADDED, $dateadded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicePeer::DATEADDED, $dateadded, $comparison);
    }

    /**
     * Filter the query on the DateRemoved column
     *
     * Example usage:
     * <code>
     * $query->filterByDateremoved('2011-03-14'); // WHERE DateRemoved = '2011-03-14'
     * $query->filterByDateremoved('now'); // WHERE DateRemoved = '2011-03-14'
     * $query->filterByDateremoved(array('max' => 'yesterday')); // WHERE DateRemoved > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateremoved The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByDateremoved($dateremoved = null, $comparison = null)
    {
        if (is_array($dateremoved)) {
            $useMinMax = false;
            if (isset($dateremoved['min'])) {
                $this->addUsingAlias(DevicePeer::DATEREMOVED, $dateremoved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateremoved['max'])) {
                $this->addUsingAlias(DevicePeer::DATEREMOVED, $dateremoved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicePeer::DATEREMOVED, $dateremoved, $comparison);
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
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(DevicePeer::ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query on the Modified column
     *
     * Example usage:
     * <code>
     * $query->filterByModified(true); // WHERE Modified = true
     * $query->filterByModified('yes'); // WHERE Modified = true
     * </code>
     *
     * @param     boolean|string $modified The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_string($modified)) {
            $modified = in_array(strtolower($modified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(DevicePeer::MODIFIED, $modified, $comparison);
    }

    /**
     * Filter the query by a related DeviceType object
     *
     * @param   DeviceType|PropelObjectCollection $deviceType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeviceType($deviceType, $comparison = null)
    {
        if ($deviceType instanceof DeviceType) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICETYPEID, $deviceType->getDevicetypeid(), $comparison);
        } elseif ($deviceType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DevicePeer::DEVICETYPEID, $deviceType->toKeyValue('PrimaryKey', 'Devicetypeid'), $comparison);
        } else {
            throw new PropelException('filterByDeviceType() only accepts arguments of type DeviceType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeviceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinDeviceType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeviceType');

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
            $this->addJoinObject($join, 'DeviceType');
        }

        return $this;
    }

    /**
     * Use the DeviceType relation DeviceType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeviceTypeQuery A secondary query class using the current class as primary query
     */
    public function useDeviceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeviceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeviceType', 'DeviceTypeQuery');
    }

    /**
     * Filter the query by a related Threshold object
     *
     * @param   Threshold|PropelObjectCollection $threshold  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeviceThreshold($threshold, $comparison = null)
    {
        if ($threshold instanceof Threshold) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICEID, $threshold->getDeviceid(), $comparison);
        } elseif ($threshold instanceof PropelObjectCollection) {
            return $this
                ->useDeviceThresholdQuery()
                ->filterByPrimaryKeys($threshold->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeviceThreshold() only accepts arguments of type Threshold or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeviceThreshold relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinDeviceThreshold($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeviceThreshold');

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
            $this->addJoinObject($join, 'DeviceThreshold');
        }

        return $this;
    }

    /**
     * Use the DeviceThreshold relation Threshold object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ThresholdQuery A secondary query class using the current class as primary query
     */
    public function useDeviceThresholdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeviceThreshold($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeviceThreshold', 'ThresholdQuery');
    }

    /**
     * Filter the query by a related Adapter object
     *
     * @param   Adapter|PropelObjectCollection $adapter  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeviceAdapter($adapter, $comparison = null)
    {
        if ($adapter instanceof Adapter) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICEID, $adapter->getDeviceid(), $comparison);
        } elseif ($adapter instanceof PropelObjectCollection) {
            return $this
                ->useDeviceAdapterQuery()
                ->filterByPrimaryKeys($adapter->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeviceAdapter() only accepts arguments of type Adapter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeviceAdapter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinDeviceAdapter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeviceAdapter');

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
            $this->addJoinObject($join, 'DeviceAdapter');
        }

        return $this;
    }

    /**
     * Use the DeviceAdapter relation Adapter object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdapterQuery A secondary query class using the current class as primary query
     */
    public function useDeviceAdapterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeviceAdapter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeviceAdapter', 'AdapterQuery');
    }

    /**
     * Filter the query by a related Poll object
     *
     * @param   Poll|PropelObjectCollection $poll  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevicePoll($poll, $comparison = null)
    {
        if ($poll instanceof Poll) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICEID, $poll->getDeviceid(), $comparison);
        } elseif ($poll instanceof PropelObjectCollection) {
            return $this
                ->useDevicePollQuery()
                ->filterByPrimaryKeys($poll->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDevicePoll() only accepts arguments of type Poll or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DevicePoll relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinDevicePoll($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DevicePoll');

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
            $this->addJoinObject($join, 'DevicePoll');
        }

        return $this;
    }

    /**
     * Use the DevicePoll relation Poll object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PollQuery A secondary query class using the current class as primary query
     */
    public function useDevicePollQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDevicePoll($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DevicePoll', 'PollQuery');
    }

    /**
     * Filter the query by a related Monitor object
     *
     * @param   Monitor|PropelObjectCollection $monitor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeviceMonitor($monitor, $comparison = null)
    {
        if ($monitor instanceof Monitor) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICEID, $monitor->getDeviceid(), $comparison);
        } elseif ($monitor instanceof PropelObjectCollection) {
            return $this
                ->useDeviceMonitorQuery()
                ->filterByPrimaryKeys($monitor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeviceMonitor() only accepts arguments of type Monitor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeviceMonitor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinDeviceMonitor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeviceMonitor');

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
            $this->addJoinObject($join, 'DeviceMonitor');
        }

        return $this;
    }

    /**
     * Use the DeviceMonitor relation Monitor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MonitorQuery A secondary query class using the current class as primary query
     */
    public function useDeviceMonitorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeviceMonitor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeviceMonitor', 'MonitorQuery');
    }

    /**
     * Filter the query by a related Syslog object
     *
     * @param   Syslog|PropelObjectCollection $syslog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeviceSyslog($syslog, $comparison = null)
    {
        if ($syslog instanceof Syslog) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICEID, $syslog->getDeviceid(), $comparison);
        } elseif ($syslog instanceof PropelObjectCollection) {
            return $this
                ->useDeviceSyslogQuery()
                ->filterByPrimaryKeys($syslog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeviceSyslog() only accepts arguments of type Syslog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeviceSyslog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinDeviceSyslog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeviceSyslog');

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
            $this->addJoinObject($join, 'DeviceSyslog');
        }

        return $this;
    }

    /**
     * Use the DeviceSyslog relation Syslog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SyslogQuery A secondary query class using the current class as primary query
     */
    public function useDeviceSyslogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeviceSyslog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeviceSyslog', 'SyslogQuery');
    }

    /**
     * Filter the query by a related Trap object
     *
     * @param   Trap|PropelObjectCollection $trap  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeviceTrap($trap, $comparison = null)
    {
        if ($trap instanceof Trap) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICEID, $trap->getDeviceid(), $comparison);
        } elseif ($trap instanceof PropelObjectCollection) {
            return $this
                ->useDeviceTrapQuery()
                ->filterByPrimaryKeys($trap->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeviceTrap() only accepts arguments of type Trap or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeviceTrap relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinDeviceTrap($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeviceTrap');

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
            $this->addJoinObject($join, 'DeviceTrap');
        }

        return $this;
    }

    /**
     * Use the DeviceTrap relation Trap object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TrapQuery A secondary query class using the current class as primary query
     */
    public function useDeviceTrapQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDeviceTrap($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeviceTrap', 'TrapQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Device $device Object to remove from the list of results
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function prune($device = null)
    {
        if ($device) {
            $this->addUsingAlias(DevicePeer::DEVICEID, $device->getDeviceid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
