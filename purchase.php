<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Purchase
//---------------------------------------------------------------------------

$base64 = "/9j/4AAQSkZJRgABAgEBLAEsAAD/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/2wBD
ABoSFBcUEBoXFRceHBofKEIrKCQkKFE6PTBCYFVlZF9VXVtqeJmCanGRc1tdhbWHkZ6jq62rZ4C8...";

$request =  array( 
    'method' => 'Purchase.uploadRelatedFile',
    'params' => array(
        'id'        => 558072,
        'attachement' => array(
          'base64' => $base64
        ) 
    )	
);

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
$file			= fopen($_FILES['f_file']['tmp_name'], 'r');
$size 		= filesize($_FILES['f_file']['tmp_name']);
$content	= fread($file, $size);
fclose($file);
$file64   = chunk_split(base64_encode($content));
$request = array( 
    'method' => 'Purchase.uploadRelatedFile',
    'params' => array(
        'id' => 558072,
        'attachement' => array(
					'base64' => $file64
				)
    )	
);

$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
