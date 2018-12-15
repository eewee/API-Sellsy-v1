<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Mails
//---------------------------------------------------------------------------

$request =  array( 
    'method' => 'Mails.getList', 
    'params' => array(
        'search' => array(
//          'linkedtype' => {{linkedtype}},
//          'linkedid'   => {{linkedid}},
            'box'        => 'outbox', // enum('inbox', 'outbox', 'scheduled', 'trash')
        ),
        'pagination'    => array(
            'pagenum'   => 1,
            'nbperpage' => 10
        )
    )
);

$request =  array( 
    'method' => 'Mails.getCustomTemplates', // email personnalisé
    'params' => array(
        'linkedtype'  => 'people',
        'linkedid'    => 9025926,
        // >>>> OU <<<<
//      'relatedtype' => {{relatedtype}},
//      'relatedid' 	=> {{relatedid}},
    )
);
// NOTE : Voir aussi "Document.getMailTemplate" pour "email système"
$request =  array( 
    'method' => 'Mails.getCustomTemplates', // email personnalisé
    'params' => array(
        'relatedtype' => 'invoice',
        'relatedid' 	=> 6088508,
    )
);

$request = array( 
  'method' => 'Mails.sendOne', 
  'params' => array(
    'email' => array(
//    'linkedtype'  => 'third',
//    'linkedid'    => 9942853,
      'relatedtype' => 'invoice',
      'relatedid'   => 9688147,
      'emails'      => ['contact@tld.com'],
     'includeDoc'   => 'Y',
     'templateId'   => 22200 // Mails.getCustomTemplates (emails personnalisé uniquement)
    )
  )
);
$request =  array( 
    'method' => 'Mails.sendOne', 
    'params' => array(
        'email' => array(
            'linkedtype'    => 'people',
            'linkedid'      => 8363161,
//          'relatedtype'   => {{relatedtype}},
//          'relatedid'     => {{relatedid}},
            'emails'        => ['contact@tld.com'],
//          'emailsCC'      => {{emailsCC}},
//          'emailsBCC'     => {{emailsBCC}},

//          'addsendertoemail'    => {{addsendertoemail}},
//          'includeAttachments'  => {{includeAttachments}},
//          'scheduled_timestamp' => {{scheduled_timestamp}},

            'content' => '
							<b>Title : </b><br>
							Content <b>here</b>.<br><br>
							<u>Lorem ipsum</u> lorem ipsum<br>
							End',
            'subject' => '[API] subject here',
//          'includeDoc'    => {{includeDoc}},
        )
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
