<?php

require_once('../../../private/initialize.php');

require_login();

if (is_post_request()){
	
	$admin = [];
	$admin['username'] = $_POST['username'];
	$admin['first_name'] = $_POST['first_name'];
	$admin['last_name'] = $_POST['last_name'];
	$admin['email'] = $_POST['email'];
	$admin['password'] = $_POST['password'];
	$admin['confirm_password'] = $_POST['confirm_password'];
	

	$result = insert_admin($admin);
	
	if ($result === true){
		$new_id = mysqli_insert_id($db);
		$_SESSION['message'] = "Admin created";
		redirect_to(url_for('staff/admins/show.php?id=' .h(u($new_id))));
	}else {
		$errors = $result;
	}
	
}else {
	$admin = [];
	$admin['username'] = '';
	$admin['first_name'] = '';
	$admin['last_name'] = '';
	$admin['email'] = '';
	$admin['password'] = '';
	$admin['confirm_password'] = '';
}



?>

<?php $page_title = 'Create Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
	
	<a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
	
	<div class="subject edit">
		<h1>Create Admin</h1>
		
			<h3><strong>Your password:</strong></h3>
			<li><strong>Contains minimum 12 characters</strong></li>
			<li><strong>1 UPPER case character</strong></li>
			<li><strong>1 lower case character</strong></li>
			<li><strong>1 symbol character</strong></li>

		
		<?php echo display_errors($errors); ?>
		
		<form action="<?php echo url_for('staff/admins/new.php') ?>" method="post">
			<dl>
				<dt>Username</dt>
				<dd><input type = "text" value="<?php echo h($admin['username'] ) ?>" name="username" </dd>
			</dl>
			<dl>
				<dt>First Name</dt>
				<dd><input type = "text" value="<?php echo h($admin['first_name'] ) ?>" name="first_name" </dd>
			</dl>
			<dl>
				<dt>Last Name</dt>
				<dd><input type = "text" value="<?php echo h($admin['last_name'] ) ?>" name="last_name" </dd>
			</dl>
			<dl>
				<dt>Email</dt>
				<dd><input type = "text" value="<?php echo h($admin['email'] ) ?>" name="email" </dd>
			</dl>
			<dl>
				<dt>Password</dt>
				<dd><input type = "password" value="" name="password" </dd>
			</dl>
			<dl>
				<dt>Confirm Password</dt>
				<dd><input type = "password" value="" name="confirm_password" </dd>
			</dl>
				<div id="operations">
					<input type="submit" value="Create Admin" />
				</div>
			</form>
	
	</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
