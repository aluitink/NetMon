<?php



/**
 * This class defines the structure of the 'Monitor' table.
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
class MonitorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.MonitorTableMap';

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
        $this->setName('Monitor');
        $this->setPhpName('Monitor');
        $this->setClassname('Monitor');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('MonitorId', 'Monitorid', 'INTEGER', true, null, null);
        $this->addForeignPrimaryKey('PluginId', 'Pluginid', 'INTEGER' , 'Plugin', 'PluginId', true, null, null);
        $this->addForeignPrimaryKey('PluginMetaId', 'Pluginmetaid', 'INTEGER' , 'PluginMeta', 'PluginMetaId', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Plugin', 'Plugin', RelationMap::MANY_TO_ONE, array('PluginId' => 'PluginId', ), null, null);
        $this->addRelation('PluginMeta', 'PluginMeta', RelationMap::MANY_TO_ONE, array('PluginMetaId' => 'PluginMetaId', ), null, null);
        $this->addRelation('MonitorThreshold', 'Threshold', RelationMap::ONE_TO_MANY, array('MonitorId' => 'MonitorId', ), null, null, 'MonitorThresholds');
    } // buildRelations()

} // MonitorTableMap
