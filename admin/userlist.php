<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>

                <?php
                	if(isset($_GET['deluser'])){
                		$delUsrId = mysqli_real_escape_string($db->link, $_GET['deluser']);
                		$delQuery = "DELETE FROM tbl_user WHERE id='$delUsrId'";
                		$delData = $db->deleteData($delQuery);
                		if($delData){
                			echo "<span class='success'>User Deleted Successfully...!!!</span>";
                		}else{
                			echo "<span class='error'>User Not Deleted...!!!</span>";
                		}

                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM tbl_user ORDER BY id DESC";
							$user = $db->selectData($query);
							if($user){
								$i = 0;
								while ($result = $user->fetch_assoc()) {
									$i++;
						?>

						<tr class="odd gradeX" style="text-align: inherit;">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textShorten($result['details'], 25);?></td>
							<td>
								<?php
								 	if($result['role'] == 0){
								 		echo "Admin";
								 	}elseif ($result['role'] == 1) {
								 		echo "Author";
								 	}elseif($result['role'] == 2){
								 		echo "Editor";
								 	}
								 ?>
									
							</td>

							<td><a href="viewuser.php?userId=<?php echo $result['id']; ?>">View</a>
							<?php
								if(Session::get('userId') == $result['id'] || Session::get('userRole') == 0){?>
							 || <a onclick="return confirm('Are you sure to Delete this Category...!!!')"; href="?deluser=<?php echo $result['id']; ?>">Delete</a></td>
							 <?php } ?>
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