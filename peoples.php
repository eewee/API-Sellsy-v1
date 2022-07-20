<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Contact / People
//---------------------------------------------------------------------------
/*
$request = array(
    'method'    =>  'Peoples.updateSharingStaffs',
    'params'    =>  array (
        "linkedid"  => 585869, //1569,
//      "staffsIds" => [55],
//      "staffsIds" => [],
        "staffsIds" => [8021, 9529], //[99, 111],
    )
);

$request = array(
    'method' => 'Peoples.getOne',
    'params' => array (
        'id' => '565717',
        //'thirdcontactid'     => '505431',
        //'includeAddresses' => {{includeAddresses}},
        //'includeLinkeds'   => {{includeLinkeds}}
    )
);

$request = array(
    'method' => 'Peoples.getOne', 
    'params' => array ( 
        //'id' => '169',
        'thirdcontactid'     => '505431',
        //'includeAddresses' => {{includeAddresses}},
        //'includeLinkeds'   => {{includeLinkeds}}
    )
);

$request = array(
    'method' => 'Peoples.getList',
    'params' => array(
        'search' => array(
            'contains' => 'VoReqyny@mailinATor.COM',
        ),
    )
);

$request = array(
    'method' => 'Peoples.getList',
    'params' => array(
      'search' => array(
          //'contains' => 'contact@tld.com',
          //'actif'    => 'Y',

          // Kelsie Butler Andrew Cabrera :
          // +590 590 48 37 97
          // +33 6 31 96 35 17
          //
          // Kirk Deleon Sacha Oconnor :
          // +33 1 53 87 25 64
          // +33 6 18 93 77 12
          'mobile' => ['+33631963517','+33618937712'],
          //'tel' => ['+590590483797','+33153872564']
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
            'name'                          => 'DOE_'.date('Ymd_His'),
            'forename'                      => 'Sophie_'.date('Ymd_His'),
            'email'                         => 'contact_'.date('Ymd_His').'@tld.com',
            'tel'                           => '05 11 22 33 44',
            'fax'                           => '05 11 22 33 55',
            'mobile'                        => '07 11 22 33 44',
            'web'                           => 'https://www.google.fr',
            'position'                      => 'CEO',
            'civil'                         => 'lady',
            'birthdate'                     => 1579098450,
            //'stickyNote'                    => 'Test depuis API Sellsy.<br>\"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            'stickyNote'                    => 'Test depuis API Sellsy.',
            'tags'                          => ['api', 'bla\'bla', 'ti`ti'],
            'thirdids'                      => [],
            'mailchimp'                     => 'Y',
            'mailjet'                       => 'Y',
            'simplemail'                    => 'Y',
            'massmailingUnsubscribed'       => 'N',
            'massmailingUnsubscribedSMS'    => 'Y',
            'phoningUnsubscribed'           => 'N',
            'massmailingUnsubscribedMail'   => 'Y',
            'massmailingUnsubscribedCustom' => 'N'
        ]
    ]
];

//$request = [
//    'method' => 'Peoples.create',
//    'params' => [
//        'people' => [
//            'name'                          => '{{contact_name}}',
//            'forename'                      => '{{contact_forename}}',
//            'email'                         => '{{contact_email}}',
//            'tel'                           => '{{contact_tel}}',
//            'fax'                           => '{{contact_fax}}',
//            'mobile'                        => '{{contact_mobile}}',
//            'web'                           => '{{contact_web}}',
//            'position'                      => '{{contact_position}}',
//            'civil'                         => '{{contact_civil}}',
//            'birthdate'                     => '{{contact_birthdate}}',
//            'stickyNote'                    => '{{contact_stickyNote}}',
//            'tags'                          => '{{contact_tags}}',
//            'thirdids'                      => '{{contact_thirdids}}',
//            'mailchimp'                     => '{{contact_mcoptin}}',
//            'mailjet'                       => '{{contact_mjoptin}}',
//            'simplemail'                    => '{{contact_smoptin}}',
//            'massmailingUnsubscribed'       => '{{contact_marketing_email}}',
//            'massmailingUnsubscribedSMS'    => '{{contact_marketing_sms}}',
//            'phoningUnsubscribed'           => '{{contact_marketing_phone}}',
//            'massmailingUnsubscribedMail'   => '{{contact_marketing_mail}}',
//            'massmailingUnsubscribedCustom' => '{{contact_marketing_custom}}',
//        ]
//    ]
//];
//echo json_encode($request);
//die();

/*
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
            'mailchimp'  => 'Y',
            'mailjet'    => 'Y',
            'simplemail' => 'Y',
            'massmailingUnsubscribed'       => 'N',
            'massmailingUnsubscribedSMS'    => 'Y',
//          'phoningUnsubscribed'           => {{phoningUnsubscribed}},
//          'massmailingUnsubscribedMail'   => {{massmailingUnsubscribedMail}},
//          'massmailingUnsubscribedCustom' => {{massmailingUnsubscribedCustom}}
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
*/

