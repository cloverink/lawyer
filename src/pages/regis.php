<?php

$fullname = PP("fullname");
$username = PP("username");
$password = PP("username");
$email = PP("email");
$tel = PP("tel");

if(!empty($fullname)
&& !empty($username)
&& !empty($password)
&& !empty($email)
&& !empty($tel)
){

  $avt = "";
  if(!empty($_FILES["avt"]["name"])){

    $folder_dt = date("Ymd");
    $folder_upload = "uploads/" . $folder_dt;

    if (!file_exists($folder_upload)):
      $oldmask = umask(0);
      mkdir($folder_upload, 0777, true);
      umask($oldmask);
    endif;
    
    $target_file = $folder_upload . "/" . $folder_dt . "-" . $_FILES["avt"]["name"];
    move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);

    $avt = $target_file;
  }

  $pwd = md5($username . $password);
  $sql = "insert into user(username, password, email, tel, name, avt) value('$username','$pwd','$email','$tel','$fullname','$avt')";
  $result = $conn->query($sql);

  if($result) {
    header('Location: /regis?status=completed');
    exit();
  }

}

if(G("status") == "completed") {
  echo '<div class="alert alert-success" role="alert">สมัครเสร็จสมบูรณ์</div>';
}
?>

<form id="frmRegis" class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="alert alert-danger hide" role="alert"></div>
  <h3>สมัครสมาชิก</h3>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Full Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Confirm Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Tel.</label>
    <div class="col-sm-8">
      <input type="tel" class="form-control" id="tel" name="tel" placeholder="Telephone">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Avatar</label>
    <div class="col-sm-8">
      <input type="file" name="avt" id="avt">
    </div>
  </div>



  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-8">
      <button type="submit" class="btn btn-primary">สมัครสามาชิก</button>
      <a href="/login" class="btn pull-right">เข้าสู่ระบบ</a>
    </div>
  </div>
</form>