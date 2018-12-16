<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

$request = array(
    'method' => 'SmartTags.assign',
    'params' => array(
        'linkedtype' => "people",
        'linkedid'   => 9535438,
        'tags'       => "lorem"
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
