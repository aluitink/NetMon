<?php



/**
 * This class defines the structure of the 'DeviceType' table.
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
class DeviceTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.DeviceTypeTableMap';

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
        $this->setName('DeviceType');
        $this->setPhpName('DeviceType');
        $this->setClassname('DeviceType');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('DeviceTypeId', 'Devicetypeid', 'INTEGER', true, null, null);
        $this->addColumn('Type', 'Type', 'VARCHAR', true, 25, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DeviceTypeDevice', 'Device', RelationMap::ONE_TO_MANY, array('DeviceTypeId' => 'DeviceTypeId', ), null, null, 'DeviceTypeDevices');
    } // buildRelations()

} // DeviceTypeTableMap
