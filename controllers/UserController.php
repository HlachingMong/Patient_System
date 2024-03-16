<?php 

require "../model/User.php";

$res = getAll();
echo json_encode($res);

?>