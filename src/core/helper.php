<?php

$request_uri = $_SERVER["REQUEST_URI"];
$request_uri = explode("?", $request_uri);

$url_flagment = explode("/", $request_uri[0]);
array_shift($url_flagment);
$template_path = join("/", $url_flagment);
$template_name = str_replace("/", "-", $template_path);

// if(!isLogon()) {
//   include("pages/login.php");
//   exit;
// }

if (empty($template_name)) {
  $template_name = $template_path = "home";
}

if($template_name == "logout") {
  include("pages/logout.php");
  exit;
}

$target_file = "pages/" . $template_path . ".php";

if (!file_exists($target_file)) {
  $target_file = "pages/error/404.php";
}