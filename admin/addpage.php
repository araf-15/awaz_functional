<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php 
    if(!Session::get('userRole')==0){
        echo "<script>window.location = 'index.php';</script>";
    }

?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $name     = mysqli_real_escape_string($db->link, $_POST['name']);
                        $body     = mysqli_real_escape_string($db->link, $_POST['body']);


                        if ($name == '' || $body == '') {
                            echo "<span class='error'>Field Must Not be empty...!!!!</span>";
                        }else{
                            $query = "INSERT INTO tbl_pages(name, body) VALUES('$name', '$body')";
                            $createPage = $db->insertData($query);
                            if ($createPage) {
                                echo "<span class = 'success'>Page Created Successfully...!!!</span>";
                            }else{
                                echo "<span class = 'error'>Page not Created...!!!</span>";
                        }
                    } 
                }
                ?>


                <div class="block">               
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter Page Name..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
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