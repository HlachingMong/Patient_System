function isValid(pForm) {
	const username = pForm.username.value;
	const password = pForm.password.value;

	const usernameErrMsg = document.getElementById("unameErr");
	const passwordErrMsg = document.getElementById("passErr");

	usernameErrMsg.innerHTML = "";
	passwordErrMsg.innerHTML = "";

	let flag = true;

	if (username === "") {
		usernameErrMsg.innerHTML = "Please fill up the username";
		usernameErrMsg.style.color = "red";
		flag = false;
	} 
	if (password === "") {
		passwordErrMsg.innerHTML = "Please fill up the password";
		passwordErrMsg.style.color = "red";
		flag = false;
	}

	return flag;
}

function fetch() {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		let x = JSON.parse(xhttp.responseText);
		document.getElementById("data").innerHTML = xhttp.responseText;
	}
	xhttp.open("GET", "../../mvc/controllers/UserController.php");
	xhttp.send();
}

function insert(pForm) {
	const username = pForm.username.value;
	const password = pForm.password.value;

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		document.getElementById("data").innerHTML = xhttp.responseText;
	}
	xhttp.open("POST", "../../mvc/controllers/AddUserController.php");
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("username="+ username + "&password=" + password);

	return false;
}