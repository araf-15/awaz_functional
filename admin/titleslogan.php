<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php 
    if(!Session::get('userRole') == 0){
        echo "<script>window.location = 'index.php';</script>";
    }
?>

<style>
    .leftSide{float: left; width: 70%;}
    .rightSide{float: right; width: 20%;}
    .rightSide img{height: 160px; width: 150px;}
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $title  =  $fm->validation($_POST['title']);
                        $slogan =  $fm->validation($_POST['slogan']);

                        $title   = mysqli_real_escape_string($db->link, $title);
                        $slogan  = mysqli_real_escape_string($db->link, $slogan);
                        

                        $permited = array('png');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];  

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $sameImage = 'logo'.'.'.$file_ext;
                        $uploadedImage = "upload/logo/".$sameImage;

                        if ($title == '' || $slogan == '') {
                            echo "<span class='error'>Field Must Not be empty...!!!!</span>";
                            if($video == ''){
                                $video = "No Link";
                            }
                        }else{

                            if(!empty($file_name)){

                                if($file_size > 1048567){
                                    echo "<span class = 'error'>Image should be less then 4MB...!!!</span>";
                                }elseif(in_array($file_ext, $permited) === false){
                                    echo "<span class = 'error'>Image should be ".implode(', ', $permited)." format only"."</span>";
                                }else{
                                    // $query = "INSERT INTO tbl_post(catagory, title, body, image, author, tags, vdo) VALUES('', '', '', '', '', '', '')";

                                    $query = "UPDATE title_slogan
                                              SET
                                              title = '$title',
                                              slogan = '$slogan',
                                              image = '$uploadedImage'
                                              WHERE id = '1'";

                                    $updatedRow = $db->updateData($query);
                                    if ($updatedRow) {
                                        // unlink($delImg['image']);
                                        move_uploaded_file($file_temp, $uploadedImage);
                                        echo "<span class = 'success'>Title, Slogan and Logo Updated Successfully...!!!</span>";
                                    }else{
                                        echo "<span class = 'error'>Title, Slogan and Logo Not updated...!!!</span>";
                                }
                            }
                        }else{
                            $query = "UPDATE title_slogan
                                      SET
                                      title = '$title',
                                      slogan = '$slogan'
                                      WHERE id = '1'";
                                $updatedRow = $db->updateData($query);
                                if($updatedRow){
                                    echo "<span class = 'success'>Title and Slogan Updated Successfully...!!!</span>";
                                }else{
                                    echo "<span class = 'error'>Title and Slogan Not updated...!!!</span>";
                                }
                            }
                        }    
                    } 
                ?>

            <div class="block sloginblock">
            <?php
                $query = "SELECT * FROM title_slogan WHERE id = '1'";
                $blog_title = $db->selectData($query);
                if($blog_title){
                    while ($result = $blog_title->fetch_assoc()) {?>
            

            <div class="leftSide">            
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title']; ?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan']; ?>" name="slogan" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="rightSide">
                <img src="<?php echo $result['image']; ?>" alt="logo" />
            </div>
        </div>
    </div>
    <?php }} ?>
</div>
    
    <?php include 'inc/adfooter.php'; ?>