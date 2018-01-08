<header>
<a id="lnkHome" href="/"></a>
<nav>
  <a href="/consult">ปรึกษาทนาย</a>
  <a href="/lawyer">ทนายที่ปรึกษา</a>
  <a href="/about">เกี่ยวกับเรา</a>
  <a href="/faq">ถามตอบ</a>


  <?php
    if(isLogon()) {
      echo '<a href="/profile">ข้อมูลส่วนตัว</a>';
    } else {
      echo '<a href="/login">เข้าสู่ระบบ</a>';
    }
  ?>
  

</nav>
</header>