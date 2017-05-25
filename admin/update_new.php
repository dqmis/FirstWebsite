<?php include"../include/db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php if(!isset($_SESSION['username']))
	{
		header("location: ../admin/index.php");
	} 
?>

<?php 

	if(isset($_GET['p_id']))
	{
		$the_post_id = $_GET['p_id'];
	}


	$query = "SELECT * FROM post WHERE post_id=$the_post_id";
	$select_post_by_id = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($select_post_by_id)) {
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_date = $row['post_date'];
		$post_content = $row['post_content'];
		$post_content1 = $row['post_content1'];
		$post_image = $row['post_image'];
	}

	if(isset($_POST['update']))
	{
		$new_title = $_POST['title'];
		$new_img = $_FILES['image']['name'];
	    $new_img_temp = $_FILES['image']['tmp_name'];
	    $new_content = $_POST['content'];
	    $new_content1 = $_POST['content1'];
	    move_uploaded_file($new_img_temp, "../media/new/$new_img");

	    if(empty($new_img))
	    {
	    	$query = "SELECT * FROM post WHERE post_id = $the_post_id";
	    	$select_image = mysqli_query($connection,$query);

	    	while($row = mysqli_fetch_array($select_image))
	    	{
	    		$new_img = $row['post_image'];
	    	}
	    }

	    $query = "UPDATE post SET ";
	    $query .= " post_title = '{$new_title}', ";
	    $query .= " post_date = now(), ";
	    $query .= " post_image = '{$new_img}', ";
	    $query .= " post_content = '{$new_content}', ";
	    $query .= " post_content1 = '{$new_content1}' ";
	    $query .="WHERE post_id = {$the_post_id}";

	    $update_new=mysqli_query($connection,$query);

	    if(!$update_new)
	    {
	    	die("QUERY FAILED" . mysqli_error($connection));
	    }
	  

	}
	if(isset($_GET['p_id']))
	{
		$the_post_id = $_GET['p_id'];
	}


	$query = "SELECT * FROM post WHERE post_id=$the_post_id";
	$select_post_by_id = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($select_post_by_id)) {
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_date = $row['post_date'];
		$post_content = $row['post_content'];
		$post_content1 = $row['post_content1'];
		$post_image = $row['post_image'];
		
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Atnaujinti naujieną</title>
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
		<input type="text" name="title" value="<?php echo "$post_title"; ?>">
		</div>

		<div class="form_input">
		<label for="img">Pagrindinė nuotrauka</label>
		<label for="img"><img src="../media/new/<?php echo $post_image; ?>" style="width:100px;"></label>
		<input type="file" name="image">
		</div>

		<div class="form_input">
		<label for="content1">Teksto pirma pastraipa</label>
		<textarea  name="content1" id=""  style="width:550px; height:150px;"><?php echo $post_content1; ?></textarea>
		</div>

		<div class="form_input">
		<label for="content">Likęs tekstas</label>
		<textarea  name="content" id=""  style="width:550px; height:230px;"><?php echo $post_content; ?></textarea>
		</div>

		<div class="form_input">
		<input name="update" type="submit" value="Atnaujinti">
		</div>

	</form>
	</div>
	</body>
	</html>