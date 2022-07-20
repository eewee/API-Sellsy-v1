<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Oppportunity
//---------------------------------------------------------------------------

/*
$request = array(
    'method' => 'Opportunities.updateSharingStaffs',
    'params' =>  array (
        "linkedid"  => 1129034, //265,
//      "staffsIds" => [55],
//      "staffsIds" => [],
        "staffsIds" => [8021, 9529], //[99, 111],
    )
);

$request =  array(
    'method' => 'Opportunities.updateStep',
    'params' => array(
        'oid'    => 1,
        'stepid' => 2 // 1, 2, ..., 7
    )
);

// Changer propriétaire :
$request =  array( 
    'method' => 'Opportunities.updateOwner', 
    'params' => array(
        'linkedid'  => 1139909,
        'ownerid'   => 75599 // ID du propriétaire > Admin_1:75599, Michael DEMO:75160. = COLLABORATEUR AFFECTE
    )
);

$request = array(
    'method' => 'Opportunities.update',
    'params' => array(
        'id' => 1125490, // 1125479 !partage , 1125480 partage
        'opportunity' => array(
            'ident'     => 'OPP-APIdsfsdfsdfsd-'.date('YmdHis'),
            'sourceid'  => '2188',
            'name'      => 'API - test changement client.',
            'staffs'    => array(6791),
        )
    )
);

$request = array(
    'method' => 'Opportunities.getOne',
    'params' => array(
        'id' => 1125547
    )
);

$request = array(
    'method' => 'Opportunities.getList', 
    'params' => array(
        'search' => array(
            'thirds'   => [10779974],
        )
    )
);
$request = array( 
    'method' => 'Opportunities.getList', 
    'params' => array(
        'search' => array(
            'thirds'   => [15563529],
        )
    )
);
$request = array( 
    'method' => 'Opportunities.getList', 
    'params' => array(
//        'pagination' => array(
//            'pagenum'   => {{pagenum}},
//            'nbperpage' => {{nbperpage}}
//        ),
        'search' => array(
//            'periodecreated_start'  => {{periodecreated_start}},
//            'periodecreated_end'    => {{periodecreated_end}},
            'funnelid' => 30229,
//            'thirds'   => {{thirds}},
//            'tags'     => {{tags}},
//						'staffs'	 => {{staffs}},
//						'stepid'	 => {{stepid}},
						'status'   => array(
							'open',
							'won',
//							'lost',
//							'late',
//							'cancelled',
//							'closed'
						)
        )
    )
);

// getCurrentIdent
$request = array(
	'method' => 'Opportunities.getCurrentIdent',
	'params' => array()
);
$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
$opp_next = $response->response;
echo 'Opportunity (next value) : '.$opp_next;
echo '<hr>';
// create
$request = array(
    'method' => 'Opportunities.create',
    'params' => array(
        'opportunity' => array(
            'linkedtype'     => 'third',
            'linkedid'       => 1266907,
            'ident'          => $opp_next,
            'sourceid'       => 2187,	             // ex : site web (https://www.sellsy.fr/?_f=prospection_prefs&action=sources)
            //'dueDate'      => {{dueDate}},
            //'creationDate' => {{creationDate}},
            'name'           => 'lorem ipsum via API '.date('Y-m-d H:i:s'),
            //'potential'    => {{potential}},
            'funnelid'       => 1501,
            'stepid'         => 10354,
            //'proba'        => {{proba}},
            //'brief'        => {{brief}},
            //'stickyNote'   => {{stickyNote}},
            //'tags'         => {{tags}},
            //'ownerid'      => 77097,						  // Propriétaire
            //'staffs'       => array(75599),			  // Collaborateur affecté
            //'contacts'       => '7880193,9318655',  // Id a récupérer via un Prospects.getOne
        )
    )
);

$request = array(
    'method' => 'Opportunities.getCurrentIdent',
    'params' => array()
);
$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
$opp_next = $response->response; // UTILISE SUR Opportunites.create ci-dessous
// create
$request = array(
    'method' => 'Opportunities.create',
    'params' => array(
        'opportunity' => array(
            'linkedtype'     => 'prospect',
            'linkedid'       => 16349504,
            'ident'          => $opp_next,
            'sourceid'       => 45138,	        // ex : site web (https://www.sellsy.fr/?_f=prospection_prefs&action=sources)
            //'dueDate'      => {{dueDate}},
            //'creationDate' => {{creationDate}},
            'name'           => 'lorem ipsum via API',
            //'potential'    => {{potential}},
            'funnelid'       => 30229,
            'stepid'         => 210134,
            //'proba'        => {{proba}},
            //'brief'        => {{brief}},
            //'stickyNote'   => {{stickyNote}},
            //'tags'         => {{tags}},
            //'ownerid'      => 77097,			 // Propriétaire
            //'staffs'       => array(75599),	 // Collaborateur affecté
            //'contacts'     => '15208911',      // Id a récupérer via un Prospects.getOne / peopleid=15701462, >>> id=15208911 <<<
        )
    )
);

$request = array(
    'method' => 'Opportunities.update',
    'params' => array(
        'id' => 1203316,
        'opportunity' => array(
            'ident'         => 'OPP-00123',
            'sourceid'      => '45136',
//          'dueDate'       => {{dueDate}},
//          'creationDate'  => {{creationDate}},
            'name'          => 'API - test changement client...',
//          'potential'     => {{potential}},
            'proba'         => 50,
//          'brief'         => {{brief}},
//          'stickyNote'    => {{stickyNote}},
//          'tags'          => {{tags}},
//          'staffs'        => {{staffs}},
            'contacts'      => '8195205',    // getOne du contact pour obtenir l'id, ou tcid via inspecteur element. (string)
//          'funnelid'      => {{funnelid}},
//          'stepid'        => {{stepid}},
        )
    )
);

// get pipeline
$request = array(
    'method' => 'Opportunities.getFunnels',
    'params' => array()
);

// get col by pipeline
$request = array(
    'method' => 'Opportunities.getStepsForFunnel', 
    'params' => array(
        'funnelid' => 30437
    )
);

$request = array(
    'method' => 'Opportunities.getSources',
    'params' => array()
);
!
$request = [
    'method' => 'Opportunities.deleteSource',
    'params' => ["id"=>1365]
];

$request = array(
    'method' => 'Opportunities.getSource', 
    'params' => array(
        'id'    => {{sourceid}}
    )
);
*/

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
