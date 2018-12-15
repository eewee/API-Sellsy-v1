<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Client
//---------------------------------------------------------------------------

$request = array(
    'method' => 'Client.getOne',
    'params' => array( 
        'clientid' => 10039850
    )
);

$request = array(
    'method' => 'Client.getList',
    'params' => array()
);
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
//			'contains' => 'Lorem',
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
             'rateCategory'                  => 97941,
             'massmailingUnsubscribed'			 => 'N',
             'massmailingUnsubscribedSMS'		 => 'N',
             'phoningUnsubscribed'					 => 'N',
             'massmailingUnsubscribedMail'	 => 'N',
             'massmailingUnsubscribedCustom' => 'N',
        ),
        'contact' => array(
             'name'                          => 'LASTNAME_API_'.date('YmdHis'),
             'forename'                      => 'FIRSTNAME_API_'.date('YmdHis'),
             'email'                         => 'EMAIL_API_'.date('YmdHis').'@eewee.fr',
  					 'mcoptin'	                     => 'N',
  					 'mjoptin'	                     => 'Y',
             'smoptin'	                     => 'Y',
             'massmailingUnsubscribed'       => 'N',
             'massmailingUnsubscribedSMS'		 => 'N',
             'phoningUnsubscribed'					 => 'N',
             'massmailingUnsubscribedMail'	 => 'N',
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
            'name'               => 'Lorem ipsum '.date('YmdHis'),
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
						 'massmailingUnsubscribed'			 => 'N',
             'massmailingUnsubscribedSMS'		 => 'N',
             'phoningUnsubscribed'					 => 'N',
             'massmailingUnsubscribedMail'	 => 'N',
             'massmailingUnsubscribedCustom' => 'N',
//             'facebook'        => {{facebook}},
//             'viadeo'          => {{viadeo}},
//             'twitter'         => {{twitter}},
//             'linkedin'        => {{linkedin}},
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
// 					'mcoptin'	      => {{mcoptin}},
// 				  'mjoptin'	      => {{mjoptin}},
// 					'smoptin'	      => {{smoptin}}
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
//            'currencyid'		      => {{currencyid}},
              'defaultShippingid'		=> '3664567',
//            'defaultTaxid'		    => {{defaultTaxid}},
//            'payDateid'			      => {{payDateid}},
//            'payDateEndMonth'		  => {{payDateEndMonth}},
//            'payDateXDays'		    => {{payDateXDays}},
//            'nbExpireDays'		    => {{nbExpireDays}},
//            'globalDiscount'		  => {{globalDiscount}},
//            'globalDiscountUnit'	=> {{globalDiscountUnit}},
//            'discountByRows'		  => {{discountByRows}},
//            'bankAccountid'		    => {{bankAccountid}}
//            'payMediums'		      => {{payMediums}}
        )
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
