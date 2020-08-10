<?php 

	session_start();
	include_once 'gatherings_db_connection.php';
	
	$_SESSION['message']= '';
	//$mysqli = mysqli_connect('localhost', 'root', 'root', 'tricking_gatherings') or die ("Unable to connect");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		//getting info sent from the form
		$gatheringName = $mysqli->real_escape_string($_POST['gatheringName']);
		$gymName = $mysqli->real_escape_string($_POST['gymName']);
		$address = $mysqli->real_escape_string($_POST['address']);
		$city = $mysqli->real_escape_string($_POST['city']);
		$state = $mysqli->real_escape_string($_POST['state']);
		$zipcode = $mysqli->real_escape_string($_POST['zipcode']);
		$country = $mysqli->real_escape_string($_POST['country']);
		$event_start = $mysqli->real_escape_string($_POST['event_start']);
		$event_end = $mysqli->real_escape_string($_POST['event_end']);
		$event_host = $mysqli->real_escape_string($_POST['event_host']);
		$event_cost = $mysqli->real_escape_string($_POST['event_cost']);
		$attendance = $mysqli->real_escape_string($_POST['attendance']);
		$airport = $mysqli->real_escape_string($_POST['airport']);
		$description = $mysqli->real_escape_string($_POST['description']);
		$host_email = $mysqli->real_escape_string($_POST['host_email']);
		$img = $mysqli->real_escape_string('img/gatherings/'.$_FILES['img']['name']);

		//make sure file type is image
		if (preg_match("!image!", $_FILES['img']['type'])){

			//Populate the databse and copy image to img/gatherings folder
			if(copy($_FILES['img']['tmp_name'], $img)){

				$sql = "INSERT INTO gatherings (gathering_name, gym_name, street_address, city, state, zipcode, country, event_start, event_end, event_host, event_cost, attendance, nearest_airport, description, host_email, img) VALUES ('$gatheringName', '$gymName', '$address', '$city', '$state', '$zipcode', '$country', '$event_start', '$event_end', '$event_host', '$event_cost', '$attendance', '$airport', '$description', '$host_email', '$img')";

				//if successful, redirect to index
				if ($mysqli->query($sql) == true){
					$_SESSION['message'] = "Gathering registrated successful! ";
					header("location: index.html");
				}
				else{
					$_SESSION['message'] = "Gathering not registrated!";
				}
			}
		}


	}











?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link  href="style/style.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

	<script src="http://code.jquery.com/jquery-1.9.1.min.js">
	</script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

	<title>TrickingGatherings.com</title>

</head>	

<body>
	<!-- Menu -->
	<header id="menu" class="grid">

		<div class="container">
			<nav class="site-nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="gatherings.php">Gatherings</a></li>
					<li><a href="index.php#section-d" id="scroll">About US</a></li>
				</ul>
			</nav>

			<div class="menu-toggle">
				<div class="hamburger"></div>
			</div>


		</div>

	</header>

	<div id="addForm" class= "grip">

		<h1>Add your gathering</h1>

		<form action= "addGathering.php" method="post" enctype="multipart/form-data">
			<label>Gathering Name</label>
			<input type="text" name="gatheringName"  required> 
			<label>Gym Name</label>
			<input type="text" name="gymName"  required>
			<label>Street Address</label>
			<input type="text" name="address"  required>
			<label>City</label>
			<input type="text" name="city"  required>
			<label>State</label>
			<input type="text" name="state" required>
			<label>Zipcode</label>
			<input type="text" name="zipcode"  required>
			<label>Country</label>
			<input type="text" name="country"  required>
			<label>Event Start Date</label>
			<input type="date" name="event_start"  required>
			<label>Event Ending Date</label>
			<input type="date" name="event_end"  required>
			<label>Event Host</label>
			<input type="text" name="event_host"  required>
			<label>Event Cost</label>
			<input type="text" name="event_cost"  required>
			<label>Attendance</label>
			<input type="text" name="attendance"  required>
			<label>Nearest Airport</label>
			<input type="text" name="airport" required>
			<label>Description</label>
			<input type="text" name="description"  required>
			<label>Host email</label>
			<input type="email" name="host_email"  required>
			<label>Gathering Image</label>
			<input type="file" name="img"  required>
			<button class='button'>Send</button>

		</form>
	</div>



	<!-- footer -->
	<footer id="main-footer">
		<div>TrickingGatherings.com</div>
		<div>Developed By <a href="https://www.instagram.com/leoitrick/" target="_blank">Leandro Moreira</a></div>

	</footer>

</body>

<!-- Script content -->
<script type='text/javascript' src='site1.js' charset="utf-8"></script>
</html>