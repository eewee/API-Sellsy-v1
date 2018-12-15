<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Event.getList
//---------------------------------------------------------------------------

$request =  array( 
    'method' => 'Event.getList', 
    'params' => array(
        'search' => array(
//          'relatedid'   => 1264249,
            'relatedtype' => 'opportunity', // client
						'start'       => '1534888800',
						'end'         => '1535493600'
        ),
//         'pagination'    => array(
//             'pagenum'   => {{pagenum}},
//             'nbperpage' => {{nbperpage}}
//         )
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
