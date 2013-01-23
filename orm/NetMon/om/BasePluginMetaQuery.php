<?php


/**
 * Base class that represents a query for the 'PluginMeta' table.
 *
 *
 *
 * @method PluginMetaQuery orderByPluginmetaid($order = Criteria::ASC) Order by the PluginMetaId column
 * @method PluginMetaQuery orderByPluginid($order = Criteria::ASC) Order by the PluginId column
 * @method PluginMetaQuery orderByKey($order = Criteria::ASC) Order by the Key column
 * @method PluginMetaQuery orderByValue($order = Criteria::ASC) Order by the Value column
 *
 * @method PluginMetaQuery groupByPluginmetaid() Group by the PluginMetaId column
 * @method PluginMetaQuery groupByPluginid() Group by the PluginId column
 * @method PluginMetaQuery groupByKey() Group by the Key column
 * @method PluginMetaQuery groupByValue() Group by the Value column
 *
 * @method PluginMetaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PluginMetaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PluginMetaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PluginMetaQuery leftJoinPlugin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Plugin relation
 * @method PluginMetaQuery rightJoinPlugin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Plugin relation
 * @method PluginMetaQuery innerJoinPlugin($relationAlias = null) Adds a INNER JOIN clause to the query using the Plugin relation
 *
 * @method PluginMeta findOne(PropelPDO $con = null) Return the first PluginMeta matching the query
 * @method PluginMeta findOneOrCreate(PropelPDO $con = null) Return the first PluginMeta matching the query, or a new PluginMeta object populated from the query conditions when no match is found
 *
 * @method PluginMeta findOneByPluginid(int $PluginId) Return the first PluginMeta filtered by the PluginId column
 * @method PluginMeta findOneByKey(string $Key) Return the first PluginMeta filtered by the Key column
 * @method PluginMeta findOneByValue(string $Value) Return the first PluginMeta filtered by the Value column
 *
 * @method array findByPluginmetaid(int $PluginMetaId) Return PluginMeta objects filtered by the PluginMetaId column
 * @method array findByPluginid(int $PluginId) Return PluginMeta objects filtered by the PluginId column
 * @method array findByKey(string $Key) Return PluginMeta objects filtered by the Key column
 * @method array findByValue(string $Value) Return PluginMeta objects filtered by the Value column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BasePluginMetaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePluginMetaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'PluginMeta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PluginMetaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PluginMetaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PluginMetaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PluginMetaQuery) {
            return $criteria;
        }
        $query = new PluginMetaQuery();
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
     * @return   PluginMeta|PluginMeta[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PluginMetaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PluginMetaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PluginMeta A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPluginmetaid($key, $con = null)
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
     * @return                 PluginMeta A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PluginMetaId`, `PluginId`, `Key`, `Value` FROM `PluginMeta` WHERE `PluginMetaId` = :p0';
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
            $obj = new PluginMeta();
            $obj->hydrate($row);
            PluginMetaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PluginMeta|PluginMeta[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PluginMeta[]|mixed the list of results, formatted by the current formatter
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
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PluginMetaPeer::PLUGINMETAID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PluginMetaPeer::PLUGINMETAID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the PluginMetaId column
     *
     * Example usage:
     * <code>
     * $query->filterByPluginmetaid(1234); // WHERE PluginMetaId = 1234
     * $query->filterByPluginmetaid(array(12, 34)); // WHERE PluginMetaId IN (12, 34)
     * $query->filterByPluginmetaid(array('min' => 12)); // WHERE PluginMetaId >= 12
     * $query->filterByPluginmetaid(array('max' => 12)); // WHERE PluginMetaId <= 12
     * </code>
     *
     * @param     mixed $pluginmetaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function filterByPluginmetaid($pluginmetaid = null, $comparison = null)
    {
        if (is_array($pluginmetaid)) {
            $useMinMax = false;
            if (isset($pluginmetaid['min'])) {
                $this->addUsingAlias(PluginMetaPeer::PLUGINMETAID, $pluginmetaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginmetaid['max'])) {
                $this->addUsingAlias(PluginMetaPeer::PLUGINMETAID, $pluginmetaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PluginMetaPeer::PLUGINMETAID, $pluginmetaid, $comparison);
    }

    /**
     * Filter the query on the PluginId column
     *
     * Example usage:
     * <code>
     * $query->filterByPluginid(1234); // WHERE PluginId = 1234
     * $query->filterByPluginid(array(12, 34)); // WHERE PluginId IN (12, 34)
     * $query->filterByPluginid(array('min' => 12)); // WHERE PluginId >= 12
     * $query->filterByPluginid(array('max' => 12)); // WHERE PluginId <= 12
     * </code>
     *
     * @see       filterByPlugin()
     *
     * @param     mixed $pluginid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function filterByPluginid($pluginid = null, $comparison = null)
    {
        if (is_array($pluginid)) {
            $useMinMax = false;
            if (isset($pluginid['min'])) {
                $this->addUsingAlias(PluginMetaPeer::PLUGINID, $pluginid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginid['max'])) {
                $this->addUsingAlias(PluginMetaPeer::PLUGINID, $pluginid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PluginMetaPeer::PLUGINID, $pluginid, $comparison);
    }

    /**
     * Filter the query on the Key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE Key = 'fooValue'
     * $query->filterByKey('%fooValue%'); // WHERE Key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $key)) {
                $key = str_replace('*', '%', $key);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PluginMetaPeer::KEY, $key, $comparison);
    }

    /**
     * Filter the query on the Value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE Value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE Value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PluginMetaPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Plugin object
     *
     * @param   Plugin|PropelObjectCollection $plugin The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PluginMetaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPlugin($plugin, $comparison = null)
    {
        if ($plugin instanceof Plugin) {
            return $this
                ->addUsingAlias(PluginMetaPeer::PLUGINID, $plugin->getPluginid(), $comparison);
        } elseif ($plugin instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PluginMetaPeer::PLUGINID, $plugin->toKeyValue('PrimaryKey', 'Pluginid'), $comparison);
        } else {
            throw new PropelException('filterByPlugin() only accepts arguments of type Plugin or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Plugin relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function joinPlugin($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Plugin');

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
            $this->addJoinObject($join, 'Plugin');
        }

        return $this;
    }

    /**
     * Use the Plugin relation Plugin object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PluginQuery A secondary query class using the current class as primary query
     */
    public function usePluginQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPlugin($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Plugin', 'PluginQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PluginMeta $pluginMeta Object to remove from the list of results
     *
     * @return PluginMetaQuery The current query, for fluid interface
     */
    public function prune($pluginMeta = null)
    {
        if ($pluginMeta) {
            $this->addUsingAlias(PluginMetaPeer::PLUGINMETAID, $pluginMeta->getPluginmetaid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
