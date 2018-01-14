<?php
$book = G("book");
$consult = G("consult");
$profile = G("profile");
?>

<?php if(!empty($book)):?>
<?php include "templates/lawyer-book.php"; ?>
<?php else: ?>
<?php include "templates/lawyer-list.php"; ?>
<?php endif; ?>

