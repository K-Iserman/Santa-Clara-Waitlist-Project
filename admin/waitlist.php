<?php
	if(file_exists("waitlist.csv")) {
		unlink("waitlist.csv");
	}
	
	header("Location: admin.php");
?>
