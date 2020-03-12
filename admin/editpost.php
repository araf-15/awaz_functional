<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php
    $postId = mysqli_real_escape_string($db->link, $_GET['editpostid']);
    if(!isset($postId) || $postId == NULL){
        echo "<script>window.location = 'postlist.php';</script>";
        // header("Location: postlist.php");
    }else{
        $postid = $postId;
        $query = "SELECT * FROM tbl_post WHERE id = '$postid'";
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
                        $catagory  = mysqli_real_escape_string($db->link, $_POST['catagory']);
                        //$image     = mysqli_real_escape_string($db->link, $_POST['image']);
                        $body      = mysqli_real_escape_string($db->link, $_POST['body']);
                        $tags      = mysqli_real_escape_string($db->link, $_POST['tags']);
                        $author    = mysqli_real_escape_string($db->link, $_POST['author']);
                        $video     = mysqli_real_escape_string($db->link, $_POST['vdo']);
                        $userId    = mysqli_real_escape_string($db->link, $_POST['userid']);

                        $permited = array('jpg', 'jpeg', 'gif', 'png');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];  

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $uniqueImage = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploadedImage = "upload/post/".$uniqueImage;

                        if ($title == '' || $catagory == '' || $body == '' || $tags == '' || $author == '') {
                            echo "<span class='error'>Field Must Not be empty...!!!!</span>";
                            if($video == ''){
                                $video = "No Link";
                            }
                        }else{

                            if(!empty($file_name)){

                                if($file_size > 1048567){
                                    echo "<span class = 'error'>Image should be less then 4MB...!!!</span>";
                                }elseif(in_array($file_ext, $permited) === false){
                                    echo "<span class = 'error'>Image should be ".implode(', ', $permited)."</span>";
                                }else{
                                    // $query = "INSERT INTO tbl_post(catagory, title, body, image, author, tags, vdo) VALUES('', '', '', '', '', '', '')";

                                    $query = "UPDATE tbl_post
                                              SET
                                              catagory  = '$catagory',
                                              title     = '$title',
                                              body      = '$body',
                                              image     = '$uploadedImage',
                                              author    = '$author',
                                              tags      = '$tags',
                                              vdo       = '$video',
                                              userid    = '$userId'
                                              WHERE id  = '$postid'";

                                    $updatedRow = $db->updateData($query);
                                    if ($updatedRow) {
                                        unlink($delImg['image']);
                                        move_uploaded_file($file_temp, $uploadedImage);
                                        echo "<span class = 'success'>Post Updated Successfully...!!!</span>";
                                    }else{
                                        echo "<span class = 'error'>Post Not updated...!!!</span>";
                                }
                            }
                        }else{
                            $query = "UPDATE tbl_post
                                      SET
                                      catagory  = '$catagory',
                                      title     = '$title',
                                      body      = '$body',
                                      author    = '$author',
                                      tags      = '$tags',
                                      vdo       = '$video',
                                      userid    = '$userId'
                                      WHERE id  = '$postid'";
                                $updatedRow = $db->updateData($query);
                                if($updatedRow){
                                    echo "<span class = 'success'>Post Updated Successfully...!!!</span>";
                                }else{
                                    echo "<span class = 'error'>Post Not updated...!!!</span>";
                                }
                            }
                        }    
                    } 
            ?>


                <div class="block">

<?php 
    $query   = "SELECT * FROM tbl_post WHERE id = '$postid'";
    $getpost = $db->selectData($query);
    if($getpost){
        while ($postResult = $getpost->fetch_assoc()) {
?>           
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $postResult['title']; ?>" class="medium" />
                            </td>
                        </tr>
                     


                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="catagory">
                                    <option>---Select Catagory---</option>
                                <?php
                                    $query = "SELECT * FROM tbl_catagory";
                                    $catagory = $db->selectData($query);
                                    if($catagory){
                                        while($result = $catagory->fetch_assoc()){
                                ?>
                                    <option
                                    <?php
                                        if($postResult['catagory'] == $result['id']){?>
                                            selected
                                       <?php }?>
                                     value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>

                                <?php }}  ?>
                                </select>
                            </td>
                        </tr>
                   

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postResult['image']; ?>" height="50px" width="100px"></br>
                                <input type="file" name = "image"/>
                            </td>
                        </tr>


                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $postResult['body']; ?>
                                </textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $postResult['tags']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $postResult['author']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Video Link</label>
                            </td>
                            <td>
                                <input type="text" name="vdo" value="<?php echo $postResult['vdo']; ?>" class="medium" />
                                <input type="hidden" name="userid" value="<?php echo Session::get('userId'); ?>">
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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





     <!-- <tr>
                            <td>
                                <label>Date Picker</label>
                            </td>
                            <td>
                                <input type="text" id="date-picker" />
                            </td>
                        </tr> -->