<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Prospect
//---------------------------------------------------------------------------

$uniqid = uniqid("api_");

$request =  array( 
	'method' => 'Prospects.getOne', 
	'params' => array(
			'id' => 10779974
	)
);

$request = array( 
    'method' => 'Prospects.getList', 
    'params' => array(
        'search' => array(
            'contains' => 'Wordpress lorem ipsum',
       			'actif'    => 'Y',
        )
    )
);

$request =  array( 
    'method' => 'Prospects.updateOwner', 
    'params' => array(
        'linkedid'  => 15279458,
        'ownerid'   => 95942
    )
);

// Faire un Prospects.getOne pour recup contactid
$request =  array( 
	'method' => 'Prospects.getOne', 
	'params' => array(
		'id' => 9609348
	)
);
$response = sellsyconnect_curl::load()->requestApi($request);
$p = $response->response->contacts;
foreach ($p as $k=>$v) {
	echo 'Contact id pour Opportunities.create:'.$k.'<br>';
}

$request = array(
    'method' => 'Prospects.create',
    'params' => array(
        'third' => array(
            'ident' => 1234567890, // reference
          
						'massmailingUnsubscribed'			  => 'N',
            'massmailingUnsubscribedSMS'	  => 'N',
            'phoningUnsubscribed'					  => 'N',
            'massmailingUnsubscribedMail'	  => 'N',
            'massmailingUnsubscribedCustom' => 'N',

            'type'          => 'person',
            'name'          => 'John DOE '.$uniqid,
						'email'					=> 'prospect-'.$uniqid.'@eewee.fr',
						'tel'						=> '+33122334455',
//					'thirdids'			=> ''
            
//          'type'          => {{thirdType}},
//          'email'         => {{thirdEmail}},
//          'tel'           => {{thirdTel}},
//          'fax'           => {{thirdFax}},
//          'mobile'        => {{thirdMobile}},
//          'web'           => {{thirdWeb}},
//          'joinDate'      => {{joinDate}},
//          'siret'         => {{thirdSiret}},
//          'siren'         => {{thirdSiren}},
//          'vat'           => {{thirdVat}},
//          'rcs'           => {{thirdRcs}},
            
//          'corpType'      => {{corpType}},
//          'apenaf'        => {{thirdApenaf}},
//          'capital'       => {{thirdCapital}},
//          'tags'          => {{thirdTags}},
//          'accountingcode'=> {{thirdAccountingcode}},
//          'auxcode'       => {{thirdAuxcode}},
//          'stickyNote'    => {{thirdStickyNote}},
        ),
        
        'contact' => array(
            'civil'     => 'man',
            'name'      => 'DOE',
            'forename'  => 'John',
            'email'     => 'contact-'.$uniqid.'@eewee.fr',
            'tel'       => '+33122334456',
//          'fax'       => {{contactFax}},
//          'mobile'    => {{contactMobile}},
//          'position'  => {{contactPosition}},
					
						'massmailingUnsubscribed'			  => 'Y',
            'massmailingUnsubscribedSMS'	  => 'N',
            'phoningUnsubscribed'					  => 'Y',
            'massmailingUnsubscribedMail'	  => 'N',
            'massmailingUnsubscribedCustom' => 'Y',
        ),

        'address' => array(
            'name'          => 'Bureau',
            'part1'         => '20 rue Lorem ipsum',
            'part2'         => 'Digicode 1234',
            'zip'           => '17000',
            'town'          => 'LA ROCHELLE',
            //'countrycode' => {{addressCountrycode}}
        )

    )
);

$request = array(
    'method' => 'Prospects.update',
    'params' => array(
        'id' => 10779974,
        'third' => array(
             'name'     => 'Lorem',		              // REQUIRED
//           'web'      => {{thirdWeb}},
//           'joinDate' => {{joinDate}},
// 					 'corpType' => {{corpType}},
	           'tel'      => '0122334456'
        ),
        'contact' => array(
            'name'      => 'contact_name_test',			// REQUIRED
//          'forename'  => {{contactForename}},
//          'email'     => {{contactEmail}},
            'tel'       => '0122334455',
//          'fax'       => {{contactFax}},
//          'mobile'    => {{contactMobile}},
//          'position'  => {{contactPosition}},
// 	        'mcoptin'		=> {{mcoptin}},
//          'mjoptin'		=> {{mjoptin}},
//          'smoptin'		=> {{smoptin}}
        ),
//      'address' => array(
//          'name'        => {{addressName}},
//          'part1'       => {{addressPart1}},
//          'part2'       => {{addressPart2}},
//          'part3'       => {{addressPart3}},
//          'part4'       => {{addressPart4}},
//          'zip'         => {{addressZip}},
//          'town'        => {{addressTown}},
//          'countrycode' => {{addressCountrycode}}
//      )
    )
);

//$xxx = sellsyconnect_curl::load()->getInfos();
//echo '<h2>getInfos : </h2><pre>'.var_export($xxx, true).'</pre>';

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<h2>Request : </h2><pre>'.var_export($response, true).'</pre>';
echo '<hr>';
