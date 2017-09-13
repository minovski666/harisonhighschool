<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class.upload.php';
require_once '../includes/database_connect.php';
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
$table_name=" razmena ";
$column_name=" grad, drzava, uciliste,img_path ";
$column_value=" '".$_POST['grad']."','".$_POST['drzava']."','".$_POST['uciliste']."','".$handle->file_dst_name."' ";

//insert records in database table razmena
$object->insert($table_name,$column_name,$column_value);


$sql1="SELECT grad FROM razmena WHERE  grad = '".$_POST['grad']."'
								AND		drzava = '".$_POST['drzava']."'
								AND		uciliste = '".$_POST['uciliste']."'";
$grad=0;
$result=$connection->query($sql1);//execute query
//$result=$connection->exec($sql1);//execute query PDO
while ($row=$result->fetch_object()){
	
	$grad=$row->grad;
}

header("Location:index.php?message=insert&id=".$grad);exit();
?>