<?php



/**
 * This class defines the structure of the 'PortStatus' table.
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
class PortStatusTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.PortStatusTableMap';

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
        $this->setName('PortStatus');
        $this->setPhpName('PortStatus');
        $this->setClassname('PortStatus');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('PortStatusId', 'Portstatusid', 'INTEGER', true, null, null);
        $this->addForeignKey('AdapterId', 'Adapterid', 'INTEGER', 'Adapter', 'AdapterId', true, null, null);
        $this->addColumn('Protocol', 'Protocol', 'VARCHAR', true, 3, null);
        $this->addColumn('Port', 'Port', 'INTEGER', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('Product', 'Product', 'VARCHAR', false, 32, null);
        $this->addColumn('Version', 'Version', 'VARCHAR', false, 32, null);
        $this->addColumn('State', 'State', 'BOOLEAN', true, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Adapter', 'Adapter', RelationMap::MANY_TO_ONE, array('AdapterId' => 'AdapterId', ), null, null);
    } // buildRelations()

} // PortStatusTableMap
