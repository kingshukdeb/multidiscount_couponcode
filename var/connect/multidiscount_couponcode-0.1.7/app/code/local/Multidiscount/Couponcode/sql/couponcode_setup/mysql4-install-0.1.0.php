<?php
$installer = $this;
$installer->startSetup();

$installer->getConnection()
->addColumn($installer->getTable('salesrule'),'cartpercent_serialized', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
    'nullable'  => yes,
    'after'     => 'actions_serialized', // column name to insert new column after
    'default'   => NULL,
    'comment'   => 'Cart percent rule'
    ));
$installer->endSetup();