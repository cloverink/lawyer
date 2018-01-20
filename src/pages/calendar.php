<?php

$user = S("user");
$userid = $user["id"];


?>
<nav class="breadcrumb">
  <a class="breadcrumb-item" href="/">Home</a>
  <span class="breadcrumb-item active">ตารางนัด</span>
</nav>

<br><br>


<div class="container">
  <h3>ตารางนัด</h3>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>#</th>
        <th>วันที่</th>
        <th>ชั่วโมง</th>
        <th>ชื่อทนาย</th>
        <th width="40%">หัวข้อ</th>
      </tr>
    </thead>
    <tbody>

<?php

$i = 1;
$sql = "select * from book b inner join user u on b.lawyerid = u.id where b.uid = $userid order by book desc";
$res = $conn->query($sql);
while($row = $res->fetch_assoc()):
$date = date_create_from_format('Y-m-d H:i:s', $row["book"]);
?>

      <tr>
        <th scope="row"><?=$i?></th>
        <td><?=date_format($date, 'D M Y j G:i:s');?></td>
        <td><?=$row["hour"]?></td>
        <td><?=$row["name"]?></td>
        <td><?=$row["detail"]?></td>
      </tr>

<?php
$i++;
endwhile;
?>


    </tbody>
  </table>
</div>