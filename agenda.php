<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Agenda
//---------------------------------------------------------------------------

// SAAS-6511
$request =  array(
    'method' => 'Agenda.getList',
    'params' => array(
        'order' => array(
            'direction' => 'asc'
        ),
//        'search' => array(
//            'type' => 'task'
//        )
    )
);

/*
$request =  array( 
    'method' => 'Agenda.getList',
    'params' => array(
        'search' => array(
            'type'   => 'task',
            'status' => array('complete')
        )
    )
);

$request = array(
    'method' => 'Agenda.getAvailableLabels',
    'params' => array()
);

$request =  array( 
    'method' => 'Agenda.create',
    'params' => array(
      'type'  => 'event', // event / task
      'event' => array(
        'title'       => 'Test ABC', // non dispo pour task
        'description' => 'API_DESCRIPTION - lorem ipsum',
        'label'       => '3',
        'allDay'      => 'Y',
        'start'       => '1577979873', // '1534773559',
        'end'         => '1577979873', // '1534773590',
        'isPrivate'   => 'Y',
        //'calendar'    => 'contact@tld.com',
        'id'          => 4143, // staffId
        'canEdit'     => 'Y'
      )
    )
);

$request =  array(
    'method' => 'Agenda.update',
    'params' => array(
      'id'    => 1234,
      'type'  => 'event', // event / task
      'event' => array(
        //'title'       => 'Test ABC', // non dispo pour task
        'description' => 'API_DESCRIPTION - lorem ipsum',
        'label'       => '3',
        'allDay'      => 'Y',
        'start'       => '1577979873', // '1534773559',
        'end'         => '1577979873', // '1534773590',
        'isPrivate'   => 'Y',
        'calendar'    => 'contact@tld.com',
        'id'          => 4143, // staffId
        'canEdit'     => 'Y'
      )
    )
);
*/

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
