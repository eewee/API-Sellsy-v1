<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

$request = [
	'method'	=> 'DocRows.getList',
	'params'	=> [
 		'search' => [
// 			'periodecreated_start'	    => {{periodecreated_start}},
// 			'periodecreated_end'	      => {{periodecreated_end}},
// 			'periodecreationDate_start'	=> {{periodecreationDate_start}},
// 			'periodecreationDate_end'	  => {{periodecreationDate_end}},
// 			'doctype'		                => {{doctype}},
// 			'rowtype'		                => 'item',
 			'docs'			                => [10795783],
// 			'thirds'		                => {{thirds}},
// 			'items'			                => {{items}},
// 			'accountingCodes'	          => {{accountingCodes}},
// 			'tags_select'		            => {{tags_select}},
// 			'tags'			                => {{tags}}
 		],
// 		'order'		=> [
// 			'direction'	                => {{direction}},
// 			'order'		                  => {{order}}
// 		],
// 		'pagination' 	=> [
// 			'nbperpage'	                => {{nbperpage}},
// 			'pagenum'	                  => {{pagenum}} 
// 		]
	]
];

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
