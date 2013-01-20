<?php



/**
 * This class defines the structure of the 'Adapter' table.
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
class AdapterTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.AdapterTableMap';

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
        $this->setName('Adapter');
        $this->setPhpName('Adapter');
        $this->setClassname('Adapter');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('AdapterId', 'Adapterid', 'INTEGER', true, null, null);
        $this->addForeignKey('AdapterTypeId', 'Adaptertypeid', 'INTEGER', 'AdapterType', 'AdapterTypeId', true, null, null);
        $this->addForeignKey('DeviceId', 'Deviceid', 'INTEGER', 'Device', 'DeviceId', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 25, null);
        $this->addColumn('Instance', 'Instance', 'INTEGER', false, null, null);
        $this->addColumn('IpAddress', 'Ipaddress', 'VARCHAR', false, 15, null);
        $this->addColumn('Netmask', 'Netmask', 'VARCHAR', false, 15, null);
        $this->addColumn('MacAddress', 'Macaddress', 'VARCHAR', false, 17, null);
        $this->addColumn('Speed', 'Speed', 'INTEGER', false, null, null);
        $this->addColumn('AdministrativeStatus', 'Administrativestatus', 'BOOLEAN', false, 1, null);
        $this->addColumn('OperationalStatus', 'Operationalstatus', 'BOOLEAN', false, 1, null);
        $this->addColumn('Modified', 'Modified', 'BOOLEAN', false, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AdapterType', 'AdapterType', RelationMap::MANY_TO_ONE, array('AdapterTypeId' => 'AdapterTypeId', ), null, null);
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_ONE, array('DeviceId' => 'DeviceId', ), null, null);
        $this->addRelation('AdapterAdapterStatistic', 'AdapterStatistic', RelationMap::ONE_TO_MANY, array('AdapterId' => 'AdapterId', ), null, null, 'AdapterAdapterStatistics');
        $this->addRelation('AdapterMonitor', 'Monitor', RelationMap::ONE_TO_MANY, array('AdapterId' => 'AdapterId', ), null, null, 'AdapterMonitors');
        $this->addRelation('AdapterTrap', 'Trap', RelationMap::ONE_TO_MANY, array('AdapterId' => 'AdapterId', ), null, null, 'AdapterTraps');
    } // buildRelations()

} // AdapterTableMap
