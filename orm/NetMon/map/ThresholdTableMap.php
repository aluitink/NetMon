<?php



/**
 * This class defines the structure of the 'Threshold' table.
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
class ThresholdTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.ThresholdTableMap';

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
        $this->setName('Threshold');
        $this->setPhpName('Threshold');
        $this->setClassname('Threshold');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ThresholdId', 'Thresholdid', 'INTEGER', true, null, null);
        $this->addForeignKey('PluginId', 'Pluginid', 'INTEGER', 'Plugin', 'PluginId', true, null, null);
        $this->addForeignKey('MonitorId', 'Monitorid', 'INTEGER', 'Monitor', 'MonitorId', true, null, null);
        $this->addColumn('GreaterThan', 'Greaterthan', 'BOOLEAN', true, 1, null);
        $this->addColumn('Value', 'Value', 'BIGINT', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Plugin', 'Plugin', RelationMap::MANY_TO_ONE, array('PluginId' => 'PluginId', ), null, null);
        $this->addRelation('Monitor', 'Monitor', RelationMap::MANY_TO_ONE, array('MonitorId' => 'MonitorId', ), null, null);
        $this->addRelation('AlarmThreshold', 'Alarm', RelationMap::ONE_TO_MANY, array('ThresholdId' => 'ThresholdId', ), null, null, 'AlarmThresholds');
    } // buildRelations()

} // ThresholdTableMap
