<?php
session_start();
$_GET['storyid'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- สริปต์ปุ่มสีๆ -->
	<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
	<!-- Add icon library -->
	<!--<link rel="stylesheet" href="css/fontawesome-all.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
<style>
body, html {
    height: 100%;
    margin: 0;
}

.carousel  {
    /* The image used */
   // background-image: url("imgStory/img_00.png");

    /* Full height */
    height: 90%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
</head>
<body>

<!-- <div class="bg"></div> -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators" style="bottom:0px;" id="showSlideNews_number">
		<li data-target="#myCarousel" data-slide-to="0" ></li>
		<li data-target="#myCarousel" data-slide-to="1" ></li>
	</ol>

	<!--img slide-->
	<div class="carousel-inner" role="listbox" id="showSlideNews">
		<div class="item active">
			<img src="imgStory/61_00.png" alt="Chania"> 
		</div> 
		<div class="item ">
			<img src="imgStory/56_00.png" alt="Chania"> 
		</div> 
	</div>
	

   <!--slide left right-->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style=" margin-left: -25px;"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="margin-right: -25;"></span>
	  <span class="sr-only">Next</span>
	</a>
</div>

<p id="description">This example creates a full page background image. Try to resize the browser window to see how it always will cover the full screen (when scrolled to top), and that it scales nicely on all screen sizes.</p>

</body>
</html>
