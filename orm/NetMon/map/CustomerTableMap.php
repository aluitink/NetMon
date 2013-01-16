<?php



/**
 * This class defines the structure of the 'Customer' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.NetMon.map
 */
class CustomerTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.CustomerTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Customer');
        $this->setPhpName('Customer');
        $this->setClassname('Customer');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('CustomerId', 'Customerid', 'INTEGER', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 24, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CustomerUser', 'CustomerUser', RelationMap::ONE_TO_MANY, array('CustomerId' => 'CustomerId', ), null, null, 'CustomerUsers');
        $this->addRelation('User', 'User', RelationMap::MANY_TO_MANY, array(), null, null, 'Users');
    } // buildRelations()

} // CustomerTableMap
