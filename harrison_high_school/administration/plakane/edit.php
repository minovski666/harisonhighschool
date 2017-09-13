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
<form name=\"myForm\" action=\"edii_exe.php\" method=\"post\" onsubmit=\"return plakane()\">
<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
<tr><td>Embg</td><td>Participacija</td><td>Kazna</td><td>Popust</td></tr>";	
  
  
  $sql = "select * from plakane where plakane_id=".$_GET['id'];
	$result=	$connection->query($sql);	
	while ($row=$result->fetch_object()){
		$embg=$row->embg_u;
		$participacija=$row->participacija_id;
		$kazna=$row->kazna;
		$popusti=$row->popusti;
		$plakane=$row->plakane_id;
		echo	"<tr>
				<td><input type=\"hidden\" name=\"plakane_id\" value=\"$plakane\" />$embg</td>
				
				<td>
				<select name=\"part\">";
				
				$sql_participacija="SELECT * FROM participacija";
				$result_participacija=$connection->query($sql_participacija);
				while($row1=$result_participacija->fetch_object()){
					
					$selected="";
					
					$prvo1=$row1->prvo_polugodie;
					$vtoro1=$row1->vtoro_polugodie;
					$particiapcija1=$row1->participacija_id;
					//compare 
					if($particiapcija1==$participacija)$selected="selected";
					if($particiapcija1!=$participacija)$selected="";
					
				echo "<option value=\"$particiapcija1\" $selected>$prvo1 - $vtoro1</option>";
				
				}
				
				
			echo "	
			</select>
			</td>
				<td><input type=\"text\" name=\"kazna\" value=\"$kazna\" /></td>
				<td><input type=\"text\" name=\"popusti\" value=\"$popusti\" /></td>
		</tr>";
		}
	
		echo "
<tr><td><input type=\"submit\" name=\"submit\" value=\"EDIT\" /></td></tr>
</table>
</form1>
</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>

</html>
";
?>