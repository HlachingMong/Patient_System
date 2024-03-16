<?php

function login($pUsername, $pPassword) {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fourth";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT id FROM users WHERE username = ? and password = ?");
	$stmt->bind_param("ss", $a, $b);

	$a = $pUsername;
	$b = $pPassword;
	$stmt->execute();
	$result = $stmt->get_result();

	$stmt->close();
	$conn->close();

	return $result->num_rows === 1;
}

function getAll() {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fourth";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT id, username, password FROM users");
	$stmt->execute();
	$result = $stmt->get_result();

	$data = array();
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	    $data[] = array('id' => $row["id"], 'username' => $row["username"], 'password' => $row["password"]);
	  }
	}

	$stmt->close();
	$conn->close();

	return $data;
}


function insert($u, $p) {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fourth";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
	$stmt->bind_param("ss", $u, $p);
	$res = $stmt->execute();

	$stmt->close();
	$conn->close();

	return $res;
}