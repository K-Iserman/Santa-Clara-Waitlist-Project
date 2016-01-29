<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Santa Clara University -  Waitlist</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel-"stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<style type="text/css">
		body{
			width: 90%;
			margin: auto;
		}
		body > div:first-child{
			padding: 10px;
		}
	</style>
</head>
<body>
	<div class="jumbotron">
		<h1>Santa Clara University</br><small>Waitlist<br><small>Student portal</small></small></h1>
	</div>
<a href="student.php">
<button type="button" class="btn btn-default">Add Another Class</button></a> 	
<br><br>
<?php
//should handle student info here

//need to double check valid student data here, as Prof Atkinson said, can't
//trust anything sent from client side, even with JS validation on that side


//if student not in waitlist already, add, and return something along the lines of the 
//existing student_success.html

//if already in waitlist, then return something along the lines of how we showed the
//"your're already in the waitlist." or we could just ignore returning something different,
//and just not re-add to the waitlist

	require_once('recaptchalib.php');
  	$privatekey = "6LfEChATAAAAABdO3TZnh9NbG6D_PCUBbbB_Ef9w";
  	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
    	// What happens when the CAPTCHA was entered incorrectly
    		die ("<div class=\"bg-danger col-md-3\">The reCAPTCHA wasn't entered correctly. Click the back button of your broswer and try it again.</div>");
  	}

	
	//Server side validations here.
	$newArray = array($_POST['first_name'], $_POST['last_name'], $_POST['ID_number'], $_POST['email'], $_POST['reason'], $_POST['course']);
	$file = fopen("/webpages/adiaztos/php_test/admin/waitlist.csv", "a+");
	$isInWaitlist = False;//Set to true if found in current waitlist

	while(($checkWaitlist = fgetcsv($file)) != False){
		if (($checkWaitlist[2] == $newArray[2]) && ($checkWaitlist[5] == $newArray[5])){
			$isInWaitlist = True;
			break;
		}
	}
	
	if($isInWaitlist){//Student already in the waitlist, so do nothing
		echo "<div class=\"bg-warning col-md-3\">You are already in this waitlist.</div>";
	}
	else{//Add Student to waitlist
		fputcsv($file, $newArray);
		echo "<div class=\"bg-success col-md-3\">You were successfully added to the waitlist!</div>";
	}
	fclose($file);
	

?>
</body>
</html>
