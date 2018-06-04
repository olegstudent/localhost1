<?php


$output = array();
if(isset($_POST['IDclient']))
{
	$name = $_POST['IDclient'];
	
	$link = mysqli_connect('localhost', 'root', '', 'sport_life');
	
	$query = "SELECT * FROM tickets2 WHERE Name='".$name."'";
	$result = mysqli_query($link, $query);
	$data = mysqli_fetch_all($result, 1);
	
	$valid = $data[0]['valid'];
	$time = date("H:i:s");
	$date = date("m.d.y");
	$valid = $valid.$time." " .$date."; ";
	
	$abon = $data[0]['abon'];
	$abon = $abon-1;
	
	$query = "UPDATE `tickets2` SET `valid` = '".$valid."' WHERE tickets2.Name='".$name."'";
	$result = mysqli_query($link, $query);
	$query = "UPDATE `tickets2` SET `abon` = '".$abon."' WHERE tickets2.Name='".$name."'";
	$result = mysqli_query($link, $query);
	
	$query = "SELECT * FROM tickets2 WHERE Name='".$name."'";
	$result = mysqli_query($link, $query);
	$data = mysqli_fetch_all($result, 1);
	
	$output[0]="Abonements left: ".$data[0]['abon'];
	$output[1]="Validation: ".$data[0]['valid'];
	
	//$output="Abonements left: ".$data[0]['abon']."";
}
echo json_encode($output);
?>