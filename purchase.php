<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Purchase
//---------------------------------------------------------------------------

$base64 = "/9j/4AAQSkZJRgABAgEBLAEsAAD/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/2wBD
ABoSFBcUEBoXFRceHBofKEIrKCQkKFE6PTBCYFVlZF9VXVtqeJmCanGRc1tdhbWHkZ6jq62rZ4C8...";

// JPG
$base64 = "/9j/4AAQSkZJRgABAQEAYABgAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBxdWFsaXR5ID0gNzAK/9sAQwAKBwcIBwYKCAgICwoKCw4YEA4N...";

/*
// PDF
$base64 = "JVBERi0xLjQNJeLjz9M....";
*/

/*
$request =  array( 
    'method' => 'Purchase.uploadRelatedFile',
    'params' => array(
        'id'        => 1,
        'attachement' => array(
          'base64' => $base64
        ) 
    )	
);
*/

/*
$request =  array( 
    'method' => 'Purchase.create',
    'params' => array(
        'purchase'  => array(          
            'displayedDate'    => 1538726655,
            'doctype'          => "order",
            'showContactOnPdf' => 'Y',
            'showParentOnPdf'  => 'N',
            'notes'            => "<b>Adresse de livraison:</b> <br>5 rue Lorem Ipsum<br>17000 La Rochelle",
            'thirdid'          => 10984186,  
            'ident'            => "TEST-API-".date('YmdHis'),
            'subject'          => "TEST - Commande de test à ne pas traiter",
        ),
        'rows'  => array(
            0 => array(
              "type"       => "item",
              "qt"         => 1.8,
              "unitAmount" => 13,
              "taxid"      => 2344470,
              "name"       => "Ref. 35639/1",
              "linkedid"   => 3691720,
              "row_whid"   => "9182"  
            )
        ),
    )
);

$request =  array( 
    'method' => 'Purchase.getOne', 
    'params' => array(
        'id' => 839031
    )
);

echo var_dump($_POST);
echo var_dump($_FILES);
echo '
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="f_file">
    <input type="submit" value="OK" name="submit">
</form>';
$file		= fopen($_FILES['f_file']['tmp_name'], 'r');
$size 		= filesize($_FILES['f_file']['tmp_name']);
$content	= fread($file, $size);
fclose($file);
$file64   = chunk_split(base64_encode($content));
$request = array( 
    'method' => 'Purchase.uploadRelatedFile',
    'params' => array(
        'id'          => 558072,
        'attachement' => array(
            'base64'      => $file64
        )
    )
);

$request =  array(
    'method' => 'Purchase.create',
    'params' => array(
        'purchase'  => array(
            // 'parentid'         => "6214",
            'displayedDate'    => 1538726655,
            'doctype'          => "order", // invoice, delivery, order, creditNote
            'thirdid'          => 1326194,
            'ident'            => "TEST-API-".date('YmdHis'),
        ),
        'rows'  => array(
            0 => array(
                "parentid"   => "10766", // Purchase.getOne > rows > key index
                "type"       => "item",
                "qt"         => 2, //1.8,
                "unitAmount" => 13,
                "taxid"      => 130214,
                "name"       => "Ralph GALLAGHER 2",
                "linkedid"   => 336717,
            )
        ),
    )
);
*/

$request =  array(
    'method' => 'Purchase.create',
    'params' => array(
        'purchase'  => array(
            'displayedDate'    => 1538726655,
            'doctype'          => "order", // invoice, delivery, order, creditNote
            'thirdid'          => 1342390, // client:1343366, fournisseur:1327243,
            'ident'            => "TEST-API-".date('YmdHis'),
        ),
    )
);

/*
$request =  array(
    'method' => 'Purchase.getOne',
    'params' => array(
        'id' => 6849
    )
);

$request =  array(
    'method' => 'Purchase.update',
    'params' => array(
        'id' => 6833,
        'purchase'  => array(
            // 'parentid'      => "6214",
            'displayedDate'    => 1538726655,
            'doctype'          => "invoice", // invoice, delivery, order, creditNote
            'thirdid'          => 1326194,
            'ident'            => "TEST-API-update-".date('YmdHis'),
        ),
        'rows'  => array(
            0 => array(
                "parentid"   => "10766", // Purchase.getOne > rows > key index
                "type"       => "item",
                "qt"         => 2, //1.8,
                "unitAmount" => 13,
                "taxid"      => 130214,
                "name"       => "Ralph GALLAGHER 2",
                "linkedid"   => 336717,
            )
        ),
    )
);

$request =  array(
    'method' => 'Purchase.delete',
    'params' => array(
        'id' => 6143
    )
);
*/

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
