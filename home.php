
<div class="row homePage">
	<div class="form-group marginAuto divBtn" style="width:320px;">
		<center>
		<div class="marginAuto marginB20" style="width:90%; height:auto;">
			 <div id="myCarousel" class="carousel slide" data-ride="carousel">
   
				<ol class="carousel-indicators" style="bottom:0px;" id="showSlideNews_number">
				  <!---<li data-target="#myCarousel" data-slide-to="0" ></li>
				   <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				  <li data-target="#myCarousel" data-slide-to="3"></li> --->
				</ol>

				<!--img slide-->
				<div class="carousel-inner" role="listbox" id="showSlideNews">

				 <!---<div class="item active">
					<img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg" alt="Chania" width="240" height="200"> 
				  </div>

				   <div class="item">
					<img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg" alt="Chania" width="240" height="200">    
				  </div>
				
				  <div class="item">
					<img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg" alt="Flower" width="240" height="200">   
				  </div>

				  <div class="item">
					<img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg" alt="Flower" width="240" height="200">      
				  </div> --->
			  
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
			
			<!---->
			<form class="form-horizontal" method="post" name="" id="">
				<div class="form-group marginAuto marginT20" style="width: 250px;">
				 <span class="icon"><i class="fa fa-search" style="position: relative;top: 25px;right: -110px;"></i></span>
					<input type="text"  class="form-control borderBlue" id="textSearch" placeholder="" >
				</div> 
				
				
				
				<div id="homeStory" class="form-group">
					<div class='row' id="showHomeStory" >
						<div class='col-xs-3 col-lg-2'> 
							<button id = 'pic' value ='35' onClick = '' > 
								<img src ='imgStory/35_00.jpg'  style=' width: 45px; height: 45px;' />  
							</button>
						</div>
						
					</div>
				</div> 
			</form>
			
			<div style="width:270px" class="objectCenter">
				<div id="btCerate" class="btn btn-warning btn-circle"><i class="fa fa-plus"></i></div>
			</div>
			<br>
		</div>
		</center>
	</div>	
</div>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<style>

	
</style>
<script type="text/javascript">
$(document).ready(function(){
// check user role login
	$(".homePage").addClass('active')
	$(".adminPage").hide()//local
	$(".storyPage").show()//admin show
	//////ดึงข่าวมาจาก DB
	$.ajax({
		type:'POST',
		url:'qs/qs_showNews.php',
		dataType: "json",
		data: {},
		success:function( datajson ) {     
			if(datajson.length !=0){
				//$('#showSlideNews').empty();
				$.each(datajson, function(i,item){
					var no = i;
					if(datajson[i].	news_picture != '' ){
						if(i==0){
							var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
							var img = '<div class="item active">'+
							'<img src="img/'+datajson[i].news_picture +'" alt="Chania" '+
							'width="240" height="200"> </div>'; 
						}
						else{
							var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
							var img = '<div class="item ">'+
							'<img src="img/'+datajson[i].news_picture +'" alt="Chania" '+
							'width="240" height="200"> </div>'; 
						}
					}else{
						var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
						var img = '<div class="item active">'+
						'<img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg" alt="Chania" '+
						'width="240" height="200"> </div>'; alert("ff");
					}
					$('#showSlideNews_number').append(imgNumber);	
					$('#showSlideNews').append(img);	
				});	
			}
			else{
				alert("ไม่พบข้อมูลหน้านิทาน");
			}
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});
	//////ค้นหานิทาน
	$.ajax({
		type:'POST',
		url:'qs/qs_findStory.php',
		dataType: "json",
		data: {searchName:"all"},
		success:function( datajson ) {     
			if(datajson.length !=0){
				$('#showHomeStory').empty();
				$.each(datajson, function(i,item){
					var no = i;
					if(datajson[i].story_pic != '' ){
						var imgStory = "<div class='col-xs-3 col-lg-2'> "+
											"<button id = 'pic' value ='35' onClick = '' > "+
												"<img src ='imgStory/"+ datajson[i].story_pic+"'  style=' width: 45px; height: 45px;' />  "+
											"</button>"+
										"</div>";
					}
					else{
						var imgStory = "<div class='col-xs-3 col-lg-2'> "+
											"<button id = 'pic' value ='35' onClick = '' > "+
												"<img src ='imgStory/img_00.png'  style=' width: 45px; height: 45px;' />  "+
											"</button>"+
										"</div>";
					}
					$('#showHomeStory').append(imgStory);
				});	
			}
			else{
				alert("ไม่พบข้อมูลหน้านิทาน");
			}
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});
	//////พิมพ์ค้นหานิทาน
	$("#textSearch").keyup(function(){
        var tex = $("#textSearch").val();
		var tex_ ="";
		if(tex == ""){ tex_ = "all";}
		else{ tex_ = tex ;}
		$.ajax({
			type:'POST',
			url:'qs/qs_findStory.php',
			dataType: "json",
			data: {searchName:tex_},
			success:function( datajson ) {     
				if(datajson.length !=0){
					$('#showHomeStory').empty();
					$.each(datajson, function(i,item){
						var no = i;
						if(datajson[i].story_pic != '' ){
							var imgStory = "<div class='col-xs-3 col-lg-2'> "+
												"<button id = 'pic' value ='35' onClick = '' > "+
													"<img src ='imgStory/"+ datajson[i].story_pic+"'  style=' width: 45px; height: 45px;' />  "+
												"</button>"+
											"</div>";
						}
						else{
							var imgStory = "<div class='col-xs-3 col-lg-2'> "+
												"<button id = 'pic' value ='35' onClick = '' > "+
													"<img src ='imgStory/img_00.png'  style=' width: 45px; height: 45px;' />  "+
												"</button>"+
											"</div>";
						}
						$('#showHomeStory').append(imgStory);
					});	
				}
				else{
					$('#showHomeStory').empty();
					var imgStory = "<div > ไม่พบนิทาน </div>";
					$('#showHomeStory').append(imgStory);
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
    });
});
</script>