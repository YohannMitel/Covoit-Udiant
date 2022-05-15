<?php
$localhost = "localhost";
$user = "ymitel";
$pwd = "clementbenzema";
$database = "ymitel_02";
// Check connection
$ct = mysqli_connect ($localhost , $user,  $pwd, $database);
if ($ct == null) die ("Unable to connect");
$ct2 = mysqli_connect ($localhost , $user,  $pwd, $database);
?>