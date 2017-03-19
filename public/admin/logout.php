<?php require_once("../../includes/initialize.php"); ?>
<?php
    $session->logout();
    $session->message("Please login.");
    redirect_to("../index.php");
?>
