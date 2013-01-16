<?php


/**
 * Base class that represents a query for the 'PluginSetting' table.
 *
 *
 *
 * @method PluginSettingQuery orderByPluginsettingid($order = Criteria::ASC) Order by the PluginSettingId column
 * @method PluginSettingQuery orderByPluginid($order = Criteria::ASC) Order by the PluginId column
 * @method PluginSettingQuery orderByUserid($order = Criteria::ASC) Order by the UserId column
 * @method PluginSettingQuery orderBySetting($order = Criteria::ASC) Order by the Setting column
 * @method PluginSettingQuery orderByValue($order = Criteria::ASC) Order by the Value column
 *
 * @method PluginSettingQuery groupByPluginsettingid() Group by the PluginSettingId column
 * @method PluginSettingQuery groupByPluginid() Group by the PluginId column
 * @method PluginSettingQuery groupByUserid() Group by the UserId column
 * @method PluginSettingQuery groupBySetting() Group by the Setting column
 * @method PluginSettingQuery groupByValue() Group by the Value column
 *
 * @method PluginSettingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PluginSettingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PluginSettingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PluginSettingQuery leftJoinPlugin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Plugin relation
 * @method PluginSettingQuery rightJoinPlugin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Plugin relation
 * @method PluginSettingQuery innerJoinPlugin($relationAlias = null) Adds a INNER JOIN clause to the query using the Plugin relation
 *
 * @method PluginSetting findOne(PropelPDO $con = null) Return the first PluginSetting matching the query
 * @method PluginSetting findOneOrCreate(PropelPDO $con = null) Return the first PluginSetting matching the query, or a new PluginSetting object populated from the query conditions when no match is found
 *
 * @method PluginSetting findOneByPluginid(int $PluginId) Return the first PluginSetting filtered by the PluginId column
 * @method PluginSetting findOneByUserid(int $UserId) Return the first PluginSetting filtered by the UserId column
 * @method PluginSetting findOneBySetting(string $Setting) Return the first PluginSetting filtered by the Setting column
 * @method PluginSetting findOneByValue(string $Value) Return the first PluginSetting filtered by the Value column
 *
 * @method array findByPluginsettingid(int $PluginSettingId) Return PluginSetting objects filtered by the PluginSettingId column
 * @method array findByPluginid(int $PluginId) Return PluginSetting objects filtered by the PluginId column
 * @method array findByUserid(int $UserId) Return PluginSetting objects filtered by the UserId column
 * @method array findBySetting(string $Setting) Return PluginSetting objects filtered by the Setting column
 * @method array findByValue(string $Value) Return PluginSetting objects filtered by the Value column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BasePluginSettingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePluginSettingQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'PluginSetting', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PluginSettingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PluginSettingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PluginSettingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PluginSettingQuery) {
            return $criteria;
        }
        $query = new PluginSettingQuery();
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
     * @return   PluginSetting|PluginSetting[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PluginSettingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PluginSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PluginSetting A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPluginsettingid($key, $con = null)
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
     * @return                 PluginSetting A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PluginSettingId`, `PluginId`, `UserId`, `Setting`, `Value` FROM `PluginSetting` WHERE `PluginSettingId` = :p0';
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
            $obj = new PluginSetting();
            $obj->hydrate($row);
            PluginSettingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PluginSetting|PluginSetting[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PluginSetting[]|mixed the list of results, formatted by the current formatter
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
     * @return PluginSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PluginSettingPeer::PLUGINSETTINGID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PluginSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PluginSettingPeer::PLUGINSETTINGID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the PluginSettingId column
     *
     * Example usage:
     * <code>
     * $query->filterByPluginsettingid(1234); // WHERE PluginSettingId = 1234
     * $query->filterByPluginsettingid(array(12, 34)); // WHERE PluginSettingId IN (12, 34)
     * $query->filterByPluginsettingid(array('min' => 12)); // WHERE PluginSettingId >= 12
     * $query->filterByPluginsettingid(array('max' => 12)); // WHERE PluginSettingId <= 12
     * </code>
     *
     * @param     mixed $pluginsettingid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginSettingQuery The current query, for fluid interface
     */
    public function filterByPluginsettingid($pluginsettingid = null, $comparison = null)
    {
        if (is_array($pluginsettingid)) {
            $useMinMax = false;
            if (isset($pluginsettingid['min'])) {
                $this->addUsingAlias(PluginSettingPeer::PLUGINSETTINGID, $pluginsettingid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginsettingid['max'])) {
                $this->addUsingAlias(PluginSettingPeer::PLUGINSETTINGID, $pluginsettingid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PluginSettingPeer::PLUGINSETTINGID, $pluginsettingid, $comparison);
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
     * @return PluginSettingQuery The current query, for fluid interface
     */
    public function filterByPluginid($pluginid = null, $comparison = null)
    {
        if (is_array($pluginid)) {
            $useMinMax = false;
            if (isset($pluginid['min'])) {
                $this->addUsingAlias(PluginSettingPeer::PLUGINID, $pluginid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginid['max'])) {
                $this->addUsingAlias(PluginSettingPeer::PLUGINID, $pluginid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PluginSettingPeer::PLUGINID, $pluginid, $comparison);
    }

    /**
     * Filter the query on the UserId column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE UserId = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE UserId IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE UserId >= 12
     * $query->filterByUserid(array('max' => 12)); // WHERE UserId <= 12
     * </code>
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginSettingQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(PluginSettingPeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(PluginSettingPeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PluginSettingPeer::USERID, $userid, $comparison);
    }

    /**
     * Filter the query on the Setting column
     *
     * Example usage:
     * <code>
     * $query->filterBySetting('fooValue');   // WHERE Setting = 'fooValue'
     * $query->filterBySetting('%fooValue%'); // WHERE Setting LIKE '%fooValue%'
     * </code>
     *
     * @param     string $setting The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginSettingQuery The current query, for fluid interface
     */
    public function filterBySetting($setting = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($setting)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $setting)) {
                $setting = str_replace('*', '%', $setting);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PluginSettingPeer::SETTING, $setting, $comparison);
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
     * @return PluginSettingQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PluginSettingPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Plugin object
     *
     * @param   Plugin|PropelObjectCollection $plugin The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PluginSettingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPlugin($plugin, $comparison = null)
    {
        if ($plugin instanceof Plugin) {
            return $this
                ->addUsingAlias(PluginSettingPeer::PLUGINID, $plugin->getPluginid(), $comparison);
        } elseif ($plugin instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PluginSettingPeer::PLUGINID, $plugin->toKeyValue('PrimaryKey', 'Pluginid'), $comparison);
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
     * @return PluginSettingQuery The current query, for fluid interface
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
     * @param   PluginSetting $pluginSetting Object to remove from the list of results
     *
     * @return PluginSettingQuery The current query, for fluid interface
     */
    public function prune($pluginSetting = null)
    {
        if ($pluginSetting) {
            $this->addUsingAlias(PluginSettingPeer::PLUGINSETTINGID, $pluginSetting->getPluginsettingid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
