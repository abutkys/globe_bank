<!doctype html>

<html lang="en">
  <head>
    <title>Globe Bank <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?><?php if (isset($preview) && $preview) { echo ' [PREVIEW]'; } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('public/stylesheets/public.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>
        <a href="<?php echo url_index('index.php'); ?>">
          <img src="<?php echo url_index('public/images/gbi_logo.png'); ?>" width="298" height="71" alt="" />
        </a>
      </h1>
	    <?php echo url_index('public/images/gbi_logo.png'); ?>
	    <button><a class="login" href = "<?php echo url_index('public/staff/login.php') ?>">Log in</a></button>
    </header>