<?php include "../include/db.php" ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php if(!isset($_SESSION['username']))
	{
		header("location: ../admin/index.php");
	} 
?>

<?php if(isset($_POST['submit']))
{
	
	$new_cat_id = 2;
	$new_name = $_POST['title'];
	$new_date = date('d-m-y');
	$new_img = $_FILES['image']['name'];
	$new_img_temp = $_FILES['image']['tmp_name'];
	$new_content1 = $_POST['content1'];
	$new_content = $_POST['content'];


	move_uploaded_file($new_img_temp, "../media/new/$new_img");
	$query = "INSERT INTO post(post_cat_id, post_title, post_date,post_image,post_content, post_content1)" ;
	$query .= "VALUES('{$new_cat_id}', '{$new_name}', now(), '{$new_img}', '{$new_content}', '{$new_content1}')";

	$create_post_query = mysqli_query($connection, $query);

	if(!$create_post_query)
	{
		die("QUERY FAILED ." . mysqli_error($connection));
	}
} 
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Sukurti naujieną</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>

	<nav class="main_nav">
			<a href="logout.php" style="margin-right: 100px; color: red; ">ATSIJUNGTI</a>
			<a href="edit_new.php" style="margin-right:120px;background-color:#212121">Redaguoti naujieną</a>
			<a href="create_new.php" >Įkelti naujieną</a>
	</nav>

	<div class="create">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form_input">
		<label for="title">Naujienos pavadinimas</label>
		<input type="text" name="title">
		</div>

		<div class="form_input">
		<label for="img">Pagrindinė nuotrauka</label>
		<input type="file" name="image">
		</div>

		<div class="form_input">
		<label for="content1">Teksto pirma pastraipa</label>
		<textarea  name="content1" id=""  style="width:550px; height:150px;"></textarea>
		</div>

		<div class="form_input">
		<label for="content">Likęs tekstas</label>
		<textarea  name="content" id=""  style="width:550px; height:230px;"></textarea>
		</div>


		<div class="form_input">
		<input name="submit" type="submit" value="Įkelti">
		</div>

	</form>
	</div>
	</body>
	</html>