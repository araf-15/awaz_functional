<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<style>
    .delAction{margin-left: 30px;}
    .delAction a{border: 1px solid #ddd;color: #444;cursor: pointer; font-size: 20px;padding: 2px 10px;font-weight: normal; background: #DDDDDD;color: #444466;     
    }
</style>

<?php
    $msgId = mysqli_real_escape_string($db->link, $_GET['msgid']);
    if(!isset($msgId) || $msgId == NULL){
         //header("Location: inbox.php");
        echo "<script> window. location = 'inbox.php';</script>";
    }else{
        $id = $msgId;
    }
?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Messages</h2>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //header("Location: inbox.php");
                        echo "<script> window. location = 'inbox.php';</script>";
                    }
                ?>


                <div class="block">

                <?php 
                    $query = "SELECT * FROM tbl_contact WHERE id = '$id'";
                    $msg   = $db->selectData($query);
                    if($msg){
                        while ($result = $msg->fetch_assoc()) {?>



                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <!-- <input type="text" class="medium" /> -->
                                <span><?php echo $result['firstname']." ".$result['lastname']; ?></span>
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
                                <label>Date</label>
                            </td>
                            <td>
                                <!-- <input type="text" class="medium" /> -->
                                <span><?php echo $fm->formatDate($result['date']); ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <!-- <textarea class="tinymce" name="body"></textarea> -->
                                <span><?php echo $result['body']; ?></span>
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                                <span class="delAction"><a  href="replaymsg.php?msgid=<?php echo $result['id'];  ?>">Replay</a></span>
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