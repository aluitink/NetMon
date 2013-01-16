<?php


/**
 * Base class that represents a query for the 'Interface' table.
 *
 *
 *
 * @method InterfaceQuery orderByInterfaceid($order = Criteria::ASC) Order by the InterfaceId column
 * @method InterfaceQuery orderByInterfacetypeid($order = Criteria::ASC) Order by the InterfaceTypeId column
 * @method InterfaceQuery orderByDeviceid($order = Criteria::ASC) Order by the DeviceId column
 * @method InterfaceQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method InterfaceQuery orderByInstance($order = Criteria::ASC) Order by the Instance column
 * @method InterfaceQuery orderByIpaddress($order = Criteria::ASC) Order by the IpAddress column
 * @method InterfaceQuery orderByNetmask($order = Criteria::ASC) Order by the Netmask column
 * @method InterfaceQuery orderByMacaddress($order = Criteria::ASC) Order by the MacAddress column
 * @method InterfaceQuery orderBySpeed($order = Criteria::ASC) Order by the Speed column
 * @method InterfaceQuery orderByAdministrativestatus($order = Criteria::ASC) Order by the AdministrativeStatus column
 * @method InterfaceQuery orderByOperationalstatus($order = Criteria::ASC) Order by the OperationalStatus column
 * @method InterfaceQuery orderByModified($order = Criteria::ASC) Order by the Modified column
 *
 * @method InterfaceQuery groupByInterfaceid() Group by the InterfaceId column
 * @method InterfaceQuery groupByInterfacetypeid() Group by the InterfaceTypeId column
 * @method InterfaceQuery groupByDeviceid() Group by the DeviceId column
 * @method InterfaceQuery groupByName() Group by the Name column
 * @method InterfaceQuery groupByInstance() Group by the Instance column
 * @method InterfaceQuery groupByIpaddress() Group by the IpAddress column
 * @method InterfaceQuery groupByNetmask() Group by the Netmask column
 * @method InterfaceQuery groupByMacaddress() Group by the MacAddress column
 * @method InterfaceQuery groupBySpeed() Group by the Speed column
 * @method InterfaceQuery groupByAdministrativestatus() Group by the AdministrativeStatus column
 * @method InterfaceQuery groupByOperationalstatus() Group by the OperationalStatus column
 * @method InterfaceQuery groupByModified() Group by the Modified column
 *
 * @method InterfaceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method InterfaceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method InterfaceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method InterfaceQuery leftJoinInterfaceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the InterfaceType relation
 * @method InterfaceQuery rightJoinInterfaceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InterfaceType relation
 * @method InterfaceQuery innerJoinInterfaceType($relationAlias = null) Adds a INNER JOIN clause to the query using the InterfaceType relation
 *
 * @method InterfaceQuery leftJoinDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Device relation
 * @method InterfaceQuery rightJoinDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Device relation
 * @method InterfaceQuery innerJoinDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the Device relation
 *
 * @method InterfaceQuery leftJoinInterfaceInterfaceStatistic($relationAlias = null) Adds a LEFT JOIN clause to the query using the InterfaceInterfaceStatistic relation
 * @method InterfaceQuery rightJoinInterfaceInterfaceStatistic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InterfaceInterfaceStatistic relation
 * @method InterfaceQuery innerJoinInterfaceInterfaceStatistic($relationAlias = null) Adds a INNER JOIN clause to the query using the InterfaceInterfaceStatistic relation
 *
 * @method InterfaceQuery leftJoinInterfaceMonitor($relationAlias = null) Adds a LEFT JOIN clause to the query using the InterfaceMonitor relation
 * @method InterfaceQuery rightJoinInterfaceMonitor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InterfaceMonitor relation
 * @method InterfaceQuery innerJoinInterfaceMonitor($relationAlias = null) Adds a INNER JOIN clause to the query using the InterfaceMonitor relation
 *
 * @method InterfaceQuery leftJoinInterfaceTrap($relationAlias = null) Adds a LEFT JOIN clause to the query using the InterfaceTrap relation
 * @method InterfaceQuery rightJoinInterfaceTrap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InterfaceTrap relation
 * @method InterfaceQuery innerJoinInterfaceTrap($relationAlias = null) Adds a INNER JOIN clause to the query using the InterfaceTrap relation
 *
 * @method Interface findOne(PropelPDO $con = null) Return the first Interface matching the query
 * @method Interface findOneOrCreate(PropelPDO $con = null) Return the first Interface matching the query, or a new Interface object populated from the query conditions when no match is found
 *
 * @method Interface findOneByInterfacetypeid(int $InterfaceTypeId) Return the first Interface filtered by the InterfaceTypeId column
 * @method Interface findOneByDeviceid(int $DeviceId) Return the first Interface filtered by the DeviceId column
 * @method Interface findOneByName(string $Name) Return the first Interface filtered by the Name column
 * @method Interface findOneByInstance(int $Instance) Return the first Interface filtered by the Instance column
 * @method Interface findOneByIpaddress(string $IpAddress) Return the first Interface filtered by the IpAddress column
 * @method Interface findOneByNetmask(string $Netmask) Return the first Interface filtered by the Netmask column
 * @method Interface findOneByMacaddress(string $MacAddress) Return the first Interface filtered by the MacAddress column
 * @method Interface findOneBySpeed(int $Speed) Return the first Interface filtered by the Speed column
 * @method Interface findOneByAdministrativestatus(boolean $AdministrativeStatus) Return the first Interface filtered by the AdministrativeStatus column
 * @method Interface findOneByOperationalstatus(boolean $OperationalStatus) Return the first Interface filtered by the OperationalStatus column
 * @method Interface findOneByModified(boolean $Modified) Return the first Interface filtered by the Modified column
 *
 * @method array findByInterfaceid(int $InterfaceId) Return Interface objects filtered by the InterfaceId column
 * @method array findByInterfacetypeid(int $InterfaceTypeId) Return Interface objects filtered by the InterfaceTypeId column
 * @method array findByDeviceid(int $DeviceId) Return Interface objects filtered by the DeviceId column
 * @method array findByName(string $Name) Return Interface objects filtered by the Name column
 * @method array findByInstance(int $Instance) Return Interface objects filtered by the Instance column
 * @method array findByIpaddress(string $IpAddress) Return Interface objects filtered by the IpAddress column
 * @method array findByNetmask(string $Netmask) Return Interface objects filtered by the Netmask column
 * @method array findByMacaddress(string $MacAddress) Return Interface objects filtered by the MacAddress column
 * @method array findBySpeed(int $Speed) Return Interface objects filtered by the Speed column
 * @method array findByAdministrativestatus(boolean $AdministrativeStatus) Return Interface objects filtered by the AdministrativeStatus column
 * @method array findByOperationalstatus(boolean $OperationalStatus) Return Interface objects filtered by the OperationalStatus column
 * @method array findByModified(boolean $Modified) Return Interface objects filtered by the Modified column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseInterfaceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseInterfaceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Interface', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new InterfaceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   InterfaceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return InterfaceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof InterfaceQuery) {
            return $criteria;
        }
        $query = new InterfaceQuery();
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
     * @return   Interface|Interface[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InterfacePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(InterfacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Interface A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByInterfaceid($key, $con = null)
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
     * @return                 Interface A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `InterfaceId`, `InterfaceTypeId`, `DeviceId`, `Name`, `Instance`, `IpAddress`, `Netmask`, `MacAddress`, `Speed`, `AdministrativeStatus`, `OperationalStatus`, `Modified` FROM `Interface` WHERE `InterfaceId` = :p0';
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
            $obj = new Interface();
            $obj->hydrate($row);
            InterfacePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Interface|Interface[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Interface[]|mixed the list of results, formatted by the current formatter
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
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InterfacePeer::INTERFACEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InterfacePeer::INTERFACEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the InterfaceId column
     *
     * Example usage:
     * <code>
     * $query->filterByInterfaceid(1234); // WHERE InterfaceId = 1234
     * $query->filterByInterfaceid(array(12, 34)); // WHERE InterfaceId IN (12, 34)
     * $query->filterByInterfaceid(array('min' => 12)); // WHERE InterfaceId >= 12
     * $query->filterByInterfaceid(array('max' => 12)); // WHERE InterfaceId <= 12
     * </code>
     *
     * @param     mixed $interfaceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByInterfaceid($interfaceid = null, $comparison = null)
    {
        if (is_array($interfaceid)) {
            $useMinMax = false;
            if (isset($interfaceid['min'])) {
                $this->addUsingAlias(InterfacePeer::INTERFACEID, $interfaceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interfaceid['max'])) {
                $this->addUsingAlias(InterfacePeer::INTERFACEID, $interfaceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfacePeer::INTERFACEID, $interfaceid, $comparison);
    }

    /**
     * Filter the query on the InterfaceTypeId column
     *
     * Example usage:
     * <code>
     * $query->filterByInterfacetypeid(1234); // WHERE InterfaceTypeId = 1234
     * $query->filterByInterfacetypeid(array(12, 34)); // WHERE InterfaceTypeId IN (12, 34)
     * $query->filterByInterfacetypeid(array('min' => 12)); // WHERE InterfaceTypeId >= 12
     * $query->filterByInterfacetypeid(array('max' => 12)); // WHERE InterfaceTypeId <= 12
     * </code>
     *
     * @see       filterByInterfaceType()
     *
     * @param     mixed $interfacetypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByInterfacetypeid($interfacetypeid = null, $comparison = null)
    {
        if (is_array($interfacetypeid)) {
            $useMinMax = false;
            if (isset($interfacetypeid['min'])) {
                $this->addUsingAlias(InterfacePeer::INTERFACETYPEID, $interfacetypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interfacetypeid['max'])) {
                $this->addUsingAlias(InterfacePeer::INTERFACETYPEID, $interfacetypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfacePeer::INTERFACETYPEID, $interfacetypeid, $comparison);
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
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByDeviceid($deviceid = null, $comparison = null)
    {
        if (is_array($deviceid)) {
            $useMinMax = false;
            if (isset($deviceid['min'])) {
                $this->addUsingAlias(InterfacePeer::DEVICEID, $deviceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceid['max'])) {
                $this->addUsingAlias(InterfacePeer::DEVICEID, $deviceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfacePeer::DEVICEID, $deviceid, $comparison);
    }

    /**
     * Filter the query on the Name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE Name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InterfacePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the Instance column
     *
     * Example usage:
     * <code>
     * $query->filterByInstance(1234); // WHERE Instance = 1234
     * $query->filterByInstance(array(12, 34)); // WHERE Instance IN (12, 34)
     * $query->filterByInstance(array('min' => 12)); // WHERE Instance >= 12
     * $query->filterByInstance(array('max' => 12)); // WHERE Instance <= 12
     * </code>
     *
     * @param     mixed $instance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByInstance($instance = null, $comparison = null)
    {
        if (is_array($instance)) {
            $useMinMax = false;
            if (isset($instance['min'])) {
                $this->addUsingAlias(InterfacePeer::INSTANCE, $instance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instance['max'])) {
                $this->addUsingAlias(InterfacePeer::INSTANCE, $instance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfacePeer::INSTANCE, $instance, $comparison);
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
     * @return InterfaceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InterfacePeer::IPADDRESS, $ipaddress, $comparison);
    }

    /**
     * Filter the query on the Netmask column
     *
     * Example usage:
     * <code>
     * $query->filterByNetmask('fooValue');   // WHERE Netmask = 'fooValue'
     * $query->filterByNetmask('%fooValue%'); // WHERE Netmask LIKE '%fooValue%'
     * </code>
     *
     * @param     string $netmask The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByNetmask($netmask = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($netmask)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $netmask)) {
                $netmask = str_replace('*', '%', $netmask);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InterfacePeer::NETMASK, $netmask, $comparison);
    }

    /**
     * Filter the query on the MacAddress column
     *
     * Example usage:
     * <code>
     * $query->filterByMacaddress('fooValue');   // WHERE MacAddress = 'fooValue'
     * $query->filterByMacaddress('%fooValue%'); // WHERE MacAddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $macaddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByMacaddress($macaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($macaddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $macaddress)) {
                $macaddress = str_replace('*', '%', $macaddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InterfacePeer::MACADDRESS, $macaddress, $comparison);
    }

    /**
     * Filter the query on the Speed column
     *
     * Example usage:
     * <code>
     * $query->filterBySpeed(1234); // WHERE Speed = 1234
     * $query->filterBySpeed(array(12, 34)); // WHERE Speed IN (12, 34)
     * $query->filterBySpeed(array('min' => 12)); // WHERE Speed >= 12
     * $query->filterBySpeed(array('max' => 12)); // WHERE Speed <= 12
     * </code>
     *
     * @param     mixed $speed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterBySpeed($speed = null, $comparison = null)
    {
        if (is_array($speed)) {
            $useMinMax = false;
            if (isset($speed['min'])) {
                $this->addUsingAlias(InterfacePeer::SPEED, $speed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($speed['max'])) {
                $this->addUsingAlias(InterfacePeer::SPEED, $speed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfacePeer::SPEED, $speed, $comparison);
    }

    /**
     * Filter the query on the AdministrativeStatus column
     *
     * Example usage:
     * <code>
     * $query->filterByAdministrativestatus(true); // WHERE AdministrativeStatus = true
     * $query->filterByAdministrativestatus('yes'); // WHERE AdministrativeStatus = true
     * </code>
     *
     * @param     boolean|string $administrativestatus The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByAdministrativestatus($administrativestatus = null, $comparison = null)
    {
        if (is_string($administrativestatus)) {
            $administrativestatus = in_array(strtolower($administrativestatus), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InterfacePeer::ADMINISTRATIVESTATUS, $administrativestatus, $comparison);
    }

    /**
     * Filter the query on the OperationalStatus column
     *
     * Example usage:
     * <code>
     * $query->filterByOperationalstatus(true); // WHERE OperationalStatus = true
     * $query->filterByOperationalstatus('yes'); // WHERE OperationalStatus = true
     * </code>
     *
     * @param     boolean|string $operationalstatus The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByOperationalstatus($operationalstatus = null, $comparison = null)
    {
        if (is_string($operationalstatus)) {
            $operationalstatus = in_array(strtolower($operationalstatus), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InterfacePeer::OPERATIONALSTATUS, $operationalstatus, $comparison);
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
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_string($modified)) {
            $modified = in_array(strtolower($modified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InterfacePeer::MODIFIED, $modified, $comparison);
    }

    /**
     * Filter the query by a related InterfaceType object
     *
     * @param   InterfaceType|PropelObjectCollection $interfaceType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InterfaceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInterfaceType($interfaceType, $comparison = null)
    {
        if ($interfaceType instanceof InterfaceType) {
            return $this
                ->addUsingAlias(InterfacePeer::INTERFACETYPEID, $interfaceType->getInterfacetypeid(), $comparison);
        } elseif ($interfaceType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InterfacePeer::INTERFACETYPEID, $interfaceType->toKeyValue('PrimaryKey', 'Interfacetypeid'), $comparison);
        } else {
            throw new PropelException('filterByInterfaceType() only accepts arguments of type InterfaceType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InterfaceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function joinInterfaceType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InterfaceType');

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
            $this->addJoinObject($join, 'InterfaceType');
        }

        return $this;
    }

    /**
     * Use the InterfaceType relation InterfaceType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   InterfaceTypeQuery A secondary query class using the current class as primary query
     */
    public function useInterfaceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInterfaceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InterfaceType', 'InterfaceTypeQuery');
    }

    /**
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InterfaceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(InterfacePeer::DEVICEID, $device->getDeviceid(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InterfacePeer::DEVICEID, $device->toKeyValue('PrimaryKey', 'Deviceid'), $comparison);
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
     * @return InterfaceQuery The current query, for fluid interface
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
     * Filter the query by a related InterfaceStatistic object
     *
     * @param   InterfaceStatistic|PropelObjectCollection $interfaceStatistic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InterfaceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInterfaceInterfaceStatistic($interfaceStatistic, $comparison = null)
    {
        if ($interfaceStatistic instanceof InterfaceStatistic) {
            return $this
                ->addUsingAlias(InterfacePeer::INTERFACEID, $interfaceStatistic->getInterfaceid(), $comparison);
        } elseif ($interfaceStatistic instanceof PropelObjectCollection) {
            return $this
                ->useInterfaceInterfaceStatisticQuery()
                ->filterByPrimaryKeys($interfaceStatistic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInterfaceInterfaceStatistic() only accepts arguments of type InterfaceStatistic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InterfaceInterfaceStatistic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function joinInterfaceInterfaceStatistic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InterfaceInterfaceStatistic');

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
            $this->addJoinObject($join, 'InterfaceInterfaceStatistic');
        }

        return $this;
    }

    /**
     * Use the InterfaceInterfaceStatistic relation InterfaceStatistic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   InterfaceStatisticQuery A secondary query class using the current class as primary query
     */
    public function useInterfaceInterfaceStatisticQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInterfaceInterfaceStatistic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InterfaceInterfaceStatistic', 'InterfaceStatisticQuery');
    }

    /**
     * Filter the query by a related Monitor object
     *
     * @param   Monitor|PropelObjectCollection $monitor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InterfaceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInterfaceMonitor($monitor, $comparison = null)
    {
        if ($monitor instanceof Monitor) {
            return $this
                ->addUsingAlias(InterfacePeer::INTERFACEID, $monitor->getInterfaceid(), $comparison);
        } elseif ($monitor instanceof PropelObjectCollection) {
            return $this
                ->useInterfaceMonitorQuery()
                ->filterByPrimaryKeys($monitor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInterfaceMonitor() only accepts arguments of type Monitor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InterfaceMonitor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function joinInterfaceMonitor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InterfaceMonitor');

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
            $this->addJoinObject($join, 'InterfaceMonitor');
        }

        return $this;
    }

    /**
     * Use the InterfaceMonitor relation Monitor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MonitorQuery A secondary query class using the current class as primary query
     */
    public function useInterfaceMonitorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInterfaceMonitor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InterfaceMonitor', 'MonitorQuery');
    }

    /**
     * Filter the query by a related Trap object
     *
     * @param   Trap|PropelObjectCollection $trap  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InterfaceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInterfaceTrap($trap, $comparison = null)
    {
        if ($trap instanceof Trap) {
            return $this
                ->addUsingAlias(InterfacePeer::INTERFACEID, $trap->getInterfaceid(), $comparison);
        } elseif ($trap instanceof PropelObjectCollection) {
            return $this
                ->useInterfaceTrapQuery()
                ->filterByPrimaryKeys($trap->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInterfaceTrap() only accepts arguments of type Trap or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InterfaceTrap relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function joinInterfaceTrap($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InterfaceTrap');

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
            $this->addJoinObject($join, 'InterfaceTrap');
        }

        return $this;
    }

    /**
     * Use the InterfaceTrap relation Trap object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TrapQuery A secondary query class using the current class as primary query
     */
    public function useInterfaceTrapQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInterfaceTrap($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InterfaceTrap', 'TrapQuery');
    }

    /**
     * Filter the query by a related Device object
     * using the Monitor table as cross reference
     *
     * @param   Device $device the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   InterfaceQuery The current query, for fluid interface
     */
    public function filterByDevice($device, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInterfaceMonitorQuery()
            ->filterByDevice($device, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Plugin object
     * using the Monitor table as cross reference
     *
     * @param   Plugin $plugin the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   InterfaceQuery The current query, for fluid interface
     */
    public function filterByPlugin($plugin, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInterfaceMonitorQuery()
            ->filterByPlugin($plugin, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related SnmpProperty object
     * using the Monitor table as cross reference
     *
     * @param   SnmpProperty $snmpProperty the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   InterfaceQuery The current query, for fluid interface
     */
    public function filterBySnmpProperty($snmpProperty, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInterfaceMonitorQuery()
            ->filterBySnmpProperty($snmpProperty, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Interface $interface Object to remove from the list of results
     *
     * @return InterfaceQuery The current query, for fluid interface
     */
    public function prune($interface = null)
    {
        if ($interface) {
            $this->addUsingAlias(InterfacePeer::INTERFACEID, $interface->getInterfaceid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
