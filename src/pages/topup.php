<?php

$omiseToken = P("omiseToken");

if(!empty($omiseToken)) {

  $user = $_SESSION["user"];

  $userid = $user['id'];

  $sql = "update user set topup = topup + 499 where id = $userid";
  $res = $conn->query($sql);

  if($res) {
    header('Location: /topup?status=completed');
    exit();
  }else{
    header('Location: /topup?status=incompleted');
    exit();
  }
}
?>
<nav class="breadcrumb">
  <a class="breadcrumb-item" href="/">Home</a>
  <a class="breadcrumb-item" href="/profile">Profile</a>
  <span class="breadcrumb-item active">เติมเงิน</span>
</nav>


<?php
$status = G("status");
if($status == "completed"):
  echo '<div class="alert alert-success">เติมเงินเสร็จสมบูรณ์</div>';
elseif($status == "incompleted"):
  echo '<div class="alert alert-danger">กรุณาทำรายการใหม่</div>';
endif;
?>

<div class="container col-sm-3">
<br>
<div class="panel panel-default">
  <div class="panel-heading">เติมเงิน</div>
  <div class="panel-body">
    <h3>499 บาท</h3>
    <p>ต่อ 1 ชั่วโมง</p>
  </div>
  <div class="panel-footer">

    <form class="checkout-form" name="checkoutForm" method="POST" action="/topup">
      <script type="text/javascript" src="https://cdn.omise.co/omise.js"
              data-key="pkey_test_5awfskc743q09qlf8rp"
              data-frame-label="Lawyer Topup"
              data-frame-description="เติมเงินเข้าสู่ระบบ"
              data-amount="49900"
              data-currency="THB"
              data-image="//<?=$_SERVER['HTTP_HOST'];?>/images/icon.png"
              ></script>
    </form>

  </div>
</div>



</div>


