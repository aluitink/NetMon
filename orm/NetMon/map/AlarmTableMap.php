<?php



/**
 * This class defines the structure of the 'Alarm' table.
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
class AlarmTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.AlarmTableMap';

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
        $this->setName('Alarm');
        $this->setPhpName('Alarm');
        $this->setClassname('Alarm');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('AlarmId', 'Alarmid', 'INTEGER', true, null, null);
        $this->addForeignKey('ThresholdId', 'Thresholdid', 'INTEGER', 'Threshold', 'ThresholdId', true, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'TIMESTAMP', true, null, null);
        $this->addColumn('Active', 'Active', 'BOOLEAN', false, 1, null);
        $this->addColumn('Acknowledged', 'Acknowledged', 'BOOLEAN', false, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Threshold', 'Threshold', RelationMap::MANY_TO_ONE, array('ThresholdId' => 'ThresholdId', ), null, null);
    } // buildRelations()

} // AlarmTableMap
