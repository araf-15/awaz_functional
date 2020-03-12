<?php 
	  include 'inc/header.php';
 	  include 'inc/slider.php';
?>



	<div class="contentSection templete">
		<div class="mainContent templete">

			<!-- Pagination start-->
			<?php
				$per_page = 3;
				if(isset($_GET["page"])){
					$page = $_GET["page"];
				}else{
					$page = 1;
				}
				$start_form = ($page-1)*$per_page;
			 ?>
			 <!-- Pagination end -->
			
			<?php 
				$query = "SELECT * from tbl_post ORDER BY id DESC limit $start_form, $per_page";
				$post  = $db->selectData($query);

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
			<?php } ?> <!--end while loop -->

			<!-- Pagination -->
			<?php 
				$query 	= "SELECT * FROM tbl_post";
				$result = $db->selectData($query);
				$total_row = mysqli_num_rows($result);
				$total_pages = ceil($total_row/$per_page);

				echo "<span class='pagination'><a href = 'index.php?page=1'>".'First Page'."</a>";

				for ($i=1; $i <=$total_pages ; $i++) { 
					echo "<a href = 'index.php?page=".$i."'>".$i."</a>";
				}

				echo "<a href = 'index.php?page=$total_pages'>".'Last Page'."</a></span>"; ?>
			<!-- Pagination -->

			<?php }else{header("Location:404.php");}?>


		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>


	<?php include 'inc/footer.php'; ?>
	<?php include 'inc/socialicon.php'; ?>

	
</body>
</html>