<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// ACCOUNTING
//---------------------------------------------------------------------------

$request = [
    'method' => 'Accounting.getList',
    'params' => [
//        'pagination' => [
//            'pagenum' => 1
//        ],
        'search' => [
            'view' => 'third'
        ]
    ]
];

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
