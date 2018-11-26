<?php
/*

[[!ocShippingMethods?
  &tpl=`ocShippingMethods`
]]

*/

// Script Properties
$tplChunk = $modx->getOption('tpl', $scriptProperties, '');

// API details
$apiURL = $modx->getOption('opencart.store_url') . '/index.php?route=rest/shipping_method/shippingmethods';
$apiSecretKey = $modx->getOption('opencart.api');

// get JSON
if (!empty($apiURL)) {
	$s = curl_init();
	curl_setopt($s,CURLOPT_URL, $apiURL); 
	curl_setopt($s,CURLOPT_HTTPHEADER,array('X-Oc-Merchant-Id:' . $apiSecretKey)); 
	curl_setopt($s,CURLOPT_TIMEOUT, 30); 
	curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($s);
	curl_close($s);

	if ($result !== false) {
        //decode JSON
		$data = json_decode($result,true);

		if (!empty($data)) {
		    
			$array = $data['data'];
		    /*return $modx->getChunk($tplChunk, $array);*/

		    print_r($result);
		    return;

		} else {
			$modx->log(modX::LOG_LEVEL_ERROR, 'json_decode failed');
		}

	} else {
		$modx->log(modX::LOG_LEVEL_ERROR, 'cURL failed');
	}
} else {
	$modx->log(modX::LOG_LEVEL_ERROR, 'dataSetURL is empty');
}
return '';