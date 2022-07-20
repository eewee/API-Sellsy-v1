<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Marketing
//---------------------------------------------------------------------------

$request = array(
    'method' => 'Marketing.createCampaign',
    'params' => array(
        'campaign' => array(
            'name'          => 'Campagne 01 <script>alert("xxx")</script>',
            'type'          => 'email', // email, sms
            'segments'      => array(
                //'savedSearches'   => [360],
                'mailingLists'      => [255]
            ),
            'includeThirdContacts'  => 'N',
            'fromName'      => 'John DOE',
            'subject'       => '\"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b> - '.date('NOW'),
            'fromEmail'     => 'test@mailinator.com',
            'editMode'      => 'html', // editor, html
            'utm' => array(
                'campaign'  => 'aaa',
                'source'    => 'bbb',
                'medium'    => 'ccc'
            ),
            'content' => array(
                'html'      => 'HTML - \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b> - '.date('NOW'),
                'text'      => 'TEXT - \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b> - '.date('NOW')
            ),
            //'message'   => 'message du SMS'
        )
    )
);

//$request = array(
//    'method' => 'Marketing.getMailingLists',
//    'params' => array(
//        'pagination' => array(
//            'pagenum'   => 1,
//            'nbperpage' => 50
//        )
//    )
//);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
