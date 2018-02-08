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

$del = G("del"); 
if(!empty($del)):
  
  $sql = "delete user where id = $del";
  $conn->query($sql);

  header("Location: /admin");
  exit();

endif;

$save = G("save");
if(!empty($save)):

  $type = PP("type");
  $detail = PP("detail");

  $sql = "update user set type=$type where id = $save";
  $conn->query($sql);

  header("Location: /admin");
  exit();

endif;

$edit = G("edit");

if(empty($edit)):
$sql = "select * from user";
$res = $conn->query($sql);
?>

<div class="" style="width: 100%; max-width: 1200px; margin: 0 auto;">
  <div class="" style="width: 49.5%; min-height: 200px; display: inline-block;">
    <canvas id="myChartUserCount" ></canvas>
  </div>
  <div class="" style="width: 49.5%; min-height: 200px; display: inline-block;">  
    <canvas id="myChartPaymentCount" ></canvas>
  </div>
  <div class="" style="width: 49.5%; min-height: 200px; display: inline-block;">  
    <canvas id="myChartBookCount" ></canvas>
  </div>
</div>



<table class="table table-striped">
<tr>
  <th>#</th>
  <th>name</th>
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
  <td><?=$o["email"]?></td>
  <td><?=$o["tel"]?></td>
  <td><?=$type["name"]?></td>
  <td>
    <a class="btn btn-primary btn-xs btnEdit" href="/admin?edit=<?=$o["id"]?>" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>

    <? if($o["type"] < 2): ?>
    <a class="btn btn-danger btn-xs btnDel" href="/admin?del=<?=$o["id"]?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <? endif; ?>

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
    <div class="avt" style="background-image: url('/<?=$o["avt"]?>')"></div>
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


<script>

<?php
//count booking 
$book_count_date = array();
$book_count_cnt = array();
$sql = "select count(hour) as cnt, DATE(book) dt from book group by DATE(book) order by dt";
$res = $conn->query($sql);
while($row = $res->fetch_assoc()) {
  array_push($book_count_date, $row["dt"]);
  array_push($book_count_cnt, $row["cnt"]);
}

echo "var book_count_date = " . json_encode($book_count_date) . ";" . PHP_EOL;
echo "var book_count_cnt = " . json_encode($book_count_cnt) . ";" . PHP_EOL;


//count payment
$payment_count_date = array();
$payment_count_cnt = array();
$sql = "select count(*) cnt, DATE(dtcreate) dt from income group by DATE(dtcreate) order by dt";
$res = $conn->query($sql);
while($row = $res->fetch_assoc()) {
  array_push($payment_count_date, $row["dt"]);
  array_push($payment_count_cnt, $row["cnt"]);
}
echo "var payment_count_date = " . json_encode($payment_count_date) . ";" . PHP_EOL;
echo "var payment_count_cnt = " . json_encode($payment_count_cnt) . ";" . PHP_EOL;


//count user
$user_count_name = array();
$user_count_cnt = array();
$sql = "select count(*) cnt, ut.name from user u inner join user_type ut on u.type = ut.id group by u.type";
$res = $conn->query($sql);
while($row = $res->fetch_assoc()) {
  array_push($user_count_name, $row["name"]);
  array_push($user_count_cnt, $row["cnt"]);
}
echo "var user_count_name = " . json_encode($user_count_name) . ";" . PHP_EOL;
echo "var user_count_cnt = " . json_encode($user_count_cnt) . ";" . PHP_EOL;

?>

function wait() {
  
  if(typeof $ === "undefined" || typeof Chart === "undefined") {
    setTimeout(() => {
      wait();
    }, 500);
    return;
  }

  __DrawUserChart();
  __DrawPaymentChart();
  __DrawBookChart();
}

wait();


function __DrawUserChart() {
  var total = 0;
  $.each(user_count_cnt,function() {
    total += +this;
  });

  var ctx = document.getElementById("myChartUserCount");
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: user_count_name,
        datasets: [{
          label: '# ผู้ใช้ทั้งหมด (' + total + ' คน)',
          data: user_count_cnt,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
}

function __DrawPaymentChart() {
  var total = 0;
  $.each(payment_count_cnt,function() {
    total += +this;
  });

  var ctx = document.getElementById("myChartPaymentCount");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: payment_count_date,
        datasets: [{
          label: '# รายรับของระบบ (' + total * 499 + ' บาท)',
          data: payment_count_cnt,
          backgroundColor: [
            'rgba(54, 162, 235, 0.2)'
          ],
          borderWidth: 0
        }]
      },
      options: {
        elements: {
            line: {
                tension: 0
            }
        },
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            ticks: {
              autoSkip: false,
              maxRotation: 45,
              minRotation: 45
            }
          }]
        }
      }
    });
}

function __DrawBookChart() {
  var total = 0;
  $.each(payment_count_cnt,function() {
    total += +this;
  });

  var ctx = document.getElementById("myChartBookCount");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: book_count_date,
        datasets: [{
          label: '# ยอดการจอง (' + total + ' ชั่วโมง)',
          data: book_count_cnt,
          backgroundColor: [
            'rgba(255, 206, 86, 0.2)'
          ],
          borderWidth: 0
        }]
      },
      options: {
        elements: {
            line: {
                tension: 0
            }
        },
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            ticks: {
              autoSkip: false,
              maxRotation: 45,
              minRotation: 45
            }
          }]
        }
      }
    });
}

</script>