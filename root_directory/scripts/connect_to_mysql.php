<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "Achilles1";
$db_name = "cm_ninja";

$myConnection = mysqli_connect
("$db_host", "$db_username","$db_password", "$db_name") or die ("could not connect to mysql");
?>