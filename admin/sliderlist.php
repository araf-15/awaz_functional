<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No</th>
							<th>Slider Title</th>
							<th>Slider Image</th>
							<th>Slider Link</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							$query = "SELECT * FROM tbl_slider ORDER BY id DESC";

							$slider = $db->selectData($query);
							if($slider){
								$i = 0;
								while($result = $slider->fetch_assoc()){
									$i++;?>

						<tr class="odd gradeX">
							<td style="text-align: center;"><?php echo $i; ?></td>

							<td><?php echo $result['title']; ?></td>
							<td><img src="<?php echo $result['image'];?>" height="40px" width = "60px"/></td>
							<td><?php echo $result['link']; ?></td>

							<td>
								
								<?php if(Session::get('userRole') == 0){ ?>
								<a href="editslider.php?sliderid=<?php echo $result['id']; ?>">Edit</a> 
								|| 
								<a onclick="return confirm('Are you sure to delete this Post...!!!');" href="deleteslider.php?sliderid=<?php echo $result['id']; ?>">Delete</a>
								<?php } ?>
							</td>
						</tr>
						<?php }}  ?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    
   <?php include 'inc/adfooter.php'; ?>