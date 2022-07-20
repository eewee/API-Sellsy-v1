<?php
//---------------------------------------------------------------------------
// Source / composer ionos : https://www.ionos.com/community/hosting/php/using-php-composer-in-11-ionos-webhosting-packages/
// Maj composer :
//  path > eewee_labs/sellsy/api/
//  /usr/bin/php7.1-cli composer.phar dumpautoload -o
//---------------------------------------------------------------------------
require_once "../vendor/autoload.php";
require_once "../libs/sellsytools.php";
require_once "../libs/sellsyconnect_curl.php";

$timestamp_debut = microtime(true);
$config = Config::data();

//---------------------------------------------------------------------------
// SETUP
//---------------------------------------------------------------------------
$quantity = [
    'people'      => 0,
    'client'      => 0,
    'prospect'    => 0,
    'annotation'  => 0,
    'opportunity' => 0,
    'marketing'   => 0,
    'document_estimate' => 0,
    'document_invoice'  => 1,
];

//---------------------------------------------------------------------------
// FAKER (init)
//---------------------------------------------------------------------------
$faker = Faker\Factory::create("fr_FR");
//$faker->seed(1235);

//---------------------------------------------------------------------------
// OK - CONTACT (=Peoples)
//---------------------------------------------------------------------------
if ($quantity['people']>0) {
    $contact = new PeoplesModel($faker);
    for($i=0; $i<$quantity['people']; $i++) {
        $contact->create();
    }
}

//---------------------------------------------------------------------------
// OK - CLIENT
//---------------------------------------------------------------------------
if ($quantity['client']>0) {
    $client = new ClientModel($faker);
    for ($i = 0; $i < $quantity['client']; $i++) {
        $client->create();
    }
}

//---------------------------------------------------------------------------
// OK - PROSPECT
//---------------------------------------------------------------------------
if ($quantity['prospect']>0) {
    $prospect = new ProspectsModel($faker);
    for ($i = 0; $i < $quantity['prospect']; $i++) {
        $prospect->create();
    }
}

//---------------------------------------------------------------------------
// OK - ANNOTATIONS (comment)
//---------------------------------------------------------------------------
if ($quantity['annotation']>0) {
    $annotations = new AnnotationsModel($faker);
    for ($i = 0; $i < $quantity['annotation']; $i++) {
        $annotations->create();
    }
}

//---------------------------------------------------------------------------
// OPPORTUNITIES
//---------------------------------------------------------------------------
if ($quantity['opportunity']>0) {
    $opportunities = new OpportunitiesModel($faker);
    for ($i = 0; $i < $quantity['opportunity']; $i++) {
        $opportunities->create();
    }
}

//---------------------------------------------------------------------------
// MARKETING (campaign marketing)
//---------------------------------------------------------------------------
/*
if ($quantity['marketing']>0) {
    $marketing = new MarketingModel($faker);
    for ($i = 0; $i < $quantity['marketing']; $i++) {
        $marketing->create();
    }
}
*/

//---------------------------------------------------------------------------
// EMAIL
//---------------------------------------------------------------------------
/*
$email = new MailsModel($faker);
$email->create([
    'test01@eewee.fr',
    'test02@eewee.fr'
]);
*/

//---------------------------------------------------------------------------
// OK - DOCUMENT
//---------------------------------------------------------------------------
if ($quantity['document_estimate']>0) {
    $doc = new DocumentsModel($faker);
    for ($i = 0; $i < $quantity['document_estimate']; $i++) {
        $doc->create("estimate");
    }
}
if ($quantity['document_invoice']>0) {
    $doc = new DocumentsModel($faker);
    for ($i = 0; $i < $quantity['document_invoice']; $i++) {
        $doc->create("invoice");
    }
}

$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
echo 'Exécution du script : ' . $difference_ms . ' secondes.';
