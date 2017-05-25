<?php include "../include/db.php" ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php if(!isset($_SESSION['username']))
	{
		header("location: ../admin/index.php");
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Redaguoti naujieną</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>

	<nav class="main_nav">
			<a href="logout.php" style="margin-right: 100px; color: red; ">ATSIJUNGTI</a>
			<a href="edit_new.php" style="margin-right:120px;background-color:#212121">Redaguoti naujieną</a>
			<a href="create_new.php" >Įkelti naujieną</a>
	</nav>

	<div class="page">

	
	
	<table class="table">
		<thead>
			<tr>
				<th> Naujienos id</th>
				<th>Pavadinimas</th>
				<th>Sukūrimo data</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php 

				$query = "SELECT * FROM post";
				$select_all_post_query = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($select_all_post_query)) {
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_date = $row['post_date'];
					echo "<tr>";
					echo "<td>{$post_id}</td>";
					echo "<td>{$post_title}</td>";
					echo "<td>{$post_date}</td>";
					echo "<td><a href='update_new.php?update_post&p_id={$post_id}' style='color:blue; text-decoration:none;'>REDAGUOTI</a></td>";
					echo "<td><a href='edit_new.php?delete={$post_id}' style='color:red; text-decoration:none;'>IŠTRINTI</a></td>";
					echo "</tr>";
				}

				if(isset($_GET['delete']))
				{
					$the_post_id = $_GET['delete'];

					$query = "DELETE FROM post WHERE post_id = {$the_post_id}";
					$delete_query = mysqli_query($connection, $query);

				}
	?>
				
			</tr>
		</tbody>
	</table>
	</div>

</body>
</html>