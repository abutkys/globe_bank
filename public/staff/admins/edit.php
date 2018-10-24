<?php

require_once('../../../private/initialize.php');
//require_login();

if (!isset($_GET['id'])){
	redirect_to(url_for('staff/admins/index.php'));
}

$id = $_GET['id'] ?? 1;


if (is_post_request()){
	$admin = [];
	$admin['id'] = $id;
	$admin['username'] = $_POST['username'];
	$admin['first_name'] = $_POST['first_name'];
	$admin['last_name'] = $_POST['last_name'];
	$admin['email'] = $_POST['email'];
	$admin['password'] = $_POST['password'];
	$admin['confirm_password'] = $_POST['confirm_password'];
	
	$result = update_admin($admin);
	if ($result === true){
	$_SESSION['message'] = "Admin updated.";
		redirect_to(url_for('staff/admins/show.php?id=' .h(u($id))));
	}else {
		$errors = $result;
	}
	
}else{
	$admin = find_admin_by_id($id);
}



?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
	
	<a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
	
	<div class="subject edit">
		<h1>Edit Admin</h1>
		
		<?php echo display_errors($errors); ?>
		
		<form action="<?php echo url_for('staff/admins/edit.php?id=' . h(u($id))); ?>" method="post">
			<table class="list">
				<tr>
					<th>Admistrator ID</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>Confirm Password</th>
				</tr>
				<tr>
					<td><?php echo $id ;?></td>
					<td><input type = "text" value="<?php echo $admin['username'] ;?>" name="username"></td>
					<td><input type = "text" value="<?php echo $admin['first_name'] ;?>" name="first_name" </td>
					<td><input type = "text" value="<?php echo $admin['last_name'] ;?>" name="last_name" </td>
					<td><input type = "text" value="<?php echo $admin['email'] ;?>" name="email" </td>
					<td><input type = "password" name="password" </td>
					<td><input type = "password" name="confirm_password" </td>
				</tr>
			</table>
			<div id="operations">
				<input type="submit" value="Edit Admin" />
			</div>
		</form>
	
	</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
