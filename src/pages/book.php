<?php

$bookid = PP("book");
if(!empty($bookid)) {

  $user = S("user");
  $userid = $user["id"];

  $detail = PP("detail");
  $bookdt = PP("bookdt");
  
  $sql = "insert into book(uid, lawyerid, book, detail) value($userid, $bookid, STR_TO_DATE('$bookdt', '%d/%m/%Y %H:%i:%s'), '$detail')";
  $result = $conn->query($sql);

  if($result) {
    header("Location: /book?id=$bookid&status=completed");
    exit();
  } else {
    header("Location: /book?id=$bookid&status=incompleted");
    exit();
  }
}


$id = G("id");
$sql = "select * from user where id=$id";
$res = $conn->query($sql);
$o = $res->fetch_assoc();
$avt = empty($o["avt"])? "images/user-default.png" : $o["avt"];
$res = $conn->query("select * from lawyer where userid = " . $o["id"]);
$lawyer = $res->fetch_assoc();

$id = $o["id"];


$status = G("status");
if($status == "completed"):
  echo '<div class="alert alert-success">จองเสร็จสมบูรณ์</div>';
elseif($status == "incompleted"):
  echo '<div class="alert alert-danger">กรุณาทำรายการใหม่</div>';
endif;

?>

<nav class="breadcrumb">
  <a class="breadcrumb-item" href="/">Home</a>
  <a class="breadcrumb-item" href="/lawyer">ทนายของเรา</a>
  <a class="breadcrumb-item" href="/lawyer?book=<?=$id?>">จองคิว</a>
  <span class="breadcrumb-item active">ลงเวลา</span>
</nav>

<div id="bookAlert" class="alert alert-danger hide"></div>
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
      <?php if(!empty($lawyer["price"])): ?>
      <div class="price"><?=$lawyer["price"]?></div>
      <?php endif; ?>
      <br>
      <div class="action">
        <a class="btn btn-primary" href="/lawyer?book=<?=$id?>">ข้อมูลส่วนตัว</a>
        <a class="btn btn-primary" href="/">ปรึกษาทนาย</a>
      </div>
    </div>
  </div>
  <div class="book-detail">

    <form method="post" id="frmBook" autocomplete="off">
      <input type="hidden" value="<?=$id?>" name="book">
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">วันที่</label>
        <div class="col-sm-10">
          <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
              <input type='text' class="form-control" name="bookdt" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">ข้อความ</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="3" name="detail"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <br>
          <button type="submit" class="btn btn-success">จอง</button>
        </div>
      </div>
    </form>

  </div>
</section>
