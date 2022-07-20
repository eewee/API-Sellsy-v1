<?php
require_once "libs/sellsytools.php";
require_once "libs/sellsyconnect_curl.php";

//---------------------------------------------------------------------------
// Briefcase / Fichiers
//---------------------------------------------------------------------------

$request = array(
    'method' => 'Briefcases.getList',
    'params' => array(
      'search' => array(
        'linkedtype' => 'third',
        'linkedid'	 => 8045300,
        'mode'		 => 'flat',
      )
    ),
);
$response = sellsyconnect_curl::load()->requestApi($request);
echo '<pre>'.var_export($response->response, true).'</pre>';
echo '<hr>';

echo '
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>';
$request = array(
    "method" => "Briefcases.uploadFile",
    "params" => array(
			'linkedtype' => 'people',
			'linkedid'	 => 13566033,
    )
);
$file = $_FILES['fileToUpload'];
echo var_export($_FILES, true);
$response = sellsyconnect_curl::load()->requestApi($request, $file);
echo '<pre>'.var_export($response, true).'</pre>';
echo '<hr>';
