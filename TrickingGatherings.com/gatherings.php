<?php 
	include_once 'gatherings_db_connection.php';
	// include_once 'php_functions.php';	
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
						<li><a href="">Gatherings</a></li>
						<li><a href="index.php#section-d" id="scroll">About US</a></li>
					</ul>
			</nav>
        
       		<div class="menu-toggle">
					<div class="hamburger"></div>
			</div>

	
		</div>
		
	</header>

	<!-- main -->
	<main id="main">

		<div class="content-wrap">
		<!-- section 1 = background image -->
		<section id="section1" class="grid">
			<img class="bg-image" >
			<h1>"When's the next Gathering?</h1>
			<!-- <div class="text2">
				<h1>gathering?"</h1>
 -->			</div>
			
		</section>


	</div>
		
		
		<!-- section 2 = list of gatherings -->
		<section id="section2" class="grid">
			<div class="content-wrap">
				<h1>Find Tricking Gatherings</h1>
				<button id="showGatheringsButton" class="findButton" >SHOW GATHERINGS</button>
				<div id="findGatherings" class="grid">
					<!-- php file -->
					<?php
						$img = "SELECT * FROM gatherings WHERE event_start > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) ORDER BY event_start";

						$result = mysqli_query($mysqli, $img);
						$resultcheck = mysqli_num_rows($result);
			
						if ($resultcheck > 0) {
							
							while ($row = mysqli_fetch_assoc($result)):
							?>

								<div id="event_info">
									<img src= "<?php echo $row['img'];?> "/>
									<div class="event_description">
										<h1><?php echo $row['gathering_name'];?></h1>
										<b>Hosted By:</b> <?php echo $row['event_host'];?> </br>
										<b>Location:</b> <?php echo $row['city'].', '. $row['state']; ?></br>
										<b>Date:</b> <?php 
													$event_date = strtotime($row['event_start']);
													echo date("F jS, Y" , $event_date);?></br></br>
										
										<!-- MORE INFO ABOUT THE GATHERINGS -->
										<button id="<?php echo $row['id'];?>" class="findButton" >MORE INFO</button>
										<div id="<?php echo $row['id'];?>" class="event_moreinfo">
											<?php echo $row['description'];?></br></br>
											<b>Gym Name: </b> <?php echo $row['gym_name'];?> </br></br>
											<b>Gym Address: </b>  <?php echo $row['street_address'];?></br>
															<?php echo $row['city'].', '.$row['state'].', '. $row['country'];?></br></br>
											<b>Nearest Airport: </b> <?php echo $row['nearest_airport'];?></br></br>
											<b>Expected Attendance: </b> <?php echo $row['attendance']; ?></br></br>
											<b>Average Ticket Cost: </b> <?php echo $row['event_cost']; ?> </br></br>
											<b>Contact: </b> <a href = "mailto:<?php echo $row['host_email'];?>"> Host Email</a>				
										</div>			
									</div>
								</div>
							</br>
						
							<?php
						
							endwhile;


						}else
						{
							echo "ERROO";
						}

					
						?>	
						
					
				
				
				</div>
			
			</div>
		</section>
	
	</main>

	<!-- footer -->
	<footer id="main-footer">
		<h4>TrickingGatherings.com</h4>
		<h5>Developed By <a href="https://www.instagram.com/leoitrick/" target="_blank">Leandro Moreira</a></h5>

	</footer>

	
</body>

	
<!-- Script content -->
<script type='text/javascript' src='site1.js' charset="utf-8"></script>


<script>

// SCRIPT TO SHOW AND HIDE FOUND GATHERINGS

$(document).ready(function(){	
	
	$('#showGatheringsButton').click(function() {
		    $('#findGatherings').toggle(1000);
	  
	});
	
});

// SCRIPT TO SHOW MORE INFO OF THE GATHERINGS!!

$(document).ready(function(){	
	
	$('.findButton').click(function() {
		  var buttonId = $(this).attr('id');      
	
				$('#'+buttonId).next(".event_moreinfo").toggle(1000);
	  
	});
	
});
	

</script>

</html>
