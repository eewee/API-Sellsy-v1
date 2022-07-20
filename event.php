<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Event.getList
//---------------------------------------------------------------------------
/*
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
*/

$request =  array(
    'method' => 'Agenda.create',
    'params' => array(
        'type' => 'task',
        'task' => array(
            'id'          => 4174,
            //'linked'      => {{linked}},
			'description' => 'lorem ipsum 123',
			'title'       => 'titre',
			'label'       => 130207, //130209, // Réunion
			'allDay'      => 'Y',
			'start'       => '1534888800',
			'end'         => '1535493600',
			'isPrivate'   => 'N',
			//'alerts'      => {{alerts}},
			'staffids'    => [4174],
//			'staffs' => array(
//                'id'      => 4174,
//                'canEdit' => 'Y'
//		    ),
            'relatedtype'    => 'third',
            'relatedid'      => 1341970,
            //'exceptions'     => {{exceptions}},
            'use_recurrence' => 'N',
//            'recurrence' => array(
//                'frequency'     => {{frequency}},
//                'endMode'       => {{endMode}},
//                'periodicity'   => {{periodicity}},
//                'weekMode'      => {{weekMode}},
//                'monthMode'     => {{monthMode}},
//                'endOccurences' => {{endOccurences}},
//                'endDateValue'  => {{endDateValue}}
//			),
        )
    )
);

//$request =  array(
//    'method' => 'Agenda.getList',
//    'params' => array(
//        'order' => array(
//            'direction' => 'ASC'
//        )/*,
//        'search' => array(
//            'type'              => 'event',
//            'period'            => array('today'),
//            'labels'            => array(130209),
//            'ownerType'         => 'all',
//            'ownerId'           => 4174,
//            'relatedType'       => 'third',
//            'relatedId'         => 1325882,
//            'status'            => array('ok'),
//            'includeRecurring'  => 'N'
//        )*/
//    )
//);

// A tester (ne fonctionne pas)
//$request =  array(
//    'method' => 'Agenda.getOne',
//    'params' => array(
//        'id' => 'AAMkADNjNTdlOWE1LWQ5ZGQtNDFhZi1iUjA0LWYzNTJlNDk4ZVFjZgBGAAAAAABoaF2CLye1RYN_v7sPJUheBwCZxlK2oZx1Q6r3W-uUermlAAAAAAEOAACZxlK2oZx1Q6r4W-uUermNAAaSyrEwAAA=',
//        'calendarId' => 'AAMkADNjNTdlOWE1LWQ5ZGQtNDFhZi1iUjA0LWYzNTJlNDk4ZVFjZgBGAAAAAABoaF2CLye1RYN_v7sPJUheBwCZxlK2oZx1Q6r3W-uUermlAAAAAAEHAACZxlK2oZx1Q6r4W-uUermNAAAAAAUVAAA=',
//    )
//);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
