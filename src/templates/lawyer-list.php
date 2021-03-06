<?php
$user = S('user');
$filter = G("filter");
$search = PP("search");

$sql = "select * from user where type = 1";

if(!empty($filter) && !empty($search)) {
  $sql = "select * from user u inner join lawyer l on u.id = l.userid where (u.name like '%$search%' or u.email like '%$search%' or u.address like '%$search%' or u.tel like '%$search%' or edu like '%$search%' or skill like '%$search%' or exp like '%$search%') && type = 1";
}

$res = $conn->query($sql);

?>
<section class="home-section">
<div class="lawyer-list">

<?php


if(!empty($filter)) {
  echo "ค้นหาคำว่า '$search'";
}
?>

<form class="form-inline" method="post" action="/lawyer?filter=yes">
  <div class="form-group">
    <div class="input-group">
      <input type="text" class="form-control" id="search" name="search" placeholder="ค้นหา">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
  <?php if(!empty($filter)) { ?>
  <a href="/lawyer" class="btn btn-info">ยกเลิกการค้นหา</a>
  <?php } ?>
</form>

<hr>


<?php while($o = $res->fetch_assoc()): 

$id = $o["id"];
$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];


$sql2 = "select * from lawyer where userid = $id";

$res2 = $conn->query($sql2);
$lawyer = $res2->fetch_assoc();


if($lawyer["actived"] == 0) continue;

?>

<div class="lawyer">
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