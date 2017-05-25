

<?php include "../include/db.php" ?>
<?php session_start() ?> 
<?php
	
	
	ini_set('display_errors', 0);
	error_reporting(E_ERROR | E_WARNING | E_PARSE); 

	
		if(isset($_POST['submit']))
	{
		$username= $_POST['username'];
		$password= $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$query = "SELECT * FROM users WHERE username = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);

		if(!$select_user_query)
			{
				die("QUERY FAILED". mysqli_error($connection));
			}

		while($row = mysqli_fetch_array($select_user_query))
		{
			$db_user_id = $row['user_id'];
			$db_username = $row['username'];
			$db_password = $row['password']; 
		}

		if ($username == $db_username && $password == $db_password)
		{
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_password;
			header("location: ../admin/edit_new.php");
		}
		else
		{
			?> <div class="wrong"><h2>Neteisingas prisijungimo vardas arba slaptažodis</h2></div> <?php
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<meta charset="utf-8">
</head>
<body>
<h1 style="width: 440px; margin: 0 auto; margin-bottom: 50px; margin-top: 100px;	">Norint tęsti, reikia prisijungti</h1>
	<div class="login">

		<form action="../admin/index.php" method="post">
			<input type="text" name="username" placeholder="Prisijungimo vardas">
			<input type="password" name="password" placeholder="Slaptažodis">
			<input type="submit" name="submit" value="Prisijungti">
		</form>
	</div>
</body>
</html>