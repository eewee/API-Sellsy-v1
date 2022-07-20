<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Client
//---------------------------------------------------------------------------

/*
$request = array(
    'method'    =>  'Client.updateSharingStaffs',
    'params'    =>  array (
        "linkedid"  => 1344504,     //1221,
//      "staffsIds" => [55],
//      "staffsIds" => [],
        "staffsIds" => [8021, 9529],
    )
);

$request = array(
    'method' => 'Client.getOne',
    'params' => array(
        'clientid' => 1325971 // 1266907
    )
);

$request = array (
    'method' => 'Client.create',
    'params' => array(
        'third' => array(
            'name'    				=> 'Lorem ipsum '.date('YmdHis'),
            'ident'   				=> 'ref xyz',
            'type'    				=> 'corporation',
            'email'   				=> 'contact_societe@tld.com',
            'tel'     				=> '0511223344',
            'fax'     				=> '0511223345',
            'mobile'  				=> '0611223344',
            'joinDate'				=> 1510527600,
            'web'     				=> 'xxx.com',
            'siret'   				=> '907 241 356 71192',
            'siren'   				=> '249 757 687',
            'vat'     				=> 'FR 40 123456825',
            'rcs'     				=> 'NANTES A 228 807 494',
            'apenaf'  				=> '1250C',
            'capital' 				=> '547 291 375',
            'tags'    				=> 'aaa, bbb, ccc',
            'stickyNote'			=> 'Lorem ipsum',
//          'rateCategory'			=> '',
            'massmailingUnsubscribed'		=> 'N',
            'massmailingUnsubscribedSMS'	=> 'N',
            'phoningUnsubscribed'			=> 'Y',
            'massmailingUnsubscribedMail'	=> 'Y',
            'massmailingUnsubscribedCustom'	=> 'Y',
            'facebook'						=> 'https://fr-fr.facebook.com/RedBull-rujsqafqahuqcpffrelj',
            'viadeo'						=> 'https://fr.viadeo.com/fr/company/red-bull-ehfofczxlidcyykdeayu',
            'twitter'						=> 'https://twitter.com/redbull-aahnwgarcfewkxlsbzze',
            'linkedin'						=> 'https://fr.linkedin.com/company/red-bull-gnfszxcmxyxhvqwkvuvg',
//          'accountingcode'				=> {{accountingcode}},
//          'auxcode'						=> {{auxcode}},
//          'accountingpurchasecode'		=> {{accountingpurchasecode}},
        ),
        'contact' => array(
            'name'          => 'DOE '.date('YmdHis'),
            'forename'      => 'John',
            'email'         => 'JohnDoe@tld.com',
            'tel'           => '0411223344',
            'fax'           => '0411223345',
            'mobile'        => '0711223344',
            'web'           => 'xyz.com',
            'position'      => 'CEO',
            'civil'         => 'man',
            'birthdate'     => 1510527600,
            'stickyNote'    => 'lorem\nipsum',
			'mcoptin'		=> 'Y',
			'mjoptin'		=> 'Y',
			'smoptin'		=> 'N'
        ),
        'address' => array(
            'name'        => 'Adresse de ma société.',
            'part1'       => '50 avenue du Lazaret',
            'part2'       => 'Appartement 1534',
            'part3'       => 'Digicode 1234',
            'part4'       => 'Lorem ipsum',
            'zip'         => '33000',
            'town'        => 'BORDEAUX',
            'countrycode' => 'FR'
        )
    )
);

//$request = array(
//    'method' => 'Client.getAddress',
//    'params' => array (
//        'clientid'  => 1326084,
//        'addressid' => 915182
//    )
//);

//$request = array(
//    'method' => 'Client.getOne',
//    'params' => array(
//        'clientid' => 1266907
//    )
//);
*/

$request = array(
    'method' => 'Client.getList',
    'params' => array()
);

