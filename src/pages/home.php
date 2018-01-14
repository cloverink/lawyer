<?php
$sql = "select * from user where type = 1";
$res = $conn->query($sql);
?>
<section class="home-section">
<div class="lawyer-list">
<?php while($o = $res->fetch_assoc()): 

$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];
?>

<div class="lawyer">
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
      <a class="btn btn-primary" href="#" role="button">ข้อมูลส่วนตัว</a>
      <a class="btn btn-primary" href="#" role="button">ปรึกษาทนาย</a>
      <a class="btn btn-primary" href="#" role="button">จองคิว</a>
    </div>
  </div>
</div>



<?php endwhile; ?>
</div>
</section>


