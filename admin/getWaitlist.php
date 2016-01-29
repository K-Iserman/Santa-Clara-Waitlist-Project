<?php
	$classSelected = $_REQUEST['classSelected'];
	$courseArray = array();	
	$file = fopen("waitlist.csv", "r");

	 if(flock($file, LOCK_SH)) {
			 $i = 1;
              while(($CSV_courses = fgetcsv($file))!= FALSE) {
			$class = $CSV_courses[5];
			if($class == $classSelected){	
                        	$courseString = "<tr><td>$i</td><td>$CSV_courses[0]</td><td>$CSV_courses[1]</td><td>$CSV_courses[2]</td><td>$CSV_courses[3]</td><td>$CSV_courses[4]</td></tr>";
				array_push($courseArray, $courseString);
	      	$i++;	
			}
		}	
	 }
         else{
             echo "Error locking file\n";
          }
         
	 fclose($file);
         echo json_encode($courseArray);


 ?>

