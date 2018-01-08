<?php


if(!isLogon()) {
  header("Location: /");
  exit();
}

$user = $_SESSION["user"];

// var_dump($user);

$sql = "select * from user_type where id = " . $user["type"];
$res = $conn->query($sql);
$type = $res->fetch_assoc();

?>
<div class="profile-container">
  <h3>Profile</h3>
  <div class="profile-body">
    <div class="avt" style="background-image: url('/<?=$user["avt"]?>')"></div>
    <div class="desc">
      <div>Name: <span><?=$user["name"]?></span></div>
      <div>Email: <span><?=$user["email"]?></span></div>
      <div>Tel: <span><?=$user["tel"]?></span></div>
      <div>Type: <span><?=$type["name"]?></span></div>
      <br>
      <div>Coin: <span><?=$user["coin"]?></span> บาท</div>
    </div>
  </div>

  <div class="profile-footer">
    <button type="button" class="btn btn-primary btn-lg">ประวัติการรักษา</button>
  </div>
  <div class="profile-footer">
    <button type="button" class="btn btn-primary btn-lg">การชำระเงิน</button>
  </div>
  <div class="profile-footer">
    <a class="btn btn-default" href="/logout" role="button">ออกจากระบบ</a>
  </div>
</div>