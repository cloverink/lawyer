<?php

$sql = "select * from user where id=$book";
$res = $conn->query($sql);
$o = $res->fetch_assoc();

$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];
?>


<section class="lawyer-book">
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
</section>
