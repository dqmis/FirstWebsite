<?php include "../include/db.php" ?>
<?php session_start(); ?>

<?php 

	$_SESSION['username'] = null;
	$_SESSION['password'] = null;

	header("location: ../admin/index.php")

?> 