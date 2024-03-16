<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users</title>
	<link rel="stylesheet" href="css/external.css">
	<script src="js/external.js"></script>
</head>
<body>

	<h1>Users</h1>

	<p id="data"></p>

	<button onclick="fetch();">Get Data</button>

	<br><br>

	<form action="../controllers/LoginController.php" method="post" onsubmit="return insert(this);">

		Username: <input type="text" name="username">
		<span id="unameErr"></span>
		<br><br>

		Password: <input type="password" name="password">
		<span id="passErr"></span>
		<br><br>

		<input class="btn" id="btn1" type="submit" value="Register">
		
	</form>

</body>
</html>