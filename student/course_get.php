<?php
	$department;
	$departmentSelect = $_REQUEST['departmentSelected'];
	if($departmentSelect == 1){
		$department = "COEN";
	}
	if($departmentSelect == 2){
		$department = "ELEN";
	}
	if($departmentSelect == 3){
                $department = "CENG";
        }
	if($departmentSelect == 4){
                $department = "BIOE";
        }
	if($departmentSelect == 5){
                $department = "MECH";
        }
	if($departmentSelect == 6){
		$department = "ENGR";
	}
	if($departmentSelect == 7){
		$department = "AMTH";
	}

	$courseArray = array();
	$file = fopen("../class_dump.csv", "r");

	 if(flock($file, LOCK_SH)) {
              while(($CSV_courses = fgetcsv($file))!= FALSE) {
			$course = $CSV_courses[5];
			if($course == $department){	
                        	$courseString = "$CSV_courses[0] - $CSV_courses[1] - $CSV_courses[2] - $CSV_courses[4] $CSV_courses[3]";
				array_push($courseArray, $courseString);
	      		}
		}	
	 }
         else{
             echo "Error locking file\n";
          }
         
	 fclose($file);
         echo json_encode($courseArray);


 ?>

