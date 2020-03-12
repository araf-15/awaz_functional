<div class="sideBar templete">
		<div class="samesideBar" style="overflow: hidden;">
			<h2>Catagories</h2>
			<ul>
				<?php 
					$query = "SELECT * FROM tbl_catagory";
					$catagory  = $db->selectData($query);
					if($catagory){
						while($catResult = $catagory->fetch_assoc()){?>

						<li><a href="posts.php?catagory=<?php echo $catResult['id'] ?>"><?php echo $catResult['name']; ?></a></li>
				
				<?php }}else{ ?>
					<li>No Catagory Created</li>
				<?php }?>
			</ul>
		</div>
		



		<div class="samesideBar" style="overflow: hidden;">
			<h2>Latest Articles</h2>
			<?php 
				$query = "SELECT * FROM tbl_post ORDER BY date DESC LIMIT 3";
				$latPost = $db->selectData($query);
				if($latPost){
					while ($latResult = $latPost->fetch_assoc()) {?>


			<div class="popular" style="overflow: hidden;">
				<h3><a href="post.php?id=<?php echo $latResult['id']; ?>"><?php echo  $latResult['title']; ?></a></h3>
				<a href="post.php?id=<?php echo $latResult['id'];?>"><img src="admin/<?php echo $latResult['image']; ?>" alt="post image"/></a>
				<p><?php echo $fm->textShorten($latResult['body'], 120); ?></p>
			</div>
			<?php }}else{header("Location: 404.php");} ?>
		</div>

















<!-- 		<div class="samesideBar" style="overflow: hidden;">
			<h2>Side Bar Three</h2>
			<p>Some Text will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go here</p>
		</div><div class="samesideBar" style="overflow: hidden;">
			<h2>Side Bar Four</h2>
			<p>Some Text will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go here</p>
		</div>
		<div class="samesideBar" style="overflow: hidden;">
			<h2>Side Bar Four</h2>
			<p>Some Text will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go here</p>
		</div>
		<div class="samesideBar" style="overflow: hidden;">
			<h2>Side Bar Four</h2>
			<p>Some Text will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go here</p>
		</div>
		<div class="samesideBar" style="overflow: hidden;">
			<h2>Side Bar Four</h2>
			<p>Some Text will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go here</p>
		</div>
		<div class="samesideBar" style="overflow: hidden;">
			<h2>Side Bar Four</h2>
			<p>Some Text will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go here</p>
		</div>
		<div class="samesideBar" style="overflow: hidden;">
			<h2>Side Bar Four</h2>
			<p>Some Text will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go hereSome Text Will be go here</p>
		</div>
	</div> -->