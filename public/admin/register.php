<?php
require_once("../../includes/initialize.php");
if($session->is_logged_in()) {// if user already login,directly reload to index page
  redirect_to("index.php");
}

if (isset($_POST['submit'])) {

  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $hashed_password = password_encrypt($_POST['password']);
  $user = new User();
  $user->username=$username;
  $user->email=$email;
  $user->hashed_password = $hashed_password;

  if ($_POST["password"] === $_POST["confirm_password"]) {
    //check email exist or not
  $found = $user::authenticate($email);
  if($found){
    $session->message("You already registe,please login");
    redirect_to("login.php");
   }else{
    $user->create();
    $session->login($user);
    log_action('Login', "{$user->email} logged in.");
    $session->message("Welcome , {$user->username}, <br> {$user->email}");
    redirect_to("index.php");
   }
  }else{
    $message = "Confirm Password not match.";
  }
} else {
  $username="";
  $email = "";
  $hashed_password = "";
}
?>

<?php include_layout_template('admin_header.php'); ?>
<h2> New User Register</h2>
<?php echo output_message($message); ?>
<form action="register.php" method="post">
  <table>

    <tr>
      <td>Name :</td>
      <td>
        <input type="username" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" required>
      </td>
    </tr>

    <tr>
      <td>Email:</td>
      <td>
        <input type="text" name="email" maxlength="30"  value="<?php echo htmlentities($email); ?>" required>
      </td>
    </tr>

    <tr>
      <td>Password:</td>
      <td>
        <input type="password" placeholder="Password" id="password" name="password" maxlength="30" value=""required>
      </td>
    </tr>
    <tr>
      <td>Confirm Password:</td>
      <td>
        <input type="password" placeholder="Confirm Password" id ="confirm_password" name="confirm_password" maxlength="30" value="" required>
      </td>
    </tr>

    <tr>
      <td colspan="2">
        <input type="submit" name="submit" value="Register" />
      </td>
    </tr>
  </table>
</form>


<?php include_layout_template('admin_footer.php'); ?>
