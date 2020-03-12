<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

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
                        $to         = $fm->validation($_POST['toEmail']);
                        $from       = $fm->validation($_POST['fromEmail']);
                        $subject    = $fm->validation($_POST['subject']);
                        $message    = $fm->validation($_POST['message']);

                        $headers[] = "MIME-Version: 1.0";
                        $headers[] = "Content-type: text/html; charset=iso-8859-1";
                        $headers[] = "From: $from"; 

                        $sendMail = mail($to, $subject, $message, implode("\r\n", $headers));

                        if($sendMail){
                            echo "<span class = 'success'>Message Sent Successfully...!!!</span>";
                        }else{
                            echo "<span class = 'error'>Message not Sent...!!!(Something went wrong)</span>";
                        }
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
                                <input type="text" value="<?php echo $result['firstname']." ".$result['lastname']; ?>" readonly class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['email']; ?>" name = 'toEmail' readonly class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromEmail" placeholder="Enter your Email Address" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Enter Subject" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message"></textarea>
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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