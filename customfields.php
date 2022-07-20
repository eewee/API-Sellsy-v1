<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// NOTE - CUSTOM FIELDS :
// `bypassRequired => Y`
//---------------------------------------------------------------------------

/*
$request = array(
    'method' => 'CustomFields.updateGroup',
    'params' => array(
        'id'    => 3127,
        'name'  => 'Lorem ipsum',
        'code'  => 'loremipsum',
        'customFields' => array(
            array(
              'cfid' => 63126,  // bool
              'rank' => '1'
            ),
            array(
              'cfid' => 24217,  // Référence dossier 01
              'rank' => '0'
            ),
            array(
              'cfid' => 24218,  // Référence dossier 02
              'rank' => '2'
            ),
        )
    )
);

//--------------------------------------------------------------------------------------------------------
// GETONE
//--------------------------------------------------------------------------------------------------------

$request = array(
    'method' => 'CustomFields.getOne',
    'params' => array(
        'id' => 48501, // Montant avec devise
    )
);

$request = array(
    'method' => 'CustomFields.getOne',
    'params' => array(
        'id' => 98956,
    )
);

//--------------------------------------------------------------------------------------------------------
// GETLIST
//--------------------------------------------------------------------------------------------------------

//$request = array(
//    'method' => 'CustomFields.getList',
//    'params' => array(
//        'order' => array(
//            'direction' => "ASC",
//            'order'     => "cf_code"
//        ),
//        'pagination' => array(
//            'nbperpage' => 5000,
//            'pagenum'   => 1,
//        ),
//        'search' => array(
//            'useOn' => ['opportunity']
//        )
//    )
//);

// A utiliser pour récup les valeurs par défaut,
// qui vont servir pour peupler via "CustomFields.recordValues" (qui doit avoir des valeurs si obligatoire)
$request = array(
    'method' => 'CustomFields.getList',
    'params' => array(

//				'order' => array(
//             'direction' => {{direction}},
//             'order'     => {{order}}
//         ),
//         'pagination' => array(
//             'nbperpage' => {{nbperpage}},
//             'pagenum'   => {{pagenum}},
//         ),
//         'search' => array(
//             'useOn'     => {{useOn}}
//         )

		)
);

//--------------------------------------------------------------------------------------------------------
// OPPORTUNITY
//--------------------------------------------------------------------------------------------------------

// CFID : opp. Add client (Type de champ : Client/Prospect/Fournisseur)
$request = array(
  'method' => 'CustomFields.recordValues',
  'params' => array(
    'linkedtype' => 'opportunity',
    'linkedid'   => "1011579",
    'values' => array(
      0 => array(
        'cfid'   => 37782,
        'value'  => array(3694494),
      )
    )
  )
);

$request = array(
  'method' => 'CustomFields.recordValues',
  'params' => array(
    'linkedtype' => 'opportunity',
    'linkedid'   => '1173470',
    'values' => array(
      0 => array(
        'cfid'   => 42133,
        'value'  => 'Lorem ipsum',
      ),
    )
  )
);

$request = array(
  'method' => 'CustomFields.recordValues',
  'params' => array(
    'linkedtype' => 'opportunity',
    'linkedid'   => '544674',
    'values' => array(
      0 => array(
        'cfid'  => 42133,
        'value' => 'Lorem ipsum',
      ),
			1 => array(
        'cfid'  => 33962,
        'value' => 'Mail',
      )
    )
  )
);

//--------------------------------------------------------------------------------------------------------
// DOCUMENTS
//--------------------------------------------------------------------------------------------------------

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'document',
        'linkedid'   => 9573055, // devis
        'values' => array(
            0 => array(
              'cfid'    => 48499,
//            'value'   => "Lorem ipsum <ul><li>xxx</li></ul>",                          // Texte Riche
              'value'   => "Lorem ipsum <img src='http://via.placeholder.com/350x150'>", // Texte Riche
//            'value'   => "Lorem ipsum <table><tr><td>xxx</td></tr></table>",           // Texte Riche
            ),
            1 => array(
              'cfid'  => 42133, // Champ obligatoire
              'value' => "Lorem ipsum",
            )
        )
    )
);

// CF type : date
$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'document', // item,client,prospect,people,supplier,service,ticket,opportunity,project,document,purchase
        'linkedid'   => 6659512,
        'values' => array(
            0 => array(
                'cfid'  => 43695,
                'value' => '1505132368', // timestamp
            )
        )
    )
);

//--------------------------------------------------------------------------------------------------------
// PROSPECTS
//--------------------------------------------------------------------------------------------------------

// CF : client/prospect/fournisseur
$request = array(
  'method' => 'CustomFields.recordValues',
  'params' => array(
    'linkedtype' => 'client',
    'linkedid'   => '13131250',
    'values' => array(
      0 => array(
        'cfid'  => 58224,
        'value' => array(14702579),
      ),
    )
  )
);

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => 10351962,
        'values' => array(
            0 => array(
                'cfid'  => 33907, // select
                'value' => 'lorem',
            )
        )
    )
);

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => 10351962,
        'values' => array(
            0 => array(
                'cfid'  => 33962,			// radio
                'value' => 'Webinar',
            )
        )
    )
);

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => 10351962,
        'values' => array(
            0 => array(
                'cfid'  => 30196,           // ID CustomField (checkbox)
                'value' => array(20,40),    // valeur de votre checkbox
            )
        )
    )
);

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => 25478801,
        'values' => array(
            0 => array(
                'cfid'  => 100265,                // ID CustomField (checkbox)
                'value' => array("aaa","ccc"),    // valeur de votre checkbox
            )
        )
    )
);

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => 1315725,
        'values' => array(
            0 => array(
                'cfid'  => 1951,    // ID CustomField (checkbox)
                'value' => ["aaa ' aaa"], // valeur de votre checkbox
            )
        )
    )
);

// Champ numerique avec unite
$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype'       => 'prospect',
        'linkedid'         => 10351962,
//      'deleteUnprovided' => {{deleteUnprovided}},
        'values' => array(
            0 => array(
                'cfid'       => 47923,
                'value'      => 5,
//              'currencyid' => {{currencyid}},
                'unitid'     => 2344479, // kg
            )
        )
    )
);

$request = array(
  'method' => 'CustomFields.recordValues',
  'params' => array(
    'linkedtype'     => 'prospect',
    'linkedid'       => '12761415',
    'bypassRequired' => 'Y',
    'values' => array(

//       0 => array(
//         'cfid'  => 48500, // numeric
//         'value' => '0',
//       ),

      0 => array(
        'cfid'  => 47873, // Code postal
        'value' => 33000,
      ),
      1 => array(
        'cfid'  => 48237, // required - API - Text simple
        'value' => 'Lorem ipsum',
      ),
      2 => array(
        'cfid'  => 48499, // required - API - Test riche
        'value' => 'Lorem ipsum',
      ),

    )
  )
);

//--------------------------------------------------------------------------------------------------------
// CONTACT
//--------------------------------------------------------------------------------------------------------

// Boolean
$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'people',
        'linkedid'   => 11094827,
        'values'     => array(
            0 => array(
                'cfid'  => 63126,
                'value' => 'Y',
            )
        )
    )
);

// Text simple
$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'people',
        'linkedid'   => 11094827,
        'values'     => array(
            0 => array(
                'cfid'  => 42133,
                'value' => 'Lorem ipsum',
            )
        )
    )
);

//--------------------------------------------------------------------------------------------------------
// CREATE
//--------------------------------------------------------------------------------------------------------

// CustomFields.create (simpletext)
$request = array(
  'method' => 'CustomFields.create',
  'params' => array(
    'type'  => 'simpletext',
    'name'  => 'lorem',
    'code'  => 'xyz',
    'useOn' => array(
      'useOn_client'
    ),
    'preferences' => array(
      'isRequired'   => 'N',
      'defaultValue' => 'lorem',
      'description'  => 'Description lorem ipsum',
    ),
  )
);

// CustomFields.create (select)
$request = array(
  'method' => 'CustomFields.create',
  'params' => array(
    'type'  => 'select',
    'name'  => 'Lorem ipsum',
    'code'  => 'loremipsum',
    'useOn' => array(
      'useOn_client'
    ),
    'preferences' => array(
      'isRequired'  => 'N',
      'description' => 'Lorem ipsum',
    ),
    'preferenceslist' => array(
      array(
        'value'     => 'lorem',
        'isDefault' => 'N',
      ),
      array(
        'value' => 'ipsum',
        'isDefault' => 'Y',
      ),
    )
  )
);

//--------------------------------------------------------------------------------------------------------
// UPDATE
//--------------------------------------------------------------------------------------------------------

$request = array(
    'method' => 'CustomFields.update',
    'params' => array(
        'id'    => 30657,
        'name'  => 'Lorem ipsum',
        'code'  => 'loremipsum',
        'useOn' => array(
            'showIn_list'
        ),
// 	      'preferences' => array(
//             'isRequired'   => {{isRequired}},
//             'description'  => {{description}},
//             'min'       		=> {{min}},
//             'max'       		=> {{max}},
//             'defaultValue' => {{defaultValue}},
//             'unitid'    		=> {{unitid}},
//             'currencyid'   => {{currencyid}},
//         ),
//         'preferenceslist' => array(
// 						'id'     		 => {{id}},
//             'value'     => {{value}},
//             'isDefault' => {{isDefault}},
//             'checked'   => {{checked}},
//         ),
    )
);

//--------------------------------------------------------------------------------------------------------
// SEARCH
//--------------------------------------------------------------------------------------------------------

//// SEARCH with custom field
//$request = array(
//  'params' => array(
//    'search' => array(
//      'customfields' => array(
//        array(
//          'cfid'        => 28763,
//          'unspecified' => 'N',
//          'value'       => 'vca'
//        ),
//      )
//    )
//  )
//);

//--------------------------------------------------------------------------------------------------------
// TEMP
//--------------------------------------------------------------------------------------------------------
*/

