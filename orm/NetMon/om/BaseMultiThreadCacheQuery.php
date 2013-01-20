<?php


/**
 * Base class that represents a query for the 'MultiThreadCache' table.
 *
 *
 *
 * @method MultiThreadCacheQuery orderByMultithreadcacheid($order = Criteria::ASC) Order by the MultiThreadCacheId column
 * @method MultiThreadCacheQuery orderByBatchidentifier($order = Criteria::ASC) Order by the BatchIdentifier column
 * @method MultiThreadCacheQuery orderByTimelimit($order = Criteria::ASC) Order by the TimeLimit column
 * @method MultiThreadCacheQuery orderByPid($order = Criteria::ASC) Order by the Pid column
 * @method MultiThreadCacheQuery orderByStatus($order = Criteria::ASC) Order by the Status column
 * @method MultiThreadCacheQuery orderByVariables($order = Criteria::ASC) Order by the Variables column
 * @method MultiThreadCacheQuery orderByOutput($order = Criteria::ASC) Order by the Output column
 *
 * @method MultiThreadCacheQuery groupByMultithreadcacheid() Group by the MultiThreadCacheId column
 * @method MultiThreadCacheQuery groupByBatchidentifier() Group by the BatchIdentifier column
 * @method MultiThreadCacheQuery groupByTimelimit() Group by the TimeLimit column
 * @method MultiThreadCacheQuery groupByPid() Group by the Pid column
 * @method MultiThreadCacheQuery groupByStatus() Group by the Status column
 * @method MultiThreadCacheQuery groupByVariables() Group by the Variables column
 * @method MultiThreadCacheQuery groupByOutput() Group by the Output column
 *
 * @method MultiThreadCacheQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MultiThreadCacheQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MultiThreadCacheQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MultiThreadCache findOne(PropelPDO $con = null) Return the first MultiThreadCache matching the query
 * @method MultiThreadCache findOneOrCreate(PropelPDO $con = null) Return the first MultiThreadCache matching the query, or a new MultiThreadCache object populated from the query conditions when no match is found
 *
 * @method MultiThreadCache findOneByBatchidentifier(string $BatchIdentifier) Return the first MultiThreadCache filtered by the BatchIdentifier column
 * @method MultiThreadCache findOneByTimelimit(int $TimeLimit) Return the first MultiThreadCache filtered by the TimeLimit column
 * @method MultiThreadCache findOneByPid(int $Pid) Return the first MultiThreadCache filtered by the Pid column
 * @method MultiThreadCache findOneByStatus(boolean $Status) Return the first MultiThreadCache filtered by the Status column
 * @method MultiThreadCache findOneByVariables(string $Variables) Return the first MultiThreadCache filtered by the Variables column
 * @method MultiThreadCache findOneByOutput(string $Output) Return the first MultiThreadCache filtered by the Output column
 *
 * @method array findByMultithreadcacheid(int $MultiThreadCacheId) Return MultiThreadCache objects filtered by the MultiThreadCacheId column
 * @method array findByBatchidentifier(string $BatchIdentifier) Return MultiThreadCache objects filtered by the BatchIdentifier column
 * @method array findByTimelimit(int $TimeLimit) Return MultiThreadCache objects filtered by the TimeLimit column
 * @method array findByPid(int $Pid) Return MultiThreadCache objects filtered by the Pid column
 * @method array findByStatus(boolean $Status) Return MultiThreadCache objects filtered by the Status column
 * @method array findByVariables(string $Variables) Return MultiThreadCache objects filtered by the Variables column
 * @method array findByOutput(string $Output) Return MultiThreadCache objects filtered by the Output column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseMultiThreadCacheQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMultiThreadCacheQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'MultiThreadCache', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MultiThreadCacheQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MultiThreadCacheQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MultiThreadCacheQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MultiThreadCacheQuery) {
            return $criteria;
        }
        $query = new MultiThreadCacheQuery();
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
     * @return   MultiThreadCache|MultiThreadCache[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MultiThreadCachePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MultiThreadCachePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MultiThreadCache A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByMultithreadcacheid($key, $con = null)
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
     * @return                 MultiThreadCache A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `MultiThreadCacheId`, `BatchIdentifier`, `TimeLimit`, `Pid`, `Status`, `Variables`, `Output` FROM `MultiThreadCache` WHERE `MultiThreadCacheId` = :p0';
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
            $obj = new MultiThreadCache();
            $obj->hydrate($row);
            MultiThreadCachePeer::addInstanceToPool($obj, (string) $key);
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
     * @return MultiThreadCache|MultiThreadCache[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MultiThreadCache[]|mixed the list of results, formatted by the current formatter
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
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MultiThreadCachePeer::MULTITHREADCACHEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MultiThreadCachePeer::MULTITHREADCACHEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the MultiThreadCacheId column
     *
     * Example usage:
     * <code>
     * $query->filterByMultithreadcacheid(1234); // WHERE MultiThreadCacheId = 1234
     * $query->filterByMultithreadcacheid(array(12, 34)); // WHERE MultiThreadCacheId IN (12, 34)
     * $query->filterByMultithreadcacheid(array('min' => 12)); // WHERE MultiThreadCacheId >= 12
     * $query->filterByMultithreadcacheid(array('max' => 12)); // WHERE MultiThreadCacheId <= 12
     * </code>
     *
     * @param     mixed $multithreadcacheid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByMultithreadcacheid($multithreadcacheid = null, $comparison = null)
    {
        if (is_array($multithreadcacheid)) {
            $useMinMax = false;
            if (isset($multithreadcacheid['min'])) {
                $this->addUsingAlias(MultiThreadCachePeer::MULTITHREADCACHEID, $multithreadcacheid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($multithreadcacheid['max'])) {
                $this->addUsingAlias(MultiThreadCachePeer::MULTITHREADCACHEID, $multithreadcacheid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MultiThreadCachePeer::MULTITHREADCACHEID, $multithreadcacheid, $comparison);
    }

    /**
     * Filter the query on the BatchIdentifier column
     *
     * Example usage:
     * <code>
     * $query->filterByBatchidentifier('fooValue');   // WHERE BatchIdentifier = 'fooValue'
     * $query->filterByBatchidentifier('%fooValue%'); // WHERE BatchIdentifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $batchidentifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByBatchidentifier($batchidentifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($batchidentifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $batchidentifier)) {
                $batchidentifier = str_replace('*', '%', $batchidentifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MultiThreadCachePeer::BATCHIDENTIFIER, $batchidentifier, $comparison);
    }

    /**
     * Filter the query on the TimeLimit column
     *
     * Example usage:
     * <code>
     * $query->filterByTimelimit(1234); // WHERE TimeLimit = 1234
     * $query->filterByTimelimit(array(12, 34)); // WHERE TimeLimit IN (12, 34)
     * $query->filterByTimelimit(array('min' => 12)); // WHERE TimeLimit >= 12
     * $query->filterByTimelimit(array('max' => 12)); // WHERE TimeLimit <= 12
     * </code>
     *
     * @param     mixed $timelimit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByTimelimit($timelimit = null, $comparison = null)
    {
        if (is_array($timelimit)) {
            $useMinMax = false;
            if (isset($timelimit['min'])) {
                $this->addUsingAlias(MultiThreadCachePeer::TIMELIMIT, $timelimit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timelimit['max'])) {
                $this->addUsingAlias(MultiThreadCachePeer::TIMELIMIT, $timelimit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MultiThreadCachePeer::TIMELIMIT, $timelimit, $comparison);
    }

    /**
     * Filter the query on the Pid column
     *
     * Example usage:
     * <code>
     * $query->filterByPid(1234); // WHERE Pid = 1234
     * $query->filterByPid(array(12, 34)); // WHERE Pid IN (12, 34)
     * $query->filterByPid(array('min' => 12)); // WHERE Pid >= 12
     * $query->filterByPid(array('max' => 12)); // WHERE Pid <= 12
     * </code>
     *
     * @param     mixed $pid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByPid($pid = null, $comparison = null)
    {
        if (is_array($pid)) {
            $useMinMax = false;
            if (isset($pid['min'])) {
                $this->addUsingAlias(MultiThreadCachePeer::PID, $pid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pid['max'])) {
                $this->addUsingAlias(MultiThreadCachePeer::PID, $pid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MultiThreadCachePeer::PID, $pid, $comparison);
    }

    /**
     * Filter the query on the Status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE Status = true
     * $query->filterByStatus('yes'); // WHERE Status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(MultiThreadCachePeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the Variables column
     *
     * Example usage:
     * <code>
     * $query->filterByVariables('fooValue');   // WHERE Variables = 'fooValue'
     * $query->filterByVariables('%fooValue%'); // WHERE Variables LIKE '%fooValue%'
     * </code>
     *
     * @param     string $variables The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByVariables($variables = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($variables)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $variables)) {
                $variables = str_replace('*', '%', $variables);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MultiThreadCachePeer::VARIABLES, $variables, $comparison);
    }

    /**
     * Filter the query on the Output column
     *
     * Example usage:
     * <code>
     * $query->filterByOutput('fooValue');   // WHERE Output = 'fooValue'
     * $query->filterByOutput('%fooValue%'); // WHERE Output LIKE '%fooValue%'
     * </code>
     *
     * @param     string $output The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function filterByOutput($output = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($output)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $output)) {
                $output = str_replace('*', '%', $output);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MultiThreadCachePeer::OUTPUT, $output, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   MultiThreadCache $multiThreadCache Object to remove from the list of results
     *
     * @return MultiThreadCacheQuery The current query, for fluid interface
     */
    public function prune($multiThreadCache = null)
    {
        if ($multiThreadCache) {
            $this->addUsingAlias(MultiThreadCachePeer::MULTITHREADCACHEID, $multiThreadCache->getMultithreadcacheid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
