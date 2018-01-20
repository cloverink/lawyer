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
  
  $type = PP("type");
  $education = PP("education");
  $skill = PP("skill");
  $experience = PP("experience");

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



    $sql = "select count(*) as cnt from lawyer where userid = $userid";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();

    if(intval($row["cnt"]) == 0 ) {
      $sql = "insert into lawyer(userid, edu, skill, exp) value($userid, '$education','$skill','$experience')";
      $res = $conn->query($sql);
    } else {
      $sql = "update lawyer set edu='$education', skill='$skill', exp='$experience' where userid = $userid";
      $res = $conn->query($sql);
    }

    header('Location: /profile');
    exit();

  }





endif;


$sql = "select * from user_type where id = " . $user["type"];
$res = $conn->query($sql);
$type = $res->fetch_assoc();
$avt = empty($user["avt"])? "images/user-default.png" : $user["avt"];

$res = $conn->query("select * from lawyer where userid = " . $user["id"]);
$lawyer = $res->fetch_assoc();

?>
<nav class="breadcrumb">
  <a class="breadcrumb-item" href="/">Home</a>
  <span class="breadcrumb-item active">Profile</span>
</nav>

<div class="profile-container">
  <h3>Profile</h3>
  <div class="profile-body">
    <div class="avt" style="background-image: url('/<?=$avt?>')">
      <img src="/images/1x1.png">
    </div>
    <div class="desc">
      <?php if($action == "edit") { ?>
      <form action="/profile?action=update" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="userid" value="<?=$userid?>">
        <input type="hidden" name="type" value="<?=$type["name"]?>">
        <div class="form-group">Name: <input type="text" class="form-control" name="name" value="<?=$user["name"]?>"></div>
        <div class="form-group">Tel:  <input type="tel" class="form-control" name="tel" value="<?=$user["tel"]?>"></div>
        <div class="form-group">Address: <textarea class="form-control" name="address"><?=$user["address"]?></textarea></div>

        <?php if($type["name"] == "lawyer") { ?>
        <div class="form-group">Education: <textarea class="form-control" name="education"><?=$lawyer["edu"]?></textarea></div>
        <div class="form-group">Skill: <textarea class="form-control" name="skill"><?=$lawyer["skill"]?></textarea></div>
        <div class="form-group">Experience: <textarea class="form-control" name="experience"><?=$lawyer["exp"]?></textarea></div>
        <?php } ?>

        <div class="form-group">Image:  <input type="file" name="avt" id="avt"></div>

        <button type="submit" class="btn btn-warning">บันทึก</button>
      </form>
      
      <?php } else { ?>

      <div>Name: <span><?=$user["name"]?></span></div>
      <div>Email: <span><?=$user["email"]?></span></div>
      <div>Tel: <span><?=$user["tel"]?></span></div>
      <div>Address: <span><?=$user["address"]?></span></div>
      <div>Type: <span><?=$type["name"]?></span></div>
        <?php if($type["name"] == "lawyer") { ?>
          <br>
          <div>Education: <span><?=$lawyer["edu"]?></span></div>
          <div>Skill: <span><?=$lawyer["skill"]?></span></div>
          <div>Experience: <span><?=$lawyer["exp"]?></span></div>
        <?php } ?>
      <?php } ?>

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