<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Tracking
//---------------------------------------------------------------------------

$request = [
	'method' => 'Tracking.record',
	'params' => [
        'thirdid' => "1326210",
        'trackings' => [
            0 => [
              'type'       => "url",  // url, form
              'url'        => "https://www.tld.com/01",
              'timestamp'  => "1511024640",
              //'formid'   => {{formid}},
              //'formname' => {{formname}},
            ],
            1 => [
                'type'       => "url",
                'url'        => "https://www.tld.com/02",
                'timestamp'  => "1511182706"
            ],
            2 => [
                'type'       => "url",
                'url'        => "https://www.tld.com/03 bis",
                'timestamp'  => "1511182736"
            ],
        ]
	]
];

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
