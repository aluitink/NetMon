<?php



/**
 * This class defines the structure of the 'SnmpProperty' table.
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
class SnmpPropertyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.SnmpPropertyTableMap';

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
        $this->setName('SnmpProperty');
        $this->setPhpName('SnmpProperty');
        $this->setClassname('SnmpProperty');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('SnmpPropertyId', 'Snmppropertyid', 'INTEGER', true, null, null);
        $this->addForeignKey('SnmpNamespaceId', 'Snmpnamespaceid', 'INTEGER', 'SnmpNamespace', 'SnmpNamespaceId', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', false, 25, null);
        $this->addColumn('Property', 'Property', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SnmpNamespace', 'SnmpNamespace', RelationMap::MANY_TO_ONE, array('SnmpNamespaceId' => 'SnmpNamespaceId', ), null, null);
        $this->addRelation('SnmpPropertyPoll', 'Poll', RelationMap::ONE_TO_MANY, array('SnmpPropertyId' => 'SnmpPropertyId', ), null, null, 'SnmpPropertyPolls');
        $this->addRelation('SnmpPropertyMonitor', 'Monitor', RelationMap::ONE_TO_MANY, array('SnmpPropertyId' => 'SnmpPropertyId', ), null, null, 'SnmpPropertyMonitors');
        $this->addRelation('SnmpPropertyTrap', 'Trap', RelationMap::ONE_TO_MANY, array('SnmpPropertyId' => 'SnmpPropertyId', ), null, null, 'SnmpPropertyTraps');
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_MANY, array(), null, null, 'Devices');
        $this->addRelation('Plugin', 'Plugin', RelationMap::MANY_TO_MANY, array(), null, null, 'Plugins');
        $this->addRelation('Adapter', 'Adapter', RelationMap::MANY_TO_MANY, array(), null, null, 'Adapters');
    } // buildRelations()

} // SnmpPropertyTableMap