/*
$request = array(
    'method' => 'Client.getList',
    'params' => array(
        'search' => array(
            'name'  => 'Wordpress',
            'actif' => 'Y',
        ),
    )
);
$request = array(
    'method' => 'Client.getList',
    'params' => array(
        'search' => array(
            'name' => 'DOE',
            'customfields' => [
                [
                    'cfid'        => 62152,
                    'unspecified' => 'N',
                    'value'       => 'test'
                ]
            ],
        ),
    )
);
$request = array(
    'method' => 'Client.getList',
    'params' => array(
        'type' => 'corporation',
//		'contains' => 'Lorem',
        'search' => array(
            'customfields' => array(
                array(
                    'cfid' => 21834,
                    //'unspecified' => 'N',
                    'value' => array('Y'),
                ),
            ),
        )
    )
);
$request = array(
    'method' => 'Client.getList',
    'params' => array(
        'search' => array(
//          'name'  => 'xxx',
            'owner' => [75599],
        ),
    )
);

$request = array(
    'method' => 'Client.getList',
    'params' => array(
        'order' => array(
            'direction' => 'ASC'
        ),
        'search' => array(
            'type'      => 'corporation',	// corporation, person
            'contains'  => 'Bouygues'
        ),
       'pagination' => array (
            'pagenum'   => 1,
            'nbperpage' => 10
       )
    )
);

$request = array (
    'method' => 'Client.create',
    'params' => array(
        'third' => array(
             'name'                          => 'Lorem ipsum '.date('YmdHis'),
             'type'                          => 'corporation',
             'vat'                           => "FR 40 123456825",
//           'rateCategory'                  => 97941,
             'massmailingUnsubscribed'       => 'N',
             'massmailingUnsubscribedSMS'    => 'N',
             'phoningUnsubscribed'           => 'N',
             'massmailingUnsubscribedMail'	 => 'N',
             'massmailingUnsubscribedCustom' => 'N',
        ),
        'contact' => array(
            'name'                          => 'LASTNAME_API_'.date('Ymd_His'),
            'forename'                      => 'FIRSTNAME_API_'.date('Ymd_His'),
            'email'                         => 'EMAIL_API_'.date('YmdHis').'@eewee.fr',
            'mcoptin'	                    => 'N',
            'mjoptin'	                    => 'Y',
            'smoptin'	                    => 'Y',
            'massmailingUnsubscribed'       => 'N',
            'massmailingUnsubscribedSMS'    => 'N',
            'phoningUnsubscribed'           => 'N',
            'massmailingUnsubscribedMail'   => 'N',
            'massmailingUnsubscribedCustom' => 'N',
            'birthdate'                     => 1510527600,
         ),
    )
);

$request = array (
    'method' => 'Client.update', 
    'params' => array(
        'clientid' => 13131250,
        'third'    => array(
             'name'              => 'Lorem ipsum '.date('YmdHis'),
//           'ident'             => {{ident}},
             'type'              => 'corporation',
             'email'             => 'aaaa@eewee.fr',
             'tel'               => '01 22 33 44 55',
//           'fax'               => {{fax}},
//           'mobile'            => {{mobile}},
//           'joinDate'          => {{joinDate}},
//           'web'               => {{web}},
//           'siret'             => {{siret}},
//           'siren'             => {{siren}},
             'vat'               => "FR 40 123456825",
//           'rcs'               => {{rcs}},
//           'apenaf'            => {{apenaf}},
//           'capital'           => {{capital}},
//           'tags'              => {{tags}},
//           'accountingcode'    => {{accountingcode}},
//           'auxcode'           => {{auxcode}},
//           'stickyNote'        => {{stickyNote}},
//           'rateCategory'      => {{rateCategory}},
			 'massmailingUnsubscribed'	     => 'N',
             'massmailingUnsubscribedSMS'    => 'N',
             'phoningUnsubscribed'		     => 'N',
             'massmailingUnsubscribedMail'   => 'N',
             'massmailingUnsubscribedCustom' => 'N',
//           'facebook'        => {{facebook}},
//           'viadeo'          => {{viadeo}},
//           'twitter'         => {{twitter}},
//           'linkedin'        => {{linkedin}},
        ),
        'contact' => array(
            'name'          => 'LASTNAME_API_'.date('YmdHis'),
            'forename'      => 'FIRSTNAME_API_'.date('YmdHis'),
            'email'         => 'EMAIL_API_'.date('YmdHis').'@eewee.fr',
//          'tel'           => {{tel}},
//          'fax'           => {{fax}},
//          'mobile'        => {{mobile}},
//          'web'           => {{web}},
//          'position'      => {{position}},
//          'civil'         => {{civil}},
//          'birthdate'     => {{birthdate}},
//          'stickyNote'    => {{stickyNote}},
// 			'mcoptin'       => {{mcoptin}},
// 			'mjoptin'       => {{mjoptin}},
// 			'smoptin'       => {{smoptin}}
         ),
        'address' => array(
            'name'        => 'abcd',
            'part1'       => 'lorem ipsum.',
//          'part2'       => {{part2}},
//          'part3'       => {{part3}},
//          'part4'       => {{part4}},
            'zip'         => '33000',
            'town'        => 'BORDEAUX',
//          'countrycode' => {{countrycode}}
        )
    )
);
$request = array ( 
	'method' => 'Client.update', 
	'params' => array(
		'clientid' => 10012431,
		'third'    => array(
			'name'           => 'Lorem ipsum',
			'accountingcode' => 431000,
		)
	)
);

$request = array(
  'method'    =>  'Client.updateSharingGroups',
  'params'    =>  array (
    "linkedid"   =>  10039850,
    "groupsIds"   => [2379]
  )
);

$request = array(
    'method' => 'Client.sendContactPwd', 
    'params' => array (
        'thirdid'        => 11166619,
        'thirdcontactid' => 9383298
    )
);

$request = array(
    'method' => 'Client.updatePrefs',
    'params' => array(
        'thirdid' => 9942853,
        'prefs'   => array(
//            'currencyid'		   => {{currencyid}},
              'defaultShippingid'  => '3664567',
//            'defaultTaxid'	   => {{defaultTaxid}},
//            'payDateid'		   => {{payDateid}},
//            'payDateEndMonth'	   => {{payDateEndMonth}},
//            'payDateXDays'	   => {{payDateXDays}},
//            'nbExpireDays'	   => {{nbExpireDays}},
//            'globalDiscount'	   => {{globalDiscount}},
//            'globalDiscountUnit' => {{globalDiscountUnit}},
//            'discountByRows'	   => {{discountByRows}},
//            'bankAccountid'	   => {{bankAccountid}}
//            'payMediums'		   => {{payMediums}}
        )
    )
);
*/

