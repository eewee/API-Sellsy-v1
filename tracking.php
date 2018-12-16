<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Tracking
//---------------------------------------------------------------------------

$request = [
	'method' => 'Tracking.record',
	'params' => [
      'thirdid' => "9506001",
      'trackings' => [
				0 => [
          'type'       => "url",  // url, form
          'url'        => "https://www.tld.com/01",
          'timestamp'  => "1511024640",
          //'formid'   => {{formid}},
          //'formname' => {{formname}},
				],
				1 => [
          'type'       => "url",  // url, form
          'url'        => "https://www.tld.com/02",
          'timestamp'  => "1511182706",
          //'formid'   => {{formid}},
          //'formname' => {{formname}},
				],
      ]
	]
];

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
