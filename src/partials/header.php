<?php

function getActiveMenu($name) {
  global $template_name;
  return ($name == $template_name)? "actived" : "";
}

?>
<header>
<nav>
<a href="/" class="icon"><img src="/images/icon.png"></a>
<a href="/">หน้าหลัก</a>

<? if(isLogon()): ?>
<a href="/lawyer">ทนายของเรา</a>

<?php
$user = S("user");
$userid = $user["id"];
if($user["type"] == 0) {
  $sql = "select count(*) as cnt from book where uid = $userid";
  $res = $conn->query($sql);
  $row = $res->fetch_assoc();
  if(intval($row["cnt"]) > 0) {
    echo "<a href='/calendar'>ตารางนัดทนาย</a>";
  }
} elseif($user["type"] == 1) { //lawyer
  $sql = "select count(*) as cnt from book where lawyerid = $userid";
  $res = $conn->query($sql);
  $row = $res->fetch_assoc();
  if(intval($row["cnt"]) > 0) {
    echo "<a href='/calendar'>ตารางนัดลูกค้า</a>";
  }
}
?>


<? endif; ?>

<a href="/about">เกี่ยวกับเรา</a>
<? if(isLogon()): ?>
<a href="/profile" class="pull-right">ข้อมูลส่วนตัว</a>
<? endif; ?>
</nav>
</header>