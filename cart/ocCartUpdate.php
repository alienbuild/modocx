<?php
require_once $modx->getOption('assets_path') . 'components/opencart/classes.php';

// API Connection Details
$apiURL = $modx->getOption('opencart.store_url');
$apiSecretKey = $modx->getOption('opencart.api');

// Delete clicked
if (isset($_POST['delete'])) {

	$delete = $_POST['delete'];
	list($submitVar, $key) = explode('-', $delete);

	// Call the API
	$ch = curl_init($apiURL . '/index.php?route=rest/cart/cart&key=' . $key); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',     
		'X-Oc-Merchant-Id: '.$apiSecretKey,
		'X-Oc-Session: '.$_SESSION['sessionid'])
	);    

	$response = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	return true;
}

// Update clicked
if(isset($_POST['update'])){

	$update = $_POST['update'];
	list($submitVar, $key) = explode('-', $update);

	// Set put values
	$product = array(
		'key' => $key,
		'quantity' => $hook->getValue('quantity' . $key)
	);

	$data_string = json_encode($product);  

	// Call the API
	$ch = curl_init('https://print.alienbuild.uk/index.php?route=rest/cart/cart'); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',     
		'X-Oc-Merchant-Id: '.$apiSecretKey,
		'X-Oc-Session: '.$_SESSION['sessionid'])
	);    

	$response = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	return true;

}