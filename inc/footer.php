<div class="footerSection templete">
		<div class="footermenu" style="overflow: hidden;">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Privacy</a></li>
			</ul>
		</div>

		<?php
			$query = "SELECT * FROM tbl_footer WHERE id = '1'";
			$copyright = $db->selectData($query);
			if($copyright){
				while($result = $copyright->fetch_assoc()){?>
		<p><span style="color: #FFFFFF">&copy; <?php echo $result['footernote']; echo " ".date('Y');?></span></p>
		<?php } } ?>
	</div>