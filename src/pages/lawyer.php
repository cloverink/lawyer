<?php
$book = G("book");
$consult = G("consult");
$profile = G("profile");
?>

<?php if(!empty($book)):?>
<?php include "templates/lawyer-book.php"; ?>
<?php elseif(!empty($profile)): 
$book = $profile  
?>
<?php include "templates/lawyer-book.php"; ?>
<?php else: ?>
<nav class="breadcrumb">
  <a class="breadcrumb-item" href="/">Home</a>
  <span class="breadcrumb-item active">ทนายของเรา</span>
</nav>
<?php include "templates/lawyer-list.php"; ?>
<?php endif; ?>

