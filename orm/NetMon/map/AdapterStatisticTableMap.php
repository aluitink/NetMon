<?php



/**
 * This class defines the structure of the 'AdapterStatistic' table.
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
class AdapterStatisticTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.AdapterStatisticTableMap';

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
        $this->setName('AdapterStatistic');
        $this->setPhpName('AdapterStatistic');
        $this->setClassname('AdapterStatistic');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('AdapterStatisticId', 'Adapterstatisticid', 'INTEGER', true, null, null);
        $this->addForeignKey('AdapterId', 'Adapterid', 'INTEGER', 'Adapter', 'AdapterId', true, null, null);
        $this->addColumn('InOctets', 'Inoctets', 'INTEGER', true, null, null);
        $this->addColumn('OutOctets', 'Outoctets', 'INTEGER', true, null, null);
        $this->addColumn('InPackets', 'Inpackets', 'INTEGER', true, null, null);
        $this->addColumn('OutPackets', 'Outpackets', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Adapter', 'Adapter', RelationMap::MANY_TO_ONE, array('AdapterId' => 'AdapterId', ), null, null);
    } // buildRelations()

} // AdapterStatisticTableMap
