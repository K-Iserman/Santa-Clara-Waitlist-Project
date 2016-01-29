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

  <script type="text/javascript">

  function trigger() {
    var selection = document.getElementById("departmentSelect").selectedIndex;
    var request;
    var courses = new Array();
    request = $.ajax({
      url:"../student/course_get.php",
      type: "POST",
      dataType: "json",
      data: {departmentSelected: selection},
      success: function(arrayReturned){
        $("#classSelect").empty();
        console.log(arrayReturned);
        courses = arrayReturned;
        var i;
        for(i=0; i < courses.length; i++){
       	  $("#classSelect").append('<option value="' + courses[i] + '">' + courses[i] + '</option>');

	 }
      },
      error:function(jqXHR, textStatus, errorThrown){
        console.log(JSON.stringify(jqXHR));
      }
    });
  }



  function sendClass(){
	var selection = $("#classSelect").val();
	//Send selection over to php.
	                $("#headerEmpty").empty();
                $("#headerEmpty").append(selection.split("-")[0]);

	 request = $.ajax({
	      url:"getWaitlist.php",
	      type: "POST",
	      dataType: "json",
	      data: {classSelected: selection},
	      success: function(arrayReturned){
		$("#waitlistBody").empty();
		console.log(arrayReturned);
	        var waitlist = arrayReturned;
		var i;
	        for(i=0; i < waitlist.length; i++){	
			$("#waitlistBody").append(waitlist[i]);				     		  	  	
    	  	}
	      },
    	      error:function(jqXHR, textStatus, errorThrown){
        		console.log(JSON.stringify(jqXHR));
      		}
	 });	
  }


</script>

</head>

<body>
  <div class="jumbotron">
    	<h1>Santa Clara University</br><small>Waitlist<br><small>Admin portal</small></small></h1>
	<div class="btn-group" role="group" aria-label="...">
                <a href="../student/student.php"><button type="button" class="btn btn-default">Students</button></a>
                <a href="admin.php"><button type="button" class="btn btn-default">Admins</button></a>
	    		<a href="waitlist.csv"><button type="submit" class="btn btn-default">Export All Waitlists</button></a>
				<a href="settings.php"><button type="button" class="btn btn-default">Settings</button></a>
        </div>
	</form>

  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <select onChange="trigger();" id="departmentSelect" name="department" class="btn btn-default">
		<option value="default">Select a department</option>
		<option value="coen"> COEN </option>
		<option value="elen"> ELEN </option>
		<option value="ceng"> CENG </option>
		<option value="bioe"> BIOE </option>
		<option value="mech"> MECH </option>
		<option value="engr"> ENGR </option>
		<option value="amth"> AMTH </option>
	</select>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  	<select onChange="sendClass();" id="classSelect" name="course" class="btn btn-default">
		<option value="default">Select a class</option>
	</select>
  </div>
  <br>

  <h1 id="headerEmpty"> </h1>
 
  <div class="table-responsive">          
    <table id="waitlistTable" class="table">
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
      <tbody id="waitlistBody">
      </tbody>
    </table>
  </div>
  
</body>
</html>
