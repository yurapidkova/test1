<?php
/**
 * Created by PhpStorm.
 * User: danson
 * Date: 19.03.16
 * Time: 19:04
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$connection = $installer->getConnection();
$table = $connection->newTable('simple_faq')
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER,11,
        array(
            'unsigned'  => true,
            'identity'  => true,
            'nullable'  => false,
            'primary'   => true,
        ), 'Simple FAQ Id')
    ->addColumn('question', Varien_Db_Ddl_Table::TYPE_TEXT, null,
        array(
            'nullable'  => false,
        ), 'Simple FAQ Question')
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_TEXT, null,
        array(
            'nullable'  => false,
        ), 'Simple FAQ Answer')
    ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, null,
        array(
            'nullable'  => false,
            'default'   => '0',
        ), 'Is Simple FAQ Active')
    ->addColumn('creation_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(), 'Simple FAQ Creation Time')
    ->addColumn('update_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(), 'Simple FAQ Modification Time');
$connection->createTable($table);

$installer->endSetup();