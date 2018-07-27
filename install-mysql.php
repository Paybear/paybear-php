<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'lib/base_model.php';
require_once 'lib/CmsOrder.php';

$base_model = new base_model();

/**
 * install tables
 * */

$base_model->init_tables();

/**
 * init CMS order example
 * */

$CmsOrder = new CmsOrder();

$CmsOrder->increment_id     = '100001';
$CmsOrder->order_total      = 19.95;
$CmsOrder->fiat_currency    = 'usd';
$CmsOrder->fiat_sign        = '$';

if (empty($CmsOrder->findByIncrementId('100001'))) {
    $CmsOrder->save();
}
