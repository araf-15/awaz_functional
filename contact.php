<?php include 'inc/header.php'; ?>

<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fName = $fm->validation($_POST['firstname']);
		$lName = $fm->validation($_POST['lastname']);
		$email = $fm->validation($_POST['email']);
		$body  = $fm->validation($_POST['body']);

		$fName = mysqli_real_escape_string($db->link, $fName);
		$lName = mysqli_real_escape_string($db->link, $lName);
		$email = mysqli_real_escape_string($db->link, $email);
		$body  = mysqli_real_escape_string($db->link, $body);

		$errormsg = '';
		$successmsg = '';
		if(empty($fName)){
			$errormsg = "First Name Must not be empty...!!!";
		}elseif(empty($lName)){
			$errormsg = "Last Name Must not be empty...!!!";
		}elseif (empty($email)) {
			$errormsg = "Email Field Must not be empty...!!!";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errormsg = "Invalid Email Address...!!!";
		}elseif (empty($body)) {
			$errormsg = "Message body must not be empty...!!!";
		}else{
			$query = "INSERT INTO tbl_contact(firstname, lastname, email, body) VALUES ('$fName', '$lName', '$email', '$body')";
			$insertData = $db->insertData($query);
			if($insertData){
				$successmsg = "Message Sent Successfully....!!!";
			}else{
				$errormsg = "Message not Sent...!!!";
			}
		}

	}

?>

	<div class="contentSection templete">
		<div class="mainContent templete">
			<div class="about">
				<h2>Contact Us</h2>
				<?php
					if(isset($errormsg)){
						echo "<span style = 'color: red'>$errormsg</span>";
					}
					if (isset($successmsg)) {
						echo "<span style = 'color: green'>$successmsg</span>";
					}
				 ?>
					<form action="" method="post">
						<table>
						<tr>
							<td>Your First Name:</td>
							<td><p><input type="text" name="firstname" placeholder="Enter First Name" required="1"></p></td>
						</tr>

						<tr>
							<td>Your Last Name:</td>
							<td><p><input type="text" name="lastname" placeholder="Enter Last Name" required="1"></p></td>
						</tr>
						<tr>
							<td>Your Email Address:</td>
							<td><p><input type="email" name="email" placeholder="Enter Email" required="1" ></p></td>
						</tr>
						<tr>
							<td>Your Message:</td>
							<td><p><textarea placeholder="Write your Message" name="body" required="1"></textarea></p></td>
						</tr>
						<tr>
							<td></td>
							<td><p><input type="submit" name="submit" value="Send"></p></td>
						</tr>
					</table>
					</form>
					
			</div>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

		<?php include 'inc/footer.php'; ?>
		<?php include 'inc/socialicon.php'; ?>


	
</body>
</html>