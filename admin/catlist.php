<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php 
	if(!Session::get('userRole') == 0){
		echo "<script>window.location = 'index.php';</script>";
	}

?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

                <?php
                	if(isset($_GET['delCat'])){
                		$delCatId = mysqli_real_escape_string($db->link, $_GET['delCat']);
                		$delQuery = "DELETE FROM tbl_catagory WHERE id='$delCatId'";
                		$delData = $db->deleteData($delQuery);
                		if($delData){
                			echo "<span class='success'>Catagory Deleted Successfully...!!!</span>";
                		}else{
                			echo "<span class='error'>Catagory Not Deleted...!!!</span>";
                		}

                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM tbl_catagory ORDER BY id DESC";
							$catagory = $db->selectData($query);
							if($catagory){
								$i = 0;
								while ($result = $catagory->fetch_assoc()) {
									$i++;
						?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="editCat.php?catId=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete this Category...!!!')"; href="?delCat=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>

						<?php }} ?>
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