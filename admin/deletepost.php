<?php
	include '../lib/Session.php';
    Session:: checkSession();

    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/formate.php';

     $db     = new Database();
?>

<?php
	$delpostId = mysqli_real_escape_string($db->link, $_GET['delpostid']);
	if(!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL){
		echo "<script>window.location = 'postlist.php';</script>";
	}else{
		$postId = $delpostId;

		$query = "SELECT * FROM tbl_post WHERE id = '$postId'";
		$getData = $db->selectData($query);
		if($getData){
			while ($delImage = $getData->fetch_assoc()) {
				$delLink = $delImage['image'];
				unlink($delLink);
			}
		}

		$delQuery = "DELETE FROM tbl_post WHERE id = '$postId'";
		$delData = $db->deleteData($delQuery);
		if($delData){
			echo "<script>alert('Data Deleted Successfully...!!!');</script>";
			echo "<script>window.location = 'postlist.php';</script>";
		}else{
			echo "<script>alert('Data Not Deleted...!!!');</script>";
			echo "<script>window.location = 'postlist.php';</script>";
		}
	}

?>