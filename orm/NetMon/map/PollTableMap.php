<?php



/**
 * This class defines the structure of the 'Poll' table.
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
class PollTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.PollTableMap';

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
        $this->setName('Poll');
        $this->setPhpName('Poll');
        $this->setClassname('Poll');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('PollId', 'Pollid', 'INTEGER', true, null, null);
        $this->addForeignKey('DeviceId', 'Deviceid', 'INTEGER', 'Device', 'DeviceId', true, null, null);
        $this->addForeignKey('SnmpPropertyId', 'Snmppropertyid', 'INTEGER', 'SnmpProperty', 'SnmpPropertyId', true, null, null);
        $this->addForeignKey('PluginId', 'Pluginid', 'INTEGER', 'Plugin', 'PluginId', true, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'TIMESTAMP', true, null, null);
        $this->addColumn('Value', 'Value', 'VARCHAR', true, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_ONE, array('DeviceId' => 'DeviceId', ), null, null);
        $this->addRelation('SnmpProperty', 'SnmpProperty', RelationMap::MANY_TO_ONE, array('SnmpPropertyId' => 'SnmpPropertyId', ), null, null);
        $this->addRelation('Plugin', 'Plugin', RelationMap::MANY_TO_ONE, array('PluginId' => 'PluginId', ), null, null);
        $this->addRelation('PollThreshold', 'Threshold', RelationMap::ONE_TO_MANY, array('PollId' => 'PollId', ), null, null, 'PollThresholds');
    } // buildRelations()

} // PollTableMap
