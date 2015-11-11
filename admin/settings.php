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

<body>
  <div class="jumbotron">
	<h1>Santa Clara University</br><small>Waitlist<br><small>Admin portal</small></small></h1>
	<div class="btn-group" role="group" aria-label="...">
                <a href="../student/student.php"><button type="button" class="btn btn-default">Students</button></a>
                <a href="admin.php"><button type="button" class="btn btn-default">Admins</button></a>
	</div>
  </div>

  <form name="settings" action="../courseavail.php" onsubmit="return validateForm(this)" method="post">
	Enter term number: (i.e. Fall 2015 is 3700)<br>
	<input name="term" type="text"><br> 
  	<input type="submit" value="Update Courses" class="btn btn-default"/>
  </form>

</body>
</html>
