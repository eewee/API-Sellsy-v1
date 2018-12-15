<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// ACCOUNTDATAS
//---------------------------------------------------------------------------

$request = array(
    'method' => 'Accountdatas.getTranslationLanguages',
    'params' => array()
);  

$request = array(
    'method' => 'Accountdatas.getRateCategories',
    'params' => array()
);

$request = array(
    'method' =>  'Accountdatas.getTaxes',
    'params' => array(
//        'includeEcoTax' => 'N',
//        'enabled' 			=> 'all',
    )
);

$request = array( 
  'method' => 'Accounting.create',
  'params' => array ( 
      'accountingcode'    => array(
          'code'          => 41107227,
          'label'         => "Lorem ipsum",
//          'sellView'      => {{sellView}},
//          'purchaseView'      => {{purchaseView}},
          'thirdView'     => "Y",
//          'bankView'      => {{bankView}}
      )
  )
);

$request = array(
    'method' => 'Accountdatas.createShippings',
    'params' => array(
        'shippings' => array(
            array(
                'name' => 'Mondial Relay',
                'isEnabled' => 'Y',
                'qt' => 3,
                'unitAmount' => 8.5,
                'unitAmountIsTaxesFree' => 'Y',
//                'taxid' => {{shipping_taxid}}
            )
        )
    )
);

$request = array(
    'method' =>  'Accountdatas.getUnits',
    'params' => array()
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
