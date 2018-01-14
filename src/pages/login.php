<?php

$username = PP("username");
$password = PP("password");

if(!empty($username)
&& !empty($password)) {

  $pwd = md5($username . $password);
  $sql = "select * from user where username = '$username' and password = '$pwd'";
  $res = $conn->query($sql);
  if($res->num_rows == 1) {
    $row = $res->fetch_assoc();
    $_SESSION["login"] = true;
    $_SESSION["user"] = $row;
    header('Location: /');
    exit();
  } else {
    header('Location: /login?status=uncompleted');
    exit();
  }
}


if(G("status") == "uncompleted") {
  echo '<div class="alert alert-danger" role="alert">เข้าสุ่ระบบไม่สมบูรณ์</div>';
}

?>
<form id="frmLogin" class="form-horizontal" method="post" autocomplete="off">
  <div class="alert alert-danger hide" role="alert"></div>
  <h3>Account Login</h3>
  <div class="form-group">
    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">sign in</button>
  </div>

  <div class="form-group foot">
    <div>Forgot <a href="#!">Username/Password</a></div>
    <div>Create an account? <a href="/regis">Sign Up</a>
  </div>

</form>
