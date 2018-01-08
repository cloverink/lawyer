<?php
$key = 'uniqlo';

if(isset($_POST["ref"]) && isset($_POST["pass"])):
  $post_ref = $_POST["ref"];
  $post_pass = $_POST["pass"];
  $post_pass_answer = md5($post_pass . $key);
  if($post_ref === $post_pass_answer):
    $_SESSION["login"] = "yes";
    header("Location: /");
  endif;
endif;

$ref = '' . rand(111111111,999999999);
$answer = $ref[0] . $ref[1] . $ref[2] . $ref[0] . $ref[1] . $ref[2] . $key;
$answer_secret = md5($answer);

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Login - WEBMASTER TOOLS - UNIQLO</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/favicon.ico?v=2" />
  <link rel="stylesheet" href="/styles/styles.min.css" />
</head>

<body id="login">
  <div class="login-wrapper">
    <div class="row">
      <div class="col-xs-4" data-value="<?=$ref[0]?>"><?=$ref[0]?></div>
      <div class="col-xs-4" data-value="<?=$ref[1]?>"><?=$ref[1]?></div>
      <div class="col-xs-4" data-value="<?=$ref[2]?>"><?=$ref[2]?></div>
      <div class="col-xs-4" data-value="<?=$ref[3]?>"><?=$ref[3]?></div>
      <div class="col-xs-4" data-value="<?=$ref[4]?>"><?=$ref[4]?></div>
      <div class="col-xs-4" data-value="<?=$ref[5]?>"><?=$ref[5]?></div>
      <div class="col-xs-4" data-value="<?=$ref[6]?>"><?=$ref[6]?></div>
      <div class="col-xs-4" data-value="<?=$ref[7]?>"><?=$ref[7]?></div>
      <div class="col-xs-4" data-value="<?=$ref[8]?>"><?=$ref[8]?></div>
    </div>
    <div class="row">
      <input id="inpAnswer" type="text">
      <input id="btnSubmit" type="submit" value="Login">
    </div>
  </div>

  <form id="frmLogin" method="post">
    <input type="hidden" name="ref" value="<?=$answer_secret?>">
    <input type="hidden" name="pass" value="">
  </form>


  <script src="/scripts/vendors.min.js"></script>
  <script src="/scripts/apps.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</body>

</html>