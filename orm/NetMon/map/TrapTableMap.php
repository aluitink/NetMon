<?php



/**
 * This class defines the structure of the 'Trap' table.
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
class TrapTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.TrapTableMap';

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
        $this->setName('Trap');
        $this->setPhpName('Trap');
        $this->setClassname('Trap');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('TrapId', 'Trapid', 'INTEGER', true, null, null);
        $this->addForeignKey('DeviceId', 'Deviceid', 'INTEGER', 'Device', 'DeviceId', false, null, null);
        $this->addForeignKey('AdapterId', 'Adapterid', 'INTEGER', 'Adapter', 'AdapterId', false, null, null);
        $this->addForeignKey('SnmpPropertyId', 'Snmppropertyid', 'INTEGER', 'SnmpProperty', 'SnmpPropertyId', false, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'TIMESTAMP', false, null, null);
        $this->addColumn('Value', 'Value', 'INTEGER', false, null, null);
        $this->addColumn('Expected', 'Expected', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_ONE, array('DeviceId' => 'DeviceId', ), null, null);
        $this->addRelation('Adapter', 'Adapter', RelationMap::MANY_TO_ONE, array('AdapterId' => 'AdapterId', ), null, null);
        $this->addRelation('SnmpProperty', 'SnmpProperty', RelationMap::MANY_TO_ONE, array('SnmpPropertyId' => 'SnmpPropertyId', ), null, null);
        $this->addRelation('TrapThreshold', 'Threshold', RelationMap::ONE_TO_MANY, array('TrapId' => 'TrapId', ), null, null, 'TrapThresholds');
    } // buildRelations()

} // TrapTableMap
