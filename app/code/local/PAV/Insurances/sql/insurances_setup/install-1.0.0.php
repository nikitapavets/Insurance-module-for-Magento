<?php

$this->startSetup();
$connection = $this->getConnection();

$connection->addColumn(
    $this->getTable('sales/order'),
    'shipping_insurance',
    "NUMERIC (10, 2) DEFAULT NULL"
);
$connection->addColumn(
    $this->getTable('sales/order'),
    'base_shipping_insurance',
    "NUMERIC (10, 2) DEFAULT NULL"
);
$connection->addColumn(
    $this->getTable('sales/quote_address'),
    'shipping_insurance',
    "NUMERIC (10, 2) DEFAULT NULL"
);
$connection->addColumn(
    $this->getTable('sales/quote_address'),
    'base_shipping_insurance',
    "NUMERIC (10, 2) DEFAULT NULL"
);

$this->endSetup();