//$request = array(
//    'method' => 'Peoples.delete',
//    'params' => array (
//        'id' => 566402
//    )
//);

//$request = array(
//    'method' => 'Peoples.unlinkThirds',
//    'params' => array (
//        'id'       => 566409, // idPeople
//        'thirdids' => [1326306]
//    )
//);

//$request = array(
//    'method' => 'Pages.getList',
//    'params' => array(
//        'search' => array(
//            'shopid' => '1',
////            'ids' => [0000002],   // NOK
////            'ids' => ["234, 43"], // NOK
////            'ids' => ["test"],    // NOK
////            'ids' => ["231--"],   // NOK
//            'ids' => [123],       // OK
//        ),
//        'pagination' => [
//            'nbperpage' => '1000'
//        ],
//        'order' => []
//    )
//);

//$request = [
//    'method' => 'Peoples.create',
//    'params' => [
//        'people' => [
//            'name'                          => 'DOE_'.date('Ymd_His.u'),
//            'forename'                      => 'John_'.date('Ymd_His.u'),
//            'email'                         => 'masse_'.date('Ymd_His.u').'_'.uniqid().'@eewee.fr',
//            'tel'                           => '05 11 22 33 44',
//            'fax'                           => '05 11 22 33 55',
//            'mobile'                        => '07 11 22 33 44',
//            'web'                           => 'https://www.google.fr',
//            'position'                      => 'yyy',
//            'civil'                         => 'lady',
//            'birthdate'                     => 1579098450,
//            //'stickyNote'                    => 'Test depuis API v1 Sellsy.<br>\"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
//            'stickyNote'                    => 'Test depuis API v1 Sellsy.',
//            'tags'                          => ['api', 'bla\'bla', 'ti`ti'],
//            'thirdids'                      => [],
//            'mailchimp'                     => 'Y',
//            'mailjet'                       => 'Y',
//            'simplemail'                    => 'Y',
//            'massmailingUnsubscribed'       => 'N',
//            'massmailingUnsubscribedSMS'    => 'N',
//            'phoningUnsubscribed'           => 'N',
//            'massmailingUnsubscribedMail'   => 'Y',
//            'massmailingUnsubscribedCustom' => 'N'
//        ]
//    ]
//];

for ($i=0; $i<10; $i++) {
    $request = [
        'method' => 'Peoples.create',
        'params' => [
            'people' => [
                'name'                          => 'DOE_'.date('Ymd_His').'_'.uniqid(),
                'forename'                      => 'John_'.date('Ymd_His').'_'.uniqid(),
                'email'                         => 'masse_'.date('Ymd_His').'_'.uniqid().'@eewee.fr',
                'tel'                           => '05 11 22 33 44',
                'fax'                           => '05 11 22 33 55',
                'mobile'                        => '07 11 22 33 44',
                'web'                           => 'https://www.google.fr',
                'position'                      => 'zzz',
                'civil'                         => 'lady',
                'birthdate'                     => 1579098450,
                //'stickyNote'                    => 'Test depuis API v1 Sellsy.<br>\"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
                'stickyNote'                    => 'Test depuis API v1 Sellsy.',
                'tags'                          => ['api', 'bla\'bla', 'ti`ti'],
                'thirdids'                      => [],
                'mailchimp'                     => 'Y',
                'mailjet'                       => 'Y',
                'simplemail'                    => 'Y',
                'massmailingUnsubscribed'       => 'N',
                'massmailingUnsubscribedSMS'    => 'N',
                'phoningUnsubscribed'           => 'N',
                'massmailingUnsubscribedMail'   => 'Y',
                'massmailingUnsubscribedCustom' => 'N'
            ]
        ]
    ];
    $response = sellsyconnect_curl::load()->requestApi($request);
    echo '<pre>'.var_export($response, true).'</pre>';
}

//$response = sellsyconnect_curl::load()->requestApi($request);
//echo '<pre>'.var_export($response, true).'</pre>';
//echo '<hr>';
