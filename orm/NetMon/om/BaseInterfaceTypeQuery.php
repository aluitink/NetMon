<?php


/**
 * Base class that represents a query for the 'InterfaceType' table.
 *
 *
 *
 * @method InterfaceTypeQuery orderByInterfacetypeid($order = Criteria::ASC) Order by the InterfaceTypeId column
 * @method InterfaceTypeQuery orderByType($order = Criteria::ASC) Order by the Type column
 *
 * @method InterfaceTypeQuery groupByInterfacetypeid() Group by the InterfaceTypeId column
 * @method InterfaceTypeQuery groupByType() Group by the Type column
 *
 * @method InterfaceTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method InterfaceTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method InterfaceTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method InterfaceTypeQuery leftJoinInterfaceInterfaceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the InterfaceInterfaceType relation
 * @method InterfaceTypeQuery rightJoinInterfaceInterfaceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InterfaceInterfaceType relation
 * @method InterfaceTypeQuery innerJoinInterfaceInterfaceType($relationAlias = null) Adds a INNER JOIN clause to the query using the InterfaceInterfaceType relation
 *
 * @method InterfaceType findOne(PropelPDO $con = null) Return the first InterfaceType matching the query
 * @method InterfaceType findOneOrCreate(PropelPDO $con = null) Return the first InterfaceType matching the query, or a new InterfaceType object populated from the query conditions when no match is found
 *
 * @method InterfaceType findOneByType(string $Type) Return the first InterfaceType filtered by the Type column
 *
 * @method array findByInterfacetypeid(int $InterfaceTypeId) Return InterfaceType objects filtered by the InterfaceTypeId column
 * @method array findByType(string $Type) Return InterfaceType objects filtered by the Type column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseInterfaceTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseInterfaceTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'InterfaceType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new InterfaceTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   InterfaceTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return InterfaceTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof InterfaceTypeQuery) {
            return $criteria;
        }
        $query = new InterfaceTypeQuery();
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
     * @return   InterfaceType|InterfaceType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InterfaceTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(InterfaceTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 InterfaceType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByInterfacetypeid($key, $con = null)
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
     * @return                 InterfaceType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `InterfaceTypeId`, `Type` FROM `InterfaceType` WHERE `InterfaceTypeId` = :p0';
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
            $obj = new InterfaceType();
            $obj->hydrate($row);
            InterfaceTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return InterfaceType|InterfaceType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|InterfaceType[]|mixed the list of results, formatted by the current formatter
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
     * @return InterfaceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InterfaceTypePeer::INTERFACETYPEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return InterfaceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InterfaceTypePeer::INTERFACETYPEID, $keys, Criteria::IN);
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
     * @param     mixed $interfacetypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InterfaceTypeQuery The current query, for fluid interface
     */
    public function filterByInterfacetypeid($interfacetypeid = null, $comparison = null)
    {
        if (is_array($interfacetypeid)) {
            $useMinMax = false;
            if (isset($interfacetypeid['min'])) {
                $this->addUsingAlias(InterfaceTypePeer::INTERFACETYPEID, $interfacetypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interfacetypeid['max'])) {
                $this->addUsingAlias(InterfaceTypePeer::INTERFACETYPEID, $interfacetypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InterfaceTypePeer::INTERFACETYPEID, $interfacetypeid, $comparison);
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
     * @return InterfaceTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InterfaceTypePeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query by a related Interface object
     *
     * @param   Interface|PropelObjectCollection $interface  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InterfaceTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInterfaceInterfaceType($interface, $comparison = null)
    {
        if ($interface instanceof Interface) {
            return $this
                ->addUsingAlias(InterfaceTypePeer::INTERFACETYPEID, $interface->getInterfacetypeid(), $comparison);
        } elseif ($interface instanceof PropelObjectCollection) {
            return $this
                ->useInterfaceInterfaceTypeQuery()
                ->filterByPrimaryKeys($interface->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInterfaceInterfaceType() only accepts arguments of type Interface or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InterfaceInterfaceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InterfaceTypeQuery The current query, for fluid interface
     */
    public function joinInterfaceInterfaceType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InterfaceInterfaceType');

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
            $this->addJoinObject($join, 'InterfaceInterfaceType');
        }

        return $this;
    }

    /**
     * Use the InterfaceInterfaceType relation Interface object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   InterfaceQuery A secondary query class using the current class as primary query
     */
    public function useInterfaceInterfaceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInterfaceInterfaceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InterfaceInterfaceType', 'InterfaceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   InterfaceType $interfaceType Object to remove from the list of results
     *
     * @return InterfaceTypeQuery The current query, for fluid interface
     */
    public function prune($interfaceType = null)
    {
        if ($interfaceType) {
            $this->addUsingAlias(InterfaceTypePeer::INTERFACETYPEID, $interfaceType->getInterfacetypeid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
