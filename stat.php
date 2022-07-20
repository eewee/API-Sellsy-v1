<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Stat
//---------------------------------------------------------------------------

$request =  [
    'method' => 'Stat.getSalesStats',
    'params' => [
        'search' => [
            'smartDate' => 'previousmonth'
        ]
    ]
];

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
