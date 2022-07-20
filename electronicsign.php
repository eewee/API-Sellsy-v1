<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//$request = array(
//    'method' => 'ElectronicSign.getForDoc',
//    'params' => array(
//        'document' => array(
//            'doctype'   => 'estimate',
//            'docid'     => 988661
//        )
//    )
//);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
