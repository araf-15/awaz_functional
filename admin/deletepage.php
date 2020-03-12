<?php
	include '../lib/Session.php';
    Session:: checkSession();

    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/formate.php';

     $db     = new Database();
?>

<?php
	$pageId = mysqli_real_escape_string($db->link, $_GET['delpageid']);
	if(!isset($pageId) || $pageId == NULL){
		echo "<script>window.location = 'index.php';</script>";
	}else{
		$pageid = $pageId;

		$delQuery = "DELETE FROM tbl_pages WHERE id = '$pageid'";
		$delData = $db->deleteData($delQuery);

		if($delData){
			echo "<script>alert('Page Deleted Successfully...!!!');</script>";
			echo "<script>window.location = 'index.php';</script>";
		}else{
			echo "<script>alert('Page Not Deleted...!!!');</script>";
			echo "<script>window.location = 'index.php';</script>";
		}
	}

?>