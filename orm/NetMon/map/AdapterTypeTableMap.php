<?php



/**
 * This class defines the structure of the 'AdapterType' table.
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
class AdapterTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.AdapterTypeTableMap';

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
        $this->setName('AdapterType');
        $this->setPhpName('AdapterType');
        $this->setClassname('AdapterType');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('AdapterTypeId', 'Adaptertypeid', 'INTEGER', true, null, null);
        $this->addColumn('Type', 'Type', 'VARCHAR', true, 25, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AdapterAdapterType', 'Adapter', RelationMap::ONE_TO_MANY, array('AdapterTypeId' => 'AdapterTypeId', ), null, null, 'AdapterAdapterTypes');
    } // buildRelations()

} // AdapterTypeTableMap
