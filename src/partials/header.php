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
<a href="/pay">ค่าใช้จ่าย</a>
<? endif; ?>
<a href="/about">เกี่ยวกับเรา</a>
<? if(isLogon()): ?>
<a href="/profile" class="pull-right">ข้อมูลส่วนตัว</a>
<? endif; ?>
</nav>
</header>