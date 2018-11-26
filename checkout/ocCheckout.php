<?php
$formFields = $hook->getValues();

$modx->log(modX::LOG_LEVEL_ERROR, 'Name submitted was:' . $formFields['firstname'] . $formFields['lastname']);

return;