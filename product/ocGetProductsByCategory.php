<?php
/*

[[!ocGetProductsByCategory?
  &tpl=`ocGetProductsByCategoryTpl`
  &categoryId=`27`
]]

*/
$tplChunk = $modx->getOption('tpl', $scriptProperties, '');
$categoryId = $modx->getOption('categoryId', $scriptProperties, '');

// get options and set variables
$apiURL = $modx->getOption('opencart.store_url') . '/index.php?route=feed/rest_api/products&category=' . $categoryId;
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
		    
		    $output = '';
		    
		    foreach ($data['data'] as $product) {
			    $output .= $modx->getChunk($tplChunk,$product);
			}
			
			return $output;

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