<div class="row homePage">
	<div class="marginAuto divBtn">
		<center>
		<div class="marginAuto" style="height:auto;">
			 <div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators" style="bottom:0px;" id="showSlideNews_number"></ol>

				<!--img slide-->
				<div class="carousel-inner" role="listbox" id="showSlideNews"></div>
				

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
				<div class="form-group marginAuto marginT10" style="width: 250px;">
					<span class="glyphicon glyphicon-search" style="color: #fff;"></span>
					<input type="text"  class="form-control borderBlue bg-blue" id="textSearch" placeholder="search" style="border-radius: 20px;color: #fff;" >
				</div> 
				<!--<p class="marginT20" style="">All Story</p>-->
				<div id="homeStory" class="form-group">
					<div class='row'  style="width:95%" id="showHomeStory" ></div>
				</div> 
			</form>
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
	$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
	//=======================>>>>> News <<<<<=======================
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
					var img;
					if(datajson[i].news_picture != '' ){
						if(i==0){
							var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
							img = '<div class="item"><div class="slideBg" style="background:url(img/'+datajson[i].news_picture +')"></div></div>'
						}
						else{
							var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
							img = '<div class="item "><div class="slideBg" style="background:url(img/'+datajson[i].news_picture +')"></div></div>'
						}
					}else{
						var imgNumber = ' <li data-target="#myCarousel" data-slide-to="'+no+'" ></li>';
						img = '<div class="item active"><div class="slideBg"></div></div>'
					}
					$('#showSlideNews_number').append(imgNumber);	
					$('#showSlideNews').append(img);	
					$('#showSlideNews').find('.item').eq(0).addClass('active');
					
				});	
				
			}
			else{
				$("#exampleModal").modal()// เปิดใช้ popup
				$("#okModalBtn").remove();//ลบปุ่ม ok ออกใหเหลือแต่ปุ่ม cancel
				$(".modal-footer").css("width","110px")//จัดปุ่ม cancel ให้อยู่กึ่งกลาง
				$(".modal-body").html("The story not found")  //ใส่ข้อความที่ต้องการ alert
				//alert("ไม่พบข้อมูลหน้านิทาน");
			}
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});
	
	
	//=======================>>>>> นิทาน <<<<<=======================
	
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
					var imgStory;
					if(datajson[i].story_pic != '' ){
					 		imgStory= '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> '+
												/*'<img src ="imgStory/'+ datajson[i].story_pic+'"/>'+*/
												'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
					}
					else{
							imgStory = '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail"> '+
												'<div class="img" style="background:url(imgStory/img_00.png)"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p  class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
					}
					$('#showHomeStory').append(imgStory);
				});
				$(".viewDetail").click(function(){ 
					var thisId = $(this).data('img');
					//window.location.href="main.php?page=play_story&storyID="+thisId+"";
					window.location.href="main.php?page=play_storydetail&storyID="+thisId+"&pagename=home";
				});				
			}
			else{
				//alert("ไม่พบข้อมูลหน้านิทาน");
				$('#showHomeStory').append("<p class='text-blue'>The story not found</p>");
			}
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});
	//=======================>>>>> พิมพ์ค้นหานิทาน <<<<<======================
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
						var imgStory;
						if(datajson[i].story_pic != '' ){
							imgStory= '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> '+
												'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p  class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
						}
						else{
							imgStory= '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> '+
												'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p  class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
						}
						$('#showHomeStory').append(imgStory);
					});	
				}
				else{
					$('#showHomeStory').empty();
					var imgStory = "<div class='text-center text-blue' > The story not found </div>";
					$('#showHomeStory').append(imgStory);
				}
				
				$(".viewDetail").click(function(){ 
					var thisId = $(this).data('img');
					//window.location.href="main.php?page=play_story&storyID="+thisId+"";
					window.location.href="main.php?page=play_storydetail&storyID="+thisId+"&pagename=home";
				});
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
    });
});
/*-----------------------ฟังชันตัดชื่อนิทาน-----------------*/
	function cutStoryName (storyname){
		var nameLength = storyname.length;
		var newString = storyname;
		if(nameLength >= 7 ){
			newString = storyname.substring(0, 11)+"..";
		}
		return newString;
	}
</script>


<!--
1. ปุ่มที่แสดงบนหนังสือ มีปุ่ม play : <div class="homeIcon icon-play"></div> และ buy : <div class="homeIcon icon-buy"></div> ตอนนี้ขาดการเช็คสถานะปุุ่ม ()
2. $(".viewDetail") ทำต่อว่ากดแล้วไปหน้า story ยังไม่ได้ทำรอมิ้นทำหน้า story ครบ
3. ปุ่มแสดง เงิน
4. ออกจากระบบ
-->