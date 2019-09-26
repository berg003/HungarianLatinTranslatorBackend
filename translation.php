<?php header('Content-type: text/plain; charset=utf-8');
// Include config.php
include_once('config.php');
	
//check latin input
$la = isset($_GET['la']) ? $mysqli->real_escape_string($_GET['la']) :  "";

//check hungarian input
$hu = isset($_GET['hu']) ? $mysqli->real_escape_string($_GET['hu']) :  "";

if(!empty($la)){
	$sql = "SELECT hungarian_expression FROM hungarian_latin WHERE latin_expression = '$la'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["hungarian_expression"]. "\n";
		}
	} else {
		echo "";
	}
} elseif (!empty($hu)) {
	$sql = "SELECT latin_expression, latin_affix FROM hungarian_latin WHERE hungarian_expression = '$hu'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["latin_expression"]. "|" . $row["latin_affix"]. "\n";
		}
	} else {
		echo "";
	}
}
$mysqli->close(); ?>