//$request = array(
//    'method' => 'Client.getContact',
//    'params' => array (
//        'clientid'  => 1326303,
//        'contactid' => 566402
//    )
//);

//$request = array(
//    'method' => 'Client.addContact',
//    'params' => array (
//        'clientid' => 1266907,
//        'contact'  => [
//            'name'             => 'DOE_'.uniqid(),
//            'forename'         => 'John_'.uniqid(),
//            'email'            => 'test_api_'.uniqid().'@tld2.com',
//            'isBillingContact' => 'Y'
//        ]
//    )
//);

//$request = array(
//    'method' => 'Client.updateContact',
//    'params' => array (
//        'clientid'  => 1266907,
//        'contactid' => 448445,
//        'contact'   => [
//            'name'             => 'DOE_'.uniqid(),
//            'forename'         => 'John_'.uniqid(),
//            'email'            => 'test_api_'.uniqid().'@tld.com',
//            'isBillingContact' => 'Y'
//        ]
//    )
//);

//$request = array(
//    'method' => 'Client.getOne',
//    'params' => array(
//        'clientid' => 1327019
//    )
//);

//$request = array(
//    'method' => 'Client.deleteAddress',
//    'params' => array (
//        'clientid'  => 186,
//        'addressid' => 211
//    )
//);

/*
$request = array(
    'method' => 'Client.getList',
    'params' => array(
        'order' => array(
            'direction' => 'ASC'
        )
    )
);

$request = [
    'method' => 'Client.getList',
    'params' => [
        'order' => [
            'direction' => 'DESC',
            'order'     => 'contactType',
        ],
        'pagination' => [
            'nbperpage' => 100,
            'pagenum'   => 1,
        ]
    ]
];
*/

//echo json_encode( $request );
$response = sellsyconnect_curl::load()->requestApi($request);
//echo "<pre>"; var_dump( $response->response->corporation->mainaddressid ); echo "</pre>";
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
