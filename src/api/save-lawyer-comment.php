<?php
header('Content-Type: application/json');
include("../core/config.php");

$user = S('user');
$userid = $user["id"];

$rate = PP("rate");
$text = PP("text", "No comment");
$lawyerid = PP("lawyer");

$sql = "insert into note(uid, lawyerid, rate, detail) value($userid, $lawyerid, $rate, '$text')";
$res = $conn->query($sql);

echo $res;
