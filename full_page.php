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

<script type="text/javascript">
$(document).ready(function(){
	var storyid = <?php echo $_GET['storyid'];?> ;
	$.ajax({
		type:'POST',
		url:'qs/qs_loadStoryByID.php',
		dataType: "json",
		data: {storyid:storyid},
		success:function( datajson ) {    
			if(datajson.length !=0){ 
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
								img = '<div class="item"><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :300px;">	<p>'+ description +'</p>'+
								'<audio controls id="myVideo'+no+'" class="myVideo" ><source src="audio/'+datajson[i].voice+'" type="audio/mpeg"></audio>'+
								'</div></div>'
							}else{
								img = '<div class="item"><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :300px;">	<p>'+ description +'</p>'+
								'</div></div>'
							}
						}
						else{
							var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
							if(datajson[i].voice != "NULL"){
								img = '<div class="item "><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :300px;"><p>'+ description +'</p>'+
								'<audio controls id="myVideo'+no+'" class="myVideo" ><source src="audio/'+datajson[i].voice+'" type="audio/mpeg"></audio>'+
								'</div></div>'
							}else{
								img = '<div class="item"><div class="slideMint" style="background-image:url(imgStory/'+datajson[i].picture +');height :300px;">	<p>'+ description +'</p>'+
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
					
				});	
				//-----------play audio Auto-------------//
				var vid = document.getElementById("myVideo0");
				vid.autoplay = true;
				vid.load();
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
	
	var index_ = 1 ;
	//----------------click next--------------//
	$( "#next" ).click(function() {
		if(index_ != 10){
		index_ += 1 ;}
		else{index_=1;}
		//alert( "index_ = "+index_ );
		
		var vid0 = document.getElementById("myVideo0");
		var vid1 = document.getElementById("myVideo1");
		var vid2 = document.getElementById("myVideo2");
		var vid3 = document.getElementById("myVideo3");
		var vid4 = document.getElementById("myVideo4");
		var vid5 = document.getElementById("myVideo5");
		var vid6 = document.getElementById("myVideo6");
		var vid7 = document.getElementById("myVideo7");
		var vid8 = document.getElementById("myVideo8");
		var vid9 = document.getElementById("myVideo9");
		var vid10 = document.getElementById("myVideo10");
		if(index_ == 1){
			$('#myVideo9').removeAttr("autoplay");
			vid9.pause();
			vid0.autoplay = true;
			vid0.load();
		}
		else if(index_ == 2){
			$('#myVideo0').removeAttr("autoplay");
			vid0.pause();
			vid1.autoplay = true;
			vid1.load();
		}
		else if(index_ == 3){
			$('#myVideo1').removeAttr("autoplay");
			vid1.pause();
			vid2.autoplay = true;
			vid2.load();
		}
		else if(index_ == 4){
			$('#myVideo2').removeAttr("autoplay");
			vid2.pause();
			vid3.autoplay = true;
			vid3.load();
		}
		else if(index_ == 5){
			$('#myVideo3').removeAttr("autoplay");
			vid3.pause();
			vid4.autoplay = true;
			vid4.load();
		}
		else if(index_ == 6){
			$('#myVideo4').removeAttr("autoplay");
			vid4.pause();
			vid5.autoplay = true;
			vid5.load();}
		else if(index_ == 7){
			$('#myVideo5').removeAttr("autoplay");
			vid5.pause();
			vid6.autoplay = true;
			vid6.load();
		}
		else if(index_ == 8){
			$('#myVideo6').removeAttr("autoplay");
			vid6.pause();
			vid7.autoplay = true;
			vid7.load();
		}
		else if(index_ == 9){
			$('#myVideo7').removeAttr("autoplay");
			vid7.pause();
			vid8.autoplay = true;
			vid8.load();
		}
		else if(index_ == 10){
			$('#myVideo8').removeAttr("autoplay");
			vid8.pause();
			vid9.autoplay = true;
			vid9.load();
		}else if(index_ == 11){
			$('#myVideo9').removeAttr("autoplay");
			vid9.pause();
			document.getElementById("myVideo").autoplay = true;
			document.getElementById("myVideo").load();
			//vid10.autoplay = true;
			//vid10.load();
		}
	});	
	//----------------click prev--------------//
	$( "#prev" ).click(function() {
		if(index_ != 1){
			index_ -= 1 ;
		}else{index_ = 10;}
		//alert( "index_ = "+index_ );
		var vid0 = document.getElementById("myVideo0");
		var vid1 = document.getElementById("myVideo1");
		var vid2 = document.getElementById("myVideo2");
		var vid3 = document.getElementById("myVideo3");
		var vid4 = document.getElementById("myVideo4");
		var vid5 = document.getElementById("myVideo5");
		var vid6 = document.getElementById("myVideo6");
		var vid7 = document.getElementById("myVideo7");
		var vid8 = document.getElementById("myVideo8");
		var vid9 = document.getElementById("myVideo9");
		var vid10 = document.getElementById("myVideo10");
		if(index_ == 1){
			$('#myVideo1').removeAttr("autoplay");
			vid1.pause();
			vid0.autoplay = true;
			vid0.load();
		}
		else if(index_ == 2){
			$('#myVideo2').removeAttr("autoplay");
			vid2.pause();
			vid1.autoplay = true;
			vid1.load();
		}
		else if(index_ == 3){
			$('#myVideo3').removeAttr("autoplay");
			vid3.pause();
			vid2.autoplay = true;
			vid2.load();
		}
		else if(index_ == 4){
			$('#myVideo4').removeAttr("autoplay");
			vid4.pause();
			vid3.autoplay = true;
			vid3.load();
		}
		else if(index_ == 5){
			$('#myVideo5').removeAttr("autoplay");
			vid5.pause();
			vid4.autoplay = true;
			vid4.load();
		}
		else if(index_ == 6){
			$('#myVideo6').removeAttr("autoplay");
			vid6.pause();
			vid5.autoplay = true;
			vid5.load();}
		else if(index_ == 7){
			$('#myVideo7').removeAttr("autoplay");
			vid7.pause();
			vid6.autoplay = true;
			vid6.load();
		}
		else if(index_ == 8){
			$('#myVideo8').removeAttr("autoplay");
			vid8.pause();
			vid7.autoplay = true;
			vid7.load();
		}
		else if(index_ == 9){
			$('#myVideo9').removeAttr("autoplay");
			vid9.pause();
			vid8.autoplay = true;
			vid8.load();
		}
		else if(index_ == 10){
			$('#myVideo0').removeAttr("autoplay");
			vid0.pause();
			vid9.autoplay = true;
			vid9.load();
		}else if(index_ == 11){
			$('#myVideo9').removeAttr("autoplay");
			vid9.pause();
			document.getElementById("myVideo").autoplay = true;
			document.getElementById("myVideo").load();
			//vid10.autoplay = true;
			//vid10.load();
		}
	});	
	/*-----------Close----------*/
	$("#closeBtn").click(function(){ 
			 window.history.back();
	});
});
</script>
</body>
</html>
