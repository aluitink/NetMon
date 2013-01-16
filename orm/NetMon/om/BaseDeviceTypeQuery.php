<?php


/**
 * Base class that represents a query for the 'DeviceType' table.
 *
 *
 *
 * @method DeviceTypeQuery orderByDevicetypeid($order = Criteria::ASC) Order by the DeviceTypeId column
 * @method DeviceTypeQuery orderByType($order = Criteria::ASC) Order by the Type column
 *
 * @method DeviceTypeQuery groupByDevicetypeid() Group by the DeviceTypeId column
 * @method DeviceTypeQuery groupByType() Group by the Type column
 *
 * @method DeviceTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DeviceTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DeviceTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DeviceTypeQuery leftJoinDeviceTypeDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeviceTypeDevice relation
 * @method DeviceTypeQuery rightJoinDeviceTypeDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeviceTypeDevice relation
 * @method DeviceTypeQuery innerJoinDeviceTypeDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the DeviceTypeDevice relation
 *
 * @method DeviceType findOne(PropelPDO $con = null) Return the first DeviceType matching the query
 * @method DeviceType findOneOrCreate(PropelPDO $con = null) Return the first DeviceType matching the query, or a new DeviceType object populated from the query conditions when no match is found
 *
 * @method DeviceType findOneByType(string $Type) Return the first DeviceType filtered by the Type column
 *
 * @method array findByDevicetypeid(int $DeviceTypeId) Return DeviceType objects filtered by the DeviceTypeId column
 * @method array findByType(string $Type) Return DeviceType objects filtered by the Type column
 *
 * @package    propel.generator.NetMon.om
 */
abstract class BaseDeviceTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDeviceTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'NetMon', $modelName = 'DeviceType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DeviceTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DeviceTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DeviceTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DeviceTypeQuery) {
            return $criteria;
        }
        $query = new DeviceTypeQuery();
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
     * @return   DeviceType|DeviceType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DeviceTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DeviceTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 DeviceType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByDevicetypeid($key, $con = null)
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
     * @return                 DeviceType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `DeviceTypeId`, `Type` FROM `DeviceType` WHERE `DeviceTypeId` = :p0';
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
            $obj = new DeviceType();
            $obj->hydrate($row);
            DeviceTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return DeviceType|DeviceType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DeviceType[]|mixed the list of results, formatted by the current formatter
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
     * @return DeviceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DeviceTypePeer::DEVICETYPEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DeviceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DeviceTypePeer::DEVICETYPEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the DeviceTypeId column
     *
     * Example usage:
     * <code>
     * $query->filterByDevicetypeid(1234); // WHERE DeviceTypeId = 1234
     * $query->filterByDevicetypeid(array(12, 34)); // WHERE DeviceTypeId IN (12, 34)
     * $query->filterByDevicetypeid(array('min' => 12)); // WHERE DeviceTypeId >= 12
     * $query->filterByDevicetypeid(array('max' => 12)); // WHERE DeviceTypeId <= 12
     * </code>
     *
     * @param     mixed $devicetypeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceTypeQuery The current query, for fluid interface
     */
    public function filterByDevicetypeid($devicetypeid = null, $comparison = null)
    {
        if (is_array($devicetypeid)) {
            $useMinMax = false;
            if (isset($devicetypeid['min'])) {
                $this->addUsingAlias(DeviceTypePeer::DEVICETYPEID, $devicetypeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($devicetypeid['max'])) {
                $this->addUsingAlias(DeviceTypePeer::DEVICETYPEID, $devicetypeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DeviceTypePeer::DEVICETYPEID, $devicetypeid, $comparison);
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
     * @return DeviceTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DeviceTypePeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDeviceTypeDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(DeviceTypePeer::DEVICETYPEID, $device->getDevicetypeid(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            return $this
                ->useDeviceTypeDeviceQuery()
                ->filterByPrimaryKeys($device->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeviceTypeDevice() only accepts arguments of type Device or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DeviceTypeDevice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceTypeQuery The current query, for fluid interface
     */
    public function joinDeviceTypeDevice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DeviceTypeDevice');

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
            $this->addJoinObject($join, 'DeviceTypeDevice');
        }

        return $this;
    }

    /**
     * Use the DeviceTypeDevice relation Device object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeviceQuery A secondary query class using the current class as primary query
     */
    public function useDeviceTypeDeviceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDeviceTypeDevice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DeviceTypeDevice', 'DeviceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   DeviceType $deviceType Object to remove from the list of results
     *
     * @return DeviceTypeQuery The current query, for fluid interface
     */
    public function prune($deviceType = null)
    {
        if ($deviceType) {
            $this->addUsingAlias(DeviceTypePeer::DEVICETYPEID, $deviceType->getDevicetypeid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
