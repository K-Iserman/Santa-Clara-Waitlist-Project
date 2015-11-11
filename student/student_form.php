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
    		die ("The reCAPTCHA wasn't entered correctly. Click the back button of your broswer and try it again.");
  	}
	//Server side validations here.
	$newArray = array($_POST['first_name'], $_POST['last_name'], $_POST['ID_number'], $_POST['email'], $_POST['reason'], $_POST['course']);
	$file = fopen("/webpages/adiaztos/php_test/admin/waitlist.csv", "a+");
	$isInWaitlist = False;//Set to true if found in current waitlist

	while(($checkWaitlist = fgetcsv($file)) != False){
		if (($checkWaitlist[2] == $newArray[2]) && ($checkWaitlist[5] == $newArray[5])){
			$isInWaitlist = True;
		}
	}
	if($isInWaitlist){//Student already in the waitlist, so do nothing
		echo "You are already in this waitlist.";
	}
	else{//Add Student to waitlist
		fputcsv($file, $newArray);
		echo "You were successfully added to the waitlist!";
	}
	fclose($file);
	

?>
<br><br>
<a href="http://students.engr.scu.edu/~adiaztos/php_test/student/student.php">Add Another Class</a>
