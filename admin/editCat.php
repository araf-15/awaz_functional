<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>


<?php
    $catagoryId = mysqli_real_escape_string($db->link, $_GET['catId']);
    if(!isset($catagoryId) || $catagoryId == NULL){
        // header("Location: catlist.php");
        echo "<script>window.location = 'catlist.php'; </script>";
    }else{
        $catId = $catagoryId;
    }

 ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 


<!-- Update The Catagory which is fetched -->
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($db->link, $name);
        if(empty($name)){
            echo "<span class='error'>Field Must not be Empty...!!!</span>";
        }else{
            $query = "UPDATE tbl_catagory
                        SET
                        name = '$name' 
                        WHERE id = '$catId'";
            $catUpdate = $db->insertData($query);
            if($catUpdate){
                echo "<span class='success'>Catagory Updated Successfully...!!!</span>";
            }else{
                echo "<span class='error'>Catagory Not Updated Successfully...!!!</span>";
            }
        }
    }
?>

<!-- Fetch the catagry by their ID and Show them on the text box -->
    <?php
        $query = "SELECT * FROM  tbl_catagory WHERE id = '$catId' ORDER BY id DESC";
        $catagory = $db->selectData($query);
        if($catagory){
            while($result = $catagory->fetch_assoc()){
     ?>


                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name='name' value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}else{
                        echo "<script>window.location = 'catlist.php'; </script>";
                    } ?>

                </div>
            </div>
        </div>

<?php include 'inc/adfooter.php'; ?>