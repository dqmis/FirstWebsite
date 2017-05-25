<?php include"include/db.php" ?>
<?php 
				if(isset($_GET['p_id']))
				{
					$post_id = $_GET['p_id'];
				}

				$query = "SELECT * FROM post WHERE post_id= $post_id";
				$select_all_post_query = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($select_all_post_query)) {
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_date = $row['post_date'];
					$post_content1 = $row['post_content1'];
					$post_content = $row['post_content'];
					$post_image = $row['post_image'];
				}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $post_title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav class="main_nav">
		<h1>SB VILTIS</h1>
		<div class="nava">
		<a href="index.php#news">Naujienos</a>
		<a href="index.php#friend" >Draugai</a>
		<a href="index.php#contacts">Kontaktai</a>
		</div>
	</nav>


		<div class="text_cover">
		<div class="text">
			<h1 id="title"><?php echo $post_title; ?></h1>
			<h2 id="time"><?php echo $post_date; ?></h2>
			<img src="media/new/<?php echo $post_image; ?>" id="main_img">
			<p class="main_text" style="font-weight:bold; margin-bottom: 0px;"><?php  echo $post_content1;?></p>
			<p class="main_text" style="margin-top: 0px;"><?php  echo $post_content;?></p>
		</div>
			
		</div>	

		<div class="read_more">
			<h2>Kitos naujienos</h2>
			
			<?php $a = 8;


				if(isset($_GET['p_id']))
				{
					$post_id = $_GET['p_id'];
				}

				$query = "SELECT * FROM post WHERE post_id!= $post_id ORDER BY post_date DESC";
				$select_all_post_query = mysqli_query($connection, $query);


				

				while ($row = mysqli_fetch_assoc($select_all_post_query)) 
					{
						$post_id = $row['post_id'];
						$post_title = $row['post_title'];
						$post_image = $row['post_image'];
						$a = $a - 1;
						
						if($a > 0)
						{
						?>
				
				<div class="more">
				<a href="post.php?p_id= <?php echo $post_id;?>">
					<img src="media/new/<?php echo $post_image; ?>">
				</a>
				<a href="post.php?p_id= <?php echo $post_id;?>">
					<h1><?php echo $post_title ?></h1>
				</a>
				</div>
				
					<?php $a=$a-1; }} ?>
		</div>

		<div class="footer">
			<p>© 2016 - 2017 m. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sodų bendrija "Viltis"</p>
		</div>																																																																																											
</body>
</html>