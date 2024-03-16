<?php 

require "../model/User.php";

$username = $_POST['username'];
$password = $_POST['password'];

$res = insert($username, $password);

if ($res) {
	echo '{"msg": "success"}';
}
else {
	echo '{"msg": "error"}';
}

?>