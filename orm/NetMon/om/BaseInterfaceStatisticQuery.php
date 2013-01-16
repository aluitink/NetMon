<?php


/**
 * Base class that represents a query for the 'InterfaceStatistic' table.
 *
 *
 *
 * @method InterfaceStatisticQuery orderByInterfacestatisticid($order = Criteria::ASC) Order by the InterfaceStatisticId column
 * @method InterfaceStatisticQuery orderByInterfaceid($order = Criteria::ASC) Order by the InterfaceId column
 * @method InterfaceStatisticQuery orderByInoctets($order = Criteria::ASC) Order by the InOctets column
 * @method InterfaceStatisticQuery orderByOutoctets($order = Criteria::ASC) Order by the OutOctets column
 * @method InterfaceStatisticQuery orderByInpackets($order = Criteria::ASC) Order by the InPackets column
 * @method InterfaceStatisticQuery orderByOutpackets($order = Criteria::ASC) Order by the OutPackets column
 *
 * @method InterfaceStatisticQuery groupByInterfacestatisticid() Group by the InterfaceStatisticId column
 * @method InterfaceStatisticQuery groupByInterfaceid() Group by the InterfaceId column
 * @method InterfaceStatisticQuery groupByInoctets() Group by the InOctets column
 * @method InterfaceStatisticQuery groupByOutoctets() Group by the OutOctets column
 * @method InterfaceStatisticQuery groupByInpackets() Group by the InPackets column
 * @method InterfaceStatisticQuery groupByOutpackets() Group by the OutPackets column
 *
 * @method InterfaceStatisticQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method InterfaceStatisticQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method InterfaceStatisticQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method InterfaceStatisticQuery leftJoinInterface($relationAlias = null) Adds a LEFT JOIN clause to the query using the Interface relation
 * @method InterfaceStatisticQuery rightJoinInterface($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Interface relation
 * @method InterfaceStatisticQuery innerJoinInterface($relationAlias = null) Adds a INNER JOIN clause to the query using the Interface relation
 *
 * @method InterfaceStatistic findOne(PropelPDO $con = null) Return the first InterfaceStatistic matching the query
 * @method InterfaceStatistic findOneOrCreate(PropelPDO $con = null) Return the first InterfaceStatistic matching the query, or a new InterfaceStatistic object populated from the query conditions when no match is found
 *
 * @method InterfaceStatistic findOneByInterfaceid(int $InterfaceId) Return the first InterfaceStatistic filtered by the InterfaceId column
 * @method InterfaceStatistic findOneByInoctets(int $InOctets) Return the first InterfaceStatistic filtered by the InOctets column
 * @method InterfaceStatistic findOneByOutoctets(int $OutOctets) Return the first InterfaceStatistic filtered by the OutOctets column
 * @method InterfaceStatistic findOneByInpackets(int $InPackets) Return the first InterfaceStatistic filtered by the InPackets column
 * @method InterfaceStatistic findOneByOutpackets(int $OutPackets) Return the first InterfaceStatistic filtered by the OutPackets column
 *
 * @method array findByInterfacestatisticid(int $InterfaceStatisticId) Return InterfaceStatistic objects filtered by the InterfaceStatisticId column
 * @method array findByInterfaceid(int $InterfaceId) Return InterfaceStatistic objects filtered by the InterfaceId column
 * @method array findByInoctets(int $InOctets) Return InterfaceStatistic objects filtered by the InOctets column
 * @method array findByOutoctets(int $OutOctets) Return InterfaceStatistic objects filtered by the OutOctets column
 * @method array findByInpackets(int $InPackets) Return InterfaceStatistic objects filtered by the InPackets column
 * @method array findByOutpackets(int $OutPackets) Return InterfaceStatistic objects filtered by the OutPackets column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseInterfaceStatisticQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseInterfaceStatisticQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'InterfaceStatistic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new InterfaceStatisticQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   InterfaceStatisticQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return InterfaceStatisticQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof InterfaceStatisticQuery) {
            return $criteria;
        }
        $query = new InterfaceStatisticQuery();
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
     * @return   InterfaceStatistic|InterfaceStatistic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InterfaceStatisticPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(InterfaceStatisticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 InterfaceStatistic A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByInterfacestatisticid($key, $con = null)
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
     * @return                 InterfaceStatistic A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `InterfaceStatisticId`, `InterfaceId`, `InOctets`, `OutOctets`, `InPackets`, `OutPackets` FROM `InterfaceStatistic` WHERE `InterfaceStatisticId` = :p0';
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
            $obj = new InterfaceStatistic();
            $obj->hydrate($row);
            InterfaceStatisticPeer::addInstanceToPool($obj, (string) $key);
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
     * @return InterfaceStatistic|InterfaceStatistic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|InterfaceStatistic[]|mixed the list of results, formatted by the current formatter
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
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InterfaceStatisticPeer::INTERFACESTATISTICID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InterfaceStatisticPeer::INTERFACESTATISTICID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the InterfaceStatisticId column
     *
     * Example usage:
     * <code>
     * $query->filterByInterfacestatisticid(1234); // WHERE InterfaceStatisticId = 1234
     * $query->filterByInterfacestatisticid(array(12, 34)); // WHERE InterfaceStatisticId IN (12, 34)
     * $query->filterByInterfacestatisticid(array('min' => 12)); // WHERE InterfaceStatisticId >= 12
     * $query->filterByInterfacestatisticid(array('max' => 12)); // WHERE InterfaceStatisticId <= 12
     * </code>
     *
     * @param     mixed $interfacestatisticid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByInterfacestatisticid($interfacestatisticid = null, $comparison = null)
    {
        if (is_array($interfacestatisticid)) {
            $useMinMax = false;
            if (isset($interfacestatisticid['min'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INTERFACESTATISTICID, $interfacestatisticid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interfacestatisticid['max'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INTERFACESTATISTICID, $interfacestatisticid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfaceStatisticPeer::INTERFACESTATISTICID, $interfacestatisticid, $comparison);
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
     * @see       filterByInterface()
     *
     * @param     mixed $interfaceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByInterfaceid($interfaceid = null, $comparison = null)
    {
        if (is_array($interfaceid)) {
            $useMinMax = false;
            if (isset($interfaceid['min'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INTERFACEID, $interfaceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interfaceid['max'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INTERFACEID, $interfaceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfaceStatisticPeer::INTERFACEID, $interfaceid, $comparison);
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
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByInoctets($inoctets = null, $comparison = null)
    {
        if (is_array($inoctets)) {
            $useMinMax = false;
            if (isset($inoctets['min'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INOCTETS, $inoctets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inoctets['max'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INOCTETS, $inoctets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfaceStatisticPeer::INOCTETS, $inoctets, $comparison);
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
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByOutoctets($outoctets = null, $comparison = null)
    {
        if (is_array($outoctets)) {
            $useMinMax = false;
            if (isset($outoctets['min'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::OUTOCTETS, $outoctets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outoctets['max'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::OUTOCTETS, $outoctets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfaceStatisticPeer::OUTOCTETS, $outoctets, $comparison);
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
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByInpackets($inpackets = null, $comparison = null)
    {
        if (is_array($inpackets)) {
            $useMinMax = false;
            if (isset($inpackets['min'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INPACKETS, $inpackets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inpackets['max'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::INPACKETS, $inpackets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfaceStatisticPeer::INPACKETS, $inpackets, $comparison);
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
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function filterByOutpackets($outpackets = null, $comparison = null)
    {
        if (is_array($outpackets)) {
            $useMinMax = false;
            if (isset($outpackets['min'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::OUTPACKETS, $outpackets['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outpackets['max'])) {
                $this->addUsingAlias(InterfaceStatisticPeer::OUTPACKETS, $outpackets['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfaceStatisticPeer::OUTPACKETS, $outpackets, $comparison);
    }

    /**
     * Filter the query by a related Interface object
     *
     * @param   Interface|PropelObjectCollection $interface The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InterfaceStatisticQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInterface($interface, $comparison = null)
    {
        if ($interface instanceof Interface) {
            return $this
                ->addUsingAlias(InterfaceStatisticPeer::INTERFACEID, $interface->getInterfaceid(), $comparison);
        } elseif ($interface instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InterfaceStatisticPeer::INTERFACEID, $interface->toKeyValue('PrimaryKey', 'Interfaceid'), $comparison);
        } else {
            throw new PropelException('filterByInterface() only accepts arguments of type Interface or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Interface relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function joinInterface($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Interface');

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
            $this->addJoinObject($join, 'Interface');
        }

        return $this;
    }

    /**
     * Use the Interface relation Interface object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   InterfaceQuery A secondary query class using the current class as primary query
     */
    public function useInterfaceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInterface($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Interface', 'InterfaceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   InterfaceStatistic $interfaceStatistic Object to remove from the list of results
     *
     * @return InterfaceStatisticQuery The current query, for fluid interface
     */
    public function prune($interfaceStatistic = null)
    {
        if ($interfaceStatistic) {
            $this->addUsingAlias(InterfaceStatisticPeer::INTERFACESTATISTICID, $interfaceStatistic->getInterfacestatisticid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