//$request = array(
//    'method' => 'CustomFields.recordValues',
//    'params' => array(
//        'linkedtype' => 'prospect',
//        'linkedid'   => '1340826',
//        'values' => array(
//            array (
//                'cfid' => 1912,
//                'value' => 0,
//            ),
//        )
//    )
//);

//$request = array(
//    'method' => 'CustomFields.recordValues',
//    'params' => array(
//        'linkedtype' => 'prospect',
//        'linkedid'   => '1343063',
//        'values' => array(
//            array (
//                'cfid' => 2108, // cf email
//                'value' => '',
//            ),
//            array (
//                'cfid' => 2109, // cf url
//                'value' => 'https://www.rygudyvykaloh.org.au',
//            ),
//        )
//    )
//);

/*
//$request = array(
//    'method' => 'CustomFields.recordValues',
//    'params' => array(
//        'linkedtype' => 'prospect',
//        'linkedid'   => '8220262', // 25197578
//        'values' => array(
//            array (
//                'cfid' => 98999,
//                'value' => '36000',
//            ),
//        )
//    )
//);

// MONTANT AVEC DEVISE
//$request = array(
//    'method' => 'CustomFields.recordValues',
//    'params' => array(
//        'linkedtype' => 'prospect',
//        'linkedid'   => '25228794',
//        'values' => array(
//            array (
//                'cfid'       => 48501,
//                'value'      => '7',
//                'currencyid' => 3
//            ),
//        )
//    )
//);

// CHAMP NUMERIQUE AVEC UNITE
//$request = array(
//    'method' => 'CustomFields.recordValues',
//    'params' => array(
//        'linkedtype' => 'prospect',
//        'linkedid'   => '25228794',
//        'values' => array(
//            array (
//                'cfid'   => 99139,
//                'value'  => '130',
//                'unitid' => '2344479'
//            ),
//        )
//    )
//);

// RADIO
$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => '25497041',
        'values' => array(
            array (
                'cfid'   => 48502,
                'value'  => 'aaa\'aaa',
            ),
        )
    )
);

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => 25497041,
        'values' => array(
            array(
                'cfid'  => 100333,          // ID CustomField (item)
                'value' => [3691751, 3691136],
            )
        )
    )
);

// STAFF
$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'prospect',
        'linkedid'   => 8173468,
        'values' => array(
            array(
                'cfid'  => 100334,       // staff
                'value' => ["89401"],    // ATTENTION : only idStaff active.
            )
        )
    )
);
*/

