<?php
require_once "../vendor/autoload.php";
require_once "../libs/sellsytools.php";
require_once "../libs/sellsyconnect_curl.php";
require_once "./config.php";

//---------------------------------------------------------------------------
// Reports custom : estimate
//---------------------------------------------------------------------------
// Config
//  - Some client in your corp.
//  - Create manually the groups of staff, because not found the endpoint for createGroups.
//    https://app.slsy.io/?_f=teamPreferences&action=groups
//---------------------------------------------------------------------------

// Config
$nbDocToCreate = 1;
$yesOrNo       = [true, false];
$docType       = 'estimate';
$docStep       = [/*'draft',*/ 'sent', 'read', 'accepted', /*'refused', 'expired', 'partialinvoiced', 'invoiced', 'cancelled'*/];

// Faker (init)
$faker = Faker\Factory::create("fr_FR");

// Get date
$date               = new DateTime();
$dateNow            = $date->getTimestamp();
$dateNowLess6Months = strtotime('-6 months', $dateNow);

// Get tax
$taxId = '';
$getTax = array(
    'method' => 'Accountdatas.getTaxes',
    'params' => array(
        "includeEcoTax" => "N",
        "enabled" => "all"
    )
);
$responseGetTax = sellsyconnect_curl::load()->requestApi($getTax);
foreach ($responseGetTax->response as $res) {
    $taxId = $res->id;
    break;
}

//-----------------------------------------------------------------------------

echo "<h1>Estimate :</h1>";
for ($iDoc=0; $iDoc<$nbDocToCreate; $iDoc++) {
    // Step
    $docStepRandom = array_rand($docStep);
    $docStepValue  = $docStep[$docStepRandom];

    // Faker
    $fakerSubject = $faker->sentence(4, true);
    $fakerNote    = $faker->paragraph(3, true);
    $fakerTitle   = $fakerSubject;
    $fakerComment = $fakerNote;
    $fakerAmount  = $faker->randomFloat(2, 100, 10000);
    $fakerQty     = $faker->numberBetween(1, 3);

    // Get groups id
    $useDocGroup  = array_rand($yesOrNo);
    $groupIds     = [];
    $reqGetGroups =  [
        'method' => 'Staffs.getGroups',
        'params' => []
    ];
    $resGetGroups      = sellsyconnect_curl::load()->requestApi($reqGetGroups);
    $resGetGroupsArray = (array)$resGetGroups->response;
    if (isset($resGetGroupsArray) && empty($resGetGroupsArray)) { $useDocGroup = false; }
    $getGroupsIndex    = array_rand($resGetGroupsArray);
    $groupIds[]        = $resGetGroupsArray[$getGroupsIndex]->id;

    // Get date random
    $dateBetween6MonthsToNow = rand($dateNow, $dateNowLess6Months);

    // Get Staff
    $idStaffs = [];
    $reqStaffs =  [
        'method' => 'Staffs.getList',
        'params' => [
            'search' => [
                'withBlocked' => 'N',
            ],
        ]
    ];
    $resStaffs = sellsyconnect_curl::load()->requestApi($reqStaffs);
    foreach ($resStaffs->response->result as $resIdStaff => $resValueStaff) {
        $idStaffs[] = $resIdStaff;
    }
    $idStaffRandom = $idStaffs[array_rand($idStaffs)];

    // Random date (range : 1, 100)
    $dateRandomValue  = rand(1, 100);
    $dateRandom1To100 = strtotime('+'.$dateRandomValue.' days', $dateNow);

    // Get id client random
    $getClients = array(
        'method' => 'Client.getList',
        'params' => array()
    );
    $clientIds = [];
    $responseGetClients = sellsyconnect_curl::load()->requestApi($getClients);
    foreach ($responseGetClients->response->result as $res) {
        $clientIds[] = $res->thirdid;
    }
    $clientId = $clientIds[array_rand($clientIds)];

    // Create
    $reqDocCreate = [
        'method' => 'Document.create',
        'params' => [
            'document' => [
                'doctype'       => $docType,
                'thirdid'       => $clientId,
                'ident'         => 'DEV_'.uniqid(),
                'subject'       => $fakerSubject,
                'notes'         => $fakerNote,
            ],
            'row' => [
                [
                    'row_type'       => 'once',
                    'row_name'       => 'Lorem',
                    'row_notes'      => 'note',
                    'row_unit'       => 'unité',
                    'row_unitAmount' => $fakerAmount,
                    'row_taxid'      => $taxId,
                    'row_qt'         => $fakerQty,
                    //'displayedDate'  => $dateNowAdd30,
                ],
                [
                    'row_type'     => 'title',
                    'row_title'    => $fakerTitle,
                ],
                [
                    'row_type'     => 'comment',
                    'row_comment'  => $fakerComment,
                ],
            ]
        ]
    ];
    $resDocCreate = sellsyconnect_curl::load()->requestApi($reqDocCreate);
    $resDocCreateArray = (array)$resDocCreate->response;
    $docId = $resDocCreateArray['doc_id'];
    echo "<a href='".PATH_BASE."/?_f=estimateOverview&id=".$docId."' target='_blank'>
        ".date('Y-m-d H:i:s')." - N°".$iDoc." - docId:".$docId."
    </a><hr>";

    // Set owner
    $reqOwner =  [
        'method' => 'Document.updateOwner',
        'params' => [
            'linkedid' => $docId,
            'ownerid'  => $idStaffRandom,
        ]
    ];
    $resOwner = sellsyconnect_curl::load()->requestApi($reqOwner);

    // Set status
    $reqDocUpdateStep =  [
        'method' => 'Document.updateStep',
        'params' => [
            'docid' => $docId,
            'document' => [
                'doctype' => $docType,
                'step'    => $docStepValue,
            ]
        ],
    ];
    $resDocUpdateStep = sellsyconnect_curl::load()->requestApi($reqDocUpdateStep);

    // Set public link - https://api.sellsy.fr/documentation/methodes#documentenablepubliclink
    $execEnablePublicLink = array_rand($yesOrNo);
    if ($execEnablePublicLink) {
        $reqEnablePublicLink = [
            'method'    =>  'Document.enablePublicLink',
            'params'    =>  [
                "docid" => $docId
			]
		];
        $resEnablePublicLink = sellsyconnect_curl::load()->requestApi($reqEnablePublicLink);
    }

    // Set group
    if (!empty($groupIds)) {
        $reqLinkGroup = [
            'method' => 'Document.updateSharingGroups',
            'params' => [
                "linkedid"  => $docId,
                "groupsIds" => $groupIds,
            ]
        ];
        $resLinkGroup = sellsyconnect_curl::load()->requestApi($reqLinkGroup);
    }
}
echo "<h2>END</h2>";
