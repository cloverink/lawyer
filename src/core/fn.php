<?php



function G($var, $else="") {
  return isset($_GET[$var])? $_GET[$var] : $else;
}

function P($var, $else="") {
  return isset($_POST[$var])? $_POST[$var] : $else;
}

function PP($var) {
  global $conn;
  return $conn->real_escape_string(trim(P($var)));
}

function S($var, $else="") {
  return isset($_SESSION[$var])? $_SESSION[$var] : $else;
}

function C($var, $else="") {
  return isset($_COOKIE[$var])? $_COOKIE[$var] : $else;
}

function F($var, $else="") {
  return isset($_FILES[$var])? $_FILES[$var] : $else;
}

function isLogon() {
  return !empty(S("login"));
}

function my_server_url() {
  $server_name = $_SERVER['SERVER_NAME'];

  if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
    $port = ":$_SERVER[SERVER_PORT]";
  } else {
    $port = '';
  }

  if (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
    $scheme = 'https';
  } else {
    $scheme = 'http';
  }
  return $scheme.'://'.$server_name.$port;
}