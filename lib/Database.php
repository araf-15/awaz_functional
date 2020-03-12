<?php
	/**
	* Database Class
	*/
	class Database
	{

		public $host 	= DB_HOST;
		public $user 	= DB_USER;
		public $pass 	= DB_PASS;
		public $dbName 	= DB_NAME;

		public $link, $error;
		
		function __construct(){
			$this->connectDB();
		}

		private function connectDB(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbName);
			$this->link->set_charset("utf8");
			if (!$this->link) {
				$this->error = "Connection Failed".$this->link->connect_error;
				return false;
			}
		}


		//Read Data
		public function selectData($data){
			$result = $this->link->query($data) or die ($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			}else{
				return false;
			}
		}


		//Insert Data
		public function insertData($data){
			$insertInfo = $this->link->query($data) or die ($this->link->error.__LINE__);
			if ($insertInfo) {
				// header("Location: index.php?msg=".urlencode('Data Inserted Successfully'));
				// exit();
				return $insertInfo;
			}else{
				// die("Error: (".$this->link->errno.")".$this->link->error);
				return false;
			}
		}

		//Update Data
		public function updateData($data){
			$update_info = $this->link->query($data) or die($this->link->error.__LINE__);
			if ($update_info) {
				// header("Location: index.php?msg=".urlencode('Data Updated Successfully'));
				// exit();
				return $update_info;
			}else{
				// die("Error:(".$this->link->errno.")".$this->link->error);
				return false;
			}
		}

		//Delete Data
		public function deleteData($data){
			$del_info = $this->link->query($data) or die ($this->link->error.__LINE__);
			if ($del_info) {
				// header("Location: index.php?msg=".urlencode('Data Deleted Successfully'));
				return $del_info;
			}else{
				// die("Error:(".$this->link->errno.")".$this->link->error);
				return false;
			}
		}
	}

?>