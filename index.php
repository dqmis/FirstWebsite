<?php include"include/db.php"; ?>





<!DOCTYPE html>
<html>
<head>
	<title>S.B. "Viltis"</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<script src="dist/js/smooth-scroll.js"></script>
	<script src="dist/js/scrollmenu.js"></script>

</head>
<body>


	<nav class="main_nav">
		<h1>SB VILTIS</h1>
		<div class="nava">
		<a href="#news">Naujienos</a>
		<a  href="#friend" >Draugai</a>
		<a  	 href="#contacts" >Kontaktai</a>
		</div>
	</nav>


	<div class="main">
		<img src="media/index/karciupis.jpg">
		<div class="text_main">
			<h2>Sodų bendrija </h2>
			<h1>„Viltis“</h1>
		</div>
	</div>

	<div class="news_info" id="news">
		<h1>Naujienos</h1>
	</div>

<div class="page">		

		<?php $a = 6;

			$query = "SELECT * FROM post ORDER BY post_date DESC";
			$select_all_post_query = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($select_all_post_query)) 
				{
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_date = $row['post_date'];
					$post_content1 = $row['post_content1'];
					$post_image = $row['post_image'];
					$a = $a - 1;

					if($a > 0)
						{
		?>

		<div class="post">
			<a href="post.php?p_id=<?php echo $post_id;?>"><img src="media/new/<?php echo $post_image; ?>" id="post_img"></a>
			<div class="post_text">
				<a href="post.php?p_id=<?php echo $post_id;?>"><h1 id="title"><?php echo $post_title ?></h1></a>
				<div class="time"> 
					<p id="time"> <?php echo $post_date ?> </p>
				</div>
				
			</div>	
		</div>

		

		<?php $a=$a-1; }} ?>

		<div class="more_news">
			<a href="news.php"><h1>Visos naujienos</h1></a>
		</div>
</div>

	
	<div class="friends" id="friend">
		<img src="media/index/family.jpg">
		<h1>Mūsų draugai</h1>
		<p>Bendradarbiaudami kartu su Lietuvos policija, bei palaikant "Saugios kaiminystės" iniciatyvą, siekiame, jog gyventi mūsų soduose būtų saugu ir gera.</p><br><br>
		<h3>Saugios kaimynystės nauda:</h3><br> <p>Atskiros žmonių grupės tampa bendruomenėmis; kaimynai pradeda sveikintis ir rūpintis vieni kitais; žmonės jaučiasi saugiau ir ramiau; sumažėja nusikalstamumas; įsigilinę ir supratę vieni kitų problemas ir poreikius bendruomenė, policija ir seniūnija dirba kartu, kad gyvenamoji vietovė būtų saugi.</p>
	</div>



	<div class="contacts" id="contacts">
		<div class="info_contacts">
			<h2>Kontaktai</h2>
			<h3>Sodų pirminikas - Egidijus Šeputis<br>
				El. paštas: karciupis@gmail.com<br>
				Mob. tel. nr.: + 3706 763 6116<br><br>

				Tarybos narys - Gražvydas Baranauskas<br>
				El. paštas: random@gmail.com<br>
				Mob. tel. nr.: + 3706 777 5555</h3>
		</div>
		<div class="money">
			<h2>Mokesčiai</h2>
			<h3>Mokėjimo sąskaita: LT 627300010002236439<br>
				Bankas: Swedbank Lt<br>
				Įmonės kodas: 190286157<br><br>
				Mokestis, skirtas bendrijos nariui: 8€. už arą<br><br><br></h3>
		</div>
	</div>
		

		


	

	<!-- footer -->
	<div class="footer">
		<p>© 2016 - 2017 m. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sodų bendrija "Viltis"</p>
		<script> smoothScroll.init(); </script>
	</div>
	<!-- footer -->



</div>
</body>
</html>