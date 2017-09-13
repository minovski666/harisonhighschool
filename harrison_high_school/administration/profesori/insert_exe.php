<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/database_connect.php';
include '../../class.upload.php';

// retrieve eventual CLI parameters
$cli = (isset($argc) && $argc > 1);
if ($cli) {
    if (isset($argv[1])) $_GET['file'] = $argv[1];
    if (isset($argv[2])) $_GET['dir'] = $argv[2];
    if (isset($argv[3])) $_GET['pics'] = $argv[3];
}

// set variables
$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : $settings['img_url']);
//$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : 'upload');
$dir_pics = (isset($_GET['pics']) ? $_GET['pics'] : $dir_dest);


// we have three forms on the test page, so we redirect accordingly
 if ((isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : '')) == 'image') {

    // ---------- IMAGE UPLOAD ----------

    // we create an instance of the class, giving as argument the PHP object
    // corresponding to the file field from the form
    // All the uploads are accessible from the PHP object $_FILES
    $handle = new Upload($_FILES['my_field']);

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
        }

        // we delete the temporary files
        $handle-> Clean();

    }

}

include '../../class/database.php';

$object = new Database();
$table_name=" profesori ";
$column_name=" imeP, prezimeP, embg_p, staz, img_path ";
$column_value=" '".$_POST['imeP']."','".$_POST['prezimeP']."','".$_POST['embg_p']."',".$_POST['staz'].", '".$handle->file_dst_name."' ";

//insert records in database table profesori
$object->insert($table_name,$column_name,$column_value);


$sql1="SELECT embg_p FROM profesori WHERE  imeP = '".$_POST['imeP']."'
								AND		prezimeP = '".$_POST['prezimeP']."'
								AND		embg_p = '".$_POST['embg_p']."'
								AND		staz LIKE '".$_POST['staz']."'";
							
$embg_p="";
$result=$connection->query($sql1);//execute query
while ($row=$result->fetch_object()){
	
	$embg=$row->embg_p;
}

header("Location:index.php?message=insert&id=".$embg);exit();
?>