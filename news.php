<?php include"include/db.php"; ?>


<!DOCTYPE html>
<html>
<head>
	<title>Naujienos</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
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

	<div class="news_page">		

		<?php

			$query = "SELECT * FROM post ORDER BY post_date DESC";
			$select_all_post_query = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($select_all_post_query)) 
				{
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_date = $row['post_date'];
					$post_content1 = substr($row['post_content1'],0, 140	);
					$post_image = $row['post_image'];
		?>

		<div class="posts">
			<a href="post.php?p_id=<?php echo $post_id;?>"><img src="media/new/<?php echo $post_image; ?>"style="margin-top:20px;"></a>
			<div class="posts_text">
				<a href="post.php?p_id=<?php echo $post_id;?>"><h1 id="title"><?php echo $post_title ?></h1></a>
				<div class="time" > 
					<p id="time" style="color:#616161; margin: 0;"> <?php echo $post_date ?> </p>
				</div>
				<h3 style="color:#424242;"><?php echo $post_content1; ?>...<a href="post.php?p_id=<?php echo $post_id;?>">skaitykite daugiau </a> </h3>
				
			</div>	
		</div>

		<?php } ?>

		<!-- footer -->
	<div class="footer">
		<p>© 2016 - 2017 m. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sodų bendrija "Viltis"</p>
		<script> smoothScroll.init(); </script>
	</div>
	<!-- footer -->

</body>
</html>