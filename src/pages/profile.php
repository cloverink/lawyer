<?php


if(!isLogon()) {
  header("Location: /");
  exit();
}

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
      <div>Name: <span><?=$user["name"]?></span></div>
      <div>Email: <span><?=$user["email"]?></span></div>
      <div>Tel: <span><?=$user["tel"]?></span></div>
      <div>Address: <span><?=$user["address"]?></span></div>
      <div>Type: <span><?=$type["name"]?></span></div>
    </div>
  </div>

  <div class="profile-footer">
    <a class="btn btn-primary" href="/profile?action=edit" role="button">แก้ไข</a>
    <a class="btn btn-success" href="/topup" role="button">เติมเงิน</a>
    <a class="btn btn-default" href="/logout" role="button">ออกจากระบบ</a>
  </div>
</div>