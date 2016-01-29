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
  <script type="text/javascript" src="update_check.js"></script>
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
    .description{
      
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
  <form class="col-sm-6" name="settings" action="../courseavail.php" onsubmit="return validateForm(this)" method="post">
	<div>Term number is in the following format: xxyy<br>
	xx is the current school year, with 2015-16 being 37. Each year goes up by two. i.e. 2016-17=39<br>
	yy is the quarter. Fall = 00, Winter = 20, Spring = 40, Summer = 60<br>
	Example number: Winter 2015 = 3720</div>
	<br>
	<b>Enter term number:</b><br>
	<input name="term" id="term" type="text"><br> 
  	<input type="submit" value="Update Courses" class="btn btn-default"/>
  </form>
  <br/>
  <form class="col-sm-6" name="delete" action="waitlist.php" onsubmit="if(confirm('Are you sure? This cannot be undone.')){return true;}else{return false;}" method="post">
  	
  	<div class="alert alert-danger" role="alert">This cannot be undone</div>
  	<input type="submit" class="btn btn-default" value="Clear Waitlist"/>
  </form>

</body>
</html>
