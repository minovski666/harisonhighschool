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
	<li><a href=\"".$settings['website_url']."administration/evidencija/insert.php\">NEW</a></li> 
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
<div id=\"Content\">

<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
<tr><td>Profesor</td><td>Ucenik</td><td>Oblast</td><td>Participacija</td><td>Grad</td><td>Osvoena nagrada</td>";
	
  
  $sql = "select * from evidencija
  		INNER JOIN profesori
  		ON profesori.embg_p=evidencija.embg_p
  		INNER JOIN ucenici
  		ON ucenici.embg_u=evidencija.embg_u
  		INNER JOIN sekcii
  		ON sekcii.oblast=evidencija.oblast
  		INNER JOIN participacija
  		ON participacija.participacija_id=evidencija.participacija_id
  		INNER JOIN razmena
  		ON razmena.grad=evidencija.grad
  		INNER JOIN natprevari
  		ON natprevari.natprevar_id=evidencija.natprevar_id
  		";
	$result=	$connection->query($sql);	
	while ($row=$result->fetch_object()){
		
		//tabela evidencija
		$embg=$row->embg_p;
		$embgu=$row->embg_u;
		$oblast=$row->oblast;
		$participacija=$row->participacija_id;
		$grad=$row->grad;
		$natprevar=$row->natprevar_id;
		$evidencija=$row->evidencija_id;
		
		//tabela profesori
		$profesor_ime=$row->imeP;
		$profesor_prezime=$row->prezimeP;
		
		//tabela ucenici
		$ucenik_ime=$row->imeU;
		$ucenik_prezime=$row->PrezimeU;
		
		//tabela participacija
		$prvo=$row->prvo_polugodie;
		$vtoro=$row->vtoro_polugodie;
		
		//tabela razmena
		$drzava=$row->drzava;
		
		//tabela natprevari
		$nagrada=$row->nagradi;
		
		echo	"<tr>
				<td>$profesor_ime $profesor_prezime</td><td>$ucenik_ime $ucenik_prezime</td><td>$oblast</td><td>$prvo $vtoro</td><td>$grad $drzava</td><td>$nagrada</td>
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