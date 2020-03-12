<div class="fixedicon" style="overflow: hidden;">

	<?php
		$query = "SELECT * FROM tbl_social WHERE id = '1'";
		$socialLink = $db->selectData($query);
		if($socialLink){
			while ($result = $socialLink->fetch_assoc()) {?>
		<a href="<?php echo $result['fb']; ?>" target="_blank"><img src="images/fb.png" alt="fb"></a>
		<a href="<?php echo $result['tw']; ?>" target="_blank"><img src="images/tw.png" alt="twiter"></a>
		<a href="<?php echo $result['gp']; ?>"target="_blank"><img src="images/gl.png" alt="google"></a>
		<a href="<?php echo $result['ln']; ?>"target="_blank"><img src="images/in.png" alt="linkedIn"></a>
		<?php } }  ?>
	</div>
	<script type="text/javascript" src="js/scrolltop.js"></script>