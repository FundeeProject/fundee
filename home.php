<div class="row homePage">
	<div class="marginAuto divBtn">
		<center>
		<div class="marginAuto" style="height:auto;">
			 <div id="myCarousel" class="carousel slide" data-ride="carousel">
   
				<ol class="carousel-indicators" style="bottom:0px;" id="showSlideNews_number">
			      <li data-target="#myCarousel" data-slide-to="0" ></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				  <li data-target="#myCarousel" data-slide-to="3"></li> 
				</ol>

				<!--img slide-->
				<div class="carousel-inner" role="listbox" id="showSlideNews">
 					<div class="item active">
						<img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg" alt="Chania"> 
				    </div>
				 
					<div class="item">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnSEKZqJZHveFLz5Gjkrci77XnJq7gp5cSq3UI_Nkn5P3-xfz4" alt="Chania">    
					</div>
					
					<div class="item">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTldqQkHcGq8YmquLLwCt82A5ekcjFPFgZGU55EelsvdRBwrhObbQ" alt="Flower">   
					</div>

					<div class="item">
						<img src="http://www.apicius.es/wp-content/uploads/2012/07/IMG-20120714-009211.jpg" alt="Flower">      
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
			
			<!---->
			<form class="form-horizontal" method="post" name="" id="">
				<div class="form-group marginAuto marginT20" style="width: 250px;">
				 <span class="icon"><i class="fa fa-search" style="position: relative;top: 25px;right: -110px;"></i></span>
					<input type="text"  class="form-control borderBlue" id="textSearch" placeholder="" >
				</div> 
				<p class="marginT20" style="">ALL STORY</p>
				
				
				<div id="homeStory" class="form-group">
					<div class='row'  style="width:95%" id="showHomeStory" >
						<div class='col-xs-4 col-lg-2  boxImg'> 
							<div class="h100"> 
								<img src ='http://d28hgpri8am2if.cloudfront.net/book_images/cvr9780857071934_9780857071934_hr.jpg'/> 
								<div class="homeIcon icon-play"></div>
							</div>
							<p>CARTOON</p>
						</div>
						<div class='col-xs-4 col-lg-2 mrginT10 boxImg'> 
							<div class="h100"> 
								<img src ='https://about.canva.com/wp-content/uploads/sites/3/2015/01/children_bookcover.png'/> 
								<div class="homeIcon icon-buy"></div>
							</div>
							<p>FRED</p>
						</div>
						<div class='col-xs-4 col-lg-2  boxImg'> 
							<div class="h100"> 
								<img src ='https://marketplace.canva.com/MAB__29_V3E/1/0/thumbnail_large/canva-carnival-illustration-book-cover-MAB__29_V3E.jpg'/> 
								<div class="homeIcon icon-buy"></div>
							</div>
							<p>The Little Dancer</p>
						</div>
						<div class='col-xs-4 col-lg-2  boxImg'> 
							<div class="h100"> 
								<img src ='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbxqmsF3kJu1V5t4_g1JBBr5ulc8Hzft7dip3JqbdPU_POWIr-'/> 
								<div class="homeIcon icon-play"></div>
							</div>
							<p>CASPER</p>
						</div>

				</div> 
			</form>
			<!--
			<div style="width:270px" class="objectCenter">
				<div id="btCerate" class="btn btn-warning btn-circle"><i class="fa fa-plus"></i></div>
			</div>-->
			<br>
		</div>
		</center>
	</div>	
</div>


<script type="text/javascript">
$(document).ready(function(){
	
// check user role login
	<?php 
		if($_SESSION["role_id"]== 0 ){
			echo " $('.homePage').addClass('active'); ";
			echo "$('.storyPage').hide(); ";
		}
		else if($_SESSION["role_id"]== 1 ){
			echo " $('.homePage').addClass('active'); ";
			echo "$('.adminPage').hide(); ";
		}
	?>
	//////ดึงข่าวมาจาก DB
	/*
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
						'width="240" height="200"> </div>';
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
    });*/
});
</script>