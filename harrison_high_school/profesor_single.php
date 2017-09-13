<?php
require_once 'administration/includes/database_connect.php';
echo 
"
<!DOCTYPE html>
<!--[if IE 8]> <html class=\"ie8 oldie\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang=\"en\"> <!--<![endif]-->
<head>
	<meta charset=\"utf-8\">
	<title>HarrisonHighSchool</title>
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no\">
	<link rel=\"stylesheet\" media=\"all\" href=\"css/style.css\">
	<!--[if lt IE 9]>
		<script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
	<![endif]-->
</head>
<body>

	<header id=\"header\">
		<div class=\"container\">
			<a href=\"index.php\" id=\"logo\" title=\"HarrisonHighSchool\">HarrisonHighSchool</a>
			<div class=\"menu-trigger\"></div>
			<nav id=\"menu\">
				<ul>
					<li><a href=\"predmeti.php\">Predmeti</a></li>
					<li><a href=\"students.php\">Students</a></li>
					<li><a href=\"events.php\">Natprevari</a></li>
 				</ul>
				<ul>
					<li><a href=\"profesori.php\">Profesori</a></li>
					<li class=\"current\"><a href=\"gallery.php\">Razmena</a></li>
					<li><a href=\"#fancy\" class=\"get-contact\">Contact</a></li>
   				</ul>
			</nav>
			<!-- / navigation -->
		</div>
		<!-- / container -->
	
	</header>
	<!-- / header -->
	
	<div class=\"divider\"></div>
	
	<div class=\"content\">
		<div class=\"container\">
			<h1 class=\"single\">PROFESORI</h1>

			<div class=\"main-content\">
			
			<ul>";

			
			$sql = "select img_path,imeP,prezimeP from profesori WHERE embg_p LIKE \"".$_GET['id']."\"";
	$result=	$connection->query($sql);	
	while ($row=$result->fetch_object()){
		
		$ime=$row->imeP;
		$prezime=$row->prezimeP;
		$img=$row->img_path;
		
		$img_path=$settings['website_url']."upload/".$img;
	
		echo "<li><a href=\"#\"><img src=\"$img_path\" alt=\"$img\" width=\"400\"></a></li>";
		echo $ime." ".$prezime;
 	}
			
echo "			
	</ul>		
	</div>
		</div>
			</div>
						
			
			<aside id=\"sidebar\">
				<div class=\"widget sidemenu\">
					<ul>
						<li><a href=\"#\">Day of teacher<span class=\"nr\">142</span></a></li>
						<li><a href=\"#\">Student olympics<span class=\"nr\">98</span></a></li>
						<li class=\"current\"><a href=\"#\">The best students in 2014<span class=\"nr\">16</span></a></li>
						<li><a href=\"#\">Halloween party<span class=\"nr\">63</span></a></li>
						<li><a href=\"#\">School party<span class=\"nr\">49</span></a></li>
						<li><a href=\"#\">Miss of university<span class=\"nr\">175</span></a></li>
						<li><a href=\"#\">Karaoke party<span class=\"nr\">87</span></a></li>
					</ul>
				</div>
			</aside>
			<!-- / sidebar -->
	
		</div>
		<!-- / container -->
	</div>
	
	<footer id=\"footer\">
		<div class=\"container\">
			<section>
				<article class=\"col-1\">
					<h3>Contact</h3>
					<ul>
						<li class=\"address\"><a href=\"#\">151 W Adams St<br>Detroit, MI 48226</a></li>
						<li class=\"mail\"><a href=\"#\">contact@harrisonuniversity.com</a></li>
						<li class=\"phone last\"><a href=\"#\">(971) 536 845 924</a></li>
					</ul>
				</article>
				<article class=\"col-2\">
					<h3>Forum topics</h3>
					<ul>
						<li><a href=\"#\">Omnis iste natus error sit</a></li>
						<li><a href=\"#\">Nam libero tempore cum soluta</a></li>
						<li><a href=\"#\">Totam rem aperiam eaque </a></li>
						<li><a href=\"#\">Ipsa quae ab illo inventore veritatis </a></li>
						<li class=\"last\"><a href=\"#\">Architecto beatae vitae dicta sunt </a></li>
					</ul>
				</article>
				<article class=\"col-3\">
					<h3>Social media</h3>
					<p>Temporibus autem quibusdam et aut debitis aut rerum necessitatibus saepe.</p>
					<ul>
						<li class=\"facebook\"><a href=\"#\">Facebook</a></li>
						<li class=\"google-plus\"><a href=\"#\">Google+</a></li>
						<li class=\"twitter\"><a href=\"#\">Twitter</a></li>
						<li class=\"pinterest\"><a href=\"#\">Pinterest</a></li>
					</ul>
				</article>
				<article class=\"col-4\">
					<h3>Newsletter</h3>
					<p>Assumenda est omnis dolor repellendus temporibus autem quibusdam.</p>
					<form action=\"#\">
						<input placeholder=\"Email address...\" type=\"text\">
						<button type=\"submit\">Subscribe</button>
					</form>
					<ul>
						<li><a href=\"#\"></a></li>
					</ul>
				</article>
			</section>
			<p class=\"copy\">Copyright 2014 Harrison High School. Designed by <a href=\"http://www.vandelaydesign.com/\" title=\"Designed by Vandelay Design\" target=\"_blank\">Vandelay Design</a>. All rights reserved.</p>
		</div>
		<!-- / container -->
	</footer>
	<!-- / footer -->

	<div id=\"fancy\">
		<h2>Request information</h2>
		<form action=\"#\">
			<div class=\"left\">
				<fieldset class=\"mail\"><input placeholder=\"Email address...\" type=\"text\"></fieldset>
				<fieldset class=\"name\"><input placeholder=\"Name...\" type=\"text\"></fieldset>
				<fieldset class=\"subject\"><select><option>Choose subject...</option><option>Choose subject...</option><option>Choose subject...</option></select></fieldset>
			</div>
			<div class=\"right\">
				<fieldset class=\"question\"><textarea placeholder=\"Question...\"></textarea></fieldset>
			</div>
			<div class=\"btn-holder\">
				<button class=\"btn blue\" type=\"submit\">Send request</button>
			</div>
		</form>
	</div>

	<script src=\"http://code.jquery.com/jquery-1.11.1.min.js\"></script>
	<script>window.jQuery || document.write(\"<script src='js/jquery-1.11.1.min.js'>\x3C/script>\")</script>
	<script src=\"js/plugins.js\"></script>
	<script src=\"js/main.js\"></script>
</body>
</html>

";

?>