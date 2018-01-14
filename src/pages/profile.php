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
      <form>
        <div class="form-group">Name: <input type=""></div>
        <div class="form-group">Email:  <input type=""></div>
        <div class="form-group">Tel:  <input type=""></div>
        <div>Address: <br><textarea></textarea></div>
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
    <?php 
      if($action == "edit") {
    ?>
    <a class="btn btn-warning" href="/profile" role="button">บันทึก</a>
    <?php
      } else {
    ?>
    <a class="btn btn-primary" href="/profile?action=edit" role="button">แก้ไข</a>
    <?php
      }
    ?>
    

    <a class="btn btn-success" href="/topup" role="button">เติมเงิน</a>
    <a class="btn btn-default" href="/logout" role="button">ออกจากระบบ</a>
  </div>
</div>