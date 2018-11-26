<?php
/*

[[!ocLoginCheck?
  &tpl=`ocGuestLoginRegister`
]]

*/

// Script Properties
$ocGuestLoginRegister = $modx->getOption('tpl', $scriptProperties, '');

if ($modx->user instanceof modUser) {
  if ($modx->user->hasSessionContext('web')) { 
    // User is logged in already.
    return;
  } else{
    // Present login/register options
    $output = $modx->getChunk($ocGuestLoginRegister);
    return $output;
  }
}

return false;