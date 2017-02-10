<?php
//
//$installer = $this;
//$table = $installer->getTable('sales/order');
//die($table);
//$installer->startSetup();
//$table = $installer->getConnection()
//    ->addColumn('test_column', Varien_Db_Ddl_Table::TYPE_NUMERIC, array('15', '5'), array(
//        'default'  => 0.0,
//    ));
//$installer->endSetup();

$this->startSetup();
$connection = $this->getConnection();

$connection->addColumn(
    $this->getTable('sales/order'),
    'working',
    "INT DEFAULT NULL"
);

$this->endSetup();
