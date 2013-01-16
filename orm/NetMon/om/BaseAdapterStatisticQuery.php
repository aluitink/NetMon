<?php


/**
 * Base class that represents a query for the 'AdapterStatistic' table.
 *
 *
 *
 * @method AdapterStatisticQuery orderByAdapterstatisticid($order = Criteria::ASC) Order by the AdapterStatisticId column
 * @method AdapterStatisticQuery orderByAdapterid($order = Criteria::ASC) Order by the AdapterId column
 * @method AdapterStatisticQuery orderByInoctets($order = Criteria::ASC) Order by the InOctets column
 * @method AdapterStatisticQuery orderByOutoctets($order = Criteria::ASC) Order by the OutOctets column
 * @method AdapterStatisticQuery orderByInpackets($order = Criteria::ASC) Order by the InPackets column
 * @method AdapterStatisticQuery orderByOutpackets($order = Criteria::ASC) Order by the OutPackets column
 *
 * @method AdapterStatisticQuery groupByAdapterstatisticid() Group by the AdapterStatisticId column
 * @method AdapterStatisticQuery groupByAdapterid() Group by the AdapterId column
 * @method AdapterStatisticQuery groupByInoctets() Group by the InOctets column
 * @method AdapterStatisticQuery groupByOutoctets() Group by the OutOctets column
 * @method AdapterStatisticQuery groupByInpackets() Group by the InPackets column
 * @method AdapterStatisticQuery groupByOutpackets() Group by the OutPackets column
 *
 * @method AdapterStatisticQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AdapterStatisticQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AdapterStatisticQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AdapterStatisticQuery leftJoinAdapter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Adapter relation
 * @method AdapterStatisticQuery rightJoinAdapter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Adapter relation
 * @method AdapterStatisticQuery innerJoinAdapter($relationAlias = null) Adds a INNER JOIN clause to the query using the Adapter relation
 *
 * @method AdapterStatistic findOne(PropelPDO $con = null) Return the first AdapterStatistic matching the query
 * @method AdapterStatistic findOneOrCreate(PropelPDO $con = null) Return the first AdapterStatistic matching the query, or a new AdapterStatistic object populated from the query conditions when no match is found
 *
 * @method AdapterStatistic findOneByAdapterid(int $AdapterId) Return the first AdapterStatistic filtered by the AdapterId column
 * @method AdapterStatistic findOneByInoctets(int $InOctets) Return the first AdapterStatistic filtered by the InOctets column
 * @method AdapterStatistic findOneByOutoctets(int $OutOctets) Return the first AdapterStatistic filtered by the OutOctets column
 * @method AdapterStatistic findOneByInpackets(int $InPackets) Return the first AdapterStatistic filtered by the InPackets column
 * @method AdapterStatistic findOneByOutpackets(int $OutPackets) Return the first AdapterStatistic filtered by the OutPackets column
 *
 * @method array findByAdapterstatisticid(int $AdapterStatisticId) Return AdapterStatistic objects filtered by the AdapterStatisticId column
 * @method array findByAdapterid(int $AdapterId) Return AdapterStatistic objects filtered by the AdapterId column
 * @method array findByInoctets(int $InOctets) Return AdapterStatistic objects filtered by the InOctets column
 * @method array findByOutoctets(int $OutOctets) Return AdapterStatistic objects filtered by the OutOctets column
 * @method array findByInpackets(int $InPackets) Return AdapterStatistic objects filtered by the InPackets column
 * @method array findByOutpackets(int $OutPackets) Return AdapterStatistic objects filtered by the OutPackets column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseAdapterStatisticQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAdapterStatisticQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'AdapterStatistic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AdapterStatisticQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AdapterStatisticQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AdapterStatisticQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AdapterStatisticQuery) {
            return $criteria;
        }
        $query = new AdapterStatisticQuery();
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
     * @return   AdapterStatistic|AdapterStatistic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AdapterStatisticPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AdapterStatisticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AdapterStatistic A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAdapterstatisticid($key, $con = null)
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
     * @return                 AdapterStatistic A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `AdapterStatisticId`, `AdapterId`, `InOctets`, `OutOctets`, `InPackets`, `OutPackets` FROM `AdapterStatistic` WHERE `AdapterStatisticId` = :p0';
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
            $obj = new AdapterStatistic();
            $obj->hydrate($row);
            AdapterStatisticPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AdapterStatistic|AdapterStatistic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AdapterStatistic[]|mixed the list of results, formatted by the current formatter
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
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdapterStatisticPeer::ADAPTERSTATISTICID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdapterStatisticPeer::ADAPTERSTATISTICID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the AdapterStatisticId column
     *
     * Example usage:
     * <code>
     * $query->filterByAdapterstatisticid(1234); // WHERE AdapterStatisticId = 1234
     * $query->filterByAdapterstatisticid(array(12, 34)); // WHERE AdapterStatisticId IN (12, 34)
     * $query->filterByAdapterstatisticid(array('min' => 12)); // WHERE AdapterStatisticId >= 12
     * $query->filterByAdapterstatisticid(array('max' => 12)); // WHERE AdapterStatisticId <= 12
     * </code>
     *
     * @param     mixed $adapterstatisticid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByAdapterstatisticid($adapterstatisticid = null, $comparison = null)
    {
        if (is_array($adapterstatisticid)) {
            $useMinMax = false;
            if (isset($adapterstatisticid['min'])) {
                $this->addUsingAlias(AdapterStatisticPeer::ADAPTERSTATISTICID, $adapterstatisticid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adapterstatisticid['max'])) {
                $this->addUsingAlias(AdapterStatisticPeer::ADAPTERSTATISTICID, $adapterstatisticid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterStatisticPeer::ADAPTERSTATISTICID, $adapterstatisticid, $comparison);
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
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByAdapterid($adapterid = null, $comparison = null)
    {
        if (is_array($adapterid)) {
            $useMinMax = false;
            if (isset($adapterid['min'])) {
                $this->addUsingAlias(AdapterStatisticPeer::ADAPTERID, $adapterid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adapterid['max'])) {
                $this->addUsingAlias(AdapterStatisticPeer::ADAPTERID, $adapterid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterStatisticPeer::ADAPTERID, $adapterid, $comparison);
    }

    /**
     * Filter the query on the InOctets column
     *
     * Example usage:
     * <code>
     * $query->filterByInoctets(1234); // WHERE InOctets = 1234
     * $query->filterByInoctets(array(12, 34)); // WHERE InOctets IN (12, 34)
     * $query->filterByInoctets(array('min' => 12)); // WHERE InOctets >= 12
     * $query->filterByInoctets(array('max' => 12)); // WHERE InOctets <= 12
     * </code>
     *
     * @param     mixed $inoctets The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByInoctets($inoctets = null, $comparison = null)
    {
        if (is_array($inoctets)) {
            $useMinMax = false;
            if (isset($inoctets['min'])) {
                $this->addUsingAlias(AdapterStatisticPeer::INOCTETS, $inoctets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inoctets['max'])) {
                $this->addUsingAlias(AdapterStatisticPeer::INOCTETS, $inoctets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterStatisticPeer::INOCTETS, $inoctets, $comparison);
    }

    /**
     * Filter the query on the OutOctets column
     *
     * Example usage:
     * <code>
     * $query->filterByOutoctets(1234); // WHERE OutOctets = 1234
     * $query->filterByOutoctets(array(12, 34)); // WHERE OutOctets IN (12, 34)
     * $query->filterByOutoctets(array('min' => 12)); // WHERE OutOctets >= 12
     * $query->filterByOutoctets(array('max' => 12)); // WHERE OutOctets <= 12
     * </code>
     *
     * @param     mixed $outoctets The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByOutoctets($outoctets = null, $comparison = null)
    {
        if (is_array($outoctets)) {
            $useMinMax = false;
            if (isset($outoctets['min'])) {
                $this->addUsingAlias(AdapterStatisticPeer::OUTOCTETS, $outoctets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outoctets['max'])) {
                $this->addUsingAlias(AdapterStatisticPeer::OUTOCTETS, $outoctets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterStatisticPeer::OUTOCTETS, $outoctets, $comparison);
    }

    /**
     * Filter the query on the InPackets column
     *
     * Example usage:
     * <code>
     * $query->filterByInpackets(1234); // WHERE InPackets = 1234
     * $query->filterByInpackets(array(12, 34)); // WHERE InPackets IN (12, 34)
     * $query->filterByInpackets(array('min' => 12)); // WHERE InPackets >= 12
     * $query->filterByInpackets(array('max' => 12)); // WHERE InPackets <= 12
     * </code>
     *
     * @param     mixed $inpackets The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByInpackets($inpackets = null, $comparison = null)
    {
        if (is_array($inpackets)) {
            $useMinMax = false;
            if (isset($inpackets['min'])) {
                $this->addUsingAlias(AdapterStatisticPeer::INPACKETS, $inpackets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inpackets['max'])) {
                $this->addUsingAlias(AdapterStatisticPeer::INPACKETS, $inpackets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterStatisticPeer::INPACKETS, $inpackets, $comparison);
    }

    /**
     * Filter the query on the OutPackets column
     *
     * Example usage:
     * <code>
     * $query->filterByOutpackets(1234); // WHERE OutPackets = 1234
     * $query->filterByOutpackets(array(12, 34)); // WHERE OutPackets IN (12, 34)
     * $query->filterByOutpackets(array('min' => 12)); // WHERE OutPackets >= 12
     * $query->filterByOutpackets(array('max' => 12)); // WHERE OutPackets <= 12
     * </code>
     *
     * @param     mixed $outpackets The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function filterByOutpackets($outpackets = null, $comparison = null)
    {
        if (is_array($outpackets)) {
            $useMinMax = false;
            if (isset($outpackets['min'])) {
                $this->addUsingAlias(AdapterStatisticPeer::OUTPACKETS, $outpackets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outpackets['max'])) {
                $this->addUsingAlias(AdapterStatisticPeer::OUTPACKETS, $outpackets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterStatisticPeer::OUTPACKETS, $outpackets, $comparison);
    }

    /**
     * Filter the query by a related Adapter object
     *
     * @param   Adapter|PropelObjectCollection $adapter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdapterStatisticQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapter($adapter, $comparison = null)
    {
        if ($adapter instanceof Adapter) {
            return $this
                ->addUsingAlias(AdapterStatisticPeer::ADAPTERID, $adapter->getAdapterid(), $comparison);
        } elseif ($adapter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdapterStatisticPeer::ADAPTERID, $adapter->toKeyValue('PrimaryKey', 'Adapterid'), $comparison);
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
     * @return AdapterStatisticQuery The current query, for fluid interface
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
     * @param   AdapterStatistic $adapterStatistic Object to remove from the list of results
     *
     * @return AdapterStatisticQuery The current query, for fluid interface
     */
    public function prune($adapterStatistic = null)
    {
        if ($adapterStatistic) {
            $this->addUsingAlias(AdapterStatisticPeer::ADAPTERSTATISTICID, $adapterStatistic->getAdapterstatisticid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
