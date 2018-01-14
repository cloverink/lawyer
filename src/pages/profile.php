<?php


if(!isLogon()) {
  header("Location: /");
  exit();
}

$action = G("action");
$userid = $_SESSION["user"]["id"];

$sql = "select * from user where id = $userid";
$res = $conn->query($sql);
$row = $res->fetch_assoc();

$_SESSION["user"] = $row;
$user = $_SESSION["user"];

if($action == "update"):

  $name = PP("name");
  $tel = PP("tel");
  $address = PP("address");


  if(!empty($name)
  && !empty($tel)) {

    $avt = $user["avt"];
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

    $sql = "update user set name='$name', tel='$tel', address='$address', avt='$avt' where id = $userid";
    $result = $conn->query($sql);
    header('Location: /profile');
    exit();
  }

endif;


$sql = "select * from user_type where id = " . $user["type"];
$res = $conn->query($sql);
$type = $res->fetch_assoc();
$avt = empty($user["avt"])? "images/user-default.png" : $user["avt"];

?>
<div class="profile-container">
  <h3>Profile</h3>
  <div class="profile-body">
    <div class="avt" style="background-image: url('/<?=$avt?>')"></div>
    <div class="desc">
      <?php 
      if($action == "edit") {
      ?>
      <form action="/profile?action=update" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="userid" value="<?=$userid?>">
        <div class="form-group">Name: <input type="text" class="form-control" name="name" value="<?=$user["name"]?>"></div>
        <div class="form-group">Tel:  <input type="tel" class="form-control" name="tel" value="<?=$user["tel"]?>"></div>
        <div class="form-group">Address: <textarea class="form-control" name="address"><?=$user["address"]?></textarea></div>
        <div class="form-group">Image:  <input type="file" name="avt" id="avt"></div>
        <button type="submit" class="btn btn-warning">บันทึก</button>
      </form>
      <?php
      } else {
      ?>
      <div>Name: <span><?=$user["name"]?></span></div>
      <div>Email: <span><?=$user["email"]?></span></div>
      <div>Tel: <span><?=$user["tel"]?></span></div>
      <div>Address: <span><?=$user["address"]?></span></div>
      <div>Type: <span><?=$type["name"]?></span></div>
      <?php
      }
      ?>

    </div>
  </div>

  <div class="profile-footer">
    <?php if($action == "edit") { ?>
    <?php } else { ?>
    <a class="btn btn-primary" href="/profile?action=edit" role="button">แก้ไข</a>
    <a class="btn btn-success" href="/topup" role="button">เติมเงิน</a>
    <a class="btn btn-default" href="/logout" role="button">ออกจากระบบ</a>
    <?php } ?>
  </div>
</div>