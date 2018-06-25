<?php

require_once 'lib/CmsOrder.php';
require_once 'lib/PayBearOrder.php';

$cms_order = new CmsOrder();
$payBearOrder = new PayBearOrder();

$currencies = $payBearOrder->getCurrencies();


$order_id = $_GET['order_id'];

$last_order = $cms_order->findByIncrementId($order_id);

if (empty($last_order)) {
    echo 'Order not found';
    return;
}

if (isset($_GET['token'])) {
	$token = $_GET['token'];

	$data = $payBearOrder->getCurrency($order_id, $token, $last_order->order_total, $last_order->fiat_currency, true );
} else {

    $data = array();
    foreach($currencies as $key => $currency) {

        if (count($currencies) == 1) {
            $data = $payBearOrder->getCurrency($order_id, $key, $last_order->order_total, $last_order->fiat_currency, true );
        }else {
            $data[$key] = $payBearOrder->getCurrency($order_id, $key, $last_order->order_total, $last_order->fiat_currency);
        }
    }
}

echo json_encode($data); //return this data to PayBear form

