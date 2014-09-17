<?php
	error_reporting(E_ALL - (E_NOTICE + E_WARNING));
	session_start();
	if (isset($_SESSION['user'])){
		echo "Create Event Action"."<br />";
		$event_name = $_POST['event_name'];
		$event_date = $_POST['event_date'];
		$event_desc = $_POST['event_desc'];
		$event_photo = $_FILES["eventPhoto"]["name"];
		$event_venue = $_POST['event_venue'];
		
		echo $event_name."<br />";
		echo $event_date."<br />";
		echo $event_desc."<br />";
		echo $event_photo."<br />";
		echo $event_venue."<br />";
		echo $eta."<br />";

		// Upload Image
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$extension = end(explode(".", $_FILES["eventPhoto"]["name"]));
		if ((($_FILES["eventPhoto"]["type"] == "image/jpeg") || ($_FILES["eventPhoto"]["type"] == "image/jpg") || ($_FILES["eventPhoto"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
			if ($_FILES["eventPhoto"]["error"] > 0) {
				echo "Return Code: " . $_FILES["eventPhoto"]["error"] . "<br>";
			} else {
				echo "Upload: " . $_FILES["eventPhoto"]["name"] . "<br>";
				echo "Type: " . $_FILES["eventPhoto"]["type"] . "<br>";
				echo "Size: " . ($_FILES["eventPhoto"]["size"] / 1024) . " kB<br>";
				echo "Temp file: " . $_FILES["eventPhoto"]["tmp_name"] . "<br>";
				
				if (file_exists("./images/" . $_FILES["eventPhoto"]["name"])) {
					echo $_FILES["eventPhoto"]["name"] . " already exists. ";
					header("Location: home.php?success=-1&message=File Already exists");
				} else {
					move_uploaded_file($_FILES["eventPhoto"]["tmp_name"], "./images/" . $_FILES["eventPhoto"]["name"]);
					echo "Stored in: ./images/" . $_FILES["eventPhoto"]["name"];
				}
			}
		}
		else {
			echo "Invalid file";
			// header("Location: ops_add_menu.php");
		}
		
		require_once('./db_connect.php');
	
		// connecting to db
		$db = new DB_CONNECT();
		
		$result = mysql_query("INSERT INTO tbl_events (eventName, eventDescription, eventDate, eventVenue, eventImageURL) VALUES ('$event_name', '$event_desc', '$event_date', '$event_venue', '$event_photo')") or die("Create Event ERROR");
	
		if ($result > 0) {
			echo "Event Inserted Successfully.";
			// header("location:./home.php?message=Menu Added.");
		} else {
			echo "Menu Insert Failed.";
			header("location:./home.php?message=Menu insertion failed. Please try again.");
		}
		
	} else {
		echo "User Not Logged In...";
		header("Location:login.php?message=Session expired.");
	}
?>