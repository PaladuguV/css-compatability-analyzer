<?php
error_reporting(E_ERROR | E_PARSE);
$data = file_get_contents("http://www.w3schools.com/cssref/css3_browsersupport.asp");
$doc = new DOMDocument();
$doc->loadHTML($data);
$xpath = new DOMXPath($doc);
$rows = $xpath->query('//table[@class="reference bsReference"]/tr');
$count = 0;
foreach ($rows as $row){
	if ($count==0){$count++;}
	else {
		$tds = check_value($xpath->query('td',$row));
		$rule = check_value($tds->item(0)->nodeValue);
		$ie = check_value($tds->item(1)->nodeValue);
		$firefox = check_value($tds->item(2)->nodeValue);
		$chrome = check_value($tds->item(3)->nodeValue);
		$opera = check_value($tds->item(5)->nodeValue);
		echo "$rule,CSS3,$ie,$chrome,$firefox,$opera<br />";
	}
}

function check_value($value){
	if($value=="") return "-NA-";
	else return $value;
}
?>