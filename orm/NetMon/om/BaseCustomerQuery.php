<?php


/**
 * Base class that represents a query for the 'Customer' table.
 *
 *
 *
 * @method CustomerQuery orderByCustomerid($order = Criteria::ASC) Order by the CustomerId column
 * @method CustomerQuery orderByName($order = Criteria::ASC) Order by the Name column
 *
 * @method CustomerQuery groupByCustomerid() Group by the CustomerId column
 * @method CustomerQuery groupByName() Group by the Name column
 *
 * @method CustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CustomerQuery leftJoinCustomerUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerUser relation
 * @method CustomerQuery rightJoinCustomerUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerUser relation
 * @method CustomerQuery innerJoinCustomerUser($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerUser relation
 *
 * @method Customer findOne(PropelPDO $con = null) Return the first Customer matching the query
 * @method Customer findOneOrCreate(PropelPDO $con = null) Return the first Customer matching the query, or a new Customer object populated from the query conditions when no match is found
 *
 * @method Customer findOneByName(string $Name) Return the first Customer filtered by the Name column
 *
 * @method array findByCustomerid(int $CustomerId) Return Customer objects filtered by the CustomerId column
 * @method array findByName(string $Name) Return Customer objects filtered by the Name column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseCustomerQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCustomerQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Customer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CustomerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CustomerQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CustomerQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CustomerQuery) {
            return $criteria;
        }
        $query = new CustomerQuery();
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
     * @return   Customer|Customer[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CustomerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CustomerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Customer A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCustomerid($key, $con = null)
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
     * @return                 Customer A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `CustomerId`, `Name` FROM `Customer` WHERE `CustomerId` = :p0';
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
            $obj = new Customer();
            $obj->hydrate($row);
            CustomerPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Customer|Customer[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Customer[]|mixed the list of results, formatted by the current formatter
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
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CustomerPeer::CUSTOMERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CustomerPeer::CUSTOMERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the CustomerId column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerid(1234); // WHERE CustomerId = 1234
     * $query->filterByCustomerid(array(12, 34)); // WHERE CustomerId IN (12, 34)
     * $query->filterByCustomerid(array('min' => 12)); // WHERE CustomerId >= 12
     * $query->filterByCustomerid(array('max' => 12)); // WHERE CustomerId <= 12
     * </code>
     *
     * @param     mixed $customerid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function filterByCustomerid($customerid = null, $comparison = null)
    {
        if (is_array($customerid)) {
            $useMinMax = false;
            if (isset($customerid['min'])) {
                $this->addUsingAlias(CustomerPeer::CUSTOMERID, $customerid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerid['max'])) {
                $this->addUsingAlias(CustomerPeer::CUSTOMERID, $customerid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerPeer::CUSTOMERID, $customerid, $comparison);
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
     * @return CustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CustomerPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related CustomerUser object
     *
     * @param   CustomerUser|PropelObjectCollection $customerUser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomerUser($customerUser, $comparison = null)
    {
        if ($customerUser instanceof CustomerUser) {
            return $this
                ->addUsingAlias(CustomerPeer::CUSTOMERID, $customerUser->getCustomerid(), $comparison);
        } elseif ($customerUser instanceof PropelObjectCollection) {
            return $this
                ->useCustomerUserQuery()
                ->filterByPrimaryKeys($customerUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerUser() only accepts arguments of type CustomerUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function joinCustomerUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerUser');

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
            $this->addJoinObject($join, 'CustomerUser');
        }

        return $this;
    }

    /**
     * Use the CustomerUser relation CustomerUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CustomerUserQuery A secondary query class using the current class as primary query
     */
    public function useCustomerUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerUser', 'CustomerUserQuery');
    }

    /**
     * Filter the query by a related User object
     * using the CustomerUser table as cross reference
     *
     * @param   User $user the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CustomerQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useCustomerUserQuery()
            ->filterByUser($user, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Customer $customer Object to remove from the list of results
     *
     * @return CustomerQuery The current query, for fluid interface
     */
    public function prune($customer = null)
    {
        if ($customer) {
            $this->addUsingAlias(CustomerPeer::CUSTOMERID, $customer->getCustomerid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}