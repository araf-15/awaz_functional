<?php 
	include 'config/config.php';
	include 'lib/Database.php';
	include 'helpers/formate.php';
?>

<?php
	$db 	= new Database();
	$fm 	= new formate(); 
 ?>	

<!DOCTYPE html>
<html>
<head>
	<?php
		if(isset($_GET['pageid'])){
			$pagetitleId = $_GET['pageid'];
			$query = "SELECT * FROM tbl_pages WHERE id = '$pagetitleId'";
			$pages = $db->selectData($query);
			if($pages){
				while ($result = $pages->fetch_assoc()) {?>
					<title> <?php echo $result['name']." || ";?><?php echo TITLE; ?></title>
	 			<?php	} }?> <?php }elseif (isset($_GET['id'])) {
		
			$postid = $_GET['id'];
			$query 	= "SELECT * FROM tbl_post WHERE id = '$postid'";
			$post 	= $db->selectData($query);
			if($post){
				while ($result = $post->fetch_assoc()) {?>
					<title> <?php echo $result['title'];?></title>
				<?php } } ?>

	 	<?php }elseif(isset($_GET['catagory'])){
	 		$catId = $_GET['catagory'];
	 		$query = "SELECT * FROM tbl_catagory WHERE id = '$catId'";
	 		$catagory = $db->selectData($query);
	 		if($catagory){
	 			while ($result = $catagory->fetch_assoc()) {?>

	 			<title> <?php echo "Catagory ". $result['name'];?></title>

	 			<?php } } ?>

	 	<?php } else{?>
	 		<title> <?php echo $fm->title()." ||"; ?> <?php echo TITLE; ?></title>
	 		<?php }?>


<!-- <meta name="language" content = "English"> -->
<meta charset="utf-8">
<meta name="description" content = "This is a blog Site Made by Araf">

<?php
	if(isset($_GET['id'])){
		$keywordId = $_GET['id'];
		$query = "SELECT * FROM tbl_post WHERE id = '$keywordId'";
		$keyword = $db->selectData($query);
		if($keyword){
			while ($result = $keyword->fetch_assoc()) {?>
			<meta name="keyword" content="<?php echo $result['tags']; ?>">			
		<?php } } }else{?>
			<meta name="keyword" content="<?php echo KEYWORDS; ?>">
		 <?php } ?>








<meta name="author" content = "Araf">

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="portal1.css"/>
<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css"/>
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script> -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:1000,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
	
</head>
<body>
	<div class="headerSection templete">
		<a style="color: #FFFFFF;" href="index.php">
			<div class="logo">
				<?php
					$query = "SELECT * FROM title_slogan WHERE id = '1'";
					$blog_title = $db->selectData($query);
					if($blog_title){
						while ($result = $blog_title->fetch_assoc()) {?>
				<img src="admin/<?php echo $result['image']; ?>" alt = "Logo"/>
				<h2><?php echo $result['title']; ?></h2>
				<p style="font-size: 12px;"><?php echo $result['slogan']; ?></p>
				<?php }} ?>
			</div>
		</a>
		<div class="social">
			<div class="icon">
			<?php
				$query = "SELECT * FROM tbl_social WHERE id = '1'";
				$socialLink = $db->selectData($query);
				if($socialLink){
					while($result = $socialLink->fetch_assoc()){?>
				<a href="<?php echo $result['tw']; ?>"><i class="fab fa-twitter"></i></a>
				<a href="<?php echo $result['fb']; ?>"><i class="fab fa-facebook-square"></i></a>
				<a href="<?php echo $result['ln']; ?>"><i class="fab fa-linkedin-in"></i></a>
				<a href="<?php echo $result['gp']; ?>"><i class="fab fa-google-plus-g"></i></a>
				<?php } } ?>
			</div>
			<div class="searchBtn">
				<form action="search.php" method="get">
					<input style="width: 160px; padding: 1px; margin-right: 2px; background: #f3daaa; font-size: 18px;" type="text" name="search" placeholder="Search keyword..."/>
					<input style= "width: 90px; padding: 1px; font-size: 18px; " type="submit" name="submit" value="Search"/>
				</form>
			</div>
		</div>
	</div>

	<div class="navSection templete">
			<!-- <p>Navigation</p> -->
			<?php
				$path = $_SERVER['SCRIPT_FILENAME'];
				$title = basename($path, '.php');
			 ?>
			<ul>
				<li><a <?php if($title == 'index'){echo "id = 'active'";} ?> href="index.php">Home</a></li>
				
				<?php
					$query = "SELECT * FROM tbl_pages";
					$pages = $db->selectData($query);
					if($pages){
						while ($result = $pages->fetch_assoc()) {?>
					<li><a
						<?php 
							if(isset($_GET['pageid']) && $_GET['pageid'] == $result['id']){
								echo "id = 'active'";
							}
						?>

					 href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
				<?php } } ?>
				<li><a
					<?php if($title == 'about'){echo "id = 'active'";} ?> href="about.php">About</a></li>
				<li><a <?php if($title == 'contact'){echo "id = 'active'";} ?> href="contact.php">Contact</a></li>
			</ul>
	</div>