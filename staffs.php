<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Staffs
//---------------------------------------------------------------------------

$request =  array( 
	'method' => 'Staffs.getList', 
	'params' => array (
		'search' => array(
			'withBlocked' => 'N',
		),
// 		'pagination' => array (
// 			'nbperpage' => {{nbperpage}},
// 			'pagenum' => {{pagenum}}
// 		)
	)
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
