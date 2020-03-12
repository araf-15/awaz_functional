<?php include 'inc/adheader.php';?>
<?php include 'inc/adsidebar.php'; ?>


        
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

                <?php 
					if(isset($_GET['seenid'])){
						$seenid = mysqli_real_escape_string($db->link, $_GET['seenid']);
						$query = "UPDATE tbl_contact
								SET
								status = '1' 
								WHERE id = '$seenid'";
						$updateInbox = $db->updateData($query);
						if($updateInbox){
							echo "<span class = 'success'>Message send to seenbox</span>";
						}else{
							echo "<span class = 'error'>Message Can not send to seen box</span>";
						}
					}
				?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
							$query = "SELECT * FROM tbl_contact WHERE status = '0' ORDER BY id DESC";
							$msg = $db->selectData($query);
							if($msg){
								$i = 0;
								while ($result = $msg->fetch_assoc()) { $i++;?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td style="text-align: center;"><?php echo $result['firstname']." ".$result['lastname']; ?></td>
							<td style="text-align: center;"><?php echo ($result['email']); ?></td>
							<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
							<td style="text-align: center;"><?php echo $fm->formatDate($result['date']); ?></td>
							<td style="text-align: center;">
								<a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
								<a href="replaymsg.php?msgid=<?php echo $result['id']; ?>">Reply</a>||
								<a
									onclick = "return confirm('Are you sure to Move this Message...!!!')";
								 href="?seenid=<?php echo $result['id']; ?>">Seen</a>
							</td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>














            <div class="box round first grid">
                <h2>Seen Message Box</h2>
                <?php 
                	if(isset($_GET['unseenid'])){
                		$unseenId = mysqli_real_escape_string($db->link, $_GET['unseenid']);
                		$query = "UPDATE tbl_contact
                				  SET status = '0'
                				  WHERE id = '$unseenId'";
                		$updateInbox = $db->updateData($query);
                		if($updateInbox){
                			echo "<span class = 'success'>Message Send to the Inbox (Refresh this Page Please)</span>";
                		}else{
                			echo "<span class = 'error'>Message can not sent to the Inbox</span>";
                		}
                	}

                	if(isset($_GET['delid'])){
                		$delid = mysqli_real_escape_string($db->link, $_GET['delid']);
                		$query = "DELETE FROM tbl_contact WHERE id = '$delid'";
                		$delMsg = $db->updateData($query);
                		if($delMsg){
                			echo "<span class = 'success'>Message Deleted Successfully...!!!</span>";
                		}else{
                			echo "<span class = 'error'>Message can not Deleted...!!!!</span>";
                		}
                	}


                ?>



                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
							$query = "SELECT * FROM tbl_contact WHERE status = '1' ORDER BY id DESC";
							$msg = $db->selectData($query);
							if($msg){
								$i = 0;
								while ($result = $msg->fetch_assoc()) { $i++;?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td style="text-align: center;"><?php echo $result['firstname']." ".$result['lastname']; ?></td>
							<td style="text-align: center;"><?php echo ($result['email']); ?></td>
							<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
							<td style="text-align: center;"><?php echo $fm->formatDate($result['date']); ?></td>
							<td style="text-align: center;">
								<a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
								<a onclick= "return confirm('Are you Sure to send this message to the Inbox...!!!');" href="?unseenid=<?php echo $result['id']; ?>">Unseen</a>||
								<a
								 onclick = "return confirm('Are you sure to Delete this Message...!!!');" href="?delid=<?php echo $result['id']; ?>">Delete</a>
							</td>
						</tr>
						<?php } } ?>
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