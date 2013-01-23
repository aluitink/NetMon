<?php



/**
 * This class defines the structure of the 'Device' table.
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
class DeviceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.DeviceTableMap';

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
        $this->setName('Device');
        $this->setPhpName('Device');
        $this->setClassname('Device');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('DeviceId', 'Deviceid', 'INTEGER', true, null, null);
        $this->addForeignKey('DeviceTypeId', 'Devicetypeid', 'INTEGER', 'DeviceType', 'DeviceTypeId', true, null, null);
        $this->addColumn('Hostname', 'Hostname', 'VARCHAR', true, 50, null);
        $this->addColumn('IpAddress', 'Ipaddress', 'VARCHAR', true, 15, null);
        $this->addColumn('DateAdded', 'Dateadded', 'TIMESTAMP', true, null, null);
        $this->addColumn('DateRemoved', 'Dateremoved', 'TIMESTAMP', true, null, null);
        $this->addColumn('Active', 'Active', 'BOOLEAN', false, 1, null);
        $this->addColumn('Modified', 'Modified', 'BOOLEAN', false, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DeviceType', 'DeviceType', RelationMap::MANY_TO_ONE, array('DeviceTypeId' => 'DeviceTypeId', ), null, null);
        $this->addRelation('DeviceAdapter', 'Adapter', RelationMap::ONE_TO_MANY, array('DeviceId' => 'DeviceId', ), null, null, 'DeviceAdapters');
        $this->addRelation('DevicePoll', 'Poll', RelationMap::ONE_TO_MANY, array('DeviceId' => 'DeviceId', ), null, null, 'DevicePolls');
        $this->addRelation('DeviceSyslog', 'Syslog', RelationMap::ONE_TO_MANY, array('DeviceId' => 'DeviceId', ), null, null, 'DeviceSyslogs');
        $this->addRelation('DeviceTrap', 'Trap', RelationMap::ONE_TO_MANY, array('DeviceId' => 'DeviceId', ), null, null, 'DeviceTraps');
    } // buildRelations()

} // DeviceTableMap
