<?php

  $dt = date("Ymd");

  include("core/config.php");
  include("core/helper.php");
  include("core/min.php");

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>LAWYER</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" />
    <link rel="stylesheet" href="/styles/styles.min.css?v=<?=$dt?>" />

  </head>
  
  <body data-template="<?=$template_name?>">

  <?php include "partials/header.php" ?>

    <main>
        <?php include $target_file; ?>
    </main>

    <?php include "partials/footer.php" ?>

    <script src="/scripts/vendors.min.js?v=<?=$dt?>"></script>
    <script src="/scripts/apps.min.js?v=<?=$dt?>"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  </body>
</html>