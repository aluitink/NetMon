<?php



/**
 * This class defines the structure of the 'Plugin' table.
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
class PluginTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.PluginTableMap';

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
        $this->setName('Plugin');
        $this->setPhpName('Plugin');
        $this->setClassname('Plugin');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('PluginId', 'Pluginid', 'INTEGER', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('Description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Requests', 'Requests', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Active', 'Active', 'BOOLEAN', false, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PluginThreshold', 'Threshold', RelationMap::ONE_TO_MANY, array('PluginId' => 'PluginId', ), null, null, 'PluginThresholds');
        $this->addRelation('PluginPoll', 'Poll', RelationMap::ONE_TO_MANY, array('PluginId' => 'PluginId', ), null, null, 'PluginPolls');
        $this->addRelation('PluginMonitor', 'Monitor', RelationMap::ONE_TO_MANY, array('PluginId' => 'PluginId', ), null, null, 'PluginMonitors');
        $this->addRelation('PluginPluginSetting', 'PluginSetting', RelationMap::ONE_TO_MANY, array('PluginId' => 'PluginId', ), null, null, 'PluginPluginSettings');
        $this->addRelation('PluginPluginMeta', 'PluginMeta', RelationMap::ONE_TO_MANY, array('PluginId' => 'PluginId', ), null, null, 'PluginPluginMetas');
    } // buildRelations()

} // PluginTableMap
