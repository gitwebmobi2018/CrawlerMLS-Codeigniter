function checkCookies() {
	document.getElementById("startprice").value = sessionStorage.getItem("lower");
		document.getElementById("endprice").value = sessionStorage.getItem("higher");
}

function saveSearchInput() {
    var lower = document.getElementById("startprice").value;
	var higher = document.getElementById("endprice").value;
    if (lower == "" && higher == "") {
        alert("Please enter price");
        return false;
    }

    sessionStorage.setItem("lower", lower);
	sessionStorage.setItem("higher", higher);
    location.reload();
    return true;
}

function removeSearchInput() {
    sessionStorage.removeItem("lower");
	sessionStorage.removeItem("higher");
}

function validateForm() {
    var x = document.forms["myForm"]["first_name"].value;
	var y = document.forms["myForm"]["last_name"].value;
	var a = document.forms["myForm"]["email"].value;
	var b = document.forms["myForm"]["password"].value;
	if(a == "" && b == "" && x == "" && y == ""){
		alert("Please fill up the form with correct information.");
        return false;
	}
    if (x == "" || y == "") {
        alert("First Name and Last Name must be filled out");
        return false;
    }
	if (a == "") {
        alert("E-mail must be filled out");
        return false;
    }
	if (b == "") {
        alert("Password must be filled out");
        return false;
    }
}