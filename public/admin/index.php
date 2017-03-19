<?php
require_once ('../../includes/initialize.php');
if(!$session->is_logged_in()) { redirect_to("login.php");
}//directly reload to login page
?>

<?php include_layout_template('admin_header.php'); ?>

<h2><?php echo output_message($message); ?>
</h2>

<ul>
	<li>
		<a href="logout.php">Logout</a>
	</li>
	<li>
		<a href="logfile.php">Guess who login this page before?</a>
	</li>
</ul>

<?php include_layout_template('admin_footer.php'); ?>
