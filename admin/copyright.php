<?php include 'inc/adheader.php';?>
<?php include 'inc/adsidebar.php'; ?>

<?php 
    if(!Session::get('userRole') == 0){
        echo "<script>window.location = 'index.php';</script>";
    }
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $copyright = $fm->validation($_POST['footernote']);
                    $copyright = mysqli_real_escape_string($db->link, $copyright);
                    
                    if($copyright == ""){
                        echo "<span class = 'error'>Field Must not be empty...!!!</span>";
                    }else{
                        $query = "UPDATE  tbl_footer
                                SET
                                footernote = '$copyright'
                                WHERE id = '1'";
                        $update_row = $db->updateData($query);
                        if($update_row){
                            echo "<span class = 'success'>Data Updated Successfully...!!!</span>";
                        }else{
                            echo "<span class = 'error'>Data Not Updated...!!!</span>";
                        }
                    }
                }

                ?>



                <div class="block copyblock">
                <?php
                    $query = "SELECT * FROM tbl_footer WHERE id = '1'";
                    $footerNote = $db->selectData($query);
                    if($footerNote){
                        while ($result = $footerNote->fetch_assoc()) {?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['footernote']; ?>" name="footernote" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } } ?>
                </div>
            </div>
        </div>

    <?php include 'inc/adfooter.php'; ?>