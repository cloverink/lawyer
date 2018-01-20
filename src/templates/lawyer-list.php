<?php
$user = S('user');

$sql = "select * from user where type = 1";
$res = $conn->query($sql);
?>
<section class="home-section">
<div class="lawyer-list">
<?php while($o = $res->fetch_assoc()): 

$id = $o["id"];
$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];


$sql2 = "select * from lawyer where userid = $id";
$res2 = $conn->query($sql2);
$lawyer = $res2->fetch_assoc();


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
      <a class="btn btn-primary" href="/lawyer?profile=<?=$id?>">ข้อมูลส่วนตัว</a>
      
      <?php if(empty($lawyer["price"])): ?>
      <a class="btn btn-primary" href="#!" disabled>ปรึกษาทนาย</a>
      <a class="btn btn-primary" href="#!" disabled>จองคิว</a>
      <?php else: ?>
      <a class="btn btn-primary" href="/lawyer?consult=<?=$id?>">ปรึกษาทนาย</a>
      <a class="btn btn-primary" href="/lawyer?book=<?=$id?>">จองคิว</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php endwhile; ?>
</div>
</section>