<?php


/**
 * Base class that represents a query for the 'Syslog' table.
 *
 *
 *
 * @method SyslogQuery orderBySyslogid($order = Criteria::ASC) Order by the SyslogId column
 * @method SyslogQuery orderByIpaddress($order = Criteria::ASC) Order by the IpAddress column
 * @method SyslogQuery orderByFacility($order = Criteria::ASC) Order by the Facility column
 * @method SyslogQuery orderByPriority($order = Criteria::ASC) Order by the Priority column
 * @method SyslogQuery orderByLevel($order = Criteria::ASC) Order by the Level column
 * @method SyslogQuery orderByTag($order = Criteria::ASC) Order by the Tag column
 * @method SyslogQuery orderByTimestamp($order = Criteria::ASC) Order by the Timestamp column
 * @method SyslogQuery orderByProgram($order = Criteria::ASC) Order by the Program column
 * @method SyslogQuery orderByMessage($order = Criteria::ASC) Order by the Message column
 * @method SyslogQuery orderBySequence($order = Criteria::ASC) Order by the Sequence column
 * @method SyslogQuery orderByCount($order = Criteria::ASC) Order by the Count column
 * @method SyslogQuery orderByValue($order = Criteria::ASC) Order by the Value column
 *
 * @method SyslogQuery groupBySyslogid() Group by the SyslogId column
 * @method SyslogQuery groupByIpaddress() Group by the IpAddress column
 * @method SyslogQuery groupByFacility() Group by the Facility column
 * @method SyslogQuery groupByPriority() Group by the Priority column
 * @method SyslogQuery groupByLevel() Group by the Level column
 * @method SyslogQuery groupByTag() Group by the Tag column
 * @method SyslogQuery groupByTimestamp() Group by the Timestamp column
 * @method SyslogQuery groupByProgram() Group by the Program column
 * @method SyslogQuery groupByMessage() Group by the Message column
 * @method SyslogQuery groupBySequence() Group by the Sequence column
 * @method SyslogQuery groupByCount() Group by the Count column
 * @method SyslogQuery groupByValue() Group by the Value column
 *
 * @method SyslogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SyslogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SyslogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Syslog findOne(PropelPDO $con = null) Return the first Syslog matching the query
 * @method Syslog findOneOrCreate(PropelPDO $con = null) Return the first Syslog matching the query, or a new Syslog object populated from the query conditions when no match is found
 *
 * @method Syslog findOneByIpaddress(string $IpAddress) Return the first Syslog filtered by the IpAddress column
 * @method Syslog findOneByFacility(string $Facility) Return the first Syslog filtered by the Facility column
 * @method Syslog findOneByPriority(string $Priority) Return the first Syslog filtered by the Priority column
 * @method Syslog findOneByLevel(string $Level) Return the first Syslog filtered by the Level column
 * @method Syslog findOneByTag(string $Tag) Return the first Syslog filtered by the Tag column
 * @method Syslog findOneByTimestamp(string $Timestamp) Return the first Syslog filtered by the Timestamp column
 * @method Syslog findOneByProgram(string $Program) Return the first Syslog filtered by the Program column
 * @method Syslog findOneByMessage(string $Message) Return the first Syslog filtered by the Message column
 * @method Syslog findOneBySequence(int $Sequence) Return the first Syslog filtered by the Sequence column
 * @method Syslog findOneByCount(int $Count) Return the first Syslog filtered by the Count column
 * @method Syslog findOneByValue(int $Value) Return the first Syslog filtered by the Value column
 *
 * @method array findBySyslogid(int $SyslogId) Return Syslog objects filtered by the SyslogId column
 * @method array findByIpaddress(string $IpAddress) Return Syslog objects filtered by the IpAddress column
 * @method array findByFacility(string $Facility) Return Syslog objects filtered by the Facility column
 * @method array findByPriority(string $Priority) Return Syslog objects filtered by the Priority column
 * @method array findByLevel(string $Level) Return Syslog objects filtered by the Level column
 * @method array findByTag(string $Tag) Return Syslog objects filtered by the Tag column
 * @method array findByTimestamp(string $Timestamp) Return Syslog objects filtered by the Timestamp column
 * @method array findByProgram(string $Program) Return Syslog objects filtered by the Program column
 * @method array findByMessage(string $Message) Return Syslog objects filtered by the Message column
 * @method array findBySequence(int $Sequence) Return Syslog objects filtered by the Sequence column
 * @method array findByCount(int $Count) Return Syslog objects filtered by the Count column
 * @method array findByValue(int $Value) Return Syslog objects filtered by the Value column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseSyslogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSyslogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Syslog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SyslogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SyslogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SyslogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SyslogQuery) {
            return $criteria;
        }
        $query = new SyslogQuery();
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
     * @return   Syslog|Syslog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SyslogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SyslogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Syslog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySyslogid($key, $con = null)
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
     * @return                 Syslog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `SyslogId`, `IpAddress`, `Facility`, `Priority`, `Level`, `Tag`, `Timestamp`, `Program`, `Message`, `Sequence`, `Count`, `Value` FROM `Syslog` WHERE `SyslogId` = :p0';
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
            $obj = new Syslog();
            $obj->hydrate($row);
            SyslogPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Syslog|Syslog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Syslog[]|mixed the list of results, formatted by the current formatter
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
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SyslogPeer::SYSLOGID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SyslogPeer::SYSLOGID, $keys, Criteria::IN);
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
     * @param     mixed $syslogid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterBySyslogid($syslogid = null, $comparison = null)
    {
        if (is_array($syslogid)) {
            $useMinMax = false;
            if (isset($syslogid['min'])) {
                $this->addUsingAlias(SyslogPeer::SYSLOGID, $syslogid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($syslogid['max'])) {
                $this->addUsingAlias(SyslogPeer::SYSLOGID, $syslogid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyslogPeer::SYSLOGID, $syslogid, $comparison);
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
     * @return SyslogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SyslogPeer::IPADDRESS, $ipaddress, $comparison);
    }

    /**
     * Filter the query on the Facility column
     *
     * Example usage:
     * <code>
     * $query->filterByFacility('fooValue');   // WHERE Facility = 'fooValue'
     * $query->filterByFacility('%fooValue%'); // WHERE Facility LIKE '%fooValue%'
     * </code>
     *
     * @param     string $facility The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByFacility($facility = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($facility)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $facility)) {
                $facility = str_replace('*', '%', $facility);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyslogPeer::FACILITY, $facility, $comparison);
    }

    /**
     * Filter the query on the Priority column
     *
     * Example usage:
     * <code>
     * $query->filterByPriority('fooValue');   // WHERE Priority = 'fooValue'
     * $query->filterByPriority('%fooValue%'); // WHERE Priority LIKE '%fooValue%'
     * </code>
     *
     * @param     string $priority The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByPriority($priority = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($priority)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $priority)) {
                $priority = str_replace('*', '%', $priority);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyslogPeer::PRIORITY, $priority, $comparison);
    }

    /**
     * Filter the query on the Level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel('fooValue');   // WHERE Level = 'fooValue'
     * $query->filterByLevel('%fooValue%'); // WHERE Level LIKE '%fooValue%'
     * </code>
     *
     * @param     string $level The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($level)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $level)) {
                $level = str_replace('*', '%', $level);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyslogPeer::LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the Tag column
     *
     * Example usage:
     * <code>
     * $query->filterByTag('fooValue');   // WHERE Tag = 'fooValue'
     * $query->filterByTag('%fooValue%'); // WHERE Tag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tag The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByTag($tag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tag)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tag)) {
                $tag = str_replace('*', '%', $tag);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyslogPeer::TAG, $tag, $comparison);
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
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(SyslogPeer::TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(SyslogPeer::TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyslogPeer::TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the Program column
     *
     * Example usage:
     * <code>
     * $query->filterByProgram('fooValue');   // WHERE Program = 'fooValue'
     * $query->filterByProgram('%fooValue%'); // WHERE Program LIKE '%fooValue%'
     * </code>
     *
     * @param     string $program The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByProgram($program = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($program)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $program)) {
                $program = str_replace('*', '%', $program);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyslogPeer::PROGRAM, $program, $comparison);
    }

    /**
     * Filter the query on the Message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE Message = 'fooValue'
     * $query->filterByMessage('%fooValue%'); // WHERE Message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $message)) {
                $message = str_replace('*', '%', $message);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyslogPeer::MESSAGE, $message, $comparison);
    }

    /**
     * Filter the query on the Sequence column
     *
     * Example usage:
     * <code>
     * $query->filterBySequence(1234); // WHERE Sequence = 1234
     * $query->filterBySequence(array(12, 34)); // WHERE Sequence IN (12, 34)
     * $query->filterBySequence(array('min' => 12)); // WHERE Sequence >= 12
     * $query->filterBySequence(array('max' => 12)); // WHERE Sequence <= 12
     * </code>
     *
     * @param     mixed $sequence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterBySequence($sequence = null, $comparison = null)
    {
        if (is_array($sequence)) {
            $useMinMax = false;
            if (isset($sequence['min'])) {
                $this->addUsingAlias(SyslogPeer::SEQUENCE, $sequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequence['max'])) {
                $this->addUsingAlias(SyslogPeer::SEQUENCE, $sequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyslogPeer::SEQUENCE, $sequence, $comparison);
    }

    /**
     * Filter the query on the Count column
     *
     * Example usage:
     * <code>
     * $query->filterByCount(1234); // WHERE Count = 1234
     * $query->filterByCount(array(12, 34)); // WHERE Count IN (12, 34)
     * $query->filterByCount(array('min' => 12)); // WHERE Count >= 12
     * $query->filterByCount(array('max' => 12)); // WHERE Count <= 12
     * </code>
     *
     * @param     mixed $count The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByCount($count = null, $comparison = null)
    {
        if (is_array($count)) {
            $useMinMax = false;
            if (isset($count['min'])) {
                $this->addUsingAlias(SyslogPeer::COUNT, $count['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($count['max'])) {
                $this->addUsingAlias(SyslogPeer::COUNT, $count['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyslogPeer::COUNT, $count, $comparison);
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
     * @return SyslogQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(SyslogPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(SyslogPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyslogPeer::VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Syslog $syslog Object to remove from the list of results
     *
     * @return SyslogQuery The current query, for fluid interface
     */
    public function prune($syslog = null)
    {
        if ($syslog) {
            $this->addUsingAlias(SyslogPeer::SYSLOGID, $syslog->getSyslogid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
