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
<form id="frmLogin" class="form-horizontal" method="post">
  <div class="alert alert-danger hide" role="alert"></div>
  <h3>ลงชื่อเข้าใช้</h3>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
      <a href="/regis" class="btn pull-right">สมัครสมาชิก</a>
    </div>
  </div>
</form>