<?php
require_once "../vendor/autoload.php";
require_once "../libs/sellsytools.php";
require_once "../libs/sellsyconnect_curl.php";
require_once "./config.php";

//---------------------------------------------------------------------------
// Reports custom : opportunity
//---------------------------------------------------------------------------
// Config
//  - Client.
//  - Opp : source, pipeline, step.
//---------------------------------------------------------------------------

// Config
$nbOppToCreate = 1;

// List status
$oppStatusList = ['open', 'won', 'lost', 'late'/*, 'cancelled'*/];

// Faker (init)
$faker = Faker\Factory::create("fr_FR");

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
//$clientId = $clientIds[array_rand($clientIds)];

// Get date
$date              = new DateTime();
$dateNow           = $date->getTimestamp();
$dateNowLess2Weeks = strtotime('-2 weeks', $dateNow);

//-----------------------------------------------------------------------------

echo "<h1>Opportunity :</h1>";
for ($oppToGenerate=0; $oppToGenerate<$nbOppToCreate; $oppToGenerate++) {
    // Random faker
    $fakerNote      = $faker->paragraph(3, true);
    $fakerPotential = $faker->randomFloat(2, 100, 10000);
    $fakerProba     = $faker->numberBetween(1, 99);
    $fakerNameOpp   = $faker->company;

    // Random status
    $oppStatusRandom = array_rand($oppStatusList);
    $oppStatusValue  = $oppStatusList[$oppStatusRandom];

    // Random client id
    $clientId = $clientIds[array_rand($clientIds)];

    // Random date
    $dateBetweenLess2WeeksAndNow = rand($dateNowLess2Weeks, $dateNow);
    $dateRandomMore1Month = strtotime('+1 months', $dateBetweenLess2WeeksAndNow);

    // Get Staff
    $idStaffs = [];
    $reqStaffs = [
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

    // Get current ident
    $reqCurrentIdent = array(
        'method' => 'Opportunities.getCurrentIdent',
        'params' => array()
    );
    $resCurrentIdent = sellsyconnect_curl::load()->requestApi($reqCurrentIdent);
    $opp_next = $resCurrentIdent->response;

    // Get source
    $reqSources = array(
        'method' => 'Opportunities.getSources',
        'params' => array()
    );
    $resSources = sellsyconnect_curl::load()->requestApi($reqSources);
    $resSourcesKeys = array_keys((array)$resSources->response);
    array_pop($resSourcesKeys);
    $sourceIdRandom = $resSourcesKeys[array_rand($resSourcesKeys)];

    // Get funnels - https://api.sellsy.fr/documentation/methodes#opportunitiesgetfunnels
    $reqFunnels = array(
        'method' => 'Opportunities.getFunnels',
        'params' => array()
    );
    $resFunnels = sellsyconnect_curl::load()->requestApi($reqFunnels);
    $resFunnelsKeys = array_keys((array)$resFunnels->response);
    array_pop($resFunnelsKeys);
    $funnelIdRandom = $resFunnelsKeys[array_rand($resFunnelsKeys)];

    // Get steps - https://api.sellsy.fr/documentation/methodes#opportunitiesgetstepsforfunnel
    $reqSteps = [
        'method' => 'Opportunities.getStepsForFunnel',
        'params' => [
            'funnelid' => $funnelIdRandom
        ]
    ];
    $resSteps = sellsyconnect_curl::load()->requestApi($reqSteps);
    $resStepsArray = (array)$resSteps->response;
    $resStepsKeys = array_keys($resStepsArray);
    if (sizeof($resStepsKeys) > 1) { array_pop($resStepsKeys); }
    $stepIdRandom = $resStepsArray[array_rand($resStepsKeys)]->id;

    // Create
    $reqOpp = [
        'method' => 'Opportunities.create',
        'params' => [
            'opportunity' => [
                'linkedtype' => 'third',
                'linkedid' => $clientId,
                'ident' => $opp_next,
                'sourceid' => $sourceIdRandom,
                'dueDate' => $dateRandomMore1Month,
                'creationDate' => $dateBetweenLess2WeeksAndNow,
                'name' => 'Opp ' . $fakerNameOpp . ' ' . uniqid(),
                'potential' => $fakerPotential,
                'funnelid' => $funnelIdRandom,
                'stepid' => $stepIdRandom,
                'proba' => $fakerProba,
                'brief' => $fakerNote,
                'stickyNote' => $fakerNote . " 2",
                'staffs' => [$idStaffRandom],
            ]
        ]
    ];
    $resOpp = sellsyconnect_curl::load()->requestApi($reqOpp);

    if ($resOpp->status == 'success') {
        $oppId = $resOpp->response;
        echo "
        <a href='" . PATH_BASE . "/prospection/opportunities/" . $oppId . "' target='_blank'>
            ".date('Y-m-d H:i:s')." - N°".$oppToGenerate." - Opp " . $oppId . "
        </a><hr>";

        // Update status
        $reqUpdateStatus = [
            'method' => 'Opportunities.updateStatus',
            'params' => [
                'id'     => $oppId,
                'status' => $oppStatusValue,
            ]
        ];
        $resUpdateStatus = sellsyconnect_curl::load()->requestApi($reqUpdateStatus);
    } else {
        echo "<pre>".var_export($resOpp, true)."</pre>";
        echo "ERROR : opp not create<hr>";
    }
}
echo "<h2>END</h2>";
