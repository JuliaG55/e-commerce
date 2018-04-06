var userArray = [];


if(JSON.parse(sessionStorage.getItem('passingArray')) != null){
	for(i=0;i<JSON.parse(sessionStorage.getItem('passingArray')).length;i++){
	 	userArray.push(JSON.parse(sessionStorage.getItem('passingArray'))[i]);
	};
};
//log the list of users for convenience and troubleshooting
console.log(userArray);

document.getElementById('enternew').onclick = function(){verifyNew()};
//Verify new user function
function verifyNew(){

	var userlog = document.getElementById('newuser').value;

	if(userArray.length>0){
		for(i=0; i<userArray.length; i++){
			if(userlog == userArray[i].userlog){
				alert("Username exists, please create a new username");
				document.getElementById('newuser').value = "";
				break;
			};
		};
		if(i==userArray.length){
			verifySecure();
		};
	}else{
		verifySecure();
	};
};

function verifySecure(){

	var userpas = document.getElementById('newpas').value;

	//check that the password entered is 8 characters or more
	if(userpas.length>=8){
		addUser();
	}else{
		alert("Please enter a password of 8 characters or more");
		document.getElementById('newpas').value = "";
	};
	
};

function addUser(){
	
	var newUser = {
		userlog: document.getElementById('newuser').value,
		userpas: document.getElementById('newpas').value,
        useremail: document.getElementById('usermail').value,
        personname: document.getElementById('pername').value,
        surename: document.getElementById('surname').value,
        adress1: document.getElementById('adress1').value,
        adress2: document.getElementById('adress2').value,
        town: document.getElementById('town').value,
        postcode: document.getElementById('postcode').value,
	};

	//add the user to the array, put the array into the shared array, clear the inputs
	userArray.push(newUser);
	sessionStorage.setItem('passingArray', JSON.stringify(userArray));
	document.getElementById('newuser').value = "";
	document.getElementById('newpas').value = "";
    document.getElementById('usermail').value = "";
    document.getElementById('pername').value = "";
    document.getElementById('surname').value = "";
    document.getElementById('adress1').value = "";
    document.getElementById('adress2').value = "";
    document.getElementById('town').value = "";
    document.getElementById('postcode').value = "";
    

	alert("Your account has sucessfuly been created! You may now login.");
};


var userArray = [];


if(JSON.parse(sessionStorage.getItem('passingArray')) != null){
	for(i=0;i<JSON.parse(sessionStorage.getItem('passingArray')).length;i++){
	 	userArray.push(JSON.parse(sessionStorage.getItem('passingArray'))[i]);
	};
};
//log the list of users for convenience and troubleshooting
console.log(userArray);


document.getElementById('enter').onclick = function (){authenticate()};


function authenticate(){

	var userlog = document.getElementById('userlog').value;
	var userpas = document.getElementById('userpas').value;
    

	if(userArray.length>0){
		for(i=0; i<userArray.length; i++){
			if((userlog == userArray[i].userlog) && (userpas == userArray[i].userpas)){
				alert("You have logged in successfully!");
				document.getElementById('userlog').value = "";
				document.getElementById('userpas').value = "";
                //document.getElementById("loginpara").innerHTML = newUser.personname + " welcome!"; // This needs fixing to show which user is logged in...
				break;
			}
			if(i==userArray.length-1 || userArray.length==0){
				console.log('working')
				troubleshoot(userlog, userpas);
			}
		}
	}else{//enter here on first load when there are no users in the array yet
		alert("No match found. Please click the Create Account link to register a new username");
		document.getElementById('userlog').value = "";
		document.getElementById('userpas').value = "";
	}

};

function troubleshoot(userlog, userpas){
		for(j=0; j<userArray.length; j++){
			if(userlog == userArray[j].userlog){
				alert("Incorrect password!");
				document.getElementById('userpas').value = "";
				break;
			};
			if(j==userArray.length-1 || userArray.length==0){
				alert("No match found! Please check your details or create an account.");
				document.getElementById('userlog').value = "";
				document.getElementById('userpas').value = "";
			};
		};
};