<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Phone
//---------------------------------------------------------------------------

//{"method":"Phone.log","params":{"corpid":"1","staffs":"1","thirdid":"40095", "peopleid": 40161,"timestamp":"1548337144","duration":"3600","source":"incoming","type":"hangup","status":"ok","calltypeid":"173", "number":"fjfj", "note":"ldkfgjlfkj"}}

//$request = array(
//    'method' => 'Phone.log',
//    'params' => array (
//        'corpid'        => '1',
//        'staffs'        => '1',
//        'thirdid'       => '5',
//        'peopleid'      => '18',
//        'timestamp'     => '1548337144',
//        'duration'      => '3600',
//        'source'        => 'incoming',
//        'type'          => 'hangup',
//        'status'        => 'ok',
//        'calltypeid'    => '173',
//        'number'        => 'fjfj',
//        'note'          => 'Lorem ipsum www.google.com'
//    )
//);

//$request = array(
//    'method' => 'Phone.log',
//    'params' => array (
//        'number'        => '+33546121213',
//        'type'          => 'hold',         // 'start', 'pickup', 'transfered', 'hangup', 'hold', 'unhold'
//        'timestamp'     => '1591717373',
//        'thirdid'       => '1326704',
//        'peopleid'      => '567056',
//        'opportunityid' => '1125728',
//        'source'        => 'incoming',     // incoming, outcoming
////      'calltypeid'    => '',             // int - the one defined in plugin prefs (for current user)
//    )
//);




//{"method":"Phone.recordAfterCall","params":{"result":"busy","callid":74, "calltypeid":1, "note":"fgljls slfgjl dfvldjflsj"}}

//$request = array(
//    'method' => 'Phone.recordAfterCall',
//    'params' => array (
//        'result'        => 'busy',
//        'callid'        => 1,
//        'calltypeid'    => 1,
//        'note'          => 'Lorem ipsum www.google.fr, google.fr, https://google.fr, http://www.google.fr'
//    )
//);

$request = array(
    'method' => 'Phone.getList',
    'params' => array ()
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
