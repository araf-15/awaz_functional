<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php
    $sliderId = mysqli_real_escape_string($db->link, $_GET['sliderid']);
    if(!isset($sliderId) || $sliderId == NULL){
        echo "<script>window.location = 'sliderlist.php';</script>";
        // header("Location: postlist.php");
    }else{
        $sliderid = $sliderId;
        $query = "SELECT * FROM tbl_slider WHERE id = '$sliderid'";
        $selectImage = $db->selectData($query);
        $delImg = $selectImage->fetch_assoc();

    }
 ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $title     = mysqli_real_escape_string($db->link, $_POST['title']);
                        $link  = mysqli_real_escape_string($db->link, $_POST['link']);

                        $permited = array('jpg', 'jpeg', 'gif', 'png');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];  

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $uniqueImage = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploadedImage = "upload/slider/".$uniqueImage;

                        if ($title == '' || $link == '') {
                            echo "<span class='error'>Field Must Not be empty...!!!!</span>";
                        }else{

                            if(!empty($file_name)){

                                if($file_size > 1048567){
                                    echo "<span class = 'error'>Image should be less then 4MB...!!!</span>";
                                }elseif(in_array($file_ext, $permited) === false){
                                    echo "<span class = 'error'>Image should be ".implode(', ', $permited)."</span>";
                                }else{
                                    // $query = "INSERT INTO tbl_post(catagory, title, body, image, author, tags, vdo) VALUES('', '', '', '', '', '', '')";

                                    $query = "UPDATE tbl_slider
                                              SET
                                              title     = '$title',
                                              image     = '$uploadedImage',
                                              link      = '$link'
                                              
                                              WHERE id  = '$sliderid'";

                                    $updatedRow = $db->updateData($query);
                                    if ($updatedRow) {
                                        unlink($delImg['image']);
                                        move_uploaded_file($file_temp, $uploadedImage);
                                        echo "<span class = 'success'>Slider Updated Successfully...!!!</span>";
                                    }else{
                                        echo "<span class = 'error'>Slider Not updated...!!!</span>";
                                }
                            }
                        }else{
                            $query = "UPDATE tbl_slider
                                      SET
                                      title     = '$title',
                                      link      = '$link'

                                      WHERE id  = '$sliderid'";
                                $updatedRow = $db->updateData($query);
                                if($updatedRow){
                                    echo "<span class = 'success'>Slider Updated Successfully...!!!</span>";
                                }else{
                                    echo "<span class = 'error'>Slider Not updated...!!!</span>";
                                }
                            }
                        }    
                    } 
            ?>


                <div class="block">

<?php 
    $query   = "SELECT * FROM tbl_slider WHERE id = '$sliderid'";
    $getslider = $db->selectData($query);
    if($getslider){
        while ($sliderResult = $getslider->fetch_assoc()) {
?>           
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $sliderResult['title']; ?>" class="medium" />
                            </td>
                        </tr>
                     

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $sliderResult['image']; ?>" height="100px" width="250px"></br>
                                <input type="file" name = "image"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Link</label>
                            </td>
                            <td>
                                <input type="text" name="link" value="<?php echo $sliderResult['link']; ?>" class="medium" />
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update Slider" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php }}else{
                header("Location: postlist.php");
            } ?>

                </div>
            </div>
        </div>
<!--Load TinyMCE  -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>
<!--Load TinyMCE  -->

    <?php include 'inc/adfooter.php'; ?>