<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $db = "dbname";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
         $rowaffected = 0;

		if (isset($_POST['xmlfile']) && ($_POST['xmlfile']['error'] == UPLOAD_ERR_OK)) {
			$xml = simplexml_load_file($_POST['xmlfile']['tmp_name']);

			foreach ($xml->book as $value) {
				$author = $value['author'];
				$title = $value['title'];
				$genre = $value['genre'];
				$price = $value['price'];
				$publish_date = $value['publish_date'];
				$description = $value['description'];

				$sql = "INSERT INTO `Exam`(`author`, `title`, `genre`, `price`, `publish_date`, `description`) VALUES ('".$author."','".$title."','".$genre."','".$price."','".$publish_date."','".$description."')";

				$result = mysqli_query($conn, $sql);

				if (!empty($result)) {
					$rowaffected++;
				}else{
					$errorMsg = mysqli_error()."\n";
				}
				if ($rowaffected > 0) {
					$msg = $rowaffected. "Recorded Insereted";
				}else{
					$errorMsg = "Failed To Insert";
				}
			}

		}
    }

    ?>