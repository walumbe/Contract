<?php
    class Contracts{
        private $host = "localhost";
        private $username = "root";
        private $password= "";
        private $db = "hono_contracts";
        public $connect;

        public function __construct(){
            $this->connect = new mysqli($this->host, $this->username, $this->password, $this->db);

            if(mysqli_connect_error()){
                die("Failed to connect!".mysqli_connect_error());
            }else {
                return $this->connect;
            }
        }

        // insert contract data into contracts table
		public function insertData($post){
			$start_date = $this->connect->real_escape_string($_POST['start_date']);
			$end_date = $this->connect->real_escape_string($_POST['end_date']);
			$description = $this->connect->real_escape_string($_POST['description']);
			$category = $this->connect->real_escape_string($_POST['category']);
			$phone_number = $this->connect->real_escape_string($_POST['phone_number']);
			$email_address = $this->connect->real_escape_string($_POST['email_address']);
			$status = $this->connect->real_escape_string($_POST['status']);
			$termination_date = $this->connect->real_escape_string($_POST['termination_date']);
			$reason_for_termination = $this->connect->real_escape_string($_POST['reason_for_termination']);
			$date_created = $this->connect->real_escape_string($_POST['date_created']);
			$query="INSERT INTO contracts(start_date,end_date,description,category,
            phone_number,email_address,status,termination_date,reason_for_termination,date_created) 
            VALUES('$start_date','$end_date','$description','$category', '$phone_number', '$email_address', '$status',
            '$termination_date', '$reason_for_termination','$date_created')";
			$sql = $this->connect->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg1=insert");
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch customer records for show listing
		public function displayData(){
		    $query = "SELECT * FROM contracts";
		    $result = $this->connect->query($query);
			if ($result->num_rows > 0) {
			    $data = array();
			    while ($row = $result->fetch_assoc()) {
			           $data[] = $row;
			    }
				 return $data;
			}else{
				 echo "No found records";
			}
		}

		// Fetch single data for edit from contracts table
		public function displyaRecordById($id){
		    $query = "SELECT * FROM contracts WHERE id = '$id'";
		    $result = $this->connect->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				echo "Record not found";
			}
		}

		// Update contract data into contract table
		public function updateRecord($postData){
		    $start_date = $this->connect->real_escape_string($_POST['start_date']);
			$end_date = $this->connect->real_escape_string($_POST['end_date']);
			$description = $this->connect->real_escape_string($_POST['description']);
			$category = $this->connect->real_escape_string($_POST['category']);
			$phone_number = $this->connect->real_escape_string($_POST['phone_number']);
			$email_address = $this->connect->real_escape_string($_POST['email_address']);
			$status = $this->connect->real_escape_string($_POST['status']);
			$termination_date = $this->connect->real_escape_string($_POST['termination_date']);
			$reason_for_termination = $this->connect->real_escape_string($_POST['reason_for_termination']);
			// $date_created = $this->connect->real_escape_string($_POST['date_created']);
		    $id = $this->connect->real_escape_string($_POST['id']);

			if (!empty($id) && !empty($postData)) {
			$query = "UPDATE contracts SET
             start_date = '$start_date', end_date= '$end_date', description = '$description',
             category = '$category', phone_number = '$phone_number', email_address = '$email_address',
             status = '$status', termination_date = '$termination_date', reason_for_termination = '$reason_for_termination';
             WHERE id = '$id'";
			$sql = $this->connect->query($query);
				if ($sql==true) {
				    header("Location:index.php?msg2=update");
				}else{
				    echo "Registration updated failed try again!";
				}
		    }	
		}

		// Delete contract data from contracts table
		public function deleteRecord($id){
		    $query = "DELETE FROM contracts WHERE id = '$id'";
		    $sql = $this->connect->query($query);
			if ($sql==true) {
			header("Location:index.php?msg3=delete");
			}else{
			echo "Record does not delete try again";
		    }
		}
    }
?>