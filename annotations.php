<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Annotations (comment)
//---------------------------------------------------------------------------

/*
$request =  array(
    'method' => 'Annotations.create',
    'params' => array(
        'annotation' => array(
            'relatedtype' => 'task',
            'relatedid'   => '68951',
            'text'        => 'Test : \n Lorem ipsum - (6).'
        )
    )
);

$request =  array(
    'method' => 'Annotations.getOne',
    'params' => array(
        'id'    => 15191
    )
);

$request =  array(
    'method' => 'Annotations.getOne',
    'params' => array(
        'id' => 15179 // 15128
    )
);

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
            'relatedtype' => 'third',
            'relatedid'   => '1326210',
            //'parentid'  => {{parentid}},
//            'calendarid'  => 'michaelsellsy1@gmail.com',
//            'relatedtype' => 'googleEvent',  // third, estimate, opportunity, googleEvent, outlookEvent
//            'relatedid'   => '67p79bdsehs04vql30j4lcmlss',
//            'calendarid'  => 'AAMkADNjNTdlOWE1LWQ2ZGQtNDFhZi1iMjA0LWYzNTJlNDk4ZWFjZgBGAAAAAABoaF2CLye1RYN_v7sPJUheBwCZxlK2oZx1Q6r3W-uUermlAAAAAAEHAACZxlK2oZx1Q6r3W-uUermlAAAAAAUVAAA=',
//            'relatedtype' => 'outlookEvent',  // third, estimate, opportunity, googleEvent, outlookEvent
//            'relatedid'   => 'AAMkADNjNTdlOWE1LWQ2ZGQtNDFhZi1iMjA0LWYzNTJlNDk4ZWFjZgBGAAAAAABoaF2CLye1RYN_v7sPJUheBwCZxlK2oZx1Q6r3W-uUermlAAAAAAEOAACZxlK2oZx1Q6r3W-uUermlAAVtTC4jAAA=',
            'text'        => "Test : \n Lorem ipsum - develop.<br><a href='https://xenoapp.com/'>Xeno lien depuis API v1</a>",
            //'date'      => {{date}}
        )
    )
);

$request =  array(
    "method" => "Annotations.update",
    "params" => array(
        "id" => 5,
        "annotation" => array(
            //'parentid'  => {{parentid}},
            "relatedtype" => "client",
            "relatedid"   => 221,
            "text"        => "Lorem\nipsum\nupdated2"
        )
    )
);

$request =  array(
    'method' => 'Annotations.getOne',
    'params' => array(
        'id' => 15128
    )
);

$request =  array(
    'method' => 'Annotations.delete',
    'params' => array(
        'id' => 5
    )
);

$request =  array(
    'method' => 'Annotations.create',
    'params' => array(
        'annotation' => array(
            'relatedtype' => 'delivery', // third, estimate, opportunity, googleEvent, outlookEvent
            'relatedid'   => '985398',
            'text'        => 'Test : \n Lorem ipsum - .'
        )
    )
);
*/

$request =  array(
    'method' => 'Annotations.create',
    'params' => array(
        'annotation' => array(
            'relatedtype' => 'third', // third, estimate, opportunity, googleEvent, outlookEvent
            'relatedid'   => 3,
            'text'        => 'API v1 - Lorem <a href="https://www.bing.fr" target="_blank">ipsum</a>'
        )
    )
);

//echo json_encode( $request );
$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';

//echo "<pre>".var_export($response->response->datas->annotation, true)."</pre>";
