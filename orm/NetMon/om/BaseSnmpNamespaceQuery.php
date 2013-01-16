<?php


/**
 * Base class that represents a query for the 'SnmpNamespace' table.
 *
 *
 *
 * @method SnmpNamespaceQuery orderBySnmpnamespaceid($order = Criteria::ASC) Order by the SnmpNamespaceId column
 * @method SnmpNamespaceQuery orderByName($order = Criteria::ASC) Order by the Name column
 *
 * @method SnmpNamespaceQuery groupBySnmpnamespaceid() Group by the SnmpNamespaceId column
 * @method SnmpNamespaceQuery groupByName() Group by the Name column
 *
 * @method SnmpNamespaceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SnmpNamespaceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SnmpNamespaceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SnmpNamespaceQuery leftJoinSnmpNamespaceSnmpProperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the SnmpNamespaceSnmpProperty relation
 * @method SnmpNamespaceQuery rightJoinSnmpNamespaceSnmpProperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SnmpNamespaceSnmpProperty relation
 * @method SnmpNamespaceQuery innerJoinSnmpNamespaceSnmpProperty($relationAlias = null) Adds a INNER JOIN clause to the query using the SnmpNamespaceSnmpProperty relation
 *
 * @method SnmpNamespace findOne(PropelPDO $con = null) Return the first SnmpNamespace matching the query
 * @method SnmpNamespace findOneOrCreate(PropelPDO $con = null) Return the first SnmpNamespace matching the query, or a new SnmpNamespace object populated from the query conditions when no match is found
 *
 * @method SnmpNamespace findOneByName(string $Name) Return the first SnmpNamespace filtered by the Name column
 *
 * @method array findBySnmpnamespaceid(int $SnmpNamespaceId) Return SnmpNamespace objects filtered by the SnmpNamespaceId column
 * @method array findByName(string $Name) Return SnmpNamespace objects filtered by the Name column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseSnmpNamespaceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSnmpNamespaceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'SnmpNamespace', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SnmpNamespaceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SnmpNamespaceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SnmpNamespaceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SnmpNamespaceQuery) {
            return $criteria;
        }
        $query = new SnmpNamespaceQuery();
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
     * @return   SnmpNamespace|SnmpNamespace[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SnmpNamespacePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SnmpNamespacePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SnmpNamespace A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySnmpnamespaceid($key, $con = null)
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
     * @return                 SnmpNamespace A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `SnmpNamespaceId`, `Name` FROM `SnmpNamespace` WHERE `SnmpNamespaceId` = :p0';
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
            $obj = new SnmpNamespace();
            $obj->hydrate($row);
            SnmpNamespacePeer::addInstanceToPool($obj, (string) $key);
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
     * @return SnmpNamespace|SnmpNamespace[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SnmpNamespace[]|mixed the list of results, formatted by the current formatter
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
     * @return SnmpNamespaceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SnmpNamespacePeer::SNMPNAMESPACEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SnmpNamespaceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SnmpNamespacePeer::SNMPNAMESPACEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the SnmpNamespaceId column
     *
     * Example usage:
     * <code>
     * $query->filterBySnmpnamespaceid(1234); // WHERE SnmpNamespaceId = 1234
     * $query->filterBySnmpnamespaceid(array(12, 34)); // WHERE SnmpNamespaceId IN (12, 34)
     * $query->filterBySnmpnamespaceid(array('min' => 12)); // WHERE SnmpNamespaceId >= 12
     * $query->filterBySnmpnamespaceid(array('max' => 12)); // WHERE SnmpNamespaceId <= 12
     * </code>
     *
     * @param     mixed $snmpnamespaceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnmpNamespaceQuery The current query, for fluid interface
     */
    public function filterBySnmpnamespaceid($snmpnamespaceid = null, $comparison = null)
    {
        if (is_array($snmpnamespaceid)) {
            $useMinMax = false;
            if (isset($snmpnamespaceid['min'])) {
                $this->addUsingAlias(SnmpNamespacePeer::SNMPNAMESPACEID, $snmpnamespaceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snmpnamespaceid['max'])) {
                $this->addUsingAlias(SnmpNamespacePeer::SNMPNAMESPACEID, $snmpnamespaceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SnmpNamespacePeer::SNMPNAMESPACEID, $snmpnamespaceid, $comparison);
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
     * @return SnmpNamespaceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SnmpNamespacePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related SnmpProperty object
     *
     * @param   SnmpProperty|PropelObjectCollection $snmpProperty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SnmpNamespaceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySnmpNamespaceSnmpProperty($snmpProperty, $comparison = null)
    {
        if ($snmpProperty instanceof SnmpProperty) {
            return $this
                ->addUsingAlias(SnmpNamespacePeer::SNMPNAMESPACEID, $snmpProperty->getSnmpnamespaceid(), $comparison);
        } elseif ($snmpProperty instanceof PropelObjectCollection) {
            return $this
                ->useSnmpNamespaceSnmpPropertyQuery()
                ->filterByPrimaryKeys($snmpProperty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySnmpNamespaceSnmpProperty() only accepts arguments of type SnmpProperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SnmpNamespaceSnmpProperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnmpNamespaceQuery The current query, for fluid interface
     */
    public function joinSnmpNamespaceSnmpProperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SnmpNamespaceSnmpProperty');

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
            $this->addJoinObject($join, 'SnmpNamespaceSnmpProperty');
        }

        return $this;
    }

    /**
     * Use the SnmpNamespaceSnmpProperty relation SnmpProperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SnmpPropertyQuery A secondary query class using the current class as primary query
     */
    public function useSnmpNamespaceSnmpPropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSnmpNamespaceSnmpProperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SnmpNamespaceSnmpProperty', 'SnmpPropertyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SnmpNamespace $snmpNamespace Object to remove from the list of results
     *
     * @return SnmpNamespaceQuery The current query, for fluid interface
     */
    public function prune($snmpNamespace = null)
    {
        if ($snmpNamespace) {
            $this->addUsingAlias(SnmpNamespacePeer::SNMPNAMESPACEID, $snmpNamespace->getSnmpnamespaceid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
