<?php

function getActiveMenu($name) {
  global $template_name;
  return ($name == $template_name)? "actived" : "";
}

?>
<header>
<a id="lnkHome" href="/"></a>
<nav>
  <a href="/consult" class="<?=getActiveMenu("consult")?>">ปรึกษาทนาย</a>
  <a href="/lawyer" class="<?=getActiveMenu("lawyer")?>">ทนายที่ปรึกษา</a>
  <a href="/about" class="<?=getActiveMenu("about")?>">เกี่ยวกับเรา</a>
  <a href="/faq" class="<?=getActiveMenu("faq")?>">ถามตอบ</a>

  <?php
    if(isLogon()) {
      
      echo '<a href="/profile" class="'. getActiveMenu("profile") .'">ข้อมูลส่วนตัว</a>';
    } else {
      echo '<a href="/login" class="'. getActiveMenu("login") .'">เข้าสู่ระบบ</a>';
    }
  ?>
  

</nav>
</header>