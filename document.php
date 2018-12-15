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
            )
           
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
// 						"steps"=>[ 
// 							 "sent",
// 							 "read",
// 							 "accepted",
// 							 "refused",
// 							 "expired",
// 							 "advanced",
// 							 "partialinvoiced",
// 							 "invoiced",
// 							 "cancelled"
// 						],
						"thirds"=>[ 
							 13131250
						]
				 ]
    )
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

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
