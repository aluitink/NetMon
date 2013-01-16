<?php



/**
 * This class defines the structure of the 'Interface' table.
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
class InterfaceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.InterfaceTableMap';

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
        $this->setName('Interface');
        $this->setPhpName('Interface');
        $this->setClassname('Interface');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('InterfaceId', 'Interfaceid', 'INTEGER', true, null, null);
        $this->addForeignKey('InterfaceTypeId', 'Interfacetypeid', 'INTEGER', 'InterfaceType', 'InterfaceTypeId', true, null, null);
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
        $this->addRelation('InterfaceType', 'InterfaceType', RelationMap::MANY_TO_ONE, array('InterfaceTypeId' => 'InterfaceTypeId', ), null, null);
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_ONE, array('DeviceId' => 'DeviceId', ), null, null);
        $this->addRelation('InterfaceInterfaceStatistic', 'InterfaceStatistic', RelationMap::ONE_TO_MANY, array('InterfaceId' => 'InterfaceId', ), null, null, 'InterfaceInterfaceStatistics');
        $this->addRelation('InterfaceMonitor', 'Monitor', RelationMap::ONE_TO_MANY, array('InterfaceId' => 'InterfaceId', ), null, null, 'InterfaceMonitors');
        $this->addRelation('InterfaceTrap', 'Trap', RelationMap::ONE_TO_MANY, array('InterfaceId' => 'InterfaceId', ), null, null, 'InterfaceTraps');
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_MANY, array(), null, null, 'Devices');
        $this->addRelation('Plugin', 'Plugin', RelationMap::MANY_TO_MANY, array(), null, null, 'Plugins');
        $this->addRelation('SnmpProperty', 'SnmpProperty', RelationMap::MANY_TO_MANY, array(), null, null, 'SnmpPropertys');
    } // buildRelations()

} // InterfaceTableMap
