</div>
<div id="footer">
	Welcome <?php echo date("Y",time()); ?>,
	New users
</div>
</body>
</html>
<?php
	if(isset($database)) { $database->close_connection();
	}
 ?>
