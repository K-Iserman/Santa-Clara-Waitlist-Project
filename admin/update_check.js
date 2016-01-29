function validateForm(settings){
	var term = document.getElementById("term").value;
	var format = /^[0-9]{3}0$/;		//checking if its a 4 digit number ending with 0
	var baseCase = 3500;
	var temp = term-baseCase;
	
	//testing to make sure the term number is the correct format.
	//Should be in the form of xx00,xx20,xx40, with 2015 starting at 3700
	//Each year goes up by 200, so 2016 starts at 3900
	if(((temp%200) != 0) && (((temp-20)%200) != 0) && (((temp-40)%200) != 0) && (((temp-60)%200) !=0) || temp < 0){
		alert("Please enter a valid term number");
		return false
	}

	if(!format.test(term)){				//testing regex
		alert("Please enter a valid term number");
		return false;
	}
	return true;

}
