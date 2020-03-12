<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php
   $userId     = Session::get('userId');
   $userRole   = Session::get('userRole');
 ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Profile</h2>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $name       = mysqli_real_escape_string($db->link, $_POST['name']);
                        $username   = mysqli_real_escape_string($db->link, $_POST['username']);
                        //$image     = mysqli_real_escape_string($db->link, $_POST['image']);
                        $email      = mysqli_real_escape_string($db->link, $_POST['email']);
                        $details    = mysqli_real_escape_string($db->link, $_POST['details']);
                        
                                    // $query = "INSERT INTO tbl_post(catagory, title, body, image, author, tags, vdo) VALUES('', '', '', '', '', '', '')";
                                if(empty($name) || empty($username) || empty($email) || empty($details)){
                                        echo "<span class = 'error'>Field must not be empty...!!!</span>";

                                    }else{
                                        $query = "UPDATE tbl_user
                                                  SET
                                                  name = '$name',
                                                  username = '$username',
                                                  email = '$email',
                                                  details = '$details'
                                                  WHERE id = '$userId'";

                                                $updatedRow = $db->updateData($query);
                                                if($updatedRow){
                                                    echo "<span class='success'>Profile Updated Successfully...!!! </span>";
                                                }else{
                                                    echo "<span class='error'>Profile can not be updated...!!!</span>";
                                                }
                                    }
                                    /*if ($updatedRow) {
                                        unlink($delImg['image']);
                                        move_uploaded_file($file_temp, $uploadedImage);
                                        echo "<span class = 'success'>Post Updated Successfully...!!!</span>";
                                    }else{
                                        echo "<span class = 'error'>Post Not updated...!!!</span>";
                                }*/
                            }/*else{
                                $query = "UPDATE tbl_post
                                      SET
                                      catagory = '$catagory',
                                      title = '$title',
                                      body = '$body',
                                      author = '$author',
                                      tags = '$tags',
                                      vdo = '$video'
                                      WHERE id = '$postid'";
                                $updatedRow = $db->updateData($query);
                                if($updatedRow){
                                    echo "<span class = 'success'>Post Updated Successfully...!!!</span>";
                                }else{
                                    echo "<span class = 'error'>Post Not updated...!!!</span>";
                                }
                            }   */
            ?>


                <div class="block">

<?php 
    $query   = "SELECT * FROM tbl_user WHERE id = '$userId' AND role = '$userRole'";
    $getuser = $db->selectData($query);
    if($getuser){
        while ($result = $getuser->fetch_assoc()) {?>           
                 
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username']; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result['email']; ?>">
                            </td>
                        </tr>


                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">
                                    <?php echo $result['details']; ?>
                                </textarea>
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Updated" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php } }else{
                header("Location: index.php");
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