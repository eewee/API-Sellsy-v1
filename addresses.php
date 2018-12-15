<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Addresses
//---------------------------------------------------------------------------

$request =  array( 
    'method' => 'Addresses.getOne',
    'params' => array(
        'id' => 36063871,
    )
);

$request =  array( 
    'method' => 'Addresses.create',
    'params' => array(
        'linkedtype'    => "third",  // people="contact", third="client, prospect, fournisseur) 
        'linkedid'  => 10779974,
        'name'      => "Bureau",
        'part1'     => "5 rue Albert Einstein",
        //'part2'     => {{part2}},
        //'part3'     => {{part3}},
        //'part4'     => {{part4}},
        'zip'       => "33000",
        'town'      => "BORDEAUX",
        //'countrycode'   => {{countrycode}},
	      'isMain'   => "Y",
	      //'isMainDeliv'   => "Y"
    )
);

$request =  array( 
    'method' => 'Addresses.update',
    'params' => array(
        'id'        => 43423277,
        'linkedtype'=> 'peoples',
        'linkedid'  => 13566033,
        'name'      => 'Bureau Bordeaux',
        'part1'     => '123 Av. Lorem Ipsum',
        'part2'     => 'bbb',
        'part3'     => 'ccc',
        'part4'     => 'ddd',
        'zip'       => 33000,
        'town'      => 'Bordeaux',
        'countrycode'   => 'FR',
	      'isMain'    => 'Y',
      	'isMainDeliv' => 'Y'
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
