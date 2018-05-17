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
	
	<!-- p5sound -->
	<script src="js/p5/p5.min.js"></script>
    <script src="js/p5/addons/p5.dom.min.js"></script>
    <script src="js/p5/addons/p5.sound.min.js"></script>
	
	<!-- สริปต์ปุ่มสีๆ -->
	<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
	<!-- Add icon library -->
	<!--<link rel="stylesheet" href="css/fontawesome-all.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
 <style type="text/css">
@media screen and (orientation:portrait) {
 .fullPage {
   -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
                    transform: rotate(90deg);
                    -ms-transform: rotate(90deg); /* IE 9 */
     position: absolute;

    transform-origin: bottom left;
    width: 100vh;
    height: 100vw;
    margin-top: -100vw;

   
 }
}
/* sumsung garlecy */
@media only screen 
  and (min-device-width: 360px) 
  and (max-device-width: 640px) 
  and (-webkit-min-device-pixel-ratio: 3)
/*oppo a33*/
  @media only screen 
   and (max-width : 540px) 
   and (max-height : 960px) {
   /* Styles here */
}

.text{
	position: relative;
    bottom: 0px;
    text-align: center;
    background-color: #777;
    color: #f5f5f5;
    /*top: -15px;*/
    opacity: 0.5;
}

#defaultCanvas0{
	display: none;
	
}

</style>
</head>
<body >
<div class="fullPage">


<div class="icon32 icon-close " id="closeBtn"></div>

<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
	
	 <ol class="carousel-indicators" style="bottom:0px;" id="showSlideNews_number">
		<!-- <li data-target="#myCarousel" data-slide-to="0" ></li>
		<li data-target="#myCarousel" data-slide-to="1" ></li> -->
	</ol> 

	<!--img slide-->
	<div class="carousel-inner" role="listbox" id="showSlideNews" >
	
		<!--<div class="item">
			<div class="slideMint" style="background-image:url(imgStory/87_1.png);height :300px;">
				<p>sdfsdfsdfsdf</p>
				
				<audio controls id="myVideo" class="myVideo">
				  <source src="audio/s87_1.mp3" type="audio/mpeg">
				</audio>
			</div>
		</div>-->
	</div> 
	
	
	
	

   
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" id="prev">
	  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style=" margin-left: -25px;"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" id="next">
	  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="margin-right: -25;"></span>
	  <span class="sr-only">Next</span>
	</a>
</div>
</div>
<!--
<div class="modal fade exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="top: 35%;" role="document">
	<div class="modal-content" style="min-height: 150px;">
	  <div class="modal-body text-blue" style="text-align:center;">
	  </div>
	  <div class="modal-footer marginAuto" style="" >
		<button type="button" class="btn btn-back noBtn" style="width:80px;" id="noModalBtn" data-dismiss="modal">Close</button>
	  </div>
	</div>
  </div>
</div>-->


