<?php
// Add product to cart hook 
require_once $modx->getOption('assets_path') . 'components/opencart/classes.php';

// API Connection Details
$apiURL = $modx->getOption('opencart.store_url');
$apiSecretKey = $modx->getOption('opencart.api');

// Grab Form Values
$formValues = $hook->getValues();

if(isset($_SESSION['sessionid']) && !empty($_SESSION['sessionid'])){
    
    // Set post values
	$product = array(
		'product_id' => $formValues['product_id'],
		'quantity' => $formValues['quantity']
	);
	
	$data_string = json_encode($product);  

    // Call the API
	$ch = curl_init($apiURL . '/index.php?route=rest/cart/cart'); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
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

// Decode response
	$jsonData = json_decode($response, true);

	if($jsonData['result']=='error'){
		$modx->log(modX::LOG_LEVEL_ERROR, $jsonData['message']);
	}

	return true;
} else {
	$modx->log(modX::LOG_LEVEL_ERROR, "Session wasn't set.");
}