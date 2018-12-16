<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Support
//---------------------------------------------------------------------------

$request = array(
	'method' => 'Support.getList',
	'params' => array(
		'search' => array(
			'contains' => 'contact@tld.com'
//    'contains' => 'TEST API ticket',
		),
		'pagination' => array(
			'pagenum'	  => 1,
			'nbperpage'	=> 999
		)
	)
);

$request = array(
    'method' => 'Support.create',
    'params' => array(
        'ticket' => array(
            'subject'        => "API - Test ".uniqid(),
            'message'        => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr,<br>sed diam nonumy eirmod tempor<br><br>
            invidunt ut labore et dolore magna aliquyam erat,<br>
            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.",
            'sender'         => "sender@tld.com",
            'step'           => "pending",  // active, pending, closed, spam
            'source'         => "phone",    //phone, internal, email
            'requesterEmail' => "requester@tld.com",
            'thirdid'        => "9942853",
//          'thirdcontactid' => "14438558",
            'staffid'        => "75160",
            'groupid'        => "797",      // Groupe_A:797, Groupe_B:798
            'action'         => 'email',
        )
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
