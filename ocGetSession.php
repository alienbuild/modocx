<?php
// API details
$apiURL = $modx->getOption('opencart.store_url') . '/index.php?route=feed/rest_api/session';
$apiSecretKey = $modx->getOption('opencart.api');

if(isset($_SESSION['sessionid']) && !empty($_SESSION['sessionid'])){
	return; 	
} else{

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
		    $session = $data['data']['session'];
		    $modx->toPlaceholder('session',$session);
		    $_SESSION["sessionid"] = $session;
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
return;
}