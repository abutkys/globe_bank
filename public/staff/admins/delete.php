<?php

require_once('../../../private/initialize.php');
//require_login();

if(!isset($_GET['id'])) {
	redirect_to(url_for('/staff/admins/index.php'));
}
$id = $_GET['id'];
$admin = find_admin_by_id($id);
if(is_post_request()) {
	
	$result = delete_admin($id);
	$_SESSION['message'] = "Admin deleted";
	if ($result ===true){
	redirect_to(url_for('/staff/admins/index.php'));
	}else {
		$admin = find_admin_by_id($id);
	}
}

?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
	
	<a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
	
	<div class="subject delete">
		<h1>Delete Admin</h1>
		<p>Are you sure you want to delete this admin?</p>
		<dl>
			<dt>Username</dt>
			<dd><?php echo h($admin['username']); ?></dd>
		</dl><dl>
			<dt>First Name</dt>
			<dd><?php echo h($admin['first_name']); ?></dd>
		</dl><dl>
			<dt>Last Name</dt>
			<dd><?php echo h($admin['last_name']); ?></dd>
		</dl><dl>
			<dt>Email</dt>
			<dd><?php echo h($admin['email']); ?></dd>
		</dl>
		
		<form action="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>" method="post">
			<div id="operations">
				<input type="submit" name="commit" value="Delete Admin" />
			</div>
		</form>
	</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
