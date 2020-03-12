<?php
	include '../lib/Session.php';
	Session::checkLogin(); 
?>

<?php 
	include '../config/config.php';
	include '../lib/Database.php';
	include '../helpers/formate.php';
?>

<?php
	$db 	= new Database();
	$fm 	= new formate(); 
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$email = $fm->validation($_POST['email']);
				$email = mysqli_real_escape_string($db->link, $email);
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					echo "<span style='color: red'>Invalid Email Address</span>";
				}else{
					$mailQuery = "SELECT * FROM tbl_user WHERE email = '$email' LIMIT 1";
					$mailCheck = $db->selectData($mailQuery); 
					if($mailCheck){
						while($value = $mailCheck->fetch_assoc()){
							$userid 	= $value['id'];
							$username 	= $value['username'];
						}
						$text 	 = substr($email, 0, 3);
						$rand 	 = rand(10000, 99999);
						$newpass = "$text$rand";
						$password = md5($newpass);
						$updatePassQuery = "UPDATE tbl_user
											SET
											password = '$password'
											WHERE id = '$userid'";
						$updateRow = $db->updateData($updatePassQuery);

						$to = $email;
						$from = "araf.hasan15@gmail.com";
						$subject = "Recover password of Awaz";
						$message = "<p>Your User name is: ".$username." and Password is: ".$newpass."\nNow Login With you New Password...!!!</p>";
						$headers[] = "MIME-Version: 1.0";
						$headers[] = "Content-type: text/html; charset=iso-8859-1";
						$headers[] = "From: $from"; 

						$sendMail = mail($to, $subject, $message, implode("\r\n", $headers));
						if($sendMail){
							echo "<span style = 'color: green; font-size: 18px'>Please Check your Email for new Password...!!!</span>";
						}else{
							echo "<span style ='color: red; font-size: 18px;'>Email Not Sent...!!!</span>";
						}
					}else{
						echo "<span style ='color: red; font-size: 18px;'>Email Not Exist...!!!</span>";
					}
				}
			}
		?>
		<form action="" method="post">
			<h1>Recover Password</h1>
			
			<div>
				<!-- <input type="email" placeholder="Enter Valid Email" required="" name="email"/> -->
				<input type="text" placeholder="Enter Valid Email" required="" name="email"/>
			</div>

			<div>
				<input type="submit" value="Send Email" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login !!!</a>
		</div>
		<div class="button">
			<a href="http://localhost/practice_Space/awaz/">&copy;Awaz</a>
		</div>
		<!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>