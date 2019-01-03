<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Document
//---------------------------------------------------------------------------

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
        'docid'   => 11102138,
    )
);
$request = array(
    'method' => 'Document.getOne',
    'params' => array(
        'doctype' => 'invoice',
        'docid'   => 11102674,
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

/**
 * Document.updateStep :
 *
 * - DRAFT :
 *   une fois passé dans une étape autre que "draft", il n'est plus possible de revenir en "draft".
 *   erreur : Step draft is invalid. Available : payinprogress, paid, late.
 *
 * - DUE :
 *   une fois passé en "due", il n'est plus possible de revenir en "draft", "cancelled".
 *   erreur : Step due is invalid. Available : payinprogress, paid, late.
 *
 * - PAYINPROGRESS :
 *   une fois passé en "payinprogress", il n'est plus possible de revenir en "draft", "due", "late", "cancelled".
 *   erreur : Step payinprogress is invalid. Available : paid.
 *
 * - PAID :
 *   une fois passé en "paid", il n'est plus possible de changer le statut.
 *
 * - CANCELLED :
 *   une fois passé en "cancelled", il n'est plus possible de changer le statut.
 */
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

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
