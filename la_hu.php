<?php
	// Include config.php
	include_once('config.php');

	$la = isset($_GET['la']) ? $mysqli->real_escape_string($_GET['la']) :  "";
	if(!empty($la)){
		if ($result = $mysqli->query("SELECT hungarian_expression FROM hungarian_latin WHERE latin_expression='$la'")) {
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