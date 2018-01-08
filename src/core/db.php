<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "lawyer");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_set_charset($conn,"utf8");

$conn->query("SET `time_zone` = '".date('P')."'");