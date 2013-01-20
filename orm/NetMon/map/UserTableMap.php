<?php



/**
 * This class defines the structure of the 'User' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.UserTableMap';

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
        $this->setName('User');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('UserId', 'Userid', 'INTEGER', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 24, null);
        $this->addColumn('Password', 'Password', 'VARCHAR', true, 32, null);
        $this->addColumn('EmailAddress', 'Emailaddress', 'VARCHAR', true, 64, null);
        $this->addColumn('Active', 'Active', 'BOOLEAN', false, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UserGroup', 'UserGroup', RelationMap::ONE_TO_MANY, array('UserId' => 'UserId', ), null, null, 'UserGroups');
        $this->addRelation('UserCustomer', 'CustomerUser', RelationMap::ONE_TO_MANY, array('UserId' => 'UserId', ), null, null, 'UserCustomers');
        $this->addRelation('UserPluginSetting', 'PluginSetting', RelationMap::ONE_TO_MANY, array('UserId' => 'UserId', ), null, null, 'UserPluginSettings');
        $this->addRelation('Group', 'Group', RelationMap::MANY_TO_MANY, array(), null, null, 'Groups');
        $this->addRelation('Customer', 'Customer', RelationMap::MANY_TO_MANY, array(), null, null, 'Customers');
    } // buildRelations()

} // UserTableMap
