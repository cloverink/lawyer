<?php

if(!isLogon()) {
  header("Location: /");
  exit();
}

$user = S("user");

if($user["type"] != 2) {
  header("Location: /");
  exit();
}

$save = G("save");
if(!empty($save)):

  $type = PP("type");
  $detail = PP("detail");

  $sql = "update user set type=$type, detail='$detail' where id = $save";
  $conn->query($sql);
  header("Location: /admin");
  exit();
endif;

$edit = G("edit");

if(empty($edit)):
$sql = "select * from user where type != 2";
$res = $conn->query($sql);
?>

<table class="table table-striped">
<tr>
  <th>#</th>
  <th>name</th>
  <th>username</th>
  <th>email</th>
  <th>tel</th>
  <th>type</th>
  <th>
    <i class="fa fa-cog" aria-hidden="true"></i>
  </th>
</tr>
<?php
while($o = $res->fetch_assoc()):

$sql = "select * from user_type where id = " . $o["type"];
$r = $conn->query($sql);
$type = $r->fetch_assoc();

?>
<tr>
  <td><?=$o["id"]?></td>
  <td><?=$o["name"]?></td>
  <td><?=$o["username"]?></td>
  <td><?=$o["email"]?></td>
  <td><?=$o["tel"]?></td>
  <td><?=$type["name"]?></td>
  <td>
    <a class="btn btn-primary btnEdit" href="/admin?edit=<?=$o["id"]?>" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <a class="btn btn-danger btnDel" href="/admin?del=<?=$o["id"]?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
  </td>
</tr>
<?php
endwhile;
?>
</table>
<?php
else:

$sql = "select * from user where id = " . $edit;
$res = $conn->query($sql);
$o = $res->fetch_assoc();

$sql = "select * from user_type";
$r = $conn->query($sql);

?>

<form method="post" action="/admin?save=<?=$edit?>">
<div class="profile-container">
  <h3>Profile</h3>
  <div class="profile-body">
    <div class="avt" style="background-image: url('/<?=$user["avt"]?>')"></div>
    <div class="desc">
      <div>Name: <span><?=$o["name"]?></span></div>
      <div>Email: <span><?=$o["email"]?></span></div>
      <div>Type: 
    
      <select class="form-control" name="type">
        <?php
          while($type = $r->fetch_assoc()):
            $selected = ($o["type"] == $type["id"])? "selected": "";
            echo "<option value='".$type["id"]."' $selected>";
            echo $type["name"];
            echo "</option>";
          endwhile;
        ?>
      </select>
      </div>
      <div>
        Detail:
        <textarea class="form-control" rows="3" name="detail"><?=$o["detail"]?></textarea>
      </div>
    </div>


  </div>

  <div class="profile-footer">  
    
  </div>
  <div class="profile-footer">
    <button type="submit" class="btn btn-primary btn-lg">Save</button>
  </div>
</div>
</form>

<?php
endif;
?>