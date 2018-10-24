<!doctype html>

<html lang="en">
  <head>
    <title>Globe Bank <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?><?php if (isset($preview) && $preview) { echo ' [PREVIEW]'; } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_index('public/stylesheets/public.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>
        <a href="<?php echo url_index('index.php'); ?>">
          <img src="<?php echo url_index('public/images/gbi_logo.png'); ?>" width="298" height="71" alt="" />
        </a>
      </h1>
<!--	    <p>URL_FOR :-----><?php //echo url_for('public.css'); ?><!-----</p>-->
<!--	    <br>-->
<!--	    <br>-->
<!--	    <br>-->
<!--	    <p>URL_INDEX :-----><?php //echo url_index('public/images/gbi_logo.png'); ?><!-----</p>-->
<!--	    <br>-->
<!--	    <br>-->
<!--	    <br>-->
<!--	    <p>Script name :-----><?php //echo $_SERVER['SCRIPT_NAME'];?><!-----</p>-->
<!--	    <p>Index :-----><?php //echo WWW_INDEX;?><!-----</p>-->
	    <button><a class="login" href = "<?php echo url_index('public/staff/login.php') ?>">Log in</a></button>
    </header>