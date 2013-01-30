<?php


/**
 * Base class that represents a query for the 'SnmpProperty' table.
 *
 *
 *
 * @method SnmpPropertyQuery orderBySnmppropertyid($order = Criteria::ASC) Order by the SnmpPropertyId column
 * @method SnmpPropertyQuery orderBySnmpnamespaceid($order = Criteria::ASC) Order by the SnmpNamespaceId column
 * @method SnmpPropertyQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method SnmpPropertyQuery orderByProperty($order = Criteria::ASC) Order by the Property column
 *
 * @method SnmpPropertyQuery groupBySnmppropertyid() Group by the SnmpPropertyId column
 * @method SnmpPropertyQuery groupBySnmpnamespaceid() Group by the SnmpNamespaceId column
 * @method SnmpPropertyQuery groupByName() Group by the Name column
 * @method SnmpPropertyQuery groupByProperty() Group by the Property column
 *
 * @method SnmpPropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SnmpPropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SnmpPropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SnmpPropertyQuery leftJoinSnmpNamespace($relationAlias = null) Adds a LEFT JOIN clause to the query using the SnmpNamespace relation
 * @method SnmpPropertyQuery rightJoinSnmpNamespace($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SnmpNamespace relation
 * @method SnmpPropertyQuery innerJoinSnmpNamespace($relationAlias = null) Adds a INNER JOIN clause to the query using the SnmpNamespace relation
 *
 * @method SnmpPropertyQuery leftJoinSnmpPropertyPoll($relationAlias = null) Adds a LEFT JOIN clause to the query using the SnmpPropertyPoll relation
 * @method SnmpPropertyQuery rightJoinSnmpPropertyPoll($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SnmpPropertyPoll relation
 * @method SnmpPropertyQuery innerJoinSnmpPropertyPoll($relationAlias = null) Adds a INNER JOIN clause to the query using the SnmpPropertyPoll relation
 *
 * @method SnmpPropertyQuery leftJoinSnmpPropertyTrap($relationAlias = null) Adds a LEFT JOIN clause to the query using the SnmpPropertyTrap relation
 * @method SnmpPropertyQuery rightJoinSnmpPropertyTrap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SnmpPropertyTrap relation
 * @method SnmpPropertyQuery innerJoinSnmpPropertyTrap($relationAlias = null) Adds a INNER JOIN clause to the query using the SnmpPropertyTrap relation
 *
 * @method SnmpProperty findOne(PropelPDO $con = null) Return the first SnmpProperty matching the query
 * @method SnmpProperty findOneOrCreate(PropelPDO $con = null) Return the first SnmpProperty matching the query, or a new SnmpProperty object populated from the query conditions when no match is found
 *
 * @method SnmpProperty findOneBySnmpnamespaceid(int $SnmpNamespaceId) Return the first SnmpProperty filtered by the SnmpNamespaceId column
 * @method SnmpProperty findOneByName(string $Name) Return the first SnmpProperty filtered by the Name column
 * @method SnmpProperty findOneByProperty(string $Property) Return the first SnmpProperty filtered by the Property column
 *
 * @method array findBySnmppropertyid(int $SnmpPropertyId) Return SnmpProperty objects filtered by the SnmpPropertyId column
 * @method array findBySnmpnamespaceid(int $SnmpNamespaceId) Return SnmpProperty objects filtered by the SnmpNamespaceId column
 * @method array findByName(string $Name) Return SnmpProperty objects filtered by the Name column
 * @method array findByProperty(string $Property) Return SnmpProperty objects filtered by the Property column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseSnmpPropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSnmpPropertyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'SnmpProperty', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SnmpPropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SnmpPropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SnmpPropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SnmpPropertyQuery) {
            return $criteria;
        }
        $query = new SnmpPropertyQuery();
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
     * @return   SnmpProperty|SnmpProperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SnmpPropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SnmpPropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SnmpProperty A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySnmppropertyid($key, $con = null)
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
     * @return                 SnmpProperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `SnmpPropertyId`, `SnmpNamespaceId`, `Name`, `Property` FROM `SnmpProperty` WHERE `SnmpPropertyId` = :p0';
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
            $obj = new SnmpProperty();
            $obj->hydrate($row);
            SnmpPropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SnmpProperty|SnmpProperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SnmpProperty[]|mixed the list of results, formatted by the current formatter
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
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the SnmpPropertyId column
     *
     * Example usage:
     * <code>
     * $query->filterBySnmppropertyid(1234); // WHERE SnmpPropertyId = 1234
     * $query->filterBySnmppropertyid(array(12, 34)); // WHERE SnmpPropertyId IN (12, 34)
     * $query->filterBySnmppropertyid(array('min' => 12)); // WHERE SnmpPropertyId >= 12
     * $query->filterBySnmppropertyid(array('max' => 12)); // WHERE SnmpPropertyId <= 12
     * </code>
     *
     * @param     mixed $snmppropertyid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function filterBySnmppropertyid($snmppropertyid = null, $comparison = null)
    {
        if (is_array($snmppropertyid)) {
            $useMinMax = false;
            if (isset($snmppropertyid['min'])) {
                $this->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $snmppropertyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snmppropertyid['max'])) {
                $this->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $snmppropertyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $snmppropertyid, $comparison);
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
     * @see       filterBySnmpNamespace()
     *
     * @param     mixed $snmpnamespaceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function filterBySnmpnamespaceid($snmpnamespaceid = null, $comparison = null)
    {
        if (is_array($snmpnamespaceid)) {
            $useMinMax = false;
            if (isset($snmpnamespaceid['min'])) {
                $this->addUsingAlias(SnmpPropertyPeer::SNMPNAMESPACEID, $snmpnamespaceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snmpnamespaceid['max'])) {
                $this->addUsingAlias(SnmpPropertyPeer::SNMPNAMESPACEID, $snmpnamespaceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SnmpPropertyPeer::SNMPNAMESPACEID, $snmpnamespaceid, $comparison);
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
     * @return SnmpPropertyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SnmpPropertyPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the Property column
     *
     * Example usage:
     * <code>
     * $query->filterByProperty('fooValue');   // WHERE Property = 'fooValue'
     * $query->filterByProperty('%fooValue%'); // WHERE Property LIKE '%fooValue%'
     * </code>
     *
     * @param     string $property The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function filterByProperty($property = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($property)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $property)) {
                $property = str_replace('*', '%', $property);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SnmpPropertyPeer::PROPERTY, $property, $comparison);
    }

    /**
     * Filter the query by a related SnmpNamespace object
     *
     * @param   SnmpNamespace|PropelObjectCollection $snmpNamespace The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SnmpPropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySnmpNamespace($snmpNamespace, $comparison = null)
    {
        if ($snmpNamespace instanceof SnmpNamespace) {
            return $this
                ->addUsingAlias(SnmpPropertyPeer::SNMPNAMESPACEID, $snmpNamespace->getSnmpnamespaceid(), $comparison);
        } elseif ($snmpNamespace instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SnmpPropertyPeer::SNMPNAMESPACEID, $snmpNamespace->toKeyValue('PrimaryKey', 'Snmpnamespaceid'), $comparison);
        } else {
            throw new PropelException('filterBySnmpNamespace() only accepts arguments of type SnmpNamespace or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SnmpNamespace relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function joinSnmpNamespace($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SnmpNamespace');

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
            $this->addJoinObject($join, 'SnmpNamespace');
        }

        return $this;
    }

    /**
     * Use the SnmpNamespace relation SnmpNamespace object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SnmpNamespaceQuery A secondary query class using the current class as primary query
     */
    public function useSnmpNamespaceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSnmpNamespace($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SnmpNamespace', 'SnmpNamespaceQuery');
    }

    /**
     * Filter the query by a related Poll object
     *
     * @param   Poll|PropelObjectCollection $poll  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SnmpPropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySnmpPropertyPoll($poll, $comparison = null)
    {
        if ($poll instanceof Poll) {
            return $this
                ->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $poll->getSnmppropertyid(), $comparison);
        } elseif ($poll instanceof PropelObjectCollection) {
            return $this
                ->useSnmpPropertyPollQuery()
                ->filterByPrimaryKeys($poll->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySnmpPropertyPoll() only accepts arguments of type Poll or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SnmpPropertyPoll relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function joinSnmpPropertyPoll($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SnmpPropertyPoll');

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
            $this->addJoinObject($join, 'SnmpPropertyPoll');
        }

        return $this;
    }

    /**
     * Use the SnmpPropertyPoll relation Poll object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PollQuery A secondary query class using the current class as primary query
     */
    public function useSnmpPropertyPollQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSnmpPropertyPoll($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SnmpPropertyPoll', 'PollQuery');
    }

    /**
     * Filter the query by a related Trap object
     *
     * @param   Trap|PropelObjectCollection $trap  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SnmpPropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySnmpPropertyTrap($trap, $comparison = null)
    {
        if ($trap instanceof Trap) {
            return $this
                ->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $trap->getSnmppropertyid(), $comparison);
        } elseif ($trap instanceof PropelObjectCollection) {
            return $this
                ->useSnmpPropertyTrapQuery()
                ->filterByPrimaryKeys($trap->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySnmpPropertyTrap() only accepts arguments of type Trap or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SnmpPropertyTrap relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function joinSnmpPropertyTrap($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SnmpPropertyTrap');

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
            $this->addJoinObject($join, 'SnmpPropertyTrap');
        }

        return $this;
    }

    /**
     * Use the SnmpPropertyTrap relation Trap object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TrapQuery A secondary query class using the current class as primary query
     */
    public function useSnmpPropertyTrapQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSnmpPropertyTrap($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SnmpPropertyTrap', 'TrapQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SnmpProperty $snmpProperty Object to remove from the list of results
     *
     * @return SnmpPropertyQuery The current query, for fluid interface
     */
    public function prune($snmpProperty = null)
    {
        if ($snmpProperty) {
            $this->addUsingAlias(SnmpPropertyPeer::SNMPPROPERTYID, $snmpProperty->getSnmppropertyid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
