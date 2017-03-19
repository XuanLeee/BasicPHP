<?php require_once("../includes/initialize.php");?>
<?php include_layout_template('header.php'); ?>


<h3><a href="../public/admin/login.php">Login to check log info</a> </h3>
<h3><a href="../public/admin/register.php">New user? Register please </a> </h3>

<h4>Search something below :</h4>
<img src="stylesheets/arrr.png" alt="arrow" style="width:20px;height:20px;">
<form action="../public/admin/index.php" method="post">
  <table>
    <tr>
      <td>
       <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="submit" value="Ready ? go ->" />
      </td>
    </tr>
  </table>
</form>

</div>

<?php
if (isset($_POST['submit'])) {
  if($session->is_logged_in()) {
     $session->message("Click logfile to check log information");
     redirect_to("../public/admin/index.php");
  }
}
?>

<?php include_layout_template('footer.php'); ?>
