<!--
tld.me - get a tld for your project!
Written by Adam Matthews (adammatthews.co.uk) 28/1/13

Working time 3 hours

Learned:
PHP
	grabbing text from an external text file
	string manipuation
	searching arrays
	calling functions from other files
	
HTML/CSS
	modern css styling (gradients/colouring sections)
	using Google Fonts API
	text shadow!

JavaScript
	Some basic element manipulation (change colour based on .value)	
-->
<html>
<head>
<title>tld.me</title>
<?php
	require_once('file.php');
?>

<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>

<style type="text/css">
body{
	font-family: 'Droid Serif', serif;
	padding:0;
	margin:0;
}
	
h1{
	font-size:60px;
	color:#FFF;
	text-shadow: 2px 2px #000
}

#container{

}
#titleunit{
	background-color:#CF3E00;
	text-align:center;
	padding:10px;
}
#titleunit p{
	color:#FFF;
	text-shadow: 2px 2px #000;
	padding-top:0;
}
#titleunit a{
	text-decoration:none;
}
#formunit{
	padding:10px;
	text-align:center;
	
	background-color: #FFF; 
   background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#EDEDED), to(#FFF));
   background-image: -webkit-linear-gradient(top, #EDEDED, #FFF); 
   background-image:    -moz-linear-gradient(top, #EDEDED, #FFF);
   background-image:     -ms-linear-gradient(top, #EDEDED, #FFF);
   background-image:      -o-linear-gradient(top, #EDEDED, #FFF);
}
#formunit p{
	font-size:18px;
}
input[type=text]{
	font-size:30;
	padding:5px;
	color:#888;
	text-shadow: 1px 1px 0px #FFF;  

}

footer{
padding-top:50px;
	text-align:center;
	font-size:12px;
}
a{
	color:#CF3E00;
	text-decoration:none;
}

</style>

<script type="text/javascript">
function inputColour()
{
	if(document.getElementById('tld').value !== "enter your project name...")
	{ 
		document.getElementById('tld').style.cssText = 'background:#ffffff; color: #000000;';
	}
}
</script>

</head>

<body onload="inputColour();">
<div id="container">
<div id="titleunit">
	<a href=""><h1>tld.me</h1></a>
	<p>Check your project name against all TLD's to see if you can u.se one of them</p>
</div>
<div id="formunit">
	<form action="" method="get">
	<input type="text" id="tld"	size="30" value="<?php if(!empty($_GET["projname"])){echo $_GET["projname"];}else{echo "enter your project name...";}?>" name="projname" onclick="this.value = ''; document.getElementById('tld').style.cssText = 'color: #000;';
" ></input>
	</form>
<?php 

	$name = $_GET["projname"];
	$name = str_replace(' ', '', $name);
	if($name != ""){
	$results = getResults($name,$tlds);
	
	if(count($results) > 1)
		$delim = ", ";
	
	if(!empty($results)){
		echo "<p>You can use: ";
		foreach($results as $url){
			echo "<strong>$url</strong>$delim";
		}
		echo "</p>";	
	}
	else{
		echo "<p>No TLD available to make your project name awesome :(</p>";
	}
	}	
?>
</div>

<footer>
<a href="http://apm.x10.mx">side project by adam matthews</a>
</footer>
</div>
</body>
</html>