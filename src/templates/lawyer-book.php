<?php

$sql = "select * from user where id=$book";
$res = $conn->query($sql);
$o = $res->fetch_assoc();

$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];


$res = $conn->query("select * from lawyer where userid = " . $o["id"]);
$lawyer = $res->fetch_assoc();

?>


<section class="lawyer-book">
  <div>
    <div class="avt" style="background-image: url('/<?=$avt?>')">
      <img src="/images/1x1.png">
    </div>
    <div class="desc">
      <div class="name"><?=$o['name']?></div>
      <div class="rate">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <div class="status">
        <i class="fa fa-circle" aria-hidden="true"></i> Online
      </div>
      <div class="action">
        <a class="btn btn-primary" href="/lawyer?consult=<?=$id?>">ปรึกษาทนาย</a>
        <a class="btn btn-primary" href="/lawyer?book=<?=$id?>">จองคิว</a>
      </div>
    </div>
  </div>
  <div class="skill">
    <h4>การศึกษา</h4>
    <p>-  <?=$lawyer["edu"]?></p>
    <h4>ความเชี่ยวชาญ</h4>
    <p>-  <?=$lawyer["skill"]?></p>
    <h4>ประสบการณ์การทำงาน</h4>
    <p>-  <?=$lawyer["exp"]?></p>
  </div>
</section>
