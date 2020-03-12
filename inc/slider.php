<div class="slidersection templete">
		<div id="slider">
			<?php
				$query = "SELECT * FROM  tbl_slider ORDER BY id DESC LIMIT 5";
				$slider = $db->selectData($query);
				if($slider){
					while ($result = $slider->fetch_assoc()) {?>
						<a href="<?php echo $result['link']; ?>"><img src="<?php echo "admin/".$result['image']; ?>" alt="<?php echo $result['title']; ?>" title="<?php echo $result['title']; ?>" /></a>
			<?php	} } ?>
        </div>
	</div>


















<!-- 
	<a href="#"><img src="images/slideshow/01.jpg" alt="nature 1" title="It could have been better" /></a>
            <a href="#"><img src="images/slideshow/02.jpg" alt="nature 2" title="A society 'encouraged to hate'" /></a>
            <a href="#"><img src="images/slideshow/03.jpg" alt="nature 3" title="It is Pakistan's proxy war with Chinese help" /></a>
            <a href="#"><img src="images/slideshow/04.jpg" alt="nature 4" title="Solving salinity" /></a> -->