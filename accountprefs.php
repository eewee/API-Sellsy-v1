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
//            'name'      => '[TEST] Michael (NE PAS SUPPRIMER) yyy',
//            //'email'     => '',
//            'tel'       => '+33 2 02 03 04 06',
//            'fax'       => '+33 3 02 03 04 07',
//            'web'       => 'https://www.téx.in',
//            'siret'     => '971 300 322 11028',
//            'siren'     => '769 791 959',
//            'vat'       => 'IT 67980326731',
//            'rcs'       => 'LYON A 805 600 382',
//            'type'      => 'SARL',
//            'capital'   => '284 824,764'
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

//$request =  array(
//    'method' => 'AccountPrefs.getCurrency',
//    'params' => array()
//);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
