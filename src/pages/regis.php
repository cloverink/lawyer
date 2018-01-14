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
    
    $target_file = $folder_upload . "/" . time() . "-" . $_FILES["avt"]["name"];
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

<form id="frmRegis" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
  <div class="alert alert-danger hide" role="alert"></div>
  <h3>Register Yourself</h3>
  <div class="form-group">
    <label class="control-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label class="control-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label class="control-label">Password</label>
    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
  </div>
  <div class="form-group">
    <label class="control-label">Confirm Password</label>
    <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <label class="control-label">Tel.</label>
    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Telephone">
  </div>
  <div class="form-group">
    <label class="control-label">Avatar</label>
    <input type="file" name="avt" id="avt">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Register</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </div>
</form>