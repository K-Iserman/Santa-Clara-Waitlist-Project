<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Santa Clara University - Waitlist</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="student_form_check.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <style type="text/css">
    body{
     width: 90%;
      margin: auto;
    }
    body > div:first-child {
      padding: 10px;
    }
  </style>
</head>

<body onload="registerEvents()">
  <div class="jumbotron">
    <h1>Santa Clara University</br><small>Waitlist<br><small>Student portal</small></small></h1>
	<div class="btn-group" role="group" aria-label="...">
  		<a	href="student.php"> <button type="button" class="btn btn-default">Students</button> </a>
	  	<a href="../admin/admin.php"><button type="button" class="btn btn-default">Admins</button> </a>
	</div>
  </div>

  <div class="container-fluid">
    <form name="Student_Info" action="student_form.php" onsubmit="return validateForm(this)" method="post">
      
      <div class="input-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          First Name:<br>
          <input autofocus type="text" class="form-control" name="first_name"  id="first_name" placeholder="First Name" aria-describedby="basic-addon1" required>
          <br><br>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          Last Name:<br>
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" aria-describedby="basic-addon1" required>
          <br><br>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          Student ID Number:(WXXXXXXX)<br>
          <input type="text" class="form-control" id="ID_number" name="ID_number" placeholder="ID number ex: WXXXXXXX" aria-describedby="basic-addon1" required>
          <br><br>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          E-mail Address:<br>
          <input type="email" class="form-control" id="email" name="email" placeholder="username@email.com" aria-describedby="basic-addon1" required>
          <br><br>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          Enter the reason for needing the class: <br>
          <input type="text" class="form-control" maxlength="300" id="reason" name="reason" rows="3" required>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <select id="classSelect" name="course" class="btn btn-default">
            <option value="default">Select a class</option>
                <?php
                  //generate dropdown using course csv
                  $file = fopen("../class_dump.csv", "r");
                  if(flock($file, LOCK_SH)) {
                    while(($CSV_courses = fgetcsv($file))!= FALSE) {
			echo "<option value='$CSV_courses[0] - $CSV_courses[1] - $CSV_courses[2] - $CSV_courses[4] $CSV_courses[3]'>$CSV_courses[0] - $CSV_courses[1] - $CSV_courses[2] - $CSV_courses[4] $CSV_courses[3]</option>\n";
                    }
                  }
                  else {
                    echo "Error locking file\n";
                  }
                  fclose($file);
                ?>
          </select>
        </div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php
			require_once('recaptchalib.php');
          		$publickey = "6LfEChATAAAAAA94Ta0A3KgX-JYMJbcml1V0EYsN"; // you got this from the signup page
          		echo recaptcha_get_html($publickey);
        	?>
	</div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<input type="submit" id="submit_button" class="btn btn-default">
        <div>
      </div>
    </form>
  </div>
 

</body>
</html>
