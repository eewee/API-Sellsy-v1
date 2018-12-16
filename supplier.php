<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// SUPPLIER 
//---------------------------------------------------------------------------

$request = array (
    'method' => 'Supplier.create', 
    'params' => array(
        'third' => array(
            'name'              => 'API - Lorem ipsum '.date('Ymd'),
//          'ident'             => {{ident}},
//          'type'              => {{type}},
//          'email'             => {{email}},
//          'tel'               => {{tel}},
//          'fax'               => {{fax}},
//          'mobile'            => {{mobile}},
//          'joinDate'          => {{joinDate}},
//          'web'               => {{web}},
            'siret'             => '50996107400044',
//          'siren'             => {{siren}},
//          'vat'               => {{vat}},
            'rcs'               => 'RCS Paris 123456789',
//          'apenaf'            => {{apenaf}},
//          'capital'           => {{capital}},
//          'tags'              => {{tags}},
//          'accountingcode'    => {{accountingcode}},
//          'auxcode'           => {{auxcode}},
//          'stickyNote'                 => {{stickyNote}},
//          'rateCategory'               => {{rateCategory}},
//          'massmailingUnsubscribed'    => {{massmailingUnsubscribed}},
//          'massmailingUnsubscribedSMS' => {{massmailingUnsubscribedSMS}},
//          'facebook'          => {{facebook}},
//          'viadeo'            => {{viadeo}},
//          'twitter'           => {{twitter}},
//          'linkedin'          => {{linkedin}},
        ),
//         'contact' => array(
//             'name'       => {{name}},
//             'forename'   => {{forename}},
//             'email'      => {{email}},
//             'tel'        => {{tel}},
//             'fax'        => {{fax}},
//             'mobile'     => {{mobile}},
//             'web'        => {{web}},
//             'position'   => {{position}},
//             'civil'      => {{civil}},
//             'birthdate'  => {{birthdate}},
//             'stickyNote' => {{stickyNote}},
// 						'mcoptin'		  => {{mcoptin}},
// 						'mjoptin'		  => {{mjoptin}},
// 						'smoptin'		  => {{smoptin}}
//         ),
//         'address' => array(
//             'name'      => {{name}},
//             'part1'     => {{part1}},
//             'part2'     => {{part2}},
//             'part3'     => {{part3}},
//             'part4'     => {{part4}},
//             'zip'       => {{zip}},
//             'town'      => {{town}},
//             'countrycode'   => {{countrycode}}
//         )
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
