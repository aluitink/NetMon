<?php



/**
 * This class defines the structure of the 'Syslog' table.
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
class SyslogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.SyslogTableMap';

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
        $this->setName('Syslog');
        $this->setPhpName('Syslog');
        $this->setClassname('Syslog');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('SyslogId', 'Syslogid', 'INTEGER', true, null, null);
        $this->addForeignKey('DeviceId', 'Deviceid', 'INTEGER', 'Device', 'DeviceId', true, null, null);
        $this->addColumn('Facility', 'Facility', 'VARCHAR', false, 10, null);
        $this->addColumn('Priority', 'Priority', 'VARCHAR', false, 10, null);
        $this->addColumn('Level', 'Level', 'VARCHAR', false, 10, null);
        $this->addColumn('Tag', 'Tag', 'VARCHAR', false, 10, null);
        $this->addColumn('Timestamp', 'Timestamp', 'TIMESTAMP', false, null, null);
        $this->addColumn('Program', 'Program', 'VARCHAR', false, 25, null);
        $this->addColumn('Message', 'Message', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Sequence', 'Sequence', 'INTEGER', false, null, null);
        $this->addColumn('Count', 'Count', 'INTEGER', false, null, null);
        $this->addColumn('Value', 'Value', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_ONE, array('DeviceId' => 'DeviceId', ), null, null);
    } // buildRelations()

} // SyslogTableMap
