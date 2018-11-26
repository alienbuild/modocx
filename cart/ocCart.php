<?php
/*

[[!ocCart?
  &tpl=`ocCartTpl`
  &productsTpl=`ocCartProductsTpl`
]]

*/

// Script Properties
$cartTpl = $modx->getOption('tpl', $scriptProperties, '');
$emptyTpl = $modx->getOption('emptyTpl', $scriptProperties, '');
$productsTpl = $modx->getOption('productsTpl', $scriptProperties, '');
$totalsTpl = $modx->getOption('totalsTpl', $scriptProperties, '');

// API details
$apiURL = $modx->getOption('opencart.store_url') . '/index.php?route=rest/cart/cart';
$apiSecretKey = $modx->getOption('opencart.api');

// get JSON
if (!empty($apiURL)) {
	$s = curl_init();
	curl_setopt($s,CURLOPT_URL, $apiURL); 
	curl_setopt($s,CURLOPT_HTTPHEADER,array(
		'X-Oc-Merchant-Id: '.$apiSecretKey,
		'X-Oc-Session: '.$_SESSION['sessionid'],
		'X-Oc-Currency: GBP'
		)
	);    

	curl_setopt($s,CURLOPT_TIMEOUT, 30); 
	curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($s);
	curl_close($s);

	if ($result !== false) {
        //decode JSON
		$data = json_decode($result,true);

		if (!empty($data['data'])) {

        	// Set vars
			$products = array();
			$output = '';

            // Cart Values
			$cartValues = $data['data'];
			$output .= $modx->getChunk($cartTpl, $cartValues);

            // Product Values
			foreach($data['data']['products'] as $item) {
				foreach($item as $key => $value) {
					$products[$key] = $value;
				}
				$listProducts .= $modx->getChunk($productsTpl, $products);
			}

			$output = str_replace('[[+products]]', $listProducts, $output);

			$totals = array();

        	// Total Values
			foreach($data['data']['totals'] as $total) {
				foreach($total as $key => $value) {
					$totals[$key] = $value;
				}
				$listTotals .= $modx->getChunk($totalsTpl, $totals);
			}

			$output = str_replace('[[+totals]]', $listTotals, $output);

			return ($output);

		} else {
			return $modx->getChunk($emptyTpl);
		}

	} else {
		$modx->log(modX::LOG_LEVEL_ERROR, 'cURL failed');
	}
} else {
	$modx->log(modX::LOG_LEVEL_ERROR, 'dataSetURL is empty');
}
return '';