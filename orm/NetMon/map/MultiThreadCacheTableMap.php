<?php



/**
 * This class defines the structure of the 'MultiThreadCache' table.
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
class MultiThreadCacheTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'NetMon.map.MultiThreadCacheTableMap';

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
        $this->setName('MultiThreadCache');
        $this->setPhpName('MultiThreadCache');
        $this->setClassname('MultiThreadCache');
        $this->setPackage('NetMon');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('MultiThreadCacheId', 'Multithreadcacheid', 'INTEGER', true, null, null);
        $this->addColumn('BatchIdentifier', 'Batchidentifier', 'VARCHAR', true, 10, null);
        $this->addColumn('TimeLimit', 'Timelimit', 'INTEGER', false, null, null);
        $this->addColumn('Pid', 'Pid', 'INTEGER', false, null, null);
        $this->addColumn('Status', 'Status', 'BOOLEAN', false, 1, null);
        $this->addColumn('Variables', 'Variables', 'VARCHAR', false, 512, null);
        $this->addColumn('Output', 'Output', 'VARCHAR', false, 512, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // MultiThreadCacheTableMap
