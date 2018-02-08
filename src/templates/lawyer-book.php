<?php

$sql = "select * from user where id=$book";
$res = $conn->query($sql);
$o = $res->fetch_assoc();

$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];


$res = $conn->query("select * from lawyer where userid = " . $o["id"]);
$lawyer = $res->fetch_assoc();

$id = $o["id"];

?>
<nav class="breadcrumb">
  <a class="breadcrumb-item" href="/">Home</a>
  <a class="breadcrumb-item" href="/lawyer">ทนายของเรา</a>
  <span class="breadcrumb-item active">ข้อมูลทนาย</span>
</nav>


<section class="lawyer-book">
  <div>
    <div class="avt" style="background-image: url('/<?=$avt?>')">
      <img src="/images/1x1.png">
    </div>
    <div class="desc">
      <div class="name"><?=$o['name']?></div>

      <?php
        $sql3 = "select FLOOR(AVG(n.rate)) as rating from lawyer l inner join note n on l.userid = n.lawyerid where l.userid = $id";
        $res3 = $conn->query($sql3);
        $rating = $res3->fetch_assoc();
      ?>

      <div class="rate">
        <?php
        for($i=0;$i<5;$i++):
          if($i<$rating["rating"]):
            echo '<i class="fa fa-star" aria-hidden="true"></i> ';
          else:
            echo '<i class="fa fa-star-o" aria-hidden="true"></i> ';
          endif;
        endfor; 
        ?>
      </div>
      
      <div class="status">
        <i class="fa fa-circle" aria-hidden="true"></i> Online
      </div>

      <?php if(!empty($lawyer["price"])): ?>
      <div class="price"><?=$lawyer["price"]?></div>
      <?php endif; ?>

      <div class="action">
        <?php if(empty($lawyer["price"])): ?>
        <a class="btn btn-primary" href="#!" disabled>ปรึกษาทนาย</a>
        <a class="btn btn-primary" href="#!" disabled>จองคิว</a>
        <?php else: ?>
        <a class="btn btn-primary" href="/lawyer?consult=<?=$id?>">ปรึกษาทนาย</a>
        <a class="btn btn-primary" href="/book?id=<?=$id?>">จองคิว</a>
        <?php endif; ?>
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
