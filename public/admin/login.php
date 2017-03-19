<?php
require_once("../../includes/initialize.php");
if($session->is_logged_in()) {// if user already login,directly reload to index page
  redirect_to("index.php");
}

if (isset($_POST['submit'])) { // Form has been submitted.

  $email = trim($_POST['email']);
  $password = trim($_POST['hashed_password']);

  // Check database to see if email exist.
	$found_user = User::authenticate($email);
  $existing_hash=$found_user->hashed_password;
  //check the user enter correct password;
  $check=password_check($password, $existing_hash);
  if ($found_user&&$check) {
    $session->login($found_user);
		log_action('Login', "{$found_user->email} logged in.");
    $session->message("Welcome , {$found_user->username}, <br> {$found_user->email}");
    redirect_to("index.php");

  } else {
    //email cannot found or password is wrong
    $message = "Error logging you in.";
  }

} else { // Form has not been submitted.
  $username="";
  $email = "";
  $hashed_password = "";
}

?>
<?php include_layout_template('admin_header.php'); ?>

		<h2>User Login</h2>
		<?php echo output_message($message); ?>

		<form action="login.php" method="post">
		  <table>
		    <tr>
		      <td>Email:</td>
		      <td>
		        <input type="text" name="email"  maxlength="30" value="<?php echo htmlentities($email); ?>" required>
		      </td>
		    </tr>
		    <tr>
		      <td>password:</td>
		      <td>
		        <input type="password" name="hashed_password" maxlength="30" value="" required>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Login" >
		      </td>
		    </tr>
		  </table>
		</form>

<?php include_layout_template('admin_footer.php'); ?>
