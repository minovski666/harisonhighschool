<?php

session_start();
require_once '../includes/database_connect.php';

if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
echo 
"
<!DOCTYPE html PUBLIC>
<html>
<head>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 100%;
    background-color: #f1f1f1;
    
    font-size: large;

}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #838783;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>

<link href=\"".$settings['website_url']."administration/css/adminstyle.css\" rel=\"stylesheet\" type=\"text/css\">
<meta name=\"viewport\" content=\"width=device-width\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<title>".$settings['title']."</title>
</head>
<body>

<div id=\"Header\">

<ul class=\"topnav\" id=\"myTopnav\">
 	<li><a href=\"".$settings['website_url']."administration/rezervacija/insert.php\">NEW</a></li>
</ul>





</div>
<div id=\"Left\" >
<div>
<img src=\"img/kniga_logo.jpg\"align=\"top\" id=\"Logo\">
</div>
";

//open menu
require_once '../includes/menu_administartion.php'; 

  echo "
</div>
<div id=\"Content\">";
  
$message="";
if(!isset($_GET['id']))$_GET['id']=0;
  if(isset($_GET['message']) && $_GET['message']=='insert')$message="Uspesno vnesovte nov zapis";
  if(isset($_GET['message']) && $_GET['message']=='delete')$message="Uspesno izbrisavte zapis";
  if(isset($_GET['message']) && $_GET['message']=='update')$message="Uspesno editiravte zapis";
  
echo $message."


<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
<tr><td>Ime i Prezime</td><td>Sifra</td><td>Data od</td><td>Data do</td><td>Kazna</td><td>edit</td><td>delete</td></tr>";	
  
  $sql = "select * from rezervacija	
  		INNER JOIN ucenici
  		ON ucenici.embg_u=rezervacija.embg_u
  		INNER JOIN biblioteka
  		ON biblioteka.sifra=rezervacija.sifra
  ";
	$result=	$connection->query($sql);	
	while ($row=$result->fetch_object()){
		$embg=$row->embg_u;
		$sifra=$row->sifra;
		$dataod=$row->data_od;
		$datado=$row->data_do;
		$kazna=$row->kazna;
		$rezervacija=$row->rezervacija_id;
		$ime=$row->imeU;
		$prezime=$row->PrezimeU;
		$tip=$row->tip;
		$bgcolor="yellow";
		
		if($rezervacija==$_GET['id'])$bgcolor="blue";
		
		
		
		echo	"<tr bgcolor=$bgcolor>
				<td>$ime $prezime</td><td>$tip</td><td>$dataod</td><td>$datado</td><td>$kazna</td>
					<td><a href=\"".$settings['website_url']."administration/rezervacija/edit.php?id=$rezervacija\"><img src=\"".$settings['website_url']."images/edit.png\" width=20 alt=\"edit\"></a></td>
					<td><a href=\"".$settings['website_url']."administration/rezervacija/edit.php?id=$rezervacija\"><img src=\"".$settings['website_url']."images/delete.png\" width=20 alt=\"delete\"></a></td>
		</tr>";
		}
	
		echo "

</table>
</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>

</html>
";
?>