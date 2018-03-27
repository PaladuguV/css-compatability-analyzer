<?php
$db = new mysqli('localhost', 'root', '', 'css');
$rule = $_POST['rule'];
$sql = "SELECT * FROM `compatability` WHERE `rule`='$rule'";
if ($result=mysqli_query($db,$sql)){
	$row=mysqli_fetch_row($result);
	if(count($row)>0) echo implode(",",$row);
	else echo "-NA-";
}
else echo "-NA-";
?>