<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php
    $pageid = mysqli_real_escape_string($db->link, $_GET['pageid']);
    if(!isset($pageid) || $pageid == NULL){
        header("Location: index.php");
    }else{
        $id = $pageid;
    }
?>
<style>
    .delAction{margin-left: 30px;}
    .delAction a{border: 1px solid #ddd;color: #444;cursor: pointer; font-size: 20px;padding: 2px 10px;font-weight: normal; background: #ff1b1b;color: #FFF;     
    }
</style>



        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Edit This Page</h2>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $name     = mysqli_real_escape_string($db->link, $_POST['name']);
                        $body  = mysqli_real_escape_string($db->link, $_POST['body']);


                        if ($name == '' || $body == '') {
                            echo "<span class='error'>Field Must Not be empty...!!!!</span>";
                        }else{
                            $query = "UPDATE tbl_pages
                                     SET 
                                     name = '$name',
                                     body = '$body'
                                     WHERE id = '$id'
                                    ";
                            
                            $updatePage = $db->updateData($query);
                            if ($updatePage) {
                                echo "<span class = 'success'>Page Updated Successfully...!!!</span>";
                            }else{
                                echo "<span class = 'error'>Page not Updated...!!!</span>";
                        }
                    } 
                }
                ?>


                <div class="block">
                <?php
                    $query = "SELECT * FROM tbl_pages WHERE id = '$id'";
                    $pages = $db->selectData($query);
                    if($pages){
                        while ($result = $pages->fetch_assoc()) {?>             
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $result['body']; ?>
                                </textarea>
                            </td>
                        </tr>


                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="delAction"><a onclick="return confirm('Are you sure to delete this Page...!!!'); " href="deletepage.php?delpageid=<?php echo $result['id'];  ?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } } ?>
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