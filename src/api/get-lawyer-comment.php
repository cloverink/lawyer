<?php
header('Content-Type: application/json');
include("../core/config.php");

$lawyerid = G("lawyer");


$data = array();
$sql = "select n.*, u.name from note n inner join user u on n.uid = u.id where n.lawyerid = $lawyerid order by n.dtcreate desc";
$res = $conn->query($sql);
while($row = $res->fetch_assoc()) {
  array_push($data, $row);
}

echo json_encode($data);

