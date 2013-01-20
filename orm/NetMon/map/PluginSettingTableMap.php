<?php



/**
 * This class defines the structure of the 'PluginSetting' table.
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
class PluginSettingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.PluginSettingTableMap';

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
        $this->setName('PluginSetting');
        $this->setPhpName('PluginSetting');
        $this->setClassname('PluginSetting');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('PluginSettingId', 'Pluginsettingid', 'INTEGER', true, null, null);
        $this->addForeignKey('PluginId', 'Pluginid', 'INTEGER', 'Plugin', 'PluginId', true, null, null);
        $this->addForeignKey('UserId', 'Userid', 'INTEGER', 'User', 'UserId', false, null, null);
        $this->addColumn('Key', 'Key', 'VARCHAR', true, 50, null);
        $this->addColumn('Value', 'Value', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Plugin', 'Plugin', RelationMap::MANY_TO_ONE, array('PluginId' => 'PluginId', ), null, null);
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('UserId' => 'UserId', ), null, null);
    } // buildRelations()

} // PluginSettingTableMap
