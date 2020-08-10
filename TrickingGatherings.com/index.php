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
						<li><a href="#section-a" id="back">Home</a></li>
						<li><a href="gatherings.php">Gatherings</a></li>
						<li><a href="#section-d" id="scroll">About US</a></li>
					</ul>
			</nav>
        
       		<div class="menu-toggle">
					<div class="hamburger"></div>
			</div>

	
		</div>
		
	</header>

	<!-- main area -->
	<main id="main">
		
		<!-- section a = image and name -->
		<section id="section-a" class="grid">
			<img class="bg-image"></img>
			<div class="content-wrap">
					<h1>TrickingGatherings.com</h1>
					<!-- <a href="#section-b" class="btn">Read More</a> -->
			</div>
		</section>

		<!-- section b = about tricking gatherings -->
		<section id="section-b" class="grid">
			<div class="content-wrap">
				<p>
					“TrickingGatherings.com is dedicated to bringing you the most updated information regarding tricking events around the world. Browse the site to find an event near you or check out this month’s featured events.”
				</p>
				<a href="gatherings.php" class="btn1">Find Events</a>
				<a href="#section-c" class="btn2" id="button">Featured Events</a>
			</div>
		</section>

		<!-- section c = featured gatherings -->
		<section id="section-c" class="grid">
			<div class="content-wrap">
			<h1>Upcoming Gatherings</h1>
			<div class="upComing">
			<!-- php file -->

			<?php
				$img = "SELECT * FROM gatherings WHERE event_start > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) LIMIT 3";

				$result = mysqli_query($mysqli, $img);
				$resultcheck = mysqli_num_rows($result);

				if ($resultcheck > 0) {
					while ($row = mysqli_fetch_assoc($result)):
					?>	

			<ul>
				<li>
					<div class="card">
						<img src=" <?php echo $row['img']; ?> " class="circle">
						<div class="card-content">
							<h3><?php echo $row['gathering_name']; ?></h3>
						</div>
					</div>
				</li>
				<!-- <li>
					<div class="card">
						<img src="img/Dubsurd.png" class="circle">
						<div class="card-content">
							<h3>Dubsurd Gathering</h3>
						</div>
					</div>
				</li>
				<li>
					<div class="card">
						<img src="img/Tribox.png" class="circle">
						<div class="card-content">
							<h3>Tribox Gathering</h3>
						</div>
					</div>
				</li> -->
			</ul>

			<?php
							endwhile;


						}else
						{
							echo "AN ERROO";
						}

						?>	
			</div>
					</div>
			</section>
			<!-- section d = about us -->

			<section id="section-d" class="grid">
				<div class="content-wrap">
				<h1>The Creators</h1>
				<div class="about-us">
					<ul>
						<li>
							<img src="img/leo.png">
							<h1>Leandro Moreira</h1>
							<p>Hey, I’m Leandro (a.k.a Leo)! I'm a brazilian who recently moved to USA. I’ve been tricking for nearly 6 years but only took it seriously in the last 2 years after moving to Ohio. I’ve travelled around the US and hit different tricking communities. Check out my social media to learn more about me and my journey.</p>
							<a href="https://www.instagram.com/leoitrick/" target="_blank"><i class="fab fa-instagram"></i></a>
						</li>
						<li>
							<img src="img/matt.png">
							<h1>Matt Milhoan</h1>
							<p>Hey, I’m Matt! I’ve been tricking for 12 years and coaching for nearly 10. I’ve hosted the NEO Gatherings 6 years in a row and have been to more tricking gatherings than I can count. I set out to create this site with the goal of putting all information regarding tricking events in one place. Check out my social media to learn more about me and my journey.</p>
							<a href="https://www.instagram.com/mmilhoan92/" target="_blank"><i class="fab fa-instagram"></i></a>
						</li>
					</ul>
				
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


<script type="text/javascript">

 	// make the site scrolling smooth

 	smoothScroll ('#scroll');
 	smoothScroll ('#button');
 	smoothScroll ('#back');

 	function smoothScroll (target){ 
	var scrolllink = $(target)
  
  	scrolllink.click(function(e) {
    	e.preventDefault();
    	$('body,html').animate({
      		scrollTop: $(this.hash).offset().top
    	}, 1500)
  	})
	}

	// close menu after event click
 	$( '.site-nav li a' ).on("click", function(){
  		$('.menu-toggle').click();
	});

</script>


</html>