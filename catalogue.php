<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// CATALOGUE
//---------------------------------------------------------------------------

//$request =  array(
//    'method' => 'Catalogue.getOneByRef',
//    'params' => array (
//        'type' => 'item',
//        'ref'  => 'bbb',        // ref product parent
//        //'includeDecli' => 'Y' // Y : section "declinations"
//    )
//);

//$request = array(
//    'method' => 'Catalogue.getOne',
//    'params' => array (
//        'type' => 'item',
//        'id'   => '28'
//    )
//);

/*
$request = array(
    'method' => 'Catalogue.create',
    'params' => array (
        'type' => 'item',
        'item' => array(
            'name'       => 'MR4045 - Lorem ipsum 01',
            'taxrate'    => '20,00',
            'unit'       => '"Lorem Ipsum" \' / - # ^ ¤ $ £ * µ ù % ! § = } + ]°`',
            'unitAmount' => '13.37',
        )
    )
);

$request =  array(
    'method' => 'Catalogue.getOne',
    'params' => array (
        'type' => 'item',
        'id'   => 309536,
    //  'langID' => 726, // Accountdatas.getTranslationLanguages (EN:737, ES:726)
    //  'includeDecli'           => 'Y',
    //  'includeAssociatedItems' => 'Y'
    )
);

$request = array(
    'method' => 'Catalogue.getList',
    'params' => array (
        'type' => 'item', // item, service
        'search' => array(
            'barcode' => 'xxx',
        ),
        'pagination' => array (
            'pagenum'   => 1,
            'nbperpage' => 100,
        )
    )
);

$request = array(
    'method' => 'Catalogue.updatePrice',
    'params' => array(
        'linkedtype'   => 'item',
        'linkedid'     => 3691720,
        //'declid'     => {{declid}},
        'rateCategory' => array(
        'id'           => 97937,
        'amount'       => 27
    )
);

$request = array(
    'method' => 'Catalogue.updateBarCode',
    'params' => array (
        'linkedid'  => 6052282,
        //'declid'  => {{declid}},
        'bcid'      => 738533,
        'barcode' => array(
            'label' => 'Lorem',
            'value' => 'ipsum'
        )
    )
);


$request = array(
    'method' => 'Catalogue.create',
    'params' => array(
        'type' => 'item',
        'item' => array(
            'name'         		=> 'Lorem ipsum',
            'tradename'         => 'lorem',
    //       'tradenametonote'  => {{tradenametonote}},
    //       'notes'         	=> {{notes}},
    //       'tags'          	=> {{tags}},
    //       'unitAmount'       => {{unitAmount}},
    //       'purchaseAmount'   => {{purchaseAmount}},
             'unit'          	=> 'unité',
    //       'qt'            	=> {{qt}},
    //       'unitAmountIsTaxesFree' => {{unitAmountIsTaxesFree}},
             'taxid'            => 2344470,
    //       'sellcode'      	=> {{sellcode}},
    //       'purchasecode'     => {{purchasecode}},
    //       'costPerHour'      => {{costPerHour}},
    //       'inPos'         	=> {{inPos}},
    //       'categoryid'       => {{categoryid}},
    //       'actif'         	=> {{actif}},
             'useEcoTax'        => 'Y',
             'ecoTaxType'       => 'inc',
             'ecoTax'           => 10,
    //       'characteristics'  => array(
    //             'width'   => {{width}},
    //             'deepth'  => {{deepth}},
    //             'length'  => {{length}},
    //             'height'  => {{height}},
    //             'weight'  => {{weight}},
    //             'packing' => {{packing}}
    //       )
        )
    )
);

$request =  array(
    'method' => 'Catalogue.update',
    'params' => array (
        'type'   => 'item',
        'id'     => 6031664,
        'item' => array(
            'name' 		 => 'Produit Lorem Ipsum 01',  // Reference
            'tradename'	 => 'Produit Lorem Ipsum 02',  // Nom commercial
            'unit'		 => 'unité',
            'unitAmount' => 15,
            'taxid'		 => 2344470,
            'actif'		 => 'Y',
            'notes'		 => 'aaa\nbbb<br>ccc',
        )
    )
);

$request = array(
    'method' => 'Catalogue.getPrices',
    'params' => array(
        'type' => 'item',
        'id'   => 3986137,
    //  'declid' => {{declid}}
    )
);

$request = array(
    'method' => 'Catalogue.getVariation',
    'params' => array (
        'itemid' => 3691136,
        'declid' => 404573
    )
);

// Display all fields
$request = array(
    'method' => 'Catalogue.getVariationFields',
    'params' => array()
);

$request =  array(
    'method' => 'Catalogue.updateVariationField',
    'params' => array (
        'id'      => 4299,	  // syscode=taille
        'name'    => 'Taille',
        'syscode' => 'taille',
        'fields'  => array(
             // Ancienne valeur (requis si déjà utilisé)
             '1' => array(
                 'syscode' => 's',
                 'name'    => 'S',
             ),
             '2' => array(
                 'syscode' => 'm',
                 'name'    => 'M',
             ),
             '3' => array(
                 'syscode' => 'l',
                 'name'    => 'L',
             ),
             // Nouvelle valeur
             '4' => array(
                 'syscode' => 'xs',
                 'name'    => 'XS',
             ),
        )
    )
);

$request = [
    'method' => 'Catalogue.updateTranslations',
    'params' => [
        'langId'		=> 737,
        'itemId'		=> 3986137,
        //'variationId'	=> {{variationId}},
        'tradename'		=> 'product_xxx',
        'notes'			=> 'Lorem ipsum'
    ]
];

// Catalogue.addPictureToGallery
// 1/ avoir un form avec un champ file
// 2/ passer en 2ème param $_FILES à requestApi

// 1
echo '
<form method="post" action="" enctype="multipart/form-data">
 <label for="form_file">FICHIER :</label><br>
 <input type="file" name="form_file" id="form_file" /><br>

 <input type="submit" name="submit" value="ENVOYER" />
</form>';
//echo '<pre>'.var_export( $_FILES, true ).'</pre>';

// 2
$request = array(
    'method' => 'Catalogue.addPictureToGallery',
    'params' => array (
        'id'        => 337292,
        'declid'    => 3459,
    //  'isDefault' => {{isDefault}}
    )
);
$response = sellsyconnect_curl::load()->requestApi($request, $_FILES['form_file']);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';

$request = array(
    'method' => 'Catalogue.getBarCodes',
    'params' => array (
        'type' => 'item',
        'id'   => 3989814,
    )
);

$request = array(
    'method' => 'Catalogue.getCategories',
    'params' => array (
        //'includeImages' => {{includeImages}}
    )
);

// Déclinaison
$request = array(
    'method' => 'Catalogue.createVariations',
    'params' => array (
        'itemid'    => 340238,
        'type'      => "item",
        'idf1_id'   => 348,
        'idf2_id'   => 349,
//      'idf3_id'   => {{idf3_id}},
        'variations'=> array(
            0 => array (
                'tradename' => "toto",
                'name'      => "jaune",
                'idf1_syscode'  => "rouge",
                'idf2_syscode'  => "m",
//              'idf3_syscode'  => {{idf3_syscode}},
                'priceInc'      => 50,
                'purchaseInc'   => 60
            )
        )
    )
);

$request =  array(
    'method' => 'Catalogue.updateVariation',
    'params' => array (
        'declid'       => 3543,
        'itemid'       => 340238,
        'type'         => "item",
        'variation' => array(
            'tradename'   => "titi",
            'name'        => "gris",
            'priceInc'    => 150,
            'purchaseInc' => 260
        )
    )
);

$request =  array(
    'method' => 'Catalogue.deleteVariation',
    'params' => array (
        'id' => 3543
    )
);
*/

//--------------------------------------------------------------
// CREATE
//--------------------------------------------------------------
for ($i=0; $i<10; $i++) {
    $request = [
        'method' => 'Catalogue.create',
        'params' => [
            'type' => 'item',
            'item' => [
                'name'       => 'Lorem ipsum '.uniqid(),
                'taxrate'    => '20,00',
                'unit'       => 'g',
                'unitAmount' => '50.75',
            ]
        ]
    ];

    $response = sellsyconnect_curl::load()->requestApi($request);
    echo '<pre>'.var_export($response, true).'</pre>';
    echo '<hr>';
}

//$response = sellsyconnect_curl::load()->requestApi($request);
//echo '<pre>'.var_export($response, true).'</pre>';
//echo '<hr>';
