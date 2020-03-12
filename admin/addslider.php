<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Slider</h2>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $title     = mysqli_real_escape_string($db->link, $_POST['title']);
                        $link      = mysqli_real_escape_string($db->link, $_POST['link']);
                        

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
                        }elseif($file_size > 1048567){
                            echo "<span class = 'error'>Image should be less then 4MB...!!!</span>";
                        }elseif(in_array($file_ext, $permited) === false){
                            echo "<span class = 'error'>Image should be ".implode(', ', $permited)." Only"."</span>";
                        }else{
                            $query = "INSERT INTO tbl_slider(title, image, link) VALUES('$title', '$uploadedImage', '$link')";
                            $insertPost = $db->insertData($query);
                            if ($insertPost) {
                                echo "<span class = 'success'>Slider Inserted Successfully...!!!</span>";
                                move_uploaded_file($file_temp, $uploadedImage);
                            }else{
                                echo "<span class = 'error'>Slider not Inserted...!!!</span>";
                        }
                    } 
                }
                ?>


                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name = "image"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Link</label>
                            </td>
                            <td>
                                <input type="text" name="link"  placeholder="Enter Link" class="medium" />
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Add Slider" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    <?php include 'inc/adfooter.php'; ?>
