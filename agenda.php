<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Agenda
//---------------------------------------------------------------------------

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
        'description' => 'lorem ipsum',
        'label'       => '2344463',
        'allDay'      => 'Y',
        'start'       => '1534773559',
        'end'         => '1534773590',
        'isPrivate'   => 'Y',
        'calendar'    => 'contact@tld.com',
      )
  
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
