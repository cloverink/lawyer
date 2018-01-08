<?php

$lawyerid = G("id");
if(empty($lawyerid)):

$sql = "select * from user where type = 1";
$res = $conn->query($sql);


?>
<div class="lawyer-container">
  <h3>ทนายที่ปรึกษา</h3>
  <div class="lawyer-list">
<?php
while($o = $res->fetch_assoc()):
?>
  <a class="lawyer" href="/lawyer?id=<?=$o['id']?>">
    <div class="avt" style="background-image: url('/<?=$o["avt"]?>')">
    <img src="/images/1x1.png">
    </div>
    <div class="desc">
      <div class="name"><?=$o['name']?></div>
      <div class="detail"><?=$o['detail']?></div>
    </div>
  </a>
<?php
endwhile;
?>
  </div>
</div>
<?php
else:

$sql = "select * from user where type = 1 and id = $lawyerid";
$res = $conn->query($sql);
$o = $res->fetch_assoc();

?>

<div class="lawyer-desc">
  <h3>รับคำปรึกษาจากทนาย</h3>
  <div class="avt" style="background-image: url('/<?=$o["avt"]?>')">
    <img src="/images/1x1.png">
  </div>
  <h4 class="name"><?=$o['name']?></h4>
  <h4 class="detail"><?=$o['detail']?></h4>

  <button type="button" class="btn btn-primary btn-lg">
    <i class="fa fa-video-camera" aria-hidden="true"></i>
  </button>


</div>

<?php
endif;
?>