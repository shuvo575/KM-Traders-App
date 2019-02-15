<?php
	class Database{
		function connection(){
			$servername = "localhost";
			$username = "makor4sha_root";
            $password = "adgjmptw440";
            $dbname = "makor4sha_kmtraders";

// Create connection
		 	$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

				return true;

			}

		function squery($sql){
			$servername = "localhost";
			$username = "makor4sha_root";
            $password = "adgjmptw440";
            $dbname = "makor4sha_kmtraders";

// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

//Query
			if ($conn->query($sql) === TRUE) {
    		return TRUE;
			} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
			}

				$conn->close();
		}

		function fquery($sql){
			$servername = "localhost";
			$username = "makor4sha_root";
            $password = "adgjmptw440";
            $dbname = "makor4sha_kmtraders";

// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

//Query
			//if ($conn->query($sql) === TRUE) {
    		return $conn->query($sql);
		//	} else {
    //		echo "Error: " . $sql . "<br>" . $conn->error;
		//	}

			//	$conn->close();
		}
	}
?>
