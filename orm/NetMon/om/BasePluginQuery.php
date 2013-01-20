<?php


/**
 * Base class that represents a query for the 'Plugin' table.
 *
 *
 *
 * @method PluginQuery orderByPluginid($order = Criteria::ASC) Order by the PluginId column
 * @method PluginQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method PluginQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method PluginQuery orderByRequests($order = Criteria::ASC) Order by the Requests column
 * @method PluginQuery orderByActive($order = Criteria::ASC) Order by the Active column
 *
 * @method PluginQuery groupByPluginid() Group by the PluginId column
 * @method PluginQuery groupByName() Group by the Name column
 * @method PluginQuery groupByDescription() Group by the Description column
 * @method PluginQuery groupByRequests() Group by the Requests column
 * @method PluginQuery groupByActive() Group by the Active column
 *
 * @method PluginQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PluginQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PluginQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PluginQuery leftJoinPluginThreshold($relationAlias = null) Adds a LEFT JOIN clause to the query using the PluginThreshold relation
 * @method PluginQuery rightJoinPluginThreshold($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PluginThreshold relation
 * @method PluginQuery innerJoinPluginThreshold($relationAlias = null) Adds a INNER JOIN clause to the query using the PluginThreshold relation
 *
 * @method PluginQuery leftJoinPluginPoll($relationAlias = null) Adds a LEFT JOIN clause to the query using the PluginPoll relation
 * @method PluginQuery rightJoinPluginPoll($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PluginPoll relation
 * @method PluginQuery innerJoinPluginPoll($relationAlias = null) Adds a INNER JOIN clause to the query using the PluginPoll relation
 *
 * @method PluginQuery leftJoinPluginMonitor($relationAlias = null) Adds a LEFT JOIN clause to the query using the PluginMonitor relation
 * @method PluginQuery rightJoinPluginMonitor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PluginMonitor relation
 * @method PluginQuery innerJoinPluginMonitor($relationAlias = null) Adds a INNER JOIN clause to the query using the PluginMonitor relation
 *
 * @method PluginQuery leftJoinPluginPluginSetting($relationAlias = null) Adds a LEFT JOIN clause to the query using the PluginPluginSetting relation
 * @method PluginQuery rightJoinPluginPluginSetting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PluginPluginSetting relation
 * @method PluginQuery innerJoinPluginPluginSetting($relationAlias = null) Adds a INNER JOIN clause to the query using the PluginPluginSetting relation
 *
 * @method Plugin findOne(PropelPDO $con = null) Return the first Plugin matching the query
 * @method Plugin findOneOrCreate(PropelPDO $con = null) Return the first Plugin matching the query, or a new Plugin object populated from the query conditions when no match is found
 *
 * @method Plugin findOneByName(string $Name) Return the first Plugin filtered by the Name column
 * @method Plugin findOneByDescription(string $Description) Return the first Plugin filtered by the Description column
 * @method Plugin findOneByRequests(string $Requests) Return the first Plugin filtered by the Requests column
 * @method Plugin findOneByActive(boolean $Active) Return the first Plugin filtered by the Active column
 *
 * @method array findByPluginid(int $PluginId) Return Plugin objects filtered by the PluginId column
 * @method array findByName(string $Name) Return Plugin objects filtered by the Name column
 * @method array findByDescription(string $Description) Return Plugin objects filtered by the Description column
 * @method array findByRequests(string $Requests) Return Plugin objects filtered by the Requests column
 * @method array findByActive(boolean $Active) Return Plugin objects filtered by the Active column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BasePluginQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePluginQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'Plugin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PluginQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PluginQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PluginQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PluginQuery) {
            return $criteria;
        }
        $query = new PluginQuery();
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
     * @return   Plugin|Plugin[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PluginPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PluginPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Plugin A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPluginid($key, $con = null)
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
     * @return                 Plugin A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PluginId`, `Name`, `Description`, `Requests`, `Active` FROM `Plugin` WHERE `PluginId` = :p0';
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
            $obj = new Plugin();
            $obj->hydrate($row);
            PluginPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Plugin|Plugin[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Plugin[]|mixed the list of results, formatted by the current formatter
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
     * @return PluginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PluginPeer::PLUGINID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PluginPeer::PLUGINID, $keys, Criteria::IN);
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
     * @param     mixed $pluginid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function filterByPluginid($pluginid = null, $comparison = null)
    {
        if (is_array($pluginid)) {
            $useMinMax = false;
            if (isset($pluginid['min'])) {
                $this->addUsingAlias(PluginPeer::PLUGINID, $pluginid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pluginid['max'])) {
                $this->addUsingAlias(PluginPeer::PLUGINID, $pluginid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PluginPeer::PLUGINID, $pluginid, $comparison);
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
     * @return PluginQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PluginPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the Description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE Description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE Description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PluginPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the Requests column
     *
     * Example usage:
     * <code>
     * $query->filterByRequests('fooValue');   // WHERE Requests = 'fooValue'
     * $query->filterByRequests('%fooValue%'); // WHERE Requests LIKE '%fooValue%'
     * </code>
     *
     * @param     string $requests The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function filterByRequests($requests = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($requests)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $requests)) {
                $requests = str_replace('*', '%', $requests);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PluginPeer::REQUESTS, $requests, $comparison);
    }

    /**
     * Filter the query on the Active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive(true); // WHERE Active = true
     * $query->filterByActive('yes'); // WHERE Active = true
     * </code>
     *
     * @param     boolean|string $active The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PluginPeer::ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query by a related Threshold object
     *
     * @param   Threshold|PropelObjectCollection $threshold  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PluginQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPluginThreshold($threshold, $comparison = null)
    {
        if ($threshold instanceof Threshold) {
            return $this
                ->addUsingAlias(PluginPeer::PLUGINID, $threshold->getPluginid(), $comparison);
        } elseif ($threshold instanceof PropelObjectCollection) {
            return $this
                ->usePluginThresholdQuery()
                ->filterByPrimaryKeys($threshold->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPluginThreshold() only accepts arguments of type Threshold or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PluginThreshold relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function joinPluginThreshold($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PluginThreshold');

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
            $this->addJoinObject($join, 'PluginThreshold');
        }

        return $this;
    }

    /**
     * Use the PluginThreshold relation Threshold object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ThresholdQuery A secondary query class using the current class as primary query
     */
    public function usePluginThresholdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPluginThreshold($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PluginThreshold', 'ThresholdQuery');
    }

    /**
     * Filter the query by a related Poll object
     *
     * @param   Poll|PropelObjectCollection $poll  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PluginQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPluginPoll($poll, $comparison = null)
    {
        if ($poll instanceof Poll) {
            return $this
                ->addUsingAlias(PluginPeer::PLUGINID, $poll->getPluginid(), $comparison);
        } elseif ($poll instanceof PropelObjectCollection) {
            return $this
                ->usePluginPollQuery()
                ->filterByPrimaryKeys($poll->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPluginPoll() only accepts arguments of type Poll or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PluginPoll relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function joinPluginPoll($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PluginPoll');

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
            $this->addJoinObject($join, 'PluginPoll');
        }

        return $this;
    }

    /**
     * Use the PluginPoll relation Poll object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PollQuery A secondary query class using the current class as primary query
     */
    public function usePluginPollQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPluginPoll($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PluginPoll', 'PollQuery');
    }

    /**
     * Filter the query by a related Monitor object
     *
     * @param   Monitor|PropelObjectCollection $monitor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PluginQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPluginMonitor($monitor, $comparison = null)
    {
        if ($monitor instanceof Monitor) {
            return $this
                ->addUsingAlias(PluginPeer::PLUGINID, $monitor->getPluginid(), $comparison);
        } elseif ($monitor instanceof PropelObjectCollection) {
            return $this
                ->usePluginMonitorQuery()
                ->filterByPrimaryKeys($monitor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPluginMonitor() only accepts arguments of type Monitor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PluginMonitor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function joinPluginMonitor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PluginMonitor');

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
            $this->addJoinObject($join, 'PluginMonitor');
        }

        return $this;
    }

    /**
     * Use the PluginMonitor relation Monitor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MonitorQuery A secondary query class using the current class as primary query
     */
    public function usePluginMonitorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPluginMonitor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PluginMonitor', 'MonitorQuery');
    }

    /**
     * Filter the query by a related PluginSetting object
     *
     * @param   PluginSetting|PropelObjectCollection $pluginSetting  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PluginQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPluginPluginSetting($pluginSetting, $comparison = null)
    {
        if ($pluginSetting instanceof PluginSetting) {
            return $this
                ->addUsingAlias(PluginPeer::PLUGINID, $pluginSetting->getPluginid(), $comparison);
        } elseif ($pluginSetting instanceof PropelObjectCollection) {
            return $this
                ->usePluginPluginSettingQuery()
                ->filterByPrimaryKeys($pluginSetting->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPluginPluginSetting() only accepts arguments of type PluginSetting or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PluginPluginSetting relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function joinPluginPluginSetting($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PluginPluginSetting');

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
            $this->addJoinObject($join, 'PluginPluginSetting');
        }

        return $this;
    }

    /**
     * Use the PluginPluginSetting relation PluginSetting object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PluginSettingQuery A secondary query class using the current class as primary query
     */
    public function usePluginPluginSettingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPluginPluginSetting($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PluginPluginSetting', 'PluginSettingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Plugin $plugin Object to remove from the list of results
     *
     * @return PluginQuery The current query, for fluid interface
     */
    public function prune($plugin = null)
    {
        if ($plugin) {
            $this->addUsingAlias(PluginPeer::PLUGINID, $plugin->getPluginid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
