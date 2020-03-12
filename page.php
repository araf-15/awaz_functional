<?php include 'inc/header.php'; ?>

<?php 
	$pageid = mysqli_real_escape_string($db->link, $_GET['pageid']);
	if(!isset($pageid) || $pageid == NULL){
		echo "<script>window.location = '404.php';</script>";
	}else{
		$id = $pageid;
	}
?>
	<div class="contentSection templete">
		<?php
			$query = "SELECT * FROM tbl_pages WHERE id = '$id'";
			$pageDetail = $db->selectData($query);
			if($pageDetail){
				while($result = $pageDetail->fetch_assoc()){?>

		<div class="mainContent templete">
			<div class="about">
				<h2><?php echo $result['name']; ?></h2>
				<p>
					<?php echo $result['body']; ?>
				</p>
			</div>
		</div>

		<?php } }else{
			header("Location: 404.php");
		} ?>

		<?php include 'inc/sideBar.php'; ?>
	</div>

		<?php include 'inc/socialicon.php'; ?>
		<?php include 'inc/footer.php'; ?>
		
</body>
</html>