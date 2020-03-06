<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Contact / People
//---------------------------------------------------------------------------

$request = array( 
    'method' => 'Peoples.getOne', 
    'params' => array ( 
        'id' => '9954308',
        //'thirdcontactid'   => '',
        //'includeAddresses' => {{includeAddresses}},
        //'includeLinkeds'   => {{includeLinkeds}}
    )
);

$request = array(
    'method' => 'Peoples.getList',
    'params' => array(
      'search' => array(
          'contains' => 'contact@tld.com',
          'actif'    => 'Y',
          //'mobile' => ['+33631963517','+33618937712'],
          'tel' => ['+590590483797','+33153872564']
      ),
    )
);
$request = array( 
    'method' => 'Peoples.getList', 
    'params' => array ( 
        'doctype' => 'delivery',
        'pagination'    => array (
            'nbperpage' => 5000,
            'pagenum'   => 2
        ),
        'order' => array(
            'direction' => "ASC",
        )
    )
);

$request = [ 
    'method' => 'Peoples.create', 
    'params' => [ 
        'people' => [
            'name'        => 'DOE',
            'forename'    => 'John',
            'email'       => 'contact@tld.com',
            'tel'         => '05 11 22 33 44',
//          'fax'         => {{fax}},
//          'mobile'      => {{mobile}},
            'web'         => 'https://www.eewee.fr',
            'position'    => 'CEO',
            'civil'       => 'man',
//          'birthdate'   => {{birthdate}},
            'stickyNote'	=> 'Test depuis API Sellsy',
            'tags'        => ['api'],
//          'thirdids'    => {{thirdids}},
//          'mailchimp'		=> {{mailchimp}},
//          'mailjet'		  => {{mailjet}},
//          'simplemail'	=> {{simplemail}},
            'massmailingUnsubscribed'		    => 'Y',
            'massmailingUnsubscribedSMS'	  => 'Y',
            'phoningUnsubscribed'			      => 'Y',
            'massmailingUnsubscribedMail'	  => 'Y',
            'massmailingUnsubscribedCustom'	=> 'Y'
        ]
    ]
];

$request = array( 
    'method' => 'Peoples.update', 
    'params' => array (
        'id' => 13017346,
        'people' => array(
            'name'       => 'DOE',
            'forename'   => 'John',
            'email'      => 'contact@tld.com',
            'tel'        => '05 22 33 44 55',
            'fax'        => '05 44 44 44 44',
            'mobile'     => '06 22 33 44 55',
            'web'        => 'https://www.eewee.fr',
            'position'   => 'CEO',
            'civil'      => 'man',
//          'birthdate'  => '',
//          'tags'       => {{tags}},
//          'thirdids'   => {{thirdids}},
            'mailchimp'	 => 'Y',
            'mailjet'	   => 'Y',
            'simplemail' => 'Y',
            'massmailingUnsubscribed'		    => 'N',
            'massmailingUnsubscribedSMS'    => 'Y',
//			    'phoningUnsubscribed'			      => {{phoningUnsubscribed}},
//			    'massmailingUnsubscribedMail'	  => {{massmailingUnsubscribedMail}},
//			    'massmailingUnsubscribedCustom'	=> {{massmailingUnsubscribedCustom}}
        )
    )
);

// Peoples.setAsMainContact
$request = array( 
    'method' => 'Peoples.setAsMainContact', 
    'params' => array (
        'id'      => 14438558, // idPeople
        'thirdid' => 9942853,
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
