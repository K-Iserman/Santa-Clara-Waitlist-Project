<?php
//Interface provided by Professor Atkinson


//term broken down to year = 37 and quarter = 00
//each year goes up by 2 i.e. 2015 = 37, 2016 = 39, etc.
//each quarter goes up by 20 i.e. fall = 00, 
//winter = 20, spring = 40, summer = 60
//admins are aware of this, so a simple config file should suffice

//config.ini will be used to load values here
$ini_array = parse_ini_file("config.ini");
//print_r($ini_array);

$term = $_POST['term'];
$wsdl = $ini_array['URL'];
$client = new SoapClient($wsdl);

//initalize array for output
$CSV_courses = array();

$args = array();
$results = $client->__soapCall('qSchools', $args);
$schools = $results->data;

//foreach ($schools as $school) {
    $schoolid = "EGR"; //$school[0]; //EGR is the schoolid for the School of Engineering. Can scale out to entire university by using school[0]
    //echo "$schoolid\n";

    $args = array('schoolid' => $schoolid);
    $results = $client->__soapCall('qSubjects', $args);
    $subjects = $results->data;

    //foreach($subjects as $subject) { 
		$subjectid = "COEN"; //$subject[0]; //can scale out to entire school by replacing with subject[0] 

		//echo "$subjectid\n";
		$args = array('subjectid' => $subjectid, 'term' => $term);

		$results = $client->__soapCall('qCourses', $args);
		$courses = $results->data;

		foreach ($courses as $course) {
			if($course[2] == "Graduate Engineering") { continue; } //filters out graduate courses
			//print_r($course);
			$courseid = $course[5];

			$args = array('courseid' => $courseid, 'term' => $term);
			$results = $client->__soapCall('qCourse', $args);
			//print_r($results);

			$array = $results->data;
			foreach ($array as $section) {
				//print_r($section);
				// section[0] = section number, section[19] = course , section[9] = title, section[14] instructor
				$CSV_courses[] = "$section[19],$section[0],$section[9],$section[14]";
			}
		}

		//print_r($array);

		//generate csv with course information
		$file = fopen("class_dump.csv", "w");
		if(flock($file, LOCK_EX)) {
			foreach ($CSV_courses as $line) {
				fputcsv($file, explode(",", $line));
			}
		fclose($file);	
		header("Location: admin/admin.php");
		exit();
	    }
	    else {
	    	echo "Error locking file\n";
	    }
		fclose($file);
	//}
//}
	
?>
