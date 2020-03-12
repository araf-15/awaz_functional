<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<style>
    .delAction{margin-left: 30px;}
    .delAction a{border: 1px solid #ddd;color: #444;cursor: pointer; font-size: 20px;padding: 2px 10px;font-weight: normal; background: #DDDDDD;color: #444466;     
    }
</style>

<?php
    $userId = mysqli_real_escape_string($db->link, $_GET['userId']);
    if(!isset($userId) || $userId == NULL){
         //header("Location: inbox.php");
        echo "<script> window. location = 'userlist.php';</script>";
    }else{
        $id = $userId;
    }
?>


<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<script>window.location = 'userlist.php';</script>";
}

?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>User Details</h2>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //header("Location: inbox.php");
                        echo "<script> window. location = 'inbox.php';</script>";
                    }
                ?>


                <div class="block">

                <?php 
                    $query = "SELECT * FROM tbl_user WHERE id = '$id'";
                    $user   = $db->selectData($query);
                    if($user){
                        while ($result = $user->fetch_assoc()) {?>



                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <!-- <input type="text" class="medium" /> -->
                                <span><?php echo $result['name']; ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <!-- <input type="text" class="medium" /> -->
                                <span><?php echo $result['username']; ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <!-- <input type="text" class="medium" /> -->
                                <span><?php echo $result['email']; ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Detail</label>
                            </td>
                            <td>
                                <!-- <input type="text" class="medium" /> -->
                                <span><?php echo $result['details']; ?></span>
                            </td>
                        </tr>

                    


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
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