<div class="row adminApproveStoryPage">
	<div class="marginAuto divBtn min-h">
		<div class="icon24 icon-back" id="closeBtn" style="position: absolute;z-index: 999;"></div>
		<div class="row marginAuto boxImgLogo">
			<p><b>Apporve Story</b></p>
		</div>
		<div class="iconApproveHead icon48 icon-approve marginB10"></div>
		<div class="blockAdmin marginAuto marginT20">
		
			 <div class="" style="padding-top:50px;">
				<!--<select name="Myselect" id="Myselect"  class="form-control myselect">
					<option style="width:50px;"  value="1">All</option>
					<option value="0" >My Create</option>
				</select> -->
			</div>
			
			<div class="imgApporve">
				<div id="approveStory" class="form-group">
					<div class='row marginAuto marginT10'  style="width:95%" id="showHomeStory"  >
						<!-- <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='1'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-play"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
							<div class="iconCheckStatus icon16 icon-approve "></div>
						</div>
						<div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-play"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
							<div class="iconCheckStatus icon16 icon-approveWait"></div>
						</div>
						<div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-play"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
							<div class="iconCheckStatus icon16 icon-approveWait"></div>
						</div>
						<div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-play"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
							<div class="iconCheckStatus icon16 icon-approveWait"></div>
						</div>-->
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//สีฟ้าที่ปุ่ม admin
		$(".adminPage").addClass('active')
		$(".storyPage").hide()
		$(".mainDetail").css('background-color', '#FFF');
		/*-----------------------เมื่อโหลดหน้าขึ้นมาให้ดึงนิทานที่ status id = 1 คือรออนุมัติ-----------------*/
		$.ajax({
			type:'POST',
			url:'qs/qs_findbookby_status.php',
			dataType: "json",
			data: {statusid:1},
			success:function( datajson ) {  
				if(datajson.length !=0){
					$("#showHomeStory").empty(); 
					var img = "";	
					$.each(datajson, function(i,item){
						if(datajson[i].story_pic == 'NULL' ){ 
							//img = " <div class='col-xs-3 col-lg-2'><button id = 'pic_' value ='"+no+"' onClick = 'pageAddpicture(this.value);' > <img src ='imgStory/img_00.png' style=' width: 45px; height: 45px;' />  </button> </div> "; 
						}else{ 
						//img = "<div class='col-xs-4 col-lg-2 boxImg'> <div class='h100 viewDetail' data-img="+datajson[i].story_id+"> <div class='img'  style='background:url(imgStory/"+datajson[i].story_pic+")'></div> <div class='homeIcon icon-play'></div></div><p class='text-center text-blue'>"+datajson[i].story_name+"</p><div class='iconCheckStatus icon16 icon-approve '></div></div>";
							img = 	'<div class="col-xs-4 col-lg-2 boxImg">'+
										'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'>'+
											'<div class="img"  style="background:url(imgStory/'+datajson[i].story_pic+')"></div>'+
											'<div class="homeIcon icon-play "></div>'+
										'</div>'+
										'<p class="text-center text-blue">'+cutStoryName(datajson[i].story_name)+'</p>'+
										'<div class="iconCheckStatus icon16 icon-approveWait "></div>'+
									'</div>'; 
						}
						$('#showHomeStory').append(img);	
					});	
					
					/*-----------------------เมื่อคลิ้กนิทานแต่ละเรื่อง-----------------*/
					$(".viewDetail").click(function(){ 
						var thisId = $(this).data('img');
						window.location.href="main.php?page=admin_approveStoryDetail&storyid="+thisId+"";
					});
					
				}
				else{
					$('#showHomeStory').append("<p class='text-blue text-center'> ไม่มีนิทานที่รอการอนุมัติ </p>");
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
		
		//ปุ่ม back
		$( "#closeBtn" ).click(function() { 
			//alert(categoryid);
			window.location.href="main.php?page=admin";
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