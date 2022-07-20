<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Document
//---------------------------------------------------------------------------

/*
$request = array(
    'method' => 'Document.getOne',
    'params' => array(
        'doctype' => 'estimate',
        'docid'   => 982751,
    )
);

// Si timestamp > 10 caract, alors ERREUR.
$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'proforma',

            'useServiceDates'  => 'Y',
            'serviceDateStart' => 10110261600, //ok 2150-05-20 5692284000, //ko 2400-05-20 12AM 13581554400, //ok 2536610400,
            'serviceDateStop'  => 10110693600, //ok 2150-05-25 5692716000, //ko 2400-05-25 12AM 13581986400, //ok 2537042400,
            //'serviceDateStop'  => 969022800000, // 32677-02-09 16:00:00
            
            'thirdid'       => '1266907',
            'contactid'     => '505431',
            //'displayedDate' => 969022800000,
            'ident'         => 'xxx-0001',
            'subject'       => 'Subject 01',
            'notes'         => 'Lorem ipsum',
        ),
        'row' => array(
            array(
                'row_type'     => 'title',
                'row_title'    => 'Lorem<b>ipsum</b>'
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => '<h1>Lorem</h1> ipsum <b>comment</b>.<br>Here.'
            ),
        )
    )
);

$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'invoice',
            'thirdid'       => '227',
            'subject'       => 'Subject '.date('Y-m-d H:i:s'),
            'notes'         => 'Lorem ipsum',
            //'doclayout'   => 4213,
            //'doclang'     => 193, // 192 (XX), 193 (YY), 194 (ZZ)
            'penaltyRetardWarningText' => 'Lorem ipsum penaltyRetardWarningText', // non documenté
            'tvaLawText'    => 'Lorem ipsum tvaLawText', // non documenté
        ),
        'row' => array(
            array(
                'row_type'     => 'title',
                'row_title'    => 'Lorem<b>ipsum</b>'
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => '<h1>Lorem</h1> ipsum <b>comment</b>.<br>Here.'
            ),
        )
    )
);

$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'invoice',
            'thirdid'       => '1326084',
            //'contactid'     => '329663',
            //'displayedDate' => 1542115076,
            //'ident'         => 'xxx-0001',
            'subject'       => 'Subject 01',
            'notes'         => 'Lorem ipsum',
            'doclayout'     => 4213,
            'doclang'       => 193,
        ),
        'row' => array(
            array(
                'row_type'     => 'title',
                'row_title'    => 'Lorem<b>ipsum</b>'
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => '<h1>Lorem</h1> ipsum <b>comment</b>.<br>Here.'
            ),
        )
    )
);

$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'estimate',
            'thirdid'       => '1099947',
            'contactid'     => '329663',
            'displayedDate' => 1542115076,
            'ident'         => 'xxx-0001',
            'subject'       => 'Subject 01',
            'notes'         => 'Lorem ipsum',
        ),
        'row' => array(
            array(
                'row_type'     => 'title',
                'row_title'    => 'Lorem<b>ipsum</b>'
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => '<h1>Lorem</h1> ipsum <b>comment</b>.<br>Here.'
            ),
        )
    )
);

$request = array(
    'method' => 'Document.create',
    'params' => [
        'document' => [
            'doctype'       => 'invoice',
            'thirdid'       => '504',
            'subject'       => 'Subject '.date('Y-m-d H:i:s'),
            'notes'         => 'Lorem ipsum',
        ],
        'row' => [
            [
                'row_type'     => 'title',
                'row_title'    => 'Lorem<b>ipsum</b>'
            ],
            [
                'row_type'     => 'comment',
                'row_comment'  => '<h1>Lorem</h1> ipsum <b>comment</b>.<br>Here.'
            ],
            [
                'row_type'      => 'item',
                'row_linkedid'  => 1,
                'row_name'      => "API - test ".date('YmdHis'),
                'row_notes'     => 'Note lorem ipsum',
                'row_unit'      => 'unité',
                'row_unitAmount' => 75,
                'row_taxid'     => 27,
                'row_qt'        => 2,
            ],
        ]
    ]
);

$request =  array(
    'method' => 'Document.updateStep',
    'params' => array (
        'docid' => 982948,
        'document' => array(
            'doctype' => 'estimate',
            'step'    => 'accepted'
        )
    ),
);

$request =  array(
    'method' => 'Document.updateOwner',
    'params' => array(
        'linkedid'  => 982948,
        'ownerid'   => 4154     // Collab02 TEST = 4154
    )
);

$request =  array(
    'method' => 'Document.createPayment',
    'params' => array (
        'payment' => array(
            'date'      => time(),
            'amount'    => 2,
            'medium'    => 129380,
            'doctype'   => 'estimate',
            'docid'     => 982948,
            //'deadlineid'=> [337192] // payDeadlines de Document.getOne.
        )
    )
);

$request = array(
    'method' => 'Document.update',
    'params' => array (
        'docid' => '982948',
        'document' => array (
            'doctype'       => 'estimate',
            'clientid'      => 1099947,
            'displayedDate' => 1530828000,  // timestamp
            'subject'       => 'Lorem ipsum 01',
            'notes'         => 'Lorem ipsum 02'
        ),
    )
);

$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'proforma',
            'thirdid'       => '9942853',
            'contactid'     => '14438558',
            'displayedDate' => 1542115076,
            'ident'         => 'xxx-0001',
            'subject'       => 'Subject 01',
            'notes'         => 'Lorem ipsum',
        ),
        'row' => array(
            array(
              "row_type"           => "item",
              "row_linkedid"       => "4631954",
              "row_name"           => "API - test ".date('YmdHis'),
              "row_notes"          => "Lorem ipsum note",
              "row_taxid"          => "2344470",
              "row_unit"           => "unité",
              "row_unitAmount"     => 31.9123,
              "row_qt"             => 1,
              "row_purchaseAmount" => 31.9123
            ),
            array(
              "row_type"       => "shipping",
              "row_name"       => "UPS",
              "row_shipping"   => "UPS",
              "row_unitAmount" => 19.99,
              "row_taxid"      => 2344470
            ),
            array(
                'row_type'     => 'title',
                'row_title'    => 'Lorem<b>ipsum</b>'
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => '<h1>Lorem</h1> ipsum <b>comment</b>.<br>Here.'
            ),
        )
    )
);

$request = array(
    'method' => 'Document.update',
    'params' => array (
        'docid' => '11301657',
        'document' => array (
            'doctype'       => 'estimate',
            'clientid'      => '9710859',
            'displayedDate' => 1530828000,  // timestamp
            'subject'       => 'Lorem ipsum 01',
            'notes'         => 'Lorem ipsum 02'
        ),
       'row' => array(
            array(
              "row_type"       => "shipping",
              "row_name"       => "UPS",
              "row_shipping"   => "UPS",
              "row_unitAmount" => 29.99,
              "row_taxid"      => 2344470
            )
        )
    )
);
$request = array(
    'method' => 'Document.getOne',
    'params' => array(
        'doctype' => 'estimate',
        'docid'   => 982900,
    )
);

$request = array(
    'method' => 'Document.getOne',
    'params' => array(
        'doctype'   => 'order',
        'docid'     => 10515499,
    )
);

$request =  array( 
    'method' => 'Document.getList', 
    'params' => array ( 
        'doctype'    => 'estimate',		// invoice, estimate, proforma, delivery, order ou model
        'pagination' => [ 
            'nbperpage' => 100,
            'pagenum'   => 1
        ],
        "order"=>[ 
            "direction"   => "DESC",
            "order"       => "doc_ident"
        ],
        "search"=>[ 
//          "steps"=>[ 
//            "sent",
//            "read",
//            "accepted",
//            "refused",
//            "expired",
//            "advanced",
//            "partialinvoiced",
//            "invoiced",
//            "cancelled"
//          ],
            "thirds"=>[ 
                13131250
            ]
    	]
    )
);
$request =  array( 
    'method' => 'Document.getList', 
    'params' => array ( 
        'doctype' => 'estimate', // invoice, estimate, proforma, delivery, order ou model

//         'includePayments' => {{includePayments}}
//         'order' => array(
//             'direction' => 'DESC',
//             'order'     => 'doc_ident',
//         ),
//         'pagination' => array (
//             'nbperpage' => {{nbperpage}}
//             'pagenum'   => {{pagenum}},
//         ),

        'search' => array(
//          'ident'         => {{ident}},
//          'steps'         => {{steps}},
//          'thirds'        => {{thirds}},
//          'shops'         => {{shops}},
//          'tags'          => {{tags}},
//          'periodecreated_start'      => {{periodecreated_start}},
//          'periodecreated_end'        => {{periodecreated_end}},
            'periodecreationDate_start' => $timestamp,
//          'periodecreationDate_end'   => {{periodecreationDate_end}},
//          'periodeexpired_start'      => {{periodeexpired_start}},
//          'periodeexpired_end'        => {{periodeexpired_end}}
        )
    )
);

//
//Document.updateStep :
//
// - DRAFT :
//   une fois passé dans une étape autre que "draft", il n'est plus possible de revenir en "draft".
//   erreur : Step draft is invalid. Available : payinprogress, paid, late.
//
// - DUE :
//   une fois passé en "due", il n'est plus possible de revenir en "draft", "cancelled".
//   erreur : Step due is invalid. Available : payinprogress, paid, late.
//
// - PAYINPROGRESS :
//   une fois passé en "payinprogress", il n'est plus possible de revenir en "draft", "due", "late", "cancelled".
//   erreur : Step payinprogress is invalid. Available : paid.
//
// - PAID :
//   une fois passé en "paid", il n'est plus possible de changer le statut.
//
// - CANCELLED :
//   une fois passé en "cancelled", il n'est plus possible de changer le statut.
//
$request =  array(
    'method' => 'Document.updateStep',
    'params' => array (
        'docid' => 7398306,
        'document' => array(
            'doctype' => "estimate",
            'step'    => "due" // draft = brouillon, due = A regler, payinprogress = paiement partiel, paid = payee, late = retard, cancelled = annulee
        )
    ),
);

$request =  array(
    'method' => 'Document.createPayment',
    'params' => array (
        'payment' => array(
            'date'      => time(),
            'amount'    => 2,
            'medium'    => 2344498,
            'doctype'   => 'invoice',
            'docid'     => 11102674,
            'deadlineid'=> [337192] // payDeadlines de Document.getOne.
        )
    )
);

$request = array(
    'method' => 'Document.sendDocByMail',
    'params' => array (
        'docid' => 7398306,
        'email' => array(
            'doctype'             => "estimate",
            'emails'              => array("contact01@tld.com", "contact02@tld.com"),
//          'addsendertoemail'    => "Y",
//          'includeAttachments'  => "N",
//          'scheduled_timestamp' => "1513087200"
        )
    )
);
$request =  array( 
    'method' => 'Document.getMailTemplate', 
    'params' => array(
        'email' => array(
            'doctype' => 'estimate',
            'docid'   => 5848118,
        )
    )
);

$request =  array(
    'method' => 'Document.getLinkedDocuments',
    'params' => array (
        'docid'   => 8755422,
        'doctype' => 'estimate'
    ),
);

// Update : "statut de livraison"
$request =  array(
    'method' => 'Document.updateDeliveryStep',
    'params' => array (
        'docid' => 10512736,
        'document' => array(
            'step' => "sent" // none, wait, waitingsent, picking, partialsent, sent
        )
    ),
);

$request = array( 
    'method' => 'Document.getPaymentUrl', 
    'params' => array (
        'docID' => 5604720
    )
);

// get : jpg
$request = array(
    'method' => 'Document.getPublicLink',
    'params' => array(
        'doctype' => 'estimate',
        'docid'   => 4982666,
    )
);

// get : pdf & jpg
$request = array(
    'method' => 'Document.getPublicLink_v2',
    'params' => array(
        'doctype' => 'estimate',
        'docid'   => 4982666
    )
);

// TYPE DE PAIEMENT
$request = array(
    'method' =>  'Accountdatas.getPayMediums',
    'params' => array()
);

$request =  array(
    'method' => 'Document.updateStep',
    'params' => array (
        'docid'    => 9893463,
        'document' => array(
            'doctype' => 'invoice',
            'step'    => 'due'
        )
    ),
);

$request =  array( 
    'method' => 'Document.getModel', 
    'params' => array(
        'docid'       => 4581408,
        'newDoctype'  => 'estimate',
        'thirdid'     => '',
        'updatePrice' => 'N'
    )
);

$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'invoice',
            'thirdid'       => '1266907',
            'contactid'     => '505431',
            'ident'         => 'xxx-0001',
            'subject'       => 'Sujet : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            'notes'         => 'Note : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
        ),
        'row' => array(
            array(
                "row_type"           => "item",
                "row_linkedid"       => "309495",
                "row_name"           => "API - test ".date('YmdHis'),
                "row_notes"          => "Lorem ipsum note",
                "row_taxid"          => "130214",
                "row_unit"           => "unité",
                "row_unitAmount"     => 31.9123,
                "row_qt"             => 1,
                "row_purchaseAmount" => 31.9123
            ),
            array(
                'row_type'     => 'title',
                'row_title'    => 'Titre : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => 'Comment : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            ),
        )
    )
);




$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'invoice',
            'thirdid'       => '687',
            'contactid'     => '763',
            'ident'         => 'xxx-0001',
            'subject'       => 'Sujet : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            'notes'         => 'Note : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
        ),
        'row' => array(
            array(
                "row_type"           => "item",
                "row_linkedid"       => "3782777",
                "row_name"           => "API - test ".date('YmdHis'),
                "row_notes"          => "Lorem ipsum note",
                "row_taxid"          => "1137955",
                "row_unit"           => "unité",
                "row_unitAmount"     => 31.9123,
                "row_qt"             => 1,
                "row_purchaseAmount" => 15.25
            ),
            array(
                'row_type'     => 'title',
                'row_title'    => 'Titre : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => 'Comment : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            ),
        )
    )
);

$request = [
    'method' => 'Document.getOne',
    'params' => [
        'doctype'   => 'invoice',
        'docid'     => 101
    ]
];

$request = [
    "method" => "Document.update",
    "params" => [
        "docid"    => "101",
        "document" => [
            "doctype" => "invoice"
        ],
        "row" => [
            [
                "row_id"             => "115",
                "row_type"           => "item",
                "row_linkedid"       => "3782777",
                "row_name"           => "API - test ".date('YmdHis'),
                "row_unit"           => "unité",
                "row_unitAmount"     => "110.00",
                "row_qt"             => "1",
                "row_tax"            => "0.0",
                "row_description"    => "test 1",
            ],
            [
                "row_id"             => "115",
                "row_type"           => "item",
                "row_linkedid"       => "3782777",
                "row_name"           => "API - test ".date('YmdHis'),
                "row_unit"           => "unité",
                "row_unitAmount"     => "220.00",
                "row_qt"             => "1",
                "row_tax"            => "0.0",
                "row_description"    => "test 2",
            ],
        ]
    ]
];
*/