/*
// CustomFields.create
$request = array(
    'method' => 'CustomFields.create',
    'params' => array(
        'type'  => 'numeric',
        'name'  => 'lorem abc',
        'code'  => 'lorem-abc-15',
        'useOn' => array(
            'useOn_client'
        ),
        'preferences' => array(
            'description'  => 'Description lorem ipsum',
            'isRequired'   => 'N',
            'min'          => -10,
            'max'          => 0,
            //'defaultValue' => 0,
        ),
    )
);

$request = array(
    'method' => 'CustomFields.recordValues',
    'params' => array(
        'linkedtype' => 'client',
        'linkedid'   => 1116774, //1266907,
        'values' => array(
            array(
                'cfid'  => 2162,
                'value' => "0",
            )
        )
    )
);
*/

//for ($i=0; $i<101; $i++) {
    $request = array(
        'method' => 'CustomFields.create',
        'params' => array(
            'type'  => 'simpletext',
            'name'  => 'lorem',
            'code'  => 'xyz',
            'useOn' => array(
                'useOn_client'
            ),
            'preferences' => array(
                'isRequired'   => 'N',
                'defaultValue' => 'lorem',
                'description'  => 'Description lorem ipsum',
            ),
        )
    );

    $response = sellsyconnect_curl::load()->requestApi($request);
    echo '<pre>'.var_export($response, true).'</pre>';
    echo '<hr>';
//}

//$response = sellsyconnect_curl::load()->requestApi($request);
//echo '<pre>'.var_export($response, true).'</pre>';
//echo '<hr>';
