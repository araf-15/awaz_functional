<?php 
	  include 'inc/header.php';
?>
<?php
	$searchKey = mysqli_real_escape_string($db->link, $_GET['search']);
	if(!isset($searchKey) || $searchKey == NULL){
		header("Location: 404.php");
	}else{
		$searchKey = $searchKey;
	}
?>
<div class="contentSection templete">
		<div class="mainContent templete">
		<?php 
			$query = "SELECT * FROM tbl_post WHERE title LIKE '%$searchKey%' OR body LIKE '%$searchKey%'";
			$post = $db->selectData($query);
			if($post){
				while($result = $post->fetch_assoc()){
		?>
			

			<div class="samePost" style="overflow: hidden;">
				<!-- Post Title -->
				<h2><a style="text-decoration: none; color: #98690C;" href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				
				<!-- Post Date and Author -->
				<h4 style="padding-bottom: 5px;"><?php echo $fm->formatDate($result['date']); ?>, By <a style="text-decoration: none; color: #98690C" href="#"><?php echo $result['author']; ?></a></h4>
				
				<!-- Post Image -->
				<a href="post.php?id=<?php echo $result['id'] ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
				
				<!-- Post Shorten Body -->
				<?php echo $fm->textShorten($result['body']); ?>
				
				<!-- Post Read More Button -->
				<div class="readmore" style="overflow: hidden"><a href="post.php?id=<?php echo $result['id']; ?>">Read More</a></div>
			
			</div>

			<?php }}else{  ?>
				<p style="color: red; font-size: 20px;">No Result Found...!!!</p>
			<?php }?>
		</div>
		
		<?php include 'inc/sidebar.php'; ?>
</div>

<?php include 'inc/footer.php'; ?>
<?php include 'inc/socialicon.php'; ?>