//$request = array(
//    'method' => 'Document.create',
//    'params' => array (
//        'document' => array (
//            'doctype'       => 'estimate',
//            'thirdid'       => '801',
//            'contactid'     => '929',
//            'ident'         => 'Lorem qsmlfjkqsmlfdk - 02',
//            'subject'       => 'Sujet : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
//            'notes'         => 'Note : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
//        ),
//        'row' => array(
//            array(
//                "row_type"           => "item",
//                "row_linkedid"       => "8306097",
//                "row_name"           => "API - test ".date('YmdHis'),
//                "row_notes"          => "Lorem ipsum note",
//                "row_taxid"          => "3825403",
//                "row_unit"           => "unité",
//                "row_unitAmount"     => 31.9123,
//                "row_qt"             => 1,
//                "row_purchaseAmount" => 15.25
//            ),
//            array(
//                'row_type'     => 'title',
//                'row_title'    => 'Titre : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
//            ),
//            array(
//                'row_type'     => 'comment',
//                'row_comment'  => 'Comment : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
//            ),
//        )
//    )
//);

//$request =  array(
//    'method' => 'Document.updateStep',
//    'params' => array (
//        'docid' => 131,
//        'document' => array(
//            'doctype' => "estimate",
//            'step'    => "read" // draft = brouillon, due = A regler, payinprogress = paiement partiel, paid = payee, late = retard, cancelled = annulee
//        )
//    ),
//);

