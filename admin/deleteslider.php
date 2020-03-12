<?php
	include '../lib/Session.php';
    Session:: checkSession();

    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/formate.php';

     $db     = new Database();
?>

<?php
	$sliderId = mysqli_real_escape_string($db->link, $_GET['sliderid']);
	if(!isset($sliderId) || $sliderId == NULL){
		echo "<script>window.location = 'sliderlist.php';</script>";
	}else{
		$sliderId = $sliderId;

		$query = "SELECT * FROM tbl_slider WHERE id = '$sliderId'";
		$getData = $db->selectData($query);
		if($getData){
			while ($delImage = $getData->fetch_assoc()) {
				$delLink = $delImage['image'];
				unlink($delLink);
			}
		}

		$delQuery = "DELETE FROM tbl_slider WHERE id = '$sliderId'";
		$delData = $db->deleteData($delQuery);
		if($delData){
			echo "<script>alert('Slider Deleted Successfully...!!!');</script>";
			echo "<script>window.location = 'sliderlist.php';</script>";
		}else{
			echo "<script>alert('Slider Not Deleted...!!!');</script>";
			echo "<script>window.location = 'sliderlist.php';</script>";
		}
	}

?>