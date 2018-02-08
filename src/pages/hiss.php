<?php
$user = S("user");
$userid = $user["id"];
?>
<table class="table table-striped">
<tr>
  <th>#</th>
  <th>Datetime</th>
  <th>Book Time</th>
  <th>Detail</th>
  <th>Lawyer</th>
  <th>Tel</th>
</tr>
<tr>
</tr>
<?php
$i = 1;
$sql = "select b.*, u.name, u.tel, u.avt  from book b inner join user u on b.lawyerid = u.id where b.uid = $userid order by b.book desc, b.dtcreate";
$res = $conn->query($sql);
while($o = $res->fetch_assoc()):
?>
<tr>
  <td><?=$i++?></td>
  <td><?=$o["book"]?></td>
  <td><?=$o["hour"]?> Hour</td>
  <td><?=$o["detail"]?></td>
  <td><?=$o["name"]?></td>
  <td><?=$o["tel"]?></td>
</tr>
<?php
endwhile;
?>
</table>

