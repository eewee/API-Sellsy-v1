<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Payments
//---------------------------------------------------------------------------

$request = [
	'method' => 'Payments.create',
	'params' => [
		'type'  		=> 'credit', // credit / debit
		'date'	  	=> '1539468000',
		'amount'	  => '5',
		'currencyid'=> 2, // 2 = $
		'ident'		  => 'API '.date('Ymd-his'),
		'note'		  => 'Test paiement x',
		'linkedid'	=> 9942853, // idClient
		'mediumid'	=> 2344500, // CB, Cheque, virement, ...
		'inBank'	  => 'Y',
		'bank'		  => [
			'id'	 => '35373',
			'date' => '1539468000'
		]
	]
];

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
