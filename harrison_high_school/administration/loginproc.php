<?php
session_start();

require_once 'includes/database_connect.php';
 
$sql = "SELECT pozicija FROM administracija WHERE user LIKE \"".$_POST['User']."\"
												AND passvord LIKE \"".sha1($_POST['pass'])."\"";


	$result=	$connection->query($sql);
if ($result){

		while ($row=$result->fetch_object()){
			 $pozicija=$row->pozicija;
			 
			if($pozicija !="")
			{
				$_SESSION['id']=$pozicija;
				header("Location:".$settings['website_url']."administration/administarcija/index.php");exit();
			}else{
				//Login form
				header("Location:".$settings['website_url']."administration/index.php");exit();
			}
			
		}
}
				//Login form
				header("Location:".$settings['website_url']."administration/index.php");
	
?>