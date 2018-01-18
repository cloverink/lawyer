<?php

$id = G("id");

$sql = "select * from user where id=$id";
$res = $conn->query($sql);
$o = $res->fetch_assoc();

$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];


$res = $conn->query("select * from lawyer where userid = " . $o["id"]);
$lawyer = $res->fetch_assoc();

$id = $o["id"];

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
      <br>
      <br>
      <div class="action">
        <a class="btn btn-primary" href="/>">ข้อมูลส่วนตัว</a>
        <a class="btn btn-primary" href="/">ปรึกษาทนาย</a>
      </div>
    </div>
  </div>
  <div class="book-detail">

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">วันที่</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">ข้อความ</label>
      <div class="col-sm-10">
        <textarea></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox"> Remember me
          </label>
        </div>
      </div>
    </div>

  </div>
</section>
