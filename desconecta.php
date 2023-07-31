<?php
	$con = mysqli_connect("localhost","root","","ProgWebBD");

	if ($con) {
		mysqli_close($con);
	}	
?>