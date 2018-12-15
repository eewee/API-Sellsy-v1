<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// BANKACCOUNT
//---------------------------------------------------------------------------

$request =  array( 
    'method' => 'BankAccount.getOne', 
    'params' => array(
        'id'    => 35373
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
