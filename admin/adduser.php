<?php include 'inc/adheader.php'; ?>
<?php include 'inc/adsidebar.php'; ?>

<?php
    if(!Session::get('userRole') == 0){
        echo "<script>window.location = 'index.php';</script>";
    }

?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $userName = $fm->validation($_POST['username']);
       $password = $fm->validation(md5($_POST['password']));
       $email    = $fm->validation($_POST['email']);
       $role     = $fm->validation($_POST['role']);

       $userName = mysqli_real_escape_string($db->link, $userName);
       $password = mysqli_real_escape_string($db->link, $password);
       $email    = mysqli_real_escape_string($db->link, $email);
       $role     = mysqli_real_escape_string($db->link, $role);




        if(empty($userName) || empty($password)|| empty($role) || empty($email)){
            echo "<span class='error'>Field Must not be Empty...!!!</span>";
        }else{
            $mailQuery = "SELECT * FROM tbl_user WHERE email = '$email' LIMIT 1";
            $mailCheck = $db->selectData($mailQuery);
            if($mailCheck){
                echo "<span class='error'>Email Already Exist...!!!</span>";
            }else{
                $query = "INSERT INTO tbl_user(name, username, password, email, details, role ) VALUES('','$userName', '$password', '$email', '', '$role')";
                $userInsert = $db->insertData($query);
                if($userInsert){
                    echo "<span class='success'>User Created Successfully...!!!</span>";
                    
                }else{
                    echo "<span class='error'>User not created...!!!</span>";
                }
            }

        } 
    }
?>

                 <form action="" method="post">
                    <table class="form">			
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name='username' placeholder="Enter Username..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name='password' placeholder="Enter Password..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" name='email' placeholder="Enter Valid Email..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option>---Select User Role---</option>
                                    <option value="0" >Admin</option>
                                    <option value="1" >Author</option>
                                    <option value="2" >Editor</option>
                                </select>
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

<?php include 'inc/adfooter.php'; ?>


<!-- $tag = "";
                    if($role == 0){
                        $tag = 'Admin';
                    }elseif($role == 1){
                        $tag = 'Author';
                    }elseif($role == 2){
                        $tag = 'Editor';
                    }

                    $to      = $email;
                    $from    = "araf.hasan15@gmail.com";
                    $subject = "Request for being a user of Awaz";
                    $message = "
                                <p>Hello, <strong>$userName</strong> it's your honur that the admin of Awaz <strong>Md. Araf Hasan</strong> approved you as an <strong>$tag</strong></br>Your username: <strong>$userName</strong></br>Password     : <strong>$password</strong></br> go to this <a href='http://sparkaraf.000webhostapp.com/admin/login.php'>link</a> and Login with your Username and Password</p>";

                    $headers[] = "MIME-Version: 1.0";
                    $headers[] = "Content-type: text/html; charset=iso-8859-1";
                    $headers[] = "From: $from";
                    $sendMail = mail($to, $subject, $message, implode("\r\n", $headers)); -->