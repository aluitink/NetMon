<?php



/**
 * This class defines the structure of the 'UserGroup' table.
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
class UserGroupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.UserGroupTableMap';

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
        $this->setName('UserGroup');
        $this->setPhpName('UserGroup');
        $this->setClassname('UserGroup');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('UserId', 'Userid', 'INTEGER' , 'User', 'UserId', true, null, null);
        $this->addForeignPrimaryKey('GroupId', 'Groupid', 'INTEGER' , 'Group', 'GroupId', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('UserId' => 'UserId', ), null, null);
        $this->addRelation('Group', 'Group', RelationMap::MANY_TO_ONE, array('GroupId' => 'GroupId', ), null, null);
    } // buildRelations()

} // UserGroupTableMap
