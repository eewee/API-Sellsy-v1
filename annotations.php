<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Annotations (comment)
//---------------------------------------------------------------------------

$request = array(
    'method' => 'Annotations.getList',
    'params' => array(
        'search' => array(
            'id'   => 1042575,
            'type' => "opportunity" // document, opportunity
        ),
        'pagination' => array(
            'nbperpage' => 10,
            'pagenum'   => 1
        )
    )
);

$request =  array(
    'method' => 'Annotations.create',
    'params' => array(
        'annotation' => array(
            //'parentid'  => {{parentid}},
            'relatedtype' => 'opportunity',  // estimate
            'relatedid' 	=> 544674,
            'text'      	=> "Test : \n Lorem ipsum.",
            //'date'      => {{date}}
        )
    )
);

$request =  array( 
    "method" => "Annotations.update", 
    "params" => array(
        "id" => 2028533,
        "annotation" => array(
            //'parentid'  => {{parentid}},
            "relatedtype" => "estimate",
            "relatedid" 	=> 5465921,
            "text"      	=> "Lorem\nipsum"
        )
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
