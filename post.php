<?php include 'inc/header.php'; ?>

<?php
	$postid = mysqli_real_escape_string($db->link, $_GET['id']);
	if(!isset($postid) || $postid == NULL){
		header("Location: 404.php");
	}else{
		$id = $postid;
	}
?>

<div class="contentSection templete">
	<div class="mainContent templete">
		<div class="about">
			<?php 
				$query = "SELECT * FROM tbl_post WHERE id = $id";
				$post = $db->selectData($query);
				if($post){
					while($result = $post->fetch_assoc()){
			?>


			<!-- Post Title -->
			<h2><?php echo $result['title']; ?></h2>
			
			<!-- Post Date and Author -->
			<h4 style="padding-bottom: 5px;"><?php echo $fm->formatDate($result['date']); ?>, By <a style="text-decoration: none; color: #98690C" href="#"><?php echo $result['author']; ?></a></h4>
			
			<!-- Post Image -->
			<img src="admin/<?php echo $result['image']; ?>" alt="MyImage"/>

			<!-- Post Body -->
			<?php echo $result['body']; ?>


			<div class="videos" style="overflow: hidden;">
				<h2>See Videos</h2>
				<iframe width="560" height="315" src="<?php echo $result['vdo']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>


				

			<div class="relatedpost" style="overflow: hidden;">
				<h2>Related Articles</h2>
				<?php
				$catId = $result['catagory'];
				$relatedQuery = "SELECT * FROM tbl_post WHERE catagory = '$catId' ORDER BY rand() LIMIT 3";
				$relatedPost = $db->selectData($relatedQuery); 
				if($relatedPost){
					while ($rResult = $relatedPost->fetch_assoc()) {?>

				<a href="post.php?id=<?php echo $rResult['id'] ?>"><img src="admin/<?php echo $rResult['image']; ?>" alt="post image"/></a>

				<?php } }else{echo "No Related Post Available...!!!";}?> <!--Inner if and while loop end here -->
				
			</div>

			<?php } }else{header("Location: 404.php");} ?> <!--Outer if and while loops condition End here -->
		
		</div>
	</div>

	<?php include 'inc/sidebar.php'; ?>
</div>

<?php include 'inc/footer.php'; ?>
<?php include 'inc/socialicon.php'; ?>

</body>
</html>