<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// ACCOUNTING JOURNAL
//---------------------------------------------------------------------------

$request = [
	'method'	=> 'AccountingJournal.getList',
	'params'	=> [
		'type'		=> 'sell'
// 		'search'	=> [ 
// 			'periodecreated_start'	=> {{periodecreated_start}},
// 			'periodecreated_end'		=> {{periodecreated_end}},
// 			'accountingCodes'		=> {{accountingCodes}},
// 			'currency'			=> {{currency}},
// 			'recorded'			=> {{recorded}},
// 			'thirdView'			=> {{thirdView}},
// 			'bankAccount'			=> {{bankAccount}}
// 		],
// 		'pagination' 	=> [
// 			'nbperpage'			=> {{nbperpage}},
// 			'pagenum'			=> {{pagenum}} 
// 		]
	]
];

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
