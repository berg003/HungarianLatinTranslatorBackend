<?php
	// Include config.php
	include_once('config.php');

	$hu = isset($_GET['hu']) ? $mysqli->real_escape_string(utf8_decode(urldecode($_GET['hu']))) :  "";	
	if(!empty($hu)){
		if ($result = $mysqli->query("SELECT latin_expression FROM hungarian_latin WHERE hungarian_expression='$hu'")) {
			while($rows = $result->fetch_array(MYSQLI_ASSOC)) {
				foreach($rows as $row) {
					echo $row, '|';
				}
			}
			$result->close();
		}
	}	
	$mysqli->close();
?>