<?php


/**
 * Base class that represents a query for the 'PortStatus' table.
 *
 *
 *
 * @method PortStatusQuery orderByPortstatusid($order = Criteria::ASC) Order by the PortStatusId column
 * @method PortStatusQuery orderByAdapterid($order = Criteria::ASC) Order by the AdapterId column
 * @method PortStatusQuery orderByProtocol($order = Criteria::ASC) Order by the Protocol column
 * @method PortStatusQuery orderByPort($order = Criteria::ASC) Order by the Port column
 * @method PortStatusQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method PortStatusQuery orderByProduct($order = Criteria::ASC) Order by the Product column
 * @method PortStatusQuery orderByVersion($order = Criteria::ASC) Order by the Version column
 * @method PortStatusQuery orderByState($order = Criteria::ASC) Order by the State column
 *
 * @method PortStatusQuery groupByPortstatusid() Group by the PortStatusId column
 * @method PortStatusQuery groupByAdapterid() Group by the AdapterId column
 * @method PortStatusQuery groupByProtocol() Group by the Protocol column
 * @method PortStatusQuery groupByPort() Group by the Port column
 * @method PortStatusQuery groupByName() Group by the Name column
 * @method PortStatusQuery groupByProduct() Group by the Product column
 * @method PortStatusQuery groupByVersion() Group by the Version column
 * @method PortStatusQuery groupByState() Group by the State column
 *
 * @method PortStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PortStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PortStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PortStatusQuery leftJoinAdapter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Adapter relation
 * @method PortStatusQuery rightJoinAdapter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Adapter relation
 * @method PortStatusQuery innerJoinAdapter($relationAlias = null) Adds a INNER JOIN clause to the query using the Adapter relation
 *
 * @method PortStatus findOne(PropelPDO $con = null) Return the first PortStatus matching the query
 * @method PortStatus findOneOrCreate(PropelPDO $con = null) Return the first PortStatus matching the query, or a new PortStatus object populated from the query conditions when no match is found
 *
 * @method PortStatus findOneByAdapterid(int $AdapterId) Return the first PortStatus filtered by the AdapterId column
 * @method PortStatus findOneByProtocol(string $Protocol) Return the first PortStatus filtered by the Protocol column
 * @method PortStatus findOneByPort(int $Port) Return the first PortStatus filtered by the Port column
 * @method PortStatus findOneByName(string $Name) Return the first PortStatus filtered by the Name column
 * @method PortStatus findOneByProduct(string $Product) Return the first PortStatus filtered by the Product column
 * @method PortStatus findOneByVersion(string $Version) Return the first PortStatus filtered by the Version column
 * @method PortStatus findOneByState(boolean $State) Return the first PortStatus filtered by the State column
 *
 * @method array findByPortstatusid(int $PortStatusId) Return PortStatus objects filtered by the PortStatusId column
 * @method array findByAdapterid(int $AdapterId) Return PortStatus objects filtered by the AdapterId column
 * @method array findByProtocol(string $Protocol) Return PortStatus objects filtered by the Protocol column
 * @method array findByPort(int $Port) Return PortStatus objects filtered by the Port column
 * @method array findByName(string $Name) Return PortStatus objects filtered by the Name column
 * @method array findByProduct(string $Product) Return PortStatus objects filtered by the Product column
 * @method array findByVersion(string $Version) Return PortStatus objects filtered by the Version column
 * @method array findByState(boolean $State) Return PortStatus objects filtered by the State column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BasePortStatusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePortStatusQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'PortStatus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PortStatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PortStatusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PortStatusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PortStatusQuery) {
            return $criteria;
        }
        $query = new PortStatusQuery();
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
     * @return   PortStatus|PortStatus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PortStatusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PortStatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PortStatus A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPortstatusid($key, $con = null)
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
     * @return                 PortStatus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PortStatusId`, `AdapterId`, `Protocol`, `Port`, `Name`, `Product`, `Version`, `State` FROM `PortStatus` WHERE `PortStatusId` = :p0';
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
            $obj = new PortStatus();
            $obj->hydrate($row);
            PortStatusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PortStatus|PortStatus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PortStatus[]|mixed the list of results, formatted by the current formatter
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
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PortStatusPeer::PORTSTATUSID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PortStatusPeer::PORTSTATUSID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the PortStatusId column
     *
     * Example usage:
     * <code>
     * $query->filterByPortstatusid(1234); // WHERE PortStatusId = 1234
     * $query->filterByPortstatusid(array(12, 34)); // WHERE PortStatusId IN (12, 34)
     * $query->filterByPortstatusid(array('min' => 12)); // WHERE PortStatusId >= 12
     * $query->filterByPortstatusid(array('max' => 12)); // WHERE PortStatusId <= 12
     * </code>
     *
     * @param     mixed $portstatusid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByPortstatusid($portstatusid = null, $comparison = null)
    {
        if (is_array($portstatusid)) {
            $useMinMax = false;
            if (isset($portstatusid['min'])) {
                $this->addUsingAlias(PortStatusPeer::PORTSTATUSID, $portstatusid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($portstatusid['max'])) {
                $this->addUsingAlias(PortStatusPeer::PORTSTATUSID, $portstatusid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PortStatusPeer::PORTSTATUSID, $portstatusid, $comparison);
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
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByAdapterid($adapterid = null, $comparison = null)
    {
        if (is_array($adapterid)) {
            $useMinMax = false;
            if (isset($adapterid['min'])) {
                $this->addUsingAlias(PortStatusPeer::ADAPTERID, $adapterid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adapterid['max'])) {
                $this->addUsingAlias(PortStatusPeer::ADAPTERID, $adapterid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PortStatusPeer::ADAPTERID, $adapterid, $comparison);
    }

    /**
     * Filter the query on the Protocol column
     *
     * Example usage:
     * <code>
     * $query->filterByProtocol('fooValue');   // WHERE Protocol = 'fooValue'
     * $query->filterByProtocol('%fooValue%'); // WHERE Protocol LIKE '%fooValue%'
     * </code>
     *
     * @param     string $protocol The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByProtocol($protocol = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($protocol)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $protocol)) {
                $protocol = str_replace('*', '%', $protocol);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PortStatusPeer::PROTOCOL, $protocol, $comparison);
    }

    /**
     * Filter the query on the Port column
     *
     * Example usage:
     * <code>
     * $query->filterByPort(1234); // WHERE Port = 1234
     * $query->filterByPort(array(12, 34)); // WHERE Port IN (12, 34)
     * $query->filterByPort(array('min' => 12)); // WHERE Port >= 12
     * $query->filterByPort(array('max' => 12)); // WHERE Port <= 12
     * </code>
     *
     * @param     mixed $port The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByPort($port = null, $comparison = null)
    {
        if (is_array($port)) {
            $useMinMax = false;
            if (isset($port['min'])) {
                $this->addUsingAlias(PortStatusPeer::PORT, $port['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($port['max'])) {
                $this->addUsingAlias(PortStatusPeer::PORT, $port['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PortStatusPeer::PORT, $port, $comparison);
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
     * @return PortStatusQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PortStatusPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the Product column
     *
     * Example usage:
     * <code>
     * $query->filterByProduct('fooValue');   // WHERE Product = 'fooValue'
     * $query->filterByProduct('%fooValue%'); // WHERE Product LIKE '%fooValue%'
     * </code>
     *
     * @param     string $product The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByProduct($product = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($product)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $product)) {
                $product = str_replace('*', '%', $product);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PortStatusPeer::PRODUCT, $product, $comparison);
    }

    /**
     * Filter the query on the Version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion('fooValue');   // WHERE Version = 'fooValue'
     * $query->filterByVersion('%fooValue%'); // WHERE Version LIKE '%fooValue%'
     * </code>
     *
     * @param     string $version The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($version)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $version)) {
                $version = str_replace('*', '%', $version);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PortStatusPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the State column
     *
     * Example usage:
     * <code>
     * $query->filterByState(true); // WHERE State = true
     * $query->filterByState('yes'); // WHERE State = true
     * </code>
     *
     * @param     boolean|string $state The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (is_string($state)) {
            $state = in_array(strtolower($state), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PortStatusPeer::STATE, $state, $comparison);
    }

    /**
     * Filter the query by a related Adapter object
     *
     * @param   Adapter|PropelObjectCollection $adapter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PortStatusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapter($adapter, $comparison = null)
    {
        if ($adapter instanceof Adapter) {
            return $this
                ->addUsingAlias(PortStatusPeer::ADAPTERID, $adapter->getAdapterid(), $comparison);
        } elseif ($adapter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PortStatusPeer::ADAPTERID, $adapter->toKeyValue('PrimaryKey', 'Adapterid'), $comparison);
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
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function joinAdapter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useAdapterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdapter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Adapter', 'AdapterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PortStatus $portStatus Object to remove from the list of results
     *
     * @return PortStatusQuery The current query, for fluid interface
     */
    public function prune($portStatus = null)
    {
        if ($portStatus) {
            $this->addUsingAlias(PortStatusPeer::PORTSTATUSID, $portStatus->getPortstatusid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