<script type="text/javascript">
	
	
	var song0;
	var song1;
	var song2;
	var song3;
	var song4;
	var song5;
	var song6;
	var song7;
	var song8;
	var song9;
	
	var index_ = 0 ;
	var lastIndex = 0;
	var h = document.documentElement.clientHeight
	//var h = document.documentElement.clientWidth;
	var storyid = <?php echo $_GET['storyid'];?> ;
	var numberOfpage = 0;
	
	function preload() {
		

	$.ajax({
		type:'POST',
		url:'qs/qs_loadStoryByID.php',
		dataType: "json",
		data: {storyid:storyid},
		success:function( datajson ) {    
			if(datajson.length != 0){ 
				numberOfpage = datajson.length;
				$('#showSlideNews').empty();
				$.each(datajson, function(i,item){
					var no = i;
					var img;
					var description;
					if(datajson[i].text == "NULL"){
						description = "";
					}
					else{
						description = datajson[i].text;
					}
					if(datajson[i].picture != '' ){
						if(i==0){
							var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
							if(datajson[i].voice != "NULL"){
								img = '<div class="item"><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :'+h+'px;">	<p class="text"><b>'+ description +'</b></p>'+
								'<span id="myVideo'+no+'" class="myVideo" audio-src="audio/'+datajson[i].voice+'"></span>'+
								'</div></div>'
							}else{
								img = '<div class="item"><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :'+h+'px;">	<p class="text"><b>'+ description +'</b></p>'+
								'</div></div>'
							}
						}
						else{
							var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
							if(datajson[i].voice != "NULL"){
								img = '<div class="item "><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :'+h+'px;"><p class="text"><b>'+ description +'</b></p>'+
								'<span id="myVideo'+no+'" class="myVideo" audio-src="audio/'+datajson[i].voice+'"></span>'+
								'</div></div>'
							}else{
								img = '<div class="item"><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :'+h+'px;">	<p class="text"><b>'+ description +'</b></p>'+
								'</div></div>'
							}
						}
					}else{
						var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
						img = '<div class="item active"><div class="slideMint"></div></div>'
					}
					$('#showSlideNews_number').append(imgNumber);	
					$('#showSlideNews').append(img);	
					$('#showSlideNews').find('.item').eq(0).addClass('active');
					
					if (i == 0) {
						song0 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 1) {
						song1 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 2) {
						song2 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 3) {
						song3 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 4) {
						song4 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 5) {
						song5 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 6) {
						song6 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 7) {
						song7 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 8) {
						song8 = loadSound('audio/'+datajson[i].voice);
					} else if (i == 9) {
						song9 = loadSound('audio/'+datajson[i].voice);
					} 
					
				});	
				$('.carousel').carousel({ 
					interval:false 
					/*pause:true*/
					/*interval: 2000,
					pause: false*/
				});
				//-------------end play audio-------------//
			}
			else{
				alert("ไม่พบข้อมูลหน้านิทาน");
			}
			
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});
	}

	function setup() {
		
	//----------------click next--------------//
	$( "#next" ).click(function() {
		lastIndex = index_;
		index_++;
		
		if(index_  == numberOfpage)
			index_ = 0 ;

		startstopsound(index_, lastIndex);
	});	
	
	//----------------click prev--------------//
	$( "#prev" ).click(function() {
		 lastIndex = index_;
		index_--;
		
		if(index_  < 0)
			index_ = numberOfpage-1 ;
		
		startstopsound(index_, lastIndex);
	});	
	
	/*-----------Close----------*/
	$("#closeBtn").click(function(){ 
			 window.history.back();
	});
	
	/*-----------Play-----------*/
	$("#playBtn").click(function(){ 
			 song0.play();
	});
	}
	
	function startstopsound(startsound, stopsound) {
		// play
		if (startsound == 0) {
			song0.play();
		}
		else if(startsound == 1){
			song1.play();
		}
		else if(startsound == 2){
			song2.play();
		}
		else if(startsound == 3){
			song3.play();
		}
		else if(startsound == 4){
			song4.play();
		}
		else if(startsound == 5){
			song5.play();
		}
		else if(startsound == 6){
			song6.play();
		}
		else if(startsound == 7){
			song7.play();
		}
		else if(startsound == 8){
			song8.play();
		}
		else if(startsound == 9){
			song9.play();
		}
		
		// stop
		if (stopsound == 0) {
			song0.stop();
		}
		else if(stopsound == 1){
			song1.stop();
		}
		else if(stopsound == 2){
			song2.stop();
		}
		else if(stopsound == 3){
			song3.stop();
		}
		else if(stopsound == 4){
			song4.stop();
		}
		else if(stopsound == 5){
			song5.stop();
		}
		else if(stopsound == 6){
			song6.stop();
		}
		else if(stopsound == 7){
			song7.stop();
		}
		else if(stopsound == 8){
			song8.stop();
		}
		else if(stopsound == 9){
			song9.stop();
		}
	}
</script>
</body>
</html>
