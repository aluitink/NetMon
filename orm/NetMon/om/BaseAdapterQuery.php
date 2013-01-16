<?php


/**
 * Base class that represents a query for the 'Adapter' table.
 *
 *
 *
 * @method AdapterQuery orderByAdapterid($order = Criteria::ASC) Order by the AdapterId column
 * @method AdapterQuery orderByAdaptertypeid($order = Criteria::ASC) Order by the AdapterTypeId column
 * @method AdapterQuery orderByDeviceid($order = Criteria::ASC) Order by the DeviceId column
 * @method AdapterQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method AdapterQuery orderByInstance($order = Criteria::ASC) Order by the Instance column
 * @method AdapterQuery orderByIpaddress($order = Criteria::ASC) Order by the IpAddress column
 * @method AdapterQuery orderByNetmask($order = Criteria::ASC) Order by the Netmask column
 * @method AdapterQuery orderByMacaddress($order = Criteria::ASC) Order by the MacAddress column
 * @method AdapterQuery orderBySpeed($order = Criteria::ASC) Order by the Speed column
 * @method AdapterQuery orderByAdministrativestatus($order = Criteria::ASC) Order by the AdministrativeStatus column
 * @method AdapterQuery orderByOperationalstatus($order = Criteria::ASC) Order by the OperationalStatus column
 * @method AdapterQuery orderByModified($order = Criteria::ASC) Order by the Modified column
 *
 * @method AdapterQuery groupByAdapterid() Group by the AdapterId column
 * @method AdapterQuery groupByAdaptertypeid() Group by the AdapterTypeId column
 * @method AdapterQuery groupByDeviceid() Group by the DeviceId column
 * @method AdapterQuery groupByName() Group by the Name column
 * @method AdapterQuery groupByInstance() Group by the Instance column
 * @method AdapterQuery groupByIpaddress() Group by the IpAddress column
 * @method AdapterQuery groupByNetmask() Group by the Netmask column
 * @method AdapterQuery groupByMacaddress() Group by the MacAddress column
 * @method AdapterQuery groupBySpeed() Group by the Speed column
 * @method AdapterQuery groupByAdministrativestatus() Group by the AdministrativeStatus column
 * @method AdapterQuery groupByOperationalstatus() Group by the OperationalStatus column
 * @method AdapterQuery groupByModified() Group by the Modified column
 *
 * @method AdapterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AdapterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AdapterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AdapterQuery leftJoinAdapterType($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdapterType relation
 * @method AdapterQuery rightJoinAdapterType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdapterType relation
 * @method AdapterQuery innerJoinAdapterType($relationAlias = null) Adds a INNER JOIN clause to the query using the AdapterType relation
 *
 * @method AdapterQuery leftJoinDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Device relation
 * @method AdapterQuery rightJoinDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Device relation
 * @method AdapterQuery innerJoinDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the Device relation
 *
 * @method AdapterQuery leftJoinAdapterAdapterStatistic($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdapterAdapterStatistic relation
 * @method AdapterQuery rightJoinAdapterAdapterStatistic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdapterAdapterStatistic relation
 * @method AdapterQuery innerJoinAdapterAdapterStatistic($relationAlias = null) Adds a INNER JOIN clause to the query using the AdapterAdapterStatistic relation
 *
 * @method AdapterQuery leftJoinAdapterMonitor($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdapterMonitor relation
 * @method AdapterQuery rightJoinAdapterMonitor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdapterMonitor relation
 * @method AdapterQuery innerJoinAdapterMonitor($relationAlias = null) Adds a INNER JOIN clause to the query using the AdapterMonitor relation
 *
 * @method AdapterQuery leftJoinAdapterTrap($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdapterTrap relation
 * @method AdapterQuery rightJoinAdapterTrap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdapterTrap relation
 * @method AdapterQuery innerJoinAdapterTrap($relationAlias = null) Adds a INNER JOIN clause to the query using the AdapterTrap relation
 *
 * @method Adapter findOne(PropelPDO $con = null) Return the first Adapter matching the query
 * @method Adapter findOneOrCreate(PropelPDO $con = null) Return the first Adapter matching the query, or a new Adapter object populated from the query conditions when no match is found
 *
 * @method Adapter findOneByAdaptertypeid(int $AdapterTypeId) Return the first Adapter filtered by the AdapterTypeId column
 * @method Adapter findOneByDeviceid(int $DeviceId) Return the first Adapter filtered by the DeviceId column
 * @method Adapter findOneByName(string $Name) Return the first Adapter filtered by the Name column
 * @method Adapter findOneByInstance(int $Instance) Return the first Adapter filtered by the Instance column
 * @method Adapter findOneByIpaddress(string $IpAddress) Return the first Adapter filtered by the IpAddress column
 * @method Adapter findOneByNetmask(string $Netmask) Return the first Adapter filtered by the Netmask column
 * @method Adapter findOneByMacaddress(string $MacAddress) Return the first Adapter filtered by the MacAddress column
 * @method Adapter findOneBySpeed(int $Speed) Return the first Adapter filtered by the Speed column
 * @method Adapter findOneByAdministrativestatus(boolean $AdministrativeStatus) Return the first Adapter filtered by the AdministrativeStatus column
 * @method Adapter findOneByOperationalstatus(boolean $OperationalStatus) Return the first Adapter filtered by the OperationalStatus column
 * @method Adapter findOneByModified(boolean $Modified) Return the first Adapter filtered by the Modified column
 *
 * @method array findByAdapterid(int $AdapterId) Return Adapter objects filtered by the AdapterId column
 * @method array findByAdaptertypeid(int $AdapterTypeId) Return Adapter objects filtered by the AdapterTypeId column
 * @method array findByDeviceid(int $DeviceId) Return Adapter objects filtered by the DeviceId column
 * @method array findByName(string $Name) Return Adapter objects filtered by the Name column
 * @method array findByInstance(int $Instance) Return Adapter objects filtered by the Instance column
 * @method array findByIpaddress(string $IpAddress) Return Adapter objects filtered by the IpAddress column
 * @method array findByNetmask(string $Netmask) Return Adapter objects filtered by the Netmask column
 * @method array findByMacaddress(string $MacAddress) Return Adapter objects filtered by the MacAddress column
 * @method array findBySpeed(int $Speed) Return Adapter objects filtered by the Speed column
 * @method array findByAdministrativestatus(boolean $AdministrativeStatus) Return Adapter objects filtered by the AdministrativeStatus column
 * @method array findByOperationalstatus(boolean $OperationalStatus) Return Adapter objects filtered by the OperationalStatus column
 * @method array findByModified(boolean $Modified) Return Adapter objects filtered by the Modified column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseAdapterQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAdapterQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Adapter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AdapterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AdapterQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AdapterQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AdapterQuery) {
            return $criteria;
        }
        $query = new AdapterQuery();
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
     * @return   Adapter|Adapter[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AdapterPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AdapterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Adapter A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAdapterid($key, $con = null)
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
     * @return                 Adapter A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `AdapterId`, `AdapterTypeId`, `DeviceId`, `Name`, `Instance`, `IpAddress`, `Netmask`, `MacAddress`, `Speed`, `AdministrativeStatus`, `OperationalStatus`, `Modified` FROM `Adapter` WHERE `AdapterId` = :p0';
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
            $obj = new Adapter();
            $obj->hydrate($row);
            AdapterPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Adapter|Adapter[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Adapter[]|mixed the list of results, formatted by the current formatter
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
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdapterPeer::ADAPTERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdapterPeer::ADAPTERID, $keys, Criteria::IN);
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
     * @param     mixed $adapterid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByAdapterid($adapterid = null, $comparison = null)
    {
        if (is_array($adapterid)) {
            $useMinMax = false;
            if (isset($adapterid['min'])) {
                $this->addUsingAlias(AdapterPeer::ADAPTERID, $adapterid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adapterid['max'])) {
                $this->addUsingAlias(AdapterPeer::ADAPTERID, $adapterid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterPeer::ADAPTERID, $adapterid, $comparison);
    }

    /**
     * Filter the query on the AdapterTypeId column
     *
     * Example usage:
     * <code>
     * $query->filterByAdaptertypeid(1234); // WHERE AdapterTypeId = 1234
     * $query->filterByAdaptertypeid(array(12, 34)); // WHERE AdapterTypeId IN (12, 34)
     * $query->filterByAdaptertypeid(array('min' => 12)); // WHERE AdapterTypeId >= 12
     * $query->filterByAdaptertypeid(array('max' => 12)); // WHERE AdapterTypeId <= 12
     * </code>
     *
     * @see       filterByAdapterType()
     *
     * @param     mixed $adaptertypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByAdaptertypeid($adaptertypeid = null, $comparison = null)
    {
        if (is_array($adaptertypeid)) {
            $useMinMax = false;
            if (isset($adaptertypeid['min'])) {
                $this->addUsingAlias(AdapterPeer::ADAPTERTYPEID, $adaptertypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adaptertypeid['max'])) {
                $this->addUsingAlias(AdapterPeer::ADAPTERTYPEID, $adaptertypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterPeer::ADAPTERTYPEID, $adaptertypeid, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByDeviceid($deviceid = null, $comparison = null)
    {
        if (is_array($deviceid)) {
            $useMinMax = false;
            if (isset($deviceid['min'])) {
                $this->addUsingAlias(AdapterPeer::DEVICEID, $deviceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceid['max'])) {
                $this->addUsingAlias(AdapterPeer::DEVICEID, $deviceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterPeer::DEVICEID, $deviceid, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AdapterPeer::NAME, $name, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByInstance($instance = null, $comparison = null)
    {
        if (is_array($instance)) {
            $useMinMax = false;
            if (isset($instance['min'])) {
                $this->addUsingAlias(AdapterPeer::INSTANCE, $instance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instance['max'])) {
                $this->addUsingAlias(AdapterPeer::INSTANCE, $instance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterPeer::INSTANCE, $instance, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AdapterPeer::IPADDRESS, $ipaddress, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AdapterPeer::NETMASK, $netmask, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AdapterPeer::MACADDRESS, $macaddress, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterBySpeed($speed = null, $comparison = null)
    {
        if (is_array($speed)) {
            $useMinMax = false;
            if (isset($speed['min'])) {
                $this->addUsingAlias(AdapterPeer::SPEED, $speed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($speed['max'])) {
                $this->addUsingAlias(AdapterPeer::SPEED, $speed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterPeer::SPEED, $speed, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByAdministrativestatus($administrativestatus = null, $comparison = null)
    {
        if (is_string($administrativestatus)) {
            $administrativestatus = in_array(strtolower($administrativestatus), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AdapterPeer::ADMINISTRATIVESTATUS, $administrativestatus, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByOperationalstatus($operationalstatus = null, $comparison = null)
    {
        if (is_string($operationalstatus)) {
            $operationalstatus = in_array(strtolower($operationalstatus), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AdapterPeer::OPERATIONALSTATUS, $operationalstatus, $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_string($modified)) {
            $modified = in_array(strtolower($modified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AdapterPeer::MODIFIED, $modified, $comparison);
    }

    /**
     * Filter the query by a related AdapterType object
     *
     * @param   AdapterType|PropelObjectCollection $adapterType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdapterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapterType($adapterType, $comparison = null)
    {
        if ($adapterType instanceof AdapterType) {
            return $this
                ->addUsingAlias(AdapterPeer::ADAPTERTYPEID, $adapterType->getAdaptertypeid(), $comparison);
        } elseif ($adapterType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdapterPeer::ADAPTERTYPEID, $adapterType->toKeyValue('PrimaryKey', 'Adaptertypeid'), $comparison);
        } else {
            throw new PropelException('filterByAdapterType() only accepts arguments of type AdapterType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AdapterType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function joinAdapterType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AdapterType');

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
            $this->addJoinObject($join, 'AdapterType');
        }

        return $this;
    }

    /**
     * Use the AdapterType relation AdapterType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdapterTypeQuery A secondary query class using the current class as primary query
     */
    public function useAdapterTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdapterType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AdapterType', 'AdapterTypeQuery');
    }

    /**
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdapterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(AdapterPeer::DEVICEID, $device->getDeviceid(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdapterPeer::DEVICEID, $device->toKeyValue('PrimaryKey', 'Deviceid'), $comparison);
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
     * @return AdapterQuery The current query, for fluid interface
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
     * Filter the query by a related AdapterStatistic object
     *
     * @param   AdapterStatistic|PropelObjectCollection $adapterStatistic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdapterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapterAdapterStatistic($adapterStatistic, $comparison = null)
    {
        if ($adapterStatistic instanceof AdapterStatistic) {
            return $this
                ->addUsingAlias(AdapterPeer::ADAPTERID, $adapterStatistic->getAdapterid(), $comparison);
        } elseif ($adapterStatistic instanceof PropelObjectCollection) {
            return $this
                ->useAdapterAdapterStatisticQuery()
                ->filterByPrimaryKeys($adapterStatistic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAdapterAdapterStatistic() only accepts arguments of type AdapterStatistic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AdapterAdapterStatistic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function joinAdapterAdapterStatistic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AdapterAdapterStatistic');

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
            $this->addJoinObject($join, 'AdapterAdapterStatistic');
        }

        return $this;
    }

    /**
     * Use the AdapterAdapterStatistic relation AdapterStatistic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdapterStatisticQuery A secondary query class using the current class as primary query
     */
    public function useAdapterAdapterStatisticQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdapterAdapterStatistic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AdapterAdapterStatistic', 'AdapterStatisticQuery');
    }

    /**
     * Filter the query by a related Monitor object
     *
     * @param   Monitor|PropelObjectCollection $monitor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdapterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapterMonitor($monitor, $comparison = null)
    {
        if ($monitor instanceof Monitor) {
            return $this
                ->addUsingAlias(AdapterPeer::ADAPTERID, $monitor->getAdapterid(), $comparison);
        } elseif ($monitor instanceof PropelObjectCollection) {
            return $this
                ->useAdapterMonitorQuery()
                ->filterByPrimaryKeys($monitor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAdapterMonitor() only accepts arguments of type Monitor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AdapterMonitor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function joinAdapterMonitor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AdapterMonitor');

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
            $this->addJoinObject($join, 'AdapterMonitor');
        }

        return $this;
    }

    /**
     * Use the AdapterMonitor relation Monitor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MonitorQuery A secondary query class using the current class as primary query
     */
    public function useAdapterMonitorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdapterMonitor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AdapterMonitor', 'MonitorQuery');
    }

    /**
     * Filter the query by a related Trap object
     *
     * @param   Trap|PropelObjectCollection $trap  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdapterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapterTrap($trap, $comparison = null)
    {
        if ($trap instanceof Trap) {
            return $this
                ->addUsingAlias(AdapterPeer::ADAPTERID, $trap->getAdapterid(), $comparison);
        } elseif ($trap instanceof PropelObjectCollection) {
            return $this
                ->useAdapterTrapQuery()
                ->filterByPrimaryKeys($trap->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAdapterTrap() only accepts arguments of type Trap or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AdapterTrap relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function joinAdapterTrap($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AdapterTrap');

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
            $this->addJoinObject($join, 'AdapterTrap');
        }

        return $this;
    }

    /**
     * Use the AdapterTrap relation Trap object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TrapQuery A secondary query class using the current class as primary query
     */
    public function useAdapterTrapQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAdapterTrap($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AdapterTrap', 'TrapQuery');
    }

    /**
     * Filter the query by a related Device object
     * using the Monitor table as cross reference
     *
     * @param   Device $device the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AdapterQuery The current query, for fluid interface
     */
    public function filterByDevice($device, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAdapterMonitorQuery()
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
     * @return   AdapterQuery The current query, for fluid interface
     */
    public function filterByPlugin($plugin, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAdapterMonitorQuery()
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
     * @return   AdapterQuery The current query, for fluid interface
     */
    public function filterBySnmpProperty($snmpProperty, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAdapterMonitorQuery()
            ->filterBySnmpProperty($snmpProperty, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Adapter $adapter Object to remove from the list of results
     *
     * @return AdapterQuery The current query, for fluid interface
     */
    public function prune($adapter = null)
    {
        if ($adapter) {
            $this->addUsingAlias(AdapterPeer::ADAPTERID, $adapter->getAdapterid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