//$request =  [
//    'method' => 'Document.getList',
//    'params' => [
//        "doctype" => "estimate",
//        "pagination" => [
//            "nbperpage" => 50,
//            "pagenum" => 0
//        ],
//        "search" => [
//            "periodeexpired_start"  => 1652197451,  // 2022-05-10 17h44
//            "periodeexpired_end"    => 1660146240   // 2022-08-10 17h44
//        ]
//    ]
//];

$request = array(
    'method' => 'Document.create',
    'params' => array (
        'document' => array (
            'doctype'       => 'invoice',
            'thirdid'       => '801',
            'contactid'     => '929',
            'ident'         => 'Lorem qsmfldk - 02',
            'subject'       => 'Sujet : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            'notes'         => 'Note : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
        ),
        'row' => array(
            array(
                "row_type"           => "item",
                "row_linkedid"       => "8306097",
                "row_name"           => "API - test ".date('YmdHis'),
                "row_notes"          => "Lorem ipsum note",
                "row_taxid"          => "3825403",
                "row_unit"           => "unité",
                "row_unitAmount"     => 31.9123,
                "row_qt"             => 1,
                "row_purchaseAmount" => 15.25
            ),
            array(
                'row_type'     => 'title',
                'row_title'    => 'Titre : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            ),
            array(
                'row_type'     => 'comment',
                'row_comment'  => 'Comment : \"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § & = } + ]°`;<script>alert("xxx")</script><b>',
            ),
        )
    )
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
