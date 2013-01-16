<?php


/**
 * Base class that represents a query for the 'AdapterType' table.
 *
 *
 *
 * @method AdapterTypeQuery orderByAdaptertypeid($order = Criteria::ASC) Order by the AdapterTypeId column
 * @method AdapterTypeQuery orderByType($order = Criteria::ASC) Order by the Type column
 *
 * @method AdapterTypeQuery groupByAdaptertypeid() Group by the AdapterTypeId column
 * @method AdapterTypeQuery groupByType() Group by the Type column
 *
 * @method AdapterTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AdapterTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AdapterTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AdapterTypeQuery leftJoinAdapterAdapterType($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdapterAdapterType relation
 * @method AdapterTypeQuery rightJoinAdapterAdapterType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdapterAdapterType relation
 * @method AdapterTypeQuery innerJoinAdapterAdapterType($relationAlias = null) Adds a INNER JOIN clause to the query using the AdapterAdapterType relation
 *
 * @method AdapterType findOne(PropelPDO $con = null) Return the first AdapterType matching the query
 * @method AdapterType findOneOrCreate(PropelPDO $con = null) Return the first AdapterType matching the query, or a new AdapterType object populated from the query conditions when no match is found
 *
 * @method AdapterType findOneByType(string $Type) Return the first AdapterType filtered by the Type column
 *
 * @method array findByAdaptertypeid(int $AdapterTypeId) Return AdapterType objects filtered by the AdapterTypeId column
 * @method array findByType(string $Type) Return AdapterType objects filtered by the Type column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseAdapterTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAdapterTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'AdapterType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AdapterTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AdapterTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AdapterTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AdapterTypeQuery) {
            return $criteria;
        }
        $query = new AdapterTypeQuery();
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
     * @return   AdapterType|AdapterType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AdapterTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AdapterTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AdapterType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAdaptertypeid($key, $con = null)
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
     * @return                 AdapterType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `AdapterTypeId`, `Type` FROM `AdapterType` WHERE `AdapterTypeId` = :p0';
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
            $obj = new AdapterType();
            $obj->hydrate($row);
            AdapterTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return AdapterType|AdapterType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AdapterType[]|mixed the list of results, formatted by the current formatter
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
     * @return AdapterTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdapterTypePeer::ADAPTERTYPEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AdapterTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdapterTypePeer::ADAPTERTYPEID, $keys, Criteria::IN);
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
     * @param     mixed $adaptertypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterTypeQuery The current query, for fluid interface
     */
    public function filterByAdaptertypeid($adaptertypeid = null, $comparison = null)
    {
        if (is_array($adaptertypeid)) {
            $useMinMax = false;
            if (isset($adaptertypeid['min'])) {
                $this->addUsingAlias(AdapterTypePeer::ADAPTERTYPEID, $adaptertypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adaptertypeid['max'])) {
                $this->addUsingAlias(AdapterTypePeer::ADAPTERTYPEID, $adaptertypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdapterTypePeer::ADAPTERTYPEID, $adaptertypeid, $comparison);
    }

    /**
     * Filter the query on the Type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE Type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE Type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdapterTypeQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AdapterTypePeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query by a related Adapter object
     *
     * @param   Adapter|PropelObjectCollection $adapter  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdapterTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAdapterAdapterType($adapter, $comparison = null)
    {
        if ($adapter instanceof Adapter) {
            return $this
                ->addUsingAlias(AdapterTypePeer::ADAPTERTYPEID, $adapter->getAdaptertypeid(), $comparison);
        } elseif ($adapter instanceof PropelObjectCollection) {
            return $this
                ->useAdapterAdapterTypeQuery()
                ->filterByPrimaryKeys($adapter->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAdapterAdapterType() only accepts arguments of type Adapter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AdapterAdapterType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AdapterTypeQuery The current query, for fluid interface
     */
    public function joinAdapterAdapterType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AdapterAdapterType');

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
            $this->addJoinObject($join, 'AdapterAdapterType');
        }

        return $this;
    }

    /**
     * Use the AdapterAdapterType relation Adapter object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdapterQuery A secondary query class using the current class as primary query
     */
    public function useAdapterAdapterTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdapterAdapterType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AdapterAdapterType', 'AdapterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AdapterType $adapterType Object to remove from the list of results
     *
     * @return AdapterTypeQuery The current query, for fluid interface
     */
    public function prune($adapterType = null)
    {
        if ($adapterType) {
            $this->addUsingAlias(AdapterTypePeer::ADAPTERTYPEID, $adapterType->getAdaptertypeid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
