<?php
/**
*	Grab the current TLD list from ICANN and put it in an array. 
*	@Author Adam Matthews (adammatthews.co.uk)
*	@Date 27/1/13
**/


$file = "http://data.iana.org/TLD/tlds-alpha-by-domain.txt";
$text = file_get_contents($file);

//echo str_replace(array("\r\n", "\r", "\n"), "<br />", $text);

$tlds = array();

foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $tld){
	if(strlen($tld) < 4){
		$tlds[] = $tld;
	}
} 

function getResults($var,$arr)
{
	$results = array();

	for ($i=-2; $i >= -4; $i--)
		{
			$myTLD = substr($var, $i);
			$front = substr($var,0,$i);
			
			//$key = in_array(strtoupper($myTLD), $tlds);
			if(in_array(strtoupper($myTLD), $arr)){
				$url = $front.".".$myTLD;
				$results[] = $url;
			}
		}
	return $results; 	
}


?>