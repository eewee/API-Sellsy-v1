<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// STOCK
//---------------------------------------------------------------------------

// Stock.add
$request = array(
    'method' => 'Stock.add',
    'params' => array(
        'itemid'    => 3691136,
        'declid'    => 404573,
        'stock'     => array(
            'method'            => 'simple',
            'quantity'          => 1,
            'warehouseid_to'    => 8275, // destination > 
            'warehouseid_from'  => 8251, // expedition > entrepot:8251, LR:8275, Bdx:8276
            'calculatevalo'     => 'Y',
            'movetype'          => 'inventory', //manual, warehouse, inventory
            'movenotes'         => 'Mvt by API.'
        )
    )
);

$request = array(
    'method' => 'Stock.getMoves',
    'params' => array(
        'pagination' => array(
            'nbperpage' => 5,
            'pagenum'   => 1,
        ),
//         'order' => array(
//             'order'     => {{order}},
//             'direction' => {{direction}},
//         ),
        'search' => array(
//             'linkedtype'     => {{linkedtype}},
//             'perioddisplay'  => {{perioddisplay}},
//             'startdate'      => {{startdate}},
//             'enddate'        => {{enddate}},
//             'movedirection'  => {{movedirection}},
//             'includedeleted' => {{includedeleted}},
//             'warehouseid'    => {{warehouseid}},
//             'items'          => array(
               'itemid'         => 3989794,
               'declid'         => 499952
        )
    )
);

$request = array(
    'method' => 'Stock.getForItem',
    'params' => array(
        'itemid'        => 4568156,
        //'declid'      => {{declid}},
        //'warehouseid' => {{warehouseid}}
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
