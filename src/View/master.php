<DOCTYPE html>
<html>
  <head>
    <title><?php echo $pagetitle; ?></title>
    <link rel = "stylesheet"  type = "text/css"  href = "<?php echo APP_INNER_DIRECTORY;?>/css/main.css" />
  </head>
  <body>
    <header>
    <div class="topnav">
          <a href='<?php echo APP_INNER_DIRECTORY;?>'>Home</a>
          <a href='<?php echo APP_INNER_DIRECTORY;?>/Users/'>Users</a>
          <a href='<?php echo APP_INNER_DIRECTORY;?>/Ads/'>Ads</a>
    </div>

    </header>
    <section>
        <?php include($include); ?>
        <div class="push"></div>
    </section>
    <footer>
      Sasa Jovanovic
    </footer>
  <body>
<html>