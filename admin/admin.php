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
		<a href="settings.php"><button type="button" class="btn btn-default">Update Quarter</button></a>
        </div>

  </div>
  <!--<div class="dropdown">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select the course you wish to view <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <?php
        //generate dropdown using course csv
        $file = fopen("../class_dump.csv", "r");
        if(flock($file, LOCK_SH)) {
          while(!feof($file)) {
            $CSV_courses = fgetcsv($file);
            //print_r($CSV_courses);
            echo "<li><a href='$CSV_courses[0] - $CSV_courses[1] - $CSV_courses[2] - $CSV_courses[4] $CSV_courses[3]'>$CSV_courses[0] - $CSV_courses[1] - $CSV_courses[2] - $CSV_courses[4] $CSV_courses[3]</a></li>\n";
          }
        }
        else {
          echo "Error locking file\n";
        }
        fclose($file);
      ?>
    </ul>
  </div>

  <br>

  <h1>COEN 12</h1>
  
  <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>ID</th>
          <th>e-mail</th>
          <th>Reason</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Sample</td>
          <td>Student</td>
          <td>W0350000</td>
          <td>sstudent@scu.edu</td>
          <td>I need it.</td>
        </tr>
      </tbody>
    </table>
  </div> -->
  
  <br>
	<form method="get" action="waitlist.csv">
	  <div class="btn-group">
	    <button type="submit" class="btn btn-default">Export this waitlist</button>
	  </div>
	</form>
	<!--<div class="btn-group">
	 <button type="button" class="btn btn-default">Logout</button>
	</div> -->
</body>
</html>
