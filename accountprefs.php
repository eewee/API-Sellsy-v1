<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// AccountPrefs
//---------------------------------------------------------------------------

//$request =  array( 
//    'method' => 'AccountPrefs.getStaffInfos',
//    'params' => array()
//);

//$request =  array(
//    'method' => 'AccountPrefs.updateCorpInfos',
//    'params' => array(
//        'corp' => array(
//            'name'      => '[TEST] Michael (NE PAS SUPPRIMER) xxx',
//            //'email'     => '',
//            'tel'       => '+33 1 22 33 44 55',
//            'fax'       => '+33 1 22 33 44 56',
//            'web'       => 'https://www.lorem.tld',
//            'siret'     => '123 456 789 11111',
//            'siren'     => '111 222 333',
//            'vat'       => 'IT 12345678901',
//            'rcs'       => 'LYON A 111 222 333',
//            'type'      => 'SARL',
//            'capital'   => '111 222,333'
//        )
//    )
//);

//// Vous devez avoir un logo de société pour obtenir un résultat/url.
//$request =  array(
//    'method' => 'AccountPrefs.getLogoPublicLink',
//    'params' => array()
//);

//$request =  array(
//    'method' => 'AccountPrefs.deleteLogo',
//    'params' => array()
//);

//$request =  array(
//    'method' => 'AccountPrefs.getCurrencies',
//    'params' => array()
//);

$request =  array(
    'method' => 'AccountPrefs.getCurrency',
    'params' => array()
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
