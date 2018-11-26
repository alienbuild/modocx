<?php
// API Connection Details
$apiURL = $modx->getOption('opencart.store_url');
$apiSecretKey = $modx->getOption('opencart.api');

// Grab Form Values
$formValues = $hook->getValues();

if(isset($_SESSION['sessionid']) && !empty($_SESSION['sessionid'])){
    
    // Set post values
    $guestUser = array(
        'firstname' => $formValues['firstname'],
        'lastname' => $formValues['lastname'],
        'email' => $formValues['email'],
        'telephone' => $formValues['telephone'],
        'company' => $formValues['company'],
        'city' => $formValues['city'],
        'address_1' => $formValues['address_1'],
        'address_2' => $formValues['address_2'],
        'country_id' => $formValues['country_id'],
        'postcode' => $formValues['postcode'],
        'zone_id' => '123'
    );
    
    $data_string = json_encode($guestUser);  

    // Call the API
    $ch = curl_init($apiURL . '/index.php?route=rest/guest/guest'); 
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
    
    $modx->log(modX::LOG_LEVEL_ERROR, "Guest user created.");

    return true;
} else {
    $modx->log(modX::LOG_LEVEL_ERROR, "Session wasn't set.");